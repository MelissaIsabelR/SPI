<?php include('../../conexion.php'); ?>
<?php 
 $conexion = new mysqli($local,$user,$pass,$base);
 $opcion= $_POST['valor'];
 $codigo= $_POST['codigo'];
 $linea= $_POST['linea'];

if ($opcion==1) {
   $consult="select * from semilleros where estadmin='RA'";
  $r="Aprendiz";
}elseif($opcion==2){
   $consult="select * from registros where Rol=1 and estadmin='RA'";
  $r="Instructror";

}

     
  $Select='<div class="input-field col s12">
  <select id="CodiAP" onchange="AsignarProyecto(this.value,\''.$codigo.'\',\''.$opcion.'\',\''.$linea.'\')">
  <option value="" disabled selected>Seleccione '.$r.':</option>';
  $consulta = $consult;
  $result = $conexion->query($consulta);
  while($row = mysqli_fetch_array($result)){ 
    if ($opcion==1) {
         $Select.='<OPTION VALUE="'.$row['documento'].'">'.$row['documento']." ---- ".$row['nombre']." ".$row['apellido'].'</OPTION>'; 

    }elseif($opcion==2){

       $Select.='<OPTION VALUE="'.$row['cedula'].'">'.$row['cedula']." ---- ".$row['nombre']." ".$row['apellidos'].'</OPTION>'; 

    }
 
  }
  $Select.='</select>
  <label>Aprendices</label>
  </div>';
  echo $Select;
  ?>

  <script type="text/javascript">
    function AsignarProyecto(CodPerso, codigoPro, opcionRol, linea){

 swal({
  title: "Asignar",
  text: "seguro que desea Asignar este proyecto?",
  type: "",
  showCancelButton: true,
 confirmButtonColor: "green",
  confirmButtonText: "Aceptar",
  cancelButtonText: "Cancelar",
  closeOnConfirm: false, 
  
  },

  function(){
    $.ajax({
    
      url: "php/GurdarAsig.php",
      data: {

            CodPerso: CodPerso,
            codigoPro: codigoPro,
            opcionRol: opcionRol,
            linea: linea
                       
            },
      type: "POST",

     
      success: function(response){

        //alert(response)
        
        if (response==0){
             swal("Error!", "Error al Asignar proyecto.", "error");
             
        }else if(response==1){
           
             swal("Asignado!", "proyecto asignado Correctamente.", "success");
           
        }
        //location.reload(true);
          
        }
      
        });
   
  });
}
  </script>
  <script type="text/javascript">

     $(document).ready(function() {
    $('select').material_select();
    });
  </script>
