<?php

class newsfeed extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('articles_model');
        $this->load->model('lectures_model');
        $this->load->model('slides_model');
        $this->load->model('newsfeed_model');
        $this->load->model('comments_model');
        $this->load->model('votes_model');
        $this->load->helper(array('form', 'url', 'course_url'));
    }

    function get_upvote_event_info($event, $event_type) {
        $comment_id = $event_type->noun_id;
        $comment = $this->comments_model->get_comment($comment_id, ACTIVE);

        // For deleted comments.
        if (!$comment) {
            log_message('debug', "Skipping comment on " . json_encode($event_type));
            return NULL;
        }

        $comment_author = $this->users_model->get_user($comment->author);
        $vote_author = $this->users_model->get_user($event->author_id);

        $strings['image'] = $this->config->item('content_base_url') .
            '/profile_pictures/' . $vote_author->username . ".jpg";
        $strings['created'] = $event->last_modified;

        $link = $this->get_link_for_resource(
                $comment->parent_type, $comment->parent_id, $comment->id, $comment->parent_item);

        $vote_author = '<span class="bold_text">' . $vote_author->username . '</span>';
        $comment_author = $comment_author->username;

        $possessive = '\'s';
        if ($comment_author[strlen($comment_author)-1] == 's') {
            $possessive = '\'';
        }

        $strings['text'] =
            $vote_author .  ' upvoted ' . $comment_author . $possessive . ' comment on ' . $link;
        return $strings;
    }

    function get_comment_event_info($event, $event_type, $current_user) {
        $comment_id = $event->verb_id;
        $comment = $this->comments_model->get_comment($comment_id, ACTIVE);

        // For deleted comments.
        if (!$comment) {
            log_message('debug', "Skipping comment on " . json_encode($event_type));
            return NULL;
        }

        $user = $this->users_model->get_user($comment->author);
        $point_count = $this->votes_model->get_points_for_comment($comment, $current_user);
        $strings['image'] = $this->config->item('content_base_url') . '/profile_pictures/' . $user->username . ".jpg";
        $strings['created'] = $event->last_modified;

        // For the no vote group
        if ($point_count !== NULL) {
            $strings['point_count'] = $point_count;
        }

        $strings['comment_brief'] = substr($comment->body_markdown, 0, 240);
        if (strlen($comment->body_markdown) > 240) {
            $strings['comment_brief'] = $strings['comment_brief'] . ' ...';
        }
        $strings['html'] = $this->markdown($comment->body_markdown);
        $strings['text'] = $this->create_event_string($event, $event_type);
        return $strings;
    }

    function index() {
        // TODO(mburman) This should be a config.
        $events = $this->newsfeed_model->get_events(50);
        $this->create_feed($events, NEWSFEED);
    }


    private function create_feed($events, $type) {
        $i = 0;
        $strings = array();
        $current_user = $this->get_current_user();
        foreach($events as $event) {
            $event_type = $this->newsfeed_model->get_event_type($event->event_type_id);

            $temp = NULL;
            if ($event_type->verb_type == COMMENT) {
                $temp = $this->get_comment_event_info($event, $event_type, $current_user);
            // TODO(caryy) Pass this a real comment instead of null
            } elseif ($this->has_permissions(COMMENT, null, UPVOTE, $current_user) &&
                $event_type->verb_type == UPVOTE)
            {
                $temp = $this->get_upvote_event_info($event, $event_type);
            }

            if ($temp != NULL) {
                $strings[$i++] = $temp;
            }
        }

        $data['strings'] = $strings;

        if ($type == NEWSFEED) {
            $data['type'] = 'What\'s Going On';
        } else {
            $data['type'] = 'Your Activity';
        }

        $this->load_view('What\'s New', 'newsfeed', $data);
    }

    function list_activity($username) {
        // TODO(mburman): tie this into the permissions API
        $logged_in_user = $this->get_logged_in_user();

        // If you are trying to view another user's comments
        if ($logged_in_user->username != $username) {
            // You have to be privileged.
            if (!$this->users_model->is_user_privileged($logged_in_user)) {
                show_error('You are not authorized to view this page', 403);
            }
        }

        // Logged in user not necessarily the user we want to get the list
        // for, so retrieve the user again.
        $user = $this->users_model->get_user_by_username($username);
        if (!$user) {
            return;
        }
        $events = $this->newsfeed_model->get_events_for_author($user);
        $this->create_feed($events, USER_ACTIVITY_FEED);
    }

    private function get_verb_string($verb) {
        switch ($verb) {
            case COMMENT: return 'commented on';
            case CREATE: return 'created';
            case EDIT: return 'edited';
            case UPVOTE: return 'upvoted';
        }
    }

    private function get_link_for_resource($noun_type, $noun_id, $verb_id, $noun_item) {
        switch ($noun_type) {
            case ARTICLE: {
                              $article = $this->articles_model->get_article($noun_id);
                              return '<a href="' . site_url('article/' .
                                  $noun_id) . '">' . $article->title . '</a>';
                          }
            case LECTURE: {
                              // comment on a slide
                              if ($noun_item != NULL) {
                                  $comment = $this->comments_model->get_comment($verb_id, ACTIVE);
                                  $lecture =
                                      $this->lectures_model->get_lecture($comment->parent_id);
                                  $slide_url= slide_url($lecture->shortname, $comment->parent_item);
                                  $lecture_url = lecture_url($lecture->shortname);
                                  return "<a href='$slide_url'>$comment->parent_item</a> of <a href='$lecture_url'>$lecture->title</a>";
                              } else {
                                  $comment =
                                      $this->comments_model->get_comment($verb_id, ACTIVE);
                                  $lecture =
                                      $this->lectures_model->get_lecture($comment->parent_id);
                                  $url = lecture_url($lecture->shortname);
                                  return "<a href='$url'>$lecture->title</a>";
                              }
                        }
        }
    }

    private function create_event_string($event, $event_type) {
        $author_name =
            $this->users_model->get_username_by_id($event->author_id)->username;
        $verb = $this->get_verb_string($event_type->verb_type);
        $url = $this->get_link_for_resource($event_type->noun_type,
                $event_type->noun_id, $event->verb_id, $event_type->noun_item);
        $author_name =
            '<span class="bold_text">' . $author_name . '</span>';
        return "$author_name $verb $url";
    }
}
?>

