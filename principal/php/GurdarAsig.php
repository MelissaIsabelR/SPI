<?php include('../../conexion.php'); ?>
<?php 
 $conexion = new mysqli($local,$user,$pass,$base);

 $_POST['CodPerso'];
 $_POST['codigoPro'];
 $_POST['opcionRol'];
 $_POST['linea'];

if ($_POST['opcionRol']==1) {
    $Rol="Aprendiz";
}elseif($_POST['opcionRol']==2){
    $Rol="Instructor";
}
if ($_POST['linea']==1) {
  $tabla="Investigacion";
}elseif ($_POST['linea']==2) {
   $tabla="Innovacion";

}elseif ($_POST['linea']==3) {
   $tabla="Servicios ";

}elseif ($_POST['linea']==4) {
   $tabla="Modernizacion";

}elseif ($_POST['linea']==5) {
   $tabla="Divulgacion";

}
$consulta="
      UPDATE $tabla 
      SET identificacion=".$_POST['CodPerso'].",
      Rol='$Rol' WHERE codigo=".$_POST['codigoPro']." and pro_linea=".$_POST['linea']."";
  
if ($conexion->query($consulta) === TRUE) { 
echo "1";

}else{
  echo "0";
}

?>