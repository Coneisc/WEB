<?php
require('../models/class_login_manager.php');
require('../models/class_mail_manager.php');
$Login_manager=new LoginManager();



 
	if(isset($_POST['inputtxt']) )
	{	
		try {
			$mensaje=$_POST['inputtxt'];
			$titulo = 'Notas Guardadas';
			$email=$_SESSION['user']->getemail();
			$Mail_manager=new MailManager($email);
			$Mail_manager->Send($mensaje,$titulo);
			echo "1";
		} catch (Exception $e) {
			echo "0";
		}
		
		
	}
	else
	{
		echo "0";
	}

?>
