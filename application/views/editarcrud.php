<?php $this->load->view('includes/header');?>
<div class="container">
    <br>
    <br>
        <form method="post" action="<?php echo site_url('controladorcrud/update')?>/<?php echo $row->id; ?>">
        	<div class="form-group">
                <label for="example">reemplace el viejo servicio</label>
                <br>
                <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Escriba el nombre del servicio a agregar">
            </div>
            <button type="submit" class="btn btn-primary" value="save">Agregar</button>
            <a href="<?php echo site_url('controladorcrud')?>"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
        </form>      
    </div>
</body>
</html>