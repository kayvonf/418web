<?php


class Comments extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('comments_model');
        $this->load->model('users_model');
        $this->load->model('lectures_model');
        $this->load->model('slides_model');
        $this->load->helper('form');
        $this->load->model('paragraphs_model');
        $this->load->model('articles_model');
        $this->load->model('subscriptions_model');
        $this->load->model('prompts_model');

        $this->load->library('email');
        $this->email->from($this->config->item('course_email'), $this->config->item('email_display_name'));

        $this->load->helper('file');
        $this->load->helper('download');
    }

    function participated() {
        $this->require_login();
        $this->require_privileged($this->get_logged_in_user());
        $users = $this->comments_model->users_who_participated_this_week();
        $data = array("users" => $users);
        $this->load_view("List of Users who Participate", "participating_users", $data);
    }

    function comments_csv() {
        $this->require_login();
        $this->require_privileged($this->get_logged_in_user());

        # TODO(caryy): Yes, it's bad style to put queries into our controller.
        # However, all of our model methods always return $query->result, so it
        # would be inconsistent to have one of the model methods return $query.
        $this->load->dbutil();
        $this->load->database();
        $this->db->where('state', ACTIVE);
        $comments = $this->db->get('comments');
        $data = $this->dbutil->csv_from_result($comments, ',', "\r\n");
        force_download('comments.csv', $data);
    }

    function prompts_csv() {
        $this->require_login();
        $this->require_privileged($this->get_logged_in_user());

        # TODO(caryy): Yes, it's bad style to put queries into our controller.
        # However, all of our model methods always return $query->result, so it
        # would be inconsistent to have one of the model methods return $query.
        $this->load->dbutil();
        $this->load->database();
        $prompts = $this->db->query(<<<EOT
SELECT s.*,
    GROUP_CONCAT(u2.id ORDER BY u2.id SEPARATOR ', ') AS recipients,
    u1.username AS author
FROM sent_prompts s
LEFT JOIN users u1 ON u1.id = s.author_id
LEFT JOIN students_prompted p ON s.id = p.prompt_id
LEFT JOIN users u2 ON u2.id = p.student_id
GROUP BY s.id
EOT
        );
        $data = $this->dbutil->csv_from_result($prompts, ',', "\r\n");
        force_download('prompts.csv', $data);
    }

    function list_all() {
        $this->require_login();
        $this->require_privileged($this->get_logged_in_user());
        $comments = $this->comments_model->get_comments();

        // TODO(awreece) This is actually a bug, it expects user data for comments, not id!
        $data = array('comments' => $comments);

        $this->load_view("List of Comments", "comment_list", $data);
    }

    function prompts() {
        $this->require_login();
        $this->require_privileged();

        $prompts = $this->prompts_model->get_all_prompts();
        foreach ($prompts as $p) {
            $links = $this->get_link_for_resource($p->parent_type, $p->parent_id, $p->parent_item);
            $p->source_url = $links[1];

            $p->message = $this->markdown($p->message);
        }

        $this->load_view("List of Prompts", "prompt_list", array('prompts' => $prompts));
    }

    function is_valid_comment_data($data, $user) {
        if (empty($data['body_markdown'])) {
            show_error("Cannot submit an empty comment");
            return FALSE;
        }
        if (!is_numeric($data['parent_id']) || $data['parent_id'] < 0) {
            show_error("Invalid parent_id");
            return FALSE;
        }
        if ($data['parent_type'] == 'LECTURE') {
            $lecture = $this->lectures_model->get_lecture($data['parent_id']);
            if (!$lecture) {
                show_error("No lecture found");
                return FALSE;
            } 
            if (isset($data['parent_item'])) {
                $slide = $this->slides_model->get_slide_by_lecture_and_name($lecture, $data['parent_item']);
                if (!$slide) {
                    show_error("Invalid slide number");
                    return FALSE;
                }
            }
            return $this->has_permissions('LECTURE', $lecture, 'COMMENT', $user);
        } else if ($data['parent_type'] == 'ARTICLE') {
            $article = $this->articles_model->get_article($data['parent_id']);
            if (!$article) {
                show_error("No article found");
                return FALSE;
            } 
            if (isset($data['parent_item'])) {
                $paragraph = $this->paragraphs_model->get_paragraph_by_article_and_name($data['parent_id'], $data['parent_item']);
                if (!$paragraph) {
                    show_error("Invalid paragraph");
                    return FALSE;
                }
            }
            return $this->has_permissions('ARTICLE', $article, 'COMMENT', $user);
        } else {
            return FALSE;
        }
        return TRUE;
    }

    function _common_mutate_comment() {
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            // TODO(awreece) Better error code?
            show_error("Can only add through ajax");
            return NULL;
        }

        $id = $this->input->post('id');
        if (!is_numeric($id)) {
            show_error("Invalid comment id");
            return NULL;
        }
        $user = $this->get_logged_in_user();
        $comment = $this->comments_model->get_comment($id, array(ACTIVE, PRIVATE_COMMENT, INSTRUCTOR_COMMENT));
        if (!$comment) {
            show_error("No such comment");
            return NULL;
        }

        // TODO(awreece) Only query db once. Actually, we don't need to query here.
        // TODO(mburman) Use auth API.
        if (!$this->users_model->is_user_privileged($user) && $comment->author != $user->id) {
            show_error("This user cannot do that");
            return NULL;
        }
        return $comment;
    }

    function ajax_edit_comment() {

        $comment = $this->_common_mutate_comment();
        if (is_null($comment)) {
            $this->ajax_error("Comment not found");
        }

        // TODO(awreece) Only query db once. Actually, we don't need to query here.
        $user = $this->get_logged_in_user();

        $new_markdown = $this->input->post('body_markdown', TRUE);  # XSS filter data.
        if (strlen($new_markdown) == 0) {
            $this->ajax_error("Cannot submit an empty comment");
        }

        $edit_reason = NULL;
        if ($comment->author != $user->id) {
            $edit_reason = $this->input->post('edit_reason', TRUE);  # XSS filter data.
            if ($edit_reason !== NULL && strlen($edit_reason) == 0) {
                $this->ajax_error("Cannot edit another user's comment without leaving a reason");
            }
        }
        $this->comments_model->update_comment($comment, $user, $new_markdown, $edit_reason);

        // TODO(awreece) Only query db once?
        $comment = $this->comments_model->get_comment($comment->id, array(ACTIVE, PRIVATE_COMMENT, INSTRUCTOR_COMMENT));
        $this->prepare_comment($comment, $user);
        $comment_html = $this->comment_html($comment, $user);

        $this->ajax_return(array('comment_html' => $comment_html));
    }

    function ajax_delete_comment() {
        $comment = $this->_common_mutate_comment();
        if ($comment) {
            // TODO(awreece) There is a bit of race here, if someone else deletes 
            // the comment first, but I don't think we care.
            $this->comments_model->delete_comment($comment->id);                
        }
    }

    function ajax_archive_comment() {
        $comment = $this->_common_mutate_comment();
        if ($comment) {
            // TODO(awreece) There is a bit of race here, if someone else deletes 
            // the comment first, but I don't think we care.
            $this->comments_model->archive_comment($comment->id);                
        }
    }

    function ajax_comment_vote() {
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            show_error("Must submit through ajax");
        }

        $id = $this->input->post('id');
        if (!is_numeric($id)) {
            $this->ajax_error("Invalid comment id");
        }
        $user = $this->get_logged_in_user();
        $comment = $this->comments_model->get_comment($id, ACTIVE);
        if (!$comment) {
            $this->ajax_error("No such comment");
        }

        $vote_type = $this->input->post('vote_type');
        $vote_type = $vote_type ? $vote_type : NULL;
        if (!is_null($vote_type) && !$this->has_permissions(COMMENT, $comment, $vote_type, $user)) {
            $this->ajax_error("Invalid privileges");
        }

        $new_points = $this->votes_model->vote($comment, $user, $vote_type);

        $this->ajax_return(array('num_points' => $new_points));
    }

    function add_special_comment($special_comment_type) {
    
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            // TODO(awreece) Better error code?
            show_error("Can only add through ajax");
            return;
        }

        $user = $this->get_logged_in_user();

        $data = array(
            'state' => $special_comment_type,
            'parent_type' => $this->input->post('parent_type'),
            'parent_id' => $this->input->post('parent_id'),
            'body_markdown' => $this->input->post('body_markdown', TRUE), # XSS filter data.
            'author' => $user->id
        );
        $parent_item = $this->input->post('parent_item');
        // And this is why PHP is evil.
        if ($parent_item !== FALSE) {
            $data['parent_item'] = $parent_item;
        }

        if (!$this->is_valid_comment_data($data, $user)) {
            show_error("Invalid comment");
            return;
        }

        $this->comments_model->add_comment($data);

        $comment = $this->comments_model->get_comments_matching($data);
        $comment = $comment[0];

        $this->prepare_comment($comment, $user);

        $this->ajax_return(array(
            'html' => $this->comment_html($comment, $user)
        ));    
    }
    
    function ajax_add_private_comment() {
        $this->add_special_comment(PRIVATE_COMMENT);
    }

    function ajax_add_instructor_comment() {
        $this->add_special_comment(INSTRUCTOR_COMMENT);
    }
    
    function ajax_add_comment() {
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            // TODO(awreece) Better error code?
            show_error("Can only add through ajax"); 
            return;
        }

        $user = $this->get_logged_in_user();
        
        $data = array(
            'parent_type' => $this->input->post('parent_type'),
            'parent_id' => $this->input->post('parent_id'),
            'body_markdown' => $this->input->post('body_markdown', TRUE),  # XSS filter data.
            'author' => $user->id
        );
        $parent_item = $this->input->post('parent_item');
        // And this is why PHP is evil.
        if ($parent_item !== FALSE) {        
            // TODO(awreece) Validate parent_item exists.
            $data['parent_item'] = $parent_item;
        }

        if (!$this->is_valid_comment_data($data, $user)) {
            show_error("Invalid comment");
            return;
        }        
        
        $this->comments_model->add_comment($data);

        $comment = $this->comments_model->get_comments_matching($data);
        $comment = $comment[0];

        $this->prepare_comment($comment, $user);

        // TODO(caryy) Should probably validate this data
        $subscription_query = array(
            'parent_type' => $this->input->post('parent_type'),
            'parent_id' => $this->input->post('parent_id'),
            'parent_item' => $parent_item ? $parent_item : NULL
        );

        // Create notification emails for all subscribed users
        list ($plaintext_desc, $desc) = $this->get_link_for_resource(
            $subscription_query['parent_type'],
            $subscription_query['parent_id'],
            $subscription_query['parent_item']
        );

        // TODO(caryy) Real dynamic style inlining.
        // This is really, really hacky.
        $blockquote_tag = '<blockquote style="background-color: #f9f9f9; border-left: 10px solid #cccccc; margin: 15px 10px; padding: 5px 10px; font-style: italic;">';
        $styled_html = str_replace('<blockquote>', $blockquote_tag, $comment->body_html);

        $email_data = array(
            'author' => $user->username,
            'plaintext_desc' => $plaintext_desc,
            'desc' => $desc,
            'date' => date('m/d/y g:iA', strtotime($comment->created)),
            'html' => $styled_html
        );
        $message = $this->load->view('email/reply_notification', $email_data, TRUE);
        $this->email->message($message);
        // TODO(caryy) Extract this string out of the controller
        $this->email->subject("New comment on $plaintext_desc");

        $subscribed_users = $this->subscriptions_model->get_subscribers_matching($subscription_query);
        $subscribed_emails = array();
        foreach($subscribed_users as $user_id) {
            if ($user_id !== $user->id) {
                $cur_user = $this->users_model->get_user($user_id);
                $subscribed_emails[] = $cur_user->email;
            }
        }
        // CodeIgniter's Email library has a bug: sendmail only accepts strings
        // for its recipient, but by default, it uses an array, and only changes
        // it to a string if the `to` method is called.
        $this->email->to(array());
        $this->email->bcc($subscribed_emails);
        $this->email->send();

        $num_emails_sent = count($subscribed_users);
        if ($num_emails_sent === 1) {
            log_message('info', 'Sent 1 email');
        } else {
            log_message('info', 'Sent '.$num_emails_sent.' emails');
        }

        $subscription_query['user_id'] = $this->session->userdata('user_id');

        // TODO(caryy) Reduce database roundtrips
        if (!$this->subscriptions_model->is_subscribed($subscription_query)) {
            $this->subscriptions_model->subscribe($subscription_query);
        }

        $this->ajax_return(array(
            'html' => $this->comment_html($comment, $user),
            'subscribed' => TRUE
        ));
    }

    // TODO(caryy) Duplicate function from newsfeed
    private function get_link_for_resource($noun_type, $noun_id, $noun_item) {
        switch ($noun_type) {
        case ARTICLE:
        {
            $article = $this->articles_model->get_article($noun_id);
            return array(
                $article->title,
                '<a href="' . site_url('article/' . $noun_id) . '">' .
                    $article->title . '</a>'
            );
        }
        case LECTURE:
        {
            // comment on a slide
            if ($noun_item != NULL) {
                $lecture = $this->lectures_model->get_lecture($noun_id);
                $slide_url = slide_url($lecture->shortname, $noun_item);
                $lecture_url = lecture_url($lecture->shortname);
                return array(
                    "$noun_item of $lecture->title",
                    "<a href='$slide_url'>$noun_item</a> of <a href='$lecture_url'>$lecture->title</a>"
                );
            } else {
                $lecture = $this->lectures_model->get_lecture($noun_id);
                $url = lecture_url($lecture->shortname);
                return array(
                    $lecture->title,
                    "<a href='$url'>$lecture->title</a>"
                );
            }
        }
        case COMMENT:
        {
            $comment = $this->comments_model->get_comment($noun_id, ACTIVE);
            return $this->get_link_for_resource($comment->parent_type, $comment->parent_id, $comment->parent_item);
        }
        }
    }

    function ajax_toggle_subscribe() {
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
            // TODO(caryy) Better error code?
            show_error('Can only access this endpoint through AJAX');
            return;
        }

        // TODO(caryy) Should probably validate this data
        $parent_item = $this->input->post('parent_item');
        $data = array(
            'user_id' => $this->session->userdata('user_id'),
            'parent_type' => $this->input->post('parent_type'),
            'parent_id' => $this->input->post('parent_id'),
            'parent_item' => $parent_item ? $parent_item : NULL
        );

        // TODO(caryy) Reduce database roundtrips
        if ($this->subscriptions_model->is_subscribed($data)) {
            $this->subscriptions_model->unsubscribe($data);
            $this->ajax_return(array('subscribed' => FALSE));
        } else {
            $this->subscriptions_model->subscribe($data);
            $this->ajax_return(array('subscribed' => TRUE));
        }
    }

    function ajax_prompt_students() {
        $this->require_login();
        $this->require_post();

        $user = $this->get_logged_in_user();
        $this->require_privileged($user);

        if (!$this->input->is_ajax_request()) {
            // TODO(caryy) Better error code?
            show_error('Can only access this endpoint through AJAX');
            return;
        }

        // Choose an encouragement prefix
        $encouragement_choices = array(
            NEUTRAL_ENCOURAGEMENT,
            POSITIVE_ENCOURAGEMENT
        );
        $rand_idx = mt_rand(0, count($encouragement_choices) - 1);

        if ($rand_idx == 0) {
            $all_prefixes = $this->config->item('neutral_prefixes');
        } else {
            $all_prefixes = $this->config->item('positive_prefixes');
        }
        $prefix = $all_prefixes[mt_rand(0, count($all_prefixes) - 1)];

        // Get the context the TA/instructor wrote.
        $prompt_context = $this->input->post('prompt_context');
        if (!$prompt_context || empty($prompt_context)) {
            $this->ajax_error('Cannot prompt with an empty message.');
        }

        // Get quoted text, if there is any.
        $parent_type = $this->input->post('parent_type');
        $parent_id = $this->input->post('parent_id');
        $parent_item = $this->input->post('parent_item');
        $parent_item = $parent_item ? $parent_item : NULL;

        $prompt_type = $this->input->post('prompt_type');
        if ($parent_type === LECTURE) {
            $prompt_type = 'RESTATE';
        }

        if (!$prompt_type || !$parent_type || !$parent_id) {
            $this->ajax_error('Malformed request');
        }
        if ($parent_type === COMMENT) {
            $comment = $this->comments_model->get_comment($parent_id, ACTIVE);
            if (!$comment) {
                $this->ajax_error('Malformed request');
            }
            $quoted_md = '> ' . str_replace("\n", "\n> ", $comment->body_markdown);
        } else if ($parent_type === LECTURE) {
            $quoted_md = '';
        } else {
            $this->ajax_error('Invalid type to prompt from.');
        }
        $prompt_message = "$prefix\n\n$prompt_context\n$quoted_md";

        // Select the students to send the message to.
        $random_students = $this->users_model->get_random_students(
            $this->config->item('num_students_prompted'),
            array(
                'id !=' => $parent_type === COMMENT ? $comment->author : -1,
                'encouragement_segment' => $encouragement_choices[$rand_idx]
            )
        );

        // When the site just starts up, it's possible there are no student users
        if (count($random_students) === 0) {
            $this->ajax_error('No students to prompt!');
        }

        // We've already checked our imputs, so our function shouldn't be able
        // to fail from this point forward. Therefore, we record the prompt as
        // sent now.
        $prompt_id = $this->prompts_model->record_sent_prompts($user->id,
            $prompt_message, $random_students, $prompt_type,
            $encouragement_choices[$rand_idx],
            $parent_type, $parent_id, $parent_item
        );
        // TODO(caryy) Suuuuper super hacky. Would not recommend.
        $prompt_message = str_replace('?from_email=1', '?from_email=' . $prompt_id, $prompt_message);

        // TODO(caryy) Real dynamic style inlining.
        // This is really, really hacky.
        $prompt_html = $this->markdown($prompt_message);
        $blockquote_tag = '<blockquote style="background-color: #f9f9f9; border-left: 10px solid #cccccc; margin: 15px 10px; padding: 5px 10px; font-style: italic;">';
        $prompt_html = str_replace('<blockquote>', $blockquote_tag, $prompt_html);

        $slide_url = $this->get_url_for_resource($parent_type, $parent_id, $parent_item);

        $email_data = array(
            'title' => $this->config->item('prompt_email_title'),
            'html' => $prompt_html,
            'slide_link_tag' => $slide_url,
            'site_url' => site_url('')
        );
        $message = $this->load->view('email/prompt_message', $email_data, TRUE);
        $this->email->message($message);
        $this->email->subject($this->config->item('prompt_email_title'));

        $email_addrs = array();
        $student_usernames = array();
        foreach($random_students as $student) {
            $email_addrs[] = $student->email;
            $student_usernames[] = $student->username;
        }
        // CodeIgniter's Email library has a bug: sendmail only accepts strings
        // for its recipient, but by default, it uses an array, and only changes
        // it to a string if the `to` method is called.
        $this->email->to(array());
        $this->email->bcc($email_addrs);
        $this->email->send();

        switch (count($random_students)) {
        case 1:
            $sent_users = $student_usernames[0];
            break;
        case 2:
            $sent_users = $student_usernames[0] . " and " . $student_usernames[1];
            break;
        default:
            $sent_users = implode(', ', array_slice($student_usernames, 0, -1))
                . ', and ' . end($student_usernames);
        }
        $plural = count($random_students) != 1 ? 's' : '';
        $this->ajax_return(array('message' => "Sent prompt$plural to $sent_users!"));
    }
}
