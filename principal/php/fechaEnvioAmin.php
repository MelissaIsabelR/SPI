<?php
include("../../conexion.php");
$fecha=$_POST['fecha'];
$nuevafecha = strtotime ( '+0 month' , strtotime ($fecha )) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );
$fecha2=$nuevafecha;
$conn = new mysqli($local,$user,$pass,$base);
$codigo=$_POST['codigo'];
$tabla=$_POST['tabla'];
if($tabla==1){
    $ta="investigacion";
}elseif($tabla==2){
     $ta="innovacion";
}elseif($tabla==3){
     $ta="servicios ";
}elseif($tabla==4){
     $ta="modernizacion";
}elseif($tabla==5){
     $ta="divulgacion";
}

$consulta="UPDATE $ta SET envio='".$fecha2."' WHERE codigo=".$codigo."";
if ($conn->query($consulta) === TRUE) {
echo 1;
}else{
echo 2;
}
?>