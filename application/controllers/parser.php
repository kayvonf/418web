<?php

include_once 'markdown/kmarkdown.php';

function parse_content($content_string)
{
    $results['model'] = array();
    $results['text'] = markdown($content_string);
    return $results;
}

class Parser extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
    }

    function index() {
        $this->load->view('editor', array('starting_content' => ''));
    }

    function do_parse() {

        $content = $this->input->post('content');

        $this->load->view('editor', array('starting_content' => $content));

        $data = parse_content($content);
        $this->load->view('parsed', $data);
    }

  }

?>