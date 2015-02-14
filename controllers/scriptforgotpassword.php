<?php
require "../models/class_sql_manager.php";
require "../models/crypter.php";
session_start();

if(isset($_POST["btn_send"]))
{
	$sql_manager =  new SqlManager();
	$sql_manager->select_from("inscripcion","ins_mai = '".$_POST["inputEmail"]."'");

	if($sql_manager->get_result_rows()){
		$_SESSION["link"] = $_POST["inputEmail"];
		$dni_encrypt =  encrypt($sql_manager->get_value_at("ins_dni"));
		$url= "<a>http://www.bwlisted.cf/Coneisc/controllers/recuperar.php?id=".$dni_encrypt."</a>";
		$para      = $_POST["inputEmail"]; 
		$titulo    = 'Recupera tu cuenta';
		$mensaje = "Utiliza este enlace para reestablecer tu cuenta : <br>". $url ."<br> El enlace expirará en 15 minutos ";
 
		$cabeceras = 'From: Coneisc@coneisc.pe' . "\r\n" .
			'X-Mailer: PHP/' . phpversion();
		mail($para, $titulo, $mensaje, $cabeceras);

		echo "1";
	}

}

?> 
