<?php

class Slides_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_slide($lecture, $name) {
        // TODO(awreece) What happens when they try to insert a dup name?
        $this->db->insert('slides', array(
            'parent_id' => $lecture->id,
            'name' => $name
        ));
        return $name;
    }

    public function add_slides_for_lecture($lecture, $slide_count) {
        $array = array();
        for ($i = 1; $i <= $slide_count; $i++) {
            $slide_data = array(
                'parent_id' => $lecture->id,
                'name' => sprintf(SLIDE_NAME_FORMAT_STRING, $i),
                'previous_name' => sprintf(SLIDE_NAME_FORMAT_STRING, $i - 1),
                'next_name' => sprintf(SLIDE_NAME_FORMAT_STRING, $i + 1)
            );
            if ($i == 1) {
                $slide_data['previous_name'] = NULL;
            }
            if ($i  == $slide_count) {
                $slide_data['next_name'] = NULL;
            }
            array_push($array, $slide_data);
        }
        return $this->db->insert_batch('slides', $array);
    }

    public function get_slides_by_lecture($lecture) {
        $query = $this->db->get_where('slides', array(
            'parent_id' => $lecture->id
        ));
        return $query->result();
    }

    public function get_slide_by_id($id) {
        $query = $this->db->get_where('slides', array('id' => $id));
        return $query->row();
    }

    public function get_slide_by_lecture_and_name($lecture, $name) {
        $query = $this->db->get_where('slides', array(
            'parent_id' => $lecture->id,
            'name' => $name
        ));
        return $query->row();
    }

    public function delete_slides_for_lecture($lecture) {
        return $this->db->delete('slides', array('parent_id' => $lecture->id));
    }
}

?>
