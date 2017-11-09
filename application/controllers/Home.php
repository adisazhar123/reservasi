<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{   
        $this->load->view('v_header');
        $this->load->view('user/index');
        $this->load->view('v_footer');
	}
}
