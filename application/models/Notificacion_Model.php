<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacion_Model extends CI_Model {

	public function getNotificaciones(){
		$this->db->select('*');
		$this->db->from('notificacion');
		$this->db->order_by('Id_notificacion','DESC');
		$this->db->limit('5');
		$query = $this->db->get();
		if($query != null){
			return $query->result();
		}
	}	

	public function getUnreadNotifications(){
		$this->db->select('Id_notificacion');
		$this->db->from('notificacion');
		$this->db->where('visto!=',1);
		$result = $this->db->get();
		return $result->num_rows();
	}

}

/* End of file Notificacion_Model.php */
/* Location: ./application/models/Notificacion_Model.php */