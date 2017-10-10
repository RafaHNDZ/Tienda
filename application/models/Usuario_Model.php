<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_Model extends CI_Model {

  public $table="cliente";

   public function registUser($data){
       if($this->db->insert("cliente",$data)){
         return true;
       }else{
         return false;
       }
   }

   public function login($data){
     $this->db->select('*');
     $query = $this->db->get_where('cliente', array('email' => $data['email'], 'pass' => $data['pass']));
     if($query != null){
       return $query->result();
     }else{
       return null;
     }
   }

   public function loginEmpleado($data){
     $this->db->select('*');
     $query = $this->db->get_where('empleado', array('email' => $data['email'], 'pass' => $data['pass']));
     if($query != null){
       return $query->result();
     }else{
       return null;
     }
   }

   public function getDetails($idCient){
    $this->db->select('*');
    $this->db->from('cliente');
    $this->db->where('cliente.id_Cliente', $idCient);
    $query = $this->db->get();
    if ($query != null) {
      return $query->result();
    }else{
      return null;
    }
   }

   public function emailUnico($email){
    $this->db->select('id_Cliente');
    $this->db->from('cliente');
    $this->db->where('email', $email);
    $query = $this->db->get();
    if($query->num_rows() >= 1){
      return false;
    }else{
      return true;
    }
   }

   public function update($id, $data){
      $this->db->where('id_Cliente', $id);
      $this->db->update('cliente', $data);
      if($this->db->affected_rows()){
        return true;
      }else{
        return false;
      }
   }

}
