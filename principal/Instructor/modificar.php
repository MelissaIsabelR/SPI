
    <body>
     
      <?php 
      include("../../conexion.php");  
        $usuario=$_POST['codigoInstru'];
        
       ?>

<?php 
//echo $usuario;
  /*$conn = new mysqli("localhost","root","","proyectos");*/
  $consulta ="SELECT * from registros where cedula=$usuario";
  //echo($consulta);
  $conn = new mysqli($local,$user,$pass,$base);
  $resultado = $conn->query($consulta);
    
  
     if ($fila = $resultado->fetch_assoc()) {

        
      //$tabla= "<div class='rotateInDownleft animated'>
      $tabla= "
            <div >
            <section class='card-panel white accent-4 col s12 z-depth-5'>
           <div class='row'>
           <h5 style='text-align:center;''>Actualizar Datos</h5><br><br>
              

                <div class='input-field col s6' style='display:none;''>
                <input  id='cedula' type='text' class='validate' value='$usuario'>
                <label class='active' for='first_name2'>identificacion</label>
                </div>

                <div class='input-field col s6'>
                <input  id='nombres' type='text' class='validate' value='".utf8_encode($fila["nombre"])."'>
                <label class='active' for='first_name2'>Nombres</label>
                </div>

                <div class='input-field col s6'>
                <input  id='apellidos' type='text' class='validate' value='".utf8_encode($fila["apellidos"])."'>
                <label class='active' for='first_name2'>apellido</label>
                </div>

                <div class='input-field col s6'>
                <input  id='direccion' type='text' class='validate' value='".utf8_encode($fila["Dir"])."'>
                <label class='active' for='first_name2'>Direccion</label>
                </div>

                 <div class='input-field col s6'>
                <input  id='telefono' type='text' class='validate' value='".$fila["tel"]."'>
                <label class='active' for='first_name2'>Telefono</label>

                </div>


                 <div class='input-field col s6'>
                <input  id='correo' type='text' class='validate' value='".$fila["correo"]."'>
                <label class='active' for='first_name2'>Correo</label>
                </div>


                
          <center>
            <button onclick='actualizarInstru()' class='btn waves-effect waves-light green text-darken-2'>Actualizar
          </button>
          </center>

             </div>
              </section>
          </div>
          
      
                ";

      
      echo $tabla;
    }
    
   
 ?>
       
     
        </body>
        <script>
    function actualizarInstru(){
    
        $.ajax({
          url: "Instructor/EditarInstru.php",
          data: {cedula : $("#cedula").val(),
            nombres : $("#nombres").val(),
            apellidos : $("#apellidos").val(),
            direccion: $("#direccion").val(),
            telefono : $("#telefono").val(),
            correo : $("#correo").val()
           },
          type: "POST",
           
         success: function(response){
          //alert(response)
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
</html>
