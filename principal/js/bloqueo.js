 function experiencia(){
	    	var e = document.getElementById("opcexperienciaSemille");
			if (e.options[e.selectedIndex].value== 2){
				f=document.getElementById("exp");
	    		f.style.display='none';

	    		document.getElementById("experienciaSemille").value="Ninguna experiencia";

	    		//document.getElementById("profe").value="";


	    	}else if (e.options[e.selectedIndex].value== 1){
		
	    		f=document.getElementById("exp");
	    		f.style.display='block';

	    		document.getElementById("experienciaSemille").value="";

	    		


	    	}	

	    } 
 function Inclinacion(){
	    	var e = document.getElementById("opcinclinacionSemille");
			if (e.options[e.selectedIndex].value== 2){
				f=document.getElementById("inc");
	    		f.style.display='none';

	    		document.getElementById("inclinacionSemille").value="Ninguna Inclinacion";
	    		
	    		//document.getElementById("profe").value="";


	    	}else if (e.options[e.selectedIndex].value== 1){
		
	    		f=document.getElementById("inc");
	    		f.style.display='block';

	    		document.getElementById("inclinacionSemille").value="";

	    		

	    	}	

	    } 