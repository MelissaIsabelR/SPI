

<head>
	
<h5>Activos</h5>
<hr color="green">
<?php

	$conn = new mysqli($local,$user,$pass,$base);
	//mysql_query ("SET NAMES 'utf8'");
	//mysql_query("SET NAMES UTF8");
	$hoy = getdate();
	//print_r($hoy);
	//echo $consulta;
	$d = $hoy['mday'];
    $m = $hoy['mon'];
    $y = $hoy['year'];
    $consulta = "UPDATE semilleros SET estado= 'I' WHERE fechai2 < '".$y."-".$m."-".$d."' AND estado = 'A'";
    if ($resultado = $conn->query($consulta)) {
    }
	$consulta = "SELECT documento, nombre, apellido, fechai1, fechai2, estado FROM semilleros WHERE estado = 'A'";
	//mysql_query("SET NAMES UTF8");
	if ($resultado = $conn->query($consulta)) {
		$tabla="<table class='centered bordered'>";
		$tabla.="<thead>";
				$tabla.="<th>Documento</th>";
				$tabla.="<th>Nombres</th>";
				$tabla.="<th>Apellidos</th>";
				$tabla.="<th>Fecha de inicio</th>";
				$tabla.="<th>Fecha de fin</th>";
				$tabla.="<th>Estado</th>";
			$tabla.="</thead>";
			$tabla.="<tbody>";
		while ($fila = $resultado->fetch_assoc()) {
			$tabla.="<tr>";
				$tabla.="<td>".$fila["documento"]."</td>";
				$tabla.="<td>".$fila["nombre"]."</td>";
				$tabla.="<td>".$fila["apellido"]."</td>";
				$tabla.="<td>".$fila["fechai1"]."</td>";
				$tabla.="<td>".$fila["fechai2"]."</td>";
				$tabla.="<td class='green-text'>".$fila["estado"]."</td>";
			$tabla.="</tr>";
		}
			$tabla.="</tbody>";
		$tabla.="</table>";

		$resultado->free();
	}
	$conn->close();
	//echo htmlentities($tabla,ENT_QUOTES,"UTF-8");
	//echo htmlentities(utf8_decode($tabla));
	//echo htmlentities($tabla);
	echo ($tabla);
?>
<br>
<h5>Inactivos</h5>
<hr color="red">
<?php
	$conn = new mysqli($local,$user,$pass,$base);
	$consulta = "SELECT documento, nombre, apellido, fechai1, fechai2, estado FROM semilleros WHERE estado ='I'";
	if ($resultado = $conn->query($consulta)) {
		$tabla="<table class='centered bordered'>";
		$tabla.="<thead>";
				$tabla.="<th>Documento</th>";
				$tabla.="<th>Nombres</th>";
				$tabla.="<th>Apellidos</th>";
				$tabla.="<th>Fecha de inicio</th>";
				$tabla.="<th>Fecha de fin</th>";
				$tabla.="<th>Estado</th>";
			$tabla.="</thead>";
			$tabla.="<tbody>";
		while ($fila = $resultado->fetch_assoc()) {
			$tabla.="<tr>";
				$tabla.="<td>".$fila["documento"]."</td>";
				$tabla.="<td>".$fila["nombre"]."</td>";
				$tabla.="<td>".$fila["apellido"]."</td>";
				$tabla.="<td>".$fila["fechai1"]."</td>";
				$tabla.="<td>".$fila["fechai2"]."</td>";
				$tabla.="<td class='red-text'>".$fila["estado"]."</td>";
			$tabla.="</tr>";
		}
			$tabla.="</tbody>";
		$tabla.="</table>";

		$resultado->free();
	}
	$conn->close();
	echo ($tabla);
?>
<br>
<!--Pie de pagina-->
	<!--<footer class="page-footer teal darken-1">
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
            © 2016 Copyright Text
            <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
            </div>
          </div>
        </footer>-->
<!--Pie de pagina-->

</body>
</html>