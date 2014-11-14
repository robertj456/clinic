<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class PatientRegistration extends CI_Controller {
 
	function index()
	{
	if ($this->session->userdata('isLoggedIn')) {
		$this->show_registration();
		} else {
			//redirect
		}
	}
		
	function show_registration( ) {
	
		$this->load->view('header', $headerData);
		$this->load->view('patient_registration_view', $data);
		$this->load->view('footer');
	}
	
 }
 

 
?>