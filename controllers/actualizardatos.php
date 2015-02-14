<?php
require('../models/class_login_manager.php');
$Login_manager=new LoginManager();
session_start();
if(isset($_POST['inputnombre'])&&isset($_POST['inputapellido'])&&isset($_POST['inputEmail'])&&isset($_POST['inputtelefono'])&&isset($_POST['inputedad'])&&isset($_POST['ocupacion'])&&isset($_POST['ciudad'])&&isset($_POST['universidad']))
{

	$sql_manager =  new SqlManager();
	$sql_manager->update("inscripcion","ins_nom",$_POST['inputnombre'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","ins_ape",$_POST['inputapellido'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","ins_mai",$_POST['inputEmail'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","ins_pho",$_POST['inputtelefono'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","ins_eda",$_POST['inputedad'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","ins_ocu",$_POST['ocupacion'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","cod_ciu",$_POST['ciudad'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$sql_manager->update("inscripcion","cod_uni",$_POST['universidad'],"ins_dni = '".$_SESSION['user']->getid()."'");
	$Login_manager->refrescar_usuario();
	header('location:../profile.php');
}
?>
