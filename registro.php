<?php
session_start();
$mensaje = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nuevo_usuario = $_POST['usuario'] ?? '';
    $nuevo_password = $_POST['password'] ?? '';

    if (!empty($nuevo_usuario) && !empty($nuevo_password)) {
        // Inicializar arreglo de registros en sesión si no existe
        if (!isset($_SESSION['usuarios_registrados'])) {
            $_SESSION['usuarios_registrados'] = [];
        }
        
        // Guardar el usuario temporalmente
        $_SESSION['usuarios_registrados'][$nuevo_usuario] = $nuevo_password;
        $mensaje = "¡Cuenta creada con éxito! Ya puedes iniciar sesión.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro - E-commerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: linear-gradient(135deg, #000000 0%, #965497 100%); height: 100vh; display: flex; align-items: center; justify-content: center; }
        .card { border-radius: 1rem; box-shadow: 0 15px 35px rgba(0,0,0,0.2); }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 bg-white">
                    <h3 class="text-center fw-bold mb-3">Crear Cuenta</h3>
                    <?php if (!empty($mensaje)): ?>
                        <div class="alert alert-success"><?php echo $mensaje; ?></div>
                    <?php endif; ?>
                    <form method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Usuario:</label>
                            <input type="text" class="form-control" name="usuario" required autocomplete="off">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Contraseña:</label>
                            <input type="password" class="form-control" name="password" required autocomplete="new-password">
                        </div>
                        <button type="submit" class="btn btn-success w-100 fw-bold mb-2">Registrarse</button>
                        <a href="index.php" class="btn btn-secondary w-100">Regresar</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>