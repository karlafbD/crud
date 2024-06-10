<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloAgregarCalifiacion.css">

</head>
<body>
<body>
    <div class="container">
        <h1>Agregar Nueva Calificacion</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <b>&#128100; Calificacion</b>
            <input type="text" class="cajaentradatexto" name="nomcalif" id="nomcalif" required>
            <input type="submit" value="Guardar" class="boton">
        </form>
    </div>
    <div class="container">
    <a href="consultar_calificaciones.php" class="boton">Ver Calificaciones</a>
    <a href="eliminar_calificaciones.php" class="boton">Eliminar Calificación</a>
    <a href="Menu.php" class="boton">Menú de Opciones</a>
</div>
</body>

</html>
        
<?php
//conexion a base de datos
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

// recibio el nombre de la Calificacion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nomcalif']) && !empty($_POST['nomcalif'])) {
        //consulta
        $nomcalif = $_POST['nomcalif'];
        $sql = "INSERT INTO calificaciones (nomcalif) VALUES ('$nomcalif')";

        //ejecuta la consulta
        if (mysqli_query($conn, $sql)) {
            echo "<p class='mensaje-exito'>La asignatura '$nomcalif' se ha agregado correctamente.</p>";
        } else {
            echo "<p class='mensaje-error'> Error al agregar la calificacion: " . mysqli_error($conn);
        }
    } else {
        //  no se proporcionó el nombre de la asignatura
        echo "no has ingresado nunguna calificacion.";
    }
}
?>
