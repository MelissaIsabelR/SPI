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
?>
<html>
<head>
  <title>Ver Formato <?php echo $_GET['t']; ?></title>
  <html lang="es">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link type="text/css" rel="stylesheet" href="css/icon.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
    <!--<script type="text/javascript" src="js/datoscapacit.js"></script>-->
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <link rel="icon" type="image/png" href="images/favicon.ico" />
    <!--<script type="text/javascript" src="js/ess.js"></script>-->
    <script type="text/javascript" src="js/alertify.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <!--<script src="js/bloqueo.js"></script>-->
   <!-- <script src="js/Formularioscrea.js"></script>-->
    <script type="text/javascript" src="investigacion/js/guardarinvesti.js"></script>
    <link type="text/css" rel="stylesheet" href="css/animate.css"/>  
    </head>

</head>
<style type="text/css">
  #sesione{
    float: left;
    color:black;
  }

    #caja{
      color:black;
    }
    #caja2{
      color:green;
    }
    
  
</style>
<script type="text/javascript">
  function camFecEnvAdmi(codigo, tabla){
  //  alert(codigo)
  //  alert(tabla)
           $.ajax({
          url: "php/fechaEnvioAmin.php",
          data: {
             fecha : $("#fecha").val(),
             codigo :codigo,
             tabla : tabla
              
          },
          
          type: "POST",
          
          success: function(response){
            if (response==0){
                            alertify.error('Error al cambiar la fecha de envio');
                    }else if(response==1){
                              alertify.success('Fecha de Envio Actualizada');
                    };
                     location.reload(true);
               
                
          }
          
        });
}



</script>


<body>
    <?php include("nabvar.php"); ?>
  <div class="container">
      <div class="row">
        <br>
         <section class="card-panel white accent-4 col s12 z-depth-5">      
              
               
          <!--/////////////////////PRIMERA SESION////////////////////-->
          <br>

 <?php 
   
     $conexion = new mysqli($local,$user,$pass,$base);
     if ($_GET['t']=="investigacion ") {
        $line="1";
     }elseif ($_GET['t']=="innovacion ") {
         $line="2";
     }elseif ($_GET['t']=="servicios ") {
         $line="3";
     }elseif ($_GET['t']=="modernizacion ") {
         $line="4";
     }elseif ($_GET['t']=="divulgacion ") {
         $line="5";
     }else{


      if ($_GET['t']=="investigacion") {
        $line="1";
        $_GET['t']="investigacion ";
     }elseif ($_GET['t']=="innovacion") {
         $line="2";
        $_GET['t']="innovacion ";
     }elseif ($_GET['t']=="servicios") {
         $line="3";
        $_GET['t']="servicios ";
     }elseif ($_GET['t']=="modernizacion") {
         $line="4";
        $_GET['t']="modernizacion ";
     }elseif ($_GET['t']=="divulgacion") {
         $line="5";
        $_GET['t']="divulgacion ";

        } 
     }

      if ($_GET['r']=="Aprendiz") {
        $Rol="RolApreC";
      }elseif($_GET['r']=="Instructor"){
        $Rol="RolInstC";
      }else{
        if ($_SESSION['cargo']=="Aprendiz") {
          $Rol="RolApreC";
        }elseif($_SESSION['cargo']=="Instructor"){
          $Rol="RolInstC";
        }
      }

            $consultaCam2="SELECT idT, nombreC, lineaC , $Rol, estadoC FROM tablaparametrica  WHERE lineaC=$line  OR  lineaC='T'";  
        if($resultCam2 = $conexion->query($consultaCam2)){
              while($rowCam2 = mysqli_fetch_array($resultCam2)){

                  $rowsNom[]=$rowCam2["nombreC"];
                  $rowsLin[]=$rowCam2["lineaC"];
                  $rowsEsta[]=$rowCam2["estadoC"];
                  $rowsRol[]=$rowCam2["$Rol"];
                  $nombreC=$rowCam2["nombreC"];
                  $idsT[]=$rowCam2["idT"];


               $rowsNom2[$rowCam2["idT"]]=$rowCam2["nombreC"];
               $rowsLin2[$rowCam2["idT"]]=$rowCam2["lineaC"];
               $rowsEsta2[$rowCam2["idT"]]=$rowCam2["estadoC"];
               $rowsRol2[$rowCam2["idT"]]=$rowCam2["$Rol"];
               $nombreC2=$rowCam2["nombreC"];
               $idsT2[$rowCam2["idT"]]=$rowCam2["idT"];

                   if ($rowCam2["nombreC"]=="nom_sub") {
                    $nombreSub=$rowCam2["estadoC"];
                  }elseif($rowCam2["nombreC"]=="ema_sub"){
                    $emailSub=$rowCam2["estadoC"];
                  }elseif($rowCam2["nombreC"]=="num_cel_sub"){
                    $NumCelSub=$rowCam2["estadoC"];
                  }
              
              }
            }
/*            print_r($rowsNom);
*//*
print_r($rowsNom2);*/
/*print_r($rowsNom2);
*/      $consultaP="SELECT * FROM programa INNER JOIN prog_proy ON programa.programaId=prog_proy.id_prog
INNER JOIN ".$_GET['t']." ON prog_proy.id_proy=".$_GET['t'].".codigo
WHERE ".$_GET['t'].".codigo=".$_GET['c']." AND ".$_GET['t'].".pro_linea=".$line."";

        ////////////////////////////////////////////////tabla///////////////////////////////////////
   if($result = $conexion->query($consultaP)){
    $lista='
         <ul class="collection with-header">
        <li class="collection-header"><h6><b>Programas</b></h6></li>';
      while($row = mysqli_fetch_array($result)){
        $lista.='<li class="collection-item"><div>'.$row['nombreP'].'<a href="#!" class="secondary-content"><i class="material-icons">done</i></a></div></li>';
      }
      $lista.="</ul>";
  }
  

      $consulta = "SELECT * from  ".$_GET['t']."
      INNER JOIN grupo ON  ".$_GET['t'].".nom_gru_inv=grupo.id
      INNER JOIN region ON   ".$_GET['t'].".pro_region=region.id_region
      INNER JOIN centro ON   ".$_GET['t'].".pro_centro=centro.codigo
      WHERE ".$_GET['t'].".codigo= ".$_GET['c']."";

      if($result = $conexion->query($consulta)){
      while($row2 = mysqli_fetch_array($result)){ 
        $estado=$row2["estado"];
         //$anexo=$row2["anexo"];
         $envio=$row2["envio"];
               $formulario='
    <BR><BR>
  <H5 style="text-align:center;">Registro de Proyecto '.$_GET['t'].'</H5>
<div class="input-field col s12">
<label class="active"  style="font-size:15px; text-align:center; color:black;">El estado de este proyecto es: '.$estado.'</label><br>
</div>';
$formulario.=$lista;

if($rowsNom[3]=="pro_region"){
  if ($rowsRol[3]=="S") {
    $check="style='display: block;'";
  }else{
    $check="style='display: none;'";
  }
}

$formulario.='<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione">Información de Centro Proponente:</label>
</div>
         <input id="codigoPro" type="hidden" value='.$_GET['c'].'>

           <br>
           <div style="display: none;" class="input-field col s6">
              <input id="identificacion" type="text" class="validate" autocomplete="off" disabled value="'.$_SESSION["user_id"].'">
              <label class="active" for="first_name2">Identificacion</label>  
           </div>';

            if($rowsNom[3]=="pro_region"){
              if ($rowsRol[3]=="S") {
                $check="style='display: block;'";
              }else{
                $check="style='display: none;'";
              }
            }
             
              
              $consultaRegi = "select * from region";
              $resultRegi = $conexion->query($consultaRegi);
              while($rowRegi = mysqli_fetch_array($resultRegi)){ 
                if ($row2["id_region"]==$rowRegi['id_region']) {
                
                  $formulario.='<div class="input-field col s6" '.$check.'>
                   <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.$rowRegi['nombre_region'].'">
                    <label id="caja2" class="active" for="first_name2">Region</label>  
                  </div>'; 

                }
            }
              
              if($rowsNom[4]=="pro_centro"){
                if ($rowsRol[4]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

             
              $consultaCent = "select * from centro";
              $resultCent = $conexion->query($consultaCent);
              while($rowCent = mysqli_fetch_array($resultCent)){ 

                 if ($row2["codigo"]==$rowCent['codigo']) {

                  $formulario.='<div class="input-field col s12" '.$check.'>
                   <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.$rowCent['nombre_centro'].'">
                    <label id="caja2" class="active" for="first_name2">centro</label>  
                  </div>'; 
 
                } 
              }
             

              if($rowsNom[5]=="nom_sub"){
                if ($rowsRol[5]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.='
          

             <div id="Divnom_sub" class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="30" maxlength="30" value="'.$nombreSub.'">
                <label id="caja2" class="active" for="first_name2">Nombre del Subdirector</label>  
             </div>'; 

             if($rowsNom[6]=="ema_sub"){
                if ($rowsRol[6]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.='<div id="Divema_sub" class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="30" maxlength="30" value="'.$emailSub.'">
                <label id="caja2" class="active" for="first_name2">Email subdirector</label>  
             </div> 

             '; 

             if($rowsNom[7]=="num_cel_sub"){
                if ($rowsRol[7]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.='<div id="Divnum_cel_sub" class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="15" maxlength="15" value="'.$NumCelSub.'">
                <label id="caja2" class="active" for="first_name2">Numero de Celular de Subdirector(a):</label>  
             </div> 

              '; 

             if($rowsNom[8]=="pro_autores"){
                if ($rowsRol[8]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.='
             <div id="Divpro_autores" class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["pro_autores"].'">
                <label id="caja2" class="active" for="first_name2">Autores del Proyecto</label>  
             </div> 

              '; 

             if($rowsNom[9]=="nom_rad_pro"){
                if ($rowsRol[9]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.='

             <div id="Divnom_rad_pro" class="input-field col s6"  '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="30" maxlength="30"  value="'.$row2["nom_rad_pro"].'">
                <label id="caja2" class="active" for="first_name2">Nombre de quien radica el Proyecto</label>  
            </div> 

            '; 

             if($rowsNom[10]=="num_identi"){
                if ($rowsRol[10]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.='


            <div id="Divnum_identi"  class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100"  value="'.$row2["num_identi"].'">
                <label id="caja2" class="active" for="first_name2">numeros de identificacion</label>
            </div>

            '; 

             if($rowsNom[11]=="ema_rad_pro"){
                if ($rowsRol[11]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.=' 
            
            <div id="Divema_rad_pro" class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="30" maxlength="30"  value="'.$row2["ema_rad_pro"].'">
                <label id="caja2" class="active" for="first_name2">Email</label>  
            </div> 

            '; 

             if($rowsNom[12]=="Cel_rad_pro"){
                if ($rowsRol[12]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.=' 
      
            <div id="DivCel_rad_pro" class="input-field col s6" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="50" maxlength="50"  value="'.$row2["Cel_rad_pro"].'">
                <label id="caja2" class="active" for="first_name2">Numeros de Celular</label>  
            </div> 
           
            <!--////////////////informacion del proyecto//////////////////-->

            '; 
           
             if($rowsNom[13]=="titulo_pro"){
                if ($rowsRol[13]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.=' 
<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione" >Información del Proyecto</label>
</div>
          
           '; 

             if($rowsNom[13]=="titulo_pro"){
                if ($rowsRol[13]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.=' 
    
           <div id="Divtitulo_pro" class="input-field col s12" '.$check.'>
                <input  id="caja"  type="text" class="validate" autocomplete="off" disabled data-length="50" maxlength="50" value="'.$row2["titulo_pro"].'">
                <label id="caja2" class="active" for="first_name2">Titulo</label>  
            </div> 
    
     '; 

             if($rowsNom[14]=="area_con_1"){
                if ($rowsRol[14]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.=' 

           <div id="Divarea_con_1" class="input-field col s6" '.$check.'>
              <input  id="caja"  type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["area_con_1"].'">
              <label id="caja2" class="active" for="first_name2">Nombre del Instructor:</label>  
           </div> 
        
        '; 

             if($rowsNom[15]=="area_con_2"){
                if ($rowsRol[15]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }

        $formulario.=' 
      
            <div id="Divarea_con_2" class="input-field col s6">
              <input  id="caja"  type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["area_con_2"].'">
              <label id="caja2" class="active" for="first_name2">Email del Instructor:</label>  
            </div>'; 

             if($rowsNom[16]=="apli_posconf"){
                if ($rowsRol[16]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }


           
              $consultaPostC = "select * from ".$_GET['t']." where ".$_GET['t'].".codigo= ".$_GET['c']."";
              $resultPostC = $conexion->query($consultaPostC);
              while($rowPostC = mysqli_fetch_array($resultPostC)){ 

                 if ($row2["apli_posconf"]==$rowPostC['apli_posconf']) {

                     $formulario.='<div class="input-field col s6" '.$check.'>
                   <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.$row2["apli_posconf"].'">
                    <label id="caja2" class="active" for="first_name2">Aplica al posconflicto:</label>  
                  </div>'; 

                }
                  /*if ($row2["apli_posconf"]=="Si") {
                    $formulario.='<div class="input-field col s6" '.$check.'>
                   <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.$row2["apli_posconf"].'">
                    <label id="caja2" class="active" for="first_name2">Aplica al posconflicto:</label>  
                  </div>'; 
                  }else{
                     $formulario.='<div class="input-field col s6" '.$check.'>
                   <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.$row2["apli_posconf"].'">
                    <label id="caja2" class="active" for="first_name2">Aplica al posconflicto:</label>  
                  </div>'; 
                  }*/

              
            }
              

             if($rowsNom[17]=="muni_impact"){
                if ($rowsRol[17]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            
            $formulario.='<div id="Divmuni_impact" class="input-field col s6" '.$check.'>
                  <textarea disabled  id="caja"  class="materialize-textarea" data-length="100" maxlength="100">'.$row2["muni_impact"].'</textarea>
                  <label id="caja2" for="textarea1">Municipios a Impactar</label>
            </div>
            
            ';

             if($rowsNom[18]=="des_estra"){
                if ($rowsRol[18]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
      
            $formulario.='
       
            <div id="Divdes_estra" class="input-field col s6" '.$check.'>
                  <textarea disabled  id="caja"  class="materialize-textarea" data-length="100" maxlength="100">'.$row2["des_estra"].'</textarea>
                  <label id="caja2" for="textarea1">Descripcion de Extrategias</label>
            </div>
          
            ';

             if($rowsNom[19]=="recu_poscof"){
                if ($rowsRol[19]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
      
            $formulario.='

            <div id="Divrecu_poscof" class="input-field col s6" '.$check.'>
                <input  id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["recu_poscof"].'">
                <label id="caja2" class="active" for="first_name2">Cuenta con rescursos de postconficto:$(COP):</label>
            </div>

             ';

             if($rowsNom[20]=="ante_just_pro"){
                if ($rowsRol[20]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
      
            $formulario.='
       
            <div id="Divante_just_pro" class="input-field col s12" '.$check.'>
                  <textarea disabled  id="caja"  class="materialize-textarea" >'.$row2["ante_just_pro"].'</textarea>
                  <label id="caja2" for="textarea1">Antecedentes y Justificacion del proyecto:</label>
            </div>


             ';

             if($rowsNom[21]=="plan_pro_nec"){
                if ($rowsRol[21]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
      
            $formulario.='

            <div id="Divplan_pro_nec" class="input-field col s12" '.$check.'>
                  <textarea disabled  id="caja"  class="materialize-textarea" >'.$row2["plan_pro_nec"].'</textarea>
                  <label id="caja2" for="textarea1">Plantemiento del problema y/o necesidades</label>
            </div>

             ';

             if($rowsNom[22]=="fech_ini_pro"){
                if ($rowsRol[22]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
      
            $formulario.='

            <div id="Divfech_ini_pro" class="input-field col s6" '.$check.'>
                <input  id="caja"  type="date" class="validate" autocomplete="off" disabled value='.$row2["fech_ini_pro"].'>
                <label id="caja2" class="active" for="first_name2">Fecha de Inicio del Proyecto:</label>
            </div>

             ';

             if($rowsNom[23]=="fech_fin_pro"){
                if ($rowsRol[23]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
      
            $formulario.='
      
            <div id="Divfech_fin_pro" class="input-field col s6" '.$check.'>
                <input  id="caja" type="date" class="validate" autocomplete="off" disabled value='.$row2["fech_fin_pro"].'>
                <label id="caja2" class="active" for="first_name2">Fecha de fin del Proyecto:</label>
            </div>';

             if($rowsNom[24]=="nom_gru_inv"){
                if ($rowsRol[24]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

       
            $consultaGrupo = "select * from grupo";
            $resultGrupo = $conexion->query($consultaGrupo);
            while($rowGrupo = mysqli_fetch_array($resultGrupo)){ 
              if ($row2["id"]==$rowGrupo['id']) {
                $formulario.='<div class="input-field col s12" '.$check.'>
                   <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.$row2["nombre_grupo"].'">
                    <label id="caja2" class="active" for="first_name2">Nombre de grupo de Investigacion:</label>  
                  </div>'; 

              }
            }
          

             if($rowsNom[25]=="cod_grupo"){
                if ($rowsRol[25]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='<div id="Divcod_grupo" class="input-field col s6" '.$check.'>
                <input   id="caja"  type="text" class="validate" autocomplete="off" disabled data-length="30" maxlength="30" value="'.$row2["cod_grupo"].'">
                <label  id="caja2" class="active" for="first_name2">Codigo de GrupLAC:</label>
            </div>
                
                ';

             if($rowsNom[26]=="num_sem_bene"){
                if ($rowsRol[26]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divnum_sem_bene" class="input-field col s6" '.$check.'>
                <input   id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="4" maxlength="4" value="'.$row2["num_sem_bene"].'">
                <label  id="caja2" class="active" for="first_name2">Numero de Semilleros Beneficiados:</label>
             </div>
                
                ';

             if($rowsNom[27]=="nomb_sem_bene"){
                if ($rowsRol[27]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divnomb_sem_bene" class="input-field col s12" '.$check.'>
                  <textarea disabled   id="caja"  class="materialize-textarea" data-length="100" maxlength="100">'.$row2["nomb_sem_bene"].'</textarea>
                  <label  id="caja2" for="textarea1">nombres de Semilleros Beneficiados:</label>
             </div>


                ';

             if($rowsNom[28]=="des_meto_pro"){
                if ($rowsRol[28]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divdes_meto_pro"  class="input-field col s12" '.$check.'>
                <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["des_meto_pro"].'</textarea>
                <label  id="caja2" for="textarea1">descripcion de metodologia del proyecto:</label>
            </div>
              
                ';

             if($rowsNom[29]=="num_pro_bene"){
                if ($rowsRol[29]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnum_pro_bene" class="input-field col s6" '.$check.'>
                <input   id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["num_pro_bene"].'">
                <label  id="caja2" class="active" for="first_name2">numero de programa de formacion beneficiado</label>
            </div>
              
                ';

             if($rowsNom[30]=="nom_pro_bene"){
                if ($rowsRol[30]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

           <div id="Divnom_pro_bene" class="input-field col s6" '.$check.'>
                <input   id="caja"  type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["nom_pro_bene"].'">
                <label id="caja2"  class="active" for="first_name2">Nombre de los programas beneficiados</label>
            </div>
              
                ';

             if($rowsNom[31]=="imp_esperado"){
                if ($rowsRol[31]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divimp_esperado" class="input-field col s12" '.$check.'>
                  <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["imp_esperado"].'</textarea>
                <label id="caja2"  class="active" for="first_name2">impacto esperado</label>
            </div>
     
             ';

             if($rowsNom[32]=="num_per_ext"){
                if ($rowsRol[32]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

      <!--<label  style="color:black; float:left;"><b><u>Recursos Humanos:</u></b></label>-->

         ';

             if($rowsNom[32]=="num_per_ext"){
                if ($rowsRol[32]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='
        
            <div id="Divnum_per_ext" class="input-field col s4" '.$check.'>
                <input  id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="3" maxlength="3"  value="'.$row2["num_per_ext"].'">
                <label  id="caja2" class="active" for="first_name2">N° personal externo</label>
            </div>
            
             ';

             if($rowsNom[33]=="nom_apr_ext"){
                if ($rowsRol[33]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divnom_apr_ext" class="input-field col s8" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100"  value="'.$row2["nom_apr_ext"].'">
                <label  id="caja2" class="active" for="first_name2">Nombres y apellidos</label>
            </div>

             ';

             if($rowsNom[34]=="num_iden_ext"){
                if ($rowsRol[34]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divnum_iden_ext"  class="input-field col s12" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100"  value="'.$row2["num_iden_ext"].'">
                <label  id="caja2" class="active" for="first_name2">Numeros de identificacion</label>
            </div>

             ';

             if($rowsNom[35]=="num_pers_int_s"){
                if ($rowsRol[35]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

<div class="input-field col s12" '.$check.'>
  <label class="active" id="sesione">Número de personal interno(Aprendices Sin Contrato de apredizaje)</label>
</div>
            
             ';

             if($rowsNom[35]=="num_pers_int_s"){
                if ($rowsRol[35]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='
            <div id="Divnum_pers_int_s" class="input-field col s4" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="3" maxlength="3" value="'.$row2["num_pers_int_s"].'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno</label>
            </div>

            ';

             if($rowsNom[36]=="nom_ape_int_s"){
                if ($rowsRol[36]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

           <div id="Divnom_ape_int_s" class="input-field col s8" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["nom_ape_int_s"].'">
                <label  id="caja2" class="active" for="first_name2">Nombres y apellidos:</label>
            </div>

            ';

             if($rowsNom[37]=="num_iden_int_s"){
                if ($rowsRol[37]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

           <div id="Divnum_iden_int_s" class="input-field col s12" '.$check.'>
                <input   id="caja"  type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100"  value="'.$row2["num_iden_int_s"].'">
                <label  id="caja2" class="active" for="first_name2">Numeros de Identificacion:</label>
            </div>


            ';

             if($rowsNom[38]=="num_pers_int_c"){
                if ($rowsRol[38]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione">Número de personal interno(Aprendices con Contrato de apredizaje)</label>
</div>      
            ';

             if($rowsNom[38]=="num_pers_int_c"){
                if ($rowsRol[38]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnum_pers_int_c" class="input-field col s12" '.$check.'>
                <input   id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="3" maxlength="3" value="'.$row2["num_pers_int_c"].'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno</label>
            </div>';


if ($_GET['t']=="investigacion ") {
             if($rowsNom[39]=="num_pers_int_cm"){
                if ($rowsRol[39]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            
 $formulario.='<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione">Número de personal interno (Aprendices Con Contrato de monitoria)</label>
</div>    
          ';

             if($rowsNom[39]=="num_pers_int_cm"){
                if ($rowsRol[39]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

           
            <div id="Divnum_pers_int_cm" class="input-field col s12" '.$check.'>
                <input  id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="3" maxlength="3" value="'.$row2["num_pers_int_cm"].'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno </label>
            </div>';
}


             if($rowsNom[40]=="num_pers_int_in"){
                if ($rowsRol[40]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

$formulario.='<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione">(Número de personal interno (Instructores)</label>
</div>    

            ';

             if($rowsNom[40]=="num_pers_int_in"){
                if ($rowsRol[40]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnum_pers_int_in" class="input-field col s12" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="3" maxlength="3" value="'.$row2["num_pers_int_in"].'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno </label>
            </div>
            
             ';

             if($rowsNom[41]=="nom_apellidos"){
                if ($rowsRol[41]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnom_apellidos" class="input-field col s12" '.$check.'>
                  <textarea disabled  id="caja" class="materialize-textarea" data-length="100" maxlength="100">'.$row2["nom_apellidos"].'</textarea>
                  <label  id="caja2" for="textarea1">Nombres y Apellidos</label>
            </div>

             ';

             if($rowsNom[42]=="num_idenficac"){
                if ($rowsRol[42]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnum_idenficac" class="input-field col s12" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["num_idenficac"].'">
                <label id="caja2"  class="active" for="first_name2">numeros de idetificacion</label>
            </div>

             ';

             if($rowsNom[43]=="num_per_int_s"){
                if ($rowsRol[43]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione">Número de personal interno (Otros-TP-TA-SENNOVA)</label>
</div>
            
            ';

             if($rowsNom[43]=="num_per_int_s"){
                if ($rowsRol[43]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnum_per_int_s" class="input-field col s12" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="3" maxlength="3" value="'.$row2["num_per_int_s"].'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno:</label>
            </div>
          
          ';

             if($rowsNom[44]=="nom_apell_pers"){
                if ($rowsRol[44]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnom_apell_pers" class="input-field col s12" '.$check.'>
                  <textarea disabled  id="caja" class="materialize-textarea" type="text" data-length="100" maxlength="100">'.$row2["nom_apell_pers"].'</textarea>
                <label  id="caja2" class="active" for="first_name2">nombres y apellidos</label>
            </div>

              ';

             if($rowsNom[45]=="num_iden_pers"){
                if ($rowsRol[45]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='
      
            <div id="Divnum_iden_pers" class="input-field col s12" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="100" maxlength="100" value="'.$row2["num_iden_pers"].'">
                <label  id="caja2" class="active" for="first_name2">numeros de identificacion</label>
            </div>
            
            ';

             if($rowsNom[46]=="nom_ali_int"){
                if ($rowsRol[46]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='
      
<div class="input-field col s12" '.$check.'>
<label class="active" id="sesione">Aliados Externos y/o Contrapartida</label>
</div>      
           ';

             if($rowsNom[46]=="nom_ali_int"){
                if ($rowsRol[46]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

            <div id="Divnom_ali_int" class="input-field col s12" '.$check.'>
                <input  id="caja" type="text" class="validate" autocomplete="off" disabled data-length="30" maxlength="30"   value="'.$row2["nom_ali_int"].'">
                <label  id="caja2" class="active" for="first_name2">nombre de aliado interno</label>
            </div>

             ';

             if($rowsNom[47]=="nit"){
                if ($rowsRol[47]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='
    
            <div id="Divnit" class="input-field col s6" '.$check.'>
                <input  id="caja" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"  value="'.$row2["nit"].'">
                <label  id="caja2" class="active" for="first_name2">Nit</label>
            </div>
            
            ';

             if($rowsNom[48]=="rec_esp_ent_ext"){
                if ($rowsRol[48]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divrec_esp_ent_ext" class="input-field col s6" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"  value="'.$row2["rec_esp_ent_ext"].'">
                <label id="caja2"  class="active" for="first_name2">Recursos en Especie Entidad Externa ($COP):</label>
            </div>
          
          ';

             if($rowsNom[49]=="rec_din_ent_ext"){
                if ($rowsRol[49]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='
      
           <div id="Divrec_din_ent_ext" class="input-field col s6" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["rec_din_ent_ext"].'">
                <label  id="caja2" class="active" for="first_name2">Recursos en Dinero Entidad Externa($COP):</label>
            </div>
      
             ';

             if($rowsNom[50]=="rec_esp_ent_int"){
                if ($rowsRol[50]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divrec_esp_ent_int" class="input-field col s6" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["rec_esp_ent_int"].'">
                <label class="active" for="first_name2" id="caja2">Recursos en Especie Entidad Interna ($COP):</label>
            </div>
            

             ';

             if($rowsNom[51]=="rec_din_ent_int"){
                if ($rowsRol[51]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divrec_din_ent_int" class="input-field col s6" '.$check.'>
                <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["rec_din_ent_int"].'">
                <label id="caja2"  class="active" for="first_name2">Recursos en Dinero Entidad Interna ($COP):</label>
            </div>
        
              ';

             if($rowsNom[52]=="cui_mun_inf"){
                if ($rowsRol[52]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divcui_mun_inf" class="input-field col s6" '.$check.'>
                  <textarea disabled  id="caja" class="materialize-textarea">'.$row2["cui_mun_inf"].'</textarea>
                <label  id="caja2" class="active" for="first_name2">Ciudades y/o municipios de inlfuencia:</label>
            </div>
      
            ';

             if($rowsNom[53]=="des_ali_obj"){
                if ($rowsRol[53]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

             <div id="Divdes_ali_obj" class="input-field col s12" '.$check.'>
                  <textarea disabled  id="caja" class="materialize-textarea">'.$row2["des_ali_obj"].'</textarea>
                <label  id="caja2" class="active" for="first_name2">Descripción de la alianza y objetivos:</label>
            </div>';
            /*------------------------------RECURSOS SENNOVA---------------------*/
            
             if ($_GET['t']=="investigacion ") {

             if($rowsNom[59]=="ot_se_pe_in"){
                if ($rowsRol[59]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

  $formulario.='<div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">Recursos SENNOVA</label>
              </div>

              ';

             if($rowsNom[59]=="ot_se_pe_in"){
                if ($rowsRol[59]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
              </div>

                          <div id="Divot_se_pe_in" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["ot_se_pe_in"].'"
                              <label id="caja2" class="active" for="first_name2">($COP)</label>
                          </div>
                            
                             ';

                          if($rowsNom[60]=="descripcion1"){
                            if ($rowsRol[60]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion1" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion1"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                         ';

                          if($rowsNom[61]=="se_pe_in"){
                            if ($rowsRol[61]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
              </div>

                            ';

                          if($rowsNom[61]=="se_pe_in"){
                            if ($rowsRol[61]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divse_pe_in" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["se_pe_in"].'"
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                          </div>

                            ';

                          if($rowsNom[62]=="descripcion2"){
                            if ($rowsRol[62]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion2" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion2"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                        
                         ';

                          if($rowsNom[63]=="descripcion2"){
                            if ($rowsRol[63]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
              </div>
                         ';

                          if($rowsNom[63]=="eq_de_si"){
                            if ($rowsRol[63]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div id="Diveq_de_si" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["eq_de_si"].'"
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                        ';

                          if($rowsNom[64]=="descripcion3"){
                            if ($rowsRol[64]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div id="Divdescripcion3" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion3"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom[65]=="sofware"){
                            if ($rowsRol[65]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SOFTWARE</label>
              </div>      
                        ';

                          if($rowsNom[65]=="sofware"){
                            if ($rowsRol[65]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divsofware" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["sofware"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom[66]=="descripcion4"){
                            if ($rowsRol[66]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divdescripcion4" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion4"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>


                           ';

                          if($rowsNom[67]=="maq_ind"){
                            if ($rowsRol[67]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                     
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
              </div>    

                           ';

                          if($rowsNom[67]=="maq_ind"){
                            if ($rowsRol[67]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div id="Divmaq_ind" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["maq_ind"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom[68]=="descripcion5"){
                            if ($rowsRol[68]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
                         <div  id="Divdescripcion5" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion5"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                     ';

                          if($rowsNom[69]=="otr_com_equi"){
                            if ($rowsRol[69]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
              </div>

                         ';

                          if($rowsNom[69]=="otr_com_equi"){
                            if ($rowsRol[69]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div  id="Divotr_com_equi" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["otr_com_equi"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>
                      
                       ';

                          if($rowsNom[70]=="descripcion6"){
                            if ($rowsRol[70]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion6" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion6"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                         ';

                          if($rowsNom[71]=="ma_pa_for"){
                            if ($rowsRol[71]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
              </div>
                         ';

                          if($rowsNom[71]=="ma_pa_for"){
                            if ($rowsRol[71]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div  id="Divma_pa_for" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ma_pa_for"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>  
                             ';

                          if($rowsNom[72]=="descripcion7"){
                            if ($rowsRol[72]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                    
                         <div  id="Divdescripcion7" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion7"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
                           ';

                          if($rowsNom[73]=="man_maq_equ"){
                            if ($rowsRol[73]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
              </div>
                         ';

                          if($rowsNom[73]=="man_maq_equ"){
                            if ($rowsRol[73]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divman_maq_equ" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["man_maq_equ"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                         ';

                          if($rowsNom[74]=="descripcion8"){
                            if ($rowsRol[74]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdescripcion8" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion8"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom[75]=="descripcion9"){
                            if ($rowsRol[75]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
              </div>    
                         ';

                          if($rowsNom[75]=="descripcion9"){
                            if ($rowsRol[75]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divot_com_tra"  class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_com_tra"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>

                           ';

                          if($rowsNom[76]=="descripcion9"){
                            if ($rowsRol[76]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                         <div  id="Divdescripcion9" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion9"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom[77]=="ot_gast_imp"){
                            if ($rowsRol[77]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
              </div>

                           ';

                          if($rowsNom[77]=="ot_gast_imp"){
                            if ($rowsRol[77]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divot_gast_imp" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_gast_imp"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                          ';

                          if($rowsNom[78]=="descripcion10"){
                            if ($rowsRol[78]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion10" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion10"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom[79]=="div_act"){
                            if ($rowsRol[79]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
              </div>
                           ';

                          if($rowsNom[79]=="div_act"){
                            if ($rowsRol[79]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                
                           <div  id="Divdiv_act" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["div_act"].'">
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                            </div>
                            
                            ';

                          if($rowsNom[80]=="descripcion11"){
                            if ($rowsRol[80]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                           <div  id="Divdescripcion11" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion11"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom[81]=="via_gast_int"){
                            if ($rowsRol[81]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
              </div>
                         ';

                          if($rowsNom[81]=="via_gast_int"){
                            if ($rowsRol[81]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divvia_gast_int" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["via_gast_int"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                          ';

                          if($rowsNom[82]=="descripcion12"){
                            if ($rowsRol[82]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divdescripcion12" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion12"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                          ';

                          if($rowsNom[83]=="gast_bien"){
                            if ($rowsRol[83]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label  class="active" id="sesione">GASTOS BIENESTAR ALUMNOS</label>
              </div>      
                        ';

                          if($rowsNom[83]=="gast_bien"){
                            if ($rowsRol[83]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


                          <div id="Divgast_bien"  class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["gast_bien"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                        ';

                          if($rowsNom[84]=="descripcion13"){
                            if ($rowsRol[84]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion13" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion13"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom[85]=="ade_cons"){
                            if ($rowsRol[85]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
              </div>      
                         ';

                          if($rowsNom[85]=="ade_cons"){
                            if ($rowsRol[85]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                  
                          <div  id="Divade_cons" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ade_cons"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>


                         ';

                          if($rowsNom[86]=="descripcion14"){
                            if ($rowsRol[86]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdescripcion14" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion14"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                          ';

                          if($rowsNom[87]=="monitores"){
                            if ($rowsRol[87]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MONITORES</label>
              </div>      
                        ';

                          if($rowsNom[87]=="monitores"){
                            if ($rowsRol[87]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divmonitores"  class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["monitores"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                          ';

                          if($rowsNom[88]=="descripcion15"){
                            if ($rowsRol[88]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


                    
                          <div  id="Divdescripcion15" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion15"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                          ';

                          if($rowsNom[56]=="LinkCvlac"){
                            if ($rowsRol[56]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


                <div id="DivCvla" class="input-field col s12" '.$check.'>
                      <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["LinkCvlac"].'</textarea>
                      <label id="caja2" for="textarea1">Link Cvlac</label>
                </div>
            ';

 
}elseif($_GET['t']=="innovacion "){


             if($rowsNom2[59]=="ot_se_pe_in"){
                if ($rowsRol2[59]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

  $formulario.='<div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">Recursos SENNOVA</label>
              </div>

              ';

             if($rowsNom2[59]=="ot_se_pe_in"){
                if ($rowsRol2[59]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
              </div>

                          <div id="Divot_se_pe_in" class="input-field col s6">
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["ot_se_pe_in"].'"
                              <label id="caja2" class="active" for="first_name2">($COP)</label>
                          </div>
                            
                             ';

                          if($rowsNom2[60]=="descripcion1"){
                            if ($rowsRol2[60]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion1" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion1"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                         ';

                          if($rowsNom2[61]=="se_pe_in"){
                            if ($rowsRol2[61]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
              </div>

                            ';

                          if($rowsNom2[61]=="se_pe_in"){
                            if ($rowsRol2[61]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divse_pe_in" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["se_pe_in"].'"
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                          </div>

                            ';

                          if($rowsNom2[62]=="descripcion2"){
                            if ($rowsRol2[62]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion2" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion2"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                        
                         ';

                          if($rowsNom2[63]=="descripcion2"){
                            if ($rowsRol2[63]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
              </div>
                         ';

                          if($rowsNom2[63]=="eq_de_si"){
                            if ($rowsRol2[63]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div id="Diveq_de_si" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["eq_de_si"].'"
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                        ';

                          if($rowsNom2[64]=="descripcion3"){
                            if ($rowsRol2[64]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div id="Divdescripcion3" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion3"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[65]=="sofware"){
                            if ($rowsRol2[65]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SOFTWARE</label>
              </div>      
                        ';

                          if($rowsNom2[65]=="sofware"){
                            if ($rowsRol2[65]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divsofware" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["sofware"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[66]=="descripcion4"){
                            if ($rowsRol2[66]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divdescripcion4" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion4"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>


                           ';

                          if($rowsNom2[67]=="maq_ind"){
                            if ($rowsRol2[67]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                     
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
              </div>    

                           ';

                          if($rowsNom2[67]=="maq_ind"){
                            if ($rowsRol2[67]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div id="Divmaq_ind" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["maq_ind"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[68]=="descripcion5"){
                            if ($rowsRol2[68]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
                         <div  id="Divdescripcion5" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion5"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                     ';

                          if($rowsNom2[69]=="otr_com_equi"){
                            if ($rowsRol2[69]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
              </div>

                         ';

                          if($rowsNom2[69]=="otr_com_equi"){
                            if ($rowsRol2[69]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div  id="Divotr_com_equi" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["otr_com_equi"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>
                      
                       ';

                          if($rowsNom2[70]=="descripcion6"){
                            if ($rowsRol2[70]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion6" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion6"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                         ';

                          if($rowsNom2[71]=="ma_pa_for"){
                            if ($rowsRol2[71]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
              </div>
                         ';

                          if($rowsNom2[71]=="ma_pa_for"){
                            if ($rowsRol2[71]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div  id="Divma_pa_for" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ma_pa_for"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>  
                             ';

                          if($rowsNom2[72]=="descripcion7"){
                            if ($rowsRol2[72]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                    
                         <div  id="Divdescripcion7" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion7"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
                           ';

                          if($rowsNom2[73]=="man_maq_equ"){
                            if ($rowsRol2[73]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
              </div>
                         ';

                          if($rowsNom2[73]=="man_maq_equ"){
                            if ($rowsRol2[73]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divman_maq_equ" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["man_maq_equ"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                         ';

                          if($rowsNom2[74]=="descripcion8"){
                            if ($rowsRol2[74]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdescripcion8" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion8"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[75]=="descripcion9"){
                            if ($rowsRol2[75]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
              </div>    
                         ';

                          if($rowsNom2[75]=="descripcion9"){
                            if ($rowsRol2[75]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divot_com_tra"  class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_com_tra"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[76]=="descripcion9"){
                            if ($rowsRol2[76]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                         <div  id="Divdescripcion9" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion9"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[77]=="ot_gast_imp"){
                            if ($rowsRol2[77]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
              </div>

                           ';

                          if($rowsNom2[77]=="ot_gast_imp"){
                            if ($rowsRol2[77]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divot_gast_imp" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_gast_imp"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                          ';

                          if($rowsNom2[78]=="descripcion10"){
                            if ($rowsRol2[78]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion10" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion10"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[79]=="div_act"){
                            if ($rowsRol2[79]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
              </div>
                           ';

                          if($rowsNom2[79]=="div_act"){
                            if ($rowsRol2[79]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                
                           <div  id="Divdiv_act" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["div_act"].'">
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                            </div>
                            
                            ';

                          if($rowsNom2[80]=="descripcion11"){
                            if ($rowsRol2[80]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                           <div  id="Divdescripcion11" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion11"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[81]=="via_gast_int"){
                            if ($rowsRol2[81]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
              </div>
                         ';

                          if($rowsNom2[81]=="via_gast_int"){
                            if ($rowsRol2[81]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divvia_gast_int" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["via_gast_int"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                          ';

                          if($rowsNom2[82]=="descripcion12"){
                            if ($rowsRol2[82]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divdescripcion12" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion12"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                          ';

                          if($rowsNom2[83]=="gast_bien"){
                            if ($rowsRol2[83]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label  class="active" id="sesione">GASTOS BIENESTAR ALUMNOS</label>
              </div>      
                        ';

                          if($rowsNom2[83]=="gast_bien"){
                            if ($rowsRol2[83]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


                          <div id="Divgast_bien"  class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["gast_bien"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                        ';

                          if($rowsNom2[84]=="descripcion13"){
                            if ($rowsRol2[84]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion13" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion13"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[85]=="ade_cons"){
                            if ($rowsRol2[85]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
              </div>      
                         ';

                          if($rowsNom2[85]=="ade_cons"){
                            if ($rowsRol2[85]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                  
                          <div  id="Divade_cons" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ade_cons"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>


                         ';

                          if($rowsNom2[86]=="descripcion14"){
                            if ($rowsRol2[86]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdescripcion14" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion14"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                          ';


                          if($rowsNom2[56]=="LinkCvlac"){
                            if ($rowsRol2[56]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


                <div id="DivCvla" class="input-field col s12" '.$check.'>
                      <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["LinkCvlac"].'</textarea>
                      <label id="caja2" for="textarea1">Link Cvlac</label>
                </div>
            ';

}elseif($_GET['t']=="servicios "){
              if($rowsNom2[134]=="ser_per_ind"){
                if ($rowsRol2[134]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

  $formulario.='<div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">Recursos SENNOVA</label>
              </div>

              ';

             if($rowsNom2[134]=="ser_per_ind"){
                if ($rowsRol2[134]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
              </div>

                          <div id="Divser_per_ind" class="input-field col s6">
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["ser_per_ind"].'"
                              <label id="caja2" class="active" for="first_name2">($COP)</label>
                          </div>
                            
                             ';

                          if($rowsNom2[135]=="descripcion1"){
                            if ($rowsRol2[135]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion1" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion1"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                         ';

                          if($rowsNom2[136]=="equ_sis"){
                            if ($rowsRol2[136]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
              </div>

                            ';

                          if($rowsNom2[136]=="equ_sis"){
                            if ($rowsRol2[136]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divequ_sis" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["equ_sis"].'"
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                          </div>

                            ';

                          if($rowsNom2[137]=="descripcion2"){
                            if ($rowsRol2[137]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion2" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion2"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                        
                         ';

                          if($rowsNom2[138]=="software"){
                            if ($rowsRol2[138]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
              </div>
                         ';

                          if($rowsNom2[138]=="software"){
                            if ($rowsRol2[138]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div id="Divsoftware" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["software"].'"
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                        ';

                          if($rowsNom2[139]=="descripcion3"){
                            if ($rowsRol2[139]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div id="Divdescripcion3" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion3"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[140]=="maq_ind"){
                            if ($rowsRol2[140]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SOFTWARE</label>
              </div>      
                        ';

                          if($rowsNom2[140]=="maq_ind"){
                            if ($rowsRol2[140]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divmaq_ind" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["maq_ind"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[141]=="descripcion4"){
                            if ($rowsRol2[141]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divdescripcion4" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion4"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>


                           ';

                          if($rowsNom2[142]=="otra_com_equi"){
                            if ($rowsRol2[142]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                     
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
              </div>    

                           ';

                          if($rowsNom2[142]=="otra_com_equi"){
                            if ($rowsRol2[142]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div id="Divotra_com_equi" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["otra_com_equi"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[143]=="descripcion5"){
                            if ($rowsRol2[143]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
                         <div  id="Divdescripcion5" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion5"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                     ';

                          if($rowsNom2[144]=="mat_for_pro"){
                            if ($rowsRol2[144]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
              </div>

                         ';

                          if($rowsNom2[144]=="mat_for_pro"){
                            if ($rowsRol2[144]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div  id="Divmat_for_pro" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["mat_for_pro"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>
                      
                       ';

                          if($rowsNom2[145]=="descripcion6"){
                            if ($rowsRol2[145]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion6" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion6"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                         ';

                          if($rowsNom2[146]=="man_maq_equ"){
                            if ($rowsRol2[146]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
              </div>
                         ';

                          if($rowsNom2[146]=="man_maq_equ"){
                            if ($rowsRol2[146]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div  id="Divman_maq_equ" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["man_maq_equ"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>  
                             ';

                          if($rowsNom2[147]=="descripcion7"){
                            if ($rowsRol2[147]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                    
                         <div  id="Divdescripcion7" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion7"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
                           ';

                          if($rowsNom2[148]=="ot_com_tra"){
                            if ($rowsRol2[148]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
              </div>
                         ';

                          if($rowsNom2[148]=="ot_com_tra"){
                            if ($rowsRol2[148]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divot_com_tra" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_com_tra"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                         ';

                          if($rowsNom2[149]=="descripcion8"){
                            if ($rowsRol2[149]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdescripcion8" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion8"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[150]=="ot_gast_imp"){
                            if ($rowsRol2[150]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
              </div>    
                         ';

                          if($rowsNom2[150]=="ot_gast_imp"){
                            if ($rowsRol2[150]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divot_gast_imp"  class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_gast_imp"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[151]=="descripcion9"){
                            if ($rowsRol2[151]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                         <div  id="Divdescripcion9" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion9"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[152]=="div_act"){
                            if ($rowsRol2[152]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
              </div>

                           ';

                          if($rowsNom2[152]=="div_act"){
                            if ($rowsRol2[152]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdiv_act" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["div_act"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                          ';

                          if($rowsNom2[153]=="descripcion10"){
                            if ($rowsRol2[153]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion10" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion10"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[154]=="via_gast_int"){
                            if ($rowsRol2[154]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
              </div>
                           ';

                          if($rowsNom2[154]=="via_gast_int"){
                            if ($rowsRol2[154]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                
                           <div  id="Divvia_gast_int" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["via_gast_int"].'">
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                            </div>
                            
                            ';

                          if($rowsNom2[155]=="descripcion11"){
                            if ($rowsRol2[155]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                           <div  id="Divdescripcion11" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion11"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[156]=="ade_cont"){
                            if ($rowsRol2[156]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
              </div>
                         ';

                          if($rowsNom2[156]=="ade_cont"){
                            if ($rowsRol2[156]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divade_cont" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ade_cont"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                          ';

                          if($rowsNom2[157]=="descripcion12"){
                            if ($rowsRol2[157]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divdescripcion12" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion12"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                            <div id="DivCvla" class="input-field col s12" '.$check.'>
                                  <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["LinkCvlac"].'</textarea>
                                  <label id="caja2" for="textarea1">Link Cvlac</label>
                            </div>
                

                          ';

//echo $formulario;
}elseif($_GET['t']=="modernizacion "){
 if($rowsNom2[165]=="equi_sis"){
                if ($rowsRol2[165]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

  $formulario.='<div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">Recursos SENNOVA</label>
              </div>

              ';

             if($rowsNom2[165]=="equi_sis"){
                if ($rowsRol2[165]=="S") {
                  $check="style='display: block;'";
                }else{
                  $check="style='display: none;'";
                }
              }
            

             $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">EQUIPO DE SISTEMAS</label>
              </div>

                          <div id="Divequi_sis" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["equi_sis"].'</textarea>
                                <label id="caja2" for="textarea1">($COP)</label>
                          </div>

                            
                             ';

                          if($rowsNom2[166]=="descripcion1"){
                            if ($rowsRol2[166]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion1" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion1"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                         ';

                          if($rowsNom2[167]=="software"){
                            if ($rowsRol2[167]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">SOFTWARE</label>
              </div>

                            ';

                          if($rowsNom2[167]=="software"){
                            if ($rowsRol2[167]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divsoftware" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["software"].'"
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                          </div>

                            ';

                          if($rowsNom2[168]=="descripcion2"){
                            if ($rowsRol2[168]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div id="Divdescripcion2" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion2"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                        
                         ';

                          if($rowsNom2[169]=="maq_ind"){
                            if ($rowsRol2[169]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
              <label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
              </div>
                         ';

                          if($rowsNom2[169]=="maq_ind"){
                            if ($rowsRol2[169]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div id="Divmaq_ind" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8"value="'.$row2["maq_ind"].'"
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                        ';

                          if($rowsNom2[170]=="descripcion3"){
                            if ($rowsRol2[170]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div id="Divdescripcion3" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion3"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                          if($rowsNom2[171]=="otr_com_equ"){
                            if ($rowsRol2[171]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
              <div class="input-field col s12" '.$check.'>
                <label class="active" id="sesione">OTRAS COMPRAS DE EQUIPO</label>
              </div>      
                        ';

                          if($rowsNom2[171]=="otr_com_equ"){
                            if ($rowsRol2[171]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divotr_com_equ" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["otr_com_equ"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[172]=="descripcion4"){
                            if ($rowsRol2[172]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div id="Divdescripcion4" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion4"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>


                           ';

                          if($rowsNom2[173]=="maq_for_pro"){
                            if ($rowsRol2[173]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                     
              <div class="input-field col s12" '.$check.'>
                <label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
                  </div>    

                           ';

                          if($rowsNom2[173]=="maq_for_pro"){
                            if ($rowsRol2[173]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div id="Divmaq_for_pro" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["maq_for_pro"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                           ';

                          if($rowsNom2[174]=="descripcion5"){
                            if ($rowsRol2[174]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
                         <div  id="Divdescripcion5" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion5"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                     ';

                          if($rowsNom2[175]=="man_maq_equi"){
                            if ($rowsRol2[175]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 
                    
              <div class="input-field col s12" '.$check.'>
                <label class="active" id="sesione">ANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFTWARE</label>
              </div>

                         ';

                          if($rowsNom2[175]=="man_maq_equi"){
                            if ($rowsRol2[175]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.=' 

                          <div  id="Divman_maq_equi" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["man_maq_equi"].'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>
                      
                       ';

                          if($rowsNom2[176]=="descripcion6"){
                            if ($rowsRol2[176]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                         <div  id="Divdescripcion6" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion6"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                         ';

                          if($rowsNom2[177]=="otra_com_tran"){
                            if ($rowsRol2[177]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

              <div class="input-field col s12" '.$check.'>
                <label class="active" id="sesione">OTRAS COMUNICACIONES Y TRANPORTE<label>
              </div>
                         ';

                          if($rowsNom2[177]=="otra_com_tran"){
                            if ($rowsRol2[177]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                          <div  id="Divotra_com_tran" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["otra_com_tran"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>  
                             ';

                          if($rowsNom2[178]=="descripcion7"){
                            if ($rowsRol2[178]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                    
                         <div  id="Divdescripcion7" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion7"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
                           ';

                          if($rowsNom2[179]=="ade_cons"){
                            if ($rowsRol2[179]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
              <div class="input-field col s12" '.$check.'>
                <label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
              </div>
                         ';

                          if($rowsNom2[179]=="ade_cons"){
                            if ($rowsRol2[179]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='
                    
                          <div  id="Divade_cons" class="input-field col s6" '.$check.'>
                              <input  id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ade_cons"].'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                        
                         ';

                          if($rowsNom2[180]=="descripcion8"){
                            if ($rowsRol2[180]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='

                          <div  id="Divdescripcion8" class="input-field col s12" '.$check.'>
                                <textarea disabled  id="caja" class="materialize-textarea">'.$row2["descripcion8"].'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

                           ';

                            if($rowsNom[56]=="LinkCvlac"){
                            if ($rowsRol[56]=="S") {
                              $check="style='display: block;'";
                            }else{
                              $check="style='display: none;'";
                            }
                          }
                        

                         $formulario.='


                <div id="DivCvla" class="input-field col s12" '.$check.'>
                      <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["LinkCvlac"].'</textarea>
                      <label id="caja2" for="textarea1">Link Cvlac</label>
                </div>
            ';


}elseif($_GET['t']=="divulgacion "){
  if($rowsNom2[181]=="se_pe_in"){
if ($rowsRol2[181]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='<div class="input-field col s12" '.$check.'>

<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

';

if($rowsNom2[181]=="se_pe_in"){
if ($rowsRol2[181]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

<div class="input-field col s12" '.$check.'>

<label class="active" id="sesione">SERVICIOS PERSONAL INDIRECTOS</label>
</div>

';

if($rowsNom2[181]=="se_pe_in"){
if ($rowsRol2[181]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divse_pe_in" class="input-field col s6" '.$check.'>

                <input    id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["se_pe_in"].'">
                <label id="caja2"class="active" for="first_name2">($COP)</label>
            </div>

';

if($rowsNom2[182]=="descripcion1"){
if ($rowsRol2[182]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divdescripcion1" class="input-field col s12" '.$check.'>

                  <textarea disabled    id="caja"  class="materialize-textarea">'.$row2["descripcion1"].'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>

';

if($rowsNom2[183]=="ma_pa_for"){
if ($rowsRol2[183]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

<div class="input-field col s12" '.$check.'>

<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>

';

if($rowsNom2[183]=="ma_pa_for"){
if ($rowsRol2[183]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divma_pa_for" class="input-field col s6" '.$check.'>

                <input    id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ma_pa_for"].'">
                <label id="caja2"class="active" for="first_name2">($COP): </label>
            </div>

';

if($rowsNom2[184]=="descripcion2"){
if ($rowsRol2[184]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divdescripcion2" class="input-field col s12" '.$check.'>

                  <textarea disabled     id="caja" class="materialize-textarea">'.$row2["descripcion2"].'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>

';

if($rowsNom2[185]=="ot_gast_imp"){
if ($rowsRol2[185]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

<div class="input-field col s12" '.$check.'>

<label class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
</div>
 
';

if($rowsNom2[185]=="ot_gast_imp"){
if ($rowsRol2[185]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divot_gast_imp" class="input-field col s6" '.$check.'>

                <input    id="caja"  type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["ot_gast_imp"].'">
                <label id="caja2"class="active" for="first_name2">($COP):</label>
            </div>

';

if($rowsNom2[186]=="descripcion3"){
if ($rowsRol2[186]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='      

           <div id="Divdescripcion3" class="input-field col s12" '.$check.'>

                  <textarea disabled     id="caja" class="materialize-textarea">'.$row2["descripcion3"].'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>

';

if($rowsNom2[187]=="di_ac_ge_in"){
if ($rowsRol2[187]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='    

<div class="input-field col s12" '.$check.'>

<label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONAL</label>
</div>

';

if($rowsNom2[187]=="di_ac_ge_in"){
if ($rowsRol2[187]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divdi_ac_ge_in" class="input-field col s6" '.$check.'>

                <input    id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["di_ac_ge_in"].'">
                <label id="caja2"class="active" for="first_name2">($COP):</label>
            </div>

';

if($rowsNom2[188]=="descripcion4"){
if ($rowsRol2[188]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divdescripcion4" class="input-field col s12" '.$check.'>

                  <textarea disabled    id="caja" class="materialize-textarea">'.$row2["descripcion4"].'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>
 
 ';

if($rowsNom2[189]=="via_gast_int"){
if ($rowsRol2[189]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

<div class="input-field col s12" '.$check.'>

<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>

';

if($rowsNom2[189]=="via_gast_int"){
if ($rowsRol2[189]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="Divvia_gast_int" class="input-field col s6" '.$check.'>

                <input    id="caja" type="number" class="validate" autocomplete="off" disabled data-length="8" maxlength="8" value="'.$row2["via_gast_int"].'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>

';

if($rowsNom2[190]=="descripcion5"){
if ($rowsRol2[190]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

      
           <div id="Divdescripcion5" class="input-field col s12" '.$check.'>

                  <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["descripcion5"].'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>

';

if($rowsNom[56]=="LinkCvlac"){
if ($rowsRol[56]=="S") {
$check="style='display: block;'";
}else{
$check="style='display: none;'";
}
}


$formulario.='

            <div id="DivCvla"  class="input-field col s12" '.$check.'>

                  <textarea disabled   id="caja"  class="materialize-textarea">'.$row2["LinkCvlac"].'</textarea>
                  <label id="caja2" for="textarea1">Link Cvlac</label>
            </div>';
            


            //echo $formulario;
        }

      }
      }else{
       echo "no hay información para mostrar";
      }


?>
 <!--//////////////////////////////////ESPACIO DE LOS OBJETIVOS GENERALES Y PRODUCTOS////////////////-->
  <?php
      $consulta2 = "SELECT * from opr where cod_pro=".$_GET['c']."";
      if($result2 = $conexion->query($consulta2)){
        $formulario.=' 
        <table>
        <thead>
        <th>Objetivos</th>
        <th>Resultados</th>
        <th>Productos</th>
        </thead>
        </tbody>';
        $i=1;
        while($row21 = mysqli_fetch_array($result2)){
        $formulario.='
        <tr>

       <td>
         <div class="input-field col s12">
          <textarea disabled  disabled id="caja"  class="materialize-textarea">'.$row21["objetivo"].'</textarea>
          <label id="caja2" for="textarea1">Objetivo'.$i.'</label>
          </div>
        </td>

        <td>
        <div class="input-field col s12">
        <textarea disabled  disabled id="caja"  class="materialize-textarea">'.$row21["resultado"].'</textarea>
        <label id="caja2" for="textarea1">Resultado'.$i.'</label>
        </div>
        </td>

        <td>
        <div class="input-field col s12">
        <textarea disabled  disabled id="caja"  class="materialize-textarea">'.$row21["producto"].'</textarea>
        <label id="caja2" for="textarea1">Producto'.$i.'</label>
        </div>
        </td>';


        $i++;
        }
$formulario.="</tbody></table>";

      }
        // echo $formulario;  
      echo $formulario;
   ?>
<!--/////////////////////////////////ESPACIO DE ESTADO//////////////////////////-->
<!--/////////////////////////////////ESPACIO DE ESTADO//////////////////////////-->

     <?php  
     $tabla=$_GET['t'];
     $codigo=$_GET['c'];

        if ($estado=="Aprobado") {
         $va="checked";
        }elseif($estado=="Reprobado"){
         $va="11";
        }elseif($estado=="Proceso"){
         $va="11";
         }

         if ($tabla=="investigacion ") {
           $tabl=1;
         }elseif($tabla=="innovacion "){
           $tabl=2;
         }elseif($tabla=="servicios "){
           $tabl=3;
         }elseif($tabla=="modernizacion "){
           $tabl=4;
         }elseif($tabla=="divulgacion "){
           $tabl=5;
         }

         

  if($_SESSION['cargo']=="Administrador"){ 
      
 echo $e=' <div class="input-field col s12">

        </div>
         <div class="input-field col s6">
        <input type="date" id="fecha" value='.$envio.'>
        <button class="btn tooltipped green text-darken-2" target="_blank" data-position="top" data-delay="50" data-tooltip="Cambiar fecha de Envio" onclick="camFecEnvAdmi('.$codigo.', '.$tabl.')">Cambiar</button>

        <a id="op" class="btn tooltipped green text-darken-2" target="_blank" data-position="top" data-delay="50" data-tooltip="Asignar proyecto a otra persona" href="#modal1">Asignar proyecto</a>

         </div>
 <div class="input-field col s12">
 <div class="switch right">
      <label>
          Pasar a Banco de Proyectos
        <input type="checkbox" '.$va.' id="esta" onclick="estado(this.checked , '.$codigo.', '.$tabl.')">
        <span class="lever" ></span>
        Aprobar Proyecto
        </label>
        
    </div>
  
   <br><br><br>
</div>
      ';


     }
    ?>



  <div id="modal1" class="modal modal-fixed-footer" style="height:800px;">
    <div class="modal-content">


        <div class="input-field col s6">
              <select  id="AsignarP" onchange="AsignarPr(this.value, <?php echo $codigo ?>, <?php echo $line ?>)">
              <option value="" disabled selected>Seleccione:</option>
              <OPTION VALUE="1">Aprendices</OPTION>
              <OPTION VALUE="2">Instructores</OPTION>
             </select>
              <label>Seleccione el Tipo de listado</label>
        </div>

        <div class="input-field col s6">
          <div id="resultlis"></div>
        </div>

  </div>
   <div class="modal-footer">
      <button class=" modal-action modal-close waves-effect waves-green btn-flat" >Cerrar</button>
    </div>
  </div>
      

<section>

    </div>
</div>
</div>      
<script type="text/javascript">


  function estado( valor, codigo, tabla ) {
   $.ajax({
    url: "php/CambEsta.php",
       data: {        
          ValoEst : valor,
          tablaEst : tabla,
          codigoEst : codigo
             },
        type: "POST",
       success: function(response){
/*        alert(response)
*/          if (response==1){
            alertify.success('Proyecto Aprobado');
          }else if(response==2){
            alertify.error('Error al Aprobar Proyecto');
          }else if(response==3){
            alertify.success('Proyecto Reprobado');
          }else if(response==4){
            alertify.error('Error al Reprobar Proyecto');
          };
          location.reload(true);  
        }

    });
  }

  function AsignarPr(valor, codigo, linea){
 $.ajax({
    
      url: "php/AsignarPro.php",
      data: {

            valor: valor,
            codigo: codigo,
            linea: linea
                      
            },
      type: "POST",

            beforeSend: function () {
             $("#resultlis").html('<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>');
            },
            success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    $("#resultlis").html(response);
            }
      
        });
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
    $(".modal").modal();
    });
    $(document).ready(function(){
    $(".collapsible").collapsible();
    });

    $(document).ready(function() {
    $("select").material_select();
    });
</script>

</body>
</html>
             
             