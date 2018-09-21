<?php
@session_start();
	 include("../../conexion.php");
	$conn = new mysqli($local, $user, $pass, $base);
$identificacion=$_POST['identificacion'];
//$anexo=utf8_decode($_POST['anexo']);
$pro_region=$_POST['pro_region'];
$pro_centro=$_POST['pro_centro'];
$nom_sub=utf8_decode($_POST['nom_sub']);
$ema_sub=utf8_decode($_POST['ema_sub']);
$num_cel_sub=utf8_decode($_POST['num_cel_sub']);
$pro_autores=utf8_decode($_POST['pro_autores']);
$nom_rad_pro=utf8_decode($_POST['nom_rad_pro']);
$num_identi=utf8_decode($_POST['num_identi']);
$ema_rad_pro=utf8_decode($_POST['ema_rad_pro']);
$Cel_rad_pro=utf8_decode($_POST['Cel_rad_pro']);
$titulo_pro=utf8_decode($_POST['titulo_pro']);
$area_con_1=utf8_decode($_POST['area_con_1']);
$area_con_2=utf8_decode($_POST['area_con_2']);
$apli_posconf=utf8_decode($_POST['apli_posconf']);
$muni_impact=utf8_decode($_POST['muni_impact']);
$des_estra=utf8_decode($_POST['des_estra']);
$recu_poscof=utf8_decode($_POST['recu_poscof']);
$ante_just_pro=utf8_decode($_POST['ante_just_pro']);
$plan_pro_nec=utf8_decode($_POST['plan_pro_nec']);
$fech_ini_pro=$_POST['fech_ini_pro'];
$fech_fin_pro=$_POST['fech_fin_pro'];
$nom_gru_inv=$_POST['nom_gru_inv'];
$cod_grupo=utf8_decode($_POST['cod_grupo']);
$num_sem_bene=utf8_decode($_POST['num_sem_bene']);
$nomb_sem_bene=utf8_decode($_POST['nomb_sem_bene']);
$des_meto_pro=utf8_decode($_POST['des_meto_pro']);
$num_pro_bene=utf8_decode($_POST['num_pro_bene']);
$nom_pro_bene=utf8_decode($_POST['nom_pro_bene']);
$imp_esperado=utf8_decode($_POST['imp_esperado']);
$num_per_ext=utf8_decode($_POST['num_per_ext']);
$nom_apr_ext=utf8_decode($_POST['nom_apr_ext']);
$num_iden_ext=utf8_decode($_POST['num_iden_ext']);
$num_pers_int_s=utf8_decode($_POST['num_pers_int_s']);
$nom_ape_int_s=utf8_decode($_POST['nom_ape_int_s']);
$num_iden_int_s=utf8_decode($_POST['num_iden_int_s']);
$num_pers_int_c=$_POST['num_pers_int_c'];
/*$num_pers_int_cm=$_POST['num_pers_int_cm'];
*/$num_pers_int_in=$_POST['num_pers_int_in'];
$nom_apellidos=utf8_decode($_POST['nom_apellidos']);
$num_idenficac=utf8_decode($_POST['num_idenficac']);
$num_per_int_s=utf8_decode($_POST['num_per_int_s']);
$nom_apell_pers=utf8_decode($_POST['nom_apell_pers']);
$num_iden_pers=utf8_decode($_POST['num_iden_pers']);
$nom_ali_int=utf8_decode($_POST['nom_ali_int']);
$nit=utf8_decode($_POST['nit']);
$rec_esp_ent_ext=$_POST['rec_esp_ent_ext'];
$rec_din_ent_ext=$_POST['rec_din_ent_ext'];
$rec_esp_ent_int=$_POST['rec_esp_ent_int'];
$rec_din_ent_int=$_POST['rec_din_ent_int'];
$cui_mun_inf=utf8_decode($_POST['cui_mun_inf']);
$des_ali_obj=utf8_decode($_POST['des_ali_obj']);
$ot_se_pe_in=$_POST['ot_se_pe_in'];
$descripcion1=utf8_decode($_POST['descripcion1']);
$se_pe_in=$_POST['se_pe_in'];
$descripcion2=utf8_decode($_POST['descripcion2']);
$eq_de_si=$_POST['eq_de_si'];
$descripcion3=utf8_decode($_POST['descripcion3']);
$sofware=$_POST['sofware'];
$descripcion4=utf8_decode($_POST['descripcion4']);
$maq_ind=$_POST['maq_ind'];
$descripcion5=utf8_decode($_POST['descripcion5']);
$otr_com_equi=$_POST['otr_com_equi'];
$descripcion6=utf8_decode($_POST['descripcion6']);
$ma_pa_for=$_POST['ma_pa_for'];
$descripcion7=utf8_decode($_POST['descripcion7']);
$man_maq_equ=$_POST['man_maq_equ'];
$descripcion8=utf8_decode($_POST['descripcion8']);
$ot_com_tra=$_POST['ot_com_tra'];
$descripcion9=utf8_decode($_POST['descripcion9']);
$ot_gast_imp=$_POST['ot_gast_imp'];
$descripcion10=utf8_decode($_POST['descripcion10']);
$div_act=$_POST['div_act'];
$descripcion11=utf8_decode($_POST['descripcion11']);
$via_gast_int=$_POST['via_gast_int'];
$descripcion12=utf8_decode($_POST['descripcion12']);
$gast_bien=$_POST['gast_bien'];
$descripcion13=utf8_decode($_POST['descripcion13']);
$ade_cons=$_POST['ade_cons'];
$descripcion14=utf8_decode($_POST['descripcion14']);
/*$monitores=$_POST['monitores'];
$descripcion15=utf8_decode($_POST['descripcion15']);*/
$ObjeGene=$_POST['ObjeGene'];
$arrayText = json_decode($_POST['arrayObje']);
$arrayResult = json_decode($_POST['arrayresult']);
$arrayProductos = json_decode($_POST['arrayProducto']);
$CantidadProd = $_POST['Cantidad'];
$estado="Proceso";
$fecha="0000-00-00";
$pro_linea=2;
$Link_Cvla=$_POST['Cvla'];
$Rol=$_SESSION['cargo'];
$estadoReg=$_POST['EstaReg'];

if ($identificacion==""){
 	 $identificacion=0;

}if ($pro_region==""){
 	$pro_region=0;

 }if ($pro_centro==""){
 	$pro_centro=0;

 }if ($num_pers_int_in==""){
 	$num_pers_int_in=0;

 }/*if ($num_pers_int_cm==""){
 	$num_pers_int_cm=0;

 }*/if ($num_pers_int_c==""){
 	$num_pers_int_c=0;

 }if ($num_pers_int_s==""){
 	$num_pers_int_s=0;

 }if ($num_pro_bene==""){
 	$num_pro_bene=0;

 }if ($num_sem_bene==""){
 	$num_sem_bene=0;

 }if ($num_per_ext==""){
 	$num_per_ext=0;

 }if ($nom_gru_inv==""){
 	$nom_gru_inv=0;

 }if ($recu_poscof==""){
 	$recu_poscof=0;

 }/*if ($monitores==""){
 	$monitores=0;
 	
 }*/if ($ade_cons==""){
 	$ade_cons=0;

 }if ($nit==""){
 	$nit=0;

 }if ($gast_bien==""){
 	$gast_bien=0;

 }if ($via_gast_int==""){
 	$via_gast_int=0;

 }if ($div_act==""){
 	$div_act=0;

 }if ($ot_gast_imp==""){
 	$ot_gast_imp=0;

 }if ($ot_com_tra==""){
 	$ot_com_tra=0;

 }if ($man_maq_equ==""){
 	$man_maq_equ=0;

 }if ($ma_pa_for==""){
	$ma_pa_for=0;

 }if ($otr_com_equi==""){
 	$otr_com_equi=0;

 }if ($maq_ind==""){
 	$maq_ind=0;

 }if ($sofware==""){
 	$sofware=0;

 }if ($eq_de_si==""){
 	$eq_de_si=0;

 }if ($se_pe_in==""){
 	$se_pe_in=0;

 }if ($ot_se_pe_in==""){
 	$ot_se_pe_in=0;

 }if ($rec_din_ent_int==""){
 	# code...
 	$rec_din_ent_int=0;
 }if ($rec_esp_ent_int==""){
 	$rec_esp_ent_int=0;

 }if ($rec_din_ent_ext==""){
 	$rec_din_ent_ext=0;

 }if ($rec_esp_ent_ext==""){
 	$rec_esp_ent_ext=0;

 }if ($num_per_int_s=="") {
 	$num_per_int_s=0;
 }
 if ($fech_ini_pro=="0000-00-00") {
 	$fech_ini_pro="0000-00-00";
 }
 if ($fech_fin_pro=="0000-00-00") {
 	$fech_fin_pro="0000-00-00";
 }

//echo $_SESSION['cantidad'];


/*INSERT INTO investigacion(pro_linea,pro_region,pro_centro,nom_sub,ema_sub,num_cel_sub,pro_autores,nom_rad_pro,num_identi,ema_rad_pro,Cel_rad_pro,titulo_pro,area_con_1,area_con_2,apli_posconf,muni_impact,des_estra,recu_poscof,ante_just_pro,plan_pro_nec,obj_general,obj_esp1,obj_esp2,obj_esp3,obj_esp4,fech_ini_pro,fech_fin_pro,nom_gru_inv,cod_grupo,num_sem_bene,nomb_sem_bene,des_meto_pro,resu_obj_esp1,resu_obj_esp2,resu_obj_esp3,resu_obj_esp4,prod_resu_1,prod_resu_2,prod_resu_3,prod_resu_4,num_pro_bene,nom_pro_bene,imp_esperado,num_per_ext,nom_apr_ext,num_iden_ext,num_pers_int_s,nom_ape_int_s,num_iden_int_s,num_pers_int_c,num_pers_int_cm,num_pers_int_in,nom_apellidos,num_idenficac,num_per_int_s,nom_apell_pers,num_iden_pers,nom_ali_int,nit,rec_esp_ent_ext,rec_din_ent_ext,rec_esp_ent_int,rec_din_ent_int,cui_mun_inf,des_ali_obj,ot_se_pe_in,descripcion1,se_pe_in,descripcion2,eq_de_si,descripcion3,sofware,descripcion4,maq_ind,descripcion5,otr_com_equi,descripcion6,ma_pa_for,descripcion7,man_maq_equ,descripcion8,ot_com_tra,descripcion9,ot_gast_imp,descripcion10,div_act,descripcion11,via_gast_int,descripcion12,gast_bien,descripcion13,ade_cons,descripcion14,monitores,descripcion15)*/
    

	$consulta = "INSERT INTO innovacion(identificacion, pro_linea,pro_region,pro_centro,nom_sub,ema_sub,num_cel_sub,pro_autores,nom_rad_pro,num_identi,ema_rad_pro,Cel_rad_pro,titulo_pro,area_con_1,area_con_2,apli_posconf,muni_impact,des_estra,recu_poscof,ante_just_pro,plan_pro_nec,fech_ini_pro,fech_fin_pro,nom_gru_inv,cod_grupo,num_sem_bene,nomb_sem_bene,des_meto_pro,num_pro_bene,nom_pro_bene,imp_esperado,num_per_ext,nom_apr_ext,num_iden_ext,num_pers_int_s,nom_ape_int_s,num_iden_int_s,num_pers_int_c,num_pers_int_in,nom_apellidos,num_idenficac,num_per_int_s,nom_apell_pers,num_iden_pers,nom_ali_int,nit,rec_esp_ent_ext,rec_din_ent_ext,rec_esp_ent_int,rec_din_ent_int,cui_mun_inf,des_ali_obj,ot_se_pe_in,descripcion1,se_pe_in,descripcion2,eq_de_si,descripcion3,sofware,descripcion4,maq_ind,descripcion5,otr_com_equi,descripcion6,ma_pa_for,descripcion7,man_maq_equ,descripcion8,ot_com_tra,descripcion9,ot_gast_imp,descripcion10,div_act,descripcion11,via_gast_int,descripcion12,gast_bien,descripcion13,ade_cons,descripcion14,estado,envio,LinkCvlac,Rol,estadoReg)
						VALUES('$identificacion','$pro_linea','$pro_region','$pro_centro','$nom_sub','$ema_sub','$num_cel_sub','$pro_autores','$nom_rad_pro','$num_identi','$ema_rad_pro','$Cel_rad_pro','$titulo_pro','$area_con_1','$area_con_2','$apli_posconf','$muni_impact','$des_estra','$recu_poscof','$ante_just_pro','$plan_pro_nec','$fech_ini_pro','$fech_fin_pro','$nom_gru_inv','$cod_grupo','$num_sem_bene','$nomb_sem_bene','$des_meto_pro','$num_pro_bene','$nom_pro_bene','$imp_esperado','$num_per_ext','$nom_apr_ext','$num_iden_ext','$num_pers_int_s','$nom_ape_int_s','$num_iden_int_s','$num_pers_int_c','$num_pers_int_in','$nom_apellidos','$num_idenficac','$num_per_int_s','$nom_apell_pers','$num_iden_pers','$nom_ali_int','$nit','$rec_esp_ent_ext','$rec_din_ent_ext','$rec_esp_ent_int','$rec_din_ent_int','$cui_mun_inf','$des_ali_obj','$ot_se_pe_in','$descripcion1','$se_pe_in','$descripcion2','$eq_de_si','$descripcion3','$sofware','$descripcion4','$maq_ind','$descripcion5','$otr_com_equi','$descripcion6','$ma_pa_for','$descripcion7','$man_maq_equ','$descripcion8','$ot_com_tra','$descripcion9','$ot_gast_imp','$descripcion10','$div_act','$descripcion11','$via_gast_int','$descripcion12','$gast_bien','$descripcion13','$ade_cons','$descripcion14','$estado','$fecha','$Link_Cvla','$Rol','$estadoReg')";

	$sw=0;
	if ($conn->query($consulta) === TRUE) {
		if ($estado=="1") {
			echo "1";
		}else{
			 $codigo="";
	 $consulta2="SELECT * FROM innovacion";
	 $result = $conn->query($consulta2);
      while($row = mysqli_fetch_array($result)){
      	$codigo=$row['codigo'];
      }
      $consulta4="INSERT INTO proyectos(id_linea,id_proye,titul_proy,auto_proy) VALUES ('$pro_linea','$codigo','$titulo_pro','$pro_autores')";
      if ($conn->query($consulta4) === TRUE) {
		
			for ($k=0; $k < $_SESSION['cantidad'] ; $k++) { 

				 $consulta5="INSERT INTO prog_proy(linea,id_proy,id_prog) VALUES ('$pro_linea','$codigo','".$_SESSION['Programa"'.$k.'"']."')";
				 if ($conn->query($consulta5) === TRUE) {
				 	//ECHO "1";
				 }

				 
	     
			}
	    }
      if ($codigo!="") {
        for ($i=1; $i <=$CantidadProd ; $i++) { 
		$consulta3 ="INSERT INTO opr(cod_pro, general, objetivo, resultado, producto) VALUES ('$codigo','$ObjeGene','$arrayText[$i]','$arrayResult[$i]','$arrayProductos[$i]')";
		
		 //$conn->query($consulta3);
		    $sw=0;
			if ($conn->query($consulta3) === TRUE) {
				 	$sw=1;
		    }else{
		    	echo "0";
		    }
		 }
		 
		
	   }else{
	   	echo "0";
	   }
	  

		}
	
      }else{
        echo "0";
      }
      if ($sw==1) {
      	echo "1";
      }else{

      }
 

	//echo $fecha;
	/* cerrar la conexión */
	$conn->close();
?>