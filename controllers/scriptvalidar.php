<?php
require('../models/class_login_manager.php');

if(isset($_POST['btn_add']))
{

  $login_manager =  new LoginManager();
  $login_manager->login("inputDNI","inputPassword");
  if( $login_manager->is_connect())
      echo "1";

}

?>
