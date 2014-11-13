<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
	function index()
	{
	if ($this->session->userdata('isLoggedIn')) {
		// redirect
		} else {
		$this->show_login(false);
		}
	}
	
	function login_user() {
		
		$email = $this->input->post('username');
		$pass = $this->input->post('password');
		
		// If values were passed in, validate.

	}
	
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