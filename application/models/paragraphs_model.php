<?php

class Paragraphs_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function new_random_name() {
        // TODO(awreece) No magic constants.
        return substr(md5(uniqid(rand(), true)), 0, 16);
    }

    public function add_paragraph($article_id, $name = NULL) {
        if (is_null($name)) {
            $name = $this->new_random_name();
        }
        // TODO(awreece) What happens when they try to insert a dup name?
        $this->db->insert('paragraphs', array(
            'parent_id' => $article_id,
            'name' => $name
        ));
        return $name;
    }

    public function get_paragraphs_by_article($article_id) {
        $query = $this->db->get_where('paragraphs', array(
            'parent_id' => $article_id
        ));
        return $query->result();
    }
    
    public function get_paragraph_by_article_and_name($article_id, $name) {
        $query = $this->db->get_where('paragraphs', array(
            'parent_id' => $article_id,
            'name' => $name
        ));
        return $query->row();
    }

    public function delete_paragraph($article_id, $name) {
        return $this->db->delete('paragraphs', array(
            'parent_id' => $article_id,
            'name' => $name
        ));
    }
}

?>
