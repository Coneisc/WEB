<?php
	session_start();
    function __autoload($class_name) {
      include 'class_user'. '.php';
    }
    require 'class_sql_manager.php';
    require 'crypter.php';
    /* CLASS CONTROLADOR DEL LOGIN */

    class LoginManager
    {

    	// ATRIBUTOS
    	private $connected; //  conectado/ desconectado
        public $invalid; 
    	// CONSTRUCTOR 
    	function __construct()
    	{
                $this->invalid=False;
    			if(isset($_SESSION['user']) and get_class($_SESSION['user'])=="Usuario")
    			{
    					$this->connected = True; // usuario conectado			
    			}
                else
                    $this->connected = False; // usuario Desconectado
    	}
    	// METODOS
        // LOGIN PRINCIPAL
        public function login($user_box , $pass_box )
        {
            $name_user = RecogeDato($user_box); // textbox_usuario
            $password = RecogeDato($pass_box); // textbox_contraseña
            // validacion
            
            $user = new Usuario($name_user); 

            
          
            if($user->valid){
                            
                if($this->authenticate($name_user, $password))
                { 
                      
                     
                    $_SESSION['user'] =  $user;
                    $this->connected = True;
                    return True;
                }
                else
                { 
                    return False; //inicio de sesion fallida
                }
            }
        }
        
        // AUTENTIFICAR USUARIO
        public function authenticate($user,$pass)
        {
            
            
            $sql_manager = new SqlManager();
            // Tabla CLAVE -> campoid -> ecriptado(id)
            $sql_manager->select_from("clave" , "cla_dni= '". encrypt($user)."'");
            $varpass=  strval($sql_manager->get_value_at("cla_pass"));
            if(verificar_password($pass,$varpass))
                return True;
            return False;
                
            
            
        }


        
        // CERRAR SESION
        public function logout()
        {
            $_SESSION = array();
            session_destroy();
            $this->connected = False;
        }


        //GET: USUARIO CONECTADO
    	public function is_connect()
    	{
   			return $this->connected;
    	}
        
    	// RECUPERAR CONTRASEÑA

        public function recuperar($id_cript,$mail)
        {
                $sql_manager = new SqlManager();
                $sql_manager->select_from("clave" , "cla_dni= '". $id_cript."'");
                if($sql_manager->get_num_rows())
                {
                    $new_pass = Generar_nueva_pass();
                    $new_pass_cripted = crypted_Pass($new_pass);
                    $sql_manager->update("clave","cla_pass",$new_pass_cripted,"cla_dni = '". $id_cript."'");
                    if($sql_manager->get_result())
                        enviar_pass($mail,$new_pass);
                    else
                        throw new Exception("Error intentenlo despues", 1);
                 }
                else
                    throw new Exception("Error", 1);
                    
        }

        // REFRESCAR USUARIO
        public function refrescar_usuario()
        {
            $id = $_SESSION['user']->getid();
            $user = new Usuario($id); 
            $_SESSION['user'] = $user;
        }


    }

    //FIN DE LA CLASE LOGINCONTROLER

    function RecogeDato($campo)
    {
        return isset($_REQUEST[$campo])?$_REQUEST[$campo]:'';
    }




function enviar_pass($mail,$pass)
{
    $para      = $mail; 
    $titulo    = 'Nueva Contraseña';
    $mensaje   =  "Hemos restablecido tu cuenta , tu nueva contraseña es :".$pass;
    $cabeceras = 'From: Coneisc@coneisc.pe' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();
    mail($para, $titulo, $mensaje, $cabeceras);
}
    	
?>
