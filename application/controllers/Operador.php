<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operador extends CI_Controller {

	/**
	 * Sesiones abiertas para la interacción del operador
	*/
	public function index()
	{
		$this->load->view('operador/login');
	}
	
	public function sesiones()
	{
		$this->load->view("operador/sesiones");
	}
	
	public function chat()
	{
		$this->load->view("operador/chat");
	}
}