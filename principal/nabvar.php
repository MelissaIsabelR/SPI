<?php @session_start(); ?>
<script src="../alertas/dist/sweetalert-dev.js"></script>
 
  <link rel="stylesheet" href="../alertas/dist/sweetalert.css">
     <?php 
     //echo $_SESSION['cargo'];
     if ($_SESSION['cargo']=="Aprendiz") {
       $conexion = new mysqli($local,$user,$pass,$base);
      /* $consulta2 = "select * from semilleros WHERE documento=".$_SESSION["user_id"]." ";
        
         if($result2 = $conexion->query($consulta2)){
          while($row2 = mysqli_fetch_array($result2)){
            ECHO "SDFSDFDSFSDF";
          }
         }*/

       $consulta = "select * from semilleros WHERE documento=".$_SESSION["user_id"]." ";
        $sw=0;
         if($result = $conexion->query($consulta)){
          if($row = mysqli_fetch_array($result)){
            $nombre=utf8_encode($row['nombre']." ".$row['apellido']);  
             $_SESSION['nombre']=$nombre;          
            $sw=1;
          }else{
            ?>

            <!-- <body onload='swal("Advertencia!", "Usted se encuentra Inactivo", "warning");'>
 -->
            <?php
            echo "";
          }
         
        }else{
           $sw=0;
        }

     }

                   
      ?>
         
      </head>

          <!--<div class="navbar-fixed">-->
          <nav class="nav-extended">
               <div class="nav-wrapper orange ">
        <a href="#!" class="brand-logo">SPI</a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down" id="nav-mobile">

                <?php 
                   $conexion = new mysqli($local,$user,$pass,$base);
                    $consulta = "select * from capacitaciones WHERE estado='A'";
                    $consulta1 = "SELECT COUNT(codigo) AS ncap FROM capacitaciones  WHERE estado = 'A'";
                    $v="";
                    $result1 = $conexion->query($consulta1);
                    while($row = mysqli_fetch_array($result1)){ 
                        $res=$row['ncap'];
            }
            $result = $conexion->query($consulta);
                    while($row = mysqli_fetch_array($result)){ 
                        $row["nombre_capac"];
            $estado=$row["estado"];
            $codigo=$row["codigo"];
              $v='<span style="color:white;" id="badgee" class="badge green btn-floating pulse">'.$res.'</span>';
            
                       }
                      
                  
?>   
 
      <li><a href="Sesion.php">Inicio</a></li>

<?php  if ($_SESSION['cargo']=="Administrador"){ 
         echo '<li><a class="dropdown-button" data-activates="dropdown1">Semilleros<i class="material-icons right">arrow_drop_down</i></a></li>';


        

            echo '<li><a class="dropdown-button" data-activates="dropdown2">Proyectos<i class="material-icons right">arrow_drop_down</i></a></li>';

           echo '<li><a class="dropdown-button" data-activates="dropdown6">'.$_SESSION["usu"].'<i class="material-icons right">arrow_drop_down</i></a></li>';


}elseif($_SESSION['cargo']=="Aprendiz" and $sw==1){

        $consultaEs = "select * from semilleros WHERE documento=".$_SESSION["user_id"]." and estadmin='RA'";
          if($resultEs = $conexion->query($consultaEs)){

            if($rowEs = mysqli_fetch_array($resultEs)){

          echo '<li><a href="VC.php">Capacitaciones'?><?php echo $v; ?><?php '</a></a></li>';

          echo '<li><a class="dropdown-button" data-activates="dropdown3">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>';

          echo '<li><a class="dropdown-button" data-activates="dropdown5">Crear Proyectos<i class="material-icons right">arrow_drop_down</i></a></li>';

          echo '<li><a class="dropdown-button" data-activates="dropdown6">'.$_SESSION["nombre"].'<i class="material-icons right">arrow_drop_down</i></a></li>';

            }else{
              ?>
              
               <body onload='swal({title: "Advertencia",text: "Para poder acceder a las opciones su registro debe ser verificado por un administrador autorizado",type: "warning",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="../logear.php"})')>
               <?PHP
            }
         }


}elseif($_SESSION['cargo']=="Instructor"){
         
         $consultaEs = "select * from registros WHERE cedula=".$_SESSION["user_id"]." and estadmin='RA'";
          if($resultEs = $conexion->query($consultaEs)){

            if($rowEs = mysqli_fetch_array($resultEs)){
           echo '<li><a class="dropdown-button" data-activates="dropdown4">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>';

           echo '<li><a class="dropdown-button" data-activates="dropdown5">Crear Proyectos<i class="material-icons right">arrow_drop_down</i></a></li>';

           echo '<li><a class="dropdown-button" data-activates="dropdown6">'.$_SESSION["usu"].'<i class="material-icons right">arrow_drop_down</i></a></li>';
            }else{
                ?>
              
               <body onload='swal({title: "Advertencia",text: "Para poder acceder a las opciones su registro debe ser verificado por un administrador autorizado",type: "warning",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="../logear.php"})')>
               <?PHP
            }
          }

          

}elseif($_SESSION['cargo']=="Aprendiz" and $sw==0){

           echo '<li><a href="semilleros.php">Semilleros</a></li>';
         
           echo '<li><a class="dropdown-button" data-activates="dropdown6">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>';



}
         

         
?>
        
 </ul>
 
 <ul class="side-nav" id="mobile-demo">
              <li><a href="Sesion.php">Inicio</a></li>

<?php  if ($_SESSION['cargo']=="Administrador"){ 
         echo '<li><a class="dropdown-button" data-activates="dropdown11">Semilleros<i class="material-icons right">arrow_drop_down</i></a></li>';


          echo '<li><a class="dropdown-button" data-activates="dropdown21">Proyectos<i class="material-icons right">arrow_drop_down</i></a></li>';

           echo '<li><a class="dropdown-button" data-activates="dropdown61">'.$_SESSION["usu"].'<i class="material-icons right">arrow_drop_down</i></a></li>';


}elseif($_SESSION['cargo']=="Aprendiz" and $sw==1){

           echo '<li><a href="VC.php">Capacitaciones'?><?php echo $v; ?><?php '</a></a></li>';

          echo '<li><a class="dropdown-button" data-activates="dropdown31">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>';

          echo '<li><a class="dropdown-button" data-activates="dropdown51">Crear Proyectos<i class="material-icons right">arrow_drop_down</i></a></li>';

          echo '<li><a class="dropdown-button" data-activates="dropdown61">'.$_SESSION["nombre"].'<i class="material-icons right">arrow_drop_down</i></a></li>';

}elseif($_SESSION['cargo']=="Instructor"){
         

          echo '<li><a class="dropdown-button" data-activates="dropdown41">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>';

           echo '<li><a class="dropdown-button" data-activates="dropdown51">Crear Proyectos<i class="material-icons right">arrow_drop_down</i></a></li>';

           echo '<li><a class="dropdown-button" data-activates="dropdown61">'.$_SESSION["usu"].'<i class="material-icons right">arrow_drop_down</i></a></li>';

}elseif($_SESSION['cargo']=="Aprendiz" and $sw==0){

           echo '<li><a href="semilleros.php">Semilleros</a></li>';
         
           echo '<li><a class="dropdown-button" data-activates="dropdown61">Opciones<i class="material-icons right">arrow_drop_down</i></a></li>';



}
         

         
?>
</ul>

    
      </div>
             </nav>
          <!--</div>-->
<!--////////////////ADMINISTRADOR/////////////-->
          <ul id="dropdown1" class="dropdown-content">
          <li><a href="RegAprenInst.php" class="dropdown-button">Registros de Semilleros e Instructores</a>  
            <li class="divider"></li>

            <li><a href="SAI.php" class="dropdown-button">Semilleros</a>
              <li class="divider"></li>
              <li class="divider"></li>

             <li><a href="Instructores.php" class="dropdown-button">Instructores</a>
              <li class="divider"></li>

            <li><a href="CONLIST.php" class="dropdown-button">Control de Listas</a>
              <li class="divider"></li>
            
          </ul>

          <ul id="dropdown11" class="dropdown-content">
            <li class="divider"></li>

                    <li><a href="RegAprenInst.php" class="dropdown-button">Registros de Semilleros e Instructores</a>  
            <li class="divider"></li>

            <li><a href="SAI.php" class="dropdown-button">Semilleros</a>
<!--               <li class="divider"></li>
 -->              <li class="divider"></li>

             <li><a href="Instructores.php" class="dropdown-button">Instructores</a>
              <li class="divider"></li>

            <li><a href="CONLIST.php" class="dropdown-button">Control de Listas</a>
              <li class="divider"></li>
            

          </ul>
  <!--////////////////ADMINISTRADOR/////////////-->        
          <ul id="dropdown2" class="dropdown-content">
          <li class="divider"></li>
          <li class="divider"></li>

           <li><a href="proyec-Porgra.php" class="dropdown-button">proyectos por programas</a>
           <li class="divider"></li>
<!--           <li class="divider"></li>
 -->
            <li><a href="proyec.php" class="dropdown-button">proyectos</a>
            <li class="divider"></li>
          <li class="divider"></li>

           
         </ul>

         <ul id="dropdown21" class="dropdown-content">
           <li class="divider"></li>

              <li><a href="proyec-Porgra.php" class="dropdown-button">proyectos por programas</a>
                <li class="divider"></li>

            <li><a href="proyec.php" class="dropdown-button"><i class="material-icons right">
             chrome_reader_mode </i> proyectos</a></li>
               <li class="divider"></li>

         </ul>

<!--/////////////////////APRENDIZ///////////////////-->
          <ul id="dropdown3" class="dropdown-content">
           
            <li><a href="VPA.php" class="dropdown-button">Proyectos</a></li>
              <li class="divider"></li>
            <li><a href="modificar.php" class="dropdown-button">Actualizar Datos </a></li>
          
          
          </ul>

          <ul id="dropdown31" class="dropdown-content">
           
            <li><a href="VPA.php" class="dropdown-button">Proyectos</a></li>
              <li class="divider"></li>
            <li><a href="modificar.php" class="dropdown-button">Actualizar Datos </a></li>
          
          
          </ul>
<!--////////////////////////////INSTRUCTOR//////////////////////-->
          <ul id="dropdown4" class="dropdown-content">
           
           <li><a href="VPA.php" class="dropdown-button">Proyectos</a></li>
              <li class="divider"></li>
          </ul>

          <ul id="dropdown41" class="dropdown-content">
           
           <li><a href="VPA.php" class="dropdown-button">Proyectos</a></li>
              <li class="divider"></li>
          </ul>
<!--///////////////////////APRENDIZ E INSTRUCTOR/////////////////////-->
            <ul id="dropdown5" class="dropdown-content">
            <li><a href="investigacion.php" class="dropdown-button">Investigación </a></li>
            <li class="divider"></li>
            <li class="divider"></li>
            <li><a href="Innovacion.php" class="dropdown-button">Innovación </a></li>
            <li class="divider"></li>
            <li><a href="Servicios.php" class="dropdown-button">Serviciós tecnólogicos </a></li>
            <li class="divider"></li>
            <li><a href="Modernizacion.php" class="dropdown-button">Modernzación </a></li>
            <li class="divider"></li>
            <li><a href="divulgacion.php" class="dropdown-button">Divulgación </a></li>
            <li class="divider"></li>
    
            </ul>

             <ul id="dropdown51" class="dropdown-content">
            <li><a href="investigacion.php" class="dropdown-button">Investigación </a></li>
            <li class="divider"></li>
            <li><a href="Innovacion.php" class="dropdown-button">Innovación </a></li>
            <li class="divider"></li>
            <li><a href="Servicios.php" class="dropdown-button">Serviciós tecnólogicos </a></li>
            <li class="divider"></li>
            <li><a href="Modernizacion.php" class="dropdown-button">Modernzación </a></li>
            <li class="divider"></li>
            <li><a href="divulgacion.php" class="dropdown-button">Divulgación </a></li>
            <li class="divider"></li>
    
            </ul>
<!--////////////////////OPCION DE SALIDA/////////////////-->
            <ul id="dropdown6" class="dropdown-content">
            <li><a  href="../logear.php" class="dropdown-button">Salir</a></li>
            
            </ul>

            <ul id="dropdown61" class="dropdown-content">
            <li><a  href="../logear.php" class="dropdown-button">Salir</a></li>
            
            </ul>

 <script> $(document).ready(function(){ $('body').find('img[src$="https://cdn.rawgit.com/000webhost/logo/e9bd13f7/footer-powered-by-000webhost-white2.png"]').remove(); }); </script>
