<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="estiloAgregarAsignaturas.css">
</head>
<body>
    <div class="container">
    <h1>Agregar una asignatura </h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <b>Nombre de asignatura</b>
        <input type="text" class="cajaentradatexto" name="nomasig" id="nomasig" required>
        <input type="submit" class="botonAceptar" value="Aceptar">
    </form>
    </div>
</body>
</html>
        
<?php
//conexion  base de datos
$host = 'localhost';
$nom = 'root';
$pass = '';
$db = 'proyecto';

// conexion
$conn = mysqli_connect($host, $nom, $pass, $db);

//Verifica 
if(!$conn)
{
die("Error en la conexion: ".mysqli_connect_error());
}

//nombre de la asignatura
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nomasig']) && !empty($_POST['nomasig'])) {
        //consulta
        $nomasig = $_POST['nomasig'];
        $sql = "INSERT INTO asignaturas (nomasig) VALUES ('$nomasig')";

        //ejecuta la consulta
        if (mysqli_query($conn, $sql)) {
            echo "<p class='mensaje-exito'>La asignatura '$nomasig' se ha agregado</p>";
        } else {
            echo "<p class='mensaje-error'>No se pudo agregar la asignatura: " . mysqli_error($conn) . "</p>";
        }
    } else {
        //  si no se proporcionó el nombre de la asignatura
        echo "no se ha ingresado una asignatura.";
    }
}

// consultar asignaturas. elinimar o menu
echo "<p><a href='consultar_asignaturas.php' class='boton'>Ver las asignaturas</a></p>";
echo "<p><a href='eliminar_asignaturas.php' class='boton'>Eliminar asignatura</a></p>";
echo "<p><a href='Menu.php' class='boton'>menu de opciones</a></p>";
?>
