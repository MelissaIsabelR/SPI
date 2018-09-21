<?php
 	include("../../conexion.php");
	/*$conn = new mysqli("localhost","root","","proyectos");*/
	$conn = new mysqli($local,$user,$pass,$base);
	 $codi_Instru=$_POST['codi_Instru'];
	 $sw=0;
   
       $consulta2="DELETE FROM registros WHERE cedula=".$codi_Instru."";
     	
     	if ($conn->query($consulta2) === TRUE) {
			echo 1;
		}else{
			echo 0;
		}

	   
     $conn->close();
?>