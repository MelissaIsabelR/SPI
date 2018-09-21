<?php include("../../conexion.php"); ?>
<?php 
$conexion = new mysqli($local,$user,$pass,$base);
 $codigo=$_POST['codigoTipo'];
 $_POST['Opcion'];
if ($_POST['Opcion']==11) {
  if ($codigo=="seleccione") {
   $Subtipologia='Debe Seleccionar un tipo Producto';
   echo $Subtipologia;
  }else{
    $Subtipologia='
  <div class="input-field col s6"><select name="subtipo" id="subtipo" onChange="product(this.value, 2, 22)">';
  $Subtipologia.='<option value="" disabled selected>Seleccione:</option>';
                    $consulta = "SELECT * FROM tpproducto 
            INNER JOIN subproducto  ON tpproducto.codigo =  subproducto.cod_tip
            WHERE subproducto.cod_tip=".$codigo;
                    $result = $conexion->query($consulta);
                    while($row = mysqli_fetch_array($result)){ 
          $Subtipologia.='<OPTION VALUE="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</OPTION>'; 
          }
          $Subtipologia.='</select>
          <label>Seleccione subtipo Producto</label> 
        </div>';

  echo $Subtipologia;
  }
 
}elseif($_POST['Opcion']==22){
  $areas=' 
  <div class="input-field col s6">
  <select name="areas" id="areas" onChange="product(this.value, 3, 33)">';
  $areas.='<option value="" disabled selected>Seleccione:</option>';
                    $consulta = "SELECT * FROM areas";
                    $result = $conexion->query($consulta);
                    while($row = mysqli_fetch_array($result)){ 
          $areas.='<OPTION VALUE="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</OPTION>'; 
          }
          $areas.='</select>
          <label>Seleccione Area</label>
          </div>';

  echo $areas;
}elseif($_POST['Opcion']==33){
	  $subareas='
  <div class="input-field col s6"><select name="subareas" id="subareas" onChange="product(this.value, 4, 44)">';
  $subareas.='<option value="" disabled selected>Seleccione:</option>';
                    $consulta = "SELECT * FROM areas
                  INNER JOIN subareas  ON areas.codigo =  subareas.cod_area
                  WHERE subareas.cod_area=".$codigo;
                    $result = $conexion->query($consulta);
                    while($row = mysqli_fetch_array($result)){ 
          $subareas.='<OPTION VALUE="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</OPTION>'; 
          }
          $subareas.='</select>
          <label>Seleccione SubArea</label> 
               </div>';

  echo $subareas;
}elseif($_POST['Opcion']==44){
       $areas=' 
  <div class="input-field col s6">
  <select name="areas2"  id="areas2"  onChange="product(this.value, 5, 55)">';
  $areas.='<option value="" disabled selected>Seleccione:</option>';
                    $consulta = "SELECT * FROM areas";
                    $result = $conexion->query($consulta);
                    while($row = mysqli_fetch_array($result)){ 
          $areas.='<OPTION VALUE="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</OPTION>'; 
          }
          $areas.='</select>
          		<label>Seleccione Area</label>
               </div>';

  echo $areas;
}elseif($_POST['Opcion']==55){
       $diciplina='
  <div class="input-field col s6"><select  name="disciplina" id="disciplina" onChange="product(this.value, 6, 66)">';
  $diciplina.='<option value="" disabled selected>Seleccione:</option>';
                    $consulta = "SELECT * FROM areas
            INNER JOIN disciplina  ON areas.codigo =  disciplina.cod_area
            WHERE disciplina.cod_area=".$codigo;
                    $result = $conexion->query($consulta);
                    while($row = mysqli_fetch_array($result)){ 
          $diciplina.='<OPTION VALUE="'.$row['codigo'].'">'.utf8_encode($row['nombre']).'</OPTION>'; 
          }
          $diciplina.='</select>
          <label>Seleccione Disciplina</label> 
               </div>';

  echo $diciplina;
}elseif($_POST['Opcion']==66){
      $option1='
  <div class="input-field col s6"><select  name="LidGrup" id="LidGrup" onChange="product(this.value, 7, 77)">';
  $option1.='<option value="" disabled selected>Seleccione:</option>';
          $option1.='<OPTION VALUE="Si">Si</OPTION>'; 
          $option1.='<OPTION VALUE="No">No</OPTION>'; 
  
          $option1.='</select>
          <label>El producto esta verificado por el lider de grupo</label> 
            </div>';
echo $option1;
}elseif($_POST['Opcion']==77){
       $option2='
  <div class="input-field col s6"><select  name="LidSeno" id="LidSeno" onChange="product(this.value, 8, 88)">';
  $option2.='<option value="" disabled selected>Seleccione:</option>';
          $option2.='<OPTION VALUE="Si">Si</OPTION>'; 
          $option2.='<OPTION VALUE="No">No</OPTION>'; 
          
          $option2.='</select>
          <label>El producto esta verificado por el lider Sennova</label> 
            </div>';

  echo $option2;
}elseif($_POST['Opcion']==88){
echo "Adjuntar Archivo (.rar)";
$evidencia='
                        <div class="file-field input-field">
                            <div class="btn">
                            <span>Archivo</span>
                             <input type="file" name="archivo1" multiple>
                            </div>
                            <div class="file-path-wrapper">
                               <input name="eviden" id="eviden" class="file-path validate" type="text" placeholder="Adjuntar en un archivo winRAR">
                            </div>
                        </div>
                    <button class="btn waves-effect waves-light right" name="boton">Enviar
                    </button>
                   
                  ';
    echo $evidencia;
}
?>
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
</script>
