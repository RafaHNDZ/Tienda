<?php

header("Access-Control-Allow-Origin: *");

defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller {

public function __construct()
{
	parent::__construct();
	$this->load->model('Producto_Model');
}

	public function index(){
		echo "Acceso Restringido";
	}

	public function getProductosByCategoria(){
		$postdata = file_get_contents("php://input");
		if(isset($postdata)){
			$request = json_decode($postdata);
			$idCategoria = $request->idCategoria;
			$porpagina = $request->porPagina;
			$segmento = $request->segmento;

			$data = $this->Producto_Model->getInventarioByCategoria($porpagina,$segmento,$idCategoria);
			echo json_encode($data);
		}
	}

	public function getProducto(){
		$postdata = file_get_contents("php://input");
		if(isset($postdata)){
			$request = json_decode($postdata);
			$idProducto = $request->idProducto;

			$data = $this->Producto_Model->detalleProducto($idProducto);
			echo json_encode(array('Producto' => $data ));
		}	
	}
}

/* End of file Producto.php */
/* Location: ./application/controllers/WebService/Producto.php */