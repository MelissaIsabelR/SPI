<?php 
   $codigo=$_POST['codigoSemill'];
    $fecha2=$_POST['fechaSem'];
  include("../../conexion.php");
  $conn = new mysqli($local,$user,$pass,$base);
  $estado="";
    $nuevafecha = strtotime ( '+0 month' , strtotime ($fecha2 )) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );
    $fechaAct=date ('Y-m-j');
    $fecha=$nuevafecha;
   
   $consulta="UPDATE semilleros SET fechai2='".$fecha."', estado='A'
   WHERE semilleros.documento='$codigo'";
   
  if ($conn->query($consulta) === TRUE) {
    echo "1";
  }else{
    echo "0";
  }
  
  ?>