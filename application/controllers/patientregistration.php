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
		     redirect('login', 'refresh');
		}
	}
		
	function show_registration( ) {
	
		$this->load->view('header');
		$this->load->view('patient_registration_view');
		$this->load->view('footer');
	}
	
	function logout() {
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}
	
 }
 

 
?>