<?php
	 include("../../conexion.php");
	$conn = new mysqli($local, $user, $pass, $base);
	 $codigo=$_POST['cacodigo'];
	 $opcion=$_POST['caopcion'];
	 $cedula=$_POST['cacedula'];
	 if ($opcion==1) {
	 	$op="Si";
	 }elseif($opcion==2){
	 	$op="No";
	 }
	
	$consulta = "INSERT INTO asistenciapre(identificacion , capacitacion , asistencia)

						VALUES($cedula , $codigo , '$op')";
	
	if ($conn->query($consulta) === TRUE) {
	 echo "0" ;
	}else{
      echo "1";

	}

	
	//echo $asistencia;
	//echo $cedula;
	//echo $Capacitacion;
	
	/* cerrar la conexión */
	/*$conn->close();*/
?>
