<?php


class Main extends CI_Controller{
function index(){
    if (!isset($_SESSION['nombre'])){
        header("Location: ".base_url());
    }
    $data['title']="SISTEMA DE ENTREGAS";
    $this->load->view("templates/header",$data);
    $this->load->view("main");
    $this->load->view("templates/footer");
}
}
