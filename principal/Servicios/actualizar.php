<?php
@session_start();
	 include("../../conexion.php");
	$conn = new mysqli($local, $user, $pass, $base);
$identificacion=$_POST['identificacion'];
//$anexo=utf8_decode($_POST['anexo']);
$pro_region=$_POST['pro_region'];
$pro_centro=$_POST['pro_centro'];
$codigoPro=$_POST['codigoPro'];
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
$ser_per_ind=$_POST['ser_per_ind'];
$descripcion1=utf8_decode($_POST['descripcion1']);
$equ_sis=$_POST['equ_sis'];
$descripcion2=utf8_decode($_POST['descripcion2']);
$software=$_POST['software'];
$descripcion3=utf8_decode($_POST['descripcion3']);
$maq_ind=$_POST['maq_ind'];
$descripcion4=utf8_decode($_POST['descripcion4']);
$otra_com_equi=$_POST['otra_com_equi'];
$descripcion5=utf8_decode($_POST['descripcion5']);
$mat_for_pro=$_POST['mat_for_pro'];
$descripcion6=utf8_decode($_POST['descripcion6']);
$man_maq_equ=$_POST['man_maq_equ'];
$descripcion7=utf8_decode($_POST['descripcion7']);
$ot_com_tra=$_POST['ot_com_tra'];
$descripcion8=utf8_decode($_POST['descripcion8']);
$ot_gast_imp=$_POST['ot_gast_imp'];
$descripcion9=utf8_decode($_POST['descripcion9']);
$div_act=$_POST['div_act'];
$descripcion10=utf8_decode($_POST['descripcion10']);
$via_gast_int=$_POST['via_gast_int'];
$descripcion11=utf8_decode($_POST['descripcion11']);
$ade_cont=$_POST['ade_cont'];
$descripcion12=utf8_decode($_POST['descripcion12']);
$ObjeGene=$_POST['ObjeGene'];
$arrayText = json_decode($_POST['arrayText']);
$arrayResult = json_decode($_POST['resulta']);
$arrayProductos = json_decode($_POST['productoo']);
$arrayTextGu = json_decode($_POST['arrayTextGu']);
$arrayResultGu = json_decode($_POST['resultaGu']);
$arrayProductosGu = json_decode($_POST['productooGu']);
$ids = json_decode($_POST['ids']);
$CantidadProd = $_POST['Cantidad'];
$cantEnv = $_POST['CantidadEnv'];
$estado="Proceso";
$fecha="0000-00-00";
$pro_linea=3;
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

 }if ($ser_per_ind==""){
 	$ser_per_ind=0;

 }if ($nit==""){
 	$nit=0;

 }if ($equ_sis==""){
 	$equ_sis=0;

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

 }if ($software==""){
	$software=0;

 }if ($maq_ind==""){
 	$maq_ind=0;

 }/*if ($maq_ind==""){
 	$maq_ind=0;



ot_gast_imp
div_act
via_gast_int


 }*/if ($otra_com_equi==""){
 	$otra_com_equi=0;

 }if ($ade_cont==""){
 	$ade_cont=0;

 }if ($mat_for_pro==""){
 	$mat_for_pro=0;

 }if ($man_maq_equ==""){
 	$man_maq_equ=0;

 }if ($ot_com_tra==""){
 	$ot_com_tra=0;

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
    

$consulta = "UPDATE servicios SET 
identificacion=$identificacion,
pro_linea=$pro_linea,
pro_region=$pro_region,
pro_centro=$pro_centro,
nom_sub='$nom_sub',
ema_sub='$ema_sub',
num_cel_sub='$num_cel_sub',
pro_autores='$pro_autores',
nom_rad_pro='$nom_rad_pro',
num_identi='$num_identi',
ema_rad_pro='$ema_rad_pro',
Cel_rad_pro='$Cel_rad_pro',
titulo_pro='$titulo_pro',
area_con_1='$area_con_1',
area_con_2='$area_con_2',
apli_posconf='$apli_posconf',
muni_impact='$muni_impact',
des_estra='$des_estra',
recu_poscof=$recu_poscof,
ante_just_pro='$ante_just_pro',
plan_pro_nec='$plan_pro_nec',
fech_ini_pro='$fech_ini_pro',
fech_fin_pro='$fech_fin_pro',
nom_gru_inv=$nom_gru_inv,
cod_grupo='$cod_grupo',
num_sem_bene=$num_sem_bene,
nomb_sem_bene='$nomb_sem_bene',
des_meto_pro='$des_meto_pro',
num_pro_bene=$num_pro_bene,
nom_pro_bene='$nom_pro_bene',
imp_esperado='$imp_esperado',
num_per_ext=$num_per_ext,
nom_apr_ext='$nom_apr_ext',
num_iden_ext='$num_iden_ext',
num_pers_int_s=$num_pers_int_s,
nom_ape_int_s='$nom_ape_int_s',
num_iden_int_s='$num_iden_int_s',
num_pers_int_c=$num_pers_int_c,
num_pers_int_in=$num_pers_int_in,
nom_apellidos='$nom_apellidos',
num_idenficac='$num_idenficac',
num_per_int_s=$num_per_int_s,
nom_apell_pers='$nom_apell_pers',
num_iden_pers='$num_iden_pers',
nom_ali_int='$nom_ali_int',
nit=$nit,
rec_esp_ent_ext=$rec_esp_ent_ext,
rec_din_ent_ext=$rec_din_ent_ext,
rec_esp_ent_int=$rec_esp_ent_int,
rec_din_ent_int=$rec_din_ent_int,
cui_mun_inf='$cui_mun_inf',
des_ali_obj='$des_ali_obj',
ser_per_ind=$ser_per_ind,
descripcion1='$descripcion1',
equ_sis=$equ_sis,
descripcion2='$descripcion2',
software=$software,
descripcion3='$descripcion3',
maq_ind=$maq_ind,
descripcion4='$descripcion4',
otra_com_equi=$otra_com_equi,
descripcion5='$descripcion5',
mat_for_pro=$mat_for_pro,
descripcion6='$descripcion6',
man_maq_equ=$man_maq_equ,
descripcion7='$descripcion7',
ot_com_tra=$ot_com_tra,
descripcion8='$descripcion8',
ot_gast_imp=$ot_gast_imp,
descripcion9='$descripcion9',
div_act=$div_act,
descripcion10='$descripcion10',
via_gast_int=$via_gast_int,
descripcion11='$descripcion11',
ade_cont=$ade_cont,
descripcion12='$descripcion12',
estado='$estado',
envio='$fecha',
LinkCvlac='$Link_Cvla',
Rol='$Rol',
estadoReg=$estadoReg where codigo=$codigoPro and pro_linea=$pro_linea ";

$sw=0;
	if ($conn->query($consulta) === TRUE) {
		if ($estado=="1") {
			echo "1";
		}else{
			 $codigo="";
	 $consulta2="SELECT * FROM servicios";
	 $result = $conn->query($consulta2);
      while($row = mysqli_fetch_array($result)){
      	$codigo=$row['codigo'];
      }
      $codigo=$codigoPro;
      $consulta4="
      UPDATE proyectos 
      SET id_linea=$pro_linea,
      id_proye=$codigo,
      titul_proy='$titulo_pro',
      auto_proy='pro_autores'
      ";

      if ($conn->query($consulta4) === TRUE) {
		
			/*for ($k=0; $k < $_SESSION['cantidad'] ; $k++) { 

				 $consulta5="UPDATE prog_proy SET linea=$linea,
				 id_proy=$codigo,
				 id_prog='".$_SESSION['Programa"'.$k.'"']."'";
				 if ($conn->query($consulta5) === TRUE) {
				 	//ECHO "1";
				 }

				 
	     
			}*/
	    }
       if ($codigo!="") {
        for ($i=1; $i <=$cantEnv ; $i++) { 
       /* if ($CantidadProd==0) {*/
            $consulta3 ="UPDATE opr SET 
			cod_pro=$codigo,
			general='$ObjeGene',
			objetivo='$arrayText[$i]',
			resultado='$arrayResult[$i]',
			 producto='$arrayProductos[$i]' where id=".$ids[$i]."";
			
			 //$conn->query($consulta3);
			    $sw=0;
				if ($conn->query($consulta3) === TRUE) {
					 	$sw=1;
			    }else{
			    	echo "0";
			    }
			 /*}*/
		 
        }
        $InicioGu=$cantEnv+1;

		
		$sum=$cantEnv+$CantidadProd;
		
		
		//////////GUARDAR///////////////

		for ($GuOb=$InicioGu; $GuOb <=$sum; $GuOb++) { 
		  $consultaG ="INSERT INTO opr(cod_pro, general, objetivo, resultado, producto) VALUES ('$codigo','$ObjeGene','$arrayTextGu[$GuOb]','$arrayResultGu[$GuOb]','$arrayProductosGu[$GuOb]')";
		
		 //$conn->query($consulta3);
		    $sw=0;
			if ($conn->query($consultaG) === TRUE) {
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