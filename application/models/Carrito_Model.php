<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito_Model extends CI_Model {

	public function addItem($data){
		if ($this->db->insert('carrito', $data)) {
			return true;
		}else{
			return false;
		}
	}

	public function getCarrito($idCliente){
		$this->db->select('*');
		$this->db->from('carrito');
		$this->db->where('cliente_id_Cliente', $idCliente);
		$query = $this->db->get();
		return $query->result();
	}	

	public function checkCarrito(){
		$this->db->select('*');
		$this->db->from('carrito');
		$this->db->where('status', 'pendiente');
		$query = $this->db->get();
		return $query->result();
	}

	public function crearDetalle($data){
		$this->db->insert('pedidos', $data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}

	public function generarOrden($data){
		$this->db->trans_begin();
		$this->db->insert('pedidos', array('fecha' => $data['fecha'], 'cliente_id_Cliente' => $data['cliente_id_Cliente']));
		$id_ticket = $this->db->insert_id();
		$orden = $data[0]['orden'];
		$finalOrden = array();
		foreach($orden as $prod){
			$producto = array("producto_id_Producto" => $prod['producto_id_Producto'], "cantidad" => $prod['cantidad'], "precio" => $prod['precio'], "pedidos_id_Pedido" => $id_ticket);
			array_push($finalOrden, $producto);
		}
		return $finalOrden;
		if($this->db->trans_status() === false){
			$this->db->trans_rollback();
			return false;
		}else{
			$this->db->trans_commit();
			return true;
		}
	}

}
