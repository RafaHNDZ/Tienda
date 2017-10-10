<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Usuario_Model');
		$this->load->library('form_validation');
		$this->load->model('Categoria_Model');
		$this->load->model('');
	}

	public function index()
	{
		//$this->load->helper('url');
		//$this->load->view('person_view');
    echo "Usuario";
	}

	public function ajax_list()
	{
		$list = $this->person->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $person) {
			$no++;
			$row = array();
			$row[] = $person->firstName;
			$row[] = $person->lastName;
			$row[] = $person->telefono;
			$row[] = $person->email;
			$row[] = $person->address;
			$row[] = $person->dob;

			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_person('."'".$person->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->person->count_all(),
						"recordsFiltered" => $this->person->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit($id)
	{
		$data = $this->person->get_by_id($id);
		$data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add(){
		//$this->_validate();
		if ($this->input->is_ajax_request()) {
			$this->form_validation->set_rules('firstName', 'Nombre', 'required|trim|max_length[45]');
			$this->form_validation->set_rules('lastName', 'Apellido', 'required|trim|max_length[45]');
			$this->form_validation->set_rules('telefono', 'Telefono', 'required|trim|max_length[45]');
			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|valid_email|is_unique[cliente.email]|max_length[45]');
			$this->form_validation->set_rules('password', 'Contraseña', 'required');
			$this->form_validation->set_rules('address', 'Dirección', 'required');
			$this->form_validation->set_rules('dob', 'Fecha de Nacimiento', 'required');

			$this->form_validation->set_message('is_unique', 'El {field} ya se encuentra registrado, ingrese otro.');

			if ($this->form_validation->run() === TRUE){

				$this->load->library('encrypt');
				$password = $this->input->post('password');
				$hash = $this->encrypt->encode($password);

				$date = date('Y-m-d');
				$data = array(
						'Nombre' => $this->input->post('firstName'),
						'apellido' => $this->input->post('lastName'),
						'telefono' => $this->input->post('telefono'),
						'email' => $this->input->post('email'),
						'pass' => $hash,
						'direccion' => $this->input->post('address'),
						'fecha_nacimiento' => $this->input->post('dob'),
						'fechaRegistro' => $date
					);
				if($this->Usuario_Model->registUser($data) === true){
					echo "Usuario Registrado";
				}else{
					echo "Usuario no registrado";
				}
			}else{
				echo validation_errors('<li>','</li>');
			}
		}else{
			echo "Acceso Denegado";
		}
		//$insert = $this->person->save($data);
		//echo json_encode(array("status" => TRUE));
	}

	public function ajax_login(){
		$this->form_validation->set_rules('email', 'E-Mail', 'required|max_length[45]');
		$this->form_validation->set_rules('pass', 'Contraseña', 'required|max_length[45]');
		if ($this->form_validation->run() === TRUE){

			$this->load->library('encrypt');
			$password = $this->input->post('pass');
			$hash = $this->encrypt->decode($password);

			$data = array(
				'email' => $this->input->post('email'),
				'pass' => $hash
			);
			$user_data = $this->Usuario_Model->login($data);
			if($user_data != null){
				$sess_data = array();
				foreach($user_data as $userDat){
					$sess_data = array(
						'id' => $userDat->id_Cliente,
						'nombre' => $userDat->nombre,
						'apellido' => $userDat->apellido
					);
				}
				$this->session->set_userdata('client_data', $sess_data);
				echo 1;
			}else{
				echo 2;
			}
		}else{
			echo validation_errors('<li>','</li>');
		}
	}

	public function logOut(){
		$this->session->unset_userdata('logged_in');
    session_destroy();
		redirect(base_url(), reload);
	}

	public function Perfil(){
	    if($this->session->userdata('client_data'))  {
			  $this->load->library('encrypt');
		      $session_data = $this->session->userdata('client_data');
		      $data['username'] = $session_data['nombre'];
		      $data['apellido'] = $session_data['apellido'];
		      $data['session_status'] = true;
		      $data['Categorias'] = $this->Categoria_Model->getCategorias();
		      $data['titulo'] = "Mi Perfil";
		      $UserData = $this->Usuario_Model->getDetails($session_data['id']);
		      $UserData[0]->pass = $this->encrypt->decode($UserData[0]->pass);
		      $data['userData'] = $UserData;
		      $this->load->view('Tienda/Layout/Header', $data);
		      $this->load->view('Tienda/Layout/Nav');
		      $this->load->view('Tienda/Pages/Perfil_Page');
		      $this->load->view('Tienda/Layout/Footer');
		      $this->load->view('Tienda/Layout/End');
	    }else{
	      $data['session_status'] = false;
	      redirect(base_url(),'refresh');
	    }

	}

	//Actualizar información del usuario-Tienda
	public function updateUserData(){
		if ($this->input->is_ajax_request()) {

			$this->load->library('form_validation');

			$this->form_validation->set_rules('email', 'E-Mail', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('pwd', 'Contraseña', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|max_length[45]');
			$this->form_validation->set_rules('apellidos', 'Apellidos', 'trim|required|max_length[45]');
			//$this->form_validation->set_rules('avatar-1', 'Avatar', 'required');

			if ($this->form_validation->run() == TRUE) {
				$this->load->helper('form');
				if(!empty($_FILES['avatar']['name'])){

					$config['upload_path'] = './assets/uploads/avatars';
					$config['allowed_types'] = 'gif|jpg|png';
					$config['max_size']  = '2048';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';
					
					$this->load->library('upload', $config);
					
					if (!$this->upload->do_upload('avatar')){
						echo json_encode(array('Errors' => $this->upload->display_errors(' ',' ')));
					}
					else{
						//Actualizar con nueva imagen
						$img = array('upload_data' => $this->upload->data());
						//echo var_dump($img['upload_data']);
						$this->load->library('encrypt');
						$password = $this->input->post('pwd');
						$hash = $this->encrypt->encode($password);
						$data = array(
							'nombre' => $this->input->post('nombre'),
							'apellido' => $this->input->post('apellidos'),
							'pass' => $hash,
							'avatar' => $img['upload_data']['file_name']
							);
						$id = $this->input->post('idUser');
						if($this->Usuario_Model->update($id, $data)){
							echo json_encode(array('Msg' => 'Ok'));
							
						}else{
							echo json_encode(array('Msg' => 'Sin cambios'));
						}	
					}

				}else{
					//Actualizar sin nueva imagen
					$this->load->library('encrypt');
					$password = $this->input->post('pwd');
					$hash = $this->encrypt->encode($password);
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'apellido' => $this->input->post('apellidos'),
						'pass' => $hash
						);
					$id = $this->input->post('idUser');
					if($this->Usuario_Model->update($id, $data)){
						echo json_encode(array('Msg' => 'Ok'));
						
					}else{
						echo json_encode(array('Msg' => 'Sin cambios'));
					}				
				}
				
					
			} else {
				echo json_encode(array('Errors' => validation_errors(' ',' ')));
			}
			
		}else{
			echo "Acceso Denegado";
		}
	}

	public function updateAvatar(){
		$config['upload_path'] = './assets/images/users/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '2048';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload()){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = array('upload_data' => $this->upload->data());
			echo "success";
		}
	}

	public function Registro(){
    if($this->session->userdata('client_data'))  {
	      $session_data = $this->session->userdata('client_data');
	      $data['username'] = $session_data['nombre'];
	      $data['apellido'] = $session_data['apellido'];
	      $data['session_status'] = true;
	    }
	    else{
	      $data['session_status'] = false;
	    }

	    $data['Categorias'] = $this->Categoria_Model->getCategorias();
	    $data['titulo'] = "Mi Tienda XD";

	    $this->load->view('Tienda/Layout/Header', $data);
	    $this->load->view('Tienda/Layout/Nav');
	    $this->load->view('Tienda/Pages/Registro_Page');
	    $this->load->view('Tienda/Layout/Footer');
	    $this->load->view('Tienda/Layout/End');	
	}

}
