
  function Vfecha(){
            FechaNac=document.getElementById('fech_ini_pro').value;
            //alert(FechaNac);

            var hoy = new Date();
            var dd = hoy.getDate();
            var mm= hoy.getMonth()+1;

            var yyyy = hoy.getFullYear();

            if (dd<10) {
              dd='0'+dd
            }
            if (mm<10) {
              mm='0'+mm
            }
            hoy = yyyy+'-'+mm+'-'+dd;

           // alert(hoy);

            if (FechaNac>hoy) {
              //document.getElementById('agregar').disabled=false;
              // VaFecha=INNER.HTML('FDSSDFS');
              $("#Valfecha").html('<STRONG style="color:red;">la fecha de inicio del proyecto incorrecta</STRONG>');
             /* f=document.getElementById("EnPr").style;
              f.display='none';*/
          
            }else{
              $("#Valfecha").html('');
             /* f=document.getElementById("EnPr").style;
              f.display='block';*/
            }

          }

            function Vfecha2(){
            FechaNac=document.getElementById('fech_fin_pro').value;
            //alert(FechaNac);

            var hoy = new Date();
            var dd = hoy.getDate();
            var mm= hoy.getMonth()+1;

            var yyyy = hoy.getFullYear();

            if (dd<10) {
              dd='0'+dd
            }
            if (mm<10) {
              mm='0'+mm
            }
            hoy = yyyy+'-'+mm+'-'+dd;

           // alert(hoy);

            if (FechaNac<hoy) {
              //document.getElementById('agregar').disabled=false;
              // VaFecha=INNER.HTML('FDSSDFS');
              $("#Valfecha2").html('<STRONG style="color:red;">la fecha de fin del proyecto incorrecta</STRONG>');
             /* f=document.getElementById("Valfecha").style;
              f.display='none';*/
          
            }else{
              $("#Valfecha2").html('');
             /* f=document.getElementById("Valfecha").style;
              f.display='block';*/
            }

          }