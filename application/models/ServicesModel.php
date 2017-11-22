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
            'compId' => $this->input->post('CompId'),
            'nama'=> $this->input->post('name'),
            'nrp'=> $this->input->post('nrp'),
            'email'=> $this->input->post('email'),
            'noHp'=>$this->input->post('no_hp'),
            'time'=> date('d-m-Y H:i:s'),
            'comments'=>$this->input->post('comments')
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
