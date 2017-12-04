<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{
  
    public function showAllReservation(){
      $this->db->order_by('reservationId', 'asc');      
        $this->db->select('*');
        $this->db->from('reservation');
        $query = $this->db->get();
        if($query -> num_rows() > 0){
          return $query->result();
        }
        else{
          return false;
        }
    }
    public function acceptReservation(){
      $reservationId = $this->input->get('reservationId');
      $field = array(
        'status'=>'accepted'
      );
      $this->db->where('reservationId', $reservationId);
      $this->db->update('reservation', $field);

      $compId = $this->input->get('compId');
     
      if($this->db->affected_rows() > 0){
        $this->setComptoZero($compId);
        return true;
      }
      else{
        return false;
      }      
    }

    public function declineReservation(){
      $reservationId = $this->input->get('reservationId');
      $field = array(
        'status'=>'declined'
      );
      $this->db->where('reservationId', $reservationId);
      $this->db->update('reservation', $field);

      if($this->db->affected_rows() > 0){
        return true;
      }
      else{
        return false;
      }      
    }


    function setComptoZero($compId){
      $field = array(
        'status'=>0
      );
      $this->db->where('CompId', $compId);
      $this->db->update('computer', $field);
    }

    public function showAllComputers(){
      $this->db->order_by('compId', 'asc');      
      $this->db->select('*');
      $this->db->from('computer');
      $query = $this->db->get();
      if($query -> num_rows() > 0){
        return $query->result();
      }
      else{
        return false;
      }
    }

    public function updateComputers(){
      $id = $this->input->post('txtId');
      $field = array(
        'PROCESSOR'=>$this->input->post('txtProcessor'),
        'RAM'=>$this->input->post('txtRam'),
        'HARDDISK'=>$this->input->post('txtHarddisk'),
        'GRAPHICS_CARD'=>$this->input->post('txtGraphicscard'),
        'MONITOR'=>$this->input->post('txtMonitor'),
        'status'=>$this->input->post('txtStatus')
        
        );
        $this->db->where('CompId', $id);
        $this->db->update('computer', $field);
        if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    public function editComputers(){
      $id = $this->input->get('CompId');
      $this->db->where('CompId', $id);
      $query = $this->db->get('computer');
      if($query->num_rows() > 0){
        return $query->row();
      }else{
        return false;
      }
    }

    public function addComputers(){
      $field = array(
        'PROCESSOR'=>$this->input->post('txtProcessor'),
        'RAM'=>$this->input->post('txtRam'),
        'HARDDISK'=>$this->input->post('txtHarddisk'),
        'GRAPHICS_CARD'=>$this->input->post('txtGraphicscard'),
        'MONITOR'=>$this->input->post('txtMonitor'),
        'status'=>$this->input->post('txtStatus')
        );
      $this->db->insert('computer', $field);
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }

    public function deleteComputers(){
      $id = $this->input->get('CompId');
      $this->db->delete('computer', array('CompId' => $id)); 
      if($this->db->affected_rows() > 0){
        return true;
      }else{
        return false;
      }
    }
}

?>