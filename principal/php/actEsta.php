
<script type="text/javascript">
	   function CamEstad(codigo){
   	var fechafin=document.getElementById('fechaSalid').value;
 if (fechafin!="") {
			$.ajax({
 		url: "php/estadoSemille.php",
       data: { 
          codigoSemill : codigo ,
          fechaSem : fechafin 
            },
        type: "POST",
         
      
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
      	//alert(response)
          if (response==1){
            alertify.success('Estado Actualizado');
          }else if(response==0){
            alertify.error('Error al Actualizar Estado');
          };
            location.reload(true); 

      }

	});
}else{
	alert("error")
}
   
   }
</script>
<?php 
  include("../../conexion.php");
  $conn = new mysqli($local,$user,$pass,$base);
  $consulta1 ="SELECT * from semilleros where documento=".$_POST['codigoSem']."";
  $result = $conn->query($consulta1);
      if($row = mysqli_fetch_array($result)){

 $estado='<div class="modal-content" style="text-align:center;">
              <h4>Cambiar Estado</h4>
              
      <br>
      <h6> para Cambiar es estado del semillero debe Cambiar la fecha de salida</h6>
      <br><br>
      		<div class="container">
				<div class="row">
				                <div class="input-field col s6">
				                <input id="fechaSalid" type="date" class="validate" value="'.$row['fechai2'].'">
				                <label class="active" for="first_name2">fecha de Salida</label>
				                <button  class="btn waves-effect waves-light green text-darken-2" onclick="CamEstad('.$_POST['codigoSem'].')">Actualizar</button>
				  </div>
				</div>
		</div>
  </div>

        <div class="modal-footer">
       
         
        </div> 
';
}
echo $estado;
 ?>