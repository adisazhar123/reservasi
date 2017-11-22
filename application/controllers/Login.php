<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

  var $LoginToken;
  function __construct(){
    parent::__construct();
  }

  function index(){
    if(isset($_SESSION['logged_in'])){
      redirect('adminhome');
    }
    else{
      $data['msg']=NULL;
      $this->load->view('v_header');
      $this->load->view('user/v_login',$data);
      $this->load->view('v_footer'); 
    }
  }

  function register(){
      $this->load->model('LoginModel');
      $this->form_validation->set_rules('nrp', 'Nrp', 'required|callback_CheckRegistered');
      $this->form_validation->set_rules('username', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');
      
      if($this->form_validation->run()==FALSE){
        $this->index();
      }else{
        $this->session->set_flashdata('update_LoginToken', time());
        $this->LoginModel->register();
        redirect('Login/success');
      }
  }

  function CheckRegistered($nrp){
    $result = $this->LoginModel->IsUserRegistered($nrp);

    if ($result){
      $this->form_validation->set_message('CheckRegistered', 'The user is already registered. Please provide a new NRP');
      return false;
    }
    else{
      return true;
    }
  }

  function success(){
    if (! $this->session->flashdata('update_LoginToken')){
      redirect('Login/index');
    }
    $data['msg']='User has been succesfully registered!';    
    $this->load->view('v_header');
    $this->load->view('user/v_login',$data);			
    $this->load->view('v_footer');
  }
}
?>