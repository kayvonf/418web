<?php

class Comments_model extends CI_Model {

    public function __construct() {
        $this->load->model('newsfeed_model');
        $this->load->database();
    }

    public function add_comment($data) {
        $data['created'] = date("Y-m-d H:i:s");
        $this->db->insert('comments', $data);

        if (!isset($data['parent_item'])) {
            $data['parent_item'] = NULL;
        }

        // Default state is ACTIVE.
        if (!isset($data['state']) || $data['state'] === ACTIVE) {
            // Only add it to the newsfeed if we're adding an active comment.
            $this->newsfeed_model->add_event(
                COMMENT,
                $data['parent_type'], $data['parent_id'], $data['parent_item'],
                $this->db->insert_id()
            );
        }
    }

    public function get_comments_matching($data) {
        if (!isset($data['state'])) {
            $data['state'] = ACTIVE;
        }
        $query = $this->db->get_where('comments', $data);
        log_message('debug', 'Retreived data for ' . $query->num_rows()  . ' comments for' . json_encode($data));
        return $query->result();
    }

    public function count_comments_matching($data) {
        if (!isset($data['state'])) {
            $data['state'] = ACTIVE;
        }
        $this->db->where($data);
        $this->db->from('comments');
        return $this->db->count_all_results();
    }

    public function get_comments_by_user($user_id) {
        return $this->get_comments_matching(array('author' => $user_id, 'state' => ACTIVE));
    }

    public function get_comment($id, $states) {
        $this->db->where('id', $id);
        if (is_array($states)) {
            $this->db->where_in('state', $states);
        } else {
            $this->db->where('state', $states);
        }
        $query = $this->db->get('comments');
        return $query->row();
    }

    public function get_private_comment($author, $parent_type, $parent_id, $parent_item) {
        $this->db->where(array(
            'state' => PRIVATE_COMMENT,
            'author' => $author,
            'parent_type' => $parent_type,
            'parent_id' => $parent_id,
            'parent_item' => $parent_item
        ));
        $query = $this->db->get('comments');
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

    public function get_instructor_comment($parent_type, $parent_id, $parent_item) {
        $this->db->where(array(
            'state' => INSTRUCTOR_COMMENT,
            'parent_type' => $parent_type,
            'parent_id' => $parent_id,
            'parent_item' => $parent_item
        ));
        $query = $this->db->get('comments');
        return ($query->num_rows() > 0) ? $query->row() : NULL;
    }

    public function get_comment_edit_history($id) {
        $this->db->where('state', REVISED);
        $this->db->where('original_comment', $id);
        $this->db->order_by('created', 'desc');
        $query = $this->db->get('comments');

        return $query->result();
    }

    public function delete_comment($id) {
        $this->db->where('id', $id);
        $this->db->where_in('state', array(ACTIVE, PRIVATE_COMMENT, INSTRUCTOR_COMMENT) );
        $this->db->update('comments', array('state' => DELETED));

        // TODO(mburman) We should also delete events associated with
        // this comment in the events table! But it's not a big
        // problem, since only events for active comments appear in the newsfeed.
    }

    public function archive_comment($id) {
        $this->db->where('id', $id);
        $this->db->where('state', ACTIVE);
        $this->db->update('comments', array('state' => ARCHIVED));
        // TODO(mburman) Delete associated event! Not a functional problem,
        // since only active comments appear in the newsfeed.
    }

    public function get_comments() {
        $this->db->where_not_in('state', array(PRIVATE_COMMENT, REVISED));
        $query = $this->db->get('comments');
        log_message('debug', 'Retreived data for ' . $query->num_rows()  . ' comments.');
        return $query->result();
    }

    public function update_comment($comment, $author, $new_markdown, $reason = NULL) {
        // This method can race. Not a huge problem, and this shouldn't be a
        // huge area of contention, so the performance impact will be negligible
        $this->db->trans_start();

        $data = array(
            'body_markdown' => $new_markdown,
            'edit_timestamp' => date("Y-m-d H:i:s"),
            'edit_author' => $author->id,
            'edit_reason' => $reason
        );
        $this->db->where('id', $comment->id);
        $this->db->update('comments', $data);

        if ($comment->state === ACTIVE) {
            // Store the previous version into the database so we have a history
            $comment_copy = array(
                'state' => REVISED,
                'created' => $comment->created,
                'author' => $comment->author,
                'parent_type' => $comment->parent_type,
                'parent_id' => $comment->parent_id,
                'parent_item' => $comment->parent_item,
                'body_markdown' => $comment->body_markdown,
                'total_upvotes' => $comment->total_upvotes,
                'total_downvotes' => $comment->total_downvotes,
                'edit_reason' => $comment->edit_reason,
                'original_comment' => $comment->id
            );

            if (!is_null($comment->edit_author)) {
                $comment_copy['created'] = $comment->edit_timestamp;
                $comment_copy['author'] = $comment->edit_author;
            }

            $this->db->insert('comments', $comment_copy);
        }

        $this->db->trans_complete();
    }

    public function update_vote_counts($comment_id, $total_upvotes, $total_downvotes) {
        $data = array(
            'total_upvotes' => $total_upvotes,
            'total_downvotes' => $total_downvotes
        );

        $this->db->where('id', $comment_id);
        $this->db->where('state', ACTIVE);
        $this->db->update('comments', $data);
    }

    public function users_who_participated_this_week() {
        // You participated if you produced 2 comments that were liked 
        // or were at least min_length characters long.
        // TODO(caryy): I don't believe the above is true any longer.
        $query = $this->db->query("select users.username, users.andrewid, count(*) as num_comments, sum(case when comments.created > date_sub(now(), interval 7 day) then 1 else 0 end) as num_recent_comments, (select count(*) from votes where votes.vote_type = 'UPVOTE' and votes.author_id = users.id and votes.timestamp > date_sub(now(), interval 7 day)) as num_recent_upvotes, (select count(*) from votes where votes.vote_type = 'DOWNVOTE' and votes.author_id = users.id and votes.timestamp > date_sub(now(), interval 7 day)) as num_recent_downvotes, (select count(*) from votes where votes.vote_type = 'UPVOTE' and votes.author_id = users.id) as num_upvotes, (select count(*) from votes where votes.vote_type = 'DOWNVOTE' and votes.author_id = users.id) as num_downvotes from users, comments where comments.author = users.id and comments.state not in ('PRIVATE', 'DELETED', 'REVISED') group by users.id having num_comments >= 2 order by num_comments desc, users.username;");
        return $query->result();
    }
}

?>
