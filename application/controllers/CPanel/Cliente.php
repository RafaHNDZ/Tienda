<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Categoria_Model');
		$this->load->model('Cliente_Model');
	}

	public function index(){

		$data['titulo'] = "Clientes";

	    if($this->session->userdata('empleado_data'))  {

	      $session_data = $this->session->userdata('client_data');
	      $data['username'] = $session_data['nombre'];
	      $data['apellido'] = $session_data['apellido'];
	      $data['Categorias'] = $this->Categoria_Model->getCategorias();
	      $data['session_status'] = "enabled";

	      //Paginación
	      $this->load->library('pagination');
	      
	      $config['total_rows'] = $this->Cliente_Model->countClientes();
	      $config['base_url'] = base_url('CPanel/Cliente/pagina');
	      $config['per_page'] = 10;
	      $config['uri_segment'] = 4;
	      $config['num_links'] = 20;
	      $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
		  $config['full_tag_close'] = '</ul>';
		  $config['num_tag_open'] = '<li>';
		  $config['num_tag_close'] = '</li>';
		  $config['cur_tag_open'] = '<li class="active"><span>';
		  $config['cur_tag_close'] = '<span></span></span></li>';
		  $config['prev_tag_open'] = '<li>';
		  $config['prev_tag_close'] = '</li>';
		  $config['next_tag_open'] = '<li>';
		  $config['next_tag_close'] = '</li>';
		  $config['first_link'] = '«';
		  $config['prev_link'] = '‹';
		  $config['last_link'] = '»';
		  $config['next_link'] = '›';
		  $config['first_tag_open'] = '<li>';
		  $config['first_tag_close'] = '</li>';
		  $config['last_tag_open'] = '<li>';
		  $config['last_tag_close'] = '</li>';

	      $this->pagination->initialize($config);

	      $data['Clientes'] = $this->Cliente_Model->getClientes($config['per_page'], $this->uri->segment(4));

			$this->load->view('Admin/Layout/Head', $data);
			$this->load->view('Admin/Layout/Nav');
			$this->load->view('Admin/Layout/SideBar');
			$this->load->view('Admin/Lists/Cliente');
			$this->load->view('Admin/Layout/Footer');
			$this->load->view('Admin/Layout/End');

	    }
	    else{
	      $data['session_status'] = "disables";
	      $this->load->view('Admin/Forms/Login_form', $data);
	    }
	}

	public function detalleCliente(){
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('idCliente');
			$data = $this->Cliente_Model->getDetalle($id);
			if($data != null){
				echo json_encode(array('clientData' => $data));
			}else{
				echo json_encode(array('Error' => "Sin no se encontraron datos"));
			}
		}else{
			echo "Acceso Denegado";
		}
	}

}

/* End of file Cliente.php */
/* Location: ./application/controllers/CPanel/Cliente.php */