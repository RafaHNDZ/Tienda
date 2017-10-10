<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControlPanel extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Producto_Model');
		$this->load->model('Categoria_Model');
		$this->load->model('Cliente_Model');
	}

	public function index(){

		$data['titulo'] = "Panel de Control";

	    if($this->session->userdata('empleado_data'))  {


	      $session_data = $this->session->userdata('client_data');
	      $data['username'] = $session_data['nombre'];
	      $data['apellido'] = $session_data['apellido'];
	      $data['numProductos'] = $this->Producto_Model->countProductos("no");
	      $data['numCategorias'] = $this->Categoria_Model->countCategorias();
	      $data['numClientes'] = $this->Cliente_Model->countClientes();
	      $data['Categorias'] = $this->Categoria_Model->getCategorias();
	      $data['session_status'] = "enabled";

			$this->load->view('Admin/Layout/Head', $data);
			$this->load->view('Admin/Layout/Nav');
			$this->load->view('Admin/Layout/SideBar');
			$this->load->view('Admin/Layout/DashBoard');
			$this->load->view('Admin/Layout/Footer');
			$this->load->view('Admin/Layout/End');

	    }
	    else{
	      $data['session_status'] = "disables";
	      $this->load->view('Admin/Forms/Login_form', $data);
	    }
	}

}

/* End of file ControlPanel.php */
/* Location: ./application/controllers/ControlPanel.php */