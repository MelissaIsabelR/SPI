function insertarCapa(){
    if(document.getElementById("mensaje").value==""){
	document.getElementById('res').innerHTML = 'Rellene este campo';
	document.getElementById("mensaje").focus();
	return;
	}else if(document.getElementById("nombre").value==""){
	document.getElementById('res').innerHTML = 'Rellene este campo';
	document.getElementById("nombre").focus();
	return;
    }else if(document.getElementById("dir").value==""){
	document.getElementById('res').innerHTML = 'Rellene este campo';
	document.getElementById("dir").focus();
	return;
    }else if(document.getElementById("lugar").value==""){
	document.getElementById('res').innerHTML = 'Rellene este campo';
	document.getElementById("lugar").focus();
	return;
    }else if(document.getElementById("fechaini").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la fecha';
	document.getElementById("fechaini").focus();
	return;
    }else if(document.getElementById("fechafin").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la fecha';
	document.getElementById("fechafin").focus();
	return;
    }else if(document.getElementById("hora").value==""){
	document.getElementById('res').innerHTML = 'Rellene este campo';
	document.getElementById("hora").focus();
	return;
    }else if(document.getElementById("dictador").value==""){
	document.getElementById('res').innerHTML = 'Rellene este campo';
	document.getElementById("dictador").focus();
	return;
    }else{
       	$.ajax({
				  url: "Capacitaciones/insertar.php",
				  data: {
				  	    mensaje : $("#mensaje").val(),
				  	    nombre : $("#nombre").val(),
						dir : $("#dir").val(),
						lugar: $("#lugar").val(),
						fechaini: $("#fechaini").val(),
						fechafin: $("#fechafin").val(),
						hora: $("#hora").val(),
						dictador: $("#dictador").val(),
						estado: $("#estado").prop("checked")
						},
				  type: "POST",
				  
				  success: function(response){
				  	//alert(response)
				     if (response==0){
		           		alertify.error('Error al Grabar');
					}else if(response==1){
						alertify.success('Datos Grabados Correctamente');
		            }
						location.reload(true);	  
					}
				  
				});
       }
   }

			function actualCapa(codigo){
				acnombre="#acnombre"+codigo;
				acdir="#acdir"+codigo;
				aclugar="#aclugar"+codigo;
				acfechaini="#acfechaini"+codigo;
				acfechafin="#acfechafin"+codigo;
				achora="#achora"+codigo;
				acdictador="#acdictador"+codigo;
				accodigo="#codigo"+codigo;
				acestado="#estado"+codigo;
				$.ajax({
				
				  url: "Capacitaciones/Actcapa.php",
				  data: {

						acnombre: $(acnombre).val(),
						acdir : $(acdir).val(),
						aclugar: $(aclugar).val(),
						acfechaini: $(acfechaini).val(),
						acfechafin: $(acfechafin).val(),
						achora: $(achora).val(),
						acdictador: $(acdictador).val(),
						codigo: $(accodigo).val(),
						estado: $(acestado).prop("checked")
						},
				  type: "POST",
				  
				  success: function(response){

				     if (response==0){
		           		alertify.error('Error al editar');
					}else if(response==1){
						alertify.success('Datos editados Correctamente');
		            }
						location.reload(true);
					}

				  
				});

			}
			function EliminarCapa(codigo){
				 swal({
				  title: "Eliminar",
				  text: "seguro que desea Eliminar?",
				  type: "",
				  showCancelButton: true,
				 confirmButtonColor: "green",
				  confirmButtonText: "Aceptar",
				  cancelButtonText: "Cancelar",
				  closeOnConfirm: false, 
					
				  },

					function(){
				    
				    $.ajax({
				
				  url: "Capacitaciones/ElimCapa.php",
				  data: {

						codi_capa: codigo
						
						},
				  type: "POST",
				  
				  success: function(response){

				    if (response==0){
		           		alertify.error('Error al Eliminar Capacitacion');
					}else if(response==1){
						alertify.success('Capacitacion Eliminada');
		            }

		            	 location.reload(true);

					}
				  
					});

				});
		}
				 
 