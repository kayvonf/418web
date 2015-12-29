<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class MY_input extends CI_input
{

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function is_post()
    {
        return $this->server('REQUEST_METHOD') == 'POST';
    }
    
    function is_get()
    {
        return $this->server('REQUEST_METHOD') == 'GET';
    }    
} 
