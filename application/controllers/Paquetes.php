<?php
require_once('tcpdf.php');
class Paquetes extends CI_Controller{
    function index(){
        if (!isset($_SESSION['nombre'])){
            header("Location: ".base_url());
        }
        $data['title']="CONTROLAR PAQUETES";
        $this->load->view("templates/header",$data);
        $this->load->view("paquetes");
        $this->load->view("templates/footer");
    }
    function insert(){
        $destinatario=$_POST['destinatario'];
        $remitente=$_POST['remitente'];
        $destino=$_POST['destino'];
        $monto=$_POST['monto'];
        $tipo=$_POST['tipo'];
        $correspondencia=$_POST['correspondencia'];
        $peso=$_POST['peso'];

        $descripcion=$_POST['descripcion'];
        $this->db->query("INSERT INTO paquete SET 
descripcion='$descripcion',
idrecibe='$destinatario',
idenvia='$remitente',
idciudad='$destino',
monto='$monto',
tipo='$tipo',
peso='$peso',
correspondencia='$correspondencia',
idusuario='".$_SESSION['idusuario']."'
 ");
        header("Location: ".base_url()."Paquetes/imprimir/".$this->db->insert_id());
    }
    function delete($id){
        $this->db->query("DELETE FROM paquete WHERE idpaquete='$id'");
        header("Location: ".base_url()."Paquetes");
    }
    function imprimir($id){
        $query=$this->db->query("SELECT * FROM paquete WHERE idpaquete='$id'");
        $row=$query->row();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetFont('dejavusans', '', 10);
// add a page
        $pdf->AddPage();
        $html = '
<h5 style="text-align: center">FORMULARIO DE REMITENTE</h5>
<h4 style="text-align: center">'.$row->tipo.'</h4>

<b>Fecha y hora: </b>'.date("Y-m-d H:i:s").' <br>
<b>Remitente: </b>'. $this->User->consulta('nombre','cliente','idcliente',$row->idenvia) .' <br>
<b>Destinatario: </b>'. $this->User->consulta('nombre','cliente','idcliente',$row->idrecibe) .' <br>
<b>Monto: </b>'. $row->monto .' <br>
<b>Usuario: </b>'. $this->User->consulta('nombre','usuario','idusuario',$row->idenvia) .' <br>
<table>
</table>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('example_006.pdf', 'I');
    }
}
