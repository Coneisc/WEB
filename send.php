
<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$sql = 'INSERT INTO inscripcion (ins_dni,ins_nom, ins_ape,ins_mai,ins_pho,ins_eda,ins_sex,ins_ocu,ins_ciu,ins_uni,ins_tra) '.'VALUES ( "'.$_POST['dni'].'", "'.$_POST['nombres'].'", "'.$_POST['apellidos'].'", "'.$_POST['mail'].'","'.$_POST['phone'].'",'.$_POST['edad'].',"'.$_POST['sexo'].'","'.$_POST['ocupacion'].'","'.$_POST['ciudad'].'","'.$_POST['universidad'].'","'.$_POST['transaccion'].'")';
mysql_select_db('coneisc');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{?>
<p class="alerta"><?php
  die('DNI o Nro.Transaccion ya registrado verifique la informacion ingresada');
  ?><p/><?php
}
?>
<p class="alerta"><?php
echo 'Gracias <b>'.$_POST['nombres'].' '.$_POST['apellidos'].'.</b> La información ha sido enviada correctamente!. 
<br> El siguiente paso a seguir es enviar la imagen de tu voucher al siguiente correo <b>coneisc2015@gmail.com</b> con 
numero DNI como Asunto.<br> Posteriormente llegara un correo de confirmación en un plazo de 48hrs.';
mysql_close($conn);
?><p/>
<script>
	document.getElementById("formid").reset();
</script>
