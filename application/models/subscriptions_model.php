<?php

class Subscriptions_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function get_subscribers_matching($data) {
        $this->db->select('user_id');
        $query = $this->db->get_where('subscriptions', $data);
        $ret = array();
        foreach ($query->result() as $row) {
            $ret[] = $row->user_id;
        }
        return $ret;
    }

    public function is_subscribed($data) {
        $this->db->where($data);
        $this->db->limit(1);
        $this->db->from('subscriptions');
        return $this->db->count_all_results();
    }

    public function subscribe($data) {
        $this->db->insert('subscriptions', $data);
    }

    public function unsubscribe($data) {
        $this->db->delete('subscriptions', $data);
    }

}

?>
