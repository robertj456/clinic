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
		// set form rules
		$this->form_validation->set_rules('ramq', 'RAMQ', 'trim|required|xss_clean');
		$this->form_validation->set_rules('firstName', 'first name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('lastName', 'last name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('homePhone', 'home phone', 'trim|required|xss_clean');
		$this->form_validation->set_rules('emergencyPhone', 'emergency contact', 'trim|required|xss_clean');
		$this->form_validation->set_rules('conditions', 'existing conditions', 'trim|required|xss_clean');
		$this->form_validation->set_rules('primaryPhysician', 'primary physician', 'trim|required|xss_clean');

		$this->form_validation->set_error_delimiters("<div class='alert alert-danger' role='alert'>
		<span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
		<span class='sr-only'>Error:</span>", '</div>');

	
		// read ramq id from flash data.
		$this->session->keep_flashdata('ramq');
		$ramq = $this->session->flashdata('ramq');
			
		// if user is not logged in or does not have receptionist privileges.
        if (!$this->session->userdata('logged_in') || !$this->session->userdata('logged_in')['RECEPTION']) {
            redirect('login', 'refresh');
			
        } else {
						
			// form has been submitted
				$patient = $this->get_patient($ramq);
				if (isset($patient['PATIENT_ID'])) {
					$patient_id = $patient['PATIENT_ID'];
				}
			
				// user made an error submitting form.
			    if ($this->form_validation->run() == FALSE ) {	
					$this->show_registration($patient);
					}
				else {
					// form has been successfully submitted, add to queue and redirect.
					
					$patient = $_POST;

					// if patient id exists, patient is already in DB, therefore update.
					if (isset($patient_id)) {
						$this->updatePatient($patient);

					}
					// patient is not yet in db, inset.
					else {
						$this->addPatient($patient);
					}
					
					// add to triage queue.
					
					$message = $patient['firstName'] . " " . $patient['lastName'] . " was added to the queue";
					
					// send flash data to confirm that patient was added or updated to triage.
					$this->session->set_flashdata('change', $message);

					redirect("ramqregistration", 'refresh');
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
				
			$medications = array (
				'1' => 'Benzamycin',
				'2' => 'Accutane',
				'3' => 'Tamiflu',
				'4' => 'Acetaminophen',
				'5' => 'Advil',
				'6' => 'Levaquin',
				'7' => 'Vioxx',
				'8' => 'Celebrex',
				'9' => 'Zyprexa',
				'11' => 'Paxil',
				'12' => 'Nicoderm',
				'13' => 'Lorazepam',
				'14' => 'Elidel',
				'15' => 'Pegasys',
				'16' => 'Clikstar',
				'17' => 'Levaquin',
				'18' => 'Advair Diskus',
				'19' => 'Nexium',
				'20' => 'Kenalog'
			);
			
			$data['medications'] = $medications;
			$data['patient'] = $patient;

			$this->load->view('patient_registration_view', $data);
		
        $this->load->view('footer');
    }
    	
	function addPatient($patient) {
	    // create instance of user model
        $this->load->model('patient');
        $added = ($this->patient->addPatient($patient));
		if ($added) {
			return $added;				
		}
		else {
			return false;
		}

	}
		
	function updatePatient($patient) {
	    // create instance of user model
        $this->load->model('patient');
        $updated = ($this->patient->updatePatient($patient));
		if ($updated) {
			return $updated;				
		}
		else {
			return false;
		}
	}
    function logout() {

        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }
    
}



?>