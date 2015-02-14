<?php
	session_start();
	require "../models/class_login_manager.php";


//wwww.coneisc.pe/controllers/scriptrecuperar?id=ru4ufiu34ufhu3u23huri1h34r

if(isset($_GET["id"]))
	{
		// verificar cookie link_activo
		if(isset($_SESSION["link"])){
				try 
				{
					$login_manager = new LoginManager();
					// Recuperar dni encriptado 
					$dni = $_GET["id"];
					// Recuperar email  
					$mail = $_SESSION["link"];
					
					 
					/* Recuperar() :
					   Recuperar usuario desde la base datos
					   Generar una Nueva password 
					   Enviar la nueva password a su email
					   dni encriptado primrary key -> Tabla Clave */

					   
					$login_manager->recuperar($dni,$mail);

					// Enviar un mensaje al usuario
					echo " <script type='text/javascript'>
							function redireccionar() 
							{
							  location.href='../salir.php';
							}
							setTimeout ('redireccionar()', 0);
	          				alert('¡Listo! En breve enviaremos tu nueva password a tu Correo');  
	     					</script>" ;
						
				} 
				catch (Exception $e) 
				{
					echo "Hubo un error al recuperar tu clave intentalo mas tarde" ;
				}
				
			}		
		else
			echo "El link ya expiro";

	}
?>
