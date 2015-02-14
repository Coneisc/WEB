<?php 


require "models/class_login_manager.php";
/* 

  DOCUMENTACION class_login_manager.php 
  Librerias incluidas:
      '/models/class_sql_manager.php';
      '/models/crypter.php';
  Metodos :
  LoginManager() : -> Constructor crea un objeto LoginManager, verifica si existe una sesion activa y que la sesion contenga un objeto de la clase "Usuario"
  
 
*/

$login_manager =  new LoginManager();

//Verifica si la sesion se encuentra activa
if($login_manager->is_connect())
{
  //Obtener el DNI de la sesion 

  $dni=$_SESSION['user']->getid();

  //Objeto para crear una conexion a la base de datos y recoger los datos del perfil
  $sql_manager = new SqlManager();

  //consulta a la base de datos
  $sql_manager->select_from("inscripcion" , "ins_dni= '". $dni."'");


  //Datos obtenidos despues de la consulta  estos datos seran utilizados en el javascript ( lineas 80-87)
    $nombre=$sql_manager->get_value_at("ins_nom");
    $apellido=$sql_manager->get_value_at("ins_ape");
    $mail=$sql_manager->get_value_at("ins_mai");
    $telefono=$sql_manager->get_value_at("ins_pho");
    $edad=$sql_manager->get_value_at("ins_eda");
    $ocupacion=$sql_manager->get_value_at("ins_ocu");
    $ciudad=$sql_manager->get_value_at("cod_ciu");
    $universidad=$sql_manager->get_value_at("cod_uni");	
}
else
{
  header('Location:salir.php');
}

?>

<!DOCTYPE html>
<html >
<head>
	<link rel="stylesheet" href="css/style.css" />
    <meta charset="utf-8">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="css/mycss/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css" />
    <link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css'/>
    <script src="js/jquery.min.js"></script>

 

<style type="text/css">
form select
{
padding: 0em;
width: 170px;
}
 #nav{
    position: static;

 }
 #div_user{
    width: 177px;
 }
</style>
<script type="text/javascript">


var nombre = "<?php echo $nombre; ?>" ;
var apellido = "<?php echo $apellido; ?>" ;
var mail="<?php echo $mail; ?>" ;
var telefono="<?php echo $telefono; ?>" ;
var edad="<?php echo $edad; ?>" ;
var ocupacion="<?php echo $ocupacion; ?>" ;
var ciudad="<?php echo $ciudad; ?>" ;
var universidad="<?php echo $universidad; ?>" ;

$( document ).ready(function() {
   $('#inputnombre').val(nombre);
   $('#inputapellido').val(apellido);
   $('#inputEmail').val(mail);
   $('#inputtelefono').val(telefono);
   $('#inputedad').val(edad);
   $('#ocupacion').val(ocupacion);
   $('#ciudad').val(ciudad);
   $('#universidad').val(universidad);
});


function datosv(){
document.getElementById("notas").style.display="none";
document.getElementById("programa").style.display="none";
document.getElementById("datos").style.display="block";

}
function programasv(){
document.getElementById("notas").style.display="none";
document.getElementById("programa").style.display="block";
document.getElementById("datos").style.display="none";
	
}
function notasv(){
document.getElementById("notas").style.display="block";
document.getElementById("programa").style.display="none";
document.getElementById("datos").style.display="none";
	
}

function send(){
  if(window.XMLHttpRequest){
    xmlhttp=new XMLHttpRequest();
  }
  else{
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  a=document.getElementById("notatxt").value;
  xmlhttp.onreadystatechange=handleStateChange;
  xmlhttp.open("POST","controllers/scriptnotas.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("inputtxt="+a);
}


function handleStateChange() {
  if(xmlhttp.readyState==4 && xmlhttp.status==200)
  {
    if(xmlhttp.responseText!="NULL")
    {
      if(xmlhttp.responseText==1)
      {

        alert("Mensaje guardado correctamente!");
		document.getElementById("notatxt").value="";
      }
      else
      {
        alert("Error al guardar el mensaje!"+xmlhttp.responseText);     
      }
    }
  }
 }
</script>
</head>
<body style="background: url('images/myimages/content.jpeg');
height: 100%;
width: 100%;">
	<?php   include 'include/menutop.php'; ?>

    <p class="lead" style="font-size: 50px;
margin: 38px;
margin-top: 15px;
">Mi Perfil</p>
    <div class="container" >
    <div class="row" >
        <div class="span5" style="min-width: 300px; background-color: rgba(171, 171, 171, 0.16); height : 600px">
         <ul class="ca-menu" style="padding-left: 10px;">
                    <li>
                        <a href="#" onclick="datosv();">
                            <span class="ca-icon">b</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Mis Datos</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="programasv();">
                            <span class="ca-icon">H</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Mis programas</h2>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#" onclick="notasv();">
                            <span class="ca-icon">A</span>
                            <div class="ca-content">
                                <h2 class="ca-main">Mis Notas</h2>

                            </div>
                        </a>
                    </li>
                </ul>
        </div>



        <div id="datos" class="span7" style=" background-color: rgba(171, 171, 171, 0.16);  ">
            
            <div style="
                height: 90%;
                box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
                margin: 20px;
                background-color: white;
                padding: 10px;
                ">
                <div style="
    
background: url('https://lachabela.files.wordpress.com/2011/01/laptop-and-coffee.jpg');
background-size: cover;
height: 100%;
width: 100%;
float: right;
min-width: 149px;
" >
<div style="
height: 80%;
background-color: white;
box-shadow: 1px 1px 50px 1px rgba(0, 0, 0, 0.24);
min-width: 400px;
max-width: 400px;
margin: 30px;
margin-left: 10%;
">
    <form class="form-horizontal" style="text-align: center;
padding-right: 80px;
padding-top: 40px;" action="controllers/actualizardatos.php" method="post">
<p class="lead" style="text-align: left;padding-left: 152px;"> Mis Datos</p>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Nombre</label>
    <div class="controls">
      <input type="text" name="inputnombre" id="inputnombre" placeholder="Nombre" value="">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Apellidos</label>
    <div class="controls">
      <input type="text" name="inputapellido" id="inputapellido" placeholder="Apellidos">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" name="inputEmail" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Telefono</label>
    <div class="controls">
      <input type="text" name="inputtelefono" id="inputtelefono" placeholder="Telefono">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Edad</label>
    <div class="controls">
      <input type="text" name="inputedad" id="inputedad" placeholder="Edad">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Ocupacion</label>
    <div class="controls">
      <select name="ocupacion" id="ocupacion" class="input2">
                      <option value="Est">Estudiante</option>
                      <option value="Pro">Profesional</option>
                    </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Ciudad</label>
    <div class="controls">
      <select name="ciudad" id="ciudad" class="input2">
                        <option value="ABA">Abancay</option> <option value="AQP">Arequipa</option> <option value="CAJ">Cajamarca</option> <option value="CAS">Castilla</option> <option value="CHI">Chimbote</option> <option value="CLY">Chiclayo</option> <option value="CUS">Cusco</option> <option value="HCV">Huancavelica</option> <option value="HCY">Huancayo</option> <option value="HMG">Huamanga</option> <option value="HNC">Huanuco</option> <option value="HUA">Huaraz</option> <option value="ICA">Ica</option> <option value="ILO">Ilo</option> <option value="IQU">Iquitos</option> <option value="JUL">Juliaca</option> <option value="LAM">Lambayeque</option> <option value="LIM">Lima</option> <option value="MOQ">Moquegua</option> <option value="PAS">Cerro de Pasco</option> <option value="PIU">Piura</option> <option value="PUC">Pucallpa</option> <option value="PUN">Puno</option> <option value="SUL">Sullana</option> <option value="TAC">Tacna</option> <option value="TAR">Tarapoto</option> <option value="TIN">Tingo Maria</option> <option value="TRU">Trujillo</option> <option value="TUM">Tumbes</option>                    </select>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Universidad</label>
    <div class="controls">
<select name="universidad" id="universidad" class="input1">
                        <option value="001">Pontificia Universidad Catolica del Peru</option> <option value="002">Universidad Alas Peruanas</option> <option value="003">Universidad Andina del Cusco</option> <option value="004">Universidad Andina Nestor Caceres Velasquez</option> <option value="005">Universidad Antonio Ruiz de Montoya</option> <option value="006">Universidad Catolica de Santa Maria</option> <option value="007">Universidad Catolica de Trujillo</option> <option value="008">Universidad Catolica los Angeles de Chimbote</option> <option value="009">Universidad Catolica Santo Toribio </option> <option value="010">Universidad Catolica San Pablo </option> <option value="011">Universidad Catolica Sedes Sapientiae</option> <option value="012">Universidad Cesar Vallejo</option> <option value="013">Universidad Cientifica del Peru</option> <option value="014">Universidad Cientifica del Sur</option> <option value="015">Universidad Continental de Ciencias e Ingenieria</option> <option value="016">Universidad Cristiana del Peru Maria Inmaculada</option> <option value="017">Universidad de Ciencias y Humanidades</option> <option value="018">Universidad de Huanuco</option> <option value="019">Universidad de Lima</option> <option value="020">Universidad de Piura</option> <option value="021">Universidad de San Martin de Porres</option> <option value="022">Universidad del Pacifico</option> <option value="023">Universidad ESAN</option> <option value="024">Universidad Femenina del Sagrado Corazon</option> <option value="025">Universidad Inca Garcilaso de la Vega</option> <option value="026">Universidad Jaime Bausate y Meza</option> <option value="027">Universidad Jose Carlos Mariategui</option> <option value="028">Universidad Marcelino Champagnat</option> <option value="029">Universidad Nacional Agraria de la Selva</option> <option value="030">Universidad Nacional Agraria La Molina</option> <option value="031">Universidad Nacional Amazonica de Madre de Dios</option> <option value="032">Universidad Nacional Daniel Alcides Carrion</option> <option value="033">Universidad Nacional de Cajamarca</option> <option value="034">Universidad Nacional de Educacion Enrique Guzman y Valle</option> <option value="035">Universidad Nacional de Huancavelica</option> <option value="036">Universidad Nacional de Ingenieria</option> <option value="037">Universidad Nacional de la Amazonia Peruana</option> <option value="038">Universidad Nacional de Moquegua</option> <option value="039">Universidad Nacional de Piura</option> <option value="040">Universidad Nacional de San Agustin</option> <option value="041">Universidad Nacional de San Antonio Abad</option> <option value="042">Universidad Nacional San Cristobal de Huamanga</option> <option value="043">Universidad Nacional de San Martin</option> <option value="044">Universidad Nacional de Trujillo</option> <option value="045">Universidad Nacional de Tumbes</option> <option value="046">Universidad Nacional de Ucayali</option> <option value="047">Universidad Nacional del Altiplano</option> <option value="048">Universidad Nacional del Callao</option> <option value="049">Universidad Nacional del Centro del Peru</option> <option value="050">Universidad Nacional del Santa</option> <option value="051">Universidad Nacional Federico Villarreal</option> <option value="052">Universidad Nacional Hermilio Valdizan</option> <option value="053">Universidad Nacional Intercultural de la Amazonia Peruana</option> <option value="054">Universidad Nacional Jorge Basadre Grohmann</option> <option value="055">Universidad Nacional Jose Faustino Sanchez Carrion</option> <option value="056">Universidad Nacional Jose Maria Arguedas</option> <option value="057">Universidad Nacional Mayor de San Marcos</option> <option value="058">Universidad Nacional Micaela Bastidas de Apurimac</option> <option value="059">Universidad Nacional Pedro Ruiz Gallo</option> <option value="060">Universidad Nacional San Luis Gonzaga de Ica</option> <option value="061">Universidad Nacional Santiago Antunez de Mayolo</option> <option value="062">Universidad Nacional Tecnologica del Cono Sur de Lima</option> <option value="063">Universidad Nacional Toribio Rodriguez de Mendoza de Amazonas</option> <option value="064">Universidad Para el Desarrollo Andino Lircay Angaraes</option> <option value="065">Universidad Particular de Chiclayo</option> <option value="066">Universidad Peruana Cayetano Heredia</option> <option value="067">Universidad Peruana de Ciencias Aplicadas</option> <option value="068">Universidad Peruana de Ciencias e Informatica</option> <option value="069">Universidad Peruana de Integracion Global</option> <option value="070">Universidad Peruana de las Americas</option> <option value="071">Universidad Peruana Los Andes</option> <option value="072">Universidad Peruana Union</option> <option value="073">Universidad Privada Abraham Valdelomar</option> <option value="074">Universidad Privada Antenor Orrego</option> <option value="075">Universidad Privada Antonio Guillermo Urrelo</option> <option value="076">Universidad Privada de Ciencias y Tecnologia de Ica</option> <option value="077">Universidad Privada de Jaen</option> <option value="078">Universidad Privada de Moquegua</option> <option value="079">Universidad Privada de Pucallpa</option> <option value="080">Universidad Privada de Tacna</option> <option value="081">Universidad Privada del Norte</option> <option value="082">Universidad Privada Juan XXII</option> <option value="083">Universidad Wiener</option> <option value="084">Universidad Privada Nuestra Señora de La Paz</option> <option value="085">Universidad Privada San Juan Bautista</option> <option value="086">Universidad Privada San Pedro</option> <option value="087">Universidad Privada Sergio Bernales</option> <option value="088">Universidad Privada Telesup</option> <option value="089">Universidad Ricardo Palma</option> <option value="090">Universidad San Ignacio de Loyola</option> <option value="091">Universidad Señor de Sipan</option> <option value="092">Universidad Tecnologica de los Andes</option> <option value="093">Universidad Tecnologica del Peru</option> <option value="094">Universidad de Ayacucho Federico Froebbel</option> <option value="095">Otros</option>                    </select>
      <!--<input type="text" id="inputuni" placeholder="Universidad">-->
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" style="text-align: center;" >Contraseña</label>
    <div class="controls">
      <button type="button" class="btn"> Cambiar</button>
    </div>
    </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit"  class="btn btn-success">Guardar</button>
    </div>
  </div>
</form>
</div>
  

             </div >
                   
            </div>
        </div>




        <!--2nd-->

        <div  id="programa" class="span7" style="display:none; background-color: rgba(171, 171, 171, 0.16);  height : 600px">
            
            <div style="
                height: 90%;
                box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
                margin: 20px;
                background-color: white;
                padding: 10px;
                ">
                <div style="
    
background: url('https://lachabela.files.wordpress.com/2011/01/laptop-and-coffee.jpg');
background-size: cover;
height: 100%;
width: 100%;
float: right;
min-width: 149px;
" >
<div style="
height: 80%;
background-color: white;
box-shadow: 1px 1px 50px 1px rgba(0, 0, 0, 0.24);
min-width: 400px;
max-width: 400px;
margin: 30px;
margin-left: 10%;
">
    <form class="form-horizontal" style="text-align: center;
padding-right: 80px;
padding-top: 40px;">
<p class="lead" style="text-align: left;padding-left: 152px;"> Mis Programas</p>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Nombre</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Nombre">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label"  style="text-align: center;" for="inputEmail">Email</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Email">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" style="text-align: center;" >Contraseña</label>
    <div class="controls">
      <button type="submit" class="btn"> Cambiar</button>
    </div>
    </div>
  <div class="control-group">
    <div class="controls">

      <button type="submit" class="btn btn-success">Guardar</button>
    </div>
  </div>
</form>
</div>
  

             </div >
                   
            </div>
        </div>


        <!--3rd-->



        <div id="notas" class="span7" style="display:none; background-color: rgba(171, 171, 171, 0.16);  height : 600px">
            
            <div style="
                height: 90%;
                box-shadow: 1px 1px 2px rgba(0,0,0,0.2);
                margin: 20px;
                background-color: white;
                padding: 10px;
                ">
                <div style="
    
background: url('https://lachabela.files.wordpress.com/2011/01/laptop-and-coffee.jpg');
background-size: cover;
height: 100%;
width: 100%;
float: right;
min-width: 149px;
" >
<div style="
height: 80%;
background-color: white;
box-shadow: 1px 1px 50px 1px rgba(0, 0, 0, 0.24);
min-width: 400px;
max-width: 400px;
margin: 30px;
margin-left: 10%;
">
    <form class="form-horizontal" style="text-align: center;
padding-right: 80px;
padding-top: 40px;">
<p class="lead" style="text-align: left;padding-left: 152px;"> Mis Notas</p>
  <div class="control-group">
    <div class="controls" style="margin-left: 75px;">
      <textarea id="notatxt"></textarea>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">

      <button onclick="send();" type="button" class="btn btn-success">Guardar</button>
    </div>
  </div>
</form>
</div>
  

             </div >
                   
            </div>
        </div>       
    </div>  
	</div>
</body>
</html>
