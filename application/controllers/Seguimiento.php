<?php
require_once('tcpdf.php');
class Seguimiento extends CI_Controller{
    function index(){
        if (!isset($_SESSION['nombre'])){
            header("Location: ".base_url());
        }
        $data['title']="SEGUIMIENTO";
        $this->load->view("templates/header",$data);
        $this->load->view("seguimiento");
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
    function update(){
        $estado=$_POST['estado'];
        $idpaquete=$_POST['idpaquete'];
        $this->db->query("UPDATE paquete SET estado='$estado' WHERE idpaquete='$idpaquete'");
        header("Location: ".base_url()."Seguimiento");
    }
    function imprimir($id){
        $query=$this->db->query("SELECT * FROM paquete WHERE idpaquete='$id'");
        $row=$query->row();

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetFont('dejavusans', '', 10);
// add a page
        $pdf->AddPage();
        $html = '
<h5 style="text-align: center">FORMULARIO DE ENTREGA DE PAQUETE</h5>
<table border="0.2">
<tr>
<td><b>Fecha y hora: </b></td> <td>'.date("Y-m-d H:i:s").'</td>
</tr>
<tr>
<td><b>Remitente: </b></td> <td>'. $this->User->consulta('nombre','cliente','idcliente',$row->idenvia) .'</td>
</tr>
<tr>
<td><b>Destinatario: </b></td> <td>'. $this->User->consulta('nombre','cliente','idcliente',$row->idrecibe) .'</td>
</tr>
<tr>
<td><b>Monto: </b></td> <td>'. $row->monto .'</td>
</tr>
<tr>
<td><b>Usuario: </b></td> <td>'. $this->User->consulta('nombre','usuario','idusuario',$row->idenvia) .'</td>
</tr>
<tr>
<td><b>Correspondencia: </b></td> <td>'. $row->correspondencia .'</td>
</tr>
<tr>
<td><b>Descripcion: </b></td> <td>'. $row->descripcion .'</td>
</tr>
</table>

<br>

<br>
<div style="width: 100%;text-align: center">
FIRMA DE CONFORMIDAD
</div>';
        $pdf->writeHTML($html, true, false, true, false, '');
        $pdf->Output('example_006.pdf', 'I');
    }
}
