<div class="row mt">
    <div class="col-lg-12">
        <form class="form-horizontal" method="post" action="<?=base_url()?>Report/index">
            <div class="form-group">
                <label for="fecha1" class="col-sm-2 control-label">Fecha 1</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" value="<?=date('Y-m-d')?>" id="fecha1" name="fecha1" required>
                </div>
                <label for="fecha2" class="col-sm-2 control-label">Fecha 2</label>
                <div class="col-sm-3">
                    <input type="date" class="form-control" value="<?=date('Y-m-d')?>"  id="fecha2" name="fecha2" required>
                </div>
                <div class="col-sm-2">
                    <button type="submit" class="btn btn-sm btn-success"> <i class="fa fa-check"></i> Verificar</button>
                </div>
            </div>
        </form>
        <table id="example" class="display" style="width:100%">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Ciudad</th>
                <th>Remitente</th>
                <th>Destinatario</th>
                <th>Monto</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            if ($sw=="no"){
                $query=$this->db->query("SELECT * FROM paquete");
            }else{
                $query=$this->db->query("SELECT * FROM paquete WHERE date(fecha)>='$fecha1' AND date(fecha)<='$fecha2' ");
            }
            $s=0;
            foreach ($query->result() as $row){
                $s=$s+$row->monto;
                echo "<tr>
                        <td>$row->fecha</td>
                        <td>".$this->User->consulta('nombre','ciudad','idciudad',$row->idciudad)."</td>
                        <td>".$this->User->consulta('nombre','cliente','idcliente',$row->idenvia)."</td>
                        <td>".$this->User->consulta('nombre','cliente','idcliente',$row->idrecibe)."</td>
                        <td>$row->monto</td>
                        <td>
                        <a href='".base_url()."Paquetes/imprimir/$row->idpaquete' class='btn btn-sm btn-info' ><i class='fa fa-print'></i></a>
                             
                        </td>
                    </tr>";
            }
            ?>
            </tbody>
        </table>
        <h3>Monto Total= <?=$s?></h3>
    </div>
</div>
<script !src="">
    window.onload=function (e) {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
        } );
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
