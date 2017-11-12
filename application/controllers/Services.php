<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	var $token;
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		$this->load->model('ServicesModel');
	}
	public function index()
	{   
		$data['msg']=NULL;		
		$data['computers']=$this->ServicesModel->GetComps();
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

	public function GetSpecs(){
		$CompId=$this->input->post('CompId');
		$specs = $this->ServicesModel->GetSpecsQuery($CompId);

		if (count($specs)>0){
			$paragraph='';
			$processor = 'Processor: ';
			$ram = 'Ram: ';
			$harddisk = 'Harddisk: ';
			$graphicscard = 'Graphics Card: ';
			$monitor = 'Monitor: ';
			
			foreach($specs as $spec){
				$paragraph .= '<p>'.$processor. " " .$spec->PROCESSOR. " ".'<br>'. " ".$ram. " ".$spec->RAM. 
				" " .'<br>' . " ".$harddisk . " ".$spec->HARDDISK . " " .'<br>' . " " .$graphicscard. " "
				.$spec->GRAPHICS_CARD . " " .'<br>'. " " .$monitor. " " .$spec->MONITOR. '</p>';
				
			}
			echo json_encode($paragraph);
		}
	}	

	}
?>