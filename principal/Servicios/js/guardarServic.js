function crear(cant, estado){

	if (estado=="1") {

		var arrayText = [];
	var resulta = [];
	var productoo = [];
  for (var i = 1; i <= cant; i++) {

    var objet=document.getElementById('obj_esp'+i).value;
    var resultado=document.getElementById('result'+i).value;
    var producto=document.getElementById('produt'+i).value;
    //alert(objet)
     arrayText[i] = objet;
     resulta[i] = resultado;
     productoo[i] = producto;

  }
	var elementobut= document.getElementById('EnPr');

    if(document.getElementById("pro_region").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la Region';
	document.getElementById("pro_region").focus();
	return;	
	}else if(document.getElementById("pro_centro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el Centro';
	document.getElementById("pro_centro").focus();
	return;	
	}else if(document.getElementById("nom_gru_inv").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el grupo de investigacion';
	document.getElementById("nom_gru_inv").focus();
	return;
   }else{

			
			$.ajax({
				  url: "Servicios/insertar.php",
				  data: {
				        identificacion : $("#identificacion").val(),
				        //anexo : $("#anexo").val(),
				        Cantidad : cant,                                             
				        EstaReg : estado,                                             
          				arrayObje: JSON.stringify(arrayText),
          				arrayresult: JSON.stringify(resulta),
          				arrayProducto: JSON.stringify(productoo),
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
						/*obj_general: $("#obj_general").val(),
						obj_esp1: $("#obj_esp1").val(),
						obj_esp2: $("#obj_esp2").val(),
						obj_esp3: $("#obj_esp3").val(),
						obj_esp4: $("#obj_esp4").val(),
						obj_esp5: $("#obj_esp5").val(),
						obj_esp6: $("#obj_esp6").val(),
						obj_esp7: $("#obj_esp7").val(),
						obj_esp8: $("#obj_esp8").val(),
						obj_esp9: $("#obj_esp9").val(),
						obj_esp10: $("#obj_esp10").val(),*/
						fech_ini_pro: $("#fech_ini_pro").val(),
						fech_fin_pro: $("#fech_fin_pro").val(),
						nom_gru_inv: $("#nom_gru_inv").val(),
						cod_grupo: $("#cod_grupo").val(),
						num_sem_bene: $("#num_sem_bene").val(),
						nomb_sem_bene: $("#nomb_sem_bene").val(),
						des_meto_pro: $("#des_meto_pro").val(),
						/*resu_obj_esp1: $("#resu_obj_esp1").val(),
						resu_obj_esp2: $("#resu_obj_esp2").val(),
						resu_obj_esp3: $("#resu_obj_esp3").val(),
						resu_obj_esp4: $("#resu_obj_esp4").val(),
						prod_resu_1: $("#prod_resu_1").val(),
						prod_resu_2: $("#prod_resu_2").val(),
						prod_resu_3: $("#prod_resu_3").val(),
						prod_resu_4: $("#prod_resu_4").val(),*/
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
						ser_per_ind: $("#ser_per_ind").val(),
						descripcion1: $("#descripcion1").val(),
						equ_sis: $("#equ_sis").val(),
						descripcion2: $("#descripcion2").val(),
						software: $("#software").val(),
						descripcion3: $("#descripcion3").val(),
						maq_ind: $("#maq_ind").val(),
						descripcion4: $("#descripcion4").val(),
						otra_com_equi: $("#otra_com_equi").val(),
						descripcion5: $("#descripcion5").val(),
						mat_for_pro: $("#mat_for_pro").val(),
						descripcion6: $("#descripcion6").val(),
						man_maq_equ: $("#man_maq_equ").val(),
						descripcion7: $("#descripcion7").val(),
						ot_com_tra: $("#ot_com_tra").val(),
						descripcion8: $("#descripcion8").val(),
						ot_gast_imp: $("#ot_gast_imp").val(),
						descripcion9: $("#descripcion9").val(),
						div_act: $("#div_act").val(),
						descripcion10: $("#descripcion10").val(),
						via_gast_int: $("#via_gast_int").val(),
						descripcion11: $("#descripcion11").val(),
						ade_cont: $("#ade_cont").val(),
						descripcion12: $("#descripcion12").val(),
					
						Cvla: $("#Cvla").val(),
						ObjeGene: $("#ObjeGene").val()},
				  type: "POST",
				  
				  success: function(response){
				  /*	alert(response);*/
				   	/*alert(response);
				   	$("#res").html(response);*/
		            if (response==0){	
		              swal({title: "Error",text: "Error al guardar Proyecto",type: "error",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="Sesion.php"});
						document.getElementById('res').innerHTML ='';		            
					}else if(response==1){
					  swal({title: "Guardado",text: "Proyecto Guardado Correctamente",type: "success",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="Sesion.php"});
		               document.getElementById('res').innerHTML ='';		            
		              //document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >proyecto registrado</span><br><br></div><br><br><br></div>';
					 	            
		            }	
		            	//location.reload(true);
		              //elementobut.style.display='none';
					}
					
				});
		}

	}else{

	var arrayText = [];
	var resulta = [];
	var productoo = [];
  	for (var i = 1; i <= cant; i++) {

    var objet=document.getElementById('obj_esp'+i).value;
    var resultado=document.getElementById('result'+i).value;
    var producto=document.getElementById('produt'+i).value;
    //alert(objet)
     arrayText[i] = objet;
     resulta[i] = resultado;
     productoo[i] = producto;

  	}
	var elementobut= document.getElementById('EnPr');

	DivNomSub = document.getElementById("Divnom_sub").style;
	DivEma_sub= document.getElementById("Divema_sub").style;
	Divnum_cel_subu= document.getElementById("Divnum_cel_sub").style;
	Divpro_autores = document.getElementById("Divpro_autores").style;
	Divnom_rad_pro= document.getElementById("Divnom_rad_pro").style;
	Divnum_identi = document.getElementById("Divnum_identi").style;
	Divema_rad_pro = document.getElementById("Divema_rad_pro").style;
	DivCel_rad_pro = document.getElementById("DivCel_rad_pro").style;
	Divtitulo_pro = document.getElementById("Divtitulo_pro").style;
	Divarea_con_1 = document.getElementById("Divarea_con_1").style;
	Divarea_con_2 = document.getElementById("Divarea_con_2").style;
	Divapli_posconf = document.getElementById("Divapli_posconf").style;
	Divmuni_impact = document.getElementById("Divmuni_impact").style;
	Divdes_estra = document.getElementById("Divdes_estra").style;
	Divrecu_poscof = document.getElementById("Divrecu_poscof").style;
	Divante_just_pro = document.getElementById("Divante_just_pro").style;
	Divplan_pro_nec = document.getElementById("Divplan_pro_nec").style;
	Divfech_ini_pro = document.getElementById("Divfech_ini_pro").style;
	Divfech_fin_pro = document.getElementById("Divfech_fin_pro").style;
	Divnom_gru_inv = document.getElementById("Divnom_gru_inv").style;
	Divcod_grupo = document.getElementById("Divcod_grupo").style;
	Divnum_sem_bene = document.getElementById("Divnum_sem_bene").style;
	Divnomb_sem_bene = document.getElementById("Divnomb_sem_bene").style;
	Divdes_meto_pro = document.getElementById("Divdes_meto_pro").style;
	Divnum_pro_bene = document.getElementById("Divnum_pro_bene").style;
	Divnom_pro_bene = document.getElementById("Divnom_pro_bene").style;
	Divimp_esperado = document.getElementById("Divimp_esperado").style;
	Divnum_per_ext = document.getElementById("Divnum_per_ext").style;
	Divnom_apr_ext = document.getElementById("Divnom_apr_ext").style;
	Divnum_iden_ext = document.getElementById("Divnum_iden_ext").style;
	Divnum_pers_int_s = document.getElementById("Divnum_pers_int_s").style;
	Divnom_ape_int_s = document.getElementById("Divnom_ape_int_s").style;
	Divnum_iden_int_s = document.getElementById("Divnum_iden_int_s").style;
	Divnum_pers_int_c = document.getElementById("Divnum_pers_int_c").style;
	Divnum_pers_int_in = document.getElementById("Divnum_pers_int_in").style;
	Divnom_apellidos = document.getElementById("Divnom_apellidos").style;
	Divnum_idenficac = document.getElementById("Divnum_idenficac").style;
	Divnum_per_int_s = document.getElementById("Divnum_per_int_s").style;
	Divnom_apell_pers = document.getElementById("Divnom_apell_pers").style;
	Divnum_iden_pers = document.getElementById("Divnum_iden_pers").style;
	Divnom_ali_int = document.getElementById("Divnom_ali_int").style;
	Divnit = document.getElementById("Divnit").style;
	DiVrec_esp_ent_ext = document.getElementById("Divrec_esp_ent_ext").style;
	Divrec_din_ent_ext = document.getElementById("Divrec_din_ent_ext").style;
	Divrec_esp_ent_int = document.getElementById("Divrec_esp_ent_int").style;
	Divrec_din_ent_int = document.getElementById("Divrec_din_ent_int").style;
	Divcui_mun_inf = document.getElementById("Divcui_mun_inf").style;
	Divdes_ali_obj = document.getElementById("Divdes_ali_obj").style;
	Divser_per_ind = document.getElementById("Divser_per_ind").style;
	Divdescripcion1 = document.getElementById("Divdescripcion1").style;
	Divequ_sis= document.getElementById("Divequ_sis").style;
	Divdescripcion2 = document.getElementById("Divdescripcion2").style;
	Divsoftware = document.getElementById("Divsoftware").style;
	Divdescripcion3 = document.getElementById("Divdescripcion3").style;
	Divmaq_ind = document.getElementById("Divmaq_ind").style;
	Divdescripcion4 = document.getElementById("Divdescripcion4").style;
	Divotra_com_equi = document.getElementById("Divotra_com_equi").style;
	Divdescripcion5 = document.getElementById("Divdescripcion5").style;
	Divmat_for_pro = document.getElementById("Divmat_for_pro").style;
	Divdescripcion6 = document.getElementById("Divdescripcion6").style;
	Divman_maq_equ = document.getElementById("Divman_maq_equ").style;
	Divdescripcion7 = document.getElementById("Divdescripcion7").style;
	Divot_com_tra = document.getElementById("Divot_com_tra").style;
	Divdescripcion8 = document.getElementById("Divdescripcion8").style;
	Divot_gast_imp = document.getElementById("Divot_gast_imp").style;
	Divdescripcion9 = document.getElementById("Divdescripcion9").style;
	Divdiv_act = document.getElementById("Divdiv_act").style;
	Divdescripcion10 = document.getElementById("Divdescripcion10").style;
	Divvia_gast_int = document.getElementById("Divvia_gast_int").style;
	Divdescripcion11 = document.getElementById("Divdescripcion11").style;
	Divade_cont = document.getElementById("Divade_cont").style;
	Divdescripcion12 = document.getElementById("Divdescripcion12").style;

/*	DivObjeGene = document.getElementById("DivObjeGene").style;
*/	DivCvla = document.getElementById("DivCvla").style;

	if(document.getElementById("pro_region").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la Region';
	document.getElementById("pro_region").focus();
	return;	
	
	}else if(document.getElementById("pro_centro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el Centro';
	document.getElementById("pro_centro").focus();
	return;	
	
	}else if(DivNomSub.display=="block" && document.getElementById("nom_sub").value==""){
		document.getElementById('res').innerHTML = 'Rellene este Campo';
		document.getElementById("nom_sub").focus();
	return;

	}else if(DivEma_sub.display=="block" && document.getElementById("ema_sub").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ema_sub").focus();
	return;

	}else if(Divnum_cel_subu.display=="block" && document.getElementById("num_cel_sub").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_cel_sub").focus();
	return;

	}else if(Divpro_autores.display=="block" && document.getElementById("pro_autores").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("pro_autores").focus();
	return;

	}else if(Divnom_rad_pro.display=="block" && document.getElementById("nom_rad_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_rad_pro").focus();
	return;

	}else if(Divnum_identi.display=="block" && document.getElementById("num_identi").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_identi").focus();
	return;

	}else if(Divema_rad_pro.display=="block" && document.getElementById("ema_rad_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ema_rad_pro").focus();
	return;

	}else if(DivCel_rad_pro.display=="block" && document.getElementById("Cel_rad_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("Cel_rad_pro").focus();
	return;

	}else if(Divtitulo_pro.display=="block" && document.getElementById("titulo_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("titulo_pro").focus();
	return;

	}else if(Divarea_con_1.display=="block" && document.getElementById("area_con_1").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("area_con_1").focus();
	return;

	}else if(Divarea_con_2.display=="block" && document.getElementById("area_con_2").value==0){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("area_con_2").focus();
	return;

	}else if(Divapli_posconf.display=="block" && document.getElementById("apli_posconf").value==""){
	document.getElementById('res').innerHTML = 'Seleccione si Aplica al Posconflicto';
	document.getElementById("apli_posconf").focus();
	return;
	
	}else if(Divmuni_impact.display=="block" && document.getElementById("muni_impact").value==0){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("muni_impact").focus();
	return;
	
	}else if(Divdes_estra.display=="block" && document.getElementById("des_estra").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("des_estra").focus();
	return;
	
	}else if(Divrecu_poscof.display=="block" && document.getElementById("recu_poscof").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("recu_poscof").focus();
	return;
	
	}else if(Divante_just_pro.display=="block" && document.getElementById("ante_just_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ante_just_pro").focus();
	return;
	}else if(Divplan_pro_nec.display=="block" && document.getElementById("plan_pro_nec").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("plan_pro_nec").focus();

	return; 
   }else if(Divfech_ini_pro.display=="block" && document.getElementById("fech_ini_pro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la Fecha inicio del proyecto';
	document.getElementById("fech_ini_pro").focus();

	return;
   }else if(Divfech_fin_pro.display=="block" && document.getElementById("fech_fin_pro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la fecha Fin del proyecto';
	document.getElementById("fech_fin_pro").focus();

	return;
   }else if(Divnom_gru_inv.display=="block" && document.getElementById("nom_gru_inv").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el grupo de investigacion';
	document.getElementById("nom_gru_inv").focus();
	return;
   }else if(Divcod_grupo.display=="block" && document.getElementById("cod_grupo").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("cod_grupo").focus();
	return;
   }else if(Divnum_sem_bene.display=="block" && document.getElementById("num_sem_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_sem_bene").focus();
	return;
   }else if(Divnomb_sem_bene.display=="block" && document.getElementById("nomb_sem_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nomb_sem_bene").focus();
	return;
   }else if(Divdes_meto_pro.display=="block" && document.getElementById("des_meto_pro").value==""){
	document.getElementById('res').innerHTML ='Rellene este Campo';
	document.getElementById("des_meto_pro").focus();
	return;
   }else if(Divnum_pro_bene.display=="block" && document.getElementById("num_pro_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pro_bene").focus();
	return;
   }else if(Divnom_pro_bene.display=="block" && document.getElementById("nom_pro_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_pro_bene").focus();
	return;
	}else if(Divimp_esperado.display=="block" && document.getElementById("imp_esperado").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("imp_esperado").focus();
	return;	
	}else if(Divnum_per_ext.display=="block" && document.getElementById("num_per_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_per_ext").focus();
	return;	
	}else if(Divnom_apr_ext.display=="block" && document.getElementById("nom_apr_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_apr_ext").focus();
	return;	
	}else if(Divnum_iden_ext.display=="block" && document.getElementById("num_iden_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_iden_ext").focus();
	return;	
	}else if(Divnum_pers_int_s.display=="block" && document.getElementById("num_pers_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pers_int_s").focus();
	return;
   }else if(Divnom_ape_int_s.display=="block" && document.getElementById("nom_ape_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_ape_int_s").focus();
	return;
	}else if(Divnum_iden_int_s.display=="block" && document.getElementById("num_iden_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_iden_int_s").focus();
	return;
	}else if(Divnum_pers_int_c.display=="block" && document.getElementById("num_pers_int_c").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pers_int_c").focus();
	return;
	}else if(Divnum_pers_int_in.display=="block" && document.getElementById("num_pers_int_in").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pers_int_in").focus();
	return;	
	}else if(Divnom_apellidos.display=="block" && document.getElementById("nom_apellidos").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_apellidos").focus();
	return;	
	}else if(Divnum_idenficac.display=="block" && document.getElementById("num_idenficac").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_idenficac").focus();
	return;	
	}else if(Divnum_per_int_s.display=="block" && document.getElementById("num_per_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_per_int_s").focus();
	return;	
	}else if(Divnom_apell_pers.display=="block" && document.getElementById("nom_apell_pers").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_apell_pers").focus();
	return;	
	}else if(Divnum_iden_pers.display=="block" && document.getElementById("num_iden_pers").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_iden_pers").focus();
	return;	
	}else if(Divnom_ali_int.display=="block" && document.getElementById("nom_ali_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_ali_int").focus();
	return;
	}else if(Divnit.display=="block" && document.getElementById("nit").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nit").focus();
	return;
	}else if(Divrec_esp_ent_ext.display=="block" && document.getElementById("rec_esp_ent_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_esp_ent_ext").focus();
	return;	
	}else if(Divrec_din_ent_ext.display=="block" && document.getElementById("rec_din_ent_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_din_ent_ext").focus();
	return;	
	}else if(Divrec_esp_ent_int.display=="block" && document.getElementById("rec_esp_ent_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_esp_ent_int").focus();
	return;	
	}else if(Divrec_din_ent_int.display=="block" && document.getElementById("rec_din_ent_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_din_ent_int").focus();
	return;	
	}else if(Divcui_mun_inf.display=="block" && document.getElementById("cui_mun_inf").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("cui_mun_inf").focus();
	return;	
	}else if(Divdes_ali_obj.display=="block" && document.getElementById("des_ali_obj").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("des_ali_obj").focus();
	return;		
	}else if(Divser_per_ind.display=="block" && document.getElementById("ser_per_ind").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ser_per_ind").focus();
	return;	
	}else if(Divdescripcion1.display=="block" && document.getElementById("descripcion1").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion1").focus();
	return;	
    }else if(Divequ_sis.display=="block" && document.getElementById("equ_sis").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("equ_sis").focus();
	return;
	}else if(Divdescripcion2.display=="block" && document.getElementById("descripcion2").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion2").focus();
	return;
	}else if(Divsoftware.display=="block" && document.getElementById("software").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("software").focus();
	return;
	}else if(Divdescripcion3.display=="block" && document.getElementById("descripcion3").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion3").focus();
	return;
	}else if(Divmaq_ind.display=="block" && document.getElementById("maq_ind").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("maq_ind").focus();
	return;
	}else if(Divdescripcion4.display=="block" && document.getElementById("descripcion4").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion4").focus();
	return;
	}else if(Divotra_com_equi.display=="block" && document.getElementById("otra_com_equi").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("otra_com_equi").focus();
	return;
	}else if(Divdescripcion5.display=="block" && document.getElementById("descripcion5").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion5").focus();
	return;
	}else if(Divmat_for_pro.display=="block" && document.getElementById("mat_for_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("mat_for_pro").focus();
	return;
	}else if(Divdescripcion6.display=="block" && document.getElementById("descripcion6").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion6").focus();
	return;
	}else if(Divman_maq_equ.display=="block" && document.getElementById("man_maq_equ").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("man_maq_equ").focus();
	return;
	}else if(Divdescripcion7.display=="block" && document.getElementById("descripcion7").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion7").focus();
	return;
	}else if(Divot_com_tra.display=="block" && document.getElementById("ot_com_tra").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ot_com_tra").focus();
	return;
	}else if(Divdescripcion8.display=="block" && document.getElementById("descripcion8").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion8").focus();
	return;
	}else if(Divot_gast_imp.display=="block" && document.getElementById("ot_gast_imp").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ot_gast_imp").focus();
	return;
	}else if(Divdescripcion9.display=="block" && document.getElementById("descripcion9").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion9").focus();
	return;
	}else if(Divdiv_act.display=="block" && document.getElementById("div_act").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("div_act").focus();
	return;
	}else if(Divdescripcion10.display=="block" && document.getElementById("descripcion10").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion10").focus();
	return;
	}else if(Divvia_gast_int.display=="block" && document.getElementById("via_gast_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("via_gast_int").focus();
	return;
	}else if(Divdescripcion11.display=="block" && document.getElementById("descripcion11").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion11").focus();
	return;
	}else if(Divade_cont.display=="block" && document.getElementById("ade_cont").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ade_cont").focus();
	return;
	}else if(Divdescripcion12.display=="block" && document.getElementById("descripcion12").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion12").focus();
	return;
	}else if(document.getElementById("ObjeGene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ObjeGene").focus();
	return;
	}else if(DivCvla.display=="block" && document.getElementById("Cvla").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("Cvla").focus();
	return;
	}else{

		 for (var iV = 1; iV <= cant; iV++) {

    var objet2=document.getElementById('obj_esp'+iV).value;
    var resultado2=document.getElementById('result'+iV).value;
    var producto2=document.getElementById('produt'+iV).value;


    if (objet2) {
    }else{
/*      alert("Digite el Objetivo"+iV+"");
*/
        document.getElementById('res').innerHTML = 'Digite el Objetivo '+iV+'';
        document.getElementById('obj_esp'+iV).focus();
        return;
    }

    if (resultado2) {
    }else{
/*      alert("Digite el resultado"+iV+"");
*/
        document.getElementById('res').innerHTML = 'Digite el Resultado '+iV+'';
        document.getElementById('result'+iV).focus();
        return;

    }

    if (producto2) {
    }else{
/*      alert("Digite el producto"+iV+"");
*/
        document.getElementById('res').innerHTML = 'Digite el Producto '+iV+'';
        document.getElementById('produt'+iV).focus();
        return;

    }
   

  }

  	document.getElementById('res').innerHTML = '<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';

  		   	ser_per_ind = $("#ser_per_ind").val();

  	   	alert("valor del alert ser_per_ind es "+ser_per_ind)


	
	}$.ajax({
				  url: "Servicios/insertar.php",
				  data: {
				        identificacion : $("#identificacion").val(),
				        //anexo : $("#anexo").val(),
				        Cantidad : cant,                                             
				        EstaReg : estado,                                             
          				arrayObje: JSON.stringify(arrayText),
          				arrayresult: JSON.stringify(resulta),
          				arrayProducto: JSON.stringify(productoo),
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
						/*obj_general: $("#obj_general").val(),
						obj_esp1: $("#obj_esp1").val(),
						obj_esp2: $("#obj_esp2").val(),
						obj_esp3: $("#obj_esp3").val(),
						obj_esp4: $("#obj_esp4").val(),
						obj_esp5: $("#obj_esp5").val(),
						obj_esp6: $("#obj_esp6").val(),
						obj_esp7: $("#obj_esp7").val(),
						obj_esp8: $("#obj_esp8").val(),
						obj_esp9: $("#obj_esp9").val(),
						obj_esp10: $("#obj_esp10").val(),*/
						fech_ini_pro: $("#fech_ini_pro").val(),
						fech_fin_pro: $("#fech_fin_pro").val(),
						nom_gru_inv: $("#nom_gru_inv").val(),
						cod_grupo: $("#cod_grupo").val(),
						num_sem_bene: $("#num_sem_bene").val(),
						nomb_sem_bene: $("#nomb_sem_bene").val(),
						des_meto_pro: $("#des_meto_pro").val(),
						/*resu_obj_esp1: $("#resu_obj_esp1").val(),
						resu_obj_esp2: $("#resu_obj_esp2").val(),
						resu_obj_esp3: $("#resu_obj_esp3").val(),
						resu_obj_esp4: $("#resu_obj_esp4").val(),
						prod_resu_1: $("#prod_resu_1").val(),
						prod_resu_2: $("#prod_resu_2").val(),
						prod_resu_3: $("#prod_resu_3").val(),
						prod_resu_4: $("#prod_resu_4").val(),*/
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
						ser_per_ind: $("#ser_per_ind").val(),
						descripcion1: $("#descripcion1").val(),
						equ_sis: $("#equ_sis").val(),
						descripcion2: $("#descripcion2").val(),
						software: $("#software").val(),
						descripcion3: $("#descripcion3").val(),
						maq_ind: $("#maq_ind").val(),
						descripcion4: $("#descripcion4").val(),
						otra_com_equi: $("#otra_com_equi").val(),
						descripcion5: $("#descripcion5").val(),
						mat_for_pro: $("#mat_for_pro").val(),
						descripcion6: $("#descripcion6").val(),
						man_maq_equ: $("#man_maq_equ").val(),
						descripcion7: $("#descripcion7").val(),
						ot_com_tra: $("#ot_com_tra").val(),
						descripcion8: $("#descripcion8").val(),
						ot_gast_imp: $("#ot_gast_imp").val(),
						descripcion9: $("#descripcion9").val(),
						div_act: $("#div_act").val(),
						descripcion10: $("#descripcion10").val(),
						via_gast_int: $("#via_gast_int").val(),
						descripcion11: $("#descripcion11").val(),
						ade_cont: $("#ade_cont").val(),
						descripcion12: $("#descripcion12").val(),
						Cvla: $("#Cvla").val(),
						ObjeGene: $("#ObjeGene").val()},
				  type: "POST",
				  
				  success: function(response){
				   	alert(response);
		            if (response==0){	
		              swal({title: "Error",text: "Error al guardar Proyecto",type: "error",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="Sesion.php"});
						document.getElementById('res').innerHTML ='';		            
					}else if(response==1){
					  swal({title: "Guardado",text: "Proyecto registrado Correctamente",type: "success",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href="Sesion.php"});
		               document.getElementById('res').innerHTML ='';		            
		              //document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >proyecto registrado</span><br><br></div><br><br><br></div>';
					 		            
		            }
		            	//location.reload(true);
		              //elementobut.style.display='none';
					}
					
				});




	
	
}
}

/*-------------------------------------------------------------------------*/

function EditarProyservicios(estado){
	cant=document.getElementById('CantObj').value;
	cantEnv=document.getElementById('CantObj2').value;
/*	alert(cantEnv)
*/

	if (estado=="1") {


    var arrayText = [];
	var resulta = [];
	var productoo = [];
	var arrayid = [];

    var arrayTextGu = [];
	var resultaGu = [];
	var productooGu = [];

  for (var i = 1; i <= cantEnv; i++) {

    var id=document.getElementById('ids'+i).value;
    var objet=document.getElementById('obj_esp'+i).value;
    var resultado=document.getElementById('result'+i).value;
    var producto=document.getElementById('produt'+i).value;
    //alert(objet)


     arrayid[i] = id;
     arrayText[i] = objet;
     resulta[i] = resultado;
     productoo[i] = producto;

  }

  for (var k = 1; k < cant; k++) {
  }

  sumGu=i+k;

   if (cant!="0") {
  	for (var j = i; j < sumGu; j++) {
    var objetGu=document.getElementById('obj_esp'+j).value;
    var resultadoGu=document.getElementById('result'+j).value;
    var productoGu=document.getElementById('produt'+j).value;


     arrayTextGu[j] = objetGu;
     resultaGu[j] = resultadoGu;
     productooGu[j] = productoGu;

  }
  }


	var elementobut= document.getElementById('EnPr');

    if(document.getElementById("pro_region").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la Region';
	document.getElementById("pro_region").focus();
	return;	
	}else if(document.getElementById("pro_centro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el Centro';
	document.getElementById("pro_centro").focus();
	return;	
	}else if(document.getElementById("fech_ini_pro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la fecha de inicio del proyecto';
	document.getElementById("fech_ini_pro").focus();
	return;	
	}else if(document.getElementById("fech_fin_pro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la fecha de Fin del proyecto';
	document.getElementById("fech_fin_pro").focus();
	return;	
	}else if(document.getElementById("nom_gru_inv").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el grupo de investigacion';
	document.getElementById("nom_gru_inv").focus();
	return;
   }else{
   		document.getElementById('res').innerHTML = '<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';

			$.ajax({
				  url: "Servicios/actualizar.php",
				  data: {
				        identificacion : $("#identificacion").val(),
				        //anexo : $("#anexo").val(),
				        Cantidad : cant,                                             
				        CantidadEnv : cantEnv,                                             
				        EstaReg : estado,                                             
          				ids: JSON.stringify(arrayid),
          				arrayText: JSON.stringify(arrayText),
          				resulta: JSON.stringify(resulta),
          				productoo: JSON.stringify(productoo),
						arrayTextGu: JSON.stringify(arrayTextGu),
          				resultaGu: JSON.stringify(resultaGu),
          				productooGu: JSON.stringify(productooGu),
						codigoPro: $("#codigoPro").val(),
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
						/*obj_general: $("#obj_general").val(),
						obj_esp1: $("#obj_esp1").val(),
						obj_esp2: $("#obj_esp2").val(),
						obj_esp3: $("#obj_esp3").val(),
						obj_esp4: $("#obj_esp4").val(),
						obj_esp5: $("#obj_esp5").val(),
						obj_esp6: $("#obj_esp6").val(),
						obj_esp7: $("#obj_esp7").val(),
						obj_esp8: $("#obj_esp8").val(),
						obj_esp9: $("#obj_esp9").val(),
						obj_esp10: $("#obj_esp10").val(),*/
						fech_ini_pro: $("#fech_ini_pro").val(),
						fech_fin_pro: $("#fech_fin_pro").val(),
						nom_gru_inv: $("#nom_gru_inv").val(),
						cod_grupo: $("#cod_grupo").val(),
						num_sem_bene: $("#num_sem_bene").val(),
						nomb_sem_bene: $("#nomb_sem_bene").val(),
						des_meto_pro: $("#des_meto_pro").val(),
						/*resu_obj_esp1: $("#resu_obj_esp1").val(),
						resu_obj_esp2: $("#resu_obj_esp2").val(),
						resu_obj_esp3: $("#resu_obj_esp3").val(),
						resu_obj_esp4: $("#resu_obj_esp4").val(),
						prod_resu_1: $("#prod_resu_1").val(),
						prod_resu_2: $("#prod_resu_2").val(),
						prod_resu_3: $("#prod_resu_3").val(),
						prod_resu_4: $("#prod_resu_4").val(),*/
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
						ser_per_ind: $("#ser_per_ind").val(),
						descripcion1: $("#descripcion1").val(),
						equ_sis: $("#equ_sis").val(),
						descripcion2: $("#descripcion2").val(),
						software: $("#software").val(),
						descripcion3: $("#descripcion3").val(),
						maq_ind: $("#maq_ind").val(),
						descripcion4: $("#descripcion4").val(),
						otra_com_equi: $("#otra_com_equi").val(),
						descripcion5: $("#descripcion5").val(),
						mat_for_pro: $("#mat_for_pro").val(),
						descripcion6: $("#descripcion6").val(),
						man_maq_equ: $("#man_maq_equ").val(),
						descripcion7: $("#descripcion7").val(),
						ot_com_tra: $("#ot_com_tra").val(),
						descripcion8: $("#descripcion8").val(),
						ot_gast_imp: $("#ot_gast_imp").val(),
						descripcion9: $("#descripcion9").val(),
						div_act: $("#div_act").val(),
						descripcion10: $("#descripcion10").val(),
						via_gast_int: $("#via_gast_int").val(),
						descripcion11: $("#descripcion11").val(),
						ade_cont: $("#ade_cont").val(),
						descripcion12: $("#descripcion12").val(),
						
						Cvla: $("#Cvla").val(),
						ObjeGene: $("#ObjeGene").val()},
				  type: "POST",
				  
				  success: function(response){
				   alert(response);
				   	//$("#respuesta").html(response);
		            if (response==0){	
		              swal({title: "Error",text: "Error al guardar Proyecto",type: "error",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href=""});
						document.getElementById('res').innerHTML ='';		            
					}else if(response==1){
					  swal({title: "Guardado",text: "Proyecto Guardado Correctamente",type: "success",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href=""});
		               document.getElementById('res').innerHTML ='';		            
		              //document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >proyecto registrado</span><br><br></div><br><br><br></div>';
					 	            
		            }	
		            	//location.reload(true);
		              //elementobut.style.display='none';
					}
					
				});
		}

	}else{
    

    	cant=document.getElementById('CantObj').value;
	
	cantEnv=document.getElementById('CantObj2').value;


	if (estado=="2") {

    var arrayText = [];
	var resulta = [];
	var productoo = [];
	var arrayid = [];

    var arrayTextGu = [];
	var resultaGu = [];
	var productooGu = [];

  for (var i = 1; i <= cantEnv; i++) {

    var id=document.getElementById('ids'+i).value;
    var objet=document.getElementById('obj_esp'+i).value;
    var resultado=document.getElementById('result'+i).value;
    var producto=document.getElementById('produt'+i).value;
    //alert(objet)


     arrayid[i] = id;
     arrayText[i] = objet;
     resulta[i] = resultado;
     productoo[i] = producto;

  }

  for (var k = 1; k < cant; k++) {
  }

  sumGu=i+k;

   if (cant!="0") {
  	for (var j = i; j < sumGu; j++) {
    var objetGu=document.getElementById('obj_esp'+j).value;
    var resultadoGu=document.getElementById('result'+j).value;
    var productoGu=document.getElementById('produt'+j).value;


     arrayTextGu[j] = objetGu;
     resultaGu[j] = resultadoGu;
     productooGu[j] = productoGu;

  }
  }

	var elementobut= document.getElementById('EnPr');
   DivNomSub = document.getElementById("Divnom_sub").style;
	DivEma_sub= document.getElementById("Divema_sub").style;
	Divnum_cel_subu= document.getElementById("Divnum_cel_sub").style;
	Divpro_autores = document.getElementById("Divpro_autores").style;
	Divnom_rad_pro= document.getElementById("Divnom_rad_pro").style;
	Divnum_identi = document.getElementById("Divnum_identi").style;
	Divema_rad_pro = document.getElementById("Divema_rad_pro").style;
	DivCel_rad_pro = document.getElementById("DivCel_rad_pro").style;
	Divtitulo_pro = document.getElementById("Divtitulo_pro").style;
	Divarea_con_1 = document.getElementById("Divarea_con_1").style;
	Divarea_con_2 = document.getElementById("Divarea_con_2").style;
	Divapli_posconf = document.getElementById("Divapli_posconf").style;
	Divmuni_impact = document.getElementById("Divmuni_impact").style;
	Divdes_estra = document.getElementById("Divdes_estra").style;
	Divrecu_poscof = document.getElementById("Divrecu_poscof").style;
	Divante_just_pro = document.getElementById("Divante_just_pro").style;
	Divplan_pro_nec = document.getElementById("Divplan_pro_nec").style;
	Divfech_ini_pro = document.getElementById("Divfech_ini_pro").style;
	Divfech_fin_pro = document.getElementById("Divfech_fin_pro").style;
	Divnom_gru_inv = document.getElementById("Divnom_gru_inv").style;
	Divcod_grupo = document.getElementById("Divcod_grupo").style;
	Divnum_sem_bene = document.getElementById("Divnum_sem_bene").style;
	Divnomb_sem_bene = document.getElementById("Divnomb_sem_bene").style;
	Divdes_meto_pro = document.getElementById("Divdes_meto_pro").style;
	Divnum_pro_bene = document.getElementById("Divnum_pro_bene").style;
	Divnom_pro_bene = document.getElementById("Divnom_pro_bene").style;
	Divimp_esperado = document.getElementById("Divimp_esperado").style;
	Divnum_per_ext = document.getElementById("Divnum_per_ext").style;
	Divnom_apr_ext = document.getElementById("Divnom_apr_ext").style;
	Divnum_iden_ext = document.getElementById("Divnum_iden_ext").style;
	Divnum_pers_int_s = document.getElementById("Divnum_pers_int_s").style;
	Divnom_ape_int_s = document.getElementById("Divnom_ape_int_s").style;
	Divnum_iden_int_s = document.getElementById("Divnum_iden_int_s").style;
	Divnum_pers_int_c = document.getElementById("Divnum_pers_int_c").style;
	Divnum_pers_int_in = document.getElementById("Divnum_pers_int_in").style;
	Divnom_apellidos = document.getElementById("Divnom_apellidos").style;
	Divnum_idenficac = document.getElementById("Divnum_idenficac").style;
	Divnum_per_int_s = document.getElementById("Divnum_per_int_s").style;
	Divnom_apell_pers = document.getElementById("Divnom_apell_pers").style;
	Divnum_iden_pers = document.getElementById("Divnum_iden_pers").style;
	Divnom_ali_int = document.getElementById("Divnom_ali_int").style;
	Divnit = document.getElementById("Divnit").style;
	DiVrec_esp_ent_ext = document.getElementById("Divrec_esp_ent_ext").style;
	Divrec_din_ent_ext = document.getElementById("Divrec_din_ent_ext").style;
	Divrec_esp_ent_int = document.getElementById("Divrec_esp_ent_int").style;
	Divrec_din_ent_int = document.getElementById("Divrec_din_ent_int").style;
	Divcui_mun_inf = document.getElementById("Divcui_mun_inf").style;
	Divdes_ali_obj = document.getElementById("Divdes_ali_obj").style;
	Divser_per_ind = document.getElementById("Divser_per_ind").style;
	Divdescripcion1 = document.getElementById("Divdescripcion1").style;
	Divequ_sis = document.getElementById("Divequ_sis").style;
	Divdescripcion2 = document.getElementById("Divdescripcion2").style;
	Divsoftware = document.getElementById("Divsoftware").style;
	Divdescripcion3 = document.getElementById("Divdescripcion3").style;
	Divmaq_ind = document.getElementById("Divmaq_ind").style;
	Divdescripcion4 = document.getElementById("Divdescripcion4").style;
	Divotra_com_equi = document.getElementById("Divotra_com_equi").style;
	Divdescripcion5 = document.getElementById("Divdescripcion5").style;
	Divmat_for_pro = document.getElementById("Divmat_for_pro").style;
	Divdescripcion6 = document.getElementById("Divdescripcion6").style;
	Divman_maq_equ = document.getElementById("Divman_maq_equ").style;
	Divdescripcion7 = document.getElementById("Divdescripcion7").style;
	Divot_com_tra = document.getElementById("Divot_com_tra").style;
	Divdescripcion8 = document.getElementById("Divdescripcion8").style;
	Divot_gast_imp = document.getElementById("Divot_gast_imp").style;
	Divdescripcion9 = document.getElementById("Divdescripcion9").style;
	Divdiv_act = document.getElementById("Divdiv_act").style;
	Divdescripcion10 = document.getElementById("Divdescripcion10").style;
	Divvia_gast_int = document.getElementById("Divvia_gast_int").style;
	Divdescripcion11 = document.getElementById("Divdescripcion11").style;
	Divade_cont = document.getElementById("Divade_cont").style;
	Divdescripcion12 = document.getElementById("Divdescripcion12").style;

/*	DivObjeGene = document.getElementById("DivObjeGene").style;
*/	DivCvla = document.getElementById("DivCvla").style;

	if(document.getElementById("pro_region").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la Region';
	document.getElementById("pro_region").focus();
	return;	
	
	}else if(document.getElementById("pro_centro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el Centro';
	document.getElementById("pro_centro").focus();
	return;	
	
	}else if(DivNomSub.display=="block" && document.getElementById("nom_sub").value==""){
		document.getElementById('res').innerHTML = 'Rellene este Campo';
		document.getElementById("nom_sub").focus();
	return;

	}else if(DivEma_sub.display=="block" && document.getElementById("ema_sub").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ema_sub").focus();
	return;

	}else if(Divnum_cel_subu.display=="block" && document.getElementById("num_cel_sub").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_cel_sub").focus();
	return;

	}else if(Divpro_autores.display=="block" && document.getElementById("pro_autores").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("pro_autores").focus();
	return;

	}else if(Divnom_rad_pro.display=="block" && document.getElementById("nom_rad_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_rad_pro").focus();
	return;

	}else if(Divnum_identi.display=="block" && document.getElementById("num_identi").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_identi").focus();
	return;

	}else if(Divema_rad_pro.display=="block" && document.getElementById("ema_rad_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ema_rad_pro").focus();
	return;

	}else if(DivCel_rad_pro.display=="block" && document.getElementById("Cel_rad_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("Cel_rad_pro").focus();
	return;

	}else if(Divtitulo_pro.display=="block" && document.getElementById("titulo_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("titulo_pro").focus();
	return;

	}else if(Divarea_con_1.display=="block" && document.getElementById("area_con_1").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("area_con_1").focus();
	return;

	}else if(Divarea_con_2.display=="block" && document.getElementById("area_con_2").value==0){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("area_con_2").focus();
	return;

	}else if(Divapli_posconf.display=="block" && document.getElementById("apli_posconf").value==""){
	document.getElementById('res').innerHTML = 'Seleccione si Aplica al Posconflicto';
	document.getElementById("apli_posconf").focus();
	return;
	
	}else if(Divmuni_impact.display=="block" && document.getElementById("muni_impact").value==0){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("muni_impact").focus();
	return;
	
	}else if(Divdes_estra.display=="block" && document.getElementById("des_estra").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("des_estra").focus();
	return;
	
	}else if(Divrecu_poscof.display=="block" && document.getElementById("recu_poscof").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("recu_poscof").focus();
	return;
	
	}else if(Divante_just_pro.display=="block" && document.getElementById("ante_just_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ante_just_pro").focus();
	return;
	}else if(Divplan_pro_nec.display=="block" && document.getElementById("plan_pro_nec").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("plan_pro_nec").focus();

	return; 
   }else if(Divfech_ini_pro.display=="block" && document.getElementById("fech_ini_pro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la Fecha inicio del proyecto';
	document.getElementById("fech_ini_pro").focus();

	return;
   }else if(Divfech_fin_pro.display=="block" && document.getElementById("fech_fin_pro").value==""){
	document.getElementById('res').innerHTML = 'Seleccione la fecha Fin del proyecto';
	document.getElementById("fech_fin_pro").focus();

	return;
   }else if(Divnom_gru_inv.display=="block" && document.getElementById("nom_gru_inv").value==""){
	document.getElementById('res').innerHTML = 'Seleccione el grupo de investigacion';
	document.getElementById("nom_gru_inv").focus();
	return;
   }else if(Divcod_grupo.display=="block" && document.getElementById("cod_grupo").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("cod_grupo").focus();
	return;
   }else if(Divnum_sem_bene.display=="block" && document.getElementById("num_sem_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_sem_bene").focus();
	return;
   }else if(Divnomb_sem_bene.display=="block" && document.getElementById("nomb_sem_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nomb_sem_bene").focus();
	return;
   }else if(Divdes_meto_pro.display=="block" && document.getElementById("des_meto_pro").value==""){
	document.getElementById('res').innerHTML ='Rellene este Campo';
	document.getElementById("des_meto_pro").focus();
	return;
   }else if(Divnum_pro_bene.display=="block" && document.getElementById("num_pro_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pro_bene").focus();
	return;
   }else if(Divnom_pro_bene.display=="block" && document.getElementById("nom_pro_bene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_pro_bene").focus();
	return;
	}else if(Divimp_esperado.display=="block" && document.getElementById("imp_esperado").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("imp_esperado").focus();
	return;	
	}else if(Divnum_per_ext.display=="block" && document.getElementById("num_per_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_per_ext").focus();
	return;	
	}else if(Divnom_apr_ext.display=="block" && document.getElementById("nom_apr_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_apr_ext").focus();
	return;	
	}else if(Divnum_iden_ext.display=="block" && document.getElementById("num_iden_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_iden_ext").focus();
	return;	
	}else if(Divnum_pers_int_s.display=="block" && document.getElementById("num_pers_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pers_int_s").focus();
	return;
   }else if(Divnom_ape_int_s.display=="block" && document.getElementById("nom_ape_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_ape_int_s").focus();
	return;
	}else if(Divnum_iden_int_s.display=="block" && document.getElementById("num_iden_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_iden_int_s").focus();
	return;
	}else if(Divnum_pers_int_c.display=="block" && document.getElementById("num_pers_int_c").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pers_int_c").focus();
	return;
	}else if(Divnum_pers_int_in.display=="block" && document.getElementById("num_pers_int_in").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_pers_int_in").focus();
	return;	
	}else if(Divnom_apellidos.display=="block" && document.getElementById("nom_apellidos").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_apellidos").focus();
	return;	
	}else if(Divnum_idenficac.display=="block" && document.getElementById("num_idenficac").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_idenficac").focus();
	return;	
	}else if(Divnum_per_int_s.display=="block" && document.getElementById("num_per_int_s").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_per_int_s").focus();
	return;	
	}else if(Divnom_apell_pers.display=="block" && document.getElementById("nom_apell_pers").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_apell_pers").focus();
	return;	
	}else if(Divnum_iden_pers.display=="block" && document.getElementById("num_iden_pers").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("num_iden_pers").focus();
	return;	
	}else if(Divnom_ali_int.display=="block" && document.getElementById("nom_ali_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nom_ali_int").focus();
	return;
	}else if(Divnit.display=="block" && document.getElementById("nit").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("nit").focus();
	return;
	}else if(Divrec_esp_ent_ext.display=="block" && document.getElementById("rec_esp_ent_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_esp_ent_ext").focus();
	return;	
	}else if(Divrec_din_ent_ext.display=="block" && document.getElementById("rec_din_ent_ext").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_din_ent_ext").focus();
	return;	
	}else if(Divrec_esp_ent_int.display=="block" && document.getElementById("rec_esp_ent_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_esp_ent_int").focus();
	return;	
	}else if(Divrec_din_ent_int.display=="block" && document.getElementById("rec_din_ent_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("rec_din_ent_int").focus();
	return;	
	}else if(Divcui_mun_inf.display=="block" && document.getElementById("cui_mun_inf").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("cui_mun_inf").focus();
	return;	
	}else if(Divdes_ali_obj.display=="block" && document.getElementById("des_ali_obj").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("des_ali_obj").focus();
	return;		
	}else if(Divser_per_ind.display=="block" && document.getElementById("ser_per_ind").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ser_per_ind").focus();
	return;	
	}else if(Divdescripcion1.display=="block" && document.getElementById("descripcion1").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion1").focus();
	return;	
    }else if(Divequ_sis.display=="block" && document.getElementById("equ_sis").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("equ_sis").focus();
	return;
	}else if(Divdescripcion2.display=="block" && document.getElementById("descripcion2").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion2").focus();
	return;
	}else if(Divsoftware.display=="block" && document.getElementById("software").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("software").focus();
	return;
	}else if(Divdescripcion3.display=="block" && document.getElementById("descripcion3").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion3").focus();
	return;
	}else if(Divmaq_ind.display=="block" && document.getElementById("maq_ind").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("maq_ind").focus();
	return;
	}else if(Divdescripcion4.display=="block" && document.getElementById("descripcion4").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion4").focus();
	return;
	}else if(Divotra_com_equi.display=="block" && document.getElementById("otra_com_equi").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("otra_com_equi").focus();
	return;
	}else if(Divdescripcion5.display=="block" && document.getElementById("descripcion5").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion5").focus();
	return;
	}else if(Divmat_for_pro.display=="block" && document.getElementById("mat_for_pro").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("mat_for_pro").focus();
	return;
	}else if(Divdescripcion6.display=="block" && document.getElementById("descripcion6").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion6").focus();
	return;
	}else if(Divman_maq_equ.display=="block" && document.getElementById("man_maq_equ").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("man_maq_equ").focus();
	return;
	}else if(Divdescripcion7.display=="block" && document.getElementById("descripcion7").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion7").focus();
	return;
	}else if(Divot_com_tra.display=="block" && document.getElementById("ot_com_tra").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ot_com_tra").focus();
	return;
	}else if(Divdescripcion8.display=="block" && document.getElementById("descripcion8").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion8").focus();
	return;
	}else if(Divot_gast_imp.display=="block" && document.getElementById("ot_gast_imp").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ot_gast_imp").focus();
	return;
	}else if(Divdescripcion9.display=="block" && document.getElementById("descripcion9").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion9").focus();
	return;
	}else if(Divdiv_act.display=="block" && document.getElementById("div_act").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("div_act").focus();
	return;
	}else if(Divdescripcion10.display=="block" && document.getElementById("descripcion10").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion10").focus();
	return;
	}else if(Divvia_gast_int.display=="block" && document.getElementById("via_gast_int").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("via_gast_int").focus();
	return;
	}else if(Divdescripcion11.display=="block" && document.getElementById("descripcion11").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion11").focus();
	return;
	}else if(Divade_cont.display=="block" && document.getElementById("ade_cont").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ade_cont").focus();
	return;
	}else if(Divdescripcion12.display=="block" && document.getElementById("descripcion12").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("descripcion12").focus();
	return;
	}else if(document.getElementById("ObjeGene").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("ObjeGene").focus();
	return;
	}else if(DivCvla.display=="block" && document.getElementById("Cvla").value==""){
	document.getElementById('res').innerHTML = 'Rellene este Campo';
	document.getElementById("Cvla").focus();
	return;
	}else{
	document.getElementById('res').innerHTML = '<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';

	/*
	}else{
	document.getElementById('res').innerHTML = '<div class="preloader-wrapper active"><div class="spinner-layer spinner-blue-only"><div class="circle-clipper left"><div class="circle"></div></div><div class="gap-patch"><div class="circle"></div></div><div class="circle-clipper right"><div class="circle"></div></div></div></div>';

	
	*/

			$.ajax({
				  url: "Servicios/actualizar.php",
				  data: {
				        identificacion : $("#identificacion").val(),
				        //anexo : $("#anexo").val(),
				        Cantidad : cant,                                             
				        CantidadEnv : cantEnv,                                             
				        EstaReg : estado,                                             
          				ids: JSON.stringify(arrayid),
          				arrayText: JSON.stringify(arrayText),
          				resulta: JSON.stringify(resulta),
          				productoo: JSON.stringify(productoo),
						arrayTextGu: JSON.stringify(arrayTextGu),
          				resultaGu: JSON.stringify(resultaGu),
          				productooGu: JSON.stringify(productooGu),
						codigoPro: $("#codigoPro").val(),
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
						/*obj_general: $("#obj_general").val(),
						obj_esp1: $("#obj_esp1").val(),
						obj_esp2: $("#obj_esp2").val(),
						obj_esp3: $("#obj_esp3").val(),
						obj_esp4: $("#obj_esp4").val(),
						obj_esp5: $("#obj_esp5").val(),
						obj_esp6: $("#obj_esp6").val(),
						obj_esp7: $("#obj_esp7").val(),
						obj_esp8: $("#obj_esp8").val(),
						obj_esp9: $("#obj_esp9").val(),
						obj_esp10: $("#obj_esp10").val(),*/
						fech_ini_pro: $("#fech_ini_pro").val(),
						fech_fin_pro: $("#fech_fin_pro").val(),
						nom_gru_inv: $("#nom_gru_inv").val(),
						cod_grupo: $("#cod_grupo").val(),
						num_sem_bene: $("#num_sem_bene").val(),
						nomb_sem_bene: $("#nomb_sem_bene").val(),
						des_meto_pro: $("#des_meto_pro").val(),
						/*resu_obj_esp1: $("#resu_obj_esp1").val(),
						resu_obj_esp2: $("#resu_obj_esp2").val(),
						resu_obj_esp3: $("#resu_obj_esp3").val(),
						resu_obj_esp4: $("#resu_obj_esp4").val(),
						prod_resu_1: $("#prod_resu_1").val(),
						prod_resu_2: $("#prod_resu_2").val(),
						prod_resu_3: $("#prod_resu_3").val(),
						prod_resu_4: $("#prod_resu_4").val(),*/
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
						ser_per_ind: $("#ser_per_ind").val(),
						descripcion1: $("#descripcion1").val(),
						equ_sis: $("#equ_sis").val(),
						descripcion2: $("#descripcion2").val(),
						software: $("#software").val(),
						descripcion3: $("#descripcion3").val(),
						maq_ind: $("#maq_ind").val(),
						descripcion4: $("#descripcion4").val(),
						otra_com_equi: $("#otra_com_equi").val(),
						descripcion5: $("#descripcion5").val(),
						mat_for_pro: $("#mat_for_pro").val(),
						descripcion6: $("#descripcion6").val(),
						man_maq_equ: $("#man_maq_equ").val(),
						descripcion7: $("#descripcion7").val(),
						ot_com_tra: $("#ot_com_tra").val(),
						descripcion8: $("#descripcion8").val(),
						ot_gast_imp: $("#ot_gast_imp").val(),
						descripcion9: $("#descripcion9").val(),
						div_act: $("#div_act").val(),
						descripcion10: $("#descripcion10").val(),
						via_gast_int: $("#via_gast_int").val(),
						descripcion11: $("#descripcion11").val(),
						ade_cont: $("#ade_cont").val(),
						descripcion12: $("#descripcion12").val(),
						
						Cvla: $("#Cvla").val(),
						ObjeGene: $("#ObjeGene").val()},
				  type: "POST",
				  
				  success: function(response){
/*				   alert(response);
*/				   	//$("#respuesta").html(response);
		            if (response==0){	
		              swal({title: "Error",text: "Error al guardar Proyecto",type: "error",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href=""});
						document.getElementById('res').innerHTML ='';		            
					}else if(response==1){
					  swal({title: "Guardado",text: "Proyecto Guardado Correctamente",type: "success",showCancelButton: false,confirmButtonColor: "orange",confirmButtonText: "ok", closeOnConfirm: false},function(){ window.location.href=""});
		               document.getElementById('res').innerHTML ='';		            
		              //document.getElementById('res').innerHTML ='<div class="col s11" id="res"><div class="col s11" id="ok"><br><img src="images/ok.png" class="add"></img> <span class="ok" >proyecto registrado</span><br><br></div><br><br><br></div>';
					 	            
		            }	
		            	//location.reload(true);
		              //elementobut.style.display='none';
					}
					
				});
		}

 
}
}
}


	


