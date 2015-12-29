<?php

class Scores_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function add_score($data) {
        $this->db->insert('scores', $data);
    }

    public function scores_for_program($program_name, $instance, $machine, $limit) {
        $sql = "SELECT username, score, machine, cores " .
               "FROM users " .
               "JOIN scores as s " .
               "ON s.id = " .
               "(SELECT si.id FROM scores as si " .
               " WHERE users.id = si.user_id " .
               " AND si.program_name = '".$this->db->escape_str($program_name)."' " .
               " AND si.instance = '".$this->db->escape_str($instance)."' " .
               " AND si.machine LIKE '%".$this->db->escape_str($machine)."%' " .
               " ORDER BY si.score ASC " .
               " LIMIT 1) " .
               "ORDER BY s.score ASC " .
               "LIMIT " .$this->db->escape($limit);

        $query = $this->db->query($sql);
        return $query->result();
    }
}

?>
