<?php

class ServicesModel extends CI_Model
{
    public function getData()
    {
        $query=$this->db->get('computer');
        return $query->result();
    }
    

}
