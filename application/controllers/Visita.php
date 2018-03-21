<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visita extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->library('session');
		$this->load->database();
		$this->load->helper('url');
    }
	/**
	 * Formulario de contacto o de correo electronico
	 */
	public function index()
	{
		$this->load->helper('email');
		
		if($this->session->has_userdata("visitaId")){
			$this->chat();
			return;
		}
		$query = $this->db->get_where("usuario",array("vigencia"=>1,"conectado"=>1));
		if($query->num_rows()==0){
			if($_SERVER['REQUEST_METHOD'] === 'POST'){
				$mensaje[] = array(
					"error"                 =>  '1',
					"descripcion"           =>  'No hay usuarios disponibles'
				);
				echo json_encode($mensaje,TRUE);
				return;
			}
			else{
				$this->load->view('visita/email');
				return;
			}
		}
		$query->free_result();
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$correo = $this->input->post('correo');
			$motivo = trim($this->db->escape($this->input->post('motivo')), ' ');
			if(!valid_email($correo)){
				$mensaje[] = array(
					"error"                 =>  '2',
					"descripcion"           =>  'Debe ingresar un correo valido'
				);
				echo json_encode($mensaje,TRUE);
				return;
			}
			if($motivo === ""){
				$mensaje[] = array(
					"error"                 =>  '2',
					"descripcion"           =>  'Debe ingresar el motivo'
				);
				echo json_encode($mensaje,TRUE);
				return;
			}
			session_regenerate_id();
			$sesion = session_id();
			$sql = "INSERT INTO sesion SELECT YEAR(NOW()),(IFNULL(MAX(id),0))+1, ?, ?,NOW(),NULL,1, ? FROM `sesion` WHERE anio = YEAR(NOW());";
			$this->db->query($sql,array($correo,$motivo,$sesion));
			$query = $this->db->get_where("sesion",array("correo"=>$correo,"sessionid"=>$sesion));
			$row = $query->row();
			$this->session->visitaId = $row;
			$query->free_result();
			$mensaje[] = array(
				"error"                 =>  '0',
				"descripcion"           =>  'Comunicandole con el operador'
			);
			echo json_encode($mensaje,TRUE);
			return;
		}
		else{
			$this->load->view('visita/formulario');
		}
	}
	
	public function chat()
	{
		if(!$this->session->has_userdata("visitaId")){
			$this->index();
			return;
		}
		$this->load->view("operador/chat");
	}
	
	public function send_message(){
		if($_SERVER['REQUEST_METHOD'] != 'POST'){
			$mensaje[] = array(
				"error"                 =>  '3',
				"descripcion"           =>  'No sea tramposo...'
			);
			echo json_encode($mensaje,TRUE);
			return;
		}
		
		if($this->session->has_userdata("visitaId")){
			$mensaje[] = array(
				"error"                 =>  '1',
				"descripcion"           =>  'Ha perdido la conexión con el ejecutivo'
			);
			echo json_encode($mensaje,TRUE);
			return;
		}
		
		$mensaje = trim($this->db->escape($this->input->post('mensaje')), ' ');
		if($mensaje === ""){
			$mensaje[] = array(
				"error"                 =>  '2',
				"descripcion"           =>  'Debe indicar el mensaje'
			);
			echo json_encode($mensaje,TRUE);
			return;
		}
		
		$sql = "INSERT INTO chat VALUES(?,?,NOW(),?,1)";
		$this->db->query($sql,array(
			$this->session->visitaId->anio,
			$this->session->visitaId->id,
			$mensaje
		));
	}
	
	public function get_messages($fecha){
		if($_SERVER['REQUEST_METHOD'] != 'POST'){
			$mensaje[] = array(
				"error"                 =>  '3',
				"descripcion"           =>  'No sea tramposo...'
			);
			echo json_encode($mensaje,TRUE);
			return;
		}
		
	}
}