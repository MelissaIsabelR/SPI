////////////////////////////////////GUARDAR SEMILLEOS///////////////////////////////////////
 function agregaSemill(){
  if(document.getElementById("nombreSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("nombreSemille").focus();
  return;
  }else if(document.getElementById("apellidoSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("apellidoSemille").focus();
  return;
  }else if(document.getElementById("fichaSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("fichaSemille").focus();
  return;
  }else if(document.getElementById("programaSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Seleccione su programa de formacion';
  document.getElementById("programaSemille").focus();
  return;
  }else if(document.getElementById("documentoSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("documentoSemille").focus();
  return;
  }else if(document.getElementById("correoSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("correoSemille").focus();
  return;
  }else if(document.getElementById("telefonoSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("telefonoSemille").focus();
  return;
  }else if(document.getElementById("fechanaSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Seleccione la Fecha';
  document.getElementById("fechanaSemille").focus();
  return;
  }else if(document.getElementById("periactSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Seleccione la Fecha';
  document.getElementById("periactSemille").focus();
  return;
  }else if(document.getElementById("instecSemille").value==0){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("instecSemille").focus();
  return;
  }else if(document.getElementById("corrinsSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("corrinsSemille").focus();
  return;
  }else if(document.getElementById("opcexperienciaSemille").value==0){
  document.getElementById('respSemill').innerHTML = 'Seleccione si tiene alguna experiencia';
  document.getElementById("opcexperienciaSemille").focus();
  return;
  }else if(document.getElementById("experienciaSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("experienciaSemille").focus();
  return;
  }else if(document.getElementById("opcinclinacionSemille").value==0){
  document.getElementById('respSemill').innerHTML = 'Seleccione si tiene alguna Inclinacion';
  document.getElementById("opcinclinacionSemille").focus();
  return;
  }else if(document.getElementById("inclinacionSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("inclinacionSemille").focus();
  return;
  }else if(document.getElementById("actividadesSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("actividadesSemille").focus();
  return;
  }else if(document.getElementById("habilidadesSemille").value==""){
  document.getElementById('respSemill').innerHTML = 'Completa este Campo';
  document.getElementById("habilidadesSemille").focus();
  return;
  }else if(document.getElementById("fechai1Semille").value==""){
  document.getElementById('respSemill').innerHTML = 'Seleccione la Fecha';
  document.getElementById("fechai1Semille").focus();
  return;
  }else if(document.getElementById("fechai2Semille").value==""){
  document.getElementById('respSemill').innerHTML = 'Seleccione la Fecha';
  document.getElementById("fechai2Semille").focus();
  return;
  }else{
  document.getElementById('respSemill').innerHTML = '';
    } $.ajax({
          url: "Semillero/insertarSemillero.php",
          data: {nombre : $("#nombreSemille").val(),
            apellido : $("#apellidoSemille").val(),
            ficha : $("#fichaSemille").val(),
            programa: $("#programaSemille").val(),
            documento: $("#documentoSemille").val(),
            correo: $("#correoSemille").val(),
            telefono : $("#telefonoSemille").val(),
            fechana : $("#fechanaSemille").val(),
            inifor  : $("#iniforSemille").val(),
            periact  : $("#periactSemille").val(),
            finaeta  : $("#finaetaSemille").val(),
            instec  : $("#instecSemille").val(),
            corrins : $("#corrinsSemille").val(),
            opcexperiencia : $("#opcexperienciaSemille").val(),
            experiencia  : $("#experienciaSemille").val(),
            opcinclinacion  : $("#opcinclinacionSemille").val(),
            inclinacion  : $("#inclinacionSemille").val(),
            actividades  : $("#actividadesSemille").val(),
            habilidades  : $("#habilidadesSemille").val(),
            fechai1      : $("#fechai1Semille").val(),
            fechai2  : $("#fechai2Semille").val()},
          type: "POST",
           
              success: function(response){
              //alert(response);
              //$('respSemill').html(response);
              if (response==0){
                   //swal("Error!", "Error al Guardar.", "error"); 
                    swal({title: "Error",text: "Error al Guardar",type: "error",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="Sesion.php"});
                //document.getElementById('respSemill').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >no pudo registrarse </span><br><br></div><br><br><br></div>';                
              }else if(response==1){
                      //document.getElementById('respSemill').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >Semillero registrado</span><br><br></div><br><br><br></div>';
                    swal({title: "Guardado",text: "Datos Guardados Correctamente",type: "success",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="Sesion.php"});
                    }
              }
        }); 
 
}



  
  