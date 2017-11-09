<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{   
		$this->load->model('LoginModel');
		$data['users'] = $this->LoginModel->getData();
		$this->load->view('v_header');
        $this->load->view('user/v_login');
	   	$this->load->view('v_footer');
	}

}