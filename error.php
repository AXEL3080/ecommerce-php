<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error de Autenticación</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
        .error-card { background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); width: 350px; text-align: center; }
        .error-card h2 { color: #dc3545; margin-bottom: 15px; }
        .error-card p { color: #555; margin-bottom: 20px; }
        .btn { display: inline-block; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 4px; }
        .btn:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="error-card">
        <h2>¡Acceso Denegado!</h2>
        <p>El usuario o la contraseña ingresados son inválidos. Por favor, inténtalo de nuevo.</p>
        <a href="index.php" class="btn">Volver al Login</a>
    </div>
</body>
</html>