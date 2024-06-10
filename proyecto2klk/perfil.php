<!DOCTYPE html>
<html>
<head>
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" type="text/css" href="estiloPerfil.css">
    <style>
body {
    font-family: 'Comic Sans MS', cursive, sans-serif;
    margin: 20px;
    padding: 0;
    background-image: linear-gradient(145deg, #0000ff 0%, #6600cc 16.67%, #9900cc 33.33%, #cc00ff 50%, #ff00ff 66.67%, #ff66ff 83.33%, #ff99ff 100%);
    color: #ffffff; /* Color del texto */
}

h2 {
    text-align: center;
    margin-top: 50px;
    font-size: 48px;
    color: #00ff00; /* Color del texto */
}

th, td {
    border: 1px solid #ffffff; /* Borde blanco */
    padding: 10px;
    text-align: left;
}

h2 {
    color: #ff00ff; /* Color del texto */
    font-family: Arial, sans-serif;
    text-transform: uppercase;
    margin-bottom: 10px;
}

th:first-child,
td:first-child {
    background-color: transparent; /* Color de fondo transparente */
}

ul {
    list-style-type: square;
    padding: 20px;
    background-color: #ff00ff; /* Color de fondo */
    border-radius: 15px;
    margin: 20px;
}

li {
    background-color: #33cc33; /* Color de fondo */
    padding: 20px 40px;
    margin: 20px;
    border: 5px solid #00ff00;
    border-radius: 20px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.5); /* Sombra */
    font-size: 24px;
    color: #0000ff; /* Color del texto */
}

a {
    padding: 15px 30px;
    background-color: #ffff00;
    color: #ff0000;
    border: 3px solid #ff0000;
    border-radius: 35px;
    cursor: pointer;
    text-decoration: none;
    transition: background-color 0.3s, transform 0.3s;
    display: block;
    margin: 20px auto;
    width: fit-content;
    font-size: 24px;
}

a:hover {
    background-color: #ffcc00; /* Color de fondo al pasar el mouse */
    transform: translateY(-5px);
}


    </style>
</head>
<body>
    

    <?php
    session_start();
    include('conexion.php');

    // Verificar si el usuario ha iniciado sesión
    if (isset($_SESSION['usuarioingresado'])) {
        $usuario = $_SESSION['usuarioingresado'];

        // Consulta SQL para seleccionar los datos del usuario
        $query = "SELECT * FROM registrar WHERE nombre = '$usuario'";
        $result = mysqli_query($conn, $query);

        // Verificar si se encontraron resultados
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
    ?>
            <h2>Perfil de Usuario</h2>

            <!-- Mostrar tabla de datos del usuario -->
            <table>
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $row["nombre"]; ?></td>
                </tr>
                <tr>
                    <th>Apellido1</th>
                    <td><?php echo $row["apellido1"]; ?></td>
                </tr>
                <tr>
                    <th>Apellido2</th>
                    <td><?php echo $row["apellido2"]; ?></td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td><?php echo $row["direccion"]; ?></td>
                </tr>
                <tr>
                    <th>Número</th>
                    <td><?php echo $row["num"]; ?></td>
                </tr>
                <tr>
                    <th>Correo</th>
                    <td><?php echo $row["correo"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <td><?php echo $row["fecha"]; ?></td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td><?php echo $row["pas"]; ?></td>
                </tr>
                <tr>
                    <th>Imagen</th>
                    <td><img src="<?php echo $row['imagen']; ?>" style="max-width: 200px; max-height: 200px;" alt="Imagen de perfil"></td>
                </tr>
            </table>

            <!-- Formulario para subir imagen de perfil -->
            <h2>Subir Imagen de Perfil</h2>
            <form action="subir_imagen.php" method="post" enctype="multipart/form-data">
                <input type="file" name="imagen" accept="image/*" required><br><br>
                <input type="submit" value="Subir Imagen">
            </form>
    <?php
        } else {
            // Si no se encontraron resultados, mostrar un mensaje de error
            echo "No se encontraron registros para el usuario.";
        }
    } else {
        // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
        header('Location: login.php');
        exit();
    }
    mysqli_close($conn);
    ?>
</body>
</html>
