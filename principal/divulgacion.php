<?php ob_start (); ?>
<?php @session_start(); ?>
<?php error_reporting(0);?>
<?php
include("../conexion.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

}else {
   header('refresh:1; url=../logear.php');

exit;
}


if ($_SESSION['cargo']=="Aprendiz") {
  $Rol="RolApreC";
}elseif($_SESSION['cargo']=="Instructor"){
  $Rol="RolInstC";
}
 $conn = new mysqli($local,$user,$pass,$base); 

  $consultaCam="SELECT idT, nombreC, lineaC, estadoC, $Rol FROM tablaparametrica WHERE lineaC=5  OR  lineaC='T'"; 
 if($resultCam = $conn->query($consultaCam)){
  while($rowCam = mysqli_fetch_array($resultCam)){
    $rowsNom[$rowCam["idT"]]=$rowCam["nombreC"];
    $rowsLin[$rowCam["idT"]]=$rowCam["lineaC"];
    $rowsEsta[$rowCam["idT"]]=$rowCam["estadoC"];
    $rowsRol[$rowCam["idT"]]=$rowCam["$Rol"];
    $nombreC=$rowCam["nombreC"];
    $idsT[$rowCam["idT"]]=$rowCam["idT"];

    if ($rowCam["nombreC"]=="nom_sub") {
      $nombreSub=$rowCam["estadoC"];
    }elseif($rowCam["nombreC"]=="ema_sub"){
      $emailSub=$rowCam["estadoC"];
    }elseif($rowCam["nombreC"]=="num_cel_sub"){
      $NumCelSub=$rowCam["estadoC"];
    }
    

  
  }
}


?>
<html>
<head>
  <title>Formato Divulgación</title>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--<script type="text/javascript" src="js/datoscapacit.js"></script>-->
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
     <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <!--<script type="text/javascript" src="js/ess.js"></script>-->
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/ValidacionesFechas.js"></script>

    <!--<script src="js/bloqueo.js"></script>-->
   <!-- <script src="js/Formularioscrea.js"></script>-->
    <script type="text/javascript" src="divulgacion/js/guardarDivul.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

</head>
<script type="text/javascript">
  function crearProd(obje){
   
     $.ajax({
     url: "php/ajax.php",
           data: {
                  'accion' : 'product',
                  objet : obje
           
                 },
            type: "POST",
             
          
           beforeSend: function () {
             $("#resultObje").html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultObje").html(response);
            }

  });

  }

</script>
<style type="text/css">
	#sesione{
		float: left;
		color:black;
	}
  #res{
    font-weight: bold;
  }
</style>
<body>
    <?php include("nabvar.php"); ?>
  <div class="container">
      <div class="row">
         <br>
         <section class='card-panel white accent-4 col s12 z-depth-5'>
       <br><br><h5 style='text-align:center;'>Registro de formato Divulgación</h5>
       <br>
        

           <!-- <form id="archivo" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <SPAN>Adjunte aqui los anexos del proyecto en un archivo(.rar)</SPAN>
           <div class="file-field input-field">
           <div class="btn green text-darken-2">     
           <span>Archivo</span>  
           <input  type="file" onchange="this.form.submit()" name="Archivo"/>
           </div>
           <div class="file-path-wrapper">
           <input class="file-path validate" type="text" placeholder="Adjuntar anexos del proyecto">
           </div>
          </div>  
          </form> -->

          <?php 
          /*if (isset($_FILES['Archivo'])){
            $formatos = array('.xlsx','.doc','.pdf', '.docs', '.rar');
           $nombreArchivo1= $_FILES['Archivo']['name'];
           $nombreTmpArchivo1=$_FILES['Archivo']['tmp_name'];
           $ext1 = substr($nombreArchivo1, strrpos($nombreArchivo1, '.'));
              if (in_array($ext1, $formatos)){
                if (move_uploaded_file($nombreTmpArchivo1, "archivos/$nombreArchivo1")){
                    $Arch="Archivos/".$nombreArchivo1."";
                    echo $ArchivoAdj="Anexo: ".$nombreArchivo1."<br><br>";
                  
                   echo '<input id="anexo" type="hidden" class="validate" value="'.$Arch.'">';*/
                 ?>
                
              <script type="text/javascript">
                /*var elemento = document.getElementById("archivo");
                elemento.style.display='none';*/
              </script>

               <div class="row" id="Lisprogr">

     <?php 
      $mas="";
        if ($_SESSION['cantidadD']>0) {
        echo "<div style='text-align:right; margin: 27px;'>
          <button  Onclick='ReCargar()' target='_blank' class='btn tooltipped green text-darken-2' data-position='top' data-delay='50' data-tooltip='Registrar Proyecto'><font style='vertical-align: inherit;'><font style='vertical-align: inherit;'><i class='Small material-icons'>edit</i></font></font></button>
         </div>";
         $mas="mas";
        } ?>

        <ul class="collapsible popout" data-collapsible="accordion">
        <li>
        <div class='collapsible-header'>
        <i class='material-icons'>library_add</i>
        <span>Añadir <?php echo $mas; ?> Programas </span>

        </div>
        <div class='collapsible-body'><span></span>

        <div class='row'>
        <form method="post" action="divulgacion.php">
          <?php 
           //$_SESSION['cantidad'];
          if ($_SESSION['cantidadD']==0) {
            //echo "no hay prograas añaddos<br>";

                $conexion = new mysqli($local,$user,$pass,$base);
                  $consulta = "SELECT * from programa";
                  if ($resultado = $conexion->query($consulta)) { 
                 while($fila = mysqli_fetch_array($resultado)){
                    // echo "<input type='radio' value=".$fila["programaId"].">".utf8_encode($fila["nombreP"]);
                     echo '
                          <input type="checkbox" id="'.$fila["programaId"].'" name="Aprograma[]" value="'.$fila["programaId"].'"/>
                          <label for="'.$fila["programaId"].'">'.$fila["nombreP"].'</label><br>
                          ';
                  }
                  }

          }else{
            $cont=0;
              $conexion = new mysqli($local,$user,$pass,$base);
              $C=0;
              $D=0;
                for ($pr=0; $pr < $_SESSION['cantidadD']; $pr++) {
                  $Seleccinados[$pr]=$_SESSION['ProgramaD"'.$pr.'"'];
                  $D++;
                }
                  $consulta = "SELECT * from programa ";
                  if ($resultado = $conexion->query($consulta)) { 
                    while($fila = mysqli_fetch_array($resultado)){
                    $prgramasBD[$C]=$fila["programaId"];
                    $NombreBD[$C]=$fila["nombreP"];
                  $C++;
                }
                  }

                  for ($l=0; $l <$C ; $l++) {
                    for ($m=0; $m <$D ; $m++) { 
                      if ($prgramasBD[$l] == $Seleccinados[$m]) {
                          //echo "es igual-------".utf8_decode($NombreBD[$l])."<br>";
                          echo '<input checked type="checkbox" id="'.$prgramasBD[$l].'" name="Aprograma[]" value="'.$prgramasBD[$l].'"/>
                          <label for="'.$prgramasBD[$l].'">'.$NombreBD[$l].'</label><br>';
                      }else{
                        $cont++;
                          if ($cont==$D) {
                            //echo utf8_encode($NombreBD[$l])."<br>";

                              echo '<input type="checkbox" id="'.$prgramasBD[$l].'" name="Aprograma[]" value="'.$prgramasBD[$l].'"/>
                          <label for="'.$prgramasBD[$l].'">'.$NombreBD[$l].'</label><br>';

                          }
                        }
                        }
                        $cont=0;

                      }


          }






            
            /*  for ($p=0; $p < $_SESSION['cantidad']; $p++) { 
                       $consulta = "select * from programa where programaId=".$_SESSION['Programa"'.$p.'"']."";
                       $result = $conexion->query($consulta);
                         echo '<div  class="input-field col s12" >';
                         
                        while($rowPr = mysqli_fetch_array($result)){

                        echo '<input type="checkbox" checked="true"/>
                          <label for="'.($rowPr["nombreP"]).'">'.utf8_encode($rowPr["nombreP"]).'</label><br>';

                        }

                        echo "</div>";
                    
                   }*/
       
          
           ?>
            <br>
           <button type="submit" target='_blank' class='btn tooltipped green text-darken-2' data-position='top' data-delay='50' data-tooltip='Añadir' name="apro" class='btn waves-effect waves-light green text-darken-2' value="Añadir"><i class='Small material-icons'>library_add</i></button>

         
         </form>
         
        </div>
        <div class='modal-footer'>

        </div>
        </div>                                          
        </li>
        </ul>
        </div>

        <div class="row" style="display: none;" id="Proy">

          
             <?php 

                     $conexion = new mysqli($local,$user,$pass,$base);
                        ?>
                        <div  class="input-field col s12" >
                         <h6>Porgramas del proyecto</h6>
                        </div>
                         <?php
                    for ($p=0; $p < $_SESSION['cantidadD']; $p++) { 
                       $consulta = "select * from programa where programaId=".$_SESSION['ProgramaD"'.$p.'"']."";
                       $result = $conexion->query($consulta);
                         echo '<div  class="input-field col s12" >';
                         
                        while($rowPr = mysqli_fetch_array($result)){

                        echo '<input type="checkbox" checked="true"/>
                          <label for="'.($rowPr["nombreP"]).'">'.$rowPr["nombreP"].'</label><br>';

                        }

                        echo "</div>";
                    
                   }
                  
             ?>

          <div class="input-field col s12">
          </div>
          <div class="input-field col s12">
          </div>

<?php 
  if($rowsNom[3]=="pro_region"){
      if ($rowsRol[3]=="S") {
        $check="style='display: block;'";
      }else{
        $check="style='display: none;'";
      }
    }
 ?>
<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">Información de Centro Proponente:</label>
</div>
           <br>
           <div style="display: none;" class="input-field col s6">
              <input id="identificacion" type="text" class="validate" value=<?php echo $_SESSION['user_id']; ?>>
              <label class="active" for="first_name2">Identificacion</label>  
           </div> 
              <?php 

                if($rowsNom[4]=="pro_region"){
                  if ($rowsRol[4]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }


              $grupoInves='<div class="input-field col s6" '.$check.'>
              <select id="pro_region">
              <option value="" disabled selected>Seleccione:</option>';
              $conexion = new mysqli($local,$user,$pass,$base);
              $consulta = "select * from region";
              $result = $conexion->query($consulta);
              while($row = mysqli_fetch_array($result)){ 
              $grupoInves.='<OPTION VALUE="'.$row['id_region'].'">'.$row['nombre_region'].'</OPTION>'; 
              }
              $grupoInves.='</select>
              <label>Regional</label>
              </div>';
              echo $grupoInves;
              ?>

              <?php 

              if($rowsNom[5]=="pro_centro"){
                  if ($rowsRol[5]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

              $grupoInves='<div class="input-field col s12" '.$check.'>
              <select id="pro_centro">
              <option value="" disabled selected>Seleccione:</option>';
              $conexion = new mysqli($local,$user,$pass,$base);
              $consulta = "select * from centro";
              $result = $conexion->query($consulta);
              while($row = mysqli_fetch_array($result)){ 
              $grupoInves.='<OPTION VALUE="'.$row['codigo'].'">'.$row['nombre_centro'].'</OPTION>'; 
              }
              $grupoInves.='</select>
              <label>Seleccione el centro</label>
              </div>';
              echo $grupoInves;
              ?>

              <?php 
                 if($rowsNom[6]=="nom_sub"){
                  if ($rowsRol[6]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }


               ?>
             <div id="Divnom_sub" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off"  id="nom_sub" type="text" class="validate" data-length="30" maxlength="30" value="<?php echo $nombreSub; ?>">
                <label class="active" for="first_name2">Nombre del Subdirector</label>  
             </div> 


              <?php 
                 if($rowsNom[7]=="ema_sub"){
                  if ($rowsRol[7]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
             <div id="Divema_sub" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="ema_sub" type="text" class="validate" data-length="30" maxlength="30" value="<?php echo  $emailSub; ?>">
                <label class="active" for="first_name2">Email subdirector</label>  
             </div> 

              <?php 
                 if($rowsNom[8]=="num_cel_sub"){
                  if ($rowsRol[8]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
             <div id="Divnum_cel_sub" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="num_cel_sub" type="text" class="validate" data-length="15" maxlength="15" value="<?php echo  $NumCelSub; ?>">
                <label class="active" for="first_name2">Numero de Celular de Subdirector(a):</label>  
             </div> 

              <?php 
                 if($rowsNom[9]=="pro_autores"){
                  if ($rowsRol[9]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
             <div id="Divpro_autores" class="input-field col s6" <?php echo $check; ?>>
             <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
              
                <input autocomplete="off" id="pro_autores" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">Autores del Proyecto</label>  
             </div> 
             </div> 

              <?php 
                 if($rowsNom[10]=="nom_rad_pro"){
                  if ($rowsRol[10]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divnom_rad_pro" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="nom_rad_pro" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Nombre de quien radica el Proyecto</label>  
            </div> 
              
               <?php 
                 if($rowsNom[11]=="num_identi"){
                  if ($rowsRol[11]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_identi" class="input-field col s6" <?php echo $check; ?>>
            <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los numeros de identificacion por coma(,)">
 
                <input autocomplete="off" id="num_identi" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">numeros de identificacion</label>
            </div> 
            </div> 

             <?php 
                 if($rowsNom[12]=="ema_rad_pro"){
                  if ($rowsRol[12]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

              
            <div id="Divema_rad_pro" class="input-field col s6" <?php echo $check; ?>>

                <input autocomplete="off" id="ema_rad_pro" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Email</label>  
            </div> 

             <?php 
                 if($rowsNom[13]=="Cel_rad_pro"){
                  if ($rowsRol[13]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
                
            <div id="DivCel_rad_pro" class="input-field col s6" <?php echo $check; ?>>
            <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los numeros de Celular por coma(,)">
                <input autocomplete="off" id="Cel_rad_pro" type="text" class="validate" data-length="50" maxlength="50">
                <label class="active" for="first_name2">Numeros de Celular</label>  
            </div> 
            </div> 
           
            <!--////////////////informacion del proyecto//////////////////-->

 <?php 
   if($rowsNom[14]=="titulo_pro"){
    if ($rowsRol[14]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione" >Información del Proyecto</label>
</div>

            <?php 
                 if($rowsNom[14]=="titulo_pro"){
                  if ($rowsRol[14]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

           <div id="Divtitulo_pro" class="input-field col s12" <?php echo $check; ?>>
                <input autocomplete="off" id="titulo_pro" type="text" class="validate" data-length="50" maxlength="50">
                <label class="active" for="first_name2">Titulo</label>  
            </div> 
            
             <?php 
                 if($rowsNom[15]=="area_con_1"){
                  if ($rowsRol[15]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

           <div id="Divarea_con_1" class="input-field col s6" <?php echo $check; ?>>
              <input autocomplete="off" id="area_con_1" type="text" class="validate" data-length="100" maxlength="100">
              <label class="active" for="first_name2">Nombre del Instructor:</label>  
           </div> 
            
             <?php 
                 if($rowsNom[16]=="area_con_2"){
                  if ($rowsRol[16]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
      
            <div id="Divarea_con_2" class="input-field col s6" <?php echo $check; ?>>
              <input autocomplete="off" id="area_con_2" type="text" class="validate" data-length="100" maxlength="100">
              <label class="active" for="first_name2">Email del Instructor:</label>  
            </div> 
            
             <?php 
                 if($rowsNom[17]=="apli_posconf"){
                  if ($rowsRol[17]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
      
            <div id="Divapli_posconf" class="input-field col s6" <?php echo $check; ?>>
                <select id="apli_posconf">
                  <option value="" disabled selected>Seleccine</option>
                  <option value="Si">si</option>
                  <option value="No">no</option>
                </select>
                <label>Aplica al posconflicto</label>
            </div>

               <?php 
                 if($rowsNom[18]=="muni_impact"){
                  if ($rowsRol[18]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divmuni_impact" class="input-field col s6" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="muni_impact" class="materialize-textarea" data-length="100" maxlength="100"></textarea>
                  <label for="textarea1">Municipios a Impactar</label>
            </div>
            
             <?php 
                 if($rowsNom[19]=="des_estra"){
                  if ($rowsRol[19]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
       
            <div id="Divdes_estra" class="input-field col s6" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="des_estra" class="materialize-textarea" data-length="100" maxlength="100"></textarea>
                  <label for="textarea1">Descripcion de Extrategias</label>
            </div>
              
               <?php 
                 if($rowsNom[21]=="recu_poscof"){
                  if ($rowsRol[21]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divrecu_poscof" class="input-field col s6" <?php echo $check; ?>>
                <input  autocomplete="off" id="recu_poscof" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">Cuenta con rescursos de postconficto:$(COP):</label>
            </div>
            
             <?php 
                 if($rowsNom[21]=="ante_just_pro"){
                  if ($rowsRol[21]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divante_just_pro" class="input-field col s12" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="ante_just_pro" class="materialize-textarea"></textarea>
                  <label for="textarea1">Antecedentes y Justificacion del proyecto:</label>
            </div>

               <?php 
                 if($rowsNom[22]=="plan_pro_nec"){
                  if ($rowsRol[22]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>


            <div id="Divplan_pro_nec" class="input-field col s12" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="plan_pro_nec" class="materialize-textarea"></textarea>
                  <label for="textarea1">Plantemiento del problema y/o necesidades</label>
            </div>

               <?php 
                 if($rowsNom[23]=="fech_ini_pro"){
                  if ($rowsRol[23]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
    
            <div id="Divfech_ini_pro" class="input-field col s6" <?php echo $check; ?>>
                <input id="fech_ini_pro" type="date" class="validate" onchange="Vfecha()">
                <label class="active" for="first_name2">Fecha de Inicio del Proyecto:</label>
                <div id="Valfecha"></div>
            </div>
            
             <?php 
                 if($rowsNom[24]=="fech_fin_pro"){
                  if ($rowsRol[24]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divfech_fin_pro" class="input-field col s6" <?php echo $check; ?>>
                <input id="fech_fin_pro" type="date" class="validate" onchange="Vfecha2()">
                <label class="active" for="first_name2">Fecha de fin del Proyecto:</label>
                <div id="Valfecha2"></div>
            </div>

          
            <?php 

                 if($rowsNom[25]=="nom_gru_inv"){
                  if ($rowsRol[25]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

            $grupoInves='<div id="Divnom_gru_inv" class="input-field col s12" '.$check.'>
            <select id="nom_gru_inv">
            <option value="" disabled selected>Seleccione:</option>';
            $conexion = new mysqli($local,$user,$pass,$base);
            $consulta = "select * from grupo";
            $result = $conexion->query($consulta);
            while($row = mysqli_fetch_array($result)){ 
            $grupoInves.='<OPTION VALUE="'.$row['id'].'">'.$row['nombre_grupo'].'</OPTION>'; 
            }
            $grupoInves.='</select>
            <label>Nombre de grupo de Investigacion</label>
            </div>';
            echo $grupoInves;

            ?>

             <?php 
                 if($rowsNom[26]=="cod_grupo"){
                  if ($rowsRol[26]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
       
             <div id="Divcod_grupo" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="cod_grupo" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">Codigo de GrupLAC:</label>
            </div>
                  
               <?php 
                 if($rowsNom[27]=="num_sem_bene"){
                  if ($rowsRol[27]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divnum_sem_bene" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="num_sem_bene" type="number" class="validate" data-length="4" maxlength="4">
                <label class="active" for="first_name2">Numero de Semilleros Beneficiados:</label>
             </div>
                  
               <?php 
                 if($rowsNom[28]=="nomb_sem_bene"){
                  if ($rowsRol[28]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divnomb_sem_bene" class="input-field col s12" <?php echo $check; ?>>
             <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
              
                  <textarea autocomplete="off" id="nomb_sem_bene" class="materialize-textarea" data-length="100" maxlength="100"></textarea>
                  <label for="textarea1">nombres de Semilleros Beneficiados:</label>
             </div>
             </div>

               <?php 
                 if($rowsNom[29]=="des_meto_pro"){
                  if ($rowsRol[29]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divdes_meto_pro" class="input-field col s12" <?php echo $check; ?>>
                <textarea autocomplete="off" id="des_meto_pro" class="materialize-textarea"></textarea>
                <label for="textarea1">descripcion de metodologia del proyecto:</label>
            </div>

             <?php 
                 if($rowsNom[30]=="num_pro_bene"){
                  if ($rowsRol[30]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_pro_bene" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="num_pro_bene" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">numero de programa de formacion beneficiado</label>
            </div>
          
           <?php 
                 if($rowsNom[31]=="nom_pro_bene"){
                  if ($rowsRol[31]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

           <div id="Divnom_pro_bene"  class="input-field col s6" <?php echo $check; ?>>
            <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
              
                <input autocomplete="off" id="nom_pro_bene" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">Nombre de los programas beneficiados</label>
            </div>
            </div>
              
               <?php 
                 if($rowsNom[32]=="imp_esperado"){
                  if ($rowsRol[32]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divimp_esperado"  class="input-field col s12" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="imp_esperado" class="materialize-textarea"></textarea>
                <label class="active" for="first_name2">impacto esperado</label>
            </div>
     
      
      <!--<label  style="color:black; float:left;"><b><u>Recursos Humanos:</u></b></label>-->
            
             <?php 
                 if($rowsNom[33]=="num_per_ext"){
                  if ($rowsRol[33]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_per_ext"  class="input-field col s4" <?php echo $check; ?>>
                <input autocomplete="off" id="num_per_ext" type="number" class="validate" data-length="3" maxlength="3">
                <label class="active" for="first_name2">N° personal externo</label>
            </div>
              
               <?php 
                 if($rowsNom[34]=="nom_apr_ext"){
                  if ($rowsRol[34]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divnom_apr_ext" class="input-field col s8" <?php echo $check; ?>>
             <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
              
                <input autocomplete="off" id="nom_apr_ext" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">Nombres y apellidos</label>
            </div>
            </div>

              <?php 
                 if($rowsNom[35]=="num_iden_ext"){
                  if ($rowsRol[35]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>


             <div id="Divnum_iden_ext" class="input-field col s12" <?php echo $check; ?>>
              <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los numeros de identificacion por coma(,)">
                <input autocomplete="off" id="num_iden_ext" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">Numeros de identificacion</label>
            </div>
            </div>

<?php 
   if($rowsNom[36]=="num_pers_int_s"){
    if ($rowsRol[36]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

<div class="input-field col s12" <?php echo $check; ?>>
  <label class="active" id="sesione">Número de personal interno(Aprendices Sin Contrato de apredizaje)</label>
</div>      
             <?php 
                 if($rowsNom[36]=="num_pers_int_s"){
                  if ($rowsRol[36]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_pers_int_s" class="input-field col s4" <?php echo $check; ?>>
                <input autocomplete="off" id="num_pers_int_s" type="number" class="validate" data-length="3" maxlength="3">
                <label class="active" for="first_name2">Número de personal interno</label>
            </div>

             <?php 
                 if($rowsNom[37]=="nom_ape_int_s"){
                  if ($rowsRol[37]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

           <div id="Divnom_ape_int_s" class="input-field col s8" <?php echo $check; ?>>
           <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
              
                <input autocomplete="off" id="nom_ape_int_s" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">Nombres y apellidos:</label>
            </div>
            </div>

               <?php 
                 if($rowsNom[38]=="num_iden_int_s"){
                  if ($rowsRol[38]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

           <div id="Divnum_iden_int_s" class="input-field col s12" <?php echo $check; ?>>
           <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los numeros de identificacion por coma(,)">
                <input autocomplete="off" id="num_iden_int_s" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">Numeros de Identificacion:</label>
            </div>
            </div>

<?php 
   if($rowsNom[39]=="num_pers_int_c"){
    if ($rowsRol[39]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">Número de personal interno(Aprendices con Contrato de apredizaje)</label>
</div>
             <?php 
                 if($rowsNom[39]=="num_pers_int_c"){
                  if ($rowsRol[39]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_pers_int_c" class="input-field col s12" <?php echo $check; ?>>
                <input autocomplete="off" id="num_pers_int_c" type="number" class="validate" data-length="3" maxlength="3">
                <label class="active" for="first_name2">Número de personal interno</label>
            </div>

<!--  <?php 
    /* if($rowsNom[39]=="num_pers_int_cm"){
      if ($rowsRol[39]=="S") {
        $check="style='display: block;'";
      }else{
        $check="style='display: none;'";
      }
    }*/

 ?>

<div class="input-field col s12" <?php //echo $check; ?>>
<label class="active" id="sesione">Número de personal interno (Aprendices Con Contrato de monitoria)</label>
</div>
             <?php 
                /* if($rowsNom[39]=="num_pers_int_cm"){
                  if ($rowsRol[39]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }*/

               ?>

            <div id="Divnum_pers_int_cm" class="input-field col s12" <?php //echo $check; ?>>
                <input autocomplete="off" id="num_pers_int_cm" type="number" class="validate" data-length="3" maxlength="3">
                <label class="active" for="first_name2">Número de personal interno </label>
            </div>
 -->

 <?php 
     if($rowsNom[41]=="num_pers_int_in"){
      if ($rowsRol[41]=="S") {
        $check="style='display: block;'";
      }else{
        $check="style='display: none;'";
      }
    }

  ?>

<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">(Número de personal interno (Instructores)</label>
</div>
             <?php 
                 if($rowsNom[41]=="num_pers_int_in"){
                  if ($rowsRol[41]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_pers_int_in" class="input-field col s12" <?php echo $check; ?>>
                <input autocomplete="off" id="num_pers_int_in" type="number" class="validate" data-length="3" maxlength="3">
                <label class="active" for="first_name2">Número de personal interno </label>
            </div>
            
             <?php 
                 if($rowsNom[42]=="nom_apellidos"){
                  if ($rowsRol[42]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnom_apellidos" class="input-field col s12" <?php echo $check; ?>>
            <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
            
                  <textarea autocomplete="off" id="nom_apellidos" class="materialize-textarea" data-length="100" maxlength="100"></textarea>
                  <label for="textarea1">Nombres y Apellidos</label>
            </div>
            </div>

             <?php 
                 if($rowsNom[43]=="num_idenficac"){
                  if ($rowsRol[43]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_idenficac" class="input-field col s12"  <?php echo $check; ?>>
             <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los numeros de identificacion por coma(,)">
                <input autocomplete="off" id="num_idenficac" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">numeros de idetificacion</label>
            </div>
            </div>

 <?php 
   if($rowsNom[44]=="num_per_int_s"){
    if ($rowsRol[44]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">Número de personal interno (Otros-TP-TA-SENNOVA)</label>
</div>
            
             <?php 
                 if($rowsNom[44]=="num_per_int_s"){
                  if ($rowsRol[44]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnum_per_int_s" class="input-field col s12"  <?php echo $check; ?>>
                <input autocomplete="off" id="num_per_int_s" type="number" class="validate" data-length="3" maxlength="3">
                <label class="active" for="first_name2">Número de personal interno:</label>
            </div>
            
             <?php 
                 if($rowsNom[45]=="nom_apell_pers"){
                  if ($rowsRol[45]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnom_apell_pers" class="input-field col s12"  <?php echo $check; ?>>
            <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los nombres por coma(,)">
            
                  <textarea autocomplete="off" id="nom_apell_pers" class="materialize-textarea" type="text" data-length="100" maxlength="100"></textarea>
                <label class="active" for="first_name2">nombres y apellidos</label>
            </div>
            </div>

             <?php 
                 if($rowsNom[46]=="num_iden_pers"){
                  if ($rowsRol[46]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

      
            <div id="Divnum_iden_pers" class="input-field col s12"  <?php echo $check; ?>>
             <div target="_blank" class=" tooltipped" data-position="booton" data-delay="50" data-tooltip="Separe los numeros de identificacion por coma(,)">
                <input autocomplete="off" id="num_iden_pers" type="text" class="validate" data-length="100" maxlength="100">
                <label class="active" for="first_name2">numeros de identificacion</label>
            </div>
            </div>
      
 <?php 
   if($rowsNom[47]=="nom_ali_int"){
    if ($rowsRol[47]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

    
<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">Aliados Externos y/o Contrapartida</label>
</div>
          
           <?php 
                 if($rowsNom[47]=="nom_ali_int"){
                  if ($rowsRol[47]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnom_ali_int" class="input-field col s12" <?php echo $check; ?>>
                <input autocomplete="off" id="nom_ali_int" type="text" class="validate" data-length="30" maxlength="30">
                <label class="active" for="first_name2">nombre de aliado interno</label>
            </div>
              
               <?php 
                 if($rowsNom[48]=="nit"){
                  if ($rowsRol[48]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

            <div id="Divnit" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="nit" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">Nit</label>
            </div>  

             <?php 
                 if($rowsNom[49]=="rec_esp_ent_ext"){
                  if ($rowsRol[49]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

      
             <div id="Divrec_esp_ent_ext" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="rec_esp_ent_ext" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">Recursos en Especie Entidad Externa ($COP):</label>
            </div>
      
             <?php 
                 if($rowsNom[50]=="rec_din_ent_ext"){
                  if ($rowsRol[50]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

           <div id="Divrec_din_ent_ext" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="rec_din_ent_ext" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">Recursos en Dinero Entidad Externa($COP):</label>
            </div>
              
               <?php 
                 if($rowsNom[51]=="rec_esp_ent_int"){
                  if ($rowsRol[51]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
      
             <div id="Divrec_esp_ent_int" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="rec_esp_ent_int" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">Recursos en Especie Entidad Interna ($COP):</label>
            </div>
              
               <?php 
                 if($rowsNom[52]=="rec_din_ent_int"){
                  if ($rowsRol[52]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divrec_din_ent_int" class="input-field col s6" <?php echo $check; ?>>
                <input autocomplete="off" id="rec_din_ent_int" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">Recursos en Dinero Entidad Interna ($COP):</label>
            </div>
              
               <?php 
                 if($rowsNom[53]=="cui_mun_inf"){
                  if ($rowsRol[53]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>

             <div id="Divcui_mun_inf" class="input-field col s6" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="cui_mun_inf" class="materialize-textarea"></textarea>
                <label class="active" for="first_name2">Ciudades y/o municipios de inlfuencia:</label>
            </div>
              
               <?php 
                 if($rowsNom[54]=="des_ali_obj"){
                  if ($rowsRol[54]=="S") {
                    $check="style='display: block;'";
                  }else{
                    $check="style='display: none;'";
                  }
                }

               ?>
      
             <div id="Divdes_ali_obj" class="input-field col s12" <?php echo $check; ?>>
                  <textarea autocomplete="off" id="des_ali_obj" class="materialize-textarea"></textarea>
                <label class="active" for="first_name2">Descripción de la alianza y objetivos:</label>
            </div>

 			

<?php 
   if($rowsNom[181]=="se_pe_in"){
    if ($rowsRol[181]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>
 			
<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>


<?php 
   if($rowsNom[181]=="se_pe_in"){
    if ($rowsRol[181]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>


<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">SERVICIOS PERSONAL INDIRECTOS</label>
</div>


<?php 
   if($rowsNom[181]=="se_pe_in"){
    if ($rowsRol[181]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>


		        <div id="Divse_pe_in" class="input-field col s6" <?php echo $check; ?>>
                <input id="se_pe_in" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">($COP)</label>
            </div>


<?php 
   if($rowsNom[182]=="descripcion1"){
    if ($rowsRol[182]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

			
			      <div id="Divdescripcion1" class="input-field col s12" <?php echo $check; ?>>
                  <textarea id="descripcion1" class="materialize-textarea"></textarea>
                  <label for="textarea1">descripcion</label>
            </div>


<?php 
   if($rowsNom[183]=="ma_pa_for"){
    if ($rowsRol[183]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>


<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>


<?php 
   if($rowsNom[183]=="ma_pa_for"){
    if ($rowsRol[183]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>


            <div id="Divma_pa_for" class="input-field col s6" <?php echo $check; ?>>
                <input id="ma_pa_for" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">($COP): </label>
            </div>

<?php 
   if($rowsNom[184]=="descripcion2"){
    if ($rowsRol[184]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>



			      <div id="Divdescripcion2" class="input-field col s12" <?php echo $check; ?>>
                  <textarea id="descripcion2" class="materialize-textarea"></textarea>
                  <label for="textarea1">descripcion</label>
            </div>

<?php 
   if($rowsNom[185]=="ot_gast_imp"){
    if ($rowsRol[185]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>
			
<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
</div>


<?php 
   if($rowsNom[185]=="ot_gast_imp"){
    if ($rowsRol[185]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

			
           	<div id="Divot_gast_imp" class="input-field col s6" <?php echo $check; ?>>
                <input id="ot_gast_imp" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">($COP):</label>
            </div>


<?php 
   if($rowsNom[186]=="descripcion3"){
    if ($rowsRol[186]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

			
			     <div id="Divdescripcion3" class="input-field col s12" <?php echo $check; ?>>
                  <textarea id="descripcion3" class="materialize-textarea"></textarea>
                  <label for="textarea1">descripcion</label>
            </div>


<?php 
   if($rowsNom[187]=="di_ac_ge_in"){
    if ($rowsRol[187]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>
			

<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONAL</label>
</div>


<?php 
   if($rowsNom[187]=="di_ac_ge_in"){
    if ($rowsRol[187]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>
			

            <div id="Divdi_ac_ge_in" class="input-field col s6" <?php echo $check; ?>>
                <input id="di_ac_ge_in" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">($COP):</label>
           	</div>


<?php 
   if($rowsNom[188]=="descripcion4"){
    if ($rowsRol[188]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>
			

			      <div id="Divdescripcion4" class="input-field col s12" <?php echo $check; ?>>
                  <textarea id="descripcion4" class="materialize-textarea"></textarea>
                  <label for="textarea1">descripcion</label>
            </div>


<?php 
   if($rowsNom[189]=="via_gast_int"){
    if ($rowsRol[189]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>
		   

<div class="input-field col s12" <?php echo $check; ?>>
<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>


<?php 
   if($rowsNom[189]=="via_gast_int"){
    if ($rowsRol[189]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>


            <div id="Divvia_gast_int" class="input-field col s6" <?php echo $check; ?>>
                <input id="via_gast_int" type="number" class="validate" data-length="8" maxlength="8">
                <label class="active" for="first_name2">($COP):</label>
            </div>


<?php 
   if($rowsNom[190]=="descripcion5"){
    if ($rowsRol[190]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>


			
			     <div id="Divdescripcion5" class="input-field col s12" <?php echo $check; ?>>
                  <textarea id="descripcion5" class="materialize-textarea"></textarea>
                  <label for="textarea1">descripcion</label>
            </div>

<?php 
   if($rowsNom[57]=="LinkCvlac"){
    if ($rowsRol[57]=="S") {
      $check="style='display: block;'";
    }else{
      $check="style='display: none;'";
    }
  }

?>

			
             <div id="DivCvla" class="input-field col s6" <?php echo $check; ?>>
                <input id="Cvla" type="text" class="validate" data-length="200" maxlength="200">
                <label class="active" for="first_name2">Link CVLAC</label>  
             </div>
             
            <div class="input-field col s12">
                  <textarea id="ObjeGene" class="materialize-textarea"></textarea>
                  <label for="textarea1">Objetivo General</label>
            </div>
 

               <div class="input-field col s12">
              <select id="obje" onchange="crearProd(this.value)">
                <option value="0">Seleccione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
              </select>
              <label>Cantidad de Objetivos</label>
          </div>

          <div id="resultObje" class="input-field col s12">
            
          </div>


         <div class="col s11" id="res" >
         <!--en este espacio van los mensajes de validacion-->
         
         <br><br>
        </div>
        <div class="input-field col s12"> 
        </div>
    </div>
  
         
          <!--<div id="EnPr">
          <center>
            <button  onclick="crear()" class="btn waves-effect waves-light">Enviar
          </button>
          </center>
          </div>-->
         </div>
       <br><br><br>
        <br>
         </section>
    </div>
</div>
       <?php
      
      /* }else{
        echo "error";
         }
    }else{
      echo "Debe seleccionar un archivo.rar";
    }

}*/
?>
  <?php 
            //echo $Anadir=$_POST['APrg'];
            if (isset($_POST['apro'])) {
              ?>
              <script type="text/javascript">
                window.reload();
              </script>
              <?php
              $ArrayPro=$_POST['Aprograma'];
              $cantidad=count($ArrayPro);
              $_SESSION['cantidadD']= $cantidad;
              //echo $cantidad;
              if ($cantidad==0) {
                ?>
                <script type="text/javascript">
                      swal({title: "",text: "debe seleccionara al menos un programa",type: "warning",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false});
                </script>
                <?php
              }else{
                for ($i=0; $i < $cantidad ; $i++) { 
                  $_SESSION['ProgramaD"'.$i.'"']=$ArrayPro[$i];
                  $_SESSION['ProgramaD"'.$i.'"'];
                }
    
                
              }

              ?>
              <script type="text/javascript">
                swal({title: "",
                      text: "Programa(s) Agregado(s)",
                      type: "success",
                      showCancelButton: false,
                      confirmButtonColor: "orange",
                      confirmButtonText: "ok", 
                      closeOnConfirm: false
                    },
                    function(){ window.location.href="divulgacion.php"}
                    );
              </script>
              <?php

            }elseif(isset($_POST['aproReg'])){
              ?>
             <script type="text/javascript">
                  var elemento = document.getElementById("Proy");
                          elemento.style.display='block';

                  var elemento2 = document.getElementById("Lisprogr");
                          elemento2.style.display='none';
             </script>

              <?php

            }

          

            ?>
            <script type="text/javascript">
                window.reload();

              </script>
            <?php
      
          ?>


<script type="text/javascript">
  function ReCargar(){

                  swal({title: "",
                      text: "Esta seguro que estos son los programas del proyecto?",
                      type: "warning",
                      showCancelButton: true,
                      confirmButtonColor: "orange",
                      confirmButtonText: "ok", 
                      closeOnConfirm: true
                    },
                    function(){ window.reload ="true"; 

                    var elemento = document.getElementById("Proy");
                          elemento.style.display='block';

                  var elemento2 = document.getElementById("Lisprogr");
                          elemento2.style.display='none';
                        }
                    );


    




  }
</script>



  </script>
<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="js/materialize.min.js"></script>
 <script type="text/javascript">
    $( document ).ready(function(){
    $(".button-collapse").sideNav();
    })
    $(document).ready(function(){
    $('.modal').modal();
    });
    $(document).ready(function(){
    $('.collapsible').collapsible();
    });

    $(document).ready(function() {
    $('select').material_select();
    });

  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });
</script>
</script>

</body>
</html>
             