<?php $this->load->view('includes/header');?>  
    <div class="container">  <!-- editor colegio -->
    <br>
    <br>  <!-- Modal -->
        <form method="post" action="<?php echo site_url('CrudController/update')?>/<?php echo $row->id; ?>">
            <!--Input oculto para llamar a la URL de editar -->
            <input type="hidden"name="idcolegio" value="<?=$this->uri->segment(3);?>">
            <div class="form-group">
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" name="nombre" value="<?php echo $row->nombre; ?>" aria-describedby="emailHelp" placeholder="Enter nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">RBD</label>
                <input type="number" class="form-control" name="rbd" value="<?php echo $row->rbd; ?>" aria-describedby="emailHelp" placeholder="Enter rbd">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Fecha de Registro</label>
                <input type="date" class="form-control" name="fecha_registro" value="<?php echo $row->fecha_registro; ?>" aria-describedby="emailHelp" placeholder="Enter fecha_registro">
            </div>    
            <div class="form-group"> 
                Seleccione una Provincia: 
            <select name="selProvincia" id="selProvincia" class="form-control">
                    
                <option value="0">Selecciona una Provincia</option>
                <?php
                foreach ($provincias as $provincias) {
                ?>
                <option value="<?php echo $provincias->id; ?>"><?php echo $provincias->nombre; ?></option>
                <?php } ?>
                </select>
                <div> <br> Selecciona una Comuna: 
                <select name="selcomuna" id= "selcomuna" class="form-control">                   
                     </select> 
                   </div>
                </div> 

                <div>
                Seleccione Servicios:
                <br>              <!--Los foreach son bucles para recorres los arreglos-->          
                <?php foreach ($servicios as $servicio) { ?> <!--Se utiliza "servicio" dentro del codigo-->

                    <input type="checkbox" name="selservicios[]" value="<?=$servicio->id?>"> <?= $servicio->nombre?> <br>

                    <?php }?>
                </div>
            <center> 
            <button type="submit" class="btn btn-primary" value="save">Agregar</button>
            <a href="<?php echo site_url('CrudController')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
            </center>
        </form>  
         </div>
    </div>
  </body>
<script>

//ajax para combobox. al seleccionar primer combo de provincias, despegamos a las comunas en el segundo combo.

$("#selProvincia").change(function () {

    var provincias = $('#selProvincia').val();
        $.ajax({
            url: '<?php echo site_url()."/CrudController/getcomuna/"; ?>',
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