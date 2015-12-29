<?php

class Lectures_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_lecture($data) {
        return $this->db->insert('lectures', $data);
    }

    public function delete_lecture($lecture) {
        return $this->db->delete('lectures', array('shortname' => $lecture->shortname,
                                                   'number' => $lecture->number));
    }

    public function edit_lecture($shortname, $data) {
        $this->db->where('shortname', $shortname);
        $this->db->update('lectures', $data);
    }

    public function add_slides($data) {
        return $this->db->insert_batch('slides', $data);
    }

    public function get_all() {
        $query = $this->db->get('lectures');
        return $query->result();
    }

    public function get_lecture_by_shortname($shortname) {
        $query = $this->db->get_where('lectures', array('shortname' => $shortname));
        return $query->row();
    }

    public function get_lecture($id) {
        $query = $this->db->get_where('lectures', array('id' => $id));
        return $query->row();
    }

  }

?>
