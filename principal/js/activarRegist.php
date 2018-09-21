<?php 
 	include("../../conexion.php");
	
	$conn = new mysqli($local,$user,$pass,$base);
	 
	 $casos=$_POST["caso"];

	 $opc=$_POST["op"];
     $docu=$_POST["doc"];

     if ($opc=="true") {
     	$estadmin="RA";
     }elseif($opc=="false"){
     	$estadmin="RI";
     }

	 if ($casos == "semill") {
	 		$consulta = "UPDATE semilleros SET estadmin='$estadmin' WHERE documento=$docu";
	 }elseif($casos == "inst"){
	 		$consulta = "UPDATE registros SET estadmin='$estadmin' WHERE cedula=$docu";

	 }		
	 
	
	if ($conn->query($consulta) === TRUE) {
		echo 1;
	}else{
		echo 0;
	}
	$conn->close();
?>