<?php
$host = 'localhost';
$nom = 'root';
$pass = '';
$db = 'proyecto';
$conn = mysqli_connect($host, $nom, $pass, $db);
if(!$conn)
{
die("Error en la conexion: ".mysqli_connect_error());
}
?>