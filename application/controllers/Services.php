<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	var $token;
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function index()
	{   $this->load->model('ServicesModel');
		$data['comps']=$this->ServicesModel->getData();
        $this->load->view('v_header');
        $this->load->view('user/v_services', $data);
        $this->load->view('v_footer');
	}
	public function create (){
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('ServicesModel');
		$data['title']='Create reservation';
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('id', 'pc_id', 'required');
		$this->form_validation->set_rules('nrp', 'Nrp', 'required');
		$this->form_validation->set_rules('no_hp', 'No_hp', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == FALSE){
			$this->index();
		}else{
			$this->session->set_flashdata('update_token', time());
			$this->ServicesModel->setReservation();
			redirect('/services/success');
		}
	}

	public function success() {
		if( ! $this->session->flashdata('update_token')){
			redirect('services/index');
		}			
			$this->load->view('v_header');
			$this->load->view('v_succes');			
			$this->load->view('v_footer');
		}
}
?>