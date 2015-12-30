<?php

// TODO(awreece Figure out how this works.
//include_once 'application/controller/common_defines.php';

define('SALT_LENGTH', 30);

function generate_salt()
{
    return substr(md5(uniqid(rand(), true)), 0, SALT_LENGTH);
}

function generate_password_hash($plainText, $salt)
{
    return sha1($salt . $plainText);
}

class Users_model extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library('encrypt');
    }

    // return TRUE if the user exists in the database, FALSE otherwise
    public function user_exists($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        if ($query->num_rows() > 0)
            return TRUE;
        else
            return FALSE;
    }

    public function add_user($data) {

        // NOTE(kayvonf): This logic exists to assign users to groups
        // for A/B testing. I'm essentially disabling it by assigning
        // everyone to the upvote only group.
    
        $group_choices = array(
            NOVOTE_GROUP,
            UPVOTE_GROUP,
            UPDOWNVOTE_GROUP
        );
        // $data['group'] = $group_choices[mt_rand(0, count($group_choices) - 1)];
        $data['group'] = UPVOTE_GROUP;

        // NOTE(kayvonf): This logic exists to assign users to groups
        // for A/B testing. I'm essentially disabling it by assigning
        // everyone to the positive encouragement group (all users can
        // be prompted)
        
        $encouragement_choices = array(
            NEUTRAL_ENCOURAGEMENT,
            POSITIVE_ENCOURAGEMENT
        );
        // $data['encouragement_segment'] =
        //    $encouragement_choices[mt_rand(0, count($encouragement_choices) - 1)];
        $data['encouragement_segment'] = POSITIVE_ENCOURAGEMENT;
            
        return $this->db->insert('users', $data);
    }

    public function delete_user_with_id($id) {
        $this->db->delete('users', array('id' => $id));
    }

    public function edit_user($username, $data) {
        $this->db->where('username', $username);
        $this->db->update('users', $data);
    }

    public function does_username_exist($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        if ($query->num_rows() <= 0) {
            return false;
        }
        return true;
    }

    public function is_user_privileged($user) {
        if ($user->type == USER_TYPE_INSTRUCTOR || $user->type == USER_TYPE_TA)
            return true;
        else
            return false;
    }

    public function add_user_by_username_and_password($username, $password, $data) {
        if ($this->users_model->user_exists($username)) {
            return "Username was taken";
        }

        // TODO(awreece) We race here.

        $salt = generate_salt();

        $data['username'] = $username;
        $data['password_salt'] = $salt;

        // TODO(kayvonf) I really would prefer this column be named password_hash.
        $data['password'] = generate_password_hash($password, $salt);
        $this->add_user($data);

        return NULL;
    }

    public function generate_reset_token($user) {
        $cur_time = time();
        $cur_timestamp = date("Y-m-d H:i:s", $cur_time);

        $data = array(
            'user_id' => $user->id,
            'timestamp' => $cur_timestamp
        );

        $sql = $this->db->insert_string('password_reset_requests', $data) .
            " ON DUPLICATE KEY UPDATE `timestamp` = '$cur_timestamp'";
        $this->db->query($sql);

        return $this->encrypt->encode($user->id . '/' . $cur_time);
    }

    public function invalidate_reset_token($token) {
        $result = explode('/', $this->encrypt->decode($token));

        // `ctype_digit` checks if all the characters in the string are numberic
        if (count($result) !== 2 || !ctype_digit($result[0]) || !ctype_digit($result[1])) {
            return NULL;
        }

        $data = array(
            'user_id' => $result[0],
            'timestamp' => date("Y-m-d H:i:s", $result[1]),
        );

        $this->db->delete('password_reset_requests', $data);
    }

    public function get_user_from_token($token) {
        $result = explode('/', $this->encrypt->decode($token));

        // `ctype_digit` checks if all the characters in the string are numberic
        if (count($result) !== 2 || !ctype_digit($result[0]) || !ctype_digit($result[1])) {
            return NULL;
        }

        // Tokens expire after 1 day.
        $data = array(
            'user_id' => $result[0],
            'timestamp' => date("Y-m-d H:i:s", $result[1]),
            'timestamp >=' => date("Y-m-d H:i:s", strtotime('-1 day'))
        );

        $this->db->where($data);
        $this->db->from('password_reset_requests');
        if ($this->db->count_all_results() === 0) {
            return NULL;
        }

        return $this->get_user($result[0]);
    }

    public function change_user_password($user_id, $newpassword) {
        $salt = generate_salt();
        $passwordhash = generate_password_hash($newpassword, $salt);

        $data = array('password_salt' => $salt, 'password' => $passwordhash);
        $where = array('id' => $user_id);

        $this->db->update('users', $data, $where);
    }

    public function is_troll($user) {
        $this->db->where(array('user_id' => $user->id));
        $this->db->from("trolls");
        return $this->db->count_all_results() > 0;
    }

    public function get_user($user_id) {
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row();
    }

    public function get_user_by_username($username) {
        $query = $this->db->get_where('users', array('username' => $username));
        return $query->row();
    }

    public function get_username_by_id($user_id) {
        $this->db->select('username');
        $query = $this->db->get_where('users', array('id' => $user_id));
        return $query->row();
    }

    public function get_users($sorting = '') {
        $ordering_string = '';
        if ($sorting == 'sortbycomments') {
           $ordering_string = ' order by num_comments desc';
        } elseif ($sorting == 'sortbyandrew') {
           $ordering_string = ' order by andrewid asc';
        }

        $query = $this->db->query("select users.*, (select count(*) from comments where (comments.state = 'ACTIVE' or comments.state = 'ARCHIVED') and comments.author = users.id) as num_comments, (select count(*) from votes where votes.author_id = users.id and votes.vote_type = 'UPVOTE') as num_upvotes, (select count(*) from votes where votes.author_id = users.id and votes.vote_type = 'DOWNVOTE') as num_downvotes, (select count(*) from students_prompted where students_prompted.student_id = users.id) as num_prompted from users" . $ordering_string . ';');

        log_message('debug', 'Retreived data for ' . $query->num_rows()  . ' users.');
        return $query->result();
    }

    public function get_authored_articles($id) {
        $this->db->select('article_id');
        $query = $this->db->get_where('authors', array('author_id' => $id));
        return $query->result();
    }

    public function get_user_by_username_and_password($username, $password) {
        $user = $this->users_model->get_user_by_username($username);
        if (is_null($user) || !$user) {
            log_message('debug', 'No such user ' . $username);
            return 'Invalid username or password';
        }

        $password_hash = generate_password_hash($password, $user->password_salt);
        if ($user->password == $password_hash) {
            return $user;
        } else {
            log_message('debug', 'User ' . $username . ' invalid password.');
            return 'Invalid username or password';
        }
    }

    public function get_random_students($num, $pred) {
        // TODO(caryy): This is pretty inefficient. Can it be made better?
        $this->db->where('type', USER_TYPE_STUDENT);
        $this->db->where($pred);
        $this->db->order_by('RAND()');
        $this->db->limit($num);
        $query = $this->db->get('users');
        return $query->result();
    }
}

?>
