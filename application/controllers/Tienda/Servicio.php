<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicio extends CI_Controller {

  public function __construct(){
    parent::__construct();
    $this->load->model('Categoria_Model');
    //$this->load->model('Producto_Model');
  }

  function index(){

    if($this->session->userdata('client_data')){
      $session_data = $this->session->userdata('client_data');
      $data['username'] = $session_data['nombre'];
      $data['session_status'] = "enabled";
      $data['session_status'] = true;
    }
    else
    {
      $data['session_status'] = "disables";
      $data['session_status'] = false;
    }

    $data['Categorias'] = $this->Categoria_Model->getCategorias();
    //$data['Productos'] = $this->Producto_Model->getProductos();
    $data['titulo'] = "Servicios";

    $this->load->view('Tienda/Layout/Header', $data);
    $this->load->view('Tienda/Layout/Nav');
    $this->load->view('Tienda/Pages/Servicios_Page');
    $this->load->view('Tienda/Layout/Footer');
    $this->load->view('Tienda/Layout/End');

  }

}

/* End of file Servicio.php */
/* Location: ./application/controllers/Tienda/Servicio.php */