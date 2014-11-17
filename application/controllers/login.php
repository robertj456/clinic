<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 
	public function __construct() {
		parent:: __construct();
		
		//$this->load->library();
	}
 
	function index() {
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required|htmlentities');
		$this->form_validation->set_rules('password', 'Password', 'required|htmlentities');
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('login_view');
			$this->load->view('footer');
		}
		else
		{
			$validLogin = $this->login_user();
			if ($validLogin) {
				//redirect
			}
		}
	
	}
	
  
	function login_user() {

		// create instance of user model
		
		$this->load->model('user');
	
		$email = $this->input->post('username');
		$pass = $this->input->post('password');
		
		var_dump($this->user->login($email, $pass));

		// If values were passed in, validate.

	}

	/*
	function show_login( $show_error = false ) {
	
		$data['error'] = $show_error;
		$this->load->helper(array('form'));
		$headerData = array(
			'title' => 'CQS - Login',
		);
		$loginData = array(
			'pageTitle' => 'Client Queuing System'
		);
		
		$this->load->view('header', $headerData);
		$this->load->view('login_view', $data);
		$this->load->view('footer');
	}
	
	/*
    $this->load->helper(array('form'));
   
    $headerData = array(
		'title' => 'CQS - Login',
	);
	$loginData = array(
		'pageTitle' => 'Client Queuing System'
	);
	$this->load->view('header', $headerData);

    $this->load->view('login_view', $loginData);
    $this->load->view('footer');
	*/
 }
 

 
?>