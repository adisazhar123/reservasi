<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model{
  
    public function showAllReservation(){
      $this->db->order_by('time', 'asc');      
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


    function setComptoZero($compId){
      $field = array(
        'status'=>0
      );
      $this->db->where('CompId', $compId);
      $this->db->update('computer', $field);
    }
}

?>