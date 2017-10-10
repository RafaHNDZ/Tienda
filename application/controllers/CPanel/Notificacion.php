<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notificacion extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('Notificacion_Model');
	}

	public function index(){
		
	}

	public function getNotifications(){
		$notificaciones = $this->Notificacion_Model->getNotificaciones();
		$unread = $this->Notificacion_Model->getUnreadNotifications();
		$output = '';
		if($notificaciones != null){
			$output .= '
			<li class="header">Usted tiene '.$unread.' notificaciones</li>
			<li>
			<ul class="menu">';
			foreach($notificaciones as $noti){
			$output .='	
			<li>
				<a>
				<i cass="fa fa-users text-aqua"></i>'
				.$noti->notificacion.
				'</a>
			</li>';
			}
			$output .=	
			'</ul>
			</li>
			<li class="footer">
			<a href="#">Ver todo</a>
			</li>';
		}else{
			$output = '<li><a>Sin Novedades</a></li>';
		}
		$alerta = array(
				'notificacion' => $output,
				'pendiente' => $unread
			);
		echo json_encode($alerta);
	}

}

/* End of file Notificacion.php */
/* Location: ./application/controllers/CPanel/Notificacion.php */