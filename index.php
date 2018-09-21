<?php
/*include("val.php");*/
?>
<!DOCTYPE html>
<html>
<head lang="es">
	<meta charset="utf-8">
	<title>SPI</title>
	<link rel="stylesheet" type="text/css" href="css/materialize.min.css">
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<link rel="icon" type="image/png" href="img/favicon.ico" />
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<link type="text/css" rel="stylesheet" href="css/style.css"/>
	 <link type="text/css" rel="stylesheet" href="css/animate.css"/>
</head>
<body>
<nav>
  <div class="nav-wrapper orange">
    <a href="#" class="brand-logo">SPI</a>
    <!--<ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="#">Sass</a></li>
      <li><a href="#">Components</a></li>
      <li><a href="#">JavaScript</a></li>-->
    </ul>
  </div>
</nav><br>
<!--Menu de navegacion-->
<div id="header">
			<ul  class="nav">
				<li><a href="register/registrarse.php">Registrate</a>
					
				</li>
				<li><a href="logear.php">Iniciar Sesión</a></li>
				<!--
				<div id="miModal" class="modal">
				  <div class="modal-contenido">
				    <a id="closelogin" href="#">X</a>
				    <h2>LOGIN</h2><hr>
				    <p>Identificación:</p>
				    <input type="number" name="">
				    <p>Contraseña:</p>
				    <input type="password" name="">
				    <br><br>
				    <button id="loger">INGRESAR</button>
				  </div>
				</div>-->
			</ul>
		</div>
		<br>
<!--Menu de navegacion-->
<div class="rotateInUpLeft animated">
<div class="container">
    <div class="row">
			<br><br>
			<hr color="orange">
			<br>
			<img id="senn" alt="Imagen sennova" src="img/sennova.png"/>
			<hr color="orange">
			<br><br>
    	<div class="grid-example col s12">
			<!--<h4>Noticias</h4>-->
			<!--<span class="flow-text blue-text text-darken-2">I am always full-width (col s12) entonces los peces nadan en el agua de forma pero que es lo que pasa, es que llega un pescador y los mata XDDDDD s s s s s s s s s socialmente loca, sin llevar un rumbo fijo.</span>-->
			<?php 
			include("conexion.php");
			 ?>
			<?php
			/*	
				$consulta = "SELECT * FROM notices";
				if ($resultado = $mysqli->query($consulta)){
					while ($row=$resultado->fetch_object()) {
						$not = htmlentities($row->noticias, ENT_QUOTES, "UTF-8");
						echo "<p>".$not."</p>";
					}
				}else{
					echo "Error en la consulta!";
				}
				$resultado->free();
				$mysqli->close();
			*/
			?>
			<br>
			<h4>¿Que son los semilleros de investigación?</h4>
			<p>El SENA lidera programas que buscan fomentar la cultura del emprendimiento, identificar oportunidades e ideas de negocios, orientar hacia a los innovadores con las fuentes de financiación existentes en el mercado y generar valor diferencial, para generar microempresas.
			<br><br>
			El Sistema de Investigación, Desarrollo Tecnológico e Investigación (SENNOVA) tiene el propósito de fortalecer los estándares de calidad y pertinencia, en las áreas de investigación, desarrollo tecnológico e innovación, de la formación profesional impartida en la Entidad.
			<br><br>
			A través de esta estrategia, la Institución reúne las diferentes líneas, programas y proyectos de cultura e innovación que tiene dentro de su estructura, entre ellas Tecnoacademias, Tecnoparques, investigación aplicada, investigación en formación profesional, programas de fomento a la innovación empresarial y extensionismo tecnológico.
			<br><br>
			Toda la omunidad SENA hace parte de SENNOVA, una iniciativa por medio de la cual aprendices e instructores tienen la oportunidad de participar y adquirir conocimientos.</p>
			<br><br>
			<h4>¿Qué hace?</h4>
			<p>Con el fin de fortalecer competencias orientadas al uso, aplicación y desarrollo de tecnologías avanzadas, por medio de las Tecnoacademias, SENNOVA genera cultura de innovación y competitividad en jóvenes de secundaria.
			<br><br>
			Además se fomenta el desarrollo de investigaciones científicas desde la educación media con aplicación de nuevas tecnologías como polo de desarrollo local y regional.
			<br><br>
			SENNOVA también realiza eventos de divulgación de ciencia, tecnología e innovación, como foros, seminarios y conferencias con expertos, con lo que se busca que el país tenga mayor competitividad.</p>
			<br><br>
			<h4>Objetivos.</h4>
			<blockquote >
			<li>Formar capital humano con habilidades y destrezas que incrementen la capacidad de innovación de las empresas colombianas.</li>
			<li>Capacitar técnicos y tecnólogos para la ciencia, la tecnología y la innovación.</li>
			<li>Contribuir a la pertinencia de la formación profesional, a través de nuevas tecnologías que se incorporen a los programas de formación profesional integral.</li>
			<li>Orientar la creativida​d de los trabajadores colombianos y de los aprendices en general, a través del desarrollo de las habilidades y competencias en investigación, desarrollo e innovación.</li>
			</blockquote>
			<br><br>
			<h4>Investigación</h4><br>
			<p>
				La investigación aplicada es una herramienta formativa que desarrolla SENNOVA a través de diferentes proyectos de formación.<br><br>El aprendiz participa activamente en la investigación del SENA a partir de los siguientes instrumentos:<br><br>
			</p><br>
			<blockquote>
			<li>Semilleros de investigación.</li>
			<li>Grupos de investigación aplicada.</li>
			<li>Desarrollo de proyectos de investigación aplicada y desarrollo tecnológico  por redes de conocimiento, en los centros de formación.​</li>
			</blockquote>
			<br>
			<p>Igualmente, la Investigación en Formación Profesional es un grupo específico que apoya el modelo de pertinencia de la Institución en temas priorizados como: datos y estadísticas de la capacitación; costos y beneficios de los diferentes modelos de formación; anticipación de necesidades; vigilancia y prospectiva tecnológica; y seguimiento a egresados.​</p>
			<br>
			<h4>Apoyo al desarrollo tecnológico y a la innovación</h4>
			<p>​Los proyectos de investigación aplicada formativa de los aprendices se convierte en nuevas tecnologías y en oportunidades productivas. La Red  Tecnoparque Colombia, a través de sus 15 nodos, es el eje central del sistema SENNOVA y materializa los
			proyectos.<br>
			Tecnoparque es el enlace entre los centros de formación y el Sistema de Ciencia, Tecnología e Innovación.</p><br><br>
			<h4>Fomento de actividades</h4>
			<p>SENNOVA cuenta con publicaciones científicas y tecnológicas, además de un manual de propiedad intelectual y con un amplio portafolio de servicios disponible.</p>
  	</div>
		<br>

	</div>
</div>
		<!--Pie de pagina-->
	<?php include("pie.php"); ?>
<!--Pie de pagina-->
<script src="js/jquery-3.2.1.js"></script>
<script src="js/materialize.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>
