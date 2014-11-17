<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class PatientRegistration extends CI_Controller {
 
	function __construct() {
		parent::__construct();
	}
	function index()
	{
	if ($this->session->userdata('logged_in')) {
		$this->show_registration();
		} else {
			//
		}
	}
		
	function show_registration( ) {
	
		$this->load->view('header', $headerData);
		$this->load->view('patient_registration_view', $data);
		$this->load->view('footer');
	}
	
 }
 

 
?>