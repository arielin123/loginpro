<!DOCTYPE html>

<html>

<head></head>

<body>
<header>
<div class= "container">
<div class= "panel panel-info">
<div class= "panel-heading">
<strong> genero </strong>
</div>
	<div class="panel-body">
	<form action="muestra.php" name="bibliografia" method="POST">

	<?php
	

	$USER = "postgres";
	$password = "Ariari123";
	$dbname = "ejemplo2";
	$dbdriver = "postgre";
	$port = "5432";
	$host = "localhost";
	
	$cadenaconexion = "host=$host password=$password port=$port dbname=$dbname dbdriver=$dbdriver USER=$USER port=$port";
	
	$conexion = pg_connect($cadenaconexion) or die ("Error conexion: ".pg_last_error());
	
	$query= "select * from genero"; 
	
	$resultado = pg_query($conexion, $query) or die ("Error en la consulta sql");
	
	$numReg = pg_num_rows($resultado);
	
	if ($numReg>0){	
	?>
	<select class="form control" name "descripcion" required>
	<option selected> </option>
	
	<?php
	
	while ($fila=pg_fetch_array($resultado)){
	echo "<option value".$fila['idgenero'].">".$fila['genero']."</options>";
	}
	?>
	</select>
	<br><br>
	<?php
	}else{
		echo "No hay registros";
	}
	
	pg_close($conexion);
	
	?>

	
</body>

</html>