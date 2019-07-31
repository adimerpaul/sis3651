<div class="row mt">
    <div class="col-lg-12">

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Insert</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="<?=base_url()?>Seguimiento/update">
                            <div class="form-group">
                                <label for="Estado del paquete" class="col-sm-3 control-label">Estado del paquete</label>
                                <div class="col-sm-9">
                                    <input type="text" id="idpaquete" name="idpaquete" hidden>
                                    <select name="estado" id="estado" class="form-control">
                                        <option value="">Seleccionar..</option>
                                        <option value="RECIBIDO">RECIBIDO</option>
                                        <option value="ENVIADO">ENVIADO</option>
                                        <option value="ENTREGADO">ENTREGADO</option>
                                        <option value="DEVUELTO">DEVUELTO</option>
                                        <option value="BODEGA">BODEGA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class=" fa fa-trash"></i> Close</button>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-plus-circle"></i> Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Ciudad</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Estado</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT * FROM paquete");
            foreach ($query->result() as $row){
                echo "<tr>
                        <td>$row->fecha</td>
                        <td>".$this->User->consulta('nombre','ciudad','idciudad',$row->idciudad)."</td>
                        <td>".$this->User->consulta('nombre','cliente','idcliente',$row->idenvia)."</td>
                        <td>".$this->User->consulta('nombre','cliente','idcliente',$row->idrecibe)." Mensaje= <a href='https://wa.me/591".$this->User->consulta('celular','cliente','idcliente',$row->idrecibe)."?text=Tiene%20Una%20Encomienda%20de%20la%20empresa%20RETRASO'>".$this->User->consulta('celular','cliente','idcliente',$row->idrecibe)."</a></td>
                        <td>$row->estado</td>
                        <td>
                        
                        <a data-toggle=\"modal\" data-target=\"#myModal\" data-estado='$row->estado' data-idpaquete='$row->idpaquete'  class='btn btn-sm btn-warning' ><i class='fa fa-pencil'></i> Actualizar datos</a>
                            <a href='".base_url()."Seguimiento/imprimir/$row->idpaquete' class='btn btn-sm btn-info' ><i class='fa fa-print'></i></a>
                        </td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<script !src="">
    window.onload=function (e) {
        $('#example').DataTable();
        var eli=document.getElementsByClassName('eli');
        for (var i=0;i<eli.length;i++){
            eli[i].addEventListener('click',function (e) {
                if (!confirm("Seguro de eliminar?")){
                    e.preventDefault();
                }
            })
        }
        $('#myModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var estado = button.data('estado')
            var idpaquete = button.data('idpaquete')
            $('#estado').val(estado);
            $('#idpaquete').val(idpaquete);
        })

    }
</script>
