<?php
	include("../controladores/config.php");
	include("../controladores/clase_mysql.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db,$host,$user_db,$pass_db);
	extract($_GET);
	
	$miconexion->consulta("delete from usuarios where id=$id_user");
	echo "<script>location.href='../index.php'</script>";

?>