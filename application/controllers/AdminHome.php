<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AdminHome extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
 }
 
 function index()
 {
   if(isset($_SESSION['logged_in']))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['username'];
     $this->load->view('admin/v_adminhome', $data);
   }
   else
   {
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
 
}
 
?>