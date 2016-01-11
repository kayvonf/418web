<?php

class Simple_pages extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    function index() {

    	$data = array();

        if ($this->is_current_session_privileged()) {
            $data['privileged_article_creation_link'] =
                '<a href="' . site_url('reference/create_privileged') .
                '">Create Article(Privileged)</a></p>';
        }

        $this->load_view("", "home", $data);
    }

    function courseinfo() {
        $staff_photos_url = $this->config->item('content_base_url') . '/staff_photos';
        $this->load_view("Course Information", "courseinfo", array('staff_photos_url' => $staff_photos_url));
    }

    function reading() {
        $data = array();
        $this->load_view("Lectures and Readings", 'reading', $data);
    }

    function exercises() {
    	$exercises_base_url = $this->config->item('content_base_url') . '/exercises';
        $data = array('exercises_base_url' => $exercises_base_url);
        $this->load_view("Exercises and Practice Problems", 'exercises', $data);
    }

    function welcome() {
        $user = $this->get_logged_in_user();
        $data = array('user_firstname' => $user->firstname);
        $this->load_view("Welcome", "welcome", $data);
    }

    function admin_console() {
        $this->require_login();
        $user = $this->get_logged_in_user();
        $this->require_privileged($user);

        $this->load_view("Admin Page", "admin", array());
    }

    function votes_overview() {
        $this->require_login();
        $user = $this->get_logged_in_user();
        $this->require_privileged($user);

        $this->load->model('votes_model');
        $top_comments = $this->votes_model->top_comments();
        $top_users = $this->votes_model->top_users();
        foreach ($top_comments as $comment) {
            $comment->body_html = $this->markdown($comment->body_markdown);
        }
        $this->load_view("Admin Page", "votes_overview", array('top_comments' => $top_comments, 'top_users' => $top_users));
    }

    // We need to extend CSRF tokens before they expire, or the next request
    // the user submits will error.
    function keep_alive() {
        if (!$this->input->is_ajax_request()) {
            // We want to deter users from accessing this page blindly.
            show_404('keep_alive', FALSE);
            return;
        }

        $this->ajax_return();
    }

}

?>
