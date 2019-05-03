<?php $this->load->view('includes/header');?>
    <div class="contenedor"> <!-- contenedor primario visual colegio -->
    <br>
    <br>
        <a href="controladorcrud">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal2">
        Agregar Servicios       
        </button>
    </a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Agregar Establecimiento Educativo
        </button>
    <br>
    <br>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar información</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="<?php echo site_url('CrudController/create')?>">
                    <div class="form-group">
                        <label for="example">Nombre</label>
                        <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Enter nombre">
                    </div>
                    <div class="form-group">
                        <label for="example">RBD</label>
                        <input type="number" class="form-control" name="rbd" aria-describedby="emailHelp" placeholder="Enter rbd">
                    </div>
                    <div class="form-group">
                        <label for="example">Fecha de Registro</label>
                        <input type="date" class="form-control" name="fecha_registro" aria-describedby="emailHelp" placeholder="Enter fecha_registro">
                    </div>   
                    <div class="form-group">

                      Seleccione una Provincia:

                      <select name="selProvincia" id="selProvincia" class="form-control">                    
                    <option value="0">Selecciona una comuna</option>
                      <?php
                      foreach ($provincias as $provincias) {
                      ?>
                    <option value="<?php echo $provincias->id; ?>"><?php echo $provincias->nombre; ?></option>
                      <?php } ?>
                      </select>
                      <div> <br> Selecciona una Comuna: 

                       <select name="selcomuna" id= "selcomuna" class="form-control"> 
                       <option value="0">Debe seleccionar provincia para mostrar comunas</option>                  
                      </select> 
                       </div>
                    </div> 
                       <div>
                        Seleccione Servicios:
                        <br>                       
                        <?php foreach ($servicios as $servicio) { ?> <!--Se utiliza "servicio" dentro del codigo-->
                            <form name ="form1" method="post" action="">
                            <input type="checkbox"  name="selservicios[]" id="sel1" value="<?=$servicio->id?>"> <?= $servicio->nombre?> <br>

                        <?php }?>
                      </div>     
                    <center> 
                    <button type="submit" class="btn btn-primary" value="save">Ingresar</button>
                    <a href="<?php echo site_url('CrudController')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
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
                <th scope="col">RBD</th>
                <th scope="col">Fecha Registro</th>
                <th scope="col">provincias</th>
                <th scope="col">comunas</th>  
                <th scope="col">Servicios</th> 
                <th scope="col">Otras Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($colegios as $colegio) {?>
                <tr>
                <th scope="row"><?php echo $colegio->id; ?></th>
                <td><?php echo $colegio->nombre; ?></td>
                <td><?php echo $colegio->rbd; ?></td>
                <td><?php echo $colegio->fecha_registro; ?></td>
                <td><?php echo $colegio->provincia_nombre; ?></td>
                <td><?php echo $colegio->comuna_nombre; ?></td>
                <td>
                    <ul>
                <?php foreach($this->Crud_model->getServicioscFromColegio($colegio->id) as $servicios){
                    echo '<li>' .$servicios->nombre . '</li>';
                }
                ?>

                <td> <a href="<?php echo site_url('CrudController/edit');?>/<?php echo $colegio->id;?>">Cambiar</a>  | 
                   <a href="<?php echo site_url('CrudController/delete');?>/<?php echo $colegio->id;?>">Eliminar</a> </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
  </body>
<script>

//ajax para combobox. al seleccionar primer combo de provincias, despegamos a las comunas en el segundo combo.

$("#selProvincia").change(function () {

    var provincias = $('#selProvincia').val();
        $.ajax({
            url: '<?php echo site_url()."/CrudController/getcomuna"; ?>',
            type: 'POST',
            data:  { 
                provincias : provincias
            }
        }).done(function( msg ) {
            $("#selcomuna").html(msg);
        });

   });
</script>
</html>

