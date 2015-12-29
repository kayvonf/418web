<?php

include_once 'markdown/kf_markdown.php';

define('HEADER_H1', 1);
define('HEADER_H2', 2);
define('HEADER_H3', 3);
define('HEADER_H4', 4);

define('BLOCK_TYPE_PARAGRAPH', 0);

class article extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('articles_model');
        $this->load->model('lectures_model');
        $this->load->model('comments_model');
        $this->load->model('paragraphs_model');
        $this->load->helper(array('form', 'url', 'course_url'));

        $this->attached_images_dir = $this->config->item('content_base_url') . '/' . $this->config->item('article_images_rel_path');
        $this->attached_images_localpath = $this->config->item('content_base_path') . '/' . $this->config->item('article_images_rel_path');
    }

    function index() {

        $this->require_login();
        $data['articles'] = $this->articles_model->get_all();

        $current_user = $this->get_logged_in_user();
        $this->require_privileged($current_user);

        $authored_article_ids = $this->users_model->get_authored_articles($current_user->id);

        $authored_article_list = array();
        $i = 0;
        foreach ($authored_article_ids as $authored_article_id) {
            $authored_article_list[$i++] =
                $this->articles_model->get_article($authored_article_id->article_id);
        }

        $data['authored_articles'] = $authored_article_list;
        $this->load_view('Articles', 'article_list', $data);
    }

    function view($article_id) {
        $article = $this->articles_model->get_article($article_id);
        if (!$article) {
            show_404();
        }

        $this->require_permissions(ARTICLE, $article, VIEW);

        $parsed_result = $this->markdown($article->text, $article);

        $data['article_id'] = $article->id;
        $data['authors'] = $this->get_authors($article_id);
        $data['article_title'] = $article->title;
        $data['parsed_result'] = $parsed_result;
        if ($article->comments_enabled) {
            $data['comments_html'] = $this->comments_html('ARTICLE', $article);
        }
        $data['can_edit'] = $this->has_permissions(ARTICLE, $article, EDIT);

        $this->load_view($article->title, 'article_view', $data);
    }

    function create() {
        $this->require_login();
        $this->require_privileged();
        $data = array('starting_text' => 'Add text here.');
        $this->load_view('Create Article', 'article_create', $data);
    }

    function create_privileged() {
        if (!$this->is_current_session_privileged()) {
            show_error('Only privileged users can access this page.', 403);
        }

        $data = array('starting_text' => 'Add text here.',
                      'privileged' => '');
        $this->load_view('Create Article', 'article_create', $data);
    }

    // Verify that all authors are legitimate.
    function verify_authors() {
        $author = strtok($this->input->post('authors'), ",");
        while ($author != false) {
            $author = trim($author);
            if(!$this->users_model->does_username_exist($author)) {
                $this->form_validation->set_message('verify_authors',
                        'Invalid author userid: User ' . $author . ' does not exist');
                return false;
            }
            $author = strtok(",");
        }
        return true;
    }

    function create_article_error($error) {
        $data = array('starting_text' => $this->input->post('article_content'),
                'error' => $error);
        $this->load_view('Create Article', 'article_create', $data);
    }

    function edit_article_error($article_id, $version, $error) {
        $data = $this->prepare_article_edit_view_data_from_post($article_id, $version);
        $data['error'] = $error;
        $this->load_view('Edit Article', 'article_edit', $data);
    }

    function article_error($mode, $article_id, $version, $error) {
        if ($mode == CREATE || $mode == PRIVILEGED_CREATE) {
            $this->create_article_error($error);
        } else if ($mode == EDIT) {
            $this->edit_article_error($article_id, $version, $error);
        }
    }

    // article_id, version valid only if mode=EDIT
    function create_article($mode, $article_id, $version) {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('article_content', 'article content',
                'required|xss_clean');
        $this->form_validation->set_rules('title', 'title', 'required|xss_clean');
        $this->form_validation->set_rules('authors', 'authors',
                'callback_verify_authors|xss_clean');

        if ($this->form_validation->run() == FALSE)
        {
            $this->article_error($mode, $article_id, $version, validation_errors());
            return null;
        }

        $new_article['title'] = $this->input->post('title');
        $new_article['text'] = $this->input->post('article_content');

        $new_article['public'] = false;
        if ($this->input->post('is_public') === 'public') {
            $new_article['public'] = true;
        }
        $new_article['comments_enabled'] = false;
        if ($this->input->post('comments_enabled') === 'allowcomments') {
            $new_article['comments_enabled'] = true;
        }

        return $new_article;
    }

    function create_authors($mode, $article_id) {
        $current_user = $this->get_logged_in_user();
        if ($mode == CREATE) {
            $this->articles_model->add_author(
                    array('article_id' => $article_id,
                          'author_id' => $current_user->id));
        }

        $author = strtok($this->input->post('authors'), ",");
        while ($author != false) {
            $author = trim($author);

            // NOTE(kayvonf): Allowing current user to add themself.
            //if ($author == $current_user->username) {
            //    // next author
            //    $author = strtok(",");
            //    continue;
            //}

            $author_id = $this->users_model->get_user_by_username($author)->id;

            // FIXME(kayvonf): this code does not disallow the same author being added twice

            $this->articles_model->add_author(
                    array('article_id' => $article_id,
                          'author_id' => $author_id));

            // next author
            $author = strtok(",");
        }
    }


    function do_create() {
        $this->require_login();
        $new_article = $this->create_article(CREATE, -1, -1);
        if(!$new_article) {
            return;
        }

        $this->articles_model->add_article($new_article);
        $this->create_authors(CREATE, $this->db->insert_id());
        redirect(site_url('article'));
    }

    function do_create_privileged() {
        if (!$this->is_current_session_privileged()) {
            show_error('Only privileged users can perform this action', 403);
        }

        $new_article = $this->create_article(PRIVILEGED_CREATE, -1, -1);
        if(!$new_article) {
            return;
        }

        $this->articles_model->add_article($new_article);
        $this->create_authors(PRIVILEGED_CREATE, $this->db->insert_id());
        redirect(site_url('article'));
    }

    function get_authors($article_id) {

        $author_ids = $this->articles_model->get_article_authors($article_id);
        $authors = array();
        $i = 0;
        foreach($author_ids as $author_id) {
            $username = $this->users_model->get_username_by_id($author_id->author_id)->username;
            $authors[$i++] = array('username' => $username,
                                   'id' => $author_id->author_id);
        }
        return $authors;
    }

    function edit($article_id) {
        $this->require_login();
        $article = $this->articles_model->get_article($article_id);
        if (!$article) {
            show_404();
        }
        $this->require_permissions(ARTICLE, $article, EDIT);

        $data = $this->prepare_article_edit_view_data($article, $article_id);
        $this->load_view('Edit Article', 'article_edit', $data);
    }

    function ajax_delete_image() {

        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            // FIXME(kayvonf): this isn't a JSON response
            show_error("Can only delete through ajax");
            return;
        }

        $article_id = $this->input->post('article_id');
        $file_name = $this->input->post('filename');

        $user = $this->get_logged_in_user();
        $article = $this->articles_model->get_article($article_id);

        if (!$this->has_permissions(ARTICLE, $article, EDIT, $user)) {
            // FIXME(kayvonf): this isn't a JSON response
            show_error('Insufficient permissions');
            return;
        }

        $data = array();
        $data['article_id'] = $article_id;
        $data['file_name'] = $file_name;

        // TODO(kayvonf): should validate correctness of request (does
        // this image for this article actually exist?)

        $this->articles_model->delete_article_image($data);

        // TODO(mburman): delete the image from contents folder.  The
        // image is currently left on disk

        echo json_encode(array('result' => 'success'));
    }

    function ajax_delete_author() {

        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            // FIXME(kayvonf): this isn't a JSON response
            show_error("Can only delete through ajax");
            return;
        }

        $article_id = $this->input->post('article_id');
        $author_id = $this->input->post('author_id');

        $user = $this->get_logged_in_user();
        $article = $this->articles_model->get_article($article_id);

        if (!$this->has_permissions(ARTICLE, $article, EDIT, $user)) {
            // FIXME(kayvonf): this isn't a JSON response
            show_error('Insufficient permissions');
            return;
        }


        $this->articles_model->delete_author($article_id, $author_id);

        echo json_encode(array('result' => 'success'));
    }

    // FIXME(kayvonf): it would be wise to unify this method with
    // prepare_article_edit_view_data_from_post() below.  I'm not doing it
    // now because this logic gets exercised by a lot of on the site
    // and I do not have the time to do the appropriate correctness
    // testing right now.
    function prepare_article_edit_view_data($article, $article_id) {

        $data['article'] = $article;
        $data['article_id'] = $article_id;
        $data['article_images'] =
            $this->articles_model->get_article_images($article_id);
        $data['starting_title_text'] = $article->title;
        $data['starting_text'] = $article->text;
        $data['starting_additional_authors'] = '';
        if ($article->public) {
            $data['public'] = 'checked';
        } else {
            $data['public'] = '';
        }
        if ($article->comments_enabled) {
            $data['comments_enabled'] = 'checked';
        } else {
            $data['comments_enabled'] = '';
        }
        $data['version'] = $article->version;
        $data['authors'] = $this->get_authors($article_id);
        $data['paragraphs'] = $this->paragraphs_model->get_paragraphs_by_article($article_id);

        $data['attached_images_dir'] = $this->attached_images_dir;

        return $data;
    }

    // FIXME(kayvonf): See above comment in prepare_article_edit_view_data()
    function prepare_article_edit_view_data_from_post($article_id, $version) {

        $data['article'] = $this->articles_model->get_article($article_id);
        $data['article_id'] = $article_id;
        $data['article_images'] =
            $this->articles_model->get_article_images($article_id);
        $data['starting_title_text'] = $this->input->post('title');
        $data['starting_text'] = $this->input->post('article_content');
        $data['starting_additional_authors'] = $this->input->post('authors');
        $data['public'] = $this->input->post('is_public');
	$data['comments_enabled'] = $this->input->post('comments_enabled');
        $data['version'] = $version;

        // FIXME(kayvonf): BUG. If the post contains new *valid* author
        // info, then it will be discarded here since get_authors()
        // retrieves data from the dB
        $data['authors'] = $this->get_authors($article_id);

        $data['paragraphs'] = $this->paragraphs_model->get_paragraphs_by_article($article_id);

        $data['attached_images_dir'] = $this->attached_images_dir;

        return $data;
    }

    function do_edit($article_id, $version) {
        $this->require_login();
        $article = $this->articles_model->get_article($article_id);
        if (!$article) {
            show_404();
        }
        $this->require_permissions(ARTICLE, $article, EDIT);

        $this->require_post();

        log_message('debug', 'received! keep_editing = ' . $this->input->post('keep_editing') );

        if ($_FILES) {
            // Set configuration.
            $config['upload_path'] = $this->attached_images_localpath;
            $config['allowed_types'] = $this->config->item('allowed_image_types');
            $config['max_size'] = $this->config->item('max_image_size');
            $config['max_width']  = $this->config->item('max_image_width');
            $config['max_height']  = $this->config->item('max_image_height');
            $this->load->library('upload');
            $this->lang->load('upload', 'english');

            foreach ($_FILES as $key => $value) {
                if ($value['name']) {
                    $config['file_name'] = $article_id . "_" . ".jpg";
                    $this->upload->initialize($config);
                    if(!$this->upload->do_upload($key)) {
                        $data = $this->prepare_article_edit_view_data_from_post($article_id, $version);
                        $data['error'] = $this->upload->display_errors();
                        $this->load_view('Edit Article', 'article_edit', $data);
                        return;
                    }
                    // Upload success, update database
                    $image_data = $this->upload->data();
                    $data = array();
                    $data['article_id'] = $article_id;
                    $data['file_name'] = $image_data['file_name'];
                    $this->articles_model->add_article_image($data);
                }
            }
        }
        // TODO(mburman): race
        $current_version = $this->articles_model->get_article_version($article_id);
        if($current_version->version == $version) {

            // readies all the inputs
            $data = $this->create_article(EDIT, $article_id, $version);
            if ($data == null) {
                return;
            }

            // update authors table
            $this->create_authors(EDIT, $article_id);

            $data['version'] = ++$version;
            $this->articles_model->edit_article($article_id, $data);

            // FIXME(kayvonf): this form input is not validated in any way
            if ($this->input->post('keep_editing') == 'true')
                redirect('article/' . $article_id . '/edit');
            else
                redirect('article/' . $article_id );

        } else {
            // if the article has been edited in between, then don't
            // let the user submit.
            $data = $this->prepare_article_edit_view_data_from_post($article_id, $version);
            $data['error'] = 'WARNING: This article was modified while you were editing it. Your changes are still intact in the editor below, but you will not be able to submit to avoid overwriting someone else\'s changes.  Please view the current state of the article and click the edit button from that page to edit the most recent version. (You are advised to stash your changes before doing so.)';
            $this->load_view('Edit Article', 'article_edit', $data);
        }
    }

    function do_preview($article_id) {
        $this->require_login();
        // NOTE(kayvonf): this logic will look a lot like view()
        $article = $this->articles_model->get_article($article_id);
        if (!$article) {
            show_404();
        }
        $this->require_permissions(ARTICLE, $article, EDIT);

        $preview_title = $this->input->post('title');
        $preview_content = $this->input->post('article_content');

        $parsed_result = $this->markdown($preview_content, $article);

        $data['article_id'] = $article_id;

        // FIXME(kayvonf): BUG. If the post contains new *valid* author
        // info, then it will be discarded here since get_authors retrieves
        // data from dB
        $data['authors'] = $this->get_authors($article_id);

        $data['article_title'] = $preview_title;
        $data['parsed_result'] = $parsed_result;
        $data['view_mode'] = 'preview';
        $this->load_view('[PREVIEW] ' . $preview_title, 'article_view', $data);
    }

    function delete($article_id) {
        $this->require_login();
        $article = $this->articles_model->get_article($article_id);
        if (!$article) {
            show_404();
        }
        $this->require_permissions(ARTICLE, $article, DELETE);

        $this->articles_model->mark_article_as_deleted($article_id);
        redirect('article/');
    }
}
