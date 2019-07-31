<?php
class Ciudad extends CI_Controller{
    function index(){
        if (!isset($_SESSION['nombre'])){
            header("Location: ".base_url());
        }
        $data['title']="CONTROLAR CIUDAD";
        $this->load->view("templates/header",$data);
        $this->load->view("ciudad");
        $this->load->view("templates/footer");
    }
    function insert(){
        $poblacion=$_POST['poblacion'];
        $nombre=$_POST['nombre'];
        $this->db->query("INSERT INTO ciudad SET poblacion='$poblacion',nombre='$nombre'");
        header("Location: ".base_url()."Ciudad");
    }
    function delete($id){
        $this->db->query("DELETE FROM ciudad WHERE idciudad='$id'");
        header("Location: ".base_url()."Ciudad");
    }
}
