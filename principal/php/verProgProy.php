<?php 
include("../../conexion.php");
 $cod=$_POST['codigoPro'];
 $lin=$_POST['lineasPro'];
$conn = new mysqli($local,$user,$pass,$base);

if ($lin=="1") {
	$tabla="investigacion";
}elseif($lin=="2"){
	$tabla="innovacion";
}elseif($lin=="3"){
	$tabla="servicios ";	
}elseif($lin=="4"){
	$tabla="modernizacion";	
}elseif($lin=="5"){
	$tabla="divulgacion";
}
  $consultaP="SELECT * FROM programa INNER JOIN prog_proy ON programa.programaId=prog_proy.id_prog
INNER JOIN ".$tabla." ON prog_proy.id_proy=".$tabla.".codigo
WHERE ".$tabla.".codigo=".$cod." AND ".$tabla.".pro_linea=".$lin."";

        ////////////////////////////////////////////////tabla///////////////////////////////////////
   if($result = $conn->query($consultaP)){
   	$lista='<br><div class="container">
   			<div class="row">
   	     <ul class="collection with-header">
        <li class="collection-header"><h5>Programas</h5></li>';
      while($row = mysqli_fetch_array($result)){
      	$lista.='<li class="collection-item"><div>'.$row['nombreP'].'<a href="#!" class="secondary-content"><i class="material-icons">done</i></a></div></li>';
      }
      $lista.="</ul></div></div>";
  }
  echo $lista;
 ?>

  <!-- <ul class="collection with-header">
        <li class="collection-header"><h4>First Names</h4></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
        <li class="collection-item"><div>Alvin<a href="#!" class="secondary-content"><i class="material-icons">send</i></a></div></li>
      </ul>
             -->