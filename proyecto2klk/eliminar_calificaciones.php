<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloEliminarCalificacion.css">
</head>
<body>
    <h1>Eliminar calificacion</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" id="nomcalif" name="nomcalif"><br><br>
        <input type="submit" value="Eliminar calificacion">
    </form>
    <div class="container"> <!-- Nueva línea agregada -->
        <a href="consultar_calificaciones.php" class="boton">ver calificaciones</a><br>
        <a href="eliminar_calificaciones.php" class="boton">Eliminar calificacion</a><br>
        <a href="Menu.php" class="boton">Menú de opciones</a>
    </div>
</body>
</html>

<?php
//Conexion base de datos
$host = 'localhost';
$nom = 'root';
$pass = '';
$db = 'proyecto';

$conn = mysqli_connect($host, $nom, $pass, $db);

// conexion
if (!$conn) {
    die("Error en la conexión: " . mysqli_connect_error());
}

//si se recibio la asignatura a eliminar
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nomcalif']) && !empty($_POST['nomcalif'])) {
        // Preparar la consulta para eliminar la asignatura
        $nomcalif = $_POST['nomcalif'];
        $sql = "DELETE FROM calificaciones WHERE nomcalif = '$nomcalif'";

        //Ejecuta la consulta
        if (mysqli_query($conn, $sql)) {
            echo "La calificacion  '$nomcalif' se ha eliminado.";
        } else {
            echo "No se pudo eliminar la calificacion: " . mysqli_error($conn);
        }
    } else {
        //Mostrar un error si no se proporciono la calificacion
        echo "Calificacion no valida o no existente";
    }
}


?>
