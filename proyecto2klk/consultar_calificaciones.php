<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloConsultaCalifiacion.css">
</head>
<body>
    <h1><b1>Calificaciones Actuales: </b1</h1></p>
</body>
</html>

<?php
//conexión base de datos
$host = 'localhost';
$nom = 'root';
$pass = '';
$db = 'proyecto';

//conexión
$conn = mysqli_connect($host, $nom, $pass, $db);

//Verifica
if(!$conn)
{
die("Error en la conexion: ".mysqli_connect_error());
}

//Consulta  las asignaturas
$sql = "SELECT * FROM calificaciones";
$result = $conn->query($sql);

//si hay resultados
if ($result->num_rows > 0) {
    //Mostrar los resultados
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<li>" . $row["nomcalif"] . "</li>";
    }
    echo "</ul>";
} else {

    //Mostrar si no hay calificaciones
    echo "No tienes ninguna calificacion agregada.";
}

//agregar o eliminar calificaciones
echo "<p><a href='agregar_calificaciones.php'>Agregar alguna Calificacion</a></p>";
echo "<p><a href='eliminar_calificaciones.php'>Eliminar Calificacion</a></p>";
echo "<p><a href='menu.php'>ir al Menu</a></p>";

?>
