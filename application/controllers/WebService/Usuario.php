<?php
header("Access-Control-Allow-Origin: *");
defined('BASEPATH') OR exit('No direct script access allowed');
class Usuario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Usuario_Model');
	}

	public function index(){
		echo "Acceso Denegado";
	}

	public function Login(){
		$postdata = file_get_contents("php://input");
		if(isset($postdata)){
			$request = json_decode($postdata);
			$email = $request->email;
			$pass = $request->pass;
			$this->load->library('encrypt');
			$hash = $this->encrypt->decode($pass);
			$data = array(
				'email' => $email,
				'pass' => $hash
				);
			$user = $this->Usuario_Model->login($data);
			if ($user != null) {
				echo json_encode(array('Usuario'=>$user));
			}else{
				echo json_encode(array('Error' => 'Usuario desconocido'));
			}
		}
	}
	public function LoginA(){
			$email = $_REQUEST['email'];
			$pass =$_REQUEST['pass'];
			$data = array(
				'email' => $email,
				'pass' => $pass
				);
			$res = $this->Usuario_Model->login($data);
			if ($res != null) {
				$datos = array();
				foreach ($res as $row) {
					$datos[] = $row;
				}
			}else{
				$datos = "";
			}
			//header("Content-type: application/json");
			echo json_encode($datos);
	}

	public function Registro(){
		$postdata = file_get_contents("php://input");
		if(isset($postdata)){
			$resp = "";
			$request = json_decode($postdata);
			$email = $request->email;
			if($this->comprobar_email($email)){
				if($this->Usuario_Model->emailUnico($email)){
					$nombre = $request->nombre;
					$pass = $request->pass;
					$adress = $request->address;
					$data = array(
							'nombre' => $nombre,
							'email' => $email,
							'direccion' => $adress,
							'pass' => $pass
						);
					if($this->Usuario_Model->registUser($data)){
						$resp = "Usuario registrado";
					}else{
						$resp = "Ocurrio un error al registrar";
					}
				}else{
					$resp = "Ese E-Mail ya esta registrado";
				}

			}else{
				$resp = "El E-Mail no es valido";
			}
			header("Content-type: application/json");
			echo json_encode(array('Respuesta' => $resp));
		}
	}

	public function comprobar_email($email){
	   $mail_correcto = 0;
	   //compruebo unas cosas primeras
	   if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
	      if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
	         //miro si tiene caracter .
	         if (substr_count($email,".")>= 1){
	            //obtengo la terminacion del dominio
	            $term_dom = substr(strrchr ($email, '.'),1);
	            //compruebo que la terminación del dominio sea correcta
	            if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
	               //compruebo que lo de antes del dominio sea correcto
	               $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
	               $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
	               if ($caracter_ult != "@" && $caracter_ult != "."){
	                  $mail_correcto = 1;
	               }
	            }
	         }
	      }
	   }
	   if ($mail_correcto)
	      return true;
	   else
	      return false;
	}

	public function checkData(){
		$postdata = file_get_contents("php://input");
		if(isset($postdata)){
			$request = json_decode($postdata);
			$idUser = $request->idUser;
			$data = $this->Usuario_Model->getDetails($idUser);
			echo json_encode(array('Usuario' => $data));
		}
	}
}

/* End of file Usuario.php */
/* Location: ./application/controllers/WebService/Usuario.php */
