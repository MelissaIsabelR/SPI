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
    <link type="text/css" rel="stylesheet" href="css/ico.css"  media="screen,projection"/>
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
     <link rel="stylesheet" type="text/css" href="css/icon.css">
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
      $consulta = "SELECT * from  ".$_GET['t']."
      INNER JOIN grupo ON  ".$_GET['t'].".nom_gru_inv=grupo.id
      INNER JOIN region ON   ".$_GET['t'].".pro_region=region.id_region
      INNER JOIN centro ON   ".$_GET['t'].".pro_centro=centro.codigo
      WHERE ".$_GET['t'].".codigo= ".$_GET['c']."";

      if($result = $conexion->query($consulta)){
      while($row2 = mysqli_fetch_array($result)){ 
        $estado=$row2["estado"];
        $anexo=$row2["anexo"];
               $formulario='
    <BR><BR>
  <H5 style="text-align:center;">Registro de Proyecto '.$_GET['t'].'</H5>
<div class="input-field col s12">
<label class="active"  style="font-size:15px; text-align:center; color:black;">El estado de este proyecto es: '.$estado.'</label><br>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">Información de Centro Proponente:</label>
</div>

           <br>
           <div style="display: none;" class="input-field col s6">
              <input id="identificacion" type="text" class="validate" value="'.$_SESSION["user_id"].'">
              <label class="active" for="first_name2">Identificacion</label>  
           </div> 

              <div class="input-field col s6">
                <input disabled id="caja" id="pro_region" type="text" class="validate" data-length="30" maxlength="30" value="'.utf8_encode($row2["nombre_region"]).'">
                <label id="caja2" class="active" for="first_name2">Region</label>  
             </div> 

               <div class="input-field col s12">
                <input disabled id="caja" type="text" class="validate"  value="'.utf8_encode($row2["nombre_centro"]).'">
                <label id="caja2" class="active" for="first_name2">centro</label>  
             </div>

          
             <div class="input-field col s6">
                <input disabled id="caja" type="text" class="validate" data-length="30" maxlength="30" value="'.utf8_encode($row2["nom_sub"]).'">
                <label id="caja2" class="active" for="first_name2">Nombre del Subdirector</label>  
             </div> 


             <div class="input-field col s6">
                <input disabled id="caja" type="text" class="validate" data-length="30" maxlength="30" value="'.utf8_encode($row2["ema_sub"]).'">
                <label id="caja2" class="active" for="first_name2">Email subdirector</label>  
             </div> 

             <div class="input-field col s6">
                <input disabled id="caja" type="text" class="validate" data-length="15" maxlength="15" value="'.utf8_encode($row2["num_cel_sub"]).'">
                <label id="caja2" class="active" for="first_name2">Numero de Celular de Subdirector(a):</label>  
             </div> 

             <div class="input-field col s6">
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["pro_autores"]).'">
                <label id="caja2" class="active" for="first_name2">Autores del Proyecto</label>  
             </div> 

             <div class="input-field col s6" >
                <input disabled id="caja" type="text" class="validate" data-length="30" maxlength="30"  value="'.utf8_encode($row2["nom_rad_pro"]).'">
                <label id="caja2" class="active" for="first_name2">Nombre de quien radica el Proyecto</label>  
            </div> 

            <div class="input-field col s6" >
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100"  value="'.utf8_encode($row2["num_identi"]).'">
                <label id="caja2" class="active" for="first_name2">numeros de identificacion</label>
            </div> 
            
            <div class="input-field col s6">
                <input disabled id="caja" type="text" class="validate" data-length="30" maxlength="30"  value="'.utf8_encode($row2["ema_rad_pro"]).'">
                <label id="caja2" class="active" for="first_name2">Email</label>  
            </div> 

      
            <div class="input-field col s6">
                <input disabled id="caja" type="text" class="validate" data-length="50" maxlength="50"  value="'.utf8_encode($row2["Cel_rad_pro"]).'">
                <label id="caja2" class="active" for="first_name2">Numeros de Celular</label>  
            </div> 
           
            <!--////////////////informacion del proyecto//////////////////-->
<div class="input-field col s12">
<label class="active" id="sesione" >Información del Proyecto</label>
</div>

    
           <div class="input-field col s12">
                <input disabled id="caja"  type="text" class="validate" data-length="50" maxlength="50" value="'.utf8_encode($row2["titulo_pro"]).'">
                <label id="caja2" class="active" for="first_name2">Titulo</label>  
            </div> 
 

           <div class="input-field col s6">
              <input disabled id="caja"  type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["area_con_1"]).'">
              <label id="caja2" class="active" for="first_name2">Area de Conocimiento No. 1:</label>  
           </div> 
      
      
            <div class="input-field col s6">
              <input disabled id="caja"  type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["area_con_2"]).'">
              <label id="caja2" class="active" for="first_name2">Area de Conocimiento No. 2:</label>  
            </div> 
           
           <div class="input-field col s6">
              <input disabled id="caja"  type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["apli_posconf"]).'">
              <label id="caja2" class="active" for="first_name2">Aplica al posconflicto:</label>  
            </div> 

      
            <div class="input-field col s6">
                  <textarea disabled id="caja"  class="materialize-textarea" data-length="100" maxlength="100">'.utf8_encode($row2["muni_impact"]).'</textarea>
                  <label id="caja2" for="textarea1">Municipios a Impactar</label>
            </div>
       
       
            <div class="input-field col s6">
                  <textarea disabled id="caja"  class="materialize-textarea" data-length="100" maxlength="100">'.utf8_encode($row2["des_estra"]).'</textarea>
                  <label id="caja2" for="textarea1">Descripcion de Extrategias</label>
            </div>
    
            <div class="input-field col s6">
                <input disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["recu_poscof"]).'">
                <label id="caja2" class="active" for="first_name2">Cuenta con rescursos de postconficto:$(COP):</label>
            </div>
       
            <div class="input-field col s12">
                  <textarea disabled id="caja"  class="materialize-textarea" >'.utf8_encode($row2["ante_just_pro"]).'</textarea>
                  <label id="caja2" for="textarea1">Antecedentes y Justificacion del proyecto:</label>
            </div>


            <div class="input-field col s12">
                  <textarea disabled id="caja"  class="materialize-textarea" >'.utf8_encode($row2["plan_pro_nec"]).'</textarea>
                  <label id="caja2" for="textarea1">Plantemiento del problema y/o necesidades</label>
            </div>

    
            <div class="input-field col s6">
                <input disabled id="caja"  type="date" class="validate" value="'.$row2["fech_ini_pro"].'">
                <label id="caja2" class="active" for="first_name2">Fecha de Inicio del Proyecto:</label>
            </div>
      
            <div class="input-field col s6">
                <input disabled id="caja" type="date" class="validate" value="'.$row2["fech_fin_pro"].'">
                <label id="caja2" class="active" for="first_name2">Fecha de fin del Proyecto:</label>
            </div>


             <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["nombre_grupo"]).'</textarea>
                  <label id="caja2" for="textarea1">Nombre de grupo de Investigacion</label>
            </div>

       
             <div class="input-field col s6">
                <input  disabled id="caja"  type="text" class="validate" data-length="30" maxlength="30" value="'.utf8_encode($row2["cod_grupo"]).'">
                <label  id="caja2" class="active" for="first_name2">Codigo de GrupLAC:</label>
            </div>
                
             <div class="input-field col s6">
                <input  disabled id="caja"  type="number" class="validate" data-length="4" maxlength="4" value="'.utf8_encode($row2["num_sem_bene"]).'">
                <label  id="caja2" class="active" for="first_name2">Numero de Semilleros Beneficiados:</label>
             </div>
                
             <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea" data-length="100" maxlength="100">'.utf8_encode($row2["nomb_sem_bene"]).'</textarea>
                  <label  id="caja2" for="textarea1">nombres de Semilleros Beneficiados:</label>
             </div>

             <div class="input-field col s12">
                <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["des_meto_pro"]).'</textarea>
                <label  id="caja2" for="textarea1">descripcion de metodologia del proyecto:</label>
            </div>

            <div class="input-field col s6">
                <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["num_pro_bene"]).'">
                <label  id="caja2" class="active" for="first_name2">numero de programa de formacion beneficiado</label>
            </div>
      
           <div class="input-field col s6">
                <input  disabled id="caja"  type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["nom_pro_bene"]).'">
                <label id="caja2"  class="active" for="first_name2">Nombre de los programas beneficiados</label>
            </div>
                
            <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["imp_esperado"]).'</textarea>
                <label id="caja2"  class="active" for="first_name2">impacto esperado</label>
            </div>
     
      
      <!--<label  style="color:black; float:left;"><b><u>Recursos Humanos:</u></b></label>-->
        
            <div class="input-field col s4">
                <input disabled id="caja"  type="number" class="validate" data-length="3" maxlength="3"  value="'.utf8_encode($row2["num_per_ext"]).'">
                <label  id="caja2" class="active" for="first_name2">N° personal externo</label>
            </div>
      
             <div class="input-field col s8">
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100"  value="'.utf8_encode($row2["nom_apr_ext"]).'">
                <label  id="caja2" class="active" for="first_name2">Nombres y apellidos</label>
            </div>

             <div class="input-field col s12">
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100"  value="'.utf8_encode($row2["num_iden_ext"]).'">
                <label  id="caja2" class="active" for="first_name2">Numeros de identificacion</label>
            </div>

<div class="input-field col s12">
  <label class="active" id="sesione">Número de personal interno(Aprendices Sin Contrato de apredizaje)</label>
</div>

            <div class="input-field col s4">
                <input disabled id="caja" type="number" class="validate" data-length="3" maxlength="3" value="'.utf8_encode($row2["num_pers_int_s"]).'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno</label>
            </div>

           <div class="input-field col s8">
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["nom_ape_int_s"]).'">
                <label  id="caja2" class="active" for="first_name2">Nombres y apellidos:</label>
            </div>


           <div class="input-field col s12">
                <input  disabled id="caja"  type="text" class="validate" data-length="100" maxlength="100"  value="'.utf8_encode($row2["num_iden_int_s"]).'">
                <label  id="caja2" class="active" for="first_name2">Numeros de Identificacion:</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">Número de personal interno(Aprendices con Contrato de apredizaje)</label>
</div>

            <div class="input-field col s12">
                <input  disabled id="caja"  type="number" class="validate" data-length="3" maxlength="3" value="'.utf8_encode($row2["num_pers_int_c"]).'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno</label>
            </div>';

if ($_GET['t']=="investigacion") {
 $formulario.='<div class="input-field col s12">
<label class="active" id="sesione">Número de personal interno (Aprendices Con Contrato de monitoria)</label>
</div>
           
            <div class="input-field col s12">
                <input disabled id="caja"  type="number" class="validate" data-length="3" maxlength="3" value="'.utf8_encode($row2["num_pers_int_cm"]).'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno </label>
            </div>';
}



$formulario.='<div class="input-field col s12">
<label class="active" id="sesione">(Número de personal interno (Instructores)</label>
</div>

            <div class="input-field col s12">
                <input disabled id="caja" type="number" class="validate" data-length="3" maxlength="3" value="'.utf8_encode($row2["num_pers_int_in"]).'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno </label>
            </div>
            
            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea" data-length="100" maxlength="100">'.utf8_encode($row2["nom_apellidos"]).'</textarea>
                  <label  id="caja2" for="textarea1">Nombres y Apellidos</label>
            </div>

            <div class="input-field col s12">
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["num_idenficac"]).'">
                <label id="caja2"  class="active" for="first_name2">numeros de idetificacion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">Número de personal interno (Otros-TP-TA-SENNOVA)</label>
</div>

            <div class="input-field col s12">
                <input disabled id="caja" type="number" class="validate" data-length="3" maxlength="3" value="'.utf8_encode($row2["num_per_int_s"]).'">
                <label  id="caja2" class="active" for="first_name2">Número de personal interno:</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea" type="text" data-length="100" maxlength="100">'.utf8_encode($row2["nom_apell_pers"]).'</textarea>
                <label  id="caja2" class="active" for="first_name2">nombres y apellidos</label>
            </div>
      
            <div class="input-field col s12">
                <input disabled id="caja" type="text" class="validate" data-length="100" maxlength="100" value="'.utf8_encode($row2["num_iden_pers"]).'">
                <label  id="caja2" class="active" for="first_name2">numeros de identificacion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">Aliados Externos y/o Contrapartida</label>
</div>

            <div class="input-field col s12">
                <input disabled id="caja" type="text" class="validate" data-length="30" maxlength="30"   value="'.utf8_encode($row2["nom_ali_int"]).'">
                <label  id="caja2" class="active" for="first_name2">nombre de aliado interno</label>
            </div>
    
            <div class="input-field col s6">
                <input disabled id="caja" class="validate" data-length="8" maxlength="8"  value="'.utf8_encode($row2["nit"]).'">
                <label  id="caja2" class="active" for="first_name2">Nit</label>
            </div>
      
             <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"  value="'.utf8_encode($row2["rec_esp_ent_ext"]).'">
                <label id="caja2"  class="active" for="first_name2">Recursos en Especie Entidad Externa ($COP):</label>
            </div>
      
      
           <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["rec_din_ent_ext"]).'">
                <label  id="caja2" class="active" for="first_name2">Recursos en Dinero Entidad Externa($COP):</label>
            </div>
      
      
             <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["rec_esp_ent_int"]).'">
                <label class="active" for="first_name2">Recursos en Especie Entidad Interna ($COP):</label>
            </div>
      

             <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["rec_din_ent_int"]).'">
                <label id="caja2"  class="active" for="first_name2">Recursos en Dinero Entidad Interna ($COP):</label>
            </div>
      

             <div class="input-field col s6">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["cui_mun_inf"]).'</textarea>
                <label  id="caja2" class="active" for="first_name2">Ciudades y/o municipios de inlfuencia:</label>
            </div>
      
      
             <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["des_ali_obj"]).'</textarea>
                <label  id="caja2" class="active" for="first_name2">Descripción de la alianza y objetivos:</label>
            </div>';
            
            if ($_GET['t']=="investigacion") {
  $formulario.='<div class="input-field col s12">
              <label class="active" id="sesione">Recursos SENNOVA</label>
              </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"value="'.utf8_encode($row2["ot_se_pe_in"]).'"
                              <label id="caja2" class="active" for="first_name2">($COP)</label>
                          </div>
                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion1"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"value="'.utf8_encode($row2["se_pe_in"]).'"
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                          </div>


                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion2"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
              <div class="input-field col s12">
              <label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
              </div>
                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"value="'.utf8_encode($row2["eq_de_si"]).'"
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion3"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
              <div class="input-field col s12">
              <label class="active" id="sesione">SOFTWARE</label>
              </div>
                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["sofware"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion4"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                     
              <div class="input-field col s12">
              <label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["maq_ind"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion5"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
                    
              <div class="input-field col s12">
              <label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["otr_com_equi"]).'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion6"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
              </div>
                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ma_pa_for"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion7"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    

              <div class="input-field col s12">
              <label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
              </div>

                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["man_maq_equ"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion8"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_com_tra"]).'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>

                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion9"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
              </div>


                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_gast_imp"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="disabled id="caja"" class="materialize-textarea">'.utf8_encode($row2["descripcion10"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
              </div>

                
                           <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["div_act"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                           </div>
                    
                           <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion11"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
              </div>


                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["via_gast_int"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion12"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label  class="active" id="sesione">GASTOS BIENESTAR ALUMNOS</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["gast_bien"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion13"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
              </div>
                    
                  
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ade_cons"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion14"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">MONITORES</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["monitores"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion15"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>';

 
}elseif($_GET['t']=="innovacion"){
  $formulario.='<div class="input-field col s12">
              <label class="active" id="sesione">Recursos SENNOVA</label>
              </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"value="'.utf8_encode($row2["ot_se_pe_in"]).'"
                              <label id="caja2" class="active" for="first_name2">($COP)</label>
                          </div>
                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion1"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"value="'.utf8_encode($row2["se_pe_in"]).'"
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                          </div>


                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion2"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
              <div class="input-field col s12">
              <label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
              </div>
                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8"value="'.utf8_encode($row2["eq_de_si"]).'"
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion3"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
              <div class="input-field col s12">
              <label class="active" id="sesione">SOFTWARE</label>
              </div>
                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["sofware"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion4"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                     
              <div class="input-field col s12">
              <label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["maq_ind"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion5"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    
                    
              <div class="input-field col s12">
              <label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["otr_com_equi"]).'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion6"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
              </div>
                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ma_pa_for"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion7"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>
                    

              <div class="input-field col s12">
              <label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
              </div>

                    
                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["man_maq_equ"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion8"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
              </div>

                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_com_tra"]).'">
                              <label id="caja2" class="active" for="first_name2"> ($COP):</label>
                          </div>

                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion9"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
              </div>


                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_gast_imp"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>
                    
                         <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion10"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
              </div>

                
                           <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["div_act"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP): </label>
                           </div>
                    
                           <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion11"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
              </div>


                          <div class="input-field col s6">
                              <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["via_gast_int"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                          <div class="input-field col s12">
                                <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion12"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label  class="active" id="sesione">GASTOS BIENESTAR ALUMNOS</label>
              </div>

                          <div class="input-field col s6">
                              <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["gast_bien"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                    
                         <div class="input-field col s12">
                                <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion13"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>

              <div class="input-field col s12">
              <label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
              </div>
                    
                  
                          <div class="input-field col s6">
                              <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ade_cons"]).'">
                              <label id="caja2" class="active" for="first_name2">($COP):</label>
                          </div>

                          <div class="input-field col s12">
                                <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion14"]).'</textarea>
                                <label id="caja2" for="textarea1">descripcion</label>
                          </div>';

}elseif($_GET['t']=="servicios"){
  $formulario.='<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
</div>

            <div class="input-field col s6">
                <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ser_per_ind"]).'">
                <label id="caja2" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion1"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">EQUIPO DE SISTEMAS</label>
</div>

            <div class="input-field col s6">
                <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["equ_sis"]).'">
                <label id="caja2" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion2"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">SOFTWARE</label>
</div>
      
            <div class="input-field col s6">
                <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["software"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion3"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>
      
            <div class="input-field col s6">
                <input disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["maq_ind"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion4"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["otra_com_equi"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                  <textarea disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion5"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["mat_for_pro"]).'">
                <label id="caja2" class="active" for="first_name2"> ($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion6"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA,EQUIPOS,TRASPORTE Y SOFTWARE<label>
</div>
      
            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["man_maq_equ"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion7"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>
      

<div class="input-field col s12">
<label class="active" id="sesione">OTROS COMUNICACIONES Y TRASPORTE</label>
</div>

      
            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_com_tra"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion8"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES<label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_gast_imp"]).'">
                <label id="caja2" class="active" for="first_name2"> ($COP):</label>
            </div>

           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion9"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label  class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONAL</label>
</div>


            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["div_act"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion10"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>

  
             <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["via_gast_int"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP): </label>
             </div>
      
             <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion11"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
</div>


            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ade_cont"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP):</label>
            </div>

      
            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion12"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>';

}elseif($_GET['t']=="modernizacion"){
$formulario.='<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">EQUIPO DE SISTEMAS</label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["equi_sis"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion1"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">SOFTWARE</label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["software"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion2"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>
      
            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["maq_ind"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion3"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPO</label>
</div>
      
            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["otr_com_equ"]).'">
                <label id="caja2"  class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion4"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["maq_for_pro"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion5"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">ANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFTWARE</label>
</div>

            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["man_maq_equi"]).'">
                <label  id="caja2" class="active" for="first_name2"> ($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion6"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMUNICACIONES Y TRANPORTE<label>
</div>
      
            <div class="input-field col s6">
                <input disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["otra_com_tran"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion7"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>
      

<div class="input-field col s12">
<label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
</div>

      
            <div class="input-field col s6">
                <input  disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ade_cons"]).'">
                <label  id="caja2" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion8"]).'</textarea>
                  <label  id="caja2" for="textarea1">descripcion</label>
            </div>
';
//echo $formulario;
}elseif($_GET['t']=="divulgacion"){
$formulario.='<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONAL INDIRECTOS</label>
</div>

            <div class="input-field col s6">
                <input   disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["se_pe_in"]).'">
                <label id="caja2"class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea   disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion1"]).'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>

            <div class="input-field col s6">
                <input   disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ma_pa_for"]).'">
                <label id="caja2"class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <textarea    disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion2"]).'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
</div>
      
            <div class="input-field col s6">
                <input   disabled id="caja"  type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["ot_gast_imp"]).'">
                <label id="caja2"class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <textarea    disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion3"]).'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONAL</label>
</div>
      
            <div class="input-field col s6">
                <input   disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["di_ac_ge_in"]).'">
                <label id="caja2"class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                  <textarea   disabled id="caja" class="materialize-textarea">'.utf8_encode($row2["descripcion4"]).'</textarea>
                  <label id="caja2"for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>

            <div class="input-field col s6">
                <input   disabled id="caja" type="number" class="validate" data-length="8" maxlength="8" value="'.utf8_encode($row2["via_gast_int"]).'">
                <label id="caja2" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                  <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row2["descripcion5"]).'</textarea>
                  <label id="caja2" for="textarea1">descripcion</label>
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
        $formulario.='        <div class="input-field col s12">
<label class="active" id="sesione">OBJETIVOS, RESULTADOS Y PRODUCTOS</label><BR>
</div>';
        $i=1;
        while($row21 = mysqli_fetch_array($result2)){
        $formulario.='

       <div class="input-field col s12">
        <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row21["objetivo"]).'</textarea>
        <label id="caja2" for="textarea1">Objetivo'.$i.'</label>
        </div>

        <div class="input-field col s12">
        <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row21["resultado"]).'</textarea>
        <label id="caja2" for="textarea1">Resultado'.$i.'</label>
        </div>

        <div class="input-field col s12">
        <textarea  disabled id="caja"  class="materialize-textarea">'.utf8_encode($row21["producto"]).'</textarea>
        <label id="caja2" for="textarea1">Producto'.$i.'</label>
        </div>';


        $i++;
        }
      }
        // echo $formulario;  
      echo $formulario;
   ?>
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

         if ($tabla=="investigacion") {
           $tabl=1;
         }elseif($tabla=="innovacion"){
           $tabl=2;
         }elseif($tabla=="servicios"){
           $tabl=3;
         }elseif($tabla=="modernizacion"){
           $tabl=4;
         }elseif($tabla=="divulgacion"){
           $tabl=5;
         }

         

  if($_SESSION['cargo']=="Administrador"){ 
 echo $e=' <div class="input-field col s12">
           <strong>Descargar Anexo</strong>
        <a style="color:white;" href="'.$anexo.'" download><button class="btn tooltipped green text-darken-2" target="_blank" data-position="top" data-delay="50" data-tooltip="Descargar Anexo"><i class="material-icons" >get_app</i>
        </a>
        </button>
        <br><br>
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
          if (response==1){
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
             