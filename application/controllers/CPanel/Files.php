<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Files extends CI_Controller {

	public function __Construct(){
		parent::__construct();
		$this->load->model('File_Model');
	}

	public function index(){
		if($this->session->userdata('empleado_data')){
			$session_data = $this->session->userdata('client_data');
	      	$data['username'] = $session_data['nombre'];
	      	$data['apellido'] = $session_data['apellido'];
	      	$data['session_status'] = "enabled";
	      	$data['titulo'] = "Lista de Archivos";
	      	$data['Archivos'] = $this->open_directory('/opt/lampp/htdocs/Apps/Tienda/assets/uploads');

			$this->load->view('Admin/Layout/Head', $data);
			$this->load->view('Admin/Layout/Nav');
			$this->load->view('Admin/Layout/SideBar');
			$this->load->view('Admin/Lists/File');
			$this->load->view('Admin/Layout/Footer');
			$this->load->view('Admin/Layout/End');
		}else{
			redirect(site_url('ControlPanel'),'refresh');
		}
	}

	public function open_directory($dir){
		$Directory = $this->File_Model->list_files($dir);
		return $Directory;
	}

	public function open_folder(){
		if($this->input->is_ajax_request()){
			$dir = $this->input->post('folder');
			$Directory = $this->File_Model->list_files($dir);
			//echo "Dir: ".$dir;
			$window_content = '';
			$navigation_content = '';
			foreach ($Directory['sub_paths'] as $path) {
				$navigation_content .= '
                <button class="btn btn-flat btn-xs" onclick="alert("'.$Directory['sub_paths'][0]['folder'].'")">
                  '.$Directory['sub_paths'][0]['path'].'
                  <span class="fa fa-arrow-right"></span>
                </button>';
			}
            foreach ($Directory['content'] as $File) {
            $window_content .='       	
              <button class="btn btn-app" onclick="'.$File['action'].'">
                <i class="'.$File['file_icon'].'"></i>
                '.$File['name'].'
              </button>';
            }
				$content = array(
					'navigation_content' => $navigation_content,
					'window_content' => $window_content
				);
				echo json_encode($content);
				//echo print_r($Directory['sub_path'][0]);
		}else{
		}
	}

}

/* End of file Files.php */
/* Location: ./application/controllers/CPanel/Files.php */