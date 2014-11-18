<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PatientRegistration extends CI_Controller
{    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
    }
    function index()
    {
	
	    $this->form_validation->set_rules('ramq', 'RAMQ', 'trim|required|xss_clean');

        if (!$this->session->userdata('logged_in')) {
            //redirect('login', 'refresh');
        } else {
			
			// form has not yet been submitted.
			if (!$_POST) {
				$this->show_registration(null);
				return;
			}
			
			// form has been submitted
			else {
				// user made an error submitting form.
			    if ($this->form_validation->run() == FALSE ) {	
					$this->show_registration(null);
					}
				else {
					$patient = $this->get_patient();
					$this->show_registration($patient);	
				}
			

		}
	}
    }
    function get_patient()
    {
        // create instance of user model
        
        $this->load->model('patient');
        $ramq    = $this->input->post('ramq');
        $patient = ($this->patient->findPatient($ramq));
		
		if (!$patient) {
		    $this->form_validation->set_message('get_patient', 'No patient found');
			return array(
			'RAMQ_ID' => $this->input->post('ramq')
			);
		}
		
		else {
			return array_merge($patient);
		}
		// here we can show the other fields and populate them.
    }
    
    function show_registration($patient)
    {   $this->load->helper(array(
            'form',
            'url'
        ));

        $headerData = array(
            'title' => 'CQS - Patient Registration'
        );
        
		$this->load->view('header', $headerData);        
		if ($patient != null) {
			$this->load->view('patient_registration_view', $patient);
		}
		else {
			$this->load->view('patient_registration_view');

		}
		
        $this->load->view('footer');
    }
    
	function show_patient_info() {
	
	
	}
	
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
    
}



?>