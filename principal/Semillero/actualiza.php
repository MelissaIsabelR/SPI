
<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
	
	$nombres=utf8_decode($_POST["nombre"]);
	$identificacion=utf8_decode($_POST["identificacion"]);
	$apellido=utf8_decode($_POST["apellido"]);
	$correo=utf8_decode($_POST["corre"]);
	$telefono=$_POST["telefono"];
	$fechana=$_POST["fechana"];
	$instec=utf8_decode($_POST["instec"]);
	$corrins=utf8_decode($_POST["corrins"]);
	
	$consulta = "UPDATE semilleros SET 
	nombre='$nombres', 
	apellido='$apellido',
	correo='$correo',
	telefono='$telefono',
	fechana='$fechana', 
	instec='$instec', 
	corrins='$corrins'
	  WHERE documento=$identificacion";
	
	if ($conn->query($consulta) === TRUE) {
		echo 1;
	}else{
		echo 0;
	}
	
	
	/* cerrar la conexión */
	$conn->close();
?>