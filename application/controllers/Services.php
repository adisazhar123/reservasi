<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	var $token;
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{   
		
		$data['msg']=NULL;		
		$this->load->model('ServicesModel');
		$data['comps']=$this->ServicesModel->getData();
        $this->load->view('v_header');
        $this->load->view('user/v_services',$data);
        $this->load->view('v_footer');
	}
	public function create (){
		$this->load->model('ServicesModel');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('id', 'PC No', 'required');
		$this->form_validation->set_rules('nrp', 'NRP', 'required');
		$this->form_validation->set_rules('no_hp', 'NO. HP', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$this->session->set_flashdata('update_token', time());
			$this->ServicesModel->setReservation();
			redirect('services/success');
		}
	}

	public function success() {
		if( ! $this->session->flashdata('update_token')){
			redirect('services/index');
		}
			$data['msg']='Reservation submitted';
			$this->load->view('v_header');
			$this->load->view('user/v_services',$data);			
			$this->load->view('v_footer');
		}
}
?>