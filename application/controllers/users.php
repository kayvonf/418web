<?php


class Users extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('users_model');
        //$this->load->model('comments_model');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('email');

        $this->email->from($this->config->item('course_email'), $this->config->item('email_display_name'));

        $this->profile_pictures_dir = $this->config->item('content_base_url') . '/' . $this->config->item('profile_pictures_rel_path') . '/';
        $this->profile_pictures_localpath = $this->config->item('content_base_path') . '/' . $this->config->item('profile_pictures_rel_path') . '/';
    }

    function execute_login($user) {
        // For now, store the userid in the session so I can
        // detect a logged in user in subsequent requests.
        // TODO(awreece) Why do I keep getting logged out? Should I have a longer timeout?
        $this->session->set_userdata('user_id', $user->id);
    }

    function index($sorting = '') {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to access this page.", 403);
        }

        $users = $this->users_model->get_users($sorting);
        $data = array('users' => $users);

        $this->load_view("List of Users", "user_list", $data);
    }

    // Return a page containing the create a new user form.
    function create() {
        $data = array();
        if ($this->config->item('signup_code') == '')
           $data['needs_code'] = FALSE;
        else
           $data['needs_code'] = TRUE;
        $this->load_view("Create User", "user_create", $data);
    }

    function delete($id) {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to do this.", 403);
        }
        $this->users_model->delete_user_with_id($id);
        $this->index();
    }

    function edit() {
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            return;
        }

        $user = $this->users_model->get_user($user_id);

        $match = array('author' => $user_id);
        $comments = $this->comments_model->get_comments_matching($match);    
        
        $match_private = array('author' => $user_id, 'state' => PRIVATE_COMMENT);
        $private_comments = $this->comments_model->get_comments_matching($match_private);

        $data = array('user' => $user,
                      'profile_pictures_dir' => $this->profile_pictures_dir,
                      'num_comments' => count($comments),
                      'num_private_comments' => count($private_comments) );
        $this->load_view("Edit User Information", "user_edit", $data);

        
        
    }

    function do_edit() {
        $this->validate_form(EDIT);
        $user_id = $this->session->userdata('user_id');
        if (!$user_id) {
            return;
        }
        
        $user = $this->users_model->get_user($user_id);

        $match = array('author' => $user_id);
        $comments = $this->comments_model->get_comments_matching($match);    
        
        $match_private = array('author' => $user_id, 'state' => PRIVATE_COMMENT);
        $private_comments = $this->comments_model->get_comments_matching($match_private);
        
        if (!$this->form_validation->run()) {
            $error = validation_errors();
            $this->load_view("Edit User Information", "user_edit",
                array('error' => $error,
                      'user' => $user,                      
                      'profile_pictures_dir' => $this->profile_pictures_dir,
                      'num_comments' => count($comments),
                      'num_private_comments' => count($private_comments)));
            return;
        }

        // Check if new image is uploaded.
        if ($_FILES AND $_FILES['picture']['name']) {
            $error = $this->upload_profile_picture($user->username);
            if ($error) {
                $this->load_view("Edit User Information", "user_edit",
                    array('error' => $error,
                          'user' => $user,
                          'profile_pictures_dir' => $this->profile_pictures_dir,
                          'num_comments' => count($comments),
                          'num_private_comments' => count($private_comments)));
                return;
            }
        }

        $new_user_data = array();
        $new_user_data['firstname'] = $this->input->post('firstname');
        $new_user_data['lastname'] = $this->input->post('lastname');
        $new_user_data['andrewid'] = $this->input->post('andrewid');
     	$new_user_data['email'] = $this->input->post('email');	
        $new_user_data['department'] = $this->input->post('department');
        $new_user_data['year'] = $this->input->post('year');

        // Update user data.
        $this->users_model->edit_user($user->username, $new_user_data);
        
        // Get updated user data.
        $user = $this->users_model->get_user($user_id);
        $data = array('user' => $user,
                      'profile_pictures_dir' => $this->profile_pictures_dir,
                      'num_comments' => count($comments),
                      'num_private_comments' => count($private_comments),
                      'updated' => true );

        $this->load_view("Edit User Information", "user_edit", $data);
    }

    function changepassword() {
        //$user_id = $this->session->userdata('user_id');
        //if (!$user_id) {
        //    return;
        //}
        //$user = $this->users_model->get_user($user_id);

	$data = array();
        $this->load_view("Change Password", "user_changepassword", $data);
    }

    function reset_password() {
        $token = $this->input->get('token');
        if ($token) {
            $user = $this->users_model->get_user_from_token($token);
            if (!$user) {
                $this->load_view("Reset Password", "user_reset_password", array(
                    'error' => 'Invalid password reset token.'
                ));
                return;
            }

            $this->load_view("Change Password", "user_reset_password", array(
                'token' => $token
            ));
        } else {
            $this->load_view("Reset Password", "user_reset_password", array());
        }
    }

    function do_reset() {
        $this->require_post();

        $username = $this->input->post('username');
        $user = $this->users_model->get_user_by_username($username);
        if (!$user) {
            $this->load_view("Reset Password", "user_reset_password", array(
                'error' => "No user with username \"$username\" exists."
            ));
            return;
        }

        $token = $this->users_model->generate_reset_token($user);

        $this->email->subject('15-418 Password Reset');
        $this->email->to($user->email);

        $email_data = array(
            'reset_url' => site_url('users/reset_password') . '?token=' . $token
        );
        $message = $this->load->view('email/password_reset', $email_data, TRUE);
        $this->email->message($message);

        $this->email->send();

        $email_parts = explode('@', $user->email);
        if (count($email_parts) === 2) {
            $domain = $email_parts[1];
        } else {
            $domain = '';
        }
        $this->load_view("Reset Password", "user_reset_password_sent", array(
            'username' => $username,
            'domain' => $domain
        ));
    }

    function do_password_change() {
        $this->require_post();

        $token = $this->input->post('token');
        $user = $this->users_model->get_user_from_token($token);
        if (!$user) {
            $this->load_view("Reset Password", "user_reset_password", array(
                'error' => 'Invalid password reset token.'
            ));
            return;
        }

        $password1 = $this->input->post('password1');
        $password2 = $this->input->post('password2');
        if ($password1 !== $password2) {
            $this->load_view("Change Password", "user_reset_password", array(
                'token' => $token,
                'error' => 'Passwords do not match.'
            ));
            return;
        }

        $this->users_model->change_user_password($user->id, $password1);
        $this->users_model->invalidate_reset_token($token);

        $this->load_view("Reset Password", "user_reset_password_done", array());
    }

    function upload_profile_picture($username) {
        // Set configuration.
        $config['upload_path'] = $this->profile_pictures_localpath;
        $config['file_name'] = $username . '.jpg';
        $config['overwrite']  = 'true';
        $config['allowed_types'] = $this->config->item('allowed_image_types');
        $config['max_size'] = $this->config->item('max_image_size');
        $config['max_width']  = $this->config->item('max_image_width');
        $config['max_height']  = $this->config->item('max_image_height');

        // Check if a valid image is uploaded.
        $this->load->library('upload', $config);
        $this->lang->load('upload', 'english');
        if (!$this->upload->do_upload('picture'))
        {
            $error = $this->upload->display_errors();
            return $error;
        }

        // Resize image.
        $file_name = $this->profile_pictures_localpath . $username . '.jpg';

        $cmd_result = array();
        exec('convert ' . $file_name . ' -resize 64x64 ' . $file_name,
            $cmd_result);
        // log the result of the imagemagick command in case of error
        $result_str = '\n';
        foreach ($cmd_result as $output_line) {
            $result_str = $result_str . $output_line . '\n';
        }
        log_message('debug', 'Imagemagick convert result was:\n' . $result_str);
    }

    function secretcode_check($secret_code) {
        if ($secret_code == $this->config->item('signup_code')) {
            return true;
        }
        $this->form_validation->set_message('secretcode_check', 'Invalid secret code');
        return false;
    }

    function validate_form($mode)  {
        // TODO(mburman) Use a rule group? http://ellislab.com/codeigniter/user-guide/libraries/form_validation.html#savingtoconfig
        $this->form_validation->set_rules('firstname', 'first name',
            'required|trim|max_length[64]|xss_clean');
        $this->form_validation->set_rules('lastname',  'last name',
            'required|trim|max_length[64]|xss_clean');
        $this->form_validation->set_rules('andrewid', 'andrew id',
            'required|trim|max_length[64]|xss_clean');
        $this->form_validation->set_rules('email', 'email',
            'required|trim|max_length[64]|valid_email|xss_clean');
        $this->form_validation->set_rules('department',  'department',
            'required|trim|max_length[32]|xss_clean');
        $this->form_validation->set_rules('year',  'year',
            'required|trim|max_length[32]|xss_clean');
        $this->form_validation->set_rules('picture', 'picture',
            'optional');

        if ($mode == CREATE) {
            $this->form_validation->set_rules('username',  'username',
                'required|trim|min_length[3]|max_length[32]|alpha_dash|is_unique[users.username]|xss_clean');
            $this->form_validation->set_rules('password1', 'password',
                'required|matches[password2]');
            $this->form_validation->set_rules('password2', 'password confirmation',
                'required');
            if ($this->config->item('signup_code') != '') {
               $this->form_validation->set_rules('secretcode', 'secretcode', 'callback_secretcode_check');
            }
        }
    }

    // Handle create user form submission.
    function do_create() {
        $this->validate_form(CREATE);
        $error = NULL;

	$data = array();
        if ($this->config->item('signup_code') == '')
           $data['needs_code'] = FALSE;
        else
           $data['needs_code'] = TRUE;

        // TODO(awreece) Validation logic in model, where we know field sizes?
        // If fields are not validated display errors and return.
        if (!$this->form_validation->run()) {
            $error = validation_errors();
            $data['error'] = $error;
            $this->load_view("Create New User", "user_create", $data);
            return;
        }

        // Check if image is uploaded.
        if ($_FILES AND $_FILES['picture']['name']) {
            $error = $this->upload_profile_picture($this->input->post('username'));
            if ($error) {
                $data['error'] = $error;
                $this->load_view("Create New User", "user_create", $data);
                return;
            }
        } else {
            // Create symlink to default image.
            // TODO(mburman): use symlink instead of copying images
            $file_name = $this->profile_pictures_localpath . $this->input->post('username') . '.jpg';
            $default_image = './assets/common_images/robot' . rand(1,5) . '.jpg';
            exec('cp ' . $default_image . ' ' . $file_name);
        }

        $new_user_data = array();
        $new_user_data['type'] = 'STUDENT';
        $new_user_data['firstname'] = $this->input->post('firstname');
        $new_user_data['lastname'] = $this->input->post('lastname');
        $new_user_data['andrewid'] = $this->input->post('andrewid');
	    $new_user_data['email'] = $this->input->post('email');	
        $new_user_data['department'] = $this->input->post('department');
        $new_user_data['year'] = $this->input->post('year');

        // Update the DB here
        $error = $this->users_model->add_user_by_username_and_password(
            $this->input->post('username'),
            $this->input->post('password1'),
            $new_user_data);

        if (is_string($error)) {
	    $data['error'] = $error;
            $this->load_view("Create New User", "user_create", $data);
            return;
        }

        // Go ahead and login after creating the new user.
        $username = $this->input->post('username');
        $user = $this->users_model->get_user_by_username($username);
        $this->execute_login($user);

        redirect('welcome');
    }

    // Display the login page.
    function login() {
        $data = array();
        if ($this->session->userdata('redirect_url')) {
            // TODO(awreece) This is mostly for debugging.
            $data['prev_url'] = $this->session->userdata('redirect_url');
        }
        $this->load_view("Login", "user_login", $data);
    }

    // Handle login form submission.
    function do_login() {
        // TODO(awreece) Unify validation?
        $this->form_validation->set_rules('username',  'username',
            'trim|required|max_length[32]|alpha_dash');
        $this->form_validation->set_rules('password',  'password',
            'required');

        if ($this->form_validation->run() == FALSE)
        {
            $error = validation_errors();
            $this->load_view("Login", "user_login", array('error' => $error));
            return;
        }

        $login_success = FALSE;
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->users_model->get_user_by_username_and_password($username, $password);

        if (is_string($user)) {
            $this->load_view("Login", 'user_login', array('error' => $user));
        } else {
            log_message('debug', 'User ' . $username . ' logged in.');

            $this->execute_login($user);
            $this->redirect_next();
        }
    }

    function logout() {
        $this->session->unset_userdata('user_id');
        redirect(site_url('users/login'));
    }

    function report($username) {
        if (!$this->is_current_session_privileged()) {
            show_error("Please login as an instructor to do this.", 403);
        }
    
        $user = $this->users_model->get_user_by_username($username);
        if (!$user) {
            return;
        }

	$match = array('author' => $user->id);
	$comments = $this->comments_model->get_comments_matching($match);

	$data = array('username' => $username,
	              'comments' => count($comments));
	$this->load_view("Student Report", "user_report", $data);
    }
}

?>
