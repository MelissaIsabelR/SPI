  <?php
include("../conexion.php");
 $usuario=$_POST["codigoSem"];
//echo $usuario;
  /*$conn = new mysqli("localhost","root","","proyectos");*/
  $consulta ="SELECT * from semilleros where documento=$usuario";
  //echo($consulta);
  $conn = new mysqli($local,$user,$pass,$base);
  $resultado = $conn->query($consulta);
  	

  
     if ($fila = $resultado->fetch_assoc()) {

     		
			//$tabla= "<div class='rotateInDownleft animated'>
      $tabla= "
            <div>
             <section class='card-panel white accent-4 col s12 z-depth-5'>
           <div class='row'>
           <h5 style='text-align:center;''>Actualizar Datos</h5><br><br>
              

                <div class='input-field col s6' style='display:none;''>
                <input  id='identificacionActSe' type='text' class='validate' value='$usuario'>
                <label class='active' for='first_name2'>identificacion</label>
                </div>

				        <div class='input-field col s6'>
                <input  id='nombresactuSe' type='text' class='validate' value='".utf8_encode($fila["nombre"])."'>
                <label class='active' for='first_name2'>Nombres</label>
                </div>

                <div class='input-field col s6'>
                <input  id='apellidoactuSe' type='text' class='validate' value='".utf8_encode($fila["apellido"])."'>
                <label class='active' for='first_name2'>apellido</label>
                </div>

                <div class='input-field col s6'>
                <input  id='coractuSe' type='text' class='validate' value='".utf8_encode($fila["correo"])."'>
                <label class='active' for='first_name2'>correo</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='telefonoactuSe' type='number' class='validate' value='".$fila["telefono"]."'>
                <label class='active' for='first_name2'>telefono</label>

                </div>


                 <div class='input-field col s6'>
                <input  id='fechanaactuSe' type='date' class='validate' value='".$fila["fechana"]."'>
                <label class='active' for='first_name2'>Fecha de Nacimiento</label>
                </div>


                 <div class='input-field col s6'>
                <input  id='instecactuSe' type='text' class='validate' value='".utf8_encode($fila["instec"])."'>
                <label class='active' for='first_name2'>instructor tecnico</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='corrinsactuSe' type='text' class='validate' value='".utf8_encode($fila["corrins"])."'>
                <label class='active' for='first_name2'>correo instructor</label>
                </div>
                 </div> 
       
          <center>
            <button onclick='actualizarSemill()' class='btn waves-effect waves-light green text-darken-2'>Actualizar
          </button>
          </center>
      
             </div>
              </section>
          </div>
          
                ";

			
			echo $tabla;
		}
		
   
 ?>

<script>
    function actualizarSemill(){
    
        $.ajax({
          url: "Semillero/actualiza.php",
          data: {nombre : $("#nombresactuSe").val(),
            identificacion : $("#identificacionActSe").val(),
            apellido : $("#apellidoactuSe").val(),
            corre: $("#coractuSe").val(),
            telefono : $("#telefonoactuSe").val(),
            fechana : $("#fechanaactuSe").val(),
            instec  : $("#instecactuSe").val(),
            corrins : $("#corrinsactuSe").val()
           },
          type: "POST",
           
         success: function(response){
           if (response==0){
               alertify.error('Error al Editar');
          }else if(response==1){
              
               alertify.success('Datos editados Correctamente');
          };
        }

          /*success: function(response){
               if (response==0){
              alert('Error al Guardar');
            }else if(response==1){
              alert('Datos Grabados');
            };
          }*/
        });
         window.location.reload();
      }
    </script> 

     
        </body>
        
</html>
