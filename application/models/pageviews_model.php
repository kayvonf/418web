<?php

class Pageviews_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library("session");
    }

    public function log_view($site_url) {
        $data = $this->session->all_userdata();
        unset($data['user_data']);
        unset($data['redirect_url']);
        // TODO(awreece) Rather than unsetting the bad things, only use the
        // good things.
        $data['site_url'] = $site_url;
        // Note: MySQL id cannot be 0.
        if ($this->session->userdata('user_id')) {
            $data['user_id'] = $this->session->userdata('user_id');
        }
        $this->db->insert('pageviews', $data);
    }

    public function get_all() {
        $query = $this->db->get('pageviews');
        return $query->result();
    }
}

?>
