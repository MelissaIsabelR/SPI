<?php @session_start(); ?>
<?php include '../../conexion.php'; ?>
<?php  
 $conexion = new mysqli($local,$user,$pass,$base); 
 if ($lineas!=1) {
            $consultaCam2="SELECT idT, nombreC, lineaC, estadoC, RolInstC FROM tablaparametrica WHERE lineaC=$lineas  OR  lineaC='T'"; 
             if($resultCam2 = $conexion->query($consultaCam2)){
              while($rowCam2 = mysqli_fetch_array($resultCam2)){
               $rowsNom2[$rowCam2["idT"]]=$rowCam2["nombreC"];
               $rowsLin2[$rowCam2["idT"]]=$rowCam2["lineaC"];
               $rowsEsta2[$rowCam2["idT"]]=$rowCam2["estadoC"];
               $rowsRol2[$rowCam2["idT"]]=$rowCam2["RolInstC"];
               $nombreC2=$rowCam2["nombreC"];
               $idsT2[$rowCam2["idT"]]=$rowCam2["idT"];
               $estadoC2[$rowCam2["idT"]]=$rowCam2["estadoC"];

                   if ($rowCam2["nombreC"]=="nom_sub") {
                    $nombreSub=$rowCam2["estadoC"];
                  }elseif($rowCam2["nombreC"]=="ema_sub"){
                    $emailSub=$rowCam2["estadoC"];
                  }elseif($rowCam2["nombreC"]=="num_cel_sub"){
                    $NumCelSub=$rowCam2["estadoC"];
                  }
              
              }

                if ($rowsNom2[90]=="nom_sub") {
                   $Cmpnom_sub=$estadoC2[90];
                   $IdCmpnom_sub=$idsT2[90];
                }
                if ($rowsNom2[91]=="ema_sub") {
                 $Cmpema_sub=$estadoC2[91];
                   $IdCmpema_sub=$idsT2[91];

                }
                if ($rowsNom2[92]=="num_cel_sub") {
                 $Cmpnum_cel_sub=$estadoC2[92];
                 $IdCmpnum_cel_sub=$idsT2[92];
                }


            }

/* $rowsNom2[90];
 $rowsNom2[91];
 $rowsNom2[92];*/
/* print_r($rowsNom2);
*/           

        }/*else if($line==1){*/

        $consultaCam="SELECT idT, nombreC, lineaC, estadoC, RolInstC FROM tablaparametrica WHERE lineaC=$lineas  OR  lineaC='T'"; 
         if($resultCam = $conexion->query($consultaCam)){
          while($rowCam = mysqli_fetch_array($resultCam)){
           $rowsNom[]=$rowCam["nombreC"];
           $rowsLin[]=$rowCam["lineaC"];
           $rowsEsta[]=$rowCam["estadoC"];
           $rowsRol[]=$rowCam["RolInstC"];
           $nombreC=$rowCam["nombreC"];
           $idsT[]=$rowCam["idT"];
           $estadoC[]=$rowCam["estadoC"];


               if ($rowCam["nombreC"]=="nom_sub") {
                $nombreSub=$rowCam["estadoC"];
              }elseif($rowCam["nombreC"]=="ema_sub"){
                $emailSub=$rowCam["estadoC"];
              }elseif($rowCam["nombreC"]=="num_cel_sub"){
                $NumCelSub=$rowCam["estadoC"];
              }
          
          }
          if ($lineas==1) {
             $LinkCvl="56";
             if ($rowsNom[89]=="nom_sub") {
                 $Cmpnom_sub=$estadoC[89];
                 $IdCmpnom_sub=$idsT[89];
            }
            if ($rowsNom[90]=="ema_sub") {
               $Cmpema_sub=$estadoC[90];
                 $IdCmpema_sub=$idsT[90];

            }
            if ($rowsNom[91]=="num_cel_sub") {
               $Cmpnum_cel_sub=$estadoC[91];
               $IdCmpnum_cel_sub=$idsT[91];
            }

          }else{
             $LinkCvl="55";
          }
          
        }
/*echo ($rowsRol[3]);
*/
/*print_r($rowsNom);
*/if ($lineas=="1") {
  $tabla="Investigacion";
}elseif($lineas=="2"){
  $tabla="Innovacion";

}elseif($lineas=="3"){
 $tabla="Servicios";

}elseif($lineas=="4"){
 $tabla="Modernizacion";
  
}elseif($lineas=="5"){
 $tabla="Divulgacion";
  
}
?>


<style>
  #sesione{
    color: orange;
  }
  
</style>

<div class="container z-depth-4">

<div class="container">
<br><br>
<h5 style="text-align: center; font-family: cambria;">Activar y desactivar campos del formato de <?php echo $tabla; ?> para los Aprendices (SEMCI). </h5>
<br><br>

  <div class="row">
    <div class="input-field col s12">
<label class="active" id="sesione">Información de Centro Proponente:</label>
</div>
           <br>
           <div style="display: none;" class="input-field col s6">
              <input id="identificacion" type="text" class="validate" value=<?php echo $_SESSION['user_id']; ?>>
              <label class="active" for="first_name2">Identificacion</label>  
           </div> 

           <div style="display: none;" class="input-field col s6">
              <input id="lineas" type="text" class="validate" value=<?php echo $lineas; ?>>
              <label class="active" for="first_name2">lineas</label>  
           </div> 

              
              <div class="input-field col s6">
              <div class='switch'>
                  <label >

                   <?php 
                        if($rowsNom[3]=="pro_region"){
                          if ($rowsRol[3]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input  disabled="true" name='pro_region' <?php echo $check; ?> id="pro_region" value='pro_region' type='checkbox' onclick='Fcampos(<?php echo $idsT[3] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
                <input  autocomplete="off" disabled="true" value="."  type="text" class="validate">
              <label style="color:green;" class="active" for="first_name2">Regional</label>
              </div>

             <div class="input-field col s12">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[4]=="pro_centro"){
                          if ($rowsRol[4]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input disabled="true" name='pro_centro' <?php echo $check; ?>  id="pro_centro" value='pro_centro' type='checkbox' onclick='Fcampos(<?php echo $idsT[4] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
                <input autocomplete="off" disabled="true" value="."  type="text" class="validate">

              <label style="color:green;" class="active" for="first_name2">Seleccione el centro</label>
              </div>

          
             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[5]=="nom_sub"){
                          if ($rowsRol[5]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input type="hidden" id="IdNomSub" value='<?php echo $IdCmpnom_sub; ?>'>

                      <input name='nom_sub' <?php echo $check; ?>  id="nom_sub" value='<?php echo $Cmpnom_sub; ?>' type='checkbox' onclick='Fcampos(<?php echo $idsT[5] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac

                     
                     <!--  <button href="#modal1"  style="border-radius: 05px;"><i class="Tiny material-icons">insert_chart</i></button> -->

                      <a id="op" href="#modal1" ><button id="CamNom" value="Nombre del Subdirector" style="border-radius: 05px;"><i class="Tiny material-icons">mode_edit</i></button></a>

                  </label>

              </div>
                <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombre del Subdirector</label>  
             </div> 


             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[6]=="ema_sub"){
                          if ($rowsRol[6]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input type="hidden" id="IdEmailSub" value='<?php echo $IdCmpema_sub; ?>'>
                      <input name='ema_sub' <?php echo $check; ?>  id="ema_sub" value='<?php echo $Cmpema_sub; ?>' type='checkbox' onclick='Fcampos(<?php echo $idsT[6] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac

                       <a id="op1" href="#modal1" ><button id="CamEmail" value="Email subdirector" style="border-radius: 05px;"><i class="Tiny material-icons">mode_edit</i></button></a>

                  </label>
              </div>
                <input autocomplete="off" disabled="true" value="."  type="text" class="validate">

                <label style="color:green;" class="active" for="first_name2">Email subdirector</label>  
             </div> 

             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[7]=="num_cel_sub"){
                          if ($rowsRol[7]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input type="hidden" value="<?php echo $IdCmpnum_cel_sub; ?>" id="IdTelSub">
                      <input name='num_cel_sub'   <?php echo $check; ?> id="num_cel_sub" value='<?php echo $Cmpnum_cel_sub; ?>' type='checkbox' onclick='Fcampos(<?php echo $idsT[7] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac

                        <a id="op2" href="#modal1" ><button id="CamNCSub" value="Numero de Celular de Subdirector(a):" style="border-radius: 05px;"><i class="Tiny material-icons">mode_edit</i></button></a>

                  </label>
              </div>
                <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numero de Celular de Subdirector(a):</label>  
             </div> 

             <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[8]=="pro_autores"){
                          if ($rowsRol[8]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='pro_autores' <?php echo $check; ?> id="pro_autores" value='pro_autores' type='checkbox' onclick='Fcampos(<?php echo $idsT[8] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Autores del Proyecto</label>  
             </div> 
              

             <div class="input-field col s6" >
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[9]=="nom_rad_pro"){
                          if ($rowsRol[9]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='nom_rad_pro' <?php echo $check; ?> id="nom_rad_pro" value='nom_rad_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[9] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombre de quien radica el Proyecto</label>  
            </div> 

            <div class="input-field col s6" >
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[10]=="num_identi"){
                          if ($rowsRol[10]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_identi' <?php echo $check; ?> id="num_identi" value='num_identi' type='checkbox' onclick='Fcampos(<?php echo $idsT[10] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numeros de Identificacion</label>
            </div> 
            
            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[11]=="ema_rad_pro"){
                          if ($rowsRol[11]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='ema_rad_pro' <?php echo $check; ?> id="ema_rad_pro" value='ema_rad_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[11] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Email</label>  
            </div> 

      
            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[12]=="Cel_rad_pro"){
                          if ($rowsRol[12]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='Cel_rad_pro' <?php echo $check; ?> id="Cel_rad_pro" value='Cel_rad_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[12] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numeros de Celular</label>  
            
            </div> 
           
            <!--////////////////informacion del proyecto//////////////////-->
<div class="input-field col s12">
<label class="active" id="sesione" >Información del Proyecto</label>
</div>

    
           <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[13]=="titulo_pro"){
                          if ($rowsRol[13]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='titulo_pro' <?php echo $check; ?> id="titulo_pro" value='titulo_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[13] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Titulo</label>  
            </div> 
 

           <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[14]=="area_con_1"){
                          if ($rowsRol[14]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='area_con_1' <?php echo $check; ?> id="area_con_1" value='area_con_1' type='checkbox' onclick='Fcampos(<?php echo $idsT[14] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
              <label style="color:green;" class="active" for="first_name2">Nombre del Instructor:</label>  
           </div> 
      
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[15]=="area_con_2"){
                          if ($rowsRol[15]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='area_con_2' <?php echo $check; ?> id="area_con_2" value='area_con_2' type='checkbox' onclick='Fcampos(<?php echo $idsT[15] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
              <label style="color:green;" class="active" for="first_name2">Email del Instructor:</label>  
            </div> 
       
      
            <div class="input-field col s6">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[16]=="apli_posconf"){
                          if ($rowsRol[16]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>


                      In
                      <input name='apli_posconf' <?php echo $check; ?> id="apli_posconf" value='apli_posconf' type='checkbox' onclick='Fcampos(<?php echo $idsT[16] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Aplica al posconflicto?</label>
            </div>

            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[17]=="muni_impact"){
                          if ($rowsRol[17]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='muni_impact' <?php echo $check; ?> id="muni_impact" value='muni_impact' type='checkbox' onclick='Fcampos(<?php echo $idsT[17] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="first_name2">Municipios a Impactar</label>
            </div>
       
       
            <div class="input-field col s6">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[18]=="des_estra"){
                          if ($rowsRol[18]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='des_estra' <?php echo $check; ?> id="des_estra" value='des_estra' type='checkbox' onclick='Fcampos(<?php echo $idsT[18] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="first_name2">Descripcion de Extrategias</label>
            </div>
    
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[19]=="recu_poscof"){
                          if ($rowsRol[19]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='recu_poscof' <?php echo $check; ?> id="recu_poscof" value='recu_poscof' type='checkbox' onclick='Fcampos(<?php echo $idsT[19] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Cuenta con rescursos de postconficto:$(COP):</label>
            </div>
       
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[20]=="ante_just_pro"){
                          if ($rowsRol[20]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ante_just_pro' <?php echo $check; ?> id="ante_just_pro" value='ante_just_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[20] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
                  <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="first_name2">Antecedentes y Justificacion del proyecto:</label>
            </div>


            <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[21]=="plan_pro_nec"){
                          if ($rowsRol[21]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='plan_pro_nec' <?php echo $check; ?> id="plan_pro_nec" value='plan_pro_nec' type='checkbox' onclick='Fcampos(<?php echo $idsT[21] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
                   <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="first_name2">Plantemiento del problema y/o necesidades</label>
            </div>

    
            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[22]=="fech_ini_pro"){
                          if ($rowsRol[22]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='fech_ini_pro' <?php echo $check; ?> id="fech_ini_pro" value='fech_ini_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[22] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
                 <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Fecha de Inicio del Proyecto:</label>
            </div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[23]=="fech_fin_pro"){
                          if ($rowsRol[23]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='fech_fin_pro' <?php echo $check; ?> id="fech_fin_pro" value='fech_fin_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[23] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Fecha de fin del Proyecto:</label>
            </div>

            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[24]=="nom_gru_inv"){
                          if ($rowsRol[24]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input disabled="true" name='nom_gru_inv' <?php echo $check; ?> id="nom_gru_inv" value='nom_gru_inv' type='checkbox' onclick='Fcampos(<?php echo $idsT[24] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
            <label style="color:green;" class="active" for="first_name2">Nombre de grupo de Investigacion</label>
            </div>
            
       
             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[25]=="cod_grupo"){
                          if ($rowsRol[25]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='cod_grupo' <?php echo $check; ?> id="cod_grupo" value='cod_grupo' type='checkbox' onclick='Fcampos(<?php echo $idsT[25] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Codigo de GrupLAC:</label>
            </div>
                
             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom[26]=="num_sem_bene"){
                          if ($rowsRol[26]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_sem_bene' <?php echo $check; ?> id="num_sem_bene" value='num_sem_bene' type='checkbox' onclick='Fcampos(<?php echo $idsT[26] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numero de Semilleros Beneficiados:</label>
             </div>
                
             <div class="input-field col s12">
              <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom[27]=="nomb_sem_bene"){
                          if ($rowsRol[27]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nomb_sem_bene' <?php echo $check; ?> id="nomb_sem_bene" value='nomb_sem_bene' type='checkbox' onclick='Fcampos(<?php echo $idsT[27] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="first_name2">Nombres de Semilleros Beneficiados:</label>
             </div>

             <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[28]=="des_meto_pro"){
                          if ($rowsRol[28]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='des_meto_pro' <?php echo $check; ?> id="des_meto_pro" value='des_meto_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT[28] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Descripcion de Metodologia del proyecto:</label>
            </div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[29]=="num_pro_bene"){
                          if ($rowsRol[29]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_pro_bene' <?php echo $check; ?> id="num_pro_bene" value='num_pro_bene' type='checkbox' onclick='Fcampos(<?php echo $idsT[29] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numero de Programa de Formacion Beneficiado</label>
            </div>
      
           <div class="input-field col s6">
           <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[30]=="nom_pro_bene"){
                          if ($rowsRol[30]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nom_pro_bene' <?php echo $check; ?> id="nom_pro_bene" value='nom_pro_bene' type='checkbox' onclick='Fcampos(<?php echo $idsT[30] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombre de los programas Beneficiados</label>
            </div>
                
            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[31]=="imp_esperado"){
                          if ($rowsRol[31]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='imp_esperado' <?php echo $check; ?> id="imp_esperado" value='imp_esperado' type='checkbox' onclick='Fcampos(<?php echo $idsT[31] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Impacto Esperado</label>
            </div>
     
      
      <!--<label  style="color:black; float:left;"><b><u>Recursos Humanos:</u></b></label>-->
        
            <div class="input-field col s4">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[32]=="num_per_ext"){
                          if ($rowsRol[32]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_per_ext' <?php echo $check; ?> id="num_per_ext" value='num_per_ext' type='checkbox' onclick='Fcampos(<?php echo $idsT[32] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">N° Personal Externo</label>
            </div>
      
             <div class="input-field col s8">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[33]=="nom_apr_ext"){
                          if ($rowsRol[33]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nom_apr_ext' <?php echo $check; ?> id="nom_apr_ext" value='nom_apr_ext' type='checkbox' onclick='Fcampos(<?php echo $idsT[33] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombres y apellidos</label>
            </div>

             <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[34]=="num_iden_ext"){
                          if ($rowsRol[34]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_iden_ext' <?php echo $check; ?> id="num_iden_ext" value='num_iden_ext' type='checkbox' onclick='Fcampos(<?php echo $idsT[34] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numeros de Identificacion</label>
            </div>

<div class="input-field col s12">
  <label class="active" id="sesione">Número de personal interno(Aprendices Sin Contrato de apredizaje)</label>
</div>

            <div class="input-field col s4">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[35]=="num_pers_int_s"){
                          if ($rowsRol[35]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_pers_int_s' <?php echo $check; ?> id="num_pers_int_s" value='num_pers_int_s' type='checkbox' onclick='Fcampos(<?php echo $idsT[35] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Número de Personal Interno</label>
            </div>

           <div class="input-field col s8">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[36]=="nom_ape_int_s"){
                          if ($rowsRol[36]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nom_ape_int_s' <?php echo $check; ?> id="nom_ape_int_s" value='nom_ape_int_s' type='checkbox' onclick='Fcampos(<?php echo $idsT[36] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombres y Apellidos:</label>
            </div>


           <div class="input-field col s12">
           <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[37]=="num_iden_int_s"){
                          if ($rowsRol[37]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_iden_int_s' <?php echo $check; ?> id="num_iden_int_s" value='num_iden_int_s' type='checkbox' onclick='Fcampos(<?php echo $idsT[37] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numeros de Identificacion:</label>
            </div>
           

<div class="input-field col s12">
<label class="active" id="sesione">Número de personal interno(Aprendices con Contrato de apredizaje)</label>
</div>

            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[38]=="num_pers_int_c"){
                          if ($rowsRol[38]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_pers_int_c' <?php echo $check; ?> id="num_pers_int_c" value='num_pers_int_c' type='checkbox' onclick='Fcampos(<?php echo $idsT[38] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Número de Personal Interno</label>
            </div>

<?php 
  if ($tabla=="Investigacion") {
    ?>
      <div class="input-field col s12">
<label class="active" id="sesione">Número de personal interno (Aprendices Con Contrato de monitoria)</label>
</div>
           
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[39]=="num_pers_int_cm"){
                          if ($rowsRol[39]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_pers_int_cm' <?php echo $check; ?> id="num_pers_int_cm" value='num_pers_int_cm' type='checkbox' onclick='Fcampos(<?php echo $idsT[39] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>

                  <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Número de Personal Interno </label>
            </div>

              </div>
    <?php
  }
 ?>
<!--*****************MONITORIA************************ -->
              


<div class="input-field col s12">
<label class="active" id="sesione">(Número de personal interno (Instructores)</label>
</div>

            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[40]=="num_pers_int_in"){
                          if ($rowsRol[40]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_pers_int_in' <?php echo $check; ?> id="num_pers_int_in" value='num_pers_int_in' type='checkbox' onclick='Fcampos(<?php echo $idsT[40] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Número de personal Interno </label>
            </div>
            
            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[41]=="nom_apellidos"){
                          if ($rowsRol[41]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nom_apellidos' <?php echo $check; ?> id="nom_apellidos" value='nom_apellidos' type='checkbox' onclick='Fcampos(<?php echo $idsT[41] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="first_name2">Nombres y Apellidos</label>
            </div>

            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[42]=="num_idenficac"){
                          if ($rowsRol[42]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_idenficac' <?php echo $check; ?> id="num_idenficac" value='num_idenficac' type='checkbox' onclick='Fcampos(<?php echo $idsT[42] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numeros de Idetificacion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">Número de personal interno (Otros-TP-TA-SENNOVA)</label>
</div>

            <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom[43]=="num_per_int_s"){
                          if ($rowsRol[43]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_per_int_s' <?php echo $check; ?> id="num_per_int_s" value='num_per_int_s' type='checkbox' onclick='Fcampos(<?php echo $idsT[43] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Número de Personal Interno:</label>
            </div>
      
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[44]=="nom_apell_pers"){
                          if ($rowsRol[44]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nom_apell_pers' <?php echo $check; ?> id="nom_apell_pers" value='nom_apell_pers' type='checkbox' onclick='Fcampos(<?php echo $idsT[44] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombres y Apellidos</label>
            </div>
      
            <div class="input-field col s12">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[45]=="num_iden_pers"){
                          if ($rowsRol[45]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='num_iden_pers' <?php echo $check; ?> id="num_iden_pers" value='num_iden_pers' type='checkbox' onclick='Fcampos(<?php echo $idsT[45] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Numeros de Identificacion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">Aliados Externos y/o Contrapartida</label>
</div>

            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[46]=="nom_ali_int"){
                          if ($rowsRol[46]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nom_ali_int' <?php echo $check; ?> id="nom_ali_int" value='nom_ali_int' type='checkbox' onclick='Fcampos(<?php echo $idsT[46] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nombre de Aliado Interno</label>
            </div>
    
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[47]=="nit"){
                          if ($rowsRol[47]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='nit' <?php echo $check; ?> id="nit" value='nit' type='checkbox' onclick='Fcampos(<?php echo $idsT[47] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Nit</label>
            </div>
      
             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[48]=="rec_esp_ent_ext"){
                          if ($rowsRol[48]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='rec_esp_ent_ext' <?php echo $check; ?> id="rec_esp_ent_ext" value='rec_esp_ent_ext' type='checkbox' onclick='Fcampos(<?php echo $idsT[48] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Recursos en Especie Entidad Externa ($COP):</label>
            </div>
      
      
           <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[49]=="rec_din_ent_ext"){
                          if ($rowsRol[49]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='rec_din_ent_ext' <?php echo $check; ?> id="rec_din_ent_ext" value='rec_din_ent_ext' type='checkbox' onclick='Fcampos(<?php echo $idsT[49] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Recursos en Dinero Entidad Externa($COP):</label>
            </div>
      
      
             <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php ;
                        if($rowsNom[50]=="rec_esp_ent_int"){
                          if ($rowsRol[50]=="S") {
                             $check="checked='true'";
                          }else{
                             $check="";
                          }
                        }

                    ?>

                      In
                      <input name='rec_esp_ent_int' <?php echo $check; ?> id="rec_esp_ent_int" value='rec_esp_ent_int' type='checkbox' onclick='Fcampos(<?php echo $idsT[50] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Recursos en Especie Entidad Interna ($COP):</label>
            </div>
      

             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom[51]=="rec_din_ent_int"){
                          if ($rowsRol[51]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                  <input name='rec_din_ent_int' <?php echo $check; ?> id="rec_din_ent_int" value='rec_din_ent_int' type='checkbox' onclick='Fcampos(<?php echo $idsT[51] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Recursos en Dinero Entidad Interna ($COP):</label>
            </div>
      

             <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom[52]=="cui_mun_inf"){
                          if ($rowsRol[52]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='cui_mun_inf' <?php echo $check; ?> id="cui_mun_inf" value='cui_mun_inf' type='checkbox' onclick='Fcampos(<?php echo $idsT[52] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Ciudades y/o municipios de inlfuencia:</label>
            </div>
      
      
             <div class="input-field col s12">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[53]=="des_ali_obj"){
                          if ($rowsRol[53]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='des_ali_obj' <?php echo $check; ?> id="des_ali_obj" value='des_ali_obj' type='checkbox' onclick='Fcampos(<?php echo $idsT[53] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Descripción de la alianza y objetivos:</label>
            </div>

             <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
/*                   echo $rowsNom[$LinkCvl];
*/                        if($rowsNom[$LinkCvl]=="LinkCvlac"){
                          if ($rowsRol[$LinkCvl]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='Cvla' <?php echo $check; ?> id="Cvla" value='Cvla' type='checkbox' onclick='Fcampos(<?php echo $idsT[$LinkCvl] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Link CVLAC</label>  
             </div> 

      
<?php 
if($tabla=="Investigacion"){
?>
<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom[59]=="ot_se_pe_in"){
                          if ($rowsRol[59]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_se_pe_in' <?php echo $check; ?> id="ot_se_pe_in" value='ot_se_pe_in' type='checkbox' onclick='Fcampos(<?php echo $idsT[59] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[60]=="descripcion1"){
                          if ($rowsRol[60]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion1' <?php echo $check; ?> id="descripcion1" value='descripcion1' type='checkbox' onclick='Fcampos(<?php echo $idsT[60] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[61]=="se_pe_in"){
                          if ($rowsRol[61]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='se_pe_in' <?php echo $check; ?> id="se_pe_in" value='se_pe_in' type='checkbox' onclick='Fcampos(<?php echo $idsT[61] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[62]=="descripcion2"){
                          if ($rowsRol[62]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion2' <?php echo $check; ?> id="descripcion2" value='descripcion2' type='checkbox' onclick='Fcampos(<?php echo $idsT[62] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
</div>
      
            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[63]=="eq_de_si"){
                          if ($rowsRol[63]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='eq_de_si' <?php echo $check; ?> id="eq_de_si" value='eq_de_si' type='checkbox' onclick='Fcampos(<?php echo $idsT[63] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[64]=="descripcion3"){
                          if ($rowsRol[64]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion3' <?php echo $check; ?> id="descripcion3" value='descripcion3' type='checkbox' onclick='Fcampos(<?php echo $idsT[64] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">SOFTWARE</label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[65]=="sofware"){
                          if ($rowsRol[65]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='sofware' <?php echo $check; ?> id="sofware" value='sofware' type='checkbox' onclick='Fcampos(<?php echo $idsT[65] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[66]=="descripcion4"){
                          if ($rowsRol[66]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion4' <?php echo $check; ?> id="descripcion4" value='descripcion4' type='checkbox' onclick='Fcampos(<?php echo $idsT[66] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>

            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[67]=="maq_ind"){
                          if ($rowsRol[67]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='maq_ind' <?php echo $check; ?> id="maq_ind" value='maq_ind' type='checkbox' onclick='Fcampos(<?php echo $idsT[67] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[68]=="descripcion5"){
                          if ($rowsRol[68]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion5' <?php echo $check; ?> id="descripcion5" value='descripcion5' type='checkbox' onclick='Fcampos(<?php echo $idsT[68] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[69]=="otr_com_equi"){
                          if ($rowsRol[69]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='otr_com_equi' <?php echo $check; ?> id="otr_com_equi" value='otr_com_equi' type='checkbox' onclick='Fcampos(<?php echo $idsT[69] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[70]=="descripcion6"){
                          if ($rowsRol[70]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion6' <?php echo $check; ?> id="descripcion6" value='descripcion6' type='checkbox' onclick='Fcampos(<?php echo $idsT[70] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[71]=="ma_pa_for"){
                          if ($rowsRol[71]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ma_pa_for' <?php echo $check; ?> id="ma_pa_for" value='ma_pa_for' type='checkbox' onclick='Fcampos(<?php echo $idsT[71] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[72]=="descripcion7"){
                          if ($rowsRol[72]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion7' <?php echo $check; ?> id="descripcion7" value='descripcion7' type='checkbox' onclick='Fcampos(<?php echo $idsT[72] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      

<div class="input-field col s12">
<label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
</div>

      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[73]=="man_maq_equ"){
                          if ($rowsRol[73]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='man_maq_equ' <?php echo $check; ?> id="man_maq_equ" value='man_maq_equ' type='checkbox' onclick='Fcampos(<?php echo $idsT[73] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[74]=="descripcion8"){
                          if ($rowsRol[74]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion8' <?php echo $check; ?> id="descripcion8" value='descripcion8' type='checkbox' onclick='Fcampos(<?php echo $idsT[74] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
</div>

            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[75]=="ot_com_tra"){
                          if ($rowsRol[75]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_com_tra' <?php echo $check; ?> id="ot_com_tra" value='ot_com_tra' type='checkbox' onclick='Fcampos(<?php echo $idsT[75] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>

           <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[76]=="descripcion9"){
                          if ($rowsRol[76]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion9' <?php echo $check; ?> id="descripcion9" value='descripcion9' type='checkbox' onclick='Fcampos(<?php echo $idsT[76] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
</div>


            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[77]=="ot_gast_imp"){
                          if ($rowsRol[77]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_gast_imp' <?php echo $check; ?> id="ot_gast_imp" value='ot_gast_imp' type='checkbox' onclick='Fcampos(<?php echo $idsT[77] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[78]=="descripcion10"){
                          if ($rowsRol[78]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion10' <?php echo $check; ?> id="descripcion10" value='descripcion10' type='checkbox' onclick='Fcampos(<?php echo $idsT[78] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
</div>

  
             <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[79]=="div_act"){
                          if ($rowsRol[79]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='div_act' <?php echo $check; ?> id="div_act" value='div_act' type='checkbox' onclick='Fcampos(<?php echo $idsT[79] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
             </div>
      
             <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[80]=="descripcion11"){
                          if ($rowsRol[80]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion11' <?php echo $check; ?> id="descripcion11" value='descripcion11' type='checkbox' onclick='Fcampos(<?php echo $idsT[80] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>


            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[81]=="via_gast_int"){
                          if ($rowsRol[81]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='via_gast_int' <?php echo $check; ?> id="via_gast_int" value='via_gast_int' type='checkbox' onclick='Fcampos(<?php echo $idsT[81] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[82]=="descripcion12"){
                          if ($rowsRol[82]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion12' <?php echo $check; ?> id="descripcion12" value='descripcion12' type='checkbox' onclick='Fcampos(<?php echo $idsT[82] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label  class="active" id="sesione">GASTOS BIENESTAR ALUMNOS</label>
</div>

            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[83]=="gast_bien"){
                          if ($rowsRol[83]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='gast_bien' <?php echo $check; ?> id="gast_bien" value='gast_bien' type='checkbox' onclick='Fcampos(<?php echo $idsT[83] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[84]=="descripcion13"){
                          if ($rowsRol[84]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion13' <?php echo $check; ?> id="descripcion13" value='descripcion13' type='checkbox' onclick='Fcampos(<?php echo $idsT[84] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
</div>
      
    
            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[85]=="ade_cons"){
                          if ($rowsRol[85]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ade_cons' <?php echo $check; ?> id="ade_cons" value='ade_cons' type='checkbox' onclick='Fcampos(<?php echo $idsT[85] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[86]=="descripcion14"){
                          if ($rowsRol[86]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion14' <?php echo $check; ?> id="descripcion14" value='descripcion14' type='checkbox' onclick='Fcampos(<?php echo $idsT[86] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MONITORES</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[87]=="monitores"){
                          if ($rowsRol[87]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='monitores' <?php echo $check; ?> id="monitores" value='monitores' type='checkbox' onclick='Fcampos(<?php echo $idsT[87] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom[88]=="descripcion15"){
                          if ($rowsRol[88]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion15' <?php echo $check; ?> id="descripcion15" value='descripcion15' type='checkbox' onclick='Fcampos(<?php echo $idsT[88] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
            
            

  </div>
  </div>
</div>      
<?php
}elseif ($tabla=="Innovacion") {
  echo "Innovacion";
?>
<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">OTROS SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom2[93]=="ot_se_pe_in"){
                          if ($rowsRol2[93]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_se_pe_in' <?php echo $check; ?> id="ot_se_pe_in" value='ot_se_pe_in' type='checkbox' onclick='Fcampos(<?php echo $idsT2[93] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[94]=="descripcion1"){
                          if ($rowsRol2[94]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion1' <?php echo $check; ?> id="descripcion1" value='descripcion1' type='checkbox' onclick='Fcampos(<?php echo $idsT2[94] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[95]=="se_pe_in"){
                          if ($rowsRol2[95]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='se_pe_in' <?php echo $check; ?> id="se_pe_in" value='se_pe_in' type='checkbox' onclick='Fcampos(<?php echo $idsT2[95] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[96]=="descripcion2"){
                          if ($rowsRol2[96]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion2' <?php echo $check; ?> id="descripcion2" value='descripcion2' type='checkbox' onclick='Fcampos(<?php echo $idsT2[96] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione"> EQUIPO DE SISTEMAS</label>
</div>
      
            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[97]=="eq_de_si"){
                          if ($rowsRol2[97]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='eq_de_si' <?php echo $check; ?> id="eq_de_si" value='eq_de_si' type='checkbox' onclick='Fcampos(<?php echo $idsT2[97] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[98]=="descripcion3"){
                          if ($rowsRol2[98]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion3' <?php echo $check; ?> id="descripcion3" value='descripcion3' type='checkbox' onclick='Fcampos(<?php echo $idsT2[98] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">SOFTWARE</label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[99]=="sofware"){
                          if ($rowsRol2[99]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='sofware' <?php echo $check; ?> id="sofware" value='sofware' type='checkbox' onclick='Fcampos(<?php echo $idsT2[99] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[100]=="descripcion4"){
                          if ($rowsRol2[100]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion4' <?php echo $check; ?> id="descripcion4" value='descripcion4' type='checkbox' onclick='Fcampos(<?php echo $idsT2[100] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>

            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[111]=="maq_ind"){
                          if ($rowsRol2[111]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='maq_ind' <?php echo $check; ?> id="maq_ind" value='maq_ind' type='checkbox' onclick='Fcampos(<?php echo $idsT2[111] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[102]=="descripcion5"){
                          if ($rowsRol2[102]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion5' <?php echo $check; ?> id="descripcion5" value='descripcion5' type='checkbox' onclick='Fcampos(<?php echo $idsT2[102] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[103]=="otr_com_equi"){
                          if ($rowsRol2[103]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='otr_com_equi' <?php echo $check; ?> id="otr_com_equi" value='otr_com_equi' type='checkbox' onclick='Fcampos(<?php echo $idsT2[103] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[104]=="descripcion6"){
                          if ($rowsRol2[104]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion6' <?php echo $check; ?> id="descripcion6" value='descripcion6' type='checkbox' onclick='Fcampos(<?php echo $idsT2[104] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL<label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[105]=="ma_pa_for"){
                          if ($rowsRol2[105]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ma_pa_for' <?php echo $check; ?> id="ma_pa_for" value='ma_pa_for' type='checkbox' onclick='Fcampos(<?php echo $idsT2[105] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[106]=="descripcion7"){
                          if ($rowsRol2[106]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion7' <?php echo $check; ?> id="descripcion7" value='descripcion7' type='checkbox' onclick='Fcampos(<?php echo $idsT2[106] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      

<div class="input-field col s12">
<label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA, EQUIPO, TRANSPORTE Y SOFWARE</label>
</div>

      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[107]=="man_maq_equ"){
                          if ($rowsRol2[107]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='man_maq_equ' <?php echo $check; ?> id="man_maq_equ" value='man_maq_equ' type='checkbox' onclick='Fcampos(<?php echo $idsT2[107] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[108]=="descripcion8"){
                          if ($rowsRol2[108]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion8' <?php echo $check; ?> id="descripcion8" value='descripcion8' type='checkbox' onclick='Fcampos(<?php echo $idsT2[108] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">OTROS COMUNICACIONES Y TRANSPORTE<label>
</div>

            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[109]=="ot_com_tra"){
                          if ($rowsRol2[109]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_com_tra' <?php echo $check; ?> id="ot_com_tra" value='ot_com_tra' type='checkbox' onclick='Fcampos(<?php echo $idsT2[109] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>

           <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[110]=="descripcion9"){
                          if ($rowsRol2[110]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion9' <?php echo $check; ?> id="descripcion9" value='descripcion9' type='checkbox' onclick='Fcampos(<?php echo $idsT2[110] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label  class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES</label>
</div>


            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[111]=="ot_gast_imp"){
                          if ($rowsRol2[111]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_gast_imp' <?php echo $check; ?> id="ot_gast_imp" value='ot_gast_imp' type='checkbox' onclick='Fcampos(<?php echo $idsT2[111] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[112]=="descripcion10"){
                          if ($rowsRol2[112]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion10' <?php echo $check; ?> id="descripcion10" value='descripcion10' type='checkbox' onclick='Fcampos(<?php echo $idsT2[112] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONA</label>
</div>

  
             <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[113]=="div_act"){
                          if ($rowsRol2[113]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='div_act' <?php echo $check; ?> id="div_act" value='div_act' type='checkbox' onclick='Fcampos(<?php echo $idsT2[113] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
             </div>
      
             <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[114]=="descripcion11"){
                          if ($rowsRol2[114]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion11' <?php echo $check; ?> id="descripcion11" value='descripcion11' type='checkbox' onclick='Fcampos(<?php echo $idsT2[114] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>


            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[115]=="via_gast_int"){
                          if ($rowsRol2[115]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='via_gast_int' <?php echo $check; ?> id="via_gast_int" value='via_gast_int' type='checkbox' onclick='Fcampos(<?php echo $idsT2[115] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[116]=="descripcion12"){
                          if ($rowsRol2[116]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion12' <?php echo $check; ?> id="descripcion12" value='descripcion12' type='checkbox' onclick='Fcampos(<?php echo $idsT2[116] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label  class="active" id="sesione">GASTOS BIENESTAR ALUMNOS</label>
</div>

            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[117]=="gast_bien"){
                          if ($rowsRol2[117]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='gast_bien' <?php echo $check; ?> id="gast_bien" value='gast_bien' type='checkbox' onclick='Fcampos(<?php echo $idsT2[117] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[118]=="descripcion13"){
                          if ($rowsRol2[118]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion13' <?php echo $check; ?> id="descripcion13" value='descripcion13' type='checkbox' onclick='Fcampos(<?php echo $idsT2[118] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
</div>
      
    
            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[119]=="ade_cons"){
                          if ($rowsRol2[119]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ade_cons' <?php echo $check; ?> id="ade_cons" value='ade_cons' type='checkbox' onclick='Fcampos(<?php echo $idsT2[119] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 

                        if($rowsNom2[120]=="descripcion14"){
                          if ($rowsRol2[120]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion14' <?php echo $check; ?> id="descripcion14" value='descripcion14' type='checkbox' onclick='Fcampos(<?php echo $idsT2[120] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>


<!--                       <div class="input-field col s6">
 -->            <!--  <div class='switch'>
                  <label >


                   <?php 
                        /*if($rowsNom[56]=="LinkCvlac"){
                          if ($rowsRol[56]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }
*/
                    ?>

                      In
                      <input name='Cvla' <?php //echo $check; ?> id="Cvla" value='Cvla' type='checkbox' onclick='Fcampos(<?php// echo $idsT[56] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div> -->
             <!--  <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Link CVLAC</label>  
             </div>  --> 


  </div>
  </div>
</div>      
<?php
}elseif($tabla=="Servicios"){
?>

<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom2[134]=="ser_per_ind"){
                          if ($rowsRol2[134]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ser_per_ind' <?php echo $check; ?> id="ser_per_ind" value='ser_per_ind' type='checkbox' onclick='Fcampos(<?php echo $idsT2[134] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[135]=="descripcion1"){
                          if ($rowsRol2[135]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion1' <?php echo $check; ?> id="descripcion1" value='descripcion1' type='checkbox' onclick='Fcampos(<?php echo $idsT2[135] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">EQUIPO DE SISTEMAS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[136]=="equ_sis"){
                          if ($rowsRol2[136]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='equ_sis' <?php echo $check; ?> id="equ_sis" value='equ_sis' type='checkbox' onclick='Fcampos(<?php echo $idsT2[136] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[137]=="descripcion2"){
                          if ($rowsRol2[137]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion2' <?php echo $check; ?> id="descripcion2" value='descripcion2' type='checkbox' onclick='Fcampos(<?php echo $idsT2[137] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione"> SOFTWARE</label>
</div>
      
            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[138]=="software"){
                          if ($rowsRol2[138]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='software' <?php echo $check; ?> id="software" value='software' type='checkbox' onclick='Fcampos(<?php echo $idsT2[138] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[139]=="descripcion3"){
                          if ($rowsRol2[139]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion3' <?php echo $check; ?> id="descripcion3" value='descripcion3' type='checkbox' onclick='Fcampos(<?php echo $idsT2[139] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[140]=="maq_ind"){
                          if ($rowsRol2[140]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='maq_ind' <?php echo $check; ?> id="maq_ind" value='maq_ind' type='checkbox' onclick='Fcampos(<?php echo $idsT2[140] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[141]=="descripcion4"){
                          if ($rowsRol2[141]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion4' <?php echo $check; ?> id="descripcion4" value='descripcion4' type='checkbox' onclick='Fcampos(<?php echo $idsT2[141] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
</div>

            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[142]=="otra_com_equi"){
                          if ($rowsRol2[142]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='otra_com_equi' <?php echo $check; ?> id="otra_com_equi" value='otra_com_equi' type='checkbox' onclick='Fcampos(<?php echo $idsT2[142] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[143]=="descripcion5"){
                          if ($rowsRol2[143]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion5' <?php echo $check; ?> id="descripcion5" value='descripcion5' type='checkbox' onclick='Fcampos(<?php echo $idsT2[143] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[144]=="mat_for_pro"){
                          if ($rowsRol2[144]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='mat_for_pro' <?php echo $check; ?> id="mat_for_pro" value='mat_for_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT2[144] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[145]=="descripcion6"){
                          if ($rowsRol2[145]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion6' <?php echo $check; ?> id="descripcion6" value='descripcion6' type='checkbox' onclick='Fcampos(<?php echo $idsT2[145] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA,EQUIPOS,TRASPORTE Y SOFTWARE<label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[146]=="man_maq_equ"){
                          if ($rowsRol2[146]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='man_maq_equ' <?php echo $check; ?> id="man_maq_equ" value='man_maq_equ' type='checkbox' onclick='Fcampos(<?php echo $idsT2[146] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[147]=="descripcion7"){
                          if ($rowsRol2[147]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion7' <?php echo $check; ?> id="descripcion7" value='descripcion7' type='checkbox' onclick='Fcampos(<?php echo $idsT2[147] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      

<div class="input-field col s12">
<label class="active" id="sesione">OTROS COMUNICACIONES Y TRASPORTE</label>
</div>

      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[148]=="ot_com_tra"){
                          if ($rowsRol2[148]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_com_tra' <?php echo $check; ?> id="ot_com_tra" value='ot_com_tra' type='checkbox' onclick='Fcampos(<?php echo $idsT2[148] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[149]=="descripcion8"){
                          if ($rowsRol2[149]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion8' <?php echo $check; ?> id="descripcion8" value='descripcion8' type='checkbox' onclick='Fcampos(<?php echo $idsT2[149] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">OTROS GASTOS POR IMPRESOS Y PUBLICACIONES<label>
</div>

            <div class="input-field col s6">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[150]=="ot_gast_imp"){
                          if ($rowsRol2[150]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_gast_imp' <?php echo $check; ?> id="ot_gast_imp" value='ot_gast_imp' type='checkbox' onclick='Fcampos(<?php echo $idsT2[150] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>

           <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[151]=="descripcion9"){
                          if ($rowsRol2[151]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion9' <?php echo $check; ?> id="descripcion9" value='descripcion9' type='checkbox' onclick='Fcampos(<?php echo $idsT2[151] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label  class="active" id="sesione">DIVULGACION DE ACTIVIDADES DE GESTION INSTITUCIONAL</label>
</div>


            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[152]=="div_act"){
                          if ($rowsRol2[152]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='div_act' <?php echo $check; ?> id="div_act" value='div_act' type='checkbox' onclick='Fcampos(<?php echo $idsT2[152] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[153]=="descripcion10"){
                          if ($rowsRol2[153]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion10' <?php echo $check; ?> id="descripcion10" value='descripcion10' type='checkbox' onclick='Fcampos(<?php echo $idsT2[153] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">VIATICOS Y GASTOS DE VIAJE AL INTERIOR FORMACION PROFESIONAL</label>
</div>

  
             <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[154]=="via_gast_int"){
                          if ($rowsRol2[154]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='via_gast_int' <?php echo $check; ?> id="via_gast_int" value='via_gast_int' type='checkbox' onclick='Fcampos(<?php echo $idsT2[154] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
             </div>
      
             <div class="input-field col s12">
                <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[155]=="descripcion11"){
                          if ($rowsRol2[155]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion11' <?php echo $check; ?> id="descripcion11" value='descripcion11' type='checkbox' onclick='Fcampos(<?php echo $idsT2[155] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">ADECUACIONES Y CONSTRUCCIONES</label>
</div>


            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[156]=="ade_cont"){
                          if ($rowsRol2[156]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ade_cont' <?php echo $check; ?> id="ade_cont" value='ade_cont' type='checkbox' onclick='Fcampos(<?php echo $idsT2[156] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[157]=="descripcion12"){
                          if ($rowsRol2[157]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion12' <?php echo $check; ?> id="descripcion12" value='descripcion12' type='checkbox' onclick='Fcampos(<?php echo $idsT2[157] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

            <!--  <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        /*if($rowsNom[56]=="LinkCvlac"){
                          if ($rowsRol[56]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }*/

                    ?>

                      In
                      <input name='Cvla' <?php //echo $check; ?> id="Cvla" value='Cvla' type='checkbox' onclick='Fcampos(<?php //echo $idsT[56] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Link CVLAC</label>  
             </div>   -->

<?php
}elseif($tabla=="Modernizacion"){
echo "Modernizacion";
?>

<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom2[165]=="equi_sis"){
                          if ($rowsRol2[165]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='equi_sis' <?php echo $check; ?> id="equi_sis" value='equi_sis' type='checkbox' onclick='Fcampos(<?php echo $idsT2[165] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[166]=="descripcion1"){
                          if ($rowsRol2[166]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion1' <?php echo $check; ?> id="descripcion1" value='descripcion1' type='checkbox' onclick='Fcampos(<?php echo $idsT2[166] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">EQUIPO DE SISTEMAS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[167]=="software"){
                          if ($rowsRol2[167]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='software' <?php echo $check; ?> id="software" value='software' type='checkbox' onclick='Fcampos(<?php echo $idsT2[167] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[168]=="descripcion2"){
                          if ($rowsRol2[168]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion2' <?php echo $check; ?> id="descripcion2" value='descripcion2' type='checkbox' onclick='Fcampos(<?php echo $idsT2[168] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione"> SOFTWARE</label>
</div>
      
            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[169]=="maq_ind"){
                          if ($rowsRol2[169]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='maq_ind' <?php echo $check; ?> id="maq_ind" value='maq_ind' type='checkbox' onclick='Fcampos(<?php echo $idsT2[169] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[170]=="descripcion3"){
                          if ($rowsRol2[170]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion3' <?php echo $check; ?> id="descripcion3" value='descripcion3' type='checkbox' onclick='Fcampos(<?php echo $idsT2[170] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[171]=="otr_com_equ"){
                          if ($rowsRol2[171]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='otr_com_equ' <?php echo $check; ?> id="otr_com_equ" value='otr_com_equ' type='checkbox' onclick='Fcampos(<?php echo $idsT2[171] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[172]=="descripcion4"){
                          if ($rowsRol2[172]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion4' <?php echo $check; ?> id="descripcion4" value='descripcion4' type='checkbox' onclick='Fcampos(<?php echo $idsT2[172] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
</div>

            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[173]=="maq_for_pro"){
                          if ($rowsRol2[173]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='maq_for_pro' <?php echo $check; ?> id="maq_for_pro" value='maq_for_pro' type='checkbox' onclick='Fcampos(<?php echo $idsT2[173] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[174]=="descripcion5"){
                          if ($rowsRol2[174]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion5' <?php echo $check; ?> id="descripcion5" value='descripcion5' type='checkbox' onclick='Fcampos(<?php echo $idsT2[174] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
      
<div class="input-field col s12">
<label class="active" id="sesione">MATERIALES PARA FORMACION PROFESIONAL</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[175]=="man_maq_equi"){
                          if ($rowsRol2[175]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='man_maq_equi' <?php echo $check; ?> id="man_maq_equi" value='man_maq_equi' type='checkbox' onclick='Fcampos(<?php echo $idsT2[175] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2"> ($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[176]=="descripcion6"){
                          if ($rowsRol2[176]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion6' <?php echo $check; ?> id="descripcion6" value='descripcion6' type='checkbox' onclick='Fcampos(<?php echo $idsT2[176] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">MANTENIMIENTO DE MAQUINARIA,EQUIPOS,TRASPORTE Y SOFTWARE<label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[177]=="otra_com_tran"){
                          if ($rowsRol2[177]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='otra_com_tran' <?php echo $check; ?> id="otra_com_tran" value='otra_com_tran' type='checkbox' onclick='Fcampos(<?php echo $idsT2[177] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[178]=="descripcion7"){
                          if ($rowsRol2[178]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion7' <?php echo $check; ?> id="descripcion7" value='descripcion7' type='checkbox' onclick='Fcampos(<?php echo $idsT2[178] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      

<div class="input-field col s12">
<label class="active" id="sesione">OTROS COMUNICACIONES Y TRASPORTE</label>
</div>

      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[179]=="ade_cons"){
                          if ($rowsRol2[179]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ade_cons' <?php echo $check; ?> id="ade_cons" value='ade_cons' type='checkbox' onclick='Fcampos(<?php echo $idsT2[179] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[180]=="descripcion8"){
                          if ($rowsRol2[180]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion8' <?php echo $check; ?> id="descripcion8" value='descripcion8' type='checkbox' onclick='Fcampos(<?php echo $idsT2[180] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

             <!--  <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        /*if($rowsNom[56]=="LinkCvlac"){
                          if ($rowsRol[56]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }*/

                    ?>

                      In
                      <input name='Cvla' <?php //echo $check; ?> id="Cvla" value='Cvla' type='checkbox' onclick='Fcampos(<?php// echo $idsT[56] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Link CVLAC</label>  
             </div>  
 -->
<?php
}elseif($tabla=="Divulgacion"){
echo "Modernizacion";
?>

<div class="input-field col s12">
<label class="active" id="sesione">Recursos SENNOVA</label>
</div>

<div class="input-field col s12">
<label class="active" id="sesione">SERVICIOS PERSONALES INDIRECTOS (Aprendices)</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php
                        if($rowsNom2[181]=="se_pe_in"){
                          if ($rowsRol2[181]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='se_pe_in' <?php echo $check; ?> id="se_pe_in" value='se_pe_in' type='checkbox' onclick='Fcampos(<?php echo $idsT2[181] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP)</label>
            </div>
      
            <div class="input-field col s12">
            <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[182]=="descripcion1"){
                          if ($rowsRol2[182]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion1' <?php echo $check; ?> id="descripcion1" value='descripcion1' type='checkbox' onclick='Fcampos(<?php echo $idsT2[182] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>

<div class="input-field col s12">
<label class="active" id="sesione">EQUIPO DE SISTEMAS</label>
</div>

            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[183]=="ma_pa_for"){
                          if ($rowsRol2[183]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ma_pa_for' <?php echo $check; ?> id="ma_pa_for" value='ma_pa_for' type='checkbox' onclick='Fcampos(<?php echo $idsT2[183] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP): </label>
            </div>


            <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[184]=="descripcion2"){
                          if ($rowsRol2[184]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion2' <?php echo $check; ?> id="descripcion2" value='descripcion2' type='checkbox' onclick='Fcampos(<?php echo $idsT2[184] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione"> SOFTWARE</label>
</div>
      
            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[185]=="ot_gast_imp"){
                          if ($rowsRol2[185]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='ot_gast_imp' <?php echo $check; ?> id="ot_gast_imp" value='ot_gast_imp' type='checkbox' onclick='Fcampos(<?php echo $idsT2[185] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
           <div class="input-field col s12">
                  <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[186]=="descripcion3"){
                          if ($rowsRol2[186]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion3' <?php echo $check; ?> id="descripcion3" value='descripcion3' type='checkbox' onclick='Fcampos(<?php echo $idsT2[186] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      
<div class="input-field col s12">
<label class="active" id="sesione">MAQUINARIA INDUSTRIAL</label>
</div>
      
            <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[187]=="di_ac_ge_in"){
                          if ($rowsRol2[187]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='di_ac_ge_in' <?php echo $check; ?> id="di_ac_ge_in" value='di_ac_ge_in' type='checkbox' onclick='Fcampos(<?php echo $idsT2[187] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>
      
            <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[188]=="descripcion4"){
                          if ($rowsRol2[188]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion4' <?php echo $check; ?> id="descripcion4" value='descripcion4' type='checkbox' onclick='Fcampos(<?php echo $idsT2[188] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
       
<div class="input-field col s12">
<label class="active" id="sesione">OTRAS COMPRAS DE EQUIPOS</label>
</div>

            <div class="input-field col s6">
              <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[189]=="via_gast_int"){
                          if ($rowsRol2[189]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='via_gast_int' <?php echo $check; ?> id="via_gast_int" value='via_gast_int' type='checkbox' onclick='Fcampos(<?php echo $idsT2[189] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">($COP):</label>
            </div>

      
           <div class="input-field col s12">
                 <div class='switch'>
                  <label >


                   <?php 
                        if($rowsNom2[190]=="descripcion5"){
                          if ($rowsRol2[190]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }

                    ?>

                      In
                      <input name='descripcion5' <?php echo $check; ?> id="descripcion5" value='descripcion5' type='checkbox' onclick='Fcampos(<?php echo $idsT2[190] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                  <label style="color:green;" class="active" for="textarea1">descripcion</label>
            </div>
      <!-- <div class="input-field col s6">
             <div class='switch'>
                  <label >


                   <?php 
                        /*if($rowsNom[56]=="LinkCvlac"){
                          if ($rowsRol[56]=="S") {
                            $check="checked='true'";
                          }else{
                            $check="";
                          }
                        }*/

                    ?>

                      In
                      <input name='Cvla' <?php//echo $check; ?> id="Cvla" value='Cvla' type='checkbox' onclick='Fcampos(<?php//echo $idsT[56] ?>, this.checked, this.value, document.getElementById("opcionProye").value)'>
                      <span class='lever' ></span>
                      Ac
                  </label>
              </div>
              <input autocomplete="off" disabled="true" value="."  type="text" class="validate">
                <label style="color:green;" class="active" for="first_name2">Link CVLAC</label>  
             </div>  
  -->
<?php
}
?>
 


<!-- <div id="resp">
  
</div>
 -->


  <div id="modal1" class="modal modal-fixed-footer" style="width: 40%; height: 40%;">

    <div class="modal-content">
    <div class="container">
      <div class="row">
        <br><br>
        <h5>Actualizar Datos</h5>
      <div class="input-field col s12">
       <input type="hidden" id="IdNomModal" >
                <input  autocomplete="off"  id="nombreCamp" type="text" class="validate" required>
                <div id="NomCampo">
                  
                </div>
      </div>
      </div>
    </div>
  </div>
   <div class="modal-footer">

   
      <button  class=" modal-action modal-close waves-effect waves-orange btn-flat" >Cerrar</button>

      <button  onclick="ActuaNombr()" class="btn waves-effect waves-light green text-darken-2" >Guardar</button> 

    </div>
  </div>
      

<script type="text/javascript">
  $(document).ready(function() {
    $('select').material_select();
    });


</script>

<script type="text/javascript">
  
 $("#op").click(function(){
        
        $('.modal').modal();
  });

  $("#op1").click(function(){
        
        $('.modal').modal();
  });
  $("#op2").click(function(){
        
        $('.modal').modal();
  });
</script>

<script type="text/javascript">
 $("#CamNom").click(function(){
      var CamN=document.getElementById('CamNom').value;
      var NombreSub=document.getElementById('nom_sub').value;
      var CamIdNomSub=document.getElementById('IdNomSub').value;
      document.getElementById('nombreCamp').value=NombreSub;
      document.getElementById('IdNomModal').value=CamIdNomSub;
      document.getElementById('NomCampo').innerHTML='<label  class="active" for="pass">'+CamN+':</label>';
});

 $("#CamEmail").click(function(){
      var CamE=document.getElementById('CamEmail').value;
      var NomEma_sub=document.getElementById('ema_sub').value;
      var CamIdEmailSub=document.getElementById('IdEmailSub').value;
      document.getElementById('nombreCamp').value=NomEma_sub;
      document.getElementById('IdNomModal').value=CamIdEmailSub;

      document.getElementById('NomCampo').innerHTML='<label  class="active" for="pass">'+CamE+':</label>';
});

 $("#CamNCSub").click(function(){
      var CamS=document.getElementById('CamNCSub').value;
      var NumCeLSub=document.getElementById('num_cel_sub').value;
      var CamIdTelSub=document.getElementById('IdTelSub').value;
      document.getElementById('nombreCamp').value=NumCeLSub;
      document.getElementById('IdNomModal').value=CamIdTelSub;

      document.getElementById('NomCampo').innerHTML='<label  class="active" for="pass">'+CamS+':</label>';
});

</script>
<script type="text/javascript">
  function ActuaNombr(){
    Valor = $('#nombreCamp').val();
    id = $('#IdNomModal').val();
    
    $.ajax({
    url: 'php/ActualizarCamp.php',
    type: 'POST',
    data: {Valor, id},
    success: function(result) {
      if (result == 1) {

         alertify.success('Datos Guardados');
        
      }else if (result == 0){
         alertify.error('Error al Guardar Datos');

      }
    }
  });

  }
</script>
