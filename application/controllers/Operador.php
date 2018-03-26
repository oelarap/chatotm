<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operador extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('url');
        $this->load->helper('email');
        $this->load->library('encryption');
    }
	/**
	 * Sesiones abiertas para la interacción del operador
	*/
	public function index()
	{
        if($this->session->has_userdata("administrador")){
            redirect('/Operador/sesiones', 'refresh');
            return;
        }
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $contrasenia = $this->input->post('password');

            $query = $this->db->get_where("usuario",array("correo"=>$this->input->post('correo')));
            if($query->num_rows()!=0){
                $usuario = $query->row();
                $contraseniaReal = $this->encryption->decrypt($usuario->password);
                if($contraseniaReal === $contrasenia){
                    $this->session->administrador = $usuario->id;
                    redirect('/Operador/sesiones/', 'refresh');
                } else{
                    $data['usuario'] = $this->input->post('correo');
                    $data['error'] = '<div class="panel panel-danger"> <div class="panel-heading"> <h3 class="panel-title">ERROR</h3> </div> <div class="panel-body"> Usuario/Contraseña incorrectas </div> </div>';
                    $this->load->view('operador/login', $data);
                    return;
                }
            }else{
                $data['usuario'] = $this->input->post('correo');
                $data['error'] = '<div class="panel panel-danger"> <div class="panel-heading"> <h3 class="panel-title">ERROR</h3> </div> <div class="panel-body"> Usuario/Contraseña incorrectas </div> </div>';
                    $this->load->view('operador/login', $data);
                    return;
            }
            $query->free_result();
        }
        else{
            $data['usuario'] = '';
            $data['error'] = '';
            $this->load->view('operador/login',$data);
        }
	}
	
	public function sesiones()
	{
        if(!$this->session->has_userdata("administrador")){
            redirect('/Operador/', 'refresh');
            return;
        }
        $query = $this->db->get_where("sesion",array("vigencia"=>1));
        $data["sesiones"] = $query->result_array();
		$this->load->view("operador/sesiones",$data);
	}
	
	public function chat()
	{
        if(!$this->session->has_userdata("administrador")){
            redirect('/Operador/', 'refresh');
            return;
        }
        $anio = $this->uri->segment(3);
        $id = $this->uri->segment(4);

        $query1 = $this->db->get_where("sesion",array("anio"=>$anio, "id"=>$id));
        $query = $this->db->get_where("chat",array("anio"=>$anio, "id"=>$id));
        $data["mensajes"] = ($query->result_array());
        $data["titulo"] = ($query1->row());
		$this->load->view("operador/chat", $data);
	}

	public function CerrarSesion()
    {
        $this->session->unset_userdata('administrador');
        redirect('/Operador/', 'refresh');
    }
}