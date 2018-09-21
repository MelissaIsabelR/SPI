$(document).ready(function(){
    $("#verProgs").click(function(){
        $("#contProg").toggle('slow');
    });


    $(".AsigLiProg").click(function(){    	
        var alerta = alertify.alert('Asignación de área',"¿Desea asignar esta área? <br/>"+$(this).text());
        alerta.set({'closableByDimmer': false});
        alerta.set({'label': 'Aceptar'}); 
        
    });

});

