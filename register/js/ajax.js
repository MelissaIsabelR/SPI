
function agregar(){
	if(document.getElementById("cedula").value==""){
	document.getElementById('res').innerHTML = '<nav></nav>';
	document.getElementById("cedula").focus();
	return;
	}else if(document.getElementById("nombre").value==""){
	document.getElementById('res').innerHTML = 'Digite El Nombre';
	document.getElementById("nombre").focus();
	return;
	}else if(document.getElementById("apellidos").value==""){
	document.getElementById('res').innerHTML = 'Digite El apellidos';
	document.getElementById("apellidos").focus();
	return;
	}else if(document.getElementById("Rol").value==0){
	document.getElementById('res').innerHTML = 'Digite El Rol';
	document.getElementById("Rol").focus();
	return;
	}else if(document.getElementById("profe").value==0){
	document.getElementById('res').innerHTML = 'Digite profe';
	document.getElementById("profe").focus();
	return;
	}else if(document.getElementById("Formacion").value==""){
	document.getElementById('res').innerHTML = 'Digite Formacion';
	document.getElementById("Formacion").focus();
	return;
	}else if(document.getElementById("jornada").value==""){
	document.getElementById('res').innerHTML = 'Digite jornada';
	document.getElementById("jornada").focus();
	return;
	}else if(document.getElementById("ficha").value==""){
	document.getElementById('res').innerHTML = 'Digite ficha';
	document.getElementById("ficha").focus();
	return;
	}else if(document.getElementById("Dir").value==""){
	document.getElementById('res').innerHTML = 'Digite Dir';
	document.getElementById("Dir").focus();
	return;
	}else if(document.getElementById("tel").value==""){
	document.getElementById('res').innerHTML = 'Digite tel';
	document.getElementById("tel").focus();
	return;
	}else if(document.getElementById("correo").value==""){
	document.getElementById('res').innerHTML = 'Digite correo';
	document.getElementById("correo").focus();
	return;
	}else if(document.getElementById("genero").value==""){
	document.getElementById('res').innerHTML = 'Digite genero';
	document.getElementById("genero").focus();
	return;
	}else if(document.getElementById("fnaci").value==""){
	document.getElementById('res').innerHTML = 'Digite fnaci';
	document.getElementById("fnaci").focus();
	return;
	}else if(document.getElementById("clave").value==""){
	document.getElementById('res').innerHTML = 'Digite clave';
	document.getElementById("clave").focus();
	return;
	}else{
	document.getElementById('res').innerHTML = '';

	}$.ajax({
				  url: "insertar.php",
				  data: {cedula : $("#cedula").val(),
						nombre : $("#nombre").val(),
						apellidos : $("#apellidos").val(),
						Rol: $("#Rol").val(),
						profe: $("#profe").val(),
						Formacion: $("#Formacion").val(),
						jornada: $("#jornada").val(),
						ficha: $("#ficha").val(),
						Dir: $("#Dir").val(),
						tel: $("#tel").val(),
						correo: $("#correo").val(),
						genero: $("#genero").val(),
						fnaci: $("#fnaci").val(),
						clave: $("#clave").val(),
						confclave: $("#confclave").val()},
				  type: "POST",
				  
				   success: function(response){
		               if (response==0){
                  	document.getElementById('res').innerHTML = 'Error al Grabar Datos';
		            }else if(response==1){
		               document.getElementById('res').innerHTML = 'Datos Grabados';
		            }
		          }
				  
				});
}