<?php
	extract($_GET);
	include("../controladores/config.php");
	include("../controladores/clase_mysql.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db,$host,$user_db,$pass_db);
	$miconexion->consulta("select * from usuarios where id='$id_user'");
	$lista=$miconexion->consulta_lista();

?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $site_name;?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo $site_domain;?>recursos/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site_domain;?>recursos/css/estilos.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $site_domain;?>recursos/css/style.css">
</head>
<body>
<header><h1>Directorio</h1></header>
<main>
	<h2> Nuevo contacto</h2>
	<section class="formcontacto">
		<form method="post" action="actualizar_contacto.php">
		  <div class="form-group">
		    <label for="nombre">Nombre</label>
		    <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $lista[1]?>">
		    <input type="hidden" name="id_user"  value="<?php echo $lista[0]?>">
		  </div>
		  <div class="form-group">
		    <label for="telefono">Teléfono</label>
		    <input type="text" name="telefono" class="form-control" id="telefono" value="<?php echo $lista[2]?>">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Email address</label>
		    <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $lista[3]?>">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  <div class="form-group">
		    <label for="Tipo">Tipo</label>
		     <select name="tipo_c" class="form-control">
			  <option><?php echo $lista[5]?></option>
			  <option>Trabajo</option>
			  <option>Familia</option>
			</select>
		  </div>
		 
		  <button type="submit" class="btn btn-primary">Guardar</button>
		</form>
	</section>
</main>
<footer>
	<h6>Derechos Reservados UTPL 2018</h6>
</footer>
</body>
</html>