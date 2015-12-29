<?php

class Articles_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_article($data) {
        return $this->db->insert('articles', $data);
    }

    public function get_all() {
        $query = $this->db->get('articles');
        return $query->result();
    }

    public function get_article($id) {
        $query = $this->db->get_where('articles', array('id' => $id));
        return $query->row();
    }
  }

?>