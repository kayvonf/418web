<?php

class Votes_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // This technically doesn't touch the database at all, but it's
    // in this model to encapsulate all user_group conditioning
    public function get_points_for_comment($comment, $user) {
        if ($this->users_model->is_user_privileged($user) ||
            $user->group === UPDOWNVOTE_GROUP) {
            return $comment->total_upvotes - $comment->total_downvotes;
        } elseif ($user->group === UPVOTE_GROUP) {
            return $comment->total_upvotes;
        } else {
            return NULL;
        }
    }

    public function get_user_vote_on_comment($user, $comment) {
        $this->db->select('vote_type');
        $query = $this->db->get_where('votes', array(
            'author_id' => $user->id,
            'comment_id' => $comment->id
        ));

        if (is_null($query->row()) || !$query->row()) {
            return NULL;
        }
        return $query->row()->vote_type;
    }

    public function vote($comment, $user, $vote_type) {
        // The contents of this method race
        $this->db->trans_start();

        // Cannot use the get_user_vote_on_comment function because
        // we also need the ID to remove events from the newsfeed
        $this->db->select('id, vote_type');
        $query = $this->db->get_where('votes', array(
            'author_id' => $user->id,
            'comment_id' => $comment->id
        ));

        $current_vote = NULL;
        if (!is_null($query->row()) && $query->row()) {
            $current_vote = $query->row()->vote_type;
        }

        if ($current_vote === UPVOTE) {
            $comment->total_upvotes -= 1;
            $this->newsfeed_model->remove_upvote_event($query->row()->id);
        } elseif ($current_vote === DOWNVOTE) {
            $comment->total_downvotes -= 1;
        }

        $this->db->delete('votes', array(
            'comment_id' => $comment->id,
            'author_id' => $user->id
        ));

        if ($vote_type !== NULL) {
            $this->db->insert('votes', array(
                'comment_id' => $comment->id,
                'author_id' => $user->id,
                'vote_type' => $vote_type
            ));
        }

        if ($vote_type === UPVOTE) {
            $comment->total_upvotes += 1;
            $this->newsfeed_model->add_event(
                 UPVOTE, COMMENT, $comment->id, NULL, $this->db->insert_id());
        } elseif ($vote_type === DOWNVOTE) {
            $comment->total_downvotes += 1;
        }

        $this->comments_model->update_vote_counts(
            $comment->id,
            $comment->total_upvotes,
            $comment->total_downvotes
        );

        $this->db->trans_complete();

        // TODO(caryy) If the update fails, this will not be accurate.
        return $this->get_points_for_comment($comment, $user);
    }

    public function top_comments() {
        $query = $this->db->query("select users.username as author_username, comments.*, comments.total_upvotes - comments.total_downvotes as total_points from comments, users where users.id = comments.author and comments.state = 'ACTIVE' order by total_points desc limit 5;");
        return $query->result();
    }

    public function top_users() {
        $query = $this->db->query("select users.username, count(*) as num_upvotes, count(distinct comments.id) as upvoted_comments from votes, users, comments where votes.vote_type = 'UPVOTE' and votes.comment_id = comments.id and comments.author = users.id and comments.state = 'ACTIVE' group by users.id order by num_upvotes desc limit 5;");
        return $query->result();
    }

}

?>
