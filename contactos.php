<!DOCTYPE HTML>
<html>
  <head>
    <title>CONEISC - CONTACTO</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.dropotron.min.js"></script>
    <script src="js/jquery.scrolly.min.js"></script>
    <script src="js/jquery.onvisible.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-layers.min.js"></script>
    <script src="js/init.js"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-desktop.css" />
    <link rel="stylesheet" href="css/style-noscript.css" />
    <link rel="stylesheet" href="css/nstyles.css" />
    <link rel="stylesheet" href="css/estilos.css" />
   
    
  </head>
  <body class="homepage">

    <!-- Header -->
      <div>
            <header>
              <img width="200px" height="100px" src="img/logo2.png">
            </header>
        
        <!-- Nav -->
        <?php include 'include/menutop.php';?>

      </div>
      
    <!-- Banner -->
    <table style="margin-bottom: 0px;">
      <td id="contac" style="width: 600px;">
        <section id="banner" style="padding: 15px 20px; width: 600px;">
          <header style="width: 580px;">
            <center class="titazul">Contactenos</center>
            <p>
              Nos gustaria saber mas de Usted. Si tiene alguna duda Contactenos.
            </p>
            <div class="centered text--center">
              <h1 class="push-half--bottom text--medium">Ingrese sus datos aqui</h1>
            </div>
             <?php
                    $nom=$_POST['name'];
                    $mail=$_POST['email'];
                    $com=$_POST['text'];
                    if(!isset($nom) || !isset($mail) || !isset($com)) {

                      echo "<b>Ocurrió un error y el formulario no ha sido enviado. </b><br />";
                      echo "Por favor, vuelva atrás y verifique la información ingresada<br />";
                      die();
                    }
                            $remitente = $mail ;
                    $destino = "coneisc2015@gmail.com" ;
                    $asunto = "Mensaje Pagina Contacto" ;
                    $mensaje = $com;
                    $encabezados = "From: $remitente\nReply-To: $remitente\nContent-Type: text/html; charset=iso-8859-1" ;
                    mail($destino, $asunto, $mensaje, $encabezados) or die ("No se ha podido enviar tu mensaje. Ha ocurrido un error") ;
                    echo "¡El formulario se ha enviado con éxito!, Gracias por su Comentario!!";
                  ?>
            
          </header>
        </section>
      </td>
      <td id="map">
        <section >
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.378095139642!2d-71.54884200000002!3d-16.405613000000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a8aab7dbfcf%3A0x32794c08084c8aad!2sUniversidad+Cat%C3%B3lica+De+Santa+Maria!5e0!3m2!1ses-419!2spe!4v1417384188160" width="720" height="600" frameborder="1" style="border:0"></iframe>
      </section>
      </td>
    </table>
    
      <div class="clear"></div>
    <!-- Footer -->
      <?php include 'include/footer.php';?>
  </body>
</html>