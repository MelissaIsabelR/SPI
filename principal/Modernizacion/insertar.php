
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
$num_pers_int_in=$_POST['num_pers_int_in'];
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
$equi_sis=$_POST['equi_sis'];
$descripcion1=utf8_encode($_POST['descripcion1']);
$software=$_POST['software'];
$descripcion2=utf8_encode($_POST['descripcion2']);
$maq_ind=$_POST['maq_ind'];
$descripcion3=utf8_encode($_POST['descripcion3']);
$otr_com_equ=$_POST['otr_com_equ'];
$descripcion4=utf8_encode($_POST['descripcion4']);
$maq_for_pro=$_POST['maq_for_pro'];
$descripcion5=utf8_encode($_POST['descripcion5']);
$man_maq_equi=$_POST['man_maq_equi'];
$descripcion6=utf8_encode($_POST['descripcion6']);
$otra_com_tran=$_POST['otra_com_tran'];
$descripcion7=utf8_encode($_POST['descripcion7']);
$ade_cons=$_POST['ade_cons'];
$descripcion8=utf8_encode($_POST['descripcion8']);
$ObjeGene=$_POST['ObjeGene'];
$arrayText = json_decode($_POST['arrayObje']);
$arrayResult = json_decode($_POST['arrayresult']);
$arrayProductos = json_decode($_POST['arrayProducto']);
$CantidadProd = $_POST['Cantidad'];
$estado="Proceso";
$fecha="0000-00-00";
$pro_linea=4;
$Cvla=$_POST['Cvla'];
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

 }if ($num_pers_int_c==""){
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

 }if ($equi_sis==""){
 	$equi_sis=0;

 }if ($software==""){
 	$software=0;

 }if ($maq_ind==""){
 	$maq_ind=0;

 }if ($otr_com_equ==""){
 	$otr_com_equ=0;

 }if ($maq_for_pro==""){
 	$maq_for_pro=0;

 }if ($man_maq_equi==""){
 	$man_maq_equi=0;

 }if ($otra_com_tran==""){
 	$otra_com_tran=0;

 }if ($ade_cons==""){
 	$ade_cons=0;

 }if ($nit==""){
 	$nit=0;

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

	$consulta = "INSERT INTO modernizacion(identificacion, pro_linea,pro_region,pro_centro,nom_sub,ema_sub,num_cel_sub,pro_autores,nom_rad_pro,num_identi,ema_rad_pro,Cel_rad_pro,titulo_pro,area_con_1,area_con_2,apli_posconf,muni_impact,des_estra,recu_poscof,ante_just_pro,plan_pro_nec,fech_ini_pro,fech_fin_pro,nom_gru_inv,cod_grupo,num_sem_bene,nomb_sem_bene,des_meto_pro,num_pro_bene,nom_pro_bene,imp_esperado,num_per_ext,nom_apr_ext,num_iden_ext,num_pers_int_s,nom_ape_int_s,num_iden_int_s,num_pers_int_c,num_pers_int_in,nom_apellidos,num_idenficac,num_per_int_s,nom_apell_pers,num_iden_pers,nom_ali_int,nit,rec_esp_ent_ext,rec_din_ent_ext,rec_esp_ent_int,rec_din_ent_int,cui_mun_inf,des_ali_obj,equi_sis,descripcion1,software,descripcion2,maq_ind,descripcion3,otr_com_equ,descripcion4,maq_for_pro,descripcion5,man_maq_equi,descripcion6,otra_com_tran,descripcion7,ade_cons,descripcion8, estado,envio,LinkCvlac,Rol,estadoReg)
						VALUES('$identificacion','$pro_linea','$pro_region','$pro_centro','$nom_sub','$ema_sub','$num_cel_sub','$pro_autores','$nom_rad_pro','$num_identi','$ema_rad_pro','$Cel_rad_pro','$titulo_pro','$area_con_1','$area_con_2','$apli_posconf','$muni_impact','$des_estra','$recu_poscof','$ante_just_pro','$plan_pro_nec','$fech_ini_pro','$fech_fin_pro','$nom_gru_inv','$cod_grupo','$num_sem_bene','$nomb_sem_bene','$des_meto_pro','$num_pro_bene','$nom_pro_bene','$imp_esperado','$num_per_ext','$nom_apr_ext','$num_iden_ext','$num_pers_int_s','$nom_ape_int_s','$num_iden_int_s','$num_pers_int_c','$num_pers_int_in','$nom_apellidos','$num_idenficac','$num_per_int_s','$nom_apell_pers','$num_iden_pers','$nom_ali_int','$nit','$rec_esp_ent_ext','$rec_din_ent_ext','$rec_esp_ent_int','$rec_din_ent_int','$cui_mun_inf','$des_ali_obj','$equi_sis','$descripcion1','$software','$descripcion2','$maq_ind','$descripcion3','$otr_com_equ','$descripcion4','$maq_for_pro','$descripcion5','$man_maq_equi','$descripcion6','$otra_com_tran','$descripcion7','$ade_cons','$descripcion8', '$estado','$fecha','$Cvla','$Rol','$estadoReg')";
	
if ($conn->query($consulta) === TRUE) {
	 $codigo="";
	 $consulta2="SELECT * FROM modernizacion";
	 $result = $conn->query($consulta2);
      while($row = mysqli_fetch_array($result)){
      	$codigo=$row['codigo'];
      }
      $consulta4="INSERT INTO proyectos(id_linea,id_proye,titul_proy,auto_proy) VALUES ('$pro_linea','$codigo','$titulo_pro','$pro_autores')";
      if ($conn->query($consulta4) === TRUE) {
		
			for ($k=0; $k < $_SESSION['cantidadM'] ; $k++) { 

				 $consulta5="INSERT INTO prog_proy(linea,id_proy,id_prog) VALUES ('$pro_linea','$codigo','".$_SESSION['ProgramaM"'.$k.'"']."')";
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
	  
      }else{
        echo "0";
      }
      if ($sw==1) {
      	echo "1";
      }
 

	//echo $fecha;
	/* cerrar la conexión */
	$conn->close();
?>