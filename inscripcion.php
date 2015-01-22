<!DOCTYPE HTML>
<html>
  <head>
    <title>CONEISC - INSCRIPCIONES</title>
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
    <script src="js/jquery.validate.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/skel.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/style-desktop.css" />
    <link rel="stylesheet" href="css/style-noscript.css" />
    <link rel="stylesheet" href="css/nstyles.css" />
    <link rel="stylesheet" href="css/estilos.css" />

    <script type="text/javascript">
    $(document).ready(function() {
        $("#ok").hide();

        $("#formid").validate({
            rules: {
                nombres: { required: true, minlength: 2},
                apellidos: { required: true, minlength: 2},
                mail: { required:true, email: true},
                dni: { required:true, minlength: 8},
                phone: { minlength: 2, maxlength: 11},
                edad: { required: true},
                transaccion: { required:true, minlength: 15}
            },
            messages: {
                nombres: "Debe introducir su Nombre.",
                apellidos: "Debe introducir su Apellido.",
                mail : "Debe introducir un email válido.",
                dni : "Debe introducir un DNI válido.",
                phone : "El número de teléfono introducido no es correcto.",
                edad : "Debe introducir solo números.",
                transaccion : "El campo Mensaje es obligatorio.",
            },
            submitHandler: function(form){
                var dataString = 'nombres='+$('#nombres').val()+'&apellidos='+$('#apellidos').val()+'&mail='+$('#mail').val()+'&dni='+$('#dni').val()+'&phone='+$('#phone').val()+
                '&edad='+$('#edad').val() +'&sexo='+$('#sexo').val()+'&ocupacion='+$('#ocupacion').val()+'&ciudad='+$('#ciudad').val()+'&universidad='+$('#universidad').val()+
                '&transaccion='+$('#transaccion').val();
                $.ajax({
                    type: "POST",
                    url:"send.php",
                    data: dataString,
                    success: function(data){
                        $("#ok").html(data);
                        $("#ok").show();
                        $("#formid").hide();
                    }
                });
            }
        });
    });
    </script>
   
    
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
        <section id="banner">
          <header>
            <center class="titazul">Incripci&oacute;n</center>
            <p>
              Te puedes Inscribir una vez hecho el pago respectivo en los siguiente numero de cuenta:<br>
              <img src="img/inter.png" alt="" class="logobancos" >
              Nro.
            </p>
          </header>
          <table border="1">
            <tr>
              <?php include 'conexion.php';?>
              <form enctype="multipart/form-data" method="post" id="formid">
                  <div id="ok"></div>
                  <p class="txts">
                    <span class="textins">Nombres:</span>
                    <input type="text" name="nombres" id="nombres" class="input1"/>
                    <span class="textins">Apellidos:</span>
                    <input type="text" name="apellidos" id="apellidos" class="input1"/>
                  </p>
                  <p class="txts">
                    <span class="textins">E-mail:</span>
                    <input type="text" name="mail" id="mail" class="input1"/>
                    <span class="textins">DNI:</span>
                    <input type="text" name="dni" id="dni" class="input2"/>
                    <span class="textins">Celular:</span>
                    <input type="text" name="phone" id="phone" class="input2"/>
                  </p>
                  <p class="txts">
                    <span class="textins">Edad:</span>
                    <input type="text" name="edad" id="edad" class="input2"/>
                    <span class="textins">Sexo:</span>
                    <select name="sexo" id="sexo" class="input2">
                      <option value="F">Femenino</option>
                      <option value="M">Masculino</option>
                    </select>
                    <span class="textins">Ocupaci&oacute;n:</span>
                    <select name="ocupacion" id="ocupacion" class="input2">
                      <option value="Est">Estudiante</option>
                      <option value="Pro">Profesional</option>
                    </select>
                    <span class="textins">Ciudad:</span>
                    <select name="ciudad" id="ciudad" class="input2">
                       <?php echo $ciudad; ?>
                    </select>
                  </p>
                  <p class="txts">
                    <span class="textins">Universidad:</span>
                    <select name="universidad" id="universidad" class="input1">
                       <?php echo $universidad; ?>
                    </select>
                    <span class="textins">Nro. Transaccion</span>
                    <input type="text" name="transaccion" id="transaccion" class="input1"/>
                  </p>
                  <div class="submit">
                    <input type="submit" id="button-blue" value="Enviar" class="bot_ins" style="padding-top: 0px; padding-bottom: 0px;"/>
                    <input type="reset" id="button-red" value="Cancelar" class="bot_ins" style="padding-top: 0px; padding-bottom: 0px;"/>
                  </div>
              </form>
            </tr>
          </table>
          
        </section>
      
      <div class="clear"></div>
    <!-- Footer -->
      <?php include 'include/footer.php';?>

  </body>
</html>