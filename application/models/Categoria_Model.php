<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_Model extends CI_Model{

  public function __construct(){
    parent::__construct();

  }

  public function getCategorias(){
    $this->db->select('*');
    $this->db->from('categoria');
    $query = $this->db->get();
    if($query != null){
      return $query->result();
    }else{
      return null;
    }
  }

  public function countCategorias(){
    $this->db->select('id_Categoria');
    $this->db->from('categoria');
    $query = $this->db->get();
    return $query->num_rows();
  }

}
