<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class RamqRegistration extends CI_Controller {
    function __construct() {
        parent::__construct();
		$this->load->library('session');
		$this->load->library('form_validation');

    } // end constructor
	
    function index() {
		
		// ramq field is required for form submittal.     
		$this->form_validation->set_rules('ramq', 'RAMQ', 'trim|required|xss_clean');
		$this->form_validation->set_error_delimiters("<div class='alert alert-danger' role='alert'>
		<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
		<span class='sr-only'>Error:</span>", '</div>');
		
		// redirect if user is not logged in or does not have receptionist privileges.
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('logged_in')['RECEPTION']) {
            redirect('login', 'refresh');
		} else {
			// user made an error submitting form.
			    if ($this->form_validation->run() == FALSE ) {	
					$this->show_registration();
				}
				// redirect to patient registration view.
				else {
					// the patient registration view requires the RAMQ number
					// therefore we save it in the flash data.
					$this->session->set_flashdata('ramq', $_POST['ramq']);
					redirect("patientregistration", 'refresh');
				}
		}
		

	} // end index
		
		/*
		 * Show the ramq registration page.
		 */
	    function show_registration() {
			$this->load->helper(array(
				'form',
				'url'
			));

			$headerData = array(
				'title' => 'CQS - Patient Registration'
			);
			$this->load->view('header', $headerData);        
			$this->load->view('ramq_registration_view');		
			$this->load->view('footer');
    }



} // end class
?>