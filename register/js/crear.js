
function agregar(){
	if(document.getElementById("cedula").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > Digite Identificacion</span></div></div>';
	document.getElementById("cedula").focus();
	return;
	}else if(document.getElementById("nombre").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > Digite los Nombres</span></div></div>';
	document.getElementById("nombre").focus();
	return;
	}else if(document.getElementById("apellidos").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > Digite los Apellidos </span></div></div>';
	document.getElementById("apellidos").focus();
	return;
	}else if(document.getElementById("Rol").value==0){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > Seleccione el cargo </span></div></div>';
	document.getElementById("Rol").focus();
	return;
	}else if(document.getElementById("profe").value==0){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > profesion </span></div></div>';
	document.getElementById("profe").focus();
	return;
	}else if(document.getElementById("Formacion").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su Formacion</span></div></div>';
	document.getElementById("Formacion").focus();
	return;
	}else if(document.getElementById("jornada").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su jornada</span></div></div>';
	document.getElementById("jornada").focus();
	return;
	}else if(document.getElementById("ficha").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su ficha</span></div></div>';
	document.getElementById("ficha").focus();
	return;
	}else if(document.getElementById("Dir").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su direccion</span></div></div>';
	document.getElementById("Dir").focus();
	return;
	}else if(document.getElementById("tel").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su telefono</span></div></div>';
	document.getElementById("tel").focus();
	return;
	}else if(document.getElementById("correo").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su correo eletronico</span></div></div>';
	document.getElementById("correo").focus();
	return;
	}else if(document.getElementById("genero").value==0){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite genero</span></div></div>';
	document.getElementById("genero").focus();
	return;
	}else if(document.getElementById("fnaci").value==0){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su fecha de nacimiento</span></div></div>';
	document.getElementById("fnaci").focus();
	return
	}else if(document.getElementById("clave").value==""){
	document.getElementById('res').innerHTML =  '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img><span class="error" > digite su clave</span></div></div>';
	document.getElementById("clave").focus();
	return;
	}else{
	document.getElementById('res').innerHTML = '';

	}
	$.ajax({
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
				   		//alert(response);**
		               if (response==0){
		               	
						document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >no pudo registrarse </span><br><br></div><br><br><br></div>';		            
					}else if(response==1){
		              document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >usuario registrado</span><br><br></div><br><br><br></div>';
		            }
		          }
				  
				});


}
	