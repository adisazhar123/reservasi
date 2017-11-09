<?php

class LoginModel extends CI_Model
{
    public function getData()
    {
        $query=$this->db->get('user_');
        return $query->result();
    }
    public function setUser(){
        $data = array(
            'USERNAME'=> $this->input->post('username'),
            'PWD'=>$this->input->post('password')
        );
        
        return $this->db->insert('user_', $data);
    }
}
