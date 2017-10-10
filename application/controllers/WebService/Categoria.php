<?php
header("Access-Control-Allow-Origin: *");

defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Categoria_Model');
	}

	public function getCategorias(){
		$Categoria = $this->Categoria_Model->getCategorias();
		echo json_encode($Categoria);
	}

}

/* End of file Categoria.php */
/* Location: ./application/controllers/WebService/Categoria.php */