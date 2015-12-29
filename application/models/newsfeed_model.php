<?php

class Newsfeed_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    function get_event_type_id($verb_type, $noun_type, $noun_id, $noun_item) {
        $this->db->select('id');
        $query = $this->db->get_where('event_types', array(
                    'noun_type' => $noun_type,
                    'verb_type' => $verb_type,
                    'noun_id' => $noun_id,
                    'noun_item' => $noun_item
                    )
                );

        if ($query->num_rows != 0) {
            return $query->row()->id;
        } else {
            $event_type_data['verb_type'] = $verb_type;
            $event_type_data['noun_type'] = $noun_type;
            $event_type_data['noun_id'] = $noun_id;
            $event_type_data['noun_item'] = $noun_item;
            $this->db->insert('event_types', $event_type_data);
            return $this->db->insert_id();
        }
    }

    function add_event($verb_type, $noun_type, $noun_id, $noun_item, $verb_id) {
        $event_type_id = $this->get_event_type_id($verb_type, $noun_type,
                                                  $noun_id, $noun_item);

        $event_data['author_id'] = $this->session->userdata('user_id');
        $event_data['last_modified'] = date("Y-m-d H:i:s");
        $event_data['event_type_id'] = $event_type_id;
        $event_data['verb_id'] = $verb_id;
        $this->db->insert('events', $event_data);
    }

    function get_events($limit = NULL) {
        if ($limit) {
            $this->db->limit($limit);
        }
        $this->db->order_by('last_modified', 'desc');
        $query = $this->db->get('events');
        return $query->result();
    }


    function get_events_for_author($author) {
        $this->db->order_by('last_modified', 'desc');
        $query = $this->db->get_where('events', array('author_id' => $author->id));
        return $query->result();
    }

    function get_event_type($type_id) {
        $query = $this->db->get_where('event_types', array('id' => $type_id));
        return $query->row();
    }

    function remove_upvote_event($vote_id) {
        // TODO(caryy) This can delete comment events too
        $query = $this->db->delete('events', array('verb_id' => $vote_id));
    }
}

?>
