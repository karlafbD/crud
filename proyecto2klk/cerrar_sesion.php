<?php
// Destruir la sesión
session_destroy();

// Redireccionar a la página de inicio de sesión u otra página deseada
header("Location: index.html");
exit;
?>
