<?php
	$arrayText = json_decode($_POST['arrayProdu']);
	$CantidadProd = $_POST['Cantidad'];
	
	for ($i=1; $i <=$CantidadProd ; $i++) { 
		print_r($arrayText[$i]);
	}
 ?>