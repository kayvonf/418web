<?php

class Prompts_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    public function record_sent_prompts($author_id, $message,
        $receiving_students, $prompt_type, $encouragement,
        $parent_type, $parent_id, $parent_item = NULL)
    {
        $this->db->insert('sent_prompts', array(
            'parent_type' => $parent_type,
            'parent_id' => $parent_id,
            'parent_item' => $parent_item,
            'author_id' => $author_id,
            'message' => $message,
            'prompt_type' => $prompt_type,
            'encouragement_segment' => $encouragement
        ));

        $inserted_row = $this->db->insert_id();

        $prompt_id = $this->db->insert_id();
        $prompt_records = array();
        foreach ($receiving_students as $student) {
            $prompt_records[] = array(
                'prompt_id' => $prompt_id,
                'student_id' => $student->id
            );
        }
        $this->db->insert_batch('students_prompted', $prompt_records);

        return $inserted_row;
    }

    public function get_all_prompts() {
        // I really, really dislike heredoc indenting
        $query = $this->db->query(<<<EOT
SELECT s.*,
    GROUP_CONCAT(u2.username ORDER BY u2.username SEPARATOR ', ') AS recipients,
    u1.username AS author
FROM sent_prompts s
LEFT JOIN users u1 ON u1.id = s.author_id
LEFT JOIN students_prompted p ON s.id = p.prompt_id
LEFT JOIN users u2 ON u2.id = p.student_id
GROUP BY s.id
EOT
        );

        return $query->result();
    }

}

?>
