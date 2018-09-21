<!DOCTYPE html>
<?php 
@session_start();
@session_destroy();
?>
<html lang="es">
<head>
	<title>Login</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	 <link rel="stylesheet" type="text/css" href="css/icon.css">
<!--	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">-->
  	<!--Import materialize.css-->
  	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link rel="icon" type="image/png" href="img/favicon.ico" />
  <link type="text/css" rel="stylesheet" href="css/animate.css"/>
  	<!--Let browser know website is optimized for mobile-->
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<nav>
  <div class="nav-wrapper orange">
    <a href="index.php" class="brand-logo">SPI</a>
    <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#">Sass</a></li>
      <li><a href="#">Components</a></li>
      <li><a href="#">JavaScript</a></li>
    </ul>-->
  </div>
</nav>
<br>
<br>
<div class="bounceInLeft animated">
<div class="container">
<div class="container z-depth-4" >
  

  
  <nav class="nav-wrapper green"><!-- <h2 style="font-size:25px; text-align: center; color: white">Inicio de Sesion</h2> -->
    <a href="#" class="brand-logo center">Inicio de Sesion</a>
  </nav>
  <div class="container">
  <div class="row">
    <br>
    <br>
    <br>
    
 

      <form method="post" action="login.php" >
        <br>
        <br>
      
          <div class="input-field col s12">
             <i class="material-icons prefix">account_circle</i>
                <input autocomplete="off" name="user" type="text" class="validate" required>
                <label class="active" for="user">Usuario:</label>
            </div>
      
      <div class="input-field col s12">
             <i class="material-icons prefix">lock</i>
                <input  autocomplete="off" name="pass" type="password" class="validate" required>
                <label class="active" for="pass">Contraseña:</label>
      </div>
       
      <br><br><br><br><br><br><br><br><br><br>
      <center>
          <button class="btn waves-effect waves-ligth green text-darken-2" type="submit" name="action">ENTRAR
          
           </button>
           <br> <br>
 <br>
 <br> 
      </center>
       </form>
  </div>
  </div>
  </div>
  </div>
  </div>
<br><br><br><br><br><br>
<!--Pie de pagina-->
	<footer class="page-footer orange darken-1" >
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Footer Content</h5>
                <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>
<!--Pie de pagina-->
<!--</div>-->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/materialize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>