<?php

class Scoreboard extends MY_Controller {
    private function gen_token($username) {
        return $username . ":" . sha1($username . $this->config->item('encryption_key'));
    }

    private function token_to_username($token) {
        $username = explode(":", $token);
        return $username[0];
    }

    private function check_token($token) {
        $username = $this->token_to_username($token);
        return $this->gen_token($username) === $token;
    }

    function __construct()
    {
        parent::__construct();
        $this->load->model('scores_model');
    }

    function index($machine=NULL, $progname=NULL, $instance=NULL) {
        if (!is_null($instance)) {
            $instances = array($instance);
        } else {
            $instances = array('11', '111111111', '3735928559', '1000000', '15418');
        }

        if (!is_null($progname)) {
            $programs = array($progname);
        } else {
            $programs = array('wsp_mpi', 'wsp_openmp');
        }

        if (!is_null($machine)) {
            $machines = array($machine);
        } else {
            $machines = array('blacklight', 'ghc');
        }

        if (!is_null($instance) && !is_null($machine) && !is_null($progname)) {
            // TODO(awreece) This is a hack and must be > than number of students.
            $limit = 200;
        } else {
            $limit = 5;
        }

        $this->scoreboard($machines, $programs, $instances, $limit);
    }

    private function scoreboard( $machines, $programs,$instances, $limit) {
        $this->require_login();

        $array = array();
        foreach ($machines as $machine) {
            $machine_array = array();
            foreach ($programs as $program) {
                $program_array = array();
                foreach ($instances as $instance) {
                    $data = new stdClass();
                    $data->instance = $instance;
                    $data->data = $this->scores_model->scores_for_program($program, $instance, $machine, $limit);
                    $program_array[] = $data;
                }
                $machine_array[] = (object) array('data' => $program_array, 'program_name' => $program);
            }
            $array[] = (object) array('data' => $machine_array, 'machine' => $machine);
        }
        $this->load_view("15418 Scoreboard", "scoreboard", array('data' => $array));
    }

    function submit() {
        $this->require_post();
        $token = $this->input->post("token");
        if (!$this->check_token($token)) {
            echo "Invalid token\n";
        }
        $program_name = $this->input->post("program_name");
        $score = $this->input->post("score");
        $solution = $this->input->post("solution");
        $cores = $this->input->post("cores");
        $machine = $this->input->post("machine", TRUE);
        $instance = $this->input->post("instance", TRUE);

        if (preg_match("/teragrid/", $machine)) {
            $machine = 'blacklight';
        } else if (preg_match("/^(ghc[\d]{0,2})/", $machine, $matches)) {
            $machine = $matches[1];
        } else {
            $machine = "unknown";
        }

        // TODO(awreece) Don't hardcode these, please.
        if ($program_name != "wsp_openmp" && $program_name != "wsp_mpi" 
            && $program_name != "dp_wsp_openmp" && $program_name != "dp_wsp_mpi") {
            echo "Invalid program name\n";
            exit(-1);
        }

        if (!in_array($instance, array("15418", "1000000", "3735928559", "111111111", "11"))) {
            echo "Invalid program instance\n";
            exit(-1);
        }

        $answers = array('15418' => 329, 
                         '1000000' => 306, 
                         '3735928559' => 334, 
                         '111111111' => 265,
                         '11' => 333);
        $dp_answers = array('15418' => 390, 
                            '1000000' => 355, 
                            '3735928559' => 373, 
                            '111111111' => 354,
                            '11' => 379);

        if (is_bool($solution) && !$solution) {
            echo "No solution given - update your timer.bash with the latest starter code\n";
            exit(-1);
        }

        if (!is_numeric($solution)) {
            echo "Invalid solution given\n";
            exit(-1);
        }

        if ($program_name == 'dp_wsp_mpi' || $program_name == 'dp_wsp_openmp') {
            if ($dp_answers[$instance] != $solution) {
                echo "Incorrect solution - expected " . $dp_answers[$instance] . " but received " . $solution . "\n";
                exit(-1);
            }
        } else {
            if ($answers[$instance] != $solution) {
                echo "Incorrect solution - expected " . $answers[$instance] . " but received " . $solution . "\n";
                exit(-1);
            }
        }

        if (!is_numeric($score)) {
            echo "Invalid score\n";
            exit(-1);
        }

        if (!is_numeric($cores) || $cores < 0) {
            echo "Invalid cores\n";
            exit(-1);
        }

        $username = $this->token_to_username($token);
        $user = $this->users_model->get_user_by_username($username);

        if ($this->users_model->is_troll($user)) {
            echo "You think you're funny but the TA doesn't\n";
            exit(-1);
        }

        $this->scores_model->add_score(array(
            'user_id' => $user->id,
            'program_name' => $program_name,
            'score' => $score,
            'cores' => $cores,
            'machine' => $machine,
            'instance' => $instance
        ));

        echo "Times added for " . $program_name . ": " . $score . "\n";
    }

    function token() {
        $this->require_login();
        $user = $this->get_logged_in_user();
        $token = $this->gen_token($user->username);
        $this->load_view("15418 Token", "token", array('token' => $token));
    }
}

?>
