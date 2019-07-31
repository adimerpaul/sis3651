<?php


class Usuarios extends CI_Controller{
    function index(){
        if (!isset($_SESSION['nombre'])){
            header("Location: ".base_url());
        }
        $data['title']="CONTROLAR USUARIOS";
        $this->load->view("templates/header",$data);
        $this->load->view("usuarios");
        $this->load->view("templates/footer");
    }
    function insert(){
        $ci=$_POST['ci'];
        $nombre=$_POST['nombre'];
        $apellido=$_POST['apellido'];
        $usuario=$_POST['usuario'];
        $clave= md5($_POST['clave']);
        $tipo=$_POST['tipo'];
        $this->db->query("INSERT INTO usuario SET 
ci='$ci',
nombre='$nombre',
apellido='$apellido',
usuario='$usuario',
clave='$clave',
tipo='$tipo'
");
        header("Location: ".base_url()."Clients");
    }
    function delete($id){
        $this->db->query("DELETE FROM cliente WHERE idcliente='$id'");
        header("Location: ".base_url()."Clients");
    }
}
