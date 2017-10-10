<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Usuario_Model');
		$this->load->library('form_validation');
    $this->load->model('Categoria_Model');
    $this->load->model('Producto_Model');
	}

  public function porCategoria($idCategoria){

    if(isset($idCategoria)){
      if($this->session->userdata('client_data')){
        $session_data = $this->session->userdata('client_data');
        $data['username'] = $session_data['nombre'];
        $data['session_status'] = true;
      }
      else{
        $data['session_status'] = false;
      }

      $data['Categorias'] = $this->Categoria_Model->getCategorias();
      $data['Productos'] = $this->Producto_Model->getProductosByCategoria($idCategoria);
      $data['titulo'] = "Categorias";

      $this->load->view('Tienda/Layout/Header', $data);
      $this->load->view('Tienda/Layout/Nav');
      $this->load->view('Tienda/Mostrador');
      $this->load->view('Tienda/Layout/Footer');
      $this->load->view('Tienda/Layout/End');

    }else{
      location(base_url(), 'reload');
    }
  }

  public function Detalle($id_producto){
    $data['producto'] = $this->Producto_Model->detalleProducto($id_producto);
    $this->load->view('Tienda/PopUps/Detalle_Producto', $data);
    //echo var_dump($producto);
  }
}
 ?>
