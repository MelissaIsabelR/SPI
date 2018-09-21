<script type="text/javascript" src="../js/alertify.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/alertify.min.css">

<script type="text/javascript">
function camFeEn(codigo) { 
	$.ajax({
       url: "php/CamFecha.php",
       data: {
             
          AcCodigo : codigo,
          fechaEnv: $("#fechaEnv").val()
             },
        type: "POST",
         
       success: function(response){
        //alert(response)
         if (response==0){
                  alertify.error('Error al Cambiar Fecha');
          }else if(response==1){
            alertify.success('Fecha Actualizada Correctamente');
                }
            location.reload(true);    
        }
        

});
}
</script>
<?php 
include("../../conexion.php");
	$conn = new mysqli($local,$user,$pass,$base);
	$consulta1 ="SELECT * FROM envios WHERE numer_env=".$_POST['codigoSem']."";
	$result = $conn->query($consulta1);
	if($row = mysqli_fetch_array($result)){
echo '
      <div class="modal-content">
              <h5>Cambiar fecha</h5>
                <div class="row">
                  <div class="input-field col s6">
                        <input id="fechaEnv" type="date" class="validate" value="'.$row['fechaenviar'].'">
                       <label class="active" for="fechafin" Fecha de envio</label>
                  </div>
                 
            </div>
      </div>
        <div class="modal-footer">
         
          <a class="btn waves-effect waves-light green text-darken-2" onclick="camFeEn('.$_POST['codigoSem'].')"><i class="large material-icons">edit</i>Cambiar</a>
        </div> 
';
}

?>