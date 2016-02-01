<?php

include_once 'application/controllers/markdown/kf_markdown.php';

class AreeceParser extends MarkdownExtra_Parser {
    function AreeceParser($CI, $article) {
        // TODO(awreece) Don't parse stuff in mathjax.
        $this->span_gamut += array(
            # This has to be less than 10, because that's when images get parsed.
            'doCourseLinks' => 5
        );
        $this->article = $article;
        $this->CI = $CI;

        parent::MarkdownExtra_Parser();
    }

    function doCourseLinks($text) {
        $text = preg_replace_callback(
            "/classlecture:([\w-]+)\[([\w]+)\]/",
            function ($match) {
                return slide_url($match[1], $match[2]);
            }, $text);
        $text = preg_replace_callback(
            "/classlecture:([\w-]+)/",
            function ($match) {
                return lecture_url($match[1]);
            }, $text);
        $text = preg_replace_callback(
            "/classarticle:([\d]+)/",
            function ($match) {
                return article_url($match[1]);
            }, $text);

            
        // PHP is evil - we have to do this because the closures don't have
        // access to $this and it is protected so we can't use() it.
        $me = $this;

        $text = preg_replace_callback(
            "/classlecturevideo:([\w-]+)\[([\d]+)\]/",
            function ($match) use ($me) {
                return $me->CI->video_url($match[1], $match[2]);
            }, $text);
        $text = preg_replace_callback(
            "/classlecturevideo:([\w-]+)/",
            function ($match) use ($me) {
                return $me->CI->video_url($match[1]);
            }, $text);

        $text = preg_replace_callback(
            // TODO(awreece) This regex should match the one in paragraphs model.
            "/@classcomments:([\w]{1,16})@/",
            function ($match) use ($me) {
                if (!is_null($me->article)) {
                    if (!$me->CI->paragraphs_model->get_paragraph_by_article_and_name($me->article->id, $match[1])) {
                        // TODO(awreece) Put this message in comments_html?
                        return "`Invalid paragraph name: '" . $match[1] . "' from " . $match[0] . "`";
                    }

                    // We wrap in a div so the markdown parser treats its like html.
                    return "<span>".$me->CI->comments_html("ARTICLE", $me->article, $match[1], EXPAND)."</span>";
                } else {
                    // TODO(awreece) Do this validation on insert / edit, so this function can
                    // assume all comment tags are valid.
                    return "`Comment tag found when comments disabled: '" . $match[0] . "'`";
                }
            }, $text);

        // Parse span again so our html gets used.
        return $this->parseSpan($text);
    }
}

// Code Ignitor requires the name to start with "MY_".
// See http://ellislab.com/codeigniter/user-guide/general/core_classes.html
class MY_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('users_model');
        $this->load->model('comments_model');
        $this->load->model('paragraphs_model');
        $this->load->model('votes_model');
        $this->load->model('pageviews_model');
        $this->load->model('subscriptions_model');
        $this->load->helper('form');
        $this->load->helper('course_url');

        $this->pageviews_model->log_view($this->uri_string());
    }

    function ajax_return($data = array()) {
        echo json_encode($data);
        exit;
    }

    function ajax_error($message) {
        $this->ajax_return(array('error' => $message));
    }

    function uri_string()
    {
        $uri = uri_string();
        return $_SERVER['QUERY_STRING'] ? $uri.'?'.$_SERVER['QUERY_STRING'] : $uri;
    }


    function current_url()
    {
        $url = current_url();
        return $_SERVER['QUERY_STRING'] ? $url.'?'.$_SERVER['QUERY_STRING'] : $url;
    }

    function redirect_next($default = "/") {
        if ($this->session->userdata('redirect_url')) {
            $next = $this->session->userdata('redirect_url');
            $this->session->unset_userdata('redirect_url');
            redirect($next);
        } else {
            redirect(site_url($default));
        }
    }

    function prepare_user($user) {
        unset($user->id);
        unset($user->password);
        unset($user->password_salt);
        unset($user->email);
        unset($user->andrewid);
        unset($user->department);
        unset($user->year);
        unset($user->group);
        unset($user->encouragement_segment);
        $user->profile_picture_url = $this->config->item('content_base_url') .
            '/profile_pictures/' . $user->username . '.jpg';
    }

    function prepare_comment($comment, $current_user) {
        $is_privileged = $this->users_model->is_user_privileged($current_user);

        $comment->author = $this->users_model->get_user($comment->author);
        $this->prepare_user($comment->author);

        // Only privileged users can see edit author
        if ($is_privileged && $comment->edit_author) {
            $comment->edit_author = $this->users_model->get_user($comment->edit_author);
            $this->prepare_user($comment->edit_author);
        }

        // Preserve anonymity
        unset($comment->author->firstname);
        unset($comment->author->lastname);
        $comment->body_html = $this->markdown($comment->body_markdown);
        $comment->points = $this->votes_model->get_points_for_comment($comment, $current_user);

        // Only fetch the current vote and edit history for active comments
        if ($comment->state === ACTIVE) {
            $comment->current_user_vote = $this->votes_model->get_user_vote_on_comment($current_user, $comment);
            if ($is_privileged) {
                $comment->revision_history = $this->comments_model->get_comment_edit_history($comment->id);

                $comment_htmls = array();
                foreach($comment->revision_history as $c) {
                    $this->prepare_comment($c, $current_user);
                    $comment_htmls[] =  $this->comment_html($c, $current_user);
                }

                $defaults = array(
                    'comment_htmls' => $comment_htmls,
                    'display_style' => HISTORY,
                    'can_comment' => FALSE
                );
                $comment->revision_history_html = $this->load->view('comments_ajax', $defaults, true);
            }
        }
    }

    function comment_html($comment, $logged_in_user) {
    
        if ($comment->state === PRIVATE_COMMENT) {
            // Comment will always exist, don't need to pass in parent type,
            // parent id, parent item.
            return $this->load->view('private_comment', array(
                'comment' => $comment
            ), TRUE);
            
        } else if ($comment->state === INSTRUCTOR_COMMENT) {
            return $this->load->view('instructor_comment', array(
                'comment' => $comment,
                'user_can_make_instructor_comment' => $this->users_model->is_user_privileged($logged_in_user)
            ), TRUE);
        
        } else {
            $shorthand_url = $this->get_shorthand_url_for_resource($comment->parent_type, $comment->parent_id, $comment->parent_item);
            // TODO(caryy) Really really hacky. This is later replaced with the
            // correct prompt id because we don't know the correct prompt ID until
            // after we store it into the database.
            $shorthand_url .= "?from_email=1";

            $restate_msgs = $this->config->item('restate_comment_contexts');
            $question_msgs = $this->config->item('question_contexts');
            $rand_restate = mt_rand(0, count($restate_msgs) - 1);
            $rand_question = mt_rand(0, count($question_msgs) - 1);
            $rand_restate_msg = sprintf($restate_msgs[$rand_restate], $shorthand_url);
            $rand_question_msg = sprintf($question_msgs[$rand_question], $shorthand_url);
            // DO NOT change this to pass along logged_in_user. CodeIgniter caches
            // variables between loaded views, so setting logged_in_user will
            // affect the display of the header.
            return $this->load->view('comment_template', array(
                'comment' => $comment,
                'logged_in_username' => $logged_in_user->username,
                'logged_in_group' => $logged_in_user->group,
                'is_privileged' => $this->users_model->is_user_privileged($logged_in_user),
                // TODO(caryy): This is hacky
                'restate_msg' => str_replace('<<<NAME>>>', $comment->author->username, $rand_restate_msg),
                'question_msg' => $rand_question_msg
            ), TRUE);
        }
    }

    function comments_html($parent_type, $parent, $parent_item = NULL, $display_style = VISIBLE, $lightbox_selector = NULL) {
        $defaults = array('parent_type' => $parent_type,
                          'parent_id' => $parent->id,
                          'parent_item' => $parent_item);
        $comments = $this->comments_model->get_comments_matching($defaults);
        $user = $this->get_current_user();
        if ($this->session->userdata('user_id')) {
            $subscription_query = array('parent_type' => $parent_type,
                                        'parent_id' => $parent->id,
                                        'parent_item' => $parent_item,
                                        'user_id' => $user->id);
            $defaults['is_subscribed'] = $this->subscriptions_model->is_subscribed($subscription_query);
            $defaults['is_privileged'] = $this->users_model->is_user_privileged($user);
        } else {
            $defaults['is_subscribed'] = FALSE;
            $defaults['is_privileged'] = FALSE;
        }

        ////////////////////////////////////////////////////////////////////
        // handle "instructor comments", which is instructor-provided text 
        // directly underneath the slide. The idea of instructor comments is
        // that they could be the official slide summary.
        ////////////////////////////////////////////////////////////////////

        if (isset($parent->instructor_notes_enabled) && $parent->instructor_notes_enabled) {
        
            $instructor_comment = $this->comments_model->get_instructor_comment(
                $parent_type, $parent->id, $parent_item
            );

            if ($instructor_comment !== NULL) {
                $this->prepare_comment($instructor_comment, $user);
            }
            
            $defaults['instructor_html'] = $this->load->view('instructor_comment', array(
                'parent_type' => $parent_type,
                'parent_id' => $parent->id,
                'parent_item' => $parent_item,
                'comment' => $instructor_comment,
                'user_can_make_instructor_comment' => $this->users_model->is_user_privileged($user)
            ), TRUE);
            
            
        } else {

          $defaults['instructor_html'] = '';
        
        }
        
        ////////////////////////////////////////////////////////////////////  
        // handle "private comments", which are visible only to the current user
        ////////////////////////////////////////////////////////////////////
        
        $private_comment = $this->comments_model->get_private_comment(
            $user->id, $parent_type, $parent->id, $parent_item
        );
        if ($private_comment !== NULL) {
            $this->prepare_comment($private_comment, $user);
        }
        $defaults['private_html'] = $this->load->view('private_comment', array(
            'parent_type' => $parent_type,
            'parent_id' => $parent->id,
            'parent_item' => $parent_item,
            'comment' => $private_comment
        ), TRUE);

        ////////////////////////////////////////////////////////////////////
        // Now handle all the rest of the comments
        ////////////////////////////////////////////////////////////////////
        
        $comment_htmls = array();
        foreach($comments as $comment) {
            $this->prepare_comment($comment, $user);
            $comment_htmls[] = $this->comment_html($comment, $user);
        }
        $defaults['comment_htmls'] = $comment_htmls;

        $defaults['display_style'] = $display_style;
        if ($display_style == LIGHTBOX) {
            $defaults['lightbox_selector'] = $lightbox_selector;
        }
        $defaults['can_comment'] = $this->has_permissions($parent_type, $parent, COMMENT, $user);

        $shorthand_url = $this->get_shorthand_url_for_resource($parent_type, $parent->id, $parent_item);
        // TODO(caryy) Really really hacky. This is later replaced with the
        // correct prompt id because we don't know the correct prompt ID until
        // after we store it into the database.
        $shorthand_url .= "?from_email=1";
        $restate_msgs = $this->config->item('restate_lecture_contexts');
        $rand_restate = mt_rand(0, count($restate_msgs) - 1);
        $defaults['restate_msg'] = sprintf($restate_msgs[$rand_restate], $shorthand_url);

        return $this->load->view('comments_ajax', $defaults, TRUE);
    }

    function get_header_data($page_name) {
        $header_data = array();
        $header_data['page_name'] = $page_name;
	$header_data['course_name'] = $this->config->item('course_name');

        $user_id = $this->session->userdata('user_id');
        if ($user_id != '') {
            // TODO(awreece) Only look up user model once.
            $user = $this->users_model->get_user($user_id);
            $this->prepare_user($user);
            $header_data['logged_in_user'] = $user;
        }

        return $header_data;
    }

    function load_view($page_name, $view_name, $data, $debug=NULL) {
        $this->load->view('templates/header.php', $this->get_header_data($page_name));
        $this->load->view('templates/error.php', $data);
        // TODO(awreece) Pass current user to data.
        $this->load->view($view_name, $data);
        $this->load->view('templates/footer.php', array('debug_value' => $debug,
                                                        'google_analytics_id' => $this->config->item('google_analytics_id')));
    }

    function require_login() {
        if (!$this->session->userdata('user_id')) {
            // TODO(awreece) Use url parameter?
            $this->session->set_userdata('redirect_url', $this->current_url());
            redirect('users/login');
        }
    }

    function require_post() {
        if (!$this->input->is_post()) {
            $this->output->set_header("Allow: POST");
            show_error('Error: You must use POST for this URL', 405);
        }
    }

    public function is_current_session_privileged() {
        $current_user = $this->get_current_user();
        return $this->users_model->is_user_privileged($current_user);
    }

    private function show_default_permissions_error() {
        show_error("You do not have sufficient permissions", 403);
    }

    private function is_article_author($user, $article) {
        $authored_articles = $this->users_model->get_authored_articles($user->id);
        foreach($authored_articles as $authored_article) {
            if ($authored_article->article_id == $article->id) {
                return true;
            }
        }
        return false;
    }

    private function article_permissions($user, $article, $level) {
        switch($level) {
            case VIEW: {
                            return $article->public || $this->is_article_author($user, $article);
                       }
            case DELETE:
            case EDIT: {
                            return $this->is_article_author($user, $article);
                       }
            case COMMENT: {
                return $user->type != USER_TYPE_ANONYMOUS && 
                        $article->comments_enabled;
            }
        }
        return false;
    }

    function require_privileged($user = NULL) {
        if ($user == NULL) {
            $user = $this->get_logged_in_user();
        }
        if ($this->users_model->is_user_privileged($user)) {
            return;
        }
        $this->show_default_permissions_error();
    }

    private function lecture_permissions($user, $resource, $verb) {
        switch($verb) {
        case VIEW: {
            return true;
        }
        case DELETE: // Explicit fall through.
        case EDIT: {
            // TODO(awreece) Fix this: admins already have privs by here.
            return $this->users_model->is_user_privileged($user);
        }
        case COMMENT: {
            return $user->type != USER_TYPE_ANONYMOUS;
        }
        default:
            return false;
        }
    }

    function comment_permissions($user, $comment, $verb) {
        switch($verb) {
        case VIEW: {
            return true;
        }
        case DELETE: // Explicit fall through.
        case EDIT:
            return $user->id == $comment->author;
        case UPVOTE:
            return $user->type != USER_TYPE_ANONYMOUS &&
                $user->group !== NOVOTE_GROUP;
        case DOWNVOTE:
            return $user->type != USER_TYPE_ANONYMOUS &&
                $user->group === UPDOWNVOTE_GROUP;
        default:
            return false;
        }
    }
    
    // $user - optional - retreives current logged in user if not specified
    // $resource_type - type of resource being requested access to.
    // $resouce_id - id of resource being requested access to.
    // $permissions_level - the level of permission being asked for
    function has_permissions($resource_type, $resource, $permissions_level,
            $user = NULL) {
       if ($user == NULL) {
            $user = $this->get_current_user();
       }

        // Privileged users have access to everything.
        if($this->users_model->is_user_privileged($user)) {
            return true;
        }

        switch($resource_type) {
            case ARTICLE: return $this->article_permissions($user, $resource,
                                  $permissions_level);
            case LECTURE: 
                return $this->lecture_permissions($user, $resource, $permissions_level);

            case COMMENT:
                return $this->comment_permissions($user, $resource, $permissions_level);

            default: return false;
        }
    }

    function require_permissions($resource_type, $resource, $permissions_level,
            $user = NULL) {
        if ($user == NULL) {
             $user = $this->get_current_user();
        }
        if(!$this->has_permissions($resource_type, $resource, $permissions_level,
            $user)) {
            if ($user->type == USER_TYPE_ANONYMOUS) {
                $this->require_login();
            } else {
                $this->show_default_permissions_error();
            }
        }
    }

    // Returns current user, or an anonymous user object if not logged in.
    function get_current_user() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            // TODO(awreece) Full fleged user class please.
            return (object) array(
                'type' => USER_TYPE_ANONYMOUS,
                'id' => -1,
                'username' => 'INVALID<>USERNAME',
                'group' => NOVOTE_GROUP
            );
        } else {
            return $this->users_model->get_user($user_id);
        }
    }

    // Get the logged in user (forces login if not logged in).
    function get_logged_in_user() {
        $this->require_login();
        $user_id = $this->session->userdata('user_id');
        return $this->users_model->get_user($user_id);
    }

    function markdown($text, $article = NULL) {
        $parser = new AreeceParser($this, $article);
        return trim($parser->transform($text));
    }
    
    function video_url($lecture_shortname, $start_time = 0) {
            $lecture = $this->lectures_model->get_lecture_by_shortname($lecture_shortname);
            if (!$lecture) {
                return "Invalid lecture " . $lecture_shortname;
            }
            if (!isset($lecture->video_url)) {
                return "No video for lecture " . $lecture_shortname;
            }
            return $lecture->video_url . "&start=" . $start_time;
        }

    function get_url_for_resource($noun_type, $noun_id, $noun_item) {
        switch ($noun_type) {
        case ARTICLE:
            return site_url('article/' . $noun_id);
        case LECTURE:
            $lecture = $this->lectures_model->get_lecture($noun_id);
            // comment on a slide
            if ($noun_item != NULL) {
                return slide_url($lecture->shortname, $noun_item);
            } else {
                return lecture_url($lecture->shortname);
            }
        case COMMENT:
            $comment = $this->comments_model->get_comment($noun_id, ACTIVE);
            return $this->get_url_for_resource($comment->parent_type, $comment->parent_id, $comment->parent_item);
        }
    }

    function get_shorthand_url_for_resource($noun_type, $noun_id, $noun_item) {
        switch ($noun_type) {
        case ARTICLE:
            return "classarticle:$noun_id";
        case LECTURE:
            $lecture = $this->lectures_model->get_lecture($noun_id);
            $shorthand = 'classlecture:' . $lecture->shortname;

            // comment on lecture summary
            if ($noun_item == NULL) {
                return $shorthand;
            }

            return $shorthand . '[' . $noun_item . ']';
        }
    }


}



