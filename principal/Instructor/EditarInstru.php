
<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
	
	$cedula=utf8_decode($_POST["cedula"]);
	$nombres=utf8_decode($_POST["nombres"]);
	$apellidos=utf8_decode($_POST["apellidos"]);
	$direccion=utf8_decode($_POST["direccion"]);
	$telefono=$_POST["telefono"];
	$correo=$_POST["correo"];
	
    $consulta = "UPDATE registros SET 
	nombre='$nombres', 
	apellidos='$apellidos',
	Dir='$direccion',
	tel='$telefono',
	correo='$correo'
	  WHERE cedula=$cedula";
	
	if ($conn->query($consulta) === TRUE) {
		echo 1;
	}else{
		echo 0;
	}
	
	
	/* cerrar la conexión */
	$conn->close();
?>