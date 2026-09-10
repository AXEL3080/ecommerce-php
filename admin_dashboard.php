<?php
// Iniciamos sesión y verificamos que el usuario sea administrador
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'Administrador') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Administrador</title>
    <!-- Cargamos Chart.js desde CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; background: white; padding: 15px 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .container { max-width: 800px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .btn-logout { background-color: #dc3545; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; }
        .btn-logout:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Panel de Administrador (Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>)</h2>
        <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
    </div>

    <div class="container">
        <h3>Estadísticas del Sistema</h3>
        <p>A continuación se muestra la gráfica de ventas simuladas del e-commerce:</p>
        <div style="width: 100%; max-width: 600px; margin: 0 auto;">
            <canvas id="ventasChart"></canvas>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('ventasChart').getContext('2d');
        const ventasChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'],
                datasets: [{
                    label: 'Ventas Simuladas ($)',
                    data: [1200, 1900, 3000, 500, 2400, 3500, 4100],
                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: { beginAtZero: true }
                }
            }
        });
    </script>
</body>
</html>