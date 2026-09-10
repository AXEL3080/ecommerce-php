<?php
// Iniciamos sesión para poder acceder a ella
session_start();

// Destruimos todas las variables de sesión
$_SESSION = array();

// Destruimos la sesión por completo
session_destroy();

// Redirigimos de vuelta al login
header("Location: index.php");
exit();
?>