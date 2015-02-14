<?php
require('../models/class_sql_manager.php');
/* 

  DOCUMENTACION class_sql_manager.php 

  Metodos :
  SqlManager() ; -> Constructor crea un objeto SqlManager que permite el acceso a la base de datos
  ObjSqlManager->is_conected();    -> Verifica la conexion a la base de datos 
  ObjSqlManager-> EXECUTE_PROCEDURE($nombre_procedimiento,$Datos) ->Ejecuta un PROCEDURE
 
*/
require('../models/crypter.php');
/* 

  DOCUMENTACION crypter.php 

  Metodos :
  Generar_nueva_pass(); -> Genera una cadena alfanumerica de 10 caracteres
  encrypt(); -> encriptacion simple (encriptacion puede desencriptarese)
  crypted_Pass(); -> encriptacion compleja (solo encriptacion puede compararse)
*/
 
//OJO verificar que se hizo POST con algun boton
if(isset($_POST['transaccion']))
{
//conexion a la base de datos
  $sql_manager = new SqlManager();
//Verificar la conexion a la base de datos
// if($sql_manager->is_conected())
// echo "conectado" ;


   $pass = Generar_nueva_pass(); // 
   $usuario = array(
    /*dni = */  $_POST['dni'], // Varchar '...'
    /* nombre = */  $_POST['nombres'],
    /* apellido =  */  $_POST['apellidos'],
    /* email = */  $_POST['mail'],
    /* telefono = */   $_POST['phone'],
    /* edad = */   $_POST['edad'],
    /* sexo = */   $_POST['sexo'],
    /* ocupacion = */ $_POST['ocupacion'] ,
    /* codciudad = */ $_POST['ciudad'] ,
    /* coduniversidad = */  $_POST['universidad'] ,
    /* nrotransaccion = */  $_POST['transaccion'] ,
    /* estado = */   "PRO",
    /* dni_crypted = */  encrypt($_POST['dni']),
    /* pass = */  crypted_Pass($pass)

  );
     //correr el procedimiento almacenado
    $result = $sql_manager->EXECUTE_PROCEDURE("insertarinscripcion" ,  $usuario);

    if($sql_manager->get_result())
    {
    	echo "Usuario Registrado";
      // ... codigo cuando un usuario se ha registrado 
    }
    else{
       echo "No pudo inscribirse";
      // ... codigo cuando un usuario no pudo inscribirse 
      
      }
 }

?>
