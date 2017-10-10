<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Empleado_model');
		$this->load->library('form_validation');
		$this->load->model('Usuario_Model');
		$this->load->model('Categoria_Model');
		$this->load->library('encrypt');
	}

	public function index(){

	    if($this->session->userdata('empleado_data'))  {


	    	$session_data = $this->session->userdata('client_data');
	      	$data['username'] = $session_data['nombre'];
	      	$data['apellido'] = $session_data['apellido'];
	      	$data['session_status'] = "enabled";
	      	$data['titulo'] = "Lista de Empleados";
	      	$data['Categorias'] = $this->Categoria_Model->getCategorias();

		      //Paginación
		      $this->load->library('pagination');

		      $config['total_rows'] = $this->Empleado_model->countEmpleados();
		      $config['base_url'] = base_url('CPanel/Producto/pagina');
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
		      $data['Empleados'] = $this->Empleado_model->getEmpleados($config['per_page'], $this->uri->segment(4));

				$this->load->view('Admin/Layout/Head', $data);
				$this->load->view('Admin/Layout/Nav');
				$this->load->view('Admin/Layout/SideBar');
				$this->load->view('Admin/Lists/Empleado');
				$this->load->view('Admin/Layout/Footer');
				$this->load->view('Admin/Layout/End');

	    }
	    else{
	      redirect(site_url('ControlPanel'),'refresh');
	    }
	}

	public function login(){
		
		if($this->input->is_ajax_request()){
			$this->form_validation->set_rules('email', 'E-Mail', 'required');
			$this->form_validation->set_rules('pass', 'Contraseña', 'required');
			if ($this->form_validation->run() === TRUE){
				$password = $this->input->post('pass');
				$hash = $this->encrypt->decode($password);
				$data = array(
					'email' => $this->input->post('email'),
					'pass' => $hash
				);
				$user_data = $this->Usuario_Model->loginEmpleado($data);
				if($user_data != null){
					$sess_data = array();
					foreach($user_data as $userDat){
						$sess_data = array(
							'id' => $userDat->id_Empleado,
							'nombre' => $userDat->nombre,
							'apellido' => $userDat->apellido,
							'password' => $userDat->pass,
							'permisos' => $userDat->permisos,
							'avatar' => $userDat->avatar
						);
					}
					$this->session->set_userdata('empleado_data', $sess_data);
					echo 1; //OK;
				}else{
					echo 2; //No OK;
				}
			}else{
				echo validation_errors();
			}
		}else{
			echo "Acceso Denegado";
		}
	}

	public function logOut(){
		$this->session->unset_userdata('logged_in');
    	session_destroy();
		redirect(base_url(), reload);
	}

	public function detalleEmpleado(){
		if($this->input->is_ajax_request()){
			$idEmpleado = $this->input->post('idEmpleado');
			$empleadoData = $this->Empleado_model->detalleEmpleado($idEmpleado);
			$empleadoData[0]->pass = $this->encrypt->decode($empleadoData[0]->pass);
			echo json_encode($empleadoData);
		}else{
			echo "Acceso Denegado";
		}
	}

	public function registro(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|max_length[50]|valid_email|is_unique[empleado.email]');
			$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required');
			$this->form_validation->set_rules('permisos', 'Permisos', 'trim|required');
			$this->form_validation->set_rules('status', 'Estado', 'trim|required');
			$this->form_validation->set_message('is_unique','El {field} ya esta registrado.');
			//
			if ($this->form_validation->run() == TRUE) {
				$password = $this->input->post('pass');
				$hash = $this->encrypt->encode($password);

				$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellidos'),
						'email' => $this->input->post('email'),
						'pass' => $hash,
						'permisos' => $this->input->post('permisos'),
						'status' => $this->input->post('status')
					);

				if ($this->Empleado_model->add($data)) {
					$res = "Correcto";
				}else{
					$res = "Error";
				}
				echo json_encode(array('Respuesta' => $res));
			} else {	
				echo json_encode(validation_errors('<li>','</li>'));
			}
		}else{
			echo "Acceso Denegado";
		}
	}

	public function update(){
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[30]');
			$this->form_validation->set_rules('apellidos', 'apellidos', 'trim|required|max_length[50]');
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|max_length[50]|valid_email');
			$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required');
			$this->form_validation->set_rules('permisos', 'Permisos', 'trim|required');
			$this->form_validation->set_rules('status', 'Estado', 'trim|required');
			$this->form_validation->set_message('is_unique','El {field} ya esta registrado.');
			//
			if ($this->form_validation->run() == TRUE) {
				$id = $this->input->post('idE');
				$password = $this->input->post('pass');
				$hash = $this->encrypt->encode($password);
				$data = array(
						
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellidos'),
						'email' => $this->input->post('email'),
						'pass' => $hash,
						'permisos' => $this->input->post('permisos'),
						'status' => $this->input->post('status')
					);

				if ($this->Empleado_model->udpate($data, $id)) {
					$res = "Correcto";
				}else{
					$res = "Error";
				}
				echo json_encode(array('Respuesta' => $res));
			} else {	
				echo json_encode(validation_errors('<li>','</li>'));
			}
		}else{
			echo "Acceso Denegado";
		}
	}


}

/* End of file Empleado.php */
/* Location: ./application/controllers/Admin/Empleado.php */
