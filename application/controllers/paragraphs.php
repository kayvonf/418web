<?php

class Paragraphs extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('paragraphs_model');
        $this->load->helper('form');
    }

    function ajax_delete_paragraph() {
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
                // TODO(awreece) Better error code?
                show_error("Can only add through ajax"); 
                return;
        }
        
        $user = $this->get_logged_in_user();

        // TODO(awreece) Verify edit article privs.

        $article_id = $this->input->post('article_id');
        $name = $this->input->post('name');
    
        $comments = $this->comments_model->get_comments_matching(array(
            'parent_type' => ARTICLE,
            'parent_id' => $article_id,
            'parent_item' => $name
        ));
        if ($comments) {
            $this->ajax_error("Cannot delete - there are active comments for this tag.");
        }

        // TODO(awreece) Validate valid name.
        $err = $this->paragraphs_model->delete_paragraph($article_id, $name);
        log_message('debug', "deleting " . $name . " from " . $article_id . ": " . $err);
        $this->ajax_return();
    }

    function ajax_add_paragraph() {
        $this->require_login();
        $this->require_post();

        if (!$this->input->is_ajax_request()) {
                // TODO(awreece) Better error code?
                show_error("Can only add through ajax"); 
                return;
        }
        
        $user = $this->get_logged_in_user();

        // TODO(awreece) Verify edit article privs.

        $article_id = $this->input->post('article_id');
        $use_random_name = $this->input->post('use_random_name');

        if ($use_random_name) {
            $name = NULL;
        } else{
            $name = $this->input->post('name');
        }

        // TODO(awreece) Validate here.

        // TODO(awreece) Check for error here.
        $name = $this->paragraphs_model->add_paragraph($article_id, $name);
        $html = $this->load->view('paragraph_tag_template', array(
            'name' => $name
        ), TRUE);
        echo json_encode(array('name' => $name, 'html' => $html));        
    }
}
