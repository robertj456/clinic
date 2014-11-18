<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class AddToQueue extends CI_Controller
{    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
    }
	
    function index()
    {
		$this->form_validation->set_rules('ramq', 'RAMQ', 'trim|required|xss_clean');
		var_dump($_POST);
	}
}

?>