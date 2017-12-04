<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminHome extends CI_Controller {
 
	function __construct(){
		parent::__construct();
		
  	}
 
	function index(){
  		if(isset($_SESSION['logged_in'])){
     		$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('admin/v_header');
			$this->load->view('admin/v_adminhome', $data);
			$this->load->view('v_footer');
			
   		}
   		else{
    	//If no session, redirect to login page
			redirect('login', 'refresh');
   		}
	}

	function computers(){
		if(isset($_SESSION['logged_in'])){
			$session_data = $this->session->userdata('logged_in');
		   $data['username'] = $session_data['username'];
		   $this->load->view('admin/v_header');
		   $this->load->view('admin/v_adminhomecomputers', $data);
		   $this->load->view('v_footer');
		   
		  }
		  else{
	   //If no session, redirect to login page
		   redirect('login', 'refresh');
		  }
	}
 
	function logout()
 	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('AdminHome', 'refresh');
	}

	public function showAllReservation(){		
		$result = $this->AdminModel->showAllReservation();
		echo json_encode($result);
	}

	public function acceptReservation(){
		$result=$this->AdminModel->acceptReservation();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);

	}

	public function declineReservation(){
		$result=$this->AdminModel->declineReservation();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
		
	}

	public function showAllComputers(){
		$result = $this->AdminModel->showAllComputers();
		echo json_encode($result);
	}

	public function updateComputers(){
		$result = $this->AdminModel->updateComputers();
		$msg['success'] = false;
		$msg['type'] = 'update';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function editComputers(){
		$result = $this->AdminModel->editComputers();
		echo json_encode($result);
	}
 

	public function addComputers(){
		$result = $this->AdminModel->addComputers();
		$msg['success'] = false;
		$msg['type'] = 'add';
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}

	public function deleteComputers(){
		$result = $this->AdminModel->deleteComputers();
		$msg['success'] = false;
		if($result){
			$msg['success'] = true;
		}
		echo json_encode($msg);
	}
}
 
?>