<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto_Model extends CI_Model {

  public function __construct(){
    parent::__construct();

  }

  public function getProductos(){
  	$this->db->select('*');
  	$this->db->from('producto');
    $this->db->limit(8);
    $this->db->order_by('id_Producto','DESC');
  	$query = $this->db->get();
  	if($query != null){
  		return $query->result();
  	}else{
  		return null;
  	}
  }

  public function getProductosByCategoria($idCategoria){
    $this->db->select('*');
  	$this->db->from('producto');
    $this->db->where('Categoria_id_Categoria', $idCategoria);
    $this->db->order_by('id_Producto','DESC');
  	$query = $this->db->get();
  	if($query != null){
  		return $query->result();
  	}else{
  		return null;
  	}
  }

  public function countProductos($idCat){
    $this->db->select('id_Producto');
    $this->db->from('producto');
    if ($idCat != "no") {
      $this->db->where('Categoria_id_Categoria', $idCat);
    }
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function getInventario($porpagina,$segmento){
    $this->db->order_by('id_Producto', 'DESC');
    $query = $this->db->get('producto', $porpagina, $segmento);
    if($query != null){
      return $query->result();
    }else{
      return null;
    }
  }

  public function getInventarioByCategoria($porpagina,$segmento,$idCat){
    $this->db->order_by('id_Producto', 'DESC');
    $this->db->where('Categoria_id_Categoria', $idCat);
    $query = $this->db->get('producto', $porpagina, $segmento);
    if($query != null){
      return $query->result();
    }else{
      return null;
    }
  }

  public function insert($data){
    if ($this->db->insert('producto', $data)) {
      return true;
    }else{
      return false;
    }
  }

  public function update($id,$data){
    $this->db->where('id_Producto', $id);
    $this->db->update('producto', $data);
    if($this->db->affected_rows()){
      return true;
    }else{
      return false;
    }
  }

  public function detalleProducto($idProducto){
    $this->db->select('*');
    $this->db->from('producto');
    $this->db->where('id_Producto', $idProducto);
    $query = $this->db->get();
    return $query->result();

  }

  public function porId($id) {
       $this->db->where('id_Producto', $id);
       $productos = $this->db->get('producto');
       foreach ($productos->result() as $producto) {
           $data[] = $producto;
       }
       if ($producto->opciones) {
           $producto->opciones = explode(',', $producto->opciones);
       }
       return $producto;
  }

  public function checharCantidad($idProducto){
    $this->db->select('stock');
    $this->db->from('producto');
    $this->db->where('id_Producto', $idProducto);
    $query = $this->db->get();
    return $query->result();
  }

}

/* End of file Producto_Model.php */
/* Location: ./application/models/Producto_Model.php */
