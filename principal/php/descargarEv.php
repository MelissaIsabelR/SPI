<?php include("../../conexion.php"); ?>
<script type="text/javascript">
 function CamEst(codigo){
  //  alert(codigo)
    $.ajax({
 url: "php/CambFecEnv.php",
       data: { 
          codigoSem : codigo   
            },
        type: "POST",
         
      
      success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
            $('#modal11').html(response);

      }

});
   }
</script>
<?php 
    $conexion = new mysqli($local,$user,$pass,$base);

    if ($_POST['lineaDes']=="1") {
          $tb="investigacion";
      }elseif($_POST['lineaDes']=="2"){
         $tb="innovacion";
      }elseif($_POST['lineaDes']=="3"){
         $tb="servicios";
      }elseif($_POST['lineaDes']=="4"){
         $tb="modernizacion";
      }elseif($_POST['lineaDes']=="5"){
         $tb="divulgacion";
      }

  $consulta="SELECT * FROM envios INNER JOIN ".$tb." ON ".$tb.".codigo=envios.cod_pro where envios.cod_pro=".$_POST['codigoDes']."";

 if($result = $conexion->query($consulta)){
  $tabla1='<center><strong><b><u>Descargar evidencia proyecto '.$tb.'</u></b</strong></center>';
  $tabla1.='<table>
  <thead>
            <tr>
                <th>Titulo</th>
                <th>Resultado</th>
                <th>Fecha de envio</th>
                <th>Cambiar Fecha</th>
               <th>Evidencia</th>
            </tr>
    </thead>
    <tbody>';
        
          while($row = mysqli_fetch_array($result)){

               $tabla1.='<tr>
               <td>'.utf8_encode($row['titulo_pro']).'</td>
               <td>'.utf8_encode($row['resultado']).'</td>
               <td>'.utf8_encode($row['fechaenviar']).'</td>
               <td><a href="#modal11"  onclick="CamEst('.$row['numer_env'].')" class="btn tooltipped green text-darken-2" target="_blank" data-position="top" data-delay="50" data-tooltip="Cambiar Fecha"><i class="material-icons">compare_arrows</i></a></td>
               <td><a style="color:white;" href="'.$row["evidencia"].'" download><button class="btn tooltipped green text-darken-2" target="_blank" data-position="top" data-delay="50" data-tooltip="Descargar Evidencia"><i class="material-icons" >get_app</i></a></button>
               </td>
               </tr>';
               
             }
        

   $tabla1.='</tbody>
</table>';


 }
 echo $tabla1;
 ?>
<div id="modal11" class="modal modal-fixed-footer" style="width: 400px; height: 300px; border-radius: 10px;">

</div>

 <script type="text/javascript">
    $(document).ready(function(){
    $('.modal').modal();
    });
   
  $(document).ready(function(){
    $('.tooltipped').tooltip({delay: 50});
  });

</script>