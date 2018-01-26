<?php
	include("../controladores/config.php");
	include("../controladores/clase_mysql.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db,$host,$user_db,$pass_db);
	$miconexion->consulta("select * from usuarios");
	//$miconexion->verconsulta_crud();
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
	<section class="menusuperior"><a href="../vistas/nuevo.php"><span class="icon-user-plus"></span> Nuevo contacto</a></section>
	<?php
	$miconexion->verconsulta_home();
?>
</main>
<footer>
	<h6>Derechos Reservados UTPL 2018</h6>
</footer>
</body>
</html>