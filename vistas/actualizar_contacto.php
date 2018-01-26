<?php
	include("../controladores/config.php");
	include("../controladores/clase_mysql.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db,$host,$user_db,$pass_db);
	extract($_POST);
	
	$miconexion->consulta("update usuarios set nombre='$nombre', telefono='$telefono', correo='$correo', tipo='$tipo_c' where id=$id_user");
	echo "<script>location.href='../index.php'</script>";

?>