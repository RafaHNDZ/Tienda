<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('Categoria_Model');
    $this->load->model('Producto_Model');
  }

  function index(){

    if($this->session->userdata('client_data')){
      $session_data = $this->session->userdata('client_data');
      $data['username'] = $session_data['nombre'];
      $data['apellido'] = $session_data['apellido'];
      $data['session_status'] = "enabled";
      $data['idClient'] = $session_data['id'];
    }else{
      $data['session_status'] = "disables";
      $data['idClient'] = "null";
    }

    $data['Categorias'] = $this->Categoria_Model->getCategorias();
    $data['Productos'] = $this->Producto_Model->getProductos();
    $data['titulo'] = "Mi Tienda XD";

    $this->load->view('Tienda/Layout/Header', $data);
    $this->load->view('Tienda/Layout/Nav');
    $this->load->view('Tienda/Layout/Sidebar');
    $this->load->view('Tienda/Mostrador');
    $this->load->view('Tienda/Layout/Footer');
    $this->load->view('Tienda/Layout/End');

  }

}
