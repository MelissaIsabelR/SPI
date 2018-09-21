<?php 
@session_start();

/*echo $linea=$_GET['l'];
echo $tabla=$_GET['t'];
echo $opcionProyeEnv=$_GET['o'];
echo $programa=$_GET['p'];*/

$_SESSION['lineaE']=$_GET['l'];
$_SESSION['tablaE']=$_GET['t'];
$_SESSION['opcionProyeEnvE']=$_GET['o'];
$_SESSION['programaE']=$_GET['p'];

include("../conexion.php");
 $conn = new mysqli($local,$user,$pass,$base);

 $consultaPP="SELECT * FROM prog_proy INNER JOIN ".$_SESSION['tablaE']." ON prog_proy.id_proy=".$_SESSION['tablaE'].".codigo INNER JOIN programa ON prog_proy.id_prog=programa.programaId WHERE id_prog=".$_SESSION['programaE']." AND linea=".$_SESSION['lineaE']." AND ".$_SESSION['tablaE'].".Rol='".$_SESSION['opcionProyeEnvE']."'";
  
$resultadoo = $conn->query($consultaPP);


  while($rows = mysqli_fetch_assoc($resultadoo) ) {
       $nProg=$rows['nombreP'];


     }

?>
<html lang="es">
<head>
  <title>Lista de Proyectos por progrmas</title>
  <html lang="es">
    <head>
    <meta charset="utf-8">

    </head>
    <style>
    *{
      margin: 0px;
    }
    .nav-wrapper{

        padding: 10px;
    }
    .brand-logo{
        text-decoration: none;  
        color:  white;
        font-size: 30px;
    }
    .container{
      margin: auto;
      width: 80%;
      /*background: red;
    */}
    table{
      margin: auto;
     /* border-radius: 12px;*/
    }
    #export_data{
      
      border-radius: 5px;
        background:green;
        width: 100%;
        height: 40px;
        color: white;
    }
      
    </style>
    
    
    
    
</head>
<body>
<nav>
    <div class="nav-wrapper" style="background: orange">
      <a class="brand-logo">SPI</a>
      <!-- <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons left">search</i>Link with Left Icon</a></li>
        <li><a href="badges.html"><i class="material-icons right">view_module</i>Link with Right Icon</a></li>
      </ul> -->
    </div>
  </nav>

<br><br>
 <?php   
$consultaP="SELECT * FROM prog_proy INNER JOIN ".$_SESSION['tablaE']." ON prog_proy.id_proy=".$_SESSION['tablaE'].".codigo INNER JOIN programa ON prog_proy.id_prog=programa.programaId WHERE id_prog=".$_SESSION['programaE']." AND linea=".$_SESSION['lineaE']." AND ".$_SESSION['tablaE'].".Rol='".$_SESSION['opcionProyeEnvE']."'";
  

$resultado1 = $conn->query($consultaP);

  while($rows1 = mysqli_fetch_assoc($resultado1) ) {
    /*if ($sw1==2) {
       $cont;*/
      
      
    /*if($sw1==3){
      
    }
    */
  $cont=0;
  $codigo1=$rows1['codigo'];

 $consultaPe="SELECT * FROM envios WHERE envios.cod_pro=".$codigo1." and linea=".$_SESSION['lineaE']."";
      $resultado21 = $conn->query($consultaPe);
        
       while($rows21 = mysqli_fetch_assoc($resultado21) ) {
          
             if ($codigo1==$rows21['cod_pro']) {
              
               $cont++;
             }
       }

       $arraRow[]=$cont;


}


//print_r($arraRow);


$tablaEXPOR="
 <div class='container'>
 <table border='1px'>

 
 <form action='' method='post'>

<tr><td colspan='6'><button style='font-weight:bold;' title='descargar en excel' type='submit' id='export_data' name='export_data' value='Export to excel' class='btn waves-effect waves-light green text-darken-2' data-position='top' data-delay='50' data-tooltip='Exportar a Excel' >Proyectos de ". $_SESSION['tablaE']." del programa ". utf8_encode($nProg)."</button></tr></td>

</form>

 <tr>
 <td style='text-align:center; padding:10px;'><b>Nombre del Proyecto</b></td>
 <td style='text-align:center; padding:10px;'><b>descripcion del proyecto</b></td>
 <td style='text-align:center; padding:10px;'><b>fecha fin del proyecto</b></td>
 <td style='text-align:center; padding:10px;'><b>nombre del Instructor</b></td>
 <td style='text-align:center; padding:10px;'><b>Autores del proyecto</b></td>
 <td style='text-align:center; padding:10px;'><b>productos del proyecto</b></td>
 </tr>
 <tbody>";
$cont2=0;
$sw=0;
$contArr=0;
$resultado = $conn->query($consultaP);

  while($rows = mysqli_fetch_assoc($resultado) ) {
    $arreglo1[$contArr]=$rows;

 $nProg=$rows['titulo_pro'];
$codigo=$rows['codigo'];
$des_meto_pro=$rows['des_meto_pro'];
$fech_fin_pro=$rows['fech_fin_pro'];
$Instructor=$rows['area_con_1'];
$pro_autores=$rows['pro_autores'];
$tablaEXPOR.="<tr><td rowspan=".$arraRow[$cont2].">".$nProg."</td>
<td rowspan=".$arraRow[$cont2].">".$des_meto_pro."</td>
<td rowspan=".$arraRow[$cont2].">".$fech_fin_pro."</td>
<td rowspan=".$arraRow[$cont2].">".$Instructor."</td>
<td rowspan=".$arraRow[$cont2].">".$pro_autores."</td>
 ";
$cont2++;
$sw=0;
$consultaPe2="SELECT * FROM envios WHERE envios.cod_pro=".$codigo." and linea=".$_SESSION['lineaE']."";
      $resultado2 = $conn->query($consultaPe2);
        
        
       while($rows2 = mysqli_fetch_assoc($resultado2) ) {
           
          
          if ($sw==0) {
            $tablaEXPOR.="<td>".$rows2['resultado']."</td></tr>";
            $sw=1;
          }else{
            $tablaEXPOR.="<tr><td>".$rows2['resultado']."</td></tr>";
          }
            $rows2["resultado"];
       }
       $contArr++;
}


$tablaEXPOR.="</tbody></table></div>";
 echo $tablaEXPOR;

?>




<?php 
//echo $filename = utf8_encode($_SESSION['tablaE'])."".utf8_encode($nProg).'.xlsx';
if(isset($_POST['export_data'])) {

if(!empty($arreglo1)) {

 $filename = utf8_encode($_SESSION['tablaE'])."".utf8_encode($nProg).'.xls';

header("Content-Type: application/vnd.ms-excel");

header("Content-Disposition: attachment; filename=".$filename);

 

$mostrar_columnas = false;

 

foreach($arreglo1 as $arreglos1) {

if(!$mostrar_columnas) {

//echo implode('\t', array_keys($libro)) . '\n';

$mostrar_columnas = true;

}

//echo implode('\t', array_values($libro)) . '\n';

}

 

}else{

echo 'No hay datos a exportar';

}

exit;

}
 ?>

  <!-- <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>

        <script type="text/javascript">

        $( document ).ready(function(){
        $(".button-collapse").sideNav();
        })
        $(document).ready(function(){
        // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
        $('.modal').modal();
        });
        $(document).ready(function(){
        $('.collapsible').collapsible();
        });

        $(document).ready(function() {
        $('select').material_select();
        });
       </script> -->
</body>               
 </html> 
