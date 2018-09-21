
	    function desactivar(){

	    	 $("#ValFecha").html('');
	    	 $("#res").html('');
	    	 
	    	var e = document.getElementById("Rol");
			if (e.options[e.selectedIndex].value== 1){

				ce=document.getElementById("cedula");
				ce.style.display='block';
				document.getElementById("cedula").value="";

				cla=document.getElementById("clave");
				cla.style.display='block';
				document.getElementById("clave").value="";

			 n=document.getElementById("nom");
				n.style.display='block';
				document.getElementById("nombre").value="";

					a=document.getElementById("apell");
				a.style.display='block';
				document.getElementById("apellidos").value="";

					p=document.getElementById("pro");
				p.style.display='block';
				document.getElementById("profe").value="";

					i=document.getElementById("dire");
				i.style.display='block';
				document.getElementById("Dir").value="";


					t=document.getElementById("tele");
				t.style.display='block';
				document.getElementById("tel").value="";


					c=document.getElementById("corr");
				c.style.display='block';
				document.getElementById("correo").value="";


					g=document.getElementById("gene");
				g.style.display='block';
				document.getElementById("genero").value="";

				f=document.getElementById("fecha");
				f.style.display='block';
				document.getElementById("fnaci").value="";
				

	    	}else if (e.options[e.selectedIndex].value== 2){
				
				ce=document.getElementById("cedula");
				ce.style.display='block';
				document.getElementById("cedula").value="";

				cla=document.getElementById("clave");
				cla.style.display='block';
				document.getElementById("clave").value="";

                n=document.getElementById("nom");
				n.style.display='none';
				document.getElementById("nombre").value="N/A";

					a=document.getElementById("apell");
				a.style.display='none';
				document.getElementById("apellidos").value="N/A";

					p=document.getElementById("pro");
				p.style.display='none';
				document.getElementById("profe").value="N/A";

					i=document.getElementById("dire");
				i.style.display='none';
				document.getElementById("Dir").value="N/A";


					t=document.getElementById("tele");
				t.style.display='none';
				document.getElementById("tel").value="N/A";


					c=document.getElementById("corr");
				c.style.display='none';
				document.getElementById("correo").value="N/A";


					g=document.getElementById("gene");
				g.style.display='none';
				document.getElementById("genero").value="1";

				f=document.getElementById("fecha");
				f.style.display='block';
				document.getElementById("fnaci").value=" ";



	    	}else if (e.options[e.selectedIndex].value== 3){
					 n=document.getElementById("nom");
				n.style.display='block';
				document.getElementById("nombre").value="";

					a=document.getElementById("apell");
				a.style.display='block';
				document.getElementById("apellidos").value="";

					p=document.getElementById("pro");
				p.style.display='none';
				document.getElementById("profe").value="N/A";

					i=document.getElementById("dire");
				i.style.display='block';
				document.getElementById("Dir").value="";


					t=document.getElementById("tele");
				t.style.display='block';
				document.getElementById("tel").value="";


					c=document.getElementById("corr");
				c.style.display='block';
				document.getElementById("correo").value="";


					g=document.getElementById("gene");
				g.style.display='block';
				document.getElementById("genero").value="";

				f=document.getElementById("fecha");
				f.style.display='block';
				document.getElementById("fnaci").value="";

					
	    	}		

	    } 

	    /*  fic
jor
for
pro
roles */