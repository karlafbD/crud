<?php
session_start();
include('conexion.php');

$nombre = $_POST["txtnombre"];
$pas = $_POST["txtpassword"];

$buscandousu = mysqli_query($conn,"SELECT * FROM registrar WHERE nombre = '".$nombre."' AND pas = '".$pas."'");
$nr = mysqli_num_rows($buscandousu);

if($nr == 1) {
    $_SESSION['usuarioingresado'] = $nombre; 
    header("Location: menu.php"); // Redirigimos al usuario al menú después de iniciar sesión
    exit();
} else {
    //  redirigimos al usuario a la página de inicio de sesión
    header("Location: index.php");
    exit();
}
?>
