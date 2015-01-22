<?php
$server     = 'localhost'; //servidor
$username   = 'root'; //usuario de la base de datos
$password   = ''; //password del usuario de la base de datos
$database   = 'coneisc'; //nombre de la base de datos
 
$conexion = @new mysqli($server, $username, $password, $database);
 
if ($conexion->connect_error) //verificamos si hubo un error al conectar, recuerden que pusimos el @ para evitarlo
{
    die('Error de conexión: ' . $conexion->connect_error); //si hay un error termina la aplicación y mostramos el error
}
 
$sql="SELECT * from ciudad";
$result = $conexion->query($sql); //usamos la conexion para dar un resultado a la variable
 
if ($result->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $ciudad="";
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
    {
        $ciudad .=" <option value='".$row['cod_ciu']."'>".$row['des_ciu']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

$sql1="SELECT * from universidad";
$result1 = $conexion->query($sql1); //usamos la conexion para dar un resultado a la variable
 
if ($result1->num_rows > 0) //si la variable tiene al menos 1 fila entonces seguimos con el codigo
{
    $universidad="";
    while ($row1 = $result1->fetch_array(MYSQLI_ASSOC)) 
    {
        $universidad .=" <option value='".$row1['cod_uni']."'>".$row1['des_uni']."</option>"; //concatenamos el los options para luego ser insertado en el HTML
    }
}
else
{
    echo "No hubo resultados";
}

$conexion->close(); //cerramos la conexión
?>