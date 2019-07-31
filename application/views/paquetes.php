<div class="row mt">
    <div class="col-lg-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-sm mb" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Registrar nueva encomienda
        </button>
        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Insert</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="<?=base_url()?>Paquetes/insert">
                            <div class="form-group">
                                <label for="remitente" class="col-sm-2 control-label">remitente</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="remitente" required>
                                        <option value="">Seleccionar...</option>
                                        <?php
                                            $query=$this->db->query("SELECT * FROM cliente ORDER by nombre");
                                            foreach ($query->result() as $row){
                                                echo "<option value='$row->idcliente'>$row->nombre</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <label for="destinatario" class="col-sm-2 control-label">destinatario</label>
                                <div class="col-sm-4">
                                    <select class="form-control" name="destinatario" required>
                                        <option value="">Seleccionar...</option>
                                        <?php
                                        $query=$this->db->query("SELECT * FROM cliente ORDER by nombre");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->idcliente'>$row->nombre</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="destino" class="col-sm-1 control-label">destino</label>
                                <div class="col-sm-3">
                                    <select class="form-control" name="destino" required>
                                        <option value="">Seleccionar...</option>
                                        <?php
                                        $query=$this->db->query("SELECT * FROM ciudad ORDER by nombre");
                                        foreach ($query->result() as $row){
                                            echo "<option value='$row->idciudad'>$row->nombre</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <label for="monto" class="col-sm-1 control-label">monto</label>
                                <div class="col-sm-3">
                                    <input type="monto" class="form-control" id="monto" placeholder="monto" name="monto" required>
                                </div>
                                <label for="tipo" class="col-sm-1 control-label">tipo</label>
                                <div class="col-sm-2">
                                    <input type="radio" name="tipo" value="RECIBO" required>RECIBO <br>
                                    <input type="radio" name="tipo" value="FACTURA" required>FACTURA
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="correspondencia" class="col-sm-2 control-label">correspondencia</label>
                                <div class="col-sm-2">
                                    <input type="radio" name="correspondencia" value="CARTA" required>CARTA <br>
                                    <input type="radio" name="correspondencia" value="PAQUETE" required>PAQUETE
                                </div>
                                <label for="peso" class="col-sm-1 control-label">peso</label>
                                <div class="col-sm-2">
                                    <input type="peso" class="form-control" id="peso" placeholder="peso" name="peso" >
                                </div>
                                <label for="descripcion" class="col-sm-1 control-label">descripcion</label>
                                <div class="col-sm-4">
                                    <textarea class="form-control" name="descripcion" ></textarea>
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
                        <td>".$this->User->consulta('nombre','cliente','idcliente',$row->idrecibe)."</td>
                        <td>$row->estado</td>
                        <td>
                        <a href='".base_url()."Paquetes/imprimir/$row->idpaquete' class='btn btn-sm btn-info' ><i class='fa fa-print'></i></a>
                            <a href='".base_url()."Paquetes/delete/$row->idpaquete' class='btn btn-sm btn-danger eli' ><i class='fa fa-trash'></i></a> 
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
    }
</script>
