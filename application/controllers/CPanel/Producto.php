<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Categoria_Model');
		$this->load->model('Producto_Model');
	}

	public function index(){

		$idCat = "no";

		$data['titulo'] = "Inventario";

	    if($this->session->userdata('empleado_data'))  {

	      $session_data = $this->session->userdata('client_data');
	      $data['username'] = $session_data['nombre'];
	      $data['apellido'] = $session_data['apellido'];
	      $data['Categorias'] = $this->Categoria_Model->getCategorias();
	      $data['session_status'] = "enabled";

	      //Paginación
	      $this->load->library('pagination');

	      $config['total_rows'] = $this->Producto_Model->countProductos($idCat);
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

	      $data['Productos'] = $this->Producto_Model->getInventario($config['per_page'], $this->uri->segment(4), $idCat);


			$this->load->view('Admin/Layout/Head', $data);
			$this->load->view('Admin/Layout/Nav');
			$this->load->view('Admin/Layout/SideBar');
			$this->load->view('Admin/Lists/Producto');
			$this->load->view('Admin/Layout/Footer');
			$this->load->view('Admin/Layout/End');

	    }
	    else{
	      $data['session_status'] = "disables";
	      $this->load->view('Admin/Forms/Login_form', $data);
	    }
	}

	public function porCategoria($idCat){

		$data['titulo'] = "Inventario de Categoria";

	    if($this->session->userdata('empleado_data'))  {

	      $session_data = $this->session->userdata('client_data');
	      $data['username'] = $session_data['nombre'];
	      $data['apellido'] = $session_data['apellido'];
	      $data['Categorias'] = $this->Categoria_Model->getCategorias();
	      $data['session_status'] = "enabled";

	      //Paginación
	      $this->load->library('pagination');

	      $config['total_rows'] = $this->Producto_Model->countProductos($idCat);
	      $config['base_url'] = base_url('CPanel/Producto/porCategoria/'.$idCat.'/pagina');
	      $config['per_page'] = 10;
	      $config['uri_segment'] = 6;
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

	      $data['Productos'] = $this->Producto_Model->getInventarioByCategoria($config['per_page'], $this->uri->segment(6), $idCat);


			$this->load->view('Admin/Layout/Head', $data);
			$this->load->view('Admin/Layout/Nav');
			$this->load->view('Admin/Layout/SideBar');
			$this->load->view('Admin/Lists/Producto');
			$this->load->view('Admin/Layout/Footer');
			$this->load->view('Admin/Layout/End');

	    }
	    else{
	      $data['session_status'] = "disables";
	      $this->load->view('Admin/Forms/Login_form', $data);
	    }
	}

	public function addProducto(){
		if ($this->input->is_ajax_request()) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[5]|max_length[45]');
			$this->form_validation->set_rules('precio', 'Precio', 'trim|required|numeric');
			$this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|numeric');
			$this->form_validation->set_rules('categoria', 'Categoria', 'required');
			//$this->form_validation->set_rules('imagen', 'Imagen', 'required');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required|min_length[5]|max_length[250]');

			if ($this->form_validation->run() == TRUE ) {
				if(!empty($_FILES['imagen']['name'])){
					$config['upload_path'] = './assets/uploads/products';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size']  = '2048';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';
					
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('imagen')){
						echo json_encode(array('Erros' => $this->upload->display_errors()));
					}
					else{
						$img = array('upload_data' => $this->upload->data());
						$data = array(
							'nombre' => $this->input->post('nombre'),
							'precio' => $this->input->post('precio'),
							'Categoria_id_Categoria' => $this->input->post('categoria'),
							'stock' => $this->input->post('cantidad'),
							'descripcion' => $this->input->post('descripcion'),
							'imagen' => $img['upload_data']['file_name']
							);
					}
				}else{
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'precio' => $this->input->post('precio'),
						'Categoria_id_Categoria' => $this->input->post('categoria'),
						'stock' => $this->input->post('cantidad'),
						'descripcion' => $this->input->post('descripcion'),
						//'imagen' => $this->input->post('imagen')
						);
				}
				if ($this->Producto_Model->insert($data)) {
					echo json_encode(array('Msg' => "Ok"));
				}else{
					echo json_encode(array('Msg' => "No se pudo registrar"));
				}
			} else {
				echo json_encode(array('Erros' => validation_errors()));
			}
		}else{
			echo "Acceso Denegado";
		}
	}

	public function detalleProducto(){
		$idProducto = $this->input->post('idProducto');
		$data = $this->Producto_Model->detalleProducto($idProducto);
		if($data != null){
			$response = array();
			$response['Producto'] = $data;
			echo json_encode($response);
		}else{
			echo "No encontrado";
		}
	}

	public function updateProducto(){
		if ($this->input->is_ajax_request()) {
			$this->load->library('form_validation');

			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[5]|max_length[45]');
			$this->form_validation->set_rules('precio', 'Precio', 'trim|required|numeric');
			$this->form_validation->set_rules('cantidad', 'Cantidad', 'trim|required|numeric');
			$this->form_validation->set_rules('categoria', 'Categoria', 'required');
			$this->form_validation->set_rules('idProd', 'ID Producto', 'required|numeric');
			$this->form_validation->set_rules('descripcion', 'Descripción', 'trim|required|min_length[5]|max_length[250]');

			if ($this->form_validation->run() == TRUE ) {
				$id = $this->input->post('idProd');
				if(!empty($_FILES['imagen']['name'])){
					$config['upload_path'] = './assets/uploads/products';
					$config['allowed_types'] = 'jpg|png';
					$config['max_size']  = '2048';
					$config['max_width']  = '1024';
					$config['max_height']  = '1024';
					
					$this->load->library('upload', $config);
					
					if ( ! $this->upload->do_upload('imagen')){
						echo json_encode(array('Erros' => $this->upload->display_errors()));
					}
					else{
						$img = array('upload_data' => $this->upload->data());
						$data = array(
							'nombre' => $this->input->post('nombre'),
							'precio' => $this->input->post('precio'),
							'Categoria_id_Categoria' => $this->input->post('categoria'),
							'stock' => $this->input->post('cantidad'),
							'descripcion' => $this->input->post('descripcion'),
							'imagen' => $img['upload_data']['file_name']
							);
						if ($this->Producto_Model->update($id, $data)) {
							echo json_encode(array('Msg' => "Ok"));
						}else{
							echo json_encode(array('Msg' => "Sin Cambios"));
						}
					}
				}else{
					$data = array(
						'nombre' => $this->input->post('nombre'),
						'precio' => $this->input->post('precio'),
						'Categoria_id_Categoria' => $this->input->post('categoria'),
						'stock' => $this->input->post('cantidad'),
						'descripcion' => $this->input->post('descripcion'),
						//'imagen' => $this->input->post('imagen')
						);
						if ($this->Producto_Model->update($id, $data)) {
							echo json_encode(array('Msg' => "Ok"));
						}else{
							echo json_encode(array('Msg' => "Sin Cambios"));
						}
				}
			} else {
				echo json_encode(array('Erros' => validation_errors()));
			}
		}else{
			echo "Acceso Denegado";
		}
	}
}

/* End of file Producto.php */
/* Location: ./application/controllers/CPanel/Producto.php */
