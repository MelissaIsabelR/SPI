function agregarSemill(){

	if( document.getElementById("nombre").value==""){
    alert("nombre");
	}else if(document.getElementById("apellido").value==""){
	alert("nombre");
	}else if(document.getElementById("ficha").value==""){
	alert()
	}else if(document.getElementById("programa").value==""){
	alert()
	}else if(document.getElementById("documento").value==""){
	alert()
	}else if(document.getElementById("correo").value==""){
	alert()
	}else if(document.getElementById("telefono").value==""){
	alert()
	}else if(document.getElementById("fechana").value==""){
	alert()
	}else if(document.getElementById("inifor").value==""){
	alert()
	}else if(document.getElementById("periact").value==""){
	alert()
	}else if(document.getElementById("finaeta").value==""){
	alert()
	}else if(document.getElementById("instec").value==0){
	alert()
	}else if(document.getElementById("corrins").value==""){
	alert()
	}else if(document.getElementById("opcexperiencia").value==0){
	alert()
	}else if(document.getElementById("experiencia").value==""){
	alert()
	}else if(document.getElementById("opcinclinacion").value==0){
	alert()
	}else if(document.getElementById("inclinacion").value==""){
	alert()
	}else if(document.getElementById("actividades").value==""){
	alert()
	}else if(document.getElementById("habilidades").value==""){
	alert()
	}else if(document.getElementById("firmapre").value==""){
	alert()
	}else if(document.getElementById("firmins").value==""){
	alert()
	}else if(document.getElementById("ceduapre").value==""){
	alert()
	}else if(document.getElementById("ceduins").value==""){
	alert()
	}else if(document.getElementById("fechai1").value==""){
	alert()
	}else if(document.getElementById("fechai2").value==""){
	alert()
	}else{
	
     $.ajax({
          url: "semillero/insertar.php",
          data: {nombre : $("#nombre").val(),
            apellido : $("#apellido").val(),
            ficha : $("#ficha").val(),
            programa: $("#programa").val(),
            documento: $("#documento").val(),
            correo: $("#correo").val(),
            telefono : $("#telefono").val(),
            fechana : $("#fechana").val(),
            inifor  : $("#inifor").val(),
            periact  : $("#periact").val(),
            finaeta  : $("#finaeta").val(),
            instec  : $("#instec").val(),
            corrins : $("#corrins").val(),
            opcexperiencia : $("#opcexperiencia").val(),
            experiencia  : $("#experiencia").val(),
            opcinclinacion  : $("#opcinclinacion").val(),
            inclinacion  : $("#inclinacion").val(),
            actividades  : $("#actividades").val(),
            habilidades  : $("#habilidades").val(),
            firmapre     : $("#firmapre").val(),
            firmins      : $("#firmins").val(),
            ceduapre     : $("#ceduapre").val(),
            ceduins      : $("#ceduins").val(),
            fechai1      : $("#fechai1").val(),
            fechai2  : $("#fechai2").val()},
          type: "POST",
           
          		success: function(response){
				   		//alert(response);**
		               if (response==0){		
						alertify.error('Error al Guardar Informacion');
					}else if(response==1){	
						alertify.success('Semillero Registrado');
		              }
		          }
        }); 
 
}
}


	
	