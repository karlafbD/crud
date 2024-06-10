<?php
//Para registrar
include('conexion.php');

$nombre    = $_POST["txtnombre"];
$apellido1 = $_POST["txtapellido1"];
$apellido2 = $_POST["txtapellido2"];
$direccion = $_POST["txtdireccion"];
$num       = $_POST["txtnum"];
$correo    = $_POST["txtcorreo"];
$fecha     = $_POST["txtfecha"];
$pas       = $_POST["txtpas"];

$queryusuario  = mysqli_query($conn,"SELECT * FROM registrar WHERE nombre = '$nombre'");
$nr            = mysqli_num_rows($queryusuario); 

if ($nr == 0)
{
    $queryregistrar = "INSERT INTO registrar(nombre, apellido1, apellido2, direccion, num, correo, fecha, pas) 
                        VALUES ('$nombre', '$apellido1', '$apellido2', '$direccion', '$num', '$correo', '$fecha', '$pas')";

//Ejecuta la consulta
if (mysqli_query($conn, $queryregistrar)) {
    // Obtener el ultimo ID insertado
    $id_insertado = mysqli_insert_id($conn);
    echo "Último ID insertado: " . $id_insertado;

    // Mostrar un mensaje de éxito
    echo "<script> alert('Usuario registrado exitosamente: $usu');window.location= 'menu.php' </script>";
} else {
    // Mostrar error
    echo "Error: " . $queryregistrar . "<br>" . mysqli_error($conn);
}
}
?>
