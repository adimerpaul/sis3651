<div class="row mt">
    <div class="col-lg-12">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-sm mb" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Registrar nuevo cliente
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
                        <form class="form-horizontal" method="post" action="<?=base_url()?>Clients/insert">
                            <div class="form-group">
                                <label for="ci" class="col-sm-2 control-label">ci</label>
                                <div class="col-sm-10">
                                    <input type="ci" class="form-control" id="ci" placeholder="ci" name="ci" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombre" class="col-sm-2 control-label">nombre</label>
                                <div class="col-sm-10">
                                    <input type="nombre" class="form-control" id="nombre" placeholder="nombre" name="nombre" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="celular" class="col-sm-2 control-label">celular</label>
                                <div class="col-sm-10">
                                    <input type="celular" class="form-control" id="celular" placeholder="celular" name="celular" required>
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
                <th>Cinit</th>
                <th>Nombre razon</th>
                <th>Celular</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query=$this->db->query("SELECT * FROM cliente");
            foreach ($query->result() as $row){
                echo "<tr>
                        <td>$row->idcliente</td>
                        <td>$row->cinit</td>
                        <td>$row->nombre</td>
                        <td>$row->celular</td>
                        <td>
                            <a href='".base_url()."Clients/delete/$row->idcliente' class='btn btn-sm btn-danger eli' ><i class='fa fa-trash'></i></a> 
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
