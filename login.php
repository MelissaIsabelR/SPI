<?php ob_start (); ?>
<?php session_start(); ?>
<html>
<head>
  
  <script type="text/javascript" src="js/alertify.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/alertify.min.css">
  <link rel="stylesheet" type="text/css" href="css/themes/bootstrap.min.css">

  <script src="alertas/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="alertas/dist/sweetalert.css">
</head>
</html>
<?php
	include("conexion.php");

		$usuario = $_POST['user'];
		$password = sha1($_POST['pass']);
		$conn = new mysqli($local,$user,$pass,$base);
		
		      $user_id=" ";

			    $query = "SELECT * FROM registros WHERE cedula='$usuario' AND clave='$password'";
	        $resultado = $conn->query($query);

	    if (mysqli_num_rows($resultado) == 1){
				$_SESSION["nombre"] = $usuario;
				$_SESSION["contra"] = $password;
        $user_id=" ";
        $consulta = "select * from registros where cedula='$usuario' and clave='$password'";
        $resultado = $conn->query($consulta);

        while($row = mysqli_fetch_array($resultado)){ 
        $user_id=$row["cedula"];
        $nombre=utf8_encode($row["nombre"]);
        $apellido=utf8_encode($row["apellidos"]);
        $rol=$row["Rol"];
        $usu=$nombre." ".$apellido;
        $cargo=$rol;
        //echo $user_id;
        //break;
          if ($rol==1){
       //print "<script>alert('hola intructor');</script>";
          }else if ($rol==2){
               // print "<script>alert('hola aprendiz');</script>";
          }

          if($cargo==2){    
            $cargo="Aprendiz";           
          }else if($cargo==1){
            $cargo="Instructor";
          }else if($cargo==3){
            $cargo="Administrador";
          }
             
            
      }
      if ($cargo=="Aprendiz") {
        $consulta2 = "select * from semilleros where documento='$usuario'";
        $resultado2 = $conn->query($consulta2);
         if($row2 = mysqli_fetch_array($resultado2)){
        //while($row2 = mysqli_fetch_array($resultado2)){
           $estado=$row2['estado'];
         //}
           
            if ($estado=="A"){
              //echo "el semilleros esta ctivo"; 

               $_SESSION["user_id"]=$user_id;
                $_SESSION['loggedin'] = true;
                $_SESSION['cargo'] = $cargo;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
            ?>
            <!--  <body onload='swal({title: "Bienvenido!",text: "",imageUrl: "img/usuario.png"});'> 
 -->
 <body onload='swal({title: "Bienvenido",text: "",imageUrl: "img/usuario.png",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="principal/Sesion.php"});'>

             <?php
              header('refresh:2; url=principal/Sesion.php');
              //echo "<script>alert(\"$user_id, $username.\");</script>";
         // header('refresh:2; url=principal/Sesion.php'); 

            }else{
              //echo "el semilleros no esta ctivo"; 
              ?>
              <!-- 
             <body onload='swal("Advertencia!", "Usted se encuentra Inactivo", "warning");'>
 -->
              <body onload='swal({title: "Advertencia",text: "Usted se encuentra Inactivo",type: "warning",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="logear.php"});'>

             <?php
                           header('refresh:2; url=logear.php');

              //echo "<script>alert(\"$user_id, $username.\");</script>";
             // header('refresh:2; url=login.html');
          
            }
        }else{
          //echo "no es semilleros";
                $_SESSION["user_id"]=$user_id;
                $_SESSION['loggedin'] = true;
                $_SESSION['cargo'] = $cargo;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
            ?>
           <!--  <body onload='swal({title: "Bienvenido!",text: "",imageUrl: "img/usuario.png"});'>  -->

             <body onload='swal({title: "Bienvenido",text: "",imageUrl: "img/usuario.png",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="principal/Sesion.php"});'>
             <?php
            header('refresh:2; url=principal/Sesion.php');

              //echo "<script>alert(\"$user_id, $username.\");</script>";
         // header('refresh:2; url=principal/Sesion.php'); 
        }

      }elseif($cargo=="Instructor" or $cargo=="Administrador"){
             if($user_id==" "){
            ?>

             <body onload='swal({title: "Error",text: "El Usuario o la Contraseña son Incorrectos.",imageUrl: "img/usuario.png",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="logear.php"});'>

            <?php
                header('refresh:2; url=logear.php');

            //echo "<script>alert(\"$user_id, $username.\");</script>";
            }else{
              //session_start();
              $_SESSION["user_id"]=$user_id;
              $_SESSION['loggedin'] = true;
                $_SESSION['usu'] = $usu;
                $_SESSION['cargo'] = $cargo;
                $_SESSION['start'] = time();
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
            
              ?>
             <!--   <body onload='swal({title: "Bienvenido!",text: "<?php echo $_SESSION['usu']; ?>",imageUrl: "img/usuario.png"});'> 
 -->
               <body onload='swal({title: "Bienvenido",text: "<?php echo $_SESSION['usu']; ?>",imageUrl: "img/usuario.png",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="principal/Sesion.php"});'>
             <?php
             header('refresh:2; url=principal/Sesion.php');

              //echo "<script>alert(\"$user_id, $username.\");</script>";
          //header('refresh:2; url=principal/Sesion.php');       
            }
      }
    
	}else{
         ?>
        <!--  <body onload='swal("Error!", "El Usuario o la Contraseña son Incorrectos.", "error");'>
 -->
                   <body onload='swal({title: "Error",text: "El Usuario o la Contraseña son Incorrectos.",type:"error" ,showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="logear.php"});'>

         <?php 
         header('refresh:2; url=logear.php');
        //header('refresh:2; url=login.html');

  }
	

?>