<?php

class Articles_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_article($data) {
        return $this->db->insert('articles', $data);
    }

    public function add_article_image($data) {
        $query = $this->db->get_where('article_images', $data);
        // Insert if image doesn't already exist (Image data might exist if the
        // image is being overwritten.
        if(!$query->result()) {
            $this->db->insert('article_images', $data);
        }
    }

    public function add_author($data) {
        return $this->db->insert('authors', $data);
    }

    public function delete_article_image($data) {
        $this->db->delete('article_images', $data);
    }

    public function get_article_images($id) {
        $query = $this->db->get_where('article_images',
                                      array('article_id' => $id));
        return $query->result();
    }

    public function get_all() {
        $query = $this->db->get('articles');
        return $query->result();
    }

    public function get_article_version($id) {
        $this->db->select('version');
        $query = $this->db->get_where('articles', array('id' => $id));
        return $query->row();
    }

    public function get_article_authors($id) {
        $this->db->select('author_id');
        $query = $this->db->get_where('authors', array('article_id' => $id));
        return $query->result();
    }

    public function get_article($id) {
        $query = $this->db->get_where('articles', array('id' => $id));
        return $query->row();
    }

    public function edit_article($id, $data) {
        $this->db->update( 'articles', $data, array('id' => $id));
    }

    public function mark_article_as_deleted($id) {
        $data['deleted'] = 1;
        $this->db->update( 'articles', $data, array('id' => $id));
    }

    public function delete_author($article_id, $author_id) {
        $this->db->delete('authors', array('author_id' => $author_id,
                                           'article_id' => $article_id));
    }
/*
    public function delete_article($id) {
        $this->db->delete('articles', array('id' => $id));
    }
*/
}

?>
