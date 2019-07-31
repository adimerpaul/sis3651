<?php


class Clients extends CI_Controller{
    function index(){
        if (!isset($_SESSION['nombre'])){
            header("Location: ".base_url());
        }
        $data['title']="CONTROLAR CLIENTES";
        $this->load->view("templates/header",$data);
        $this->load->view("clients");
        $this->load->view("templates/footer");
    }
    function insert(){
        $ci=$_POST['ci'];
        $nombre=$_POST['nombre'];
        $celular=$_POST['celular'];
        $this->db->query("INSERT INTO cliente SET cinit='$ci',nombre='$nombre',celular='$celular'");
        header("Location: ".base_url()."Clients");
    }
    function delete($id){
        $this->db->query("DELETE FROM cliente WHERE idcliente='$id'");
        header("Location: ".base_url()."Clients");
    }
}
