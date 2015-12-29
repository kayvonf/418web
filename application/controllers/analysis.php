<?php

class Analysis extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    function index() {

        $this->require_login();
        $user = $this->get_logged_in_user();
        $this->require_privileged($user);

        $views = $this->pageviews_model->get_all();

        $data['pageviews'] = array();

        foreach ($views as $view) {

            $data['pageviews'][] = $view;
        }

        $this->load_view("Analysis", "analysis", $data);
    }
}

?>
