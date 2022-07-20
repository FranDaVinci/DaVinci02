<?php

error_reporting (0);

$servidor ='localhost';
$usuario = 'root';
$clave = '';
$dbname = 'artista';

$cn = mysqli_connect ('localhost', 'root', '', 'artista');

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$direc = $_POST['direc'];
$mail = $_POST['mail'];

$sql = "INSERT into artista1 values (null, '$nombre', '$apellidos', '$direc', '$mail')";

$error = true;

if (empty ($_POST['nombre'])) {
    $error = false;
    echo 'No ha introducido el nombre <br>'; 
} else
    $nombre = $_POST['nombre'];

if (empty ($_POST['apellidos'])) {
    $error = false;
    echo 'No ha introducido los apellidos <br>'; 
} else
    $apellidos = $_POST['apellidos'];

if (empty ($_POST['direc'])) {
    $error = false;
    echo 'no ha introducido la dirección <br>'; 
} else
    $direc = $_POST['direc'];

if (empty ($_POST['mail'])) {
    $error = false;
    echo 'no ha introducido su e-mail <br>'; 
} else
    $mail = $_POST['mail'];

if(mysqli_query($cn, $sql)) {
    echo '<br>Datos introducidos correctamente.<br>';
} else{
    echo "ERROR: $sql. " .mysqli_error($cn);
}
    
if($error == false){
    echo "</p><p class='error'> Su formulario no se ha enviado correctamente, faltan datos por rellenar</p>";
    echo "<p><a href='index.html'>Volver al formulario</a></p>";
} else
    echo "Sus datos han sido guardados correctamente <br>";
    echo "Gracias por su registro señor/a ".$nombre;
    echo "<br><br><a href='index.html'>Volver a la página</a>";

$close = mysqli_close ($cn);

if ($close){
    echo "<br>Conexión cerrada satisfactoriamente."; 
}else {
    echo "<br> ERROR en la desconexión"; 
}

?>