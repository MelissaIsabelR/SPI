 <?php  @session_start(); ?>
<div class="col-md-12">
<form method="post" action="">
  <label>FECHA: </label>
  <input type="date" name="fecha" id="fecha" required>

  <input type="submit" id="submit" class="btn btn-warning" name="enviar" value="Solicitar">

</form>
  
</div>

<?php
 if(isset($_POST['enviar'])){
  
    function saber_dia2($nombredia2) {
    $dias2[1]="L";
     $dias2[2]="M";
      $dias2[3]="MI";
       $dias2[4]="J";
        $dias2[5]="V";
         $dias2[6]="S";
          $dias2[7]="D";
    $fecha2 = $dias2[date('N', strtotime($nombredia2))];
    //echo $fecha;
     echo $_SESSION['diasemana2']=$fecha2;

  }

   $num_dia1 = saber_dia2($_POST['fecha']);
  // ejecutamos la función pasándole la fecha que queremos
  }
 
?>
