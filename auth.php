<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$password = $_POST['password'] ?? '';

// 1. Credencial oficial del Administrador requerida por el profe
if ($usuario === 'admin' && $password === 'asd') {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo'] = 'Administrador';
    header("Location: admin_dashboard.php");
    exit();
}
// 2. Credencial oficial del Cliente por defecto requerida por el profe
elseif ($usuario === 'cliente' && $password === '123') {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo'] = 'Cliente';
    header("Location: cliente_catalogo.php");
    exit();
} 
// 3. Sistema de registro: Validar usuarios que se hayan registrado libremente
elseif (isset($_SESSION['usuarios_registrados'][$usuario]) && $_SESSION['usuarios_registrados'][$usuario] === $password) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['tipo'] = 'Cliente';
    header("Location: cliente_catalogo.php");
    exit();
} 
// 4. Si fallan todas, regresa al login con error
else {
    header("Location: index.php?error=1");
    exit();
}
?>