
<?php 
/*$array1[0]="melissa";
$array1[1]="mariana";
$array1[2]="mariajose";
$array1[3]="ana";
$array1[4]="jose";
$array1[5]="andrea";
$array1[6]="simon";
$array1[6]="mateo";
$array1[7]="luis";


$array2[0]="melissa";
$array2[1]="mariana";
$array2[2]="simon";

for ($i=0;$i<=7;$i++){
for($j=0;$j<=2;$j++){
if($array1[$i]==$array2[$j]){
echo $i."igual".$array1[$i]."-----".$array2[$j]."<br><br>";
}else{
echo $i."NO es igual".$array1[$i]."-----".$array2[$j]."<br><br>";
}
}
}
*/
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>

 	    <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>


 </head>
 <script type="text/javascript">
 	function guardar() {
 		$.ajax({
				  url: "register/validaciones.php",
				  data: {
				        
						c1 : $("#cam1").val(),
						c2 : $("#cam2").val(),
						c3 : $("#cam3").val(),
						c4 : $("#cam4").val()
						
						},
				  type: "POST",
				  
				  success: function(response){
				   	alert(response);
		            
					}
					
				});
 	}

 
 </script>
 <body>

 <div class="input-field col s6">
                <select id="cam1">
                  <option value="" disabled selected>Seleccine</option>
                  <option value="Si">si</option>
                  <option value="No">no</option>
                </select>
                <label>Aplica al posconflicto</label>
            </div>

 <input type="text" id="cam2">
 <input type="text" id="cam3">
 <input type="text" id="cam4">
<button onclick="guardar()">rrrr</button>

<script type="text/javascript" src="jquery-2.1.1.min.js"></script>

<script type="text/javascript" src="js/materialize.min.js"></script>

<script type="text/javascript">
		$(document).ready(function() {
    $('select').material_select();
    });

</script>
 </body>
 </html>

 ////////////////////////////////////////////////////////////////////////////////////////////////////
<?php  
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
$num_pers_int_cm=$_POST['num_pers_int_cm'];
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
$monitores=$_POST['monitores'];
$descripcion15=utf8_decode($_POST['descripcion15']);
$ObjeGene=$_POST['ObjeGene'];
$arrayText = " " ;
$arrayResult = " " ;
$arrayProductos = " " ;
$CantidadProd = $_POST['Cantidad'];
$estado="Proceso";
$fecha="0000-00-00";
$pro_linea=1;
$Link_Cvla=$_POST['Cvla'];
$Rol=$_SESSION['cargo'];
$estadoReg=$_POST['EstaReg'];

if ($titulo_pro==" "){
 	 $titulo_pro=" ";
 }elseif ($identificacion==" "){
 	 $identificacion=" ";

}elseif ($pro_region==" "){
 	# code...
 	$pro_region=" ";
 }elseif ($pro_centro==" "){
 	# code...
 	$pro_centro=" ";
 }elseif ($nom_sub==" "){
 	# code...
 	$nom_sub=" ";
 }elseif ($ema_sub==" "){
 	# code...
 	$ema_sub=" ";
 }elseif ($num_cel_sub==" "){
 	# code...
 	$num_cel_sub=" ";
 }elseif ($pro_autores==" "){
 	# code...
 	$pro_autores=" ";
 }elseif ($nom_rad_pro==" "){
 	# code...
 	$nom_rad_pro=" ";
 }elseif ($num_identi==" "){
 	# code...
 	$num_identi=" ";
 }elseif ($ema_rad_pro==" "){
 	# code...
 	$ema_rad_pro=" ";
 }elseif ($Cel_rad_pro==" "){
# code...
 	$Cel_rad_pro=" ";
 }elseif ($nit==" "){
 	# code...
 	$nit=" ";
}elseif ($nom_ali_int==" "){
	# code...
	$nom_ali_int=" ";
}elseif ($num_iden_pers==" "){
 	# code...
 	$num_iden_pers=" ";
 }elseif ($nom_apell_pers==" "){
 	# code...
 	$nom_apell_pers=" ";
 }elseif ($num_per_int_s==" "){
 	# code...
 	$num_per_int_s=" ";
 }elseif ($num_idenficac==" "){
 	# code...
 	$num_idenficac=" ";
 }elseif ($nom_apellidos==" "){
 	# code...
 	$nom_apellidos=" ";
 }elseif ($num_pers_int_in==" "){
 	# code...
 	$num_pers_int_in=" ";
 }elseif ($num_pers_int_cm==" "){
 	# code...
 	$num_pers_int_cm=" ";
 }elseif ($num_pers_int_c==" "){


 	# code...
 	$num_pers_int_c=" ";
 }elseif ($num_iden_int_s==" "){
 	# code...
 	$num_iden_int_s=" ";
 }elseif ($nom_ape_int_s==" "){
 	# code...
 	$nom_ape_int_s=" ";
 }elseif ($num_pers_int_s==" "){
 	# code...
 	$num_pers_int_s=" ";
 }elseif ($num_iden_ext==" "){
 	# code...
 	$num_iden_ext=" ";
 }elseif ($nom_apr_ext==" "){
 	# code...
 	$nom_apr_ext=" ";
 }elseif ($num_per_ext==" "){
 	# code...
 	$num_per_ext=" ";
 }elseif ($imp_esperado==" "){
 	# code...
 	$imp_esperado=" ";

 }elseif ($nom_pro_bene==" "){
 	# code...
 	$nom_pro_bene=" ";
 }elseif ($num_pro_bene==" "){
 	# code...
 	$num_pro_bene=" ";
 }elseif ($des_meto_pro==" "){
 	# code...
 	$des_meto_pro=" ";
 }elseif ($nomb_sem_bene==" "){
 	# code...
 	$nomb_sem_bene=" ";
 }elseif ($num_sem_bene==" "){
 	# code...
 	$num_sem_bene=" ";
 }elseif ($cod_grupo==" "){
 	# code...
 	$cod_grupo=" ";
 }elseif ($nom_gru_inv==" "){
 	# code...
 	$nom_gru_inv=" ";
 }elseif ($fech_fin_pro==" "){
 	# code...
 	$fech_fin_pro=" ";
 }elseif ($fech_ini_pro==" "){
 
 	# code...
 	$fech_ini_pro=" ";
 }elseif ($plan_pro_nec==" "){
 	# code...
 	$plan_pro_nec=" ";
 }elseif ($ante_just_pro==" "){
 	# code...
 	$ante_just_pro=" ";
 }elseif ($recu_poscof==" "){
 	# code...
 	$des_estra=" ";
 }elseif ($des_estra==" "){
 	# code...
 	$muni_impact=" ";
 }elseif ($muni_impact==" "){
 	# code...
 	$apli_posconf=" ";
 }elseif ($apli_posconf==" "){
 	# code...
 	$area_con_2=" ";
 }elseif ($area_con_2==" "){
 	# code...
 	$area_con_1=" ";
 }elseif ($area_con_1==" "){
 	# code...
 	$ObjeGene=" ";
 }elseif ($ObjeGene==" "){
 	# code...
 	$descripcion15=" ";
 }elseif ($descripcion15==" "){
 	# code...
 	$monitores=" ";
 }elseif ($monitores==" "){
 	# code...
 	$descripcion14=" ";
 }elseif ($descripcion14==" "){
 	# code...
 	$descripcion14=" ";
 }elseif ($ade_cons==" "){
 	# code...
 	$ade_cons=" ";
 }elseif ($descripcion13==" "){
 	# code...
 	$descripcion13=" ";
 }elseif ($gast_bien==" "){
 	# code...
 	$gast_bien=" ";
 }elseif ($descripcion12==" "){
 	# code...
 	$descripcion12=" ";
 }elseif ($via_gast_int==" "){
 	# code...
 	$via_gast_int=" ";
 }elseif ($descripcion11==" "){
 	# code...
 	$descripcion11=" ";
 }elseif ($div_act==" "){
 	# code...
 	$div_act=" ";
 }elseif ($descripcion10==" "){
 	# code...
 	$descripcion10=" ";
 }elseif ($ot_gast_imp==" "){
 	# code...
 	$ot_gast_imp=" ";
 }elseif ($descripcion9==" "){
 	# code...
 	$descripcion9=" ";
 }elseif ($ot_com_tra==" "){
 	# code...
 	$ot_com_tra=" ";
 }elseif ($descripcion8==" "){
 	# code...
 	$descripcion8=" ";
 }elseif ($man_maq_equ==" "){
 	# code...
 	$man_maq_equ=" ";
 }elseif ($descripcion7==" "){
 	# code...
 	$descripcion7=" ";
 }elseif ($ma_pa_for==" "){

	# code...
	$ma_pa_for=" ";
 }elseif ($descripcion6==" "){
 	# code...
 	$descripcion6=" ";
 }elseif ($otr_com_equi==" "){
 	# code...
 	$otr_com_equi=" ";
 }elseif ($descripcion5==" "){
 	# code...
 	$descripcion5=" ";
 }elseif ($maq_ind==" "){
 	# code...
 	$maq_ind=" ";
 }elseif ($descripcion4==" "){
 	# code...
 	$descripcion4=" ";
 }elseif ($sofware==" "){
 	# code...
 	$sofware=" ";
 }elseif ($descripcion3==" "){
 	# code...
 	$descripcion3=" ";
 }elseif ($eq_de_si==" "){
 	# code...
 	$eq_de_si=" ";
 }elseif ($descripcion2==" "){
 	# code...
 	$descripcion2=" ";
 }elseif ($se_pe_in==" "){
 	# code...
 	$se_pe_in=" ";
 }elseif ($descripcion1==" "){
 	# code...
 	$descripcion1=" ";
 }elseif ($ot_se_pe_in==" "){
 	# code...
 	$ot_se_pe_in=" ";
 }elseif ($des_ali_obj==" "){
 	# code...
 	$des_ali_obj=" ";
 }elseif ($cui_mun_inf==" "){
 	# code...
 	$cui_mun_inf=" ";
 }elseif ($rec_din_ent_int==" "){
 	# code...
 	$rec_din_ent_int=" ";
 }elseif ($rec_esp_ent_int==" "){
 	# code...
 	$rec_esp_ent_int=" ";
 }elseif ($rec_din_ent_ext==" "){
 	# code...
 	$rec_din_ent_ext=" ";
 }elseif ($rec_esp_ent_ext==" "){
 	# code...
 	$rec_esp_ent_ext=" ";
 }elseif ($CantidadProd==" "){
 	# code...
 	$$CantidadProd=" ";
 }elseif ($Link_Cvla==" "){
  $Link_Cvla=" ";
 }

//echo $_SESSION['cantidad'];


/*INSERT INTO investigacion(pro_linea,pro_region,pro_centro,nom_sub,ema_sub,num_cel_sub,pro_autores,nom_rad_pro,num_identi,ema_rad_pro,Cel_rad_pro,titulo_pro,area_con_1,area_con_2,apli_posconf,muni_impact,des_estra,recu_poscof,ante_just_pro,plan_pro_nec,obj_general,obj_esp1,obj_esp2,obj_esp3,obj_esp4,fech_ini_pro,fech_fin_pro,nom_gru_inv,cod_grupo,num_sem_bene,nomb_sem_bene,des_meto_pro,resu_obj_esp1,resu_obj_esp2,resu_obj_esp3,resu_obj_esp4,prod_resu_1,prod_resu_2,prod_resu_3,prod_resu_4,num_pro_bene,nom_pro_bene,imp_esperado,num_per_ext,nom_apr_ext,num_iden_ext,num_pers_int_s,nom_ape_int_s,num_iden_int_s,num_pers_int_c,num_pers_int_cm,num_pers_int_in,nom_apellidos,num_idenficac,num_per_int_s,nom_apell_pers,num_iden_pers,nom_ali_int,nit,rec_esp_ent_ext,rec_din_ent_ext,rec_esp_ent_int,rec_din_ent_int,cui_mun_inf,des_ali_obj,ot_se_pe_in,descripcion1,se_pe_in,descripcion2,eq_de_si,descripcion3,sofware,descripcion4,maq_ind,descripcion5,otr_com_equi,descripcion6,ma_pa_for,descripcion7,man_maq_equ,descripcion8,ot_com_tra,descripcion9,ot_gast_imp,descripcion10,div_act,descripcion11,via_gast_int,descripcion12,gast_bien,descripcion13,ade_cons,descripcion14,monitores,descripcion15)*/
    

	$consulta = "INSERT INTO investigacion(identificacion, pro_linea,pro_region,pro_centro,nom_sub,ema_sub,num_cel_sub,pro_autores,nom_rad_pro,num_identi,ema_rad_pro,Cel_rad_pro,titulo_pro,area_con_1,area_con_2,apli_posconf,muni_impact,des_estra,recu_poscof,ante_just_pro,plan_pro_nec,fech_ini_pro,fech_fin_pro,nom_gru_inv,cod_grupo,num_sem_bene,nomb_sem_bene,des_meto_pro,num_pro_bene,nom_pro_bene,imp_esperado,num_per_ext,nom_apr_ext,num_iden_ext,num_pers_int_s,nom_ape_int_s,num_iden_int_s,num_pers_int_c,num_pers_int_cm,num_pers_int_in,nom_apellidos,num_idenficac,num_per_int_s,nom_apell_pers,num_iden_pers,nom_ali_int,nit,rec_esp_ent_ext,rec_din_ent_ext,rec_esp_ent_int,rec_din_ent_int,cui_mun_inf,des_ali_obj,ot_se_pe_in,descripcion1,se_pe_in,descripcion2,eq_de_si,descripcion3,sofware,descripcion4,maq_ind,descripcion5,otr_com_equi,descripcion6,ma_pa_for,descripcion7,man_maq_equ,descripcion8,ot_com_tra,descripcion9,ot_gast_imp,descripcion10,div_act,descripcion11,via_gast_int,descripcion12,gast_bien,descripcion13,ade_cons,descripcion14,monitores,descripcion15,estado,envio,LinkCvlac,Rol,estadoReg)
						VALUES('$identificacion','$pro_linea','$pro_region','$pro_centro','$nom_sub','$ema_sub','$num_cel_sub','$pro_autores','$nom_rad_pro','$num_identi','$ema_rad_pro','$Cel_rad_pro','$titulo_pro','$area_con_1','$area_con_2','$apli_posconf','$muni_impact','$des_estra','$recu_poscof','$ante_just_pro','$plan_pro_nec','$fech_ini_pro','$fech_fin_pro','$nom_gru_inv','$cod_grupo','$num_sem_bene','$nomb_sem_bene','$des_meto_pro','$num_pro_bene','$nom_pro_bene','$imp_esperado','$num_per_ext','$nom_apr_ext','$num_iden_ext','$num_pers_int_s','$nom_ape_int_s','$num_iden_int_s','$num_pers_int_c','$num_pers_int_cm','$num_pers_int_in','$nom_apellidos','$num_idenficac','$num_per_int_s','$nom_apell_pers','$num_iden_pers','$nom_ali_int','$nit','$rec_esp_ent_ext','$rec_din_ent_ext','$rec_esp_ent_int','$rec_din_ent_int','$cui_mun_inf','$des_ali_obj','$ot_se_pe_in','$descripcion1','$se_pe_in','$descripcion2','$eq_de_si','$descripcion3','$sofware','$descripcion4','$maq_ind','$descripcion5','$otr_com_equi','$descripcion6','$ma_pa_for','$descripcion7','$man_maq_equ','$descripcion8','$ot_com_tra','$descripcion9','$ot_gast_imp','$descripcion10','$div_act','$descripcion11','$via_gast_int','$descripcion12','$gast_bien','$descripcion13','$ade_cons','$descripcion14','$monitores','$descripcion15', '$estado','$fecha','$Link_Cvla','$Rol','$estadoReg')";

	$sw=0;
	if ($conn->query($consulta) === TRUE) {
		echo "1";
      }else{
      	echo "0";
      }
 

	//echo $fecha;
	/* cerrar la conexión */
	$conn->close();
?>

?>