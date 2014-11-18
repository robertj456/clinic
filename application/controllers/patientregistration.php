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
	
	    $this->form_validation->set_rules('ramq', 'RAMQ', 'trim|required|xss_clean|callback_get_patient');

        if (!$this->session->userdata('logged_in')) {
            //redirect('login', 'refresh');
        } else {
            if ($this->form_validation->run() == FALSE) {		
				$this->show_registration();
				//echo $this->get_patient();
				
				
			} else // ramq was correct
                {
                echo "correct ramq";
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
			return false;
		}
		
		else {
			return true;
		}
		// here we can show the other fields and populate them.
    }
    
    function show_registration()
    {   $this->load->helper(array(
            'form',
            'url'
        ));

        $headerData = array(
            'title' => 'CQS - Patient Registration'
        );
        
        $this->load->view('header', $headerData);
        $this->load->view('patient_registration_view');
        $this->load->view('footer');
    }
    
    function logout()
    {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
    
}



?>