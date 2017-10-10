<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_Model extends CI_Model {
	
	public function getClientes($porpagina, $segmento){
	    $this->db->order_by('id_Cliente', 'DESC');
	    $query = $this->db->get('cliente', $porpagina, $segmento);
	    if($query != null){
	      return $query->result();
	    }else{
	      return null;
	    }
	}

	  public function countClientes(){
	    $this->db->select('id_Cliente');
	    $this->db->from('cliente');
	    $query = $this->db->get();
	    return $query->num_rows();
	  }	

	public function getDetalle($id){
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('id_Cliente', $id);
		$query = $this->db->get();
		if($query != null){
			return $query->result();
		}else{
			return null;
		}
	}

}

/* End of file Cliente_Model.php */
/* Location: ./application/models/Cliente_Model.php */