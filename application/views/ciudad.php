<div class="row mt">
    <div class="col-lg-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-sm mb" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Registrar nuevo ciudad
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Insert</h4>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="post" action="<?=base_url()?>Ciudad/insert">

                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">nombre</label>
                                <div class="col-sm-10">
                                    <input type="nombre" class="form-control" id="nombre" placeholder="nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="poblacion" class="col-sm-2 control-label">poblacion</label>
                                <div class="col-sm-10">
                                    <input type="poblacion" class="form-control" id="poblacion" placeholder="poblacion" name="poblacion" required>
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
                <th>Id</th>
                <th>Nombre ciudad</th>
                <th>Poblacion</th>
                <th>Fecha de creacion</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT * FROM ciudad");
            foreach ($query->result() as $row){
                echo "<tr>
                        <td>$row->idciudad</td>
                        <td>$row->nombre</td>
                        <td>$row->poblacion</td>
                        <td>$row->created_at</td>
                        <td>
                            <a href='".base_url()."Ciudad/delete/$row->idciudad' class='btn btn-sm btn-danger eli' ><i class='fa fa-trash'></i></a> 
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
