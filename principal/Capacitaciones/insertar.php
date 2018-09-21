<?php
	 include("../../conexion.php");
	$conn = new mysqli($local,$user,$pass,$base);
    $mensaje=utf8_decode($_POST['mensaje']);
	$nombre=utf8_decode($_POST['nombre']);
	$dir=utf8_decode($_POST['dir']);
	$lugar=utf8_decode($_POST['lugar']);
	$fechaini=utf8_decode($_POST['fechaini']);
	$fechafin=utf8_decode($_POST['fechafin']);
	$hora=utf8_decode($_POST['hora']);
	$dictador=utf8_decode($_POST['dictador']);
	$estado=utf8_decode($_POST['estado']);
	//echo $estado;
	if($_POST['estado'] == "true"){

		$estado="A";
	}else{
		$estado="I";
	}
	$consulta = "INSERT INTO capacitaciones(nombre_capac,lugar,fecha_inicio,fecha_fin,tiempo_capa,nombre_del_capa,observacion,dir, estado)

						VALUES('$nombre','$lugar','$fechaini','$fechafin','$hora','$dictador','$mensaje','$dir', '$estado')";
	
	if ($conn->query($consulta) === TRUE) {
	  echo "1";
	}else{
      echo "0";
	}
	
	/* cerrar la conexión */
	$conn->close();
?>