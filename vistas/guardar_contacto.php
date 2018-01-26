<?php
	include("../controladores/config.php");
	include("../controladores/clase_mysql.php");
	$miconexion = new clase_mysql;
	$miconexion->conectar($db,$host,$user_db,$pass_db);
	extract($_POST);
	

	$tamano = $_FILES["archivo"]['size'];
	$tipo = $_FILES["archivo"]['type'];
	echo $archivo = $_FILES["archivo"]['name'];
	$prefijo = substr(md5(uniqid(rand())),0,6);
	
	if ($archivo != "") {
		// guardamos el archivo a la carpeta files
		$destino =  "../recursos/uploads/".$prefijo."_".$archivo;
		$nombre_archivo=$prefijo."_".$archivo;
		if (copy($_FILES['archivo']['tmp_name'],$destino)) {
			$status = "Archivo subido: <b>".$archivo."</b>";
		} else {
			$status = "Error al subir el archivo";
		}
	} else {
		$status = "Error al subir archivo";
	}
	


	$miconexion->consulta("insert into usuarios values('','$nombre','$telefono','$correo','$nombre_archivo','$tipo_c')");
	echo "<script>location.href='../index.php'</script>";

?>