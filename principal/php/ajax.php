<link rel="stylesheet" type="text/css" href="../css/alertify.min.css">
<script type="text/javascript" src="../js/alertify.min.js"></script>
 <script> $(document).ready(function(){ $('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove(); }); </script>
<!-- <script src="../investigacion/js/guardarinvesti.js"></script>
 --><script type="text/javascript">
function actuAsisten(identificacion , opcion, cod_capa){
/*alert(identificacion);
alert(opcion);
alert(cod_capa);*/

 $.ajax({
 url: "php/CambAsist.php",
       data: {
             
          AcIdentifi : identificacion,
          Acopcion : opcion,
          AcCodCap : cod_capa
             },
        type: "POST",
         
       success: function(response){
         if (response==1){
            alertify.success('Asistencia Cambiada');
          }else if(response==0){
            alertify.error('Error al Cambiar la Asistencia');
          };
        }

});

}
function descargar(codigo, linea){
    //alert(linea)
 $.ajax({
 url: "php/descargarEv.php",
       data: { 
          codigoDes : codigo,   
          lineaDes : linea   
             },
        type: "POST",
         
       beforeSend: function () {
               $('#desca').html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');

      },
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              $('#desca').html(response);

      }

});

  

}



/*function guardarProdu(cant){
var arrayText = [];
  for (var i = 1; i <= cant; i++) {

    var objet=document.getElementById('obj_esp'+i).value;
    //alert(objet)
     arrayText[i] = objet
     

  }

     $.ajax({
 	url: "php/GuarProd.php",
       data: { 
          Cantidad : cant,
          arrayProdu: JSON.stringify(arrayText)
          
             },
        type: "POST",
         
    
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            //  $('#desca').html(response);
            alert(response)

      }

});

}*/

function Fcampos(id, check, valor, usuario){
  var rol=document.getElementById('opcionProye').value;
  var lin=document.getElementById('lineas').value;
       $.ajax({
       url: "php/CambForm.php",
       data: { 
          idF : id,
          rolF : rol,
          linF : lin, 
          checkF : check, 
          valorF : valor
            },
        type: "POST",
         
      
      success:  function (response) { 
      /*  alert(response)
        $('#resp').html(response)*/
        if (response==1) {
        alertify.success('Datos Actualizados');                       
        }else if(response==0){
          alertify.error('Error al actualizar Datos');
        }

      }

    });
  }

</script>
<script type="text/javascript">
  function VerProg(codigo, lineas){
     $.ajax({
       url: "php/verProgProy.php",
       data: { 
          codigoPro : codigo,
          lineasPro : lineas 
            },
        type: "POST",
         
      
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
              $('#modalVerProg').html(response);

      }

    });
  }

</script>
<?php include("../../conexion.php"); ?>

<?php 
 if ($_POST['accion']=="verproy") {
   $_POST["opcionProye"];
   if ($_POST['tabla']=="investigacion") {
    $lineas="1";
   }elseif($_POST['tabla']=="innovacion"){
    $lineas="2";
   }elseif($_POST['tabla']=="servicios"){
    $lineas="3";
   }elseif($_POST['tabla']=="modernizacion"){
    $lineas="4";
   }elseif($_POST['tabla']=="divulgacion"){
    $lineas="5";
   }
    $sw=0;
    $oplista=$_POST['oplista'];
    if ($oplista==1) {
        //////////////lista de proyectos////////////////////////

       $consulta="SELECT ".$_POST['tabla'].".titulo_pro, ".$_POST['tabla'].".codigo, ".$_POST['tabla'].".Rol, grupo.nombre_grupo,programa.nombreP, region.nombre_region,
         centro.nombre_centro, ".$_POST['tabla'].".area_con_1, ".$_POST['tabla'].".fech_fin_pro,
        ".$_POST['tabla'].".fech_ini_pro, ".$_POST['tabla'].".estado
         FROM ".$_POST['tabla']." 
        INNER JOIN grupo ON ".$_POST['tabla'].".nom_gru_inv=grupo.id
        INNER JOIN region ON ".$_POST['tabla'].".pro_region=region.id_region
        INNER JOIN centro ON ".$_POST['tabla'].".pro_centro=centro.codigo
        INNER JOIN prog_proy ON ".$_POST['tabla'].".codigo=prog_proy.id_proy 
          INNER JOIN programa ON prog_proy.id_prog=prog_proy.id_prog
        WHERE  ".$_POST['tabla'].".Rol='".$_POST["opcionProye"]."' AND ".$_POST['tabla'].".estado!='Reprobado' and ".$_POST['tabla'].".estado!='Proceso' AND ".$_POST['tabla'].".pro_linea='".$lineas."'
          GROUP BY ".$_POST['tabla'].".codigo";

    }elseif($oplista==4){
        //////////////////////////////banco de proyectos/////////////////////
      
      $consulta="SELECT ".$_POST['tabla'].".titulo_pro, ".$_POST['tabla'].".codigo, ".$_POST['tabla'].".Rol, grupo.nombre_grupo,  programa.nombreP, region.nombre_region,
         centro.nombre_centro, ".$_POST['tabla'].".area_con_1, ".$_POST['tabla'].".fech_fin_pro,
        ".$_POST['tabla'].".fech_ini_pro, ".$_POST['tabla'].".estado
         FROM ".$_POST['tabla']." 
        INNER JOIN grupo ON ".$_POST['tabla'].".nom_gru_inv=grupo.id
        INNER JOIN region ON ".$_POST['tabla'].".pro_region=region.id_region
        INNER JOIN centro ON ".$_POST['tabla'].".pro_centro=centro.codigo
        INNER JOIN prog_proy ON ".$_POST['tabla'].".codigo=prog_proy.id_proy 
          INNER JOIN programa ON prog_proy.id_prog=prog_proy.id_prog
        where ".$_POST['tabla'].".Rol='".$_POST["opcionProye"]."'  and estado='proceso' AND estadoReg='2'  AND ".$_POST['tabla'].".pro_linea='".$lineas."'
          GROUP BY ".$_POST['tabla'].".codigo";

       /* SELECT investigacion.titulo_pro, programa.nombreP, investigacion.pro_linea, investigacion.codigo, investigacion.Rol, grupo.nombre_grupo, region.nombre_region, centro.nombre_centro, investigacion.area_con_1, investigacion.fech_fin_pro, investigacion.fech_ini_pro, investigacion.estado 
          proyectos FROM investigacion 
          INNER JOIN grupo ON investigacion.nom_gru_inv=grupo.id 
          INNER JOIN region ON investigacion.pro_region=region.id_region 
          INNER JOIN centro ON investigacion.pro_centro=centro.codigo 
          INNER JOIN prog_proy ON investigacion.codigo=prog_proy.id_proy 
          INNER JOIN programa ON prog_proy.id_prog=prog_proy.id_prog
          WHERE investigacion.Rol='Aprendiz' AND estado='proceso' AND investigacion.pro_linea=1
          GROUP BY investigacion.codigo*/



    }elseif($oplista==2){
        //////////////////////////////banco de proyectos/////////////////////

       /*AND ".$_GET['t'].".estadoReg='2'*/
         $consulta="SELECT ".$_POST['tabla'].".titulo_pro, ".$_POST['tabla'].".codigo, ".$_POST['tabla'].".Rol, grupo.nombre_grupo, programa.nombreP, region.nombre_region,
         centro.nombre_centro, ".$_POST['tabla'].".area_con_1, ".$_POST['tabla'].".fech_fin_pro,
        ".$_POST['tabla'].".fech_ini_pro, ".$_POST['tabla'].".estado
         FROM ".$_POST['tabla']." 
        INNER JOIN grupo ON ".$_POST['tabla'].".nom_gru_inv=grupo.id
        INNER JOIN region ON ".$_POST['tabla'].".pro_region=region.id_region
        INNER JOIN centro ON ".$_POST['tabla'].".pro_centro=centro.codigo
         INNER JOIN prog_proy ON ".$_POST['tabla'].".codigo=prog_proy.id_proy 
          INNER JOIN programa ON prog_proy.id_prog=prog_proy.id_prog
        where ".$_POST['tabla'].".Rol='".$_POST["opcionProye"]."' and estado='Reprobado' AND ".$_POST['tabla'].".pro_linea='".$lineas."'
          GROUP BY ".$_POST['tabla'].".codigo"; 

    }elseif($oplista==3){
        ///////////// descargar evidencias /////////////////////////
      if($_POST["opcionProye"]=="Aprendiz"){

        $consulta="SELECT * FROM envios INNER JOIN ".$_POST['tabla']." ON ".$_POST['tabla'].".codigo=envios.cod_pro 
        INNER JOIN semilleros ON envios.identificacion=semilleros.documento
        GROUP BY envios.cod_pro";

      }elseif($_POST["opcionProye"]=="Instructor"){
        
          $consulta="SELECT * FROM envios INNER JOIN ".$_POST['tabla']." ON ".$_POST['tabla'].".codigo=envios.cod_pro 
          INNER JOIN registros ON envios.identificacion=registros.cedula
          GROUP BY envios.cod_pro";

      }

       /*  echo $consulta="SELECT * FROM envios INNER JOIN ".$_POST['tabla']." ON ".$_POST['tabla'].".codigo=envios.cod_pro  GROUP BY envios.cod_pro";*/

        $sw=1;
    }elseif($oplista==5){
        ///////////// descargar evidencias /////////////////////////
        
      if ($_POST["opcionProye"]=="Aprendiz") {
        include('FormatoApr.php');

      }elseif($_POST["opcionProye"]=="Instructor"){

        include('FormatoIns.php');

      }
    
        $sw=2;
    }
    
    
  $conn = new mysqli($local,$user,$pass,$base);
  if ($sw==0){
    if($result = $conn->query($consulta)){
     $tabla1='<center><strong><b><u>proyectos '.$_POST["tabla"].'</u></b></strong></center>';
     $tabla1.='<body>';
     $tabla1.='<table id="example1" class="display" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Titulo</th>
                <th>Centro</th>
                <th>programa</th>
                <th>Ver programas</th>
                <th>fecha de inicio</th>
                <th>fecha de fin</th>
                <th>Usuario</th>
                <th>estado</th>
                <th>Acciones</th>
        
            </tr>
    </thead>
    <tbody>';
      while($row = mysqli_fetch_array($result)){
         $tabla1.='<tr>
         <td>'.utf8_encode($row['titulo_pro']).'</td>
         <td>'.utf8_encode($row['nombre_centro']).'</td>
         <td>'.utf8_encode($row['nombreP']).' </td> 
         <td><a href="#modalVerProg"  onclick="VerProg('.$row["codigo"].','.$lineas.')" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver programas "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Tiny material-icons">assignment</i></font></font></a></td>  
         <td>'.$row['fech_ini_pro'].'</td>   
         <td>'.$row['fech_fin_pro'].'</td>   
         <td>'.$row['Rol'].'</td>   
         <td>'.utf8_encode($row['estado']).'</td>
         <td><a href="Vproyecto.php?c='.$row['codigo'].' & t='.$_POST['tabla'].' & r='.$_POST['opcionProye'].'" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver Proyecto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">remove_red_eye</i></font></font></a></td></tr>';
             

      }
   
   $tabla1.='</tbody>';

     $tabla1.='</table>';
      
    }
  }elseif($sw==1){
 if($result = $conn->query($consulta)){
      if ($_POST['tabla']=="investigacion") {
         $linea=1;
      }elseif($_POST['tabla']=="innovacion"){
         $linea=2;
      }elseif($_POST['tabla']=="servicios"){
         $linea=3;
      }elseif($_POST['tabla']=="modernizacion"){
         $linea=4;
      }elseif($_POST['tabla']=="divulgacion"){
         $linea=5;
      }

      $tabla1='<div class="container"><div class="row"><div class="input-field col s12">
      <select OnChange="descargar(this.value, '.$linea.')">';
      $tabla1.='<option value="" disabled selected>Seleccione:</option>';
                
                     while($row = mysqli_fetch_array($result)){ 
                    
                         $tabla1.='<OPTION VALUE="'.$row['cod_pro'].'">'.utf8_encode($row['titulo_pro']).'</OPTION>'; 
                     }
      $tabla1.='</select>
      <label>Seleccione Proyecto</label>
      </div></div></div>';
      
    }else{
       $tabla1=''; 
    }
      $tabla1.='<script type="text/javascript">
                $(document).ready(function() {
                $("select").material_select();
                });
             </script>';
}
  if ($sw!=2) {
    $tabla1.='<script src="Data/datatables.min.js"></script>  
<script src="Data/personaliza.js"></script>  

<link rel="stylesheet" type="text/css" href="Data/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Data/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="Data/estilo.css">



<script type="text/javascript">
$(document).ready(function() {
    $("#example1").DataTable();
} );
</script>';
}
if ($sw!=2) {
  echo $tabla1;

}
  
 }elseif($_POST['accion']=="listadoasistencia"){
    $codcapa=$_POST['capacita'];
     $oplista=$_POST['oplista'];
    if ($oplista==1) {
        $opcion="Si";
    }elseif($oplista==2){
         $opcion="No";
    }

   $consulta ="SELECT semilleros.nombre, semilleros.apellido, capacitaciones.nombre_capac, asistenciapre.asistencia, asistenciapre.identificacion, asistenciapre.capacitacion
FROM semilleros INNER JOIN asistenciapre ON semilleros.documento=asistenciapre.identificacion
INNER JOIN capacitaciones ON asistenciapre.capacitacion=capacitaciones.codigo WHERE asistenciapre.asistencia='$opcion' AND capacitaciones.codigo=$codcapa";

  $conn = new mysqli($local,$user,$pass,$base);
  if($result = $conn->query($consulta)){
     $tabla2='';
     $tabla2.='<body>';
     $tabla2.='<table id="example2" class="display" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nombre de la Capacitacion</th>
                <th>asistencia</th>
                <th>Asististio?</th>
            </tr>
    </thead>
    <tbody>';
    $i=0;
    $j=0;
      while($row = mysqli_fetch_array($result)){
         $tabla2.='<tr>
         <td>'.utf8_encode($row['nombre']).'</td>
         <td>'.utf8_encode($row['apellido']).'</td>
         <td>'.utf8_encode($row['nombre_capac']).'</td>
         <td>'.utf8_encode($row['asistencia']).'</td>   
         <td>
         <p>

        <input name="group'.$i.'" type="radio" id="test'.$i.'" value="'.$row['identificacion'].'" onclick="actuAsisten(this.value, 1 , '.$codcapa.')"/>
        <label for="test'.$i.'">Si</label>
     
        <input name="group'.$i.'" type="radio" id="test'.$i.$j.'" value="'.$row['identificacion'].'"  onclick="actuAsisten(this.value , 2, '.$codcapa.')"/>
        <label for="test'.$i.$j.'">No</label>
                          
         </p>
        </td>
         </tr>

         ';
         $i++;
         $j++;

      }
   
   $tabla2.='</tbody>';

     $tabla2.='</table>';
      
    }
   $tabla2.='<script src="Data/datatables.min.js"></script>  
<script src="Data/personaliza.js"></script>  

<script type="text/javascript">
$(document).ready(function() {
    $("#example2").DataTable();
} );
</script>

<link rel="stylesheet" type="text/css" href="Data/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Data/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="Data/estilo.css">



';
  echo $tabla2;
 }elseif($_POST['accion']=="product"){
  $obj="";
  $res="";
  $pro="";
  $but="";
  $tablaProd="<table>
  <thead>
  <th>Objetivos</th>
  <th>Resultados</th>
  <th>Productos</th>
  </thead>
  <tbody>";

  for ($i=1; $i <= $_POST["objet"] ; $i++) {
    $tablaProd.="<tr>";
    $tablaProd.="<td><div class='input-field col s12'>
    <textarea  class='materialize-textarea' id='obj_esp".$i."'></textarea><label for='textarea1'>objetivo".$i.":</label>
    </div>
    </td>";

    $tablaProd.="<td><div class='input-field col s12'>
    <textarea  class='materialize-textarea' id='result".$i."'></textarea><label for='textarea1'>Resultado".$i.":</label>
    </div></td>";

    $tablaProd.="<td><div class='input-field col s12'>
    <textarea  class='materialize-textarea' id='produt".$i."'></textarea><label for='textarea1'>Producto".$i.":</label>
    </div></td>";

    $tablaProd.="</tr>";
    /*$obj.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" id="obj_esp'.$i.'">
    </textarea><label for="textarea1">objetivo.'.$i.'</label>
    </div>';

     $res.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" id="result'.$i.'">
    </textarea><label for="textarea1">Resultado.'.$i.'</label>
    </div>';

     $pro.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" id="produt'.$i.'">
    </textarea><label for="textarea1">Producto.'.$i.'</label>
    </div>';*/

    
  }
  $tablaProd.="</tbody></table>";
  echo $tablaProd;
$but.="<div id='EnPr' ><center> <button id='Guardado' onclick='crear(".$_POST["objet"].",1)' class='btn waves-effect waves-light green text-darken-2'>Guardar</button> ";

$but.=" <button id='agregar' style='margin-left:10px;' onclick='crear(".$_POST["objet"].",2)' class='btn waves-effect waves-light green text-darken-2'>Enviar</button></center></div>";

  echo $obj;
  echo $res;
  echo $pro;
  echo $but;
 }elseif($_POST['accion']=="productEditar"){
  $cant=$_POST['cantidad'];
  $Ini=$_POST['Inicio'];
  $Cont=0;
  $tablaProd="<table>
  
  <tbody>";

  for ($i=$Ini; $i <= $cant ; $i++) {
    $Cont++;
    $tablaProd.="<tr>";

    $tablaProd.="<td><div class='input-field col s12'>
    <textarea  class='materialize-textarea' id='obj_esp".$i."'>
    </textarea><label id='caja2' for='textarea1'>Objetivo.".$i."</label>
    </div>
    </td>";

    $tablaProd.="<td><div class='input-field col s12'>
    <textarea  class='materialize-textarea' id='result".$i."'>
    </textarea><label id='caja2' for='textarea1'>Resultado.".$i."</label>
    </div></td>";

    $tablaProd.="<td><div class='input-field col s12'>
    <textarea  class='materialize-textarea' id='produt".$i."'>
    </textarea><label id='caja2' for='textarea1'>Producto.".$i."</label>
    </div></td>";


    $tablaProd.="</tr>";
    /*$obj.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" id="obj_esp'.$i.'">
    </textarea><label for="textarea1">objetivo.'.$i.'</label>
    </div>';

     $res.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" id="result'.$i.'">
    </textarea><label for="textarea1">Resultado.'.$i.'</label>
    </div>';

     $pro.='<div class="input-field col s12">
    <textarea  class="materialize-textarea" id="produt'.$i.'">
    </textarea><label for="textarea1">Producto.'.$i.'</label>
    </div>';*/

    
  }
       $tablaProd.="<input type='hidden' id='CantObj' value='".$Cont."'>";


  $tablaProd.="</tbody></table>";
  echo $tablaProd;
 }elseif($_POST['accion']=="productElim"){
  $tablaProd= "";
  echo $tablaProd;

 }elseif($_POST['accion']=="verProyProg"){

   $conn = new mysqli($local,$user,$pass,$base);
   $linea=$_POST['linea'];
   $programa=$_POST['programa'];
   $opcionProyeEnv=$_POST['opcionProyeEnv'];

  if ($linea==1) {
    $tabla="investigacion";
  }elseif ($linea==2) {
    $tabla="innovacion";
  }elseif ($linea==3) {
   $tabla="servicios";
  }elseif ($linea==4) {
    $tabla="modernizacion";
  }elseif ($linea==5) {
    $tabla="divulgacion";
  }

   $consultaP="SELECT * FROM prog_proy INNER JOIN ".$tabla." ON prog_proy.id_proy=".$tabla.".codigo INNER JOIN programa ON prog_proy.id_prog=programa.programaId WHERE id_prog=".$programa." AND linea=".$linea." AND ".$tabla.".Rol='".$opcionProyeEnv."'";

        ////////////////////////////////////////////////tabla///////////////////////////////////////
   $sw=0;


   if($result = $conn->query($consultaP)){

  $tablaProg='<table id="example3" class="display" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Titulo</th>
                <th>Descripcion del proyecto</th>
                <th>Fecha fin del proyecto</th>
                <th colspan="2">Acciones</th>
                
            </tr>
    </thead>
    <tbody>';
      while($row = mysqli_fetch_array($result)){
        $sw=1;
         $codigo=$row['codigo'];
         $tablaProg.='<tr>
         <td>'.utf8_encode($row['titulo_pro']).'</td>  
         <td>'.utf8_encode($row['des_meto_pro']).'</td>  
         <td>'.utf8_encode($row['fech_fin_pro']).'</td>';  

$tablaProg.='<td>
       <ul class="collapsible popout " data-collapsible="accordion">
        <li>
        <div class="collapsible-header ">
        <i class="material-icons">textsms</i>
        <span>Ver Resultados</span>

        </div>
        <div class="collapsible-body"><span></span>';

      $consultaPe="SELECT * FROM envios WHERE envios.cod_pro=".$codigo." and linea=".$linea."";
   if($resultPe = $conn->query($consultaPe)){
      while($rowPe = mysqli_fetch_array($resultPe)){
        $tablaProg.='<div class="row">
        '.$rowPe["resultado"].'</div>';
      }
    }
         $tablaProg.='</form>
         
        
        <div class="modal-footer">

        </div>
        </div>                                          
        </li>
        </ul>
       </td>';
       
   
        /* $tablaProg.='<td><a href="Vproyecto.php?c='.$row['codigo'].'" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver Proyecto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">remove_red_eye</i></font></font></a></td>*/

         $tablaProg.='</tr>

         ';
        
      }
    }else{
      echo "no se encontraron proyectos con este programa";
    }
   
    $tablaProg.='</tbody>';
     $tablaProg.='</table>';
      
          if ($sw!=0) {
          echo '<br><a href="exportar_Tabla.php?l='.$linea.' & t='.$tabla.' & p='.$programa.' & o='.$opcionProyeEnv.'" target="_blank" class="btn tooltipped orange text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver para descargar "><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">open_in_new</i></font></font></a>';
         }

ECHO $tablaProg;

}elseif($_POST['accion']=="verProAprins"){
 $conn = new mysqli($local,$user,$pass,$base);
 $oplista=$_POST['oplista'];
    if ($oplista==1) {
        ////////////////lista de proyectos////////////
        echo "<br><h6 style='text-align:center;'>Lista de proyectos ".$_POST['tabla3']."</h6>";
         $consulta="SELECT ".$_POST['tabla3'].".titulo_pro, ".$_POST['tabla3'].".codigo, grupo.nombre_grupo AS nom_grupo, region.nombre_region AS nom_region,
         centro.nombre_centro  AS nom_centr , ".$_POST['tabla3'].".area_con_1, ".$_POST['tabla3'].".fech_fin_pro,
        ".$_POST['tabla3'].".fech_ini_pro, ".$_POST['tabla3'].".estado
         FROM ".$_POST['tabla3']." INNER JOIN grupo ON ".$_POST['tabla3'].".nom_gru_inv=grupo.id
        INNER JOIN region ON ".$_POST['tabla3'].".pro_region=region.id_region
        INNER JOIN centro ON ".$_POST['tabla3'].".pro_centro=centro.codigo
        where identificacion=".$_POST['usuario3']." and ".$_POST['tabla3'].".estado!='Proceso'";

        ////////////////////////////////////////////////tabla///////////////////////////////////////
          if($result = $conn->query($consulta)){
     $tabla3='';
     $tabla3.='<body>';
     $tabla3.='<table id="example3" class="display" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Titulo</th>
                <th>estado</th>
                <th>Ver proyecto</th>
        
            </tr>
    </thead>
    <tbody>';
      while($row = mysqli_fetch_array($result)){
         $row['codigo'];
         $tabla3.='<tr>
         <td>'.utf8_encode($row['titulo_pro']).'</td>  
         <td>'.utf8_encode($row['estado']).'</td>
         <td><a href="Vproyecto.php?c='.$row['codigo'].' & t='.$_POST['tabla3'].'" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver Proyecto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">remove_red_eye</i></font></font></a></td></tr>';
        
      }
   
    $tabla3.='</tbody>';
     $tabla3.='</table>';
      
    }else{
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    }elseif($oplista==2){
        ///////////////enviar evidencias/////////////////

    echo "<br><h5 style='text-align:center;'>lista de de evidencias ".$_POST['tabla3']."</H5>";

    $consulta="SELECT ".$_POST['tabla3'].".titulo_pro, ".$_POST['tabla3'].".codigo, grupo.nombre_grupo AS nom_grupo, region.nombre_region AS nom_region,
    centro.nombre_centro  AS nom_centr , ".$_POST['tabla3'].".area_con_1, ".$_POST['tabla3'].".fech_fin_pro,
    ".$_POST['tabla3'].".fech_ini_pro, ".$_POST['tabla3'].".estado, ".$_POST['tabla3'].".envio ,".$_POST['tabla3'].".pro_linea
    FROM ".$_POST['tabla3']." INNER JOIN grupo ON ".$_POST['tabla3'].".nom_gru_inv=grupo.id
    INNER JOIN region ON ".$_POST['tabla3'].".pro_region=region.id_region
    INNER JOIN centro ON ".$_POST['tabla3'].".pro_centro=centro.codigo
    where identificacion=".$_POST['usuario3']." AND ".$_POST['tabla3'].".estado='Aprobado' ";

        /////////////////////tabla/////////////////////////////

     if($result = $conn->query($consulta)){
     $tabla3='';
     $tabla3.='<body>';
     $tabla3.='<table id="example3" class="display" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Titulo</th>
                <th>estado</th>
                <th>Fecha a Enviar</th>
                <th>Enviar evidencias</th>
        
            </tr>
    </thead>
    <tbody>';
      while($row = mysqli_fetch_array($result)){
        $proximoEnvi=$row['envio'];
        $consultaEnv = "SELECT * FROM envios WHERE cod_pro=".$row['codigo']."";
        if($resultEnv = $conn->query($consultaEnv)){
          if($row21 = mysqli_fetch_array($resultEnv)){
             $proximoEnvi=$row21['fechaenviar'];
             while ($row21 = mysqli_fetch_array($resultEnv)) {
               $proximoEnvi=$row21['fechaenviar'];
             }
          }else{

          }
        }

         $row['codigo'];
         $row['pro_linea'];
         $tabla3.='<tr>
         <td>'.utf8_encode($row['titulo_pro']).'</td>  
         <td>'.utf8_encode($row['estado']).'</td>
         <td>'.$proximoEnvi.'</td>  
         <td><a href="EnviarEvidencias.php?c='.$row['codigo'].' & t='.$_POST['tabla3'].'  & l='.$row['pro_linea'].'" "target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Enviar Evidencias"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">send</i></font></font></a></td></tr>';
        

      }
   
    $tabla3.='</tbody>';
     $tabla3.='</table>';
      
    }else{
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    }elseif($oplista==3){
        ///////////////proyectos guardados/////////////////

    echo "<br><h5 style='text-align:center;'>proyectos guardados ".$_POST['tabla3']."</H5>";

     $consulta="SELECT ".$_POST['tabla3'].".titulo_pro, ".$_POST['tabla3'].".codigo, grupo.nombre_grupo AS nom_grupo, region.nombre_region AS nom_region,
    centro.nombre_centro  AS nom_centr , ".$_POST['tabla3'].".area_con_1, ".$_POST['tabla3'].".fech_fin_pro,
    ".$_POST['tabla3'].".fech_ini_pro, ".$_POST['tabla3'].".estado, ".$_POST['tabla3'].".envio ,".$_POST['tabla3'].".pro_linea
    FROM ".$_POST['tabla3']." INNER JOIN grupo ON ".$_POST['tabla3'].".nom_gru_inv=grupo.id
    INNER JOIN region ON ".$_POST['tabla3'].".pro_region=region.id_region
    INNER JOIN centro ON ".$_POST['tabla3'].".pro_centro=centro.codigo
    where identificacion=".$_POST['usuario3']." AND ".$_POST['tabla3'].".estadoReg='1' ";

        /////////////////////tabla/////////////////////////////

     if($result = $conn->query($consulta)){
     $tabla3='';
     $tabla3.='<body>';
     $tabla3.='<table id="example3" class="display" cellspacing="0" width="100%">
     <thead>
            <tr>
                <th>Titulo</th>
                <th>estado</th>
                <th>Fecha a Enviar</th>
                <th>Enviar evidencias</th>
        
            </tr>
    </thead>
    <tbody>';
      while($row = mysqli_fetch_array($result)){
        $proximoEnvi=$row['envio'];
        $consultaEnv = "SELECT * FROM envios WHERE cod_pro=".$row['codigo']."";
        if($resultEnv = $conn->query($consultaEnv)){
          if($row21 = mysqli_fetch_array($resultEnv)){
             $proximoEnvi=$row21['fechaenviar'];
             while ($row21 = mysqli_fetch_array($resultEnv)) {
               $proximoEnvi=$row21['fechaenviar'];
             }
          }else{

          }
        }

         $row['codigo'];
         $row['pro_linea'];
         $tabla3.='<tr>
         <td>'.utf8_encode($row['titulo_pro']).'</td>  
         <td>'.utf8_encode($row['estado']).'</td>
         <td>'.$proximoEnvi.'</td>  
         <td><a href="EditarProyecto.php?c='.$row['codigo'].' & t='.$_POST['tabla3'].'" target="_blank" class="btn tooltipped green text-darken-2" data-position="top" data-delay="50" data-tooltip="Ver Proyecto"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="Small material-icons">remove_red_eye</i></font></font></a></td></tr>';
        

      }
   
    $tabla3.='</tbody>';
     $tabla3.='</table>';
      
    }else{
    }
    ///////////////////////////////////////////////////////////////////////////////////////
    }
if ($_POST['accion']!="product") {
  $tabla3.='<script src="Data/datatables.min.js"></script>  
<script src="Data/personaliza.js"></script>  

<link rel="stylesheet" type="text/css" href="Data/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="Data/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="Data/estilo.css">



<script type="text/javascript">
$(document).ready(function() {
    $("#example3").DataTable();
} );
</script>';
  echo $tabla3;
}

 }
 ?>

</div>
<div id="desca">

</div>

<?php
if ($_POST['accion']!="product" AND $_POST['accion']!="listadoasistencia"  AND $_POST['accion']!="verproy") {

 echo '<script type="text/javascript" src="../js/jquery-2.1.1.min.js"></script>
      <script type="text/javascript" src="../js/materialize.min.js"></script>';

echo '<script type="text/javascript">
      $(document).ready(function() {
          $("#example2").DataTable();
      } );
      </script>
      <script type="text/javascript">
      $(document).ready(function() {
          $("#example3").DataTable();
      } );


     $(".collapsible").collapsible({
        accordion: false, // A setting that changes the collapsible behavior to expandable instead of the default accordion style
        onOpen: function(el) { }, // Callback for Collapsible open
        onClose: function(el) { } // Callback for Collapsible close
      });

    </script>
    ';

}

 ?>





<script type="text/javascript">
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>
 </body>
