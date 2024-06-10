<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estiloEliminarAsignaturas.css">
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nomasig">ELIMINAR ASIGNATURAS</label><br>
        <input type="text" id="nomasig" name="nomasig"><br><br>
        <input type="submit" value="Eliminar Asignatura" class="boton">
    </form>

    <?php
    //Conexion a la base de datos
    $host = 'localhost';
    $nom = 'root';
    $pass = '';
    $db = 'proyecto';

    $conn = mysqli_connect($host, $nom, $pass, $db);

    //Verifica
    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }

    //Verifica si se recibio la asignatura a eliminar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['nomasig']) && !empty($_POST['nomasig'])) {
            // Preparar la consulta para eliminar la asignatura
            $nomasig = $_POST['nomasig'];
            $sql = "DELETE FROM asignaturas WHERE nomasig = '$nomasig'";

            //Ejecuta la consulta
            if (mysqli_query($conn, $sql)) {
                echo "La asignatura '$nomasig' se ha eliminado.";
            } else {
                echo "Error al eliminar la asignatura: " . mysqli_error($conn);
            }
        } else {
            //Mostrar un error si no se proporciono la asignatura
            echo "Asignatura mal escrita o no existente";
        }
    }
    // consultar asignaturas. agregar o menu
    echo "<p><a href='consultar_asignaturas.php' class='boton'>Ver las asignaturas</a></p>";
    echo "<p><a href='agregar_asignaturas.php' class='boton'>Agregar una asignatura</a></p>";
    echo "<p><a href='menu.php' class='boton'>Menú de opciones</a></p>";

    ?>
</body>
</html>
