function agregar(){
	if(document.getElementById("pro_region").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la region</span><br><br></div><br><br><br></div>';
	document.getElementById("pro_region").focus();
	return;
	}else if(document.getElementById("pro_centro").value==""){
	document.getElementById('res').innerHTML = '<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el centro </span><br><br></div><br><br><br></div>';
	document.getElementById("pro_centro").focus();
	return;
	}else if(document.getElementById("nom_sub").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el nombre del subdirector</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_sub").focus();
	return;
	}else if(document.getElementById("ema_sub").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite email subdirector</span><br><br></div><br><br><br></div>';
	document.getElementById("ema_sub").focus();
	return;
	}else if(document.getElementById("num_cel_sub").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite numero celular del subdirector</span><br><br></div><br><br><br></div>';
	document.getElementById("num_cel_sub").focus();
	return;
	}else if(document.getElementById("pro_autores").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite los autores del proyecto</span><br><br></div><br><br><br></div>';
	document.getElementById("pro_autores").focus();
	return;
	}else if(document.getElementById("nom_rad_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite nombre que radica el proyecto</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_rad_pro").focus();
	return;
	}else if(document.getElementById("num_identi").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite numero de identificacion</span><br><br></div><br><br><br></div>';
	document.getElementById("num_identi").focus();
	return;
	}else if(document.getElementById("ema_rad_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite email radica proyecto</span><br><br></div><br><br><br></div>';
	document.getElementById("ema_rad_pro").focus();
	return;
	}else if(document.getElementById("Cel_rad_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el celular que radica el proyecto</span><br><br></div><br><br><br></div>';
	document.getElementById("Cel_rad_pro").focus();
	return;
	}else if(document.getElementById("titulo_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >Digite el titulo proyecto tecnico</span><br><br></div><br><br><br></div>';
	document.getElementById("titulo_pro").focus();
	return;
	}else if(document.getElementById("area_con_1").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite area conocimiento 1</span><br><br></div><br><br><br></div>';
	document.getElementById("area_con_1").focus();
	return;
	}else if(document.getElementById("area_con_2").value==0){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite area conocimiento 2</span><br><br></div><br><br><br></div>';
	document.getElementById("area_con_2").focus();
	return;
	}else if(document.getElementById("apli_posconf").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >aplica el subcomflicto</span><br><br></div><br><br><br></div>';
	document.getElementById("apli_posconf").focus();
	return;
	}else if(document.getElementById("muni_impact").value==0){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >municipio a impactar</span><br><br></div><br><br><br></div>';
	document.getElementById("muni_impact").focus();
	return;
	}else if(document.getElementById("des_estra").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >descripcion de estrategias</span><br><br></div><br><br><br></div>';
	document.getElementById("des_estra").focus();
	return;
	}else if(document.getElementById("recu_poscof").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >cuenta con recursos poscomflicto</span><br><br></div><br><br><br></div>';
	document.getElementById("recu_poscof").focus();
	return;
	}else if(document.getElementById("ante_just_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >antecedentes judiciales del proyecto(mencionelas)</span><br><br></div><br><br><br></div>';
	document.getElementById("ante_just_pro").focus();
	return;
	}else if(document.getElementById("plan_pro_nec").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >planeamiento del problema</span><br><br></div><br><br><br></div>';
	document.getElementById("plan_pro_nec").focus();
	return;
	}else if(document.getElementById("obj_general").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >objetivo general</span><br><br></div><br><br><br></div>';
	document.getElementById("obj_general").focus();
	return;
	}else if(document.getElementById("obj_esp1").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" > digite los objetivo genera1</span><br><br></div><br><br><br></div>';
	document.getElementById("obj_esp1").focus();
	return;
	}else if(document.getElementById("obj_esp2").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite los objectivos general2</span><br><br></div><br><br><br></div>';
	document.getElementById("obj_esp2").focus();
	return;
	}else if(document.getElementById("obj_esp3").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite los objectivo general3</span><br><br></div><br><br><br></div>';
	document.getElementById("obj_esp3").focus();
	return;
   }else if(document.getElementById("obj_esp4").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite los objectivo general4</span><br><br></div><br><br><br></div>';
	document.getElementById("obj_esp4").focus();
	return; 
   }else if(document.getElementById("fech_ini_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la fecha de inicio</span><br><br></div><br><br><br></div>';
	document.getElementById("fech_ini_pro").focus();
	return;
   }else if(document.getElementById("fech_fin_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la fecha de fin</span><br><br></div><br><br><br></div>';
	document.getElementById("fech_fin_pro").focus();
	return;
   }else if(document.getElementById("nom_gru_inv").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >seleccione el nombre del grupo de investigacion</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_gru_inv").focus();
	return;
   }else if(document.getElementById("cod_grupo").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el grupo de grupo</span><br><br></div><br><br><br></div>';
	document.getElementById("cod_grupo").focus();
	return;
   }else if(document.getElementById("num_sem_bene").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el numero de semilleros beneficiados</span><br><br></div><br><br><br></div>';
	document.getElementById("num_sem_bene").focus();
	return;
   }else if(document.getElementById("nomb_sem_bene").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el nombre de semilleros beneficiados</span><br><br></div><br><br><br></div>';
	document.getElementById("nomb_sem_bene").focus();
	return;
   }else if(document.getElementById("des_meto_pro").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite descripcion de metodologia de proyecto</span><br><br></div><br><br><br></div>';
	document.getElementById("des_meto_pro").focus();
	return;
   }else if(document.getElementById("resu_obj_esp1").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >resultado de objectivo especifico 1</span><br><br></div><br><br><br></div>';
	document.getElementById("resu_obj_esp1").focus();
	return;
   }else if(document.getElementById("resu_obj_esp2").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >resultado  de objectivo especifico 2</span><br><br></div><br><br><br></div>';
	document.getElementById("resu_obj_esp2").focus();
	return;
   }else if(document.getElementById("resu_obj_esp3").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >resultado de objectivo especifico 3</span><br><br></div><br><br><br></div>';
	document.getElementById("resu_obj_esp3").focus();
	return;
   }else if(document.getElementById("resu_obj_esp4").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >resultado de objectivo especifico 4</span><br><br></div><br><br><br></div>';
	document.getElementById("resu_obj_esp4").focus();
	return;  
	}else if(document.getElementById("prod_resu_1").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >producto de resultado 1</span><br><br></div><br><br><br></div>';
	document.getElementById("prod_resu_1").focus();
	return;
   }else if(document.getElementById("prod_resu_2").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >producto de resultado 2</span><br><br></div><br><br><br></div>';
	document.getElementById("prod_resu_2").focus();
	return;
   }else if(document.getElementById("prod_resu_3").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >producto de resultado 3</span><br><br></div><br><br><br></div>';
	document.getElementById("prod_resu_3").focus();
	return;
   }else if(document.getElementById("prod_resu_4").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >producto de resultado 4</span><br><br></div><br><br><br></div>';
	document.getElementById("prod_resu_4").focus();
	return;
   }else if(document.getElementById("num_pro_bene").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero programa beneficiario</span><br><br></div><br><br><br></div>';
	document.getElementById("num_pro_bene").focus();
	return;
   }else if(document.getElementById("nom_pro_bene").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >nombre programa beneficiados</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_pro_bene").focus();
	return;
	}else if(document.getElementById("imp_esperado").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >impacto esperado</span><br><br></div><br><br><br></div>';
	document.getElementById("imp_esperado").focus();
	return;	
	}else if(document.getElementById("num_per_ext").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de personas externa</span><br><br></div><br><br><br></div>';
	document.getElementById("num_per_ext").focus();
	return;	
	}else if(document.getElementById("nom_apr_ext").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de aprendizes externo</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_apr_ext").focus();
	return;	
	}else if(document.getElementById("num_iden_ext").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de identificacion externa/span><br><br></div><br><br><br></div>';
	document.getElementById("num_iden_ext").focus();
	return;	
	}else if(document.getElementById("num_pers_int_s").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de personas internas</span><br><br></div><br><br><br></div>';
	document.getElementById("num_pers_int_s").focus();
	return;
   }else if(document.getElementById("nom_ape_int_s").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >nombre de aprendices interno</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_ape_int_s").focus();
	return;
	}else if(document.getElementById("num_iden_int_s").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de identificacion de interno</span><br><br></div><br><br><br></div>';
	document.getElementById("num_iden_int_s").focus();
	return;
	}else if(document.getElementById("num_pers_int_c").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de personas internas</span><br><br></div><br><br><br></div>';
	document.getElementById("num_pers_int_c").focus();
	return;
	}else if(document.getElementById("num_pers_int_cm").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de personas internas</span><br><br></div><br><br><br></div>';
	document.getElementById("num_pers_int_cm").focus();
	return;	
	}else if(document.getElementById("num_pers_int_in").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de personas internas</span><br><br></div><br><br><br></div>';
	document.getElementById("num_pers_int_in").focus();
	return;	
	}else if(document.getElementById("nom_apellidos").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el nombre y apellidos</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_apellidos").focus();
	return;	
	}else if(document.getElementById("num_idenficac").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el numero de identificacion</span><br><br></div><br><br><br></div>';
	document.getElementById("num_idenficac").focus();
	return;	
	}else if(document.getElementById("num_per_int_s").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >numero de personas internas </span><br><br></div><br><br><br></div>';
	document.getElementById("num_per_int_s").focus();
	return;	
	}else if(document.getElementById("nom_apell_pers").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite el nombre y apellidos de personas</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_apell_pers").focus();
	return;	
	}else if(document.getElementById("num_iden_pers").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite numero de identificacion de personas</span><br><br></div><br><br><br></div>';
	document.getElementById("num_iden_pers").focus();
	return;	
	}else if(document.getElementById("nom_ali_int").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite los nombre aliados interno</span><br><br></div><br><br><br></div>';
	document.getElementById("nom_ali_int").focus();
	return;
	}else if(document.getElementById("nit").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite El Nit</span><br><br></div><br><br><br></div>';
	document.getElementById("nit").focus();
	return;
	}else if(document.getElementById("rec_esp_ent_ext").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >recurso en especie entidad externa</span><br><br></div><br><br><br></div>';
	document.getElementById("rec_esp_ent_ext").focus();
	return;	
	}else if(document.getElementById("rec_din_ent_ext").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >recursos en dinero ebtidad internas</span><br><br></div><br><br><br></div>';
	document.getElementById("rec_din_ent_ext").focus();
	return;	
	}else if(document.getElementById("rec_esp_ent_int").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >recursos en especie entidad internas</span><br><br></div><br><br><br></div>';
	document.getElementById("rec_esp_ent_int").focus();
	return;	
	}else if(document.getElementById("rec_din_ent_int").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >recursos een dinero entidad interno</span><br><br></div><br><br><br></div>';
	document.getElementById("rec_din_ent_int").focus();
	return;	
	}else if(document.getElementById("cui_mun_inf").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >ciudades o municipio de influencia</span><br><br></div><br><br><br></div>';
	document.getElementById("cui_mun_inf").focus();
	return;	
	}else if(document.getElementById("des_ali_obj").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >descripcion de alianza o objectivo</span><br><br></div><br><br><br></div>';
	document.getElementById("des_ali_obj").focus();
	return;		
	}else if(document.getElementById("ot_se_pe_in").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >otros servicios personales internos</span><br><br></div><br><br><br></div>';
	document.getElementById("ot_se_pe_in").focus();
	return;	
	}else if(document.getElementById("descripcion1").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion1").focus();
	return;	
    }else if(document.getElementById("se_pe_in").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error">servicios personales indirectos</span><br><br></div><br><br><br></div>';
	document.getElementById("se_pe_in").focus();
	return;
	}else if(document.getElementById("descripcion2").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion2").focus();
	return;
	}else if(document.getElementById("eq_de_si").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >equipo de sistemas</span><br><br></div><br><br><br></div>';
	document.getElementById("eq_de_si").focus();
	return;
	}else if(document.getElementById("descripcion3").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion3").focus();
	return;
	}else if(document.getElementById("sofware").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >software</span><br><br></div><br><br><br></div>';
	document.getElementById("sofware").focus();
	return;
	}else if(document.getElementById("descripcion4").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion4").focus();
	return;
	}else if(document.getElementById("maq_ind").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >maquina industrial</span><br><br></div><br><br><br></div>';
	document.getElementById("maq_ind").focus();
	return;
	}else if(document.getElementById("descripcion5").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion5").focus();
	return;
	}else if(document.getElementById("otr_com_equi").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >otras compras de equipo</span><br><br></div><br><br><br></div>';
	document.getElementById("otr_com_equi").focus();
	return;
	}else if(document.getElementById("descripcion6").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion6").focus();
	return;
	}else if(document.getElementById("ma_pa_for").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >materiales de formacion profesional</span><br><br></div><br><br><br></div>';
	document.getElementById("ma_pa_for").focus();
	return;
	}else if(document.getElementById("descripcion7").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion7").focus();
	return;
	}else if(document.getElementById("man_maq_equ").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >mantenimiento de maquinaria equipo trasporte software</span><br><br></div><br><br><br></div>';
	document.getElementById("man_maq_equ").focus();
	return;
	}else if(document.getElementById("descripcion8").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion8").focus();
	return;
	}else if(document.getElementById("ot_com_tra").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >otros comunicaciones y trasporte</span><br><br></div><br><br><br></div>';
	document.getElementById("ot_com_tra").focus();
	return;
	}else if(document.getElementById("descripcion9").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion9").focus();
	return;
	}else if(document.getElementById("ot_gast_imp").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >otros gastos por impresos y publicaciones</span><br><br></div><br><br><br></div>';
	document.getElementById("ot_gast_imp").focus();
	return;
	}else if(document.getElementById("descripcion10").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion10").focus();
	return;
	}else if(document.getElementById("div_act").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >divulgacion de actividades de gestion institucional</span><br><br></div><br><br><br></div>';
	document.getElementById("div_act").focus();
	return;
	}else if(document.getElementById("descripcion11").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion11").focus();
	return;
	}else if(document.getElementById("via_gast_int").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >viaticos y gastos de viajes al interior formacion profesional</span><br><br></div><br><br><br></div>';
	document.getElementById("via_gast_int").focus();
	return;
	}else if(document.getElementById("descripcion12").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion12").focus();
	return;
	}else if(document.getElementById("gast_bien").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >gastos bienestar alumos</span><br><br></div><br><br><br></div>';
	document.getElementById("gast_bien").focus();
	return;	
	}else if(document.getElementById("descripcion13").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion13").focus();
	return;
	}else if(document.getElementById("ade_cons").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >adecuaciones y construcciones</span><br><br></div><br><br><br></div>';
	document.getElementById("ade_cons").focus();
	return;
	}else if(document.getElementById("descripcion14").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion14").focus();
	return;
	}else if(document.getElementById("monitores").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >monitores</span><br><br></div><br><br><br></div>';
	document.getElementById("monitores").focus();
	return;
	}else if(document.getElementById("descripcion15").value==""){
	document.getElementById('res').innerHTML = ' <div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >digite la descripcion</span><br><br></div><br><br><br></div>';
	document.getElementById("descripcion15").focus();
	return;
	}else{
	document.getElementById('res').innerHTML = '';

	}$.ajax({
				  url: "insertar.php",
				  data: {
				        identificacion : $("#identificacion").val(),
						pro_region : $("#pro_region").val(),
						pro_centro : $("#pro_centro").val(),
						nom_sub: $("#nom_sub").val(),
						ema_sub: $("#ema_sub").val(),
						num_cel_sub: $("#num_cel_sub").val(),
						pro_autores: $("#pro_autores").val(),
						nom_rad_pro: $("#nom_rad_pro").val(),
						num_identi: $("#num_identi").val(),
						ema_rad_pro: $("#ema_rad_pro").val(),
						Cel_rad_pro: $("#Cel_rad_pro").val(),
						titulo_pro: $("#titulo_pro").val(),
						area_con_1: $("#area_con_1").val(),
						area_con_2: $("#area_con_2").val(),
						apli_posconf: $("#apli_posconf").val(),
						muni_impact: $("#muni_impact").val(),
						des_estra: $("#des_estra").val(),
						recu_poscof: $("#recu_poscof").val(),
						ante_just_pro: $("#ante_just_pro").val(),
						plan_pro_nec: $("#plan_pro_nec").val(),
						obj_general: $("#obj_general").val(),
						obj_esp1: $("#obj_esp1").val(),
						obj_esp2: $("#obj_esp2").val(),
						obj_esp3: $("#obj_esp3").val(),
						obj_esp4: $("#obj_esp4").val(),
						fech_ini_pro: $("#fech_ini_pro").val(),
						fech_fin_pro: $("#fech_fin_pro").val(),
						nom_gru_inv: $("#nom_gru_inv").val(),
						cod_grupo: $("#cod_grupo").val(),
						num_sem_bene: $("#num_sem_bene").val(),
						nomb_sem_bene: $("#nomb_sem_bene").val(),
						des_meto_pro: $("#des_meto_pro").val(),
						resu_obj_esp1: $("#resu_obj_esp1").val(),
						resu_obj_esp2: $("#resu_obj_esp2").val(),
						resu_obj_esp3: $("#resu_obj_esp3").val(),
						resu_obj_esp4: $("#resu_obj_esp4").val(),
						prod_resu_1: $("#prod_resu_1").val(),
						prod_resu_2: $("#prod_resu_2").val(),
						prod_resu_3: $("#prod_resu_3").val(),
						prod_resu_4: $("#prod_resu_4").val(),
						num_pro_bene: $("#num_pro_bene").val(),
						nom_pro_bene: $("#nom_pro_bene").val(),
						imp_esperado: $("#imp_esperado").val(),
						num_per_ext: $("#num_per_ext").val(),
						nom_apr_ext: $("#nom_apr_ext").val(),
						num_iden_ext: $("#num_iden_ext").val(),
						num_pers_int_s: $("#num_pers_int_s").val(),
						nom_ape_int_s: $("#nom_ape_int_s").val(),
						num_iden_int_s: $("#num_iden_int_s").val(),
						num_pers_int_c: $("#num_pers_int_c").val(),
						num_pers_int_cm: $("#num_pers_int_cm").val(),
						num_pers_int_in:$("#num_pers_int_in").val(),
						nom_apellidos: $("#nom_apellidos").val(),
						num_idenficac: $("#num_idenficac").val(),
						num_per_int_s: $("#num_per_int_s").val(),
						nom_apell_pers: $("#nom_apell_pers").val(),
						num_iden_pers: $("#num_iden_pers").val(),
						nom_ali_int: $("#nom_ali_int").val(),
						nit: $("#nit").val(),
						rec_esp_ent_ext: $("#rec_esp_ent_ext").val(),
						rec_din_ent_ext: $("#rec_din_ent_ext").val(),
						rec_esp_ent_int: $("#rec_esp_ent_int").val(),
						rec_din_ent_int: $("#rec_din_ent_int").val(),
						cui_mun_inf: $("#cui_mun_inf").val(),
						des_ali_obj: $("#des_ali_obj").val(),
						ot_se_pe_in: $("#ot_se_pe_in").val(),
						descripcion1: $("#descripcion1").val(),
						se_pe_in: $("#se_pe_in").val(),
						descripcion2: $("#descripcion2").val(),
						eq_de_si: $("#eq_de_si").val(),
						descripcion3: $("#descripcion3").val(),
						sofware: $("#sofware").val(),
						descripcion4: $("#descripcion4").val(),
						maq_ind: $("#maq_ind").val(),
						descripcion5: $("#descripcion5").val(),
						otr_com_equi: $("#otr_com_equi").val(),
						descripcion6: $("#descripcion6").val(),
						ma_pa_for: $("#ma_pa_for").val(),
						descripcion7: $("#descripcion7").val(),
						man_maq_equ: $("#man_maq_equ").val(),
						descripcion8: $("#descripcion8").val(),
						ot_com_tra: $("#ot_com_tra").val(),
						descripcion9: $("#descripcion9").val(),
						ot_gast_imp: $("#ot_gast_imp").val(),
						descripcion10: $("#descripcion10").val(),
						div_act: $("#div_act").val(),
						descripcion11: $("#descripcion11").val(),
						via_gast_int: $("#via_gast_int").val(),
						descripcion12: $("#descripcion12").val(),
						gast_bien: $("#gast_bien").val(),
						descripcion13: $("#descripcion13").val(),
						ade_cons: $("#ade_cons").val(),
						descripcion14: $("#descripcion14").val(),
						monitores: $("#monitores").val(),
						descripcion15: $("#descripcion15").val()},
				  type: "POST",
				  
				  success: function(response){
				   	//alert(response);
		               if (response==0){
		               	
						document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="error"><br><img src="images/error.PNG" class="add"></img> <span class="error" >no pudo registrarse </span><br><br></div><br><br><br></div>';		            
					}else if(response==1){
		              document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >proyecto registrado</span><br><br></div><br><br><br></div>';
		            }
					}
				});
	
	
}

	