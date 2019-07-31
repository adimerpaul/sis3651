<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
	function login(){
	    $usuario=$_POST['usuario'];
        $clave=md5($_POST['clave']);
        $query=$this->db->query("SELECT * FROM usuario WHERE usuario='$usuario' AND clave='$clave' AND estado='ACTIVO'");
        if ($query->num_rows()==1){
            $row=$query->row();
            $_SESSION['nombre']=$row->nombre;
            $_SESSION['idusuario']=$row->idusuario;
            $_SESSION['tipo']=$row->tipo;
            header("Location: ".base_url()."Main");
        }else{
            header("Location: ".base_url());
        }
    }
    function logout(){
	    session_destroy();
        header("Location: ".base_url());
    }
}
