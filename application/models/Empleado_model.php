<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado_model extends CI_Model {

	public function getEmpleados($porpagina, $segmento){
		$this->db->select('*');
		$this->db->from('empleado');
	    $this->db->where('permisos != ','superSu');
	    $this->db->order_by('id_Empleado', 'DESC');
	    $this->db->limit($porpagina, $segmento);
			$query = $this->db->get();
	    if($query != null){
	      return $query->result();
	    }else{
	      return null;
	    }
	}

	public function countEmpleados(){
		$this->db->select('id_Empleado');
	  	$this->db->from('empleado');
	  	$query = $this->db->get();
	  	return $query->num_rows();
	}

	public function detalleEmpleado($idEmpleado){
		$this->db->select('*');
		$this->db->from('empleado');
		$this->db->where('id_Empleado', $idEmpleado);
		$query = $this->db->get();
		if($query != null){
			return $query->result();
		}else{
			return false;
		}
	}	

	public function add($data){
		if ($this->db->insert('empleado', $data)) {
			return true;
		}else{
			return false;
		}
	}

	  public function udpate($data, $id){
	    $this->db->where('id_Empleado', $id);
	    $this->db->update('empleado', $data);
	    if($this->db->affected_rows()){
	      return true;
	    }else{
	      return false;
	    }
	  }

}

/* End of file Empleado_model.php */
/* Location: ./application/models/Empleado_model.php */