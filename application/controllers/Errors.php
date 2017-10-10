<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
      $this->load->model('Categoria_Model');
      $this->load->model('Producto_Model');
  }

  public function error_404(){
    if($this->session->userdata('client_data'))
    {
      $session_data = $this->session->userdata('client_data');
      $data['username'] = $session_data['nombre'];
      $data['session_status'] = "enabled";
    }
    else
    {
      $data['session_status'] = "disables";
    }

    $data['Categorias'] = $this->Categoria_Model->getCategorias();
    $data['Productos'] = $this->Producto_Model->getProductos();

    $this->load->view('Tienda/Layout/Header', $data);
    $this->load->view('Tienda/Layout/Nav');
    $this->load->view('Tienda/Layout/Error/Error_404');
    $this->load->view('Tienda/Layout/Footer');
    $this->load->view('Tienda/Layout/End');
  }
}
