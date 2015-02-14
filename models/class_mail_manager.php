<?php

class MailManager
{
	private $email;
	private $mensaje;
	
	function __construct($mail){
		$this->email = $mail;


    }  

	public function Send($text,$title){
	$para      = $this->email; 
	$titulo    = $title;
	$mensaje   = $text;
	$cabeceras = 'From: Coneisc@coneisc.pe' . "\r\n" .
					'X-Mailer: PHP/' . phpversion()."\r\n".
					"Content-Type: text/html; charset=ISO-8859-1\r\n";
	if (!mail($para, $titulo, $mensaje, $cabeceras))
		throw new Exception("Error al enviar mensaje", 1);
		
		
	}
}

?>
