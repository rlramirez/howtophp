<?php
class clase_mysql{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;

	/*identificacion de error y texto de error*/
	var $Errno = 0;
	var $Error = "";

	/*identificacion de conexion y consulta*/
	var $Conexion_ID=0;
	var $Consulta_ID=0;

	/*constructor de la clase*/
	function clase_mysql($db="", $host="", $user="", $pass=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}

	/*conexion al servidor de db*/
	function conectar($db, $host, $user, $pass){
		if($db != "")$this->BaseDatos=$db;
		if($host != "")$this->Servidor=$host;
		if($user != "")$this->Usuario=$user;
		if($pass != "")$this->Clave=$pass;

		/*conectar al servidor*/
		$this->Conexion_ID=mysql_connect($this->Servidor, $this->Usuario, $this->Clave);
		if(!$this->Conexion_ID){
			$this->Error="Ha fallado la conexion";
			return 0;
		}
		/*Conexion a la base de datos*/
		if(!mysql_select_db($this->BaseDatos, $this->Conexion_ID)){
			$this->Error="Imposible abrir la base de datos";
			return 0;
		}

		return$this->Conexion_ID;
	}

	function consulta($sql=""){
		if($sql==""){
			$this->Error="NO hay ninguna sentencia sql";
			return 0;
		}

		/*Ejecutar la cunsulta*/
		$this->Consulta_ID=mysql_query($sql, $this->Conexion_ID);
		if(!$this->Consulta_ID){
			$this->Errno=mysql_errno();
		}
		return $this->Consulta_ID;
	}

	/*retorna el numero de campos de la consulta*/
	function numcampos(){
		return mysql_num_fields($this->Consulta_ID);
	}

	/*retorna de campos de la consulta*/
	function numregistros(){
		return mysql_num_rows($this->Consulta_ID);
	}

	/*nombre de los campos*/
	function nombrecampo($numcampos){
		return mysql_field_name($this->Consulta_ID, $numcampos);
	}

	function verconsulta(){
		echo "<table border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<td>".$this->nombrecampo($i)."</td>";
		}
		echo "</tr>";
		while ($row=mysql_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsulta_crud(){
		echo "<table border=1>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			echo "<td class='tabla_tdh'>".$this->nombrecampo($i)."</td>";
		}
		echo "<td>Actualizar</td>";
		echo "<td>Borrar</td>";
		echo "</tr>";
		while ($row=mysql_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				echo "<td>".$row[$i]."</td>";
			}
			echo "<td><a href='index.php?var=1&id_s=$row[0]'>Actualizar</a></td>";
			echo "<td><a href='index.php?var=2&id_s=$row[0]'>Borrar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	function verconsulta_home(){
		while ($row=mysql_fetch_array($this->Consulta_ID)) {
			echo "<section class='contacto'>";
			//for ($i=0; $i < $this->numcampos(); $i++) { 
			if ($row[4]) {
				echo "<img src='../recursos/uploads/$row[4]' title='$row[1]'>";
			}else{
				echo "<img src='../recursos/uploads/avatar.jpg' title='$row[1]'>";
			}
			echo "<h2><span class='icon-user'></span> $row[1] <h3>";
			echo "<h3><span class='icon-phone'></span> $row[2] </h3>";
			echo "<h3><span class='icon-envelop'></span> $row[3] </h3>";
			echo "<h3><span class='icon-profile'></span> $row[5] </h3>";
			echo "<a href='../vistas/borrar.php?id_user=$row[0]' class='boton btnrojo'>Borrar</a>";
			echo "<a href='../vistas/actualizar.php?id_user=$row[0]' class='boton'>Actualizar</a><br>";
			//}
			echo "</section>";
		}
	}
	function consulta_lista(){
		while ($row = mysql_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}


}
?>
