<?php
Class LoginModel extends CI_Model{
  function login($username, $password){
    $this -> db -> select('username, password, nrp');
    $this -> db -> from('user_');
    $this -> db -> where('username', $username);
    $this -> db -> where('password',md5($password));
    $this -> db -> limit(1);
 
    $query = $this -> db -> get();
 
    if($query -> num_rows() > 0){
      return $query->result();
    }
    else{
      return false;
    }
  }

  function register(){
    $this->load->helper('url');
    $data = array(
    'username'=> $this->input->post('username'),
    'password'=>md5($this->input->post('password')),
    'nrp'=>$this->input->post('nrp')
    );
    return $this->db->insert('user_',$data);
  }
  
  function IsUserRegistered($nrp){
    $this->db-> select ('nrp');
    $this->db-> from ('user_');
    $this->db-> where ('nrp', $nrp);
    $this->db->limit(1);
    
    $query=$this->db->get();
    if($query -> num_rows()>0) return true;
    else return false;
  }
}
?>

