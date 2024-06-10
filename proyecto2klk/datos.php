<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="estiloDatos.css">
</head>
<body>
    <h2>Asignaturas y Calificaciones</h2>
    <?php
    // conexiónbase de datos
    $host = 'localhost';
    $nom = 'root';
    $pass = '';
    $db = 'proyecto';

    // conexión
    $conn = mysqli_connect($host, $nom, $pass, $db);

    // verifica 
    if(!$conn) {
        die("Error en la conexion: " . mysqli_connect_error());
    }

    // obtener las asignaturas y calificaciones
    $sql = "SELECT asignaturas.nomasig, calificaciones.nomcalif FROM asignaturas INNER JOIN calificaciones ON asignaturas.id = calificaciones.id";
    $result = $conn->query($sql);

    // si hay resultados
    if ($result->num_rows > 0) {
        // muestra los resultados en forma de tabla
        echo "<table>";
        echo "<tr><th>Asignatura</th><th>Calificación</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["nomasig"] . "</td><td>" . $row["nomcalif"] . "</td></tr>";
        }
        echo "</table>";
    } else {
        // muestra si no hay datos
        echo "<p>No tienes ninguna asignatura y calificacion agregada.</p>";
    }

    // cerrar la conexión
    mysqli_close($conn);
    ?>

    <p><a href='agregar_asignaturas.php' class='boton'>Agregar asignatura</a></p>
    <p><a href='eliminar_asignaturas.php' class='boton'>Eliminar asignatura</a></p>
    <p><a href='agregar_calificaciones.php' class='boton'>Agregar calificacion</a></p>
    <p><a href='eliminar_calificaciones.php' class='boton'>Eliminar calificaciones</a></p>
    <p><a href='menu.php' class='boton'>ir al Menu</a></p>
</body>
</html>
