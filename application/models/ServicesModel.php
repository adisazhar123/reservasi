<?php
class ServicesModel extends CI_Model
{
    public function getComps()
    {
        $query=$this->db->get('computer');
        return $query->result();
    }
    public function setReservation(){
        $this->load->helper('url');
        $data = array(
            'NAMA'=> $this->input->post('name'),
            'EMAIL'=> $this->input->post('email'),
            'NO_HP'=>$this->input->post('no_hp'),
            'TIME_'=>$this->input->post('Clock')
        );
        
        return $this->db->insert('reservation', $data);
    }

    public function input_data($data, $table)
    {
        $this->db->insert($table,$data);
    }

    public function GetSpecsQuery($CompId){
        $query = $this->db->get_where('computer',array('CompId'=> $CompId));
        return $query->result();
    }
    
}
