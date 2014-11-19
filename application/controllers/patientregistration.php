<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PatientRegistration extends CI_Controller
{    
    function __construct()
    {
        parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');

    }
    function index()
    {
		// read ramq id from flash data.
		$this->session->keep_flashdata('ramq');
		$ramq = $this->session->flashdata('ramq');
			
		// if user is not logged in or does not have receptionist privileges.
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('logged_in')['RECEPTION']) {
            redirect('login', 'refresh');
			
        } else {
						
			// form has been submitted
				// user made an error submitting form.
			    if ($this->form_validation->run() == FALSE ) {	
					$patient = $this->get_patient($ramq);
					$this->show_registration($patient);
					}
				else {
					$patient = $this->get_patient();
					$this->show_registration($patient);	
				}
		}
	}
  
    function get_patient($ramq)
    {
        // create instance of user model
        $this->load->model('patient');

        $patient = ($this->patient->findPatient($ramq));
				
		if (!$patient) {
		    $this->form_validation->set_message('get_patient', 'No patient found');
			return array(
			'RAMQ_ID' => $ramq
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
		

			$medications = array (
				'1' => 'Xanax',
				'2' => 'Tramadol',
				'3' => 'Lipitor',
				'4' => 'Ambien',
				'5' => 'Coffee',
				'6' => 'Donuts',
				'7' => 'Cheeseburgers',
				'8' => 'Beer',
				'9' => 'Morphine',
				'10' => 'Hot Chocolate',
				'11' => 'Advil',
				'12' => 'Caffeine Pills'
			);
			
			$data['medications'] = $medications;
			$data['patient'] = $patient;

			$this->load->view('patient_registration_view', $data);
		}
		else {
			$this->load->view('patient_registration_view');

		}
		
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