<?php
session_start();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú</title>
    <link rel="stylesheet" href="estiloMenu.css">

</head>
<body>
    <div class="center-text">
    <p style="font-size: 50px; font-weight: bold;">Menú de opciones</p>
    </div>
    <div class="container">
    <ul>
        <li><a href="consultar_asignaturas.php" class="btn">Ver Asignaturas</a></li>
        <li><a href="agregar_asignaturas.php" class="btn">Agregar Asignaturas</a></li>
        <li><a href="eliminar_asignaturas.php" class="btn">Eliminar Asignaturas</a></li>

        <li><a href="consultar_calificaciones.php" class="btn">Ver Calificaciones</a></li>
        <li><a href="agregar_calificaciones.php" class="btn">Agregar Calificaciones</a></li>
        <li><a href="eliminar_calificaciones.php" class="btn">Eliminar Calificaciones</a></li>

        <li><a href="datos.php" class="btn">Ver todos los datos</a></li>

        <li><a href="perfil.php" class="btn">Perfil</a></li>
        <li><a href="cerrar_sesion.php" class="btn">Cerrar Sesión</a></li>
    </ul>
</div>

</body>
</html>
