<?php $this->load->view('includes/header');?>
    <div class="contenedor">
    <br>
    <br>       
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
        Agregar Servicios       
        </button>    
        <!-- Button trigger modal -->
        <a href="crudcontroller">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Volver
    </button>
</a>
    <br>
    <br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('controladorcrud/create')?>">
                    <div class="form-group">
                        <label for="example">Agregar servicio</label>
                        <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Escriba el nombre del servicio a agregar">
                    </div>
                    <center>
                    <button type="submit" class="btn btn-primary" value="save">Ingresar</button>
                    <a href="<?php echo site_url('controladorcrud')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
                    </center>
                </form>
            </div>
            </div>
        </div>
        </div>
                <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Otras opciones</th>
                 </tr>
            </thead>
            <tbody>
                <?php foreach($result as $row) {?>
                <tr>
                <th scope="row"><?php echo $row->id; ?></th>
                <td><?php echo $row->nombre; ?></td>

                    <td> <a href="<?php echo site_url('controladorcrud/edit');?>/<?php echo $row->id;?>">Cambiar</a>  |
                   <a href="<?php echo site_url('controladorcrud/delete');?>/<?php echo $row->id;?>">Eliminar</a> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  </body>
<script>
</script>
</html>

