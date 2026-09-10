<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - E-commerce</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #000000 0%, #764ba2 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 1rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .login-header {
            background: #9c2dcf;
            color: white;
            padding: 2rem;
            text-align: center;
        }
        .btn-custom {
            background: #ff0000;
            color: white;
            transition: all 0.3s ease;
        }
        .btn-custom:hover {
            background: #000000;
            color: white;
        }
        /* Animación de vibración (Shake) */
        @keyframes shake {
            0% { transform: translateX(0); }
            20% { transform: translateX(-10px); }
            40% { transform: translateX(10px); }
            60% { transform: translateX(-10px); }
            80% { transform: translateX(10px); }
            100% { transform: translateX(0); }
        }
        .shake {
            animation: shake 0.4s ease-in-out;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 mx-auto">
                <!-- Se agregó la condición de la clase 'shake' si hay error -->
                <div class="card login-card border-0 <?php echo isset($_GET['error']) ? 'shake' : ''; ?>">
                    <div class="login-header">
                        <h3 class="fw-bold mb-0">Pc's Insanas</h3>
                        <p class="text-white-50 mb-0">Inicia sesion para iniciar</p>
                    </div>
                    <div class="card-body p-4 p-md-5">
                        
                        <!-- Alerta visual de error -->
                        <?php if (isset($_GET['error'])): ?>
                            <div class="alert alert-danger alert-dismissible fade show py-2 text-center small" role="alert">
                                <strong>¡Acceso denegado!</strong> Usuario o contraseña incorrectos.
                                <button type="button" class="btn-close py-2" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form action="auth.php" method="POST" autocomplete="off">
                            <div class="mb-3">
                                <label for="usuario" class="form-label fw-semibold">Usuario:</label>
                                <input type="text" class="form-control form-control-lg <?php echo isset($_GET['error']) ? 'is-invalid' : ''; ?>" id="usuario" name="usuario" required autocomplete="off">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold">Contraseña:</label>
                                <input type="password" class="form-control form-control-lg <?php echo isset($_GET['error']) ? 'is-invalid' : ''; ?>" id="password" name="password" required autocomplete="new-password">
                            </div>
                            <button type="submit" class="btn btn-custom btn-lg w-100 fw-bold shadow-sm mb-3">Entrar</button>
                            <div class="text-center">
                                <a href="registro.php" class="text-decoration-none text-muted small">¿No tienes cuenta? Regístrate aquí</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>