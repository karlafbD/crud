<?php
session_start();
include('conexion.php');

// Verificar si la sesión 'usuarioingresando' está definida y no está vacía
if (isset($_SESSION['usuarioingresando']) && !empty($_SESSION['usuarioingresando'])) {
    $usuario = $_SESSION['usuarioingresando'];

    // Verificar si se ha enviado un archivo
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagen"])) {
        // Directorio donde se almacenarán las imágenes
        $directorio = "imagenes_perfil/";

        // Ruta completa del archivo en el servidor
        $ruta_archivo = $directorio . basename($_FILES["imagen"]["name"]);

        // Verificar si el archivo es una imagen real o una falsificación
        $es_imagen = getimagesize($_FILES["imagen"]["tmp_name"]);

        if ($es_imagen !== false) {
            // Verificar si el archivo ya existe
            if (file_exists($ruta_archivo)) {
                echo "El archivo ya existe.";
            } else {
                // Mover el archivo cargado al directorio de imágenes
                if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta_archivo)) {
                    // Actualizar el campo imagen en la tabla registrar
                    $query = "UPDATE registrar SET imagen = ? WHERE nombre = ?";
                    $stmt = mysqli_prepare($conn, $query);
                    mysqli_stmt_bind_param($stmt, "ss", $ruta_archivo, $usuario);
                    if (mysqli_stmt_execute($stmt)) {
                        echo "La imagen se ha subido y guardado correctamente.";
                    } else {
                        echo "Error al guardar la ruta de la imagen en la base de datos.";
                    }
                    mysqli_stmt_close($stmt);
                } else {
                    echo "Error al subir la imagen.";
                }
            }
        } else {
            echo "El archivo no es una imagen válida.";
        }
    } else {
        echo "No se recibió ninguna imagen.";
    }
} else {
    echo "La sesión 'usuarioingresando' no está definida o está vacía.";
}

mysqli_close($conn);
?>
