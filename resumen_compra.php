<?php
// Iniciamos sesión y verificamos que el usuario sea cliente
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'Cliente') {
    header("Location: index.php");
    exit();
}

// Mismo catálogo para revalidar precios y nombres de forma segura
$catalogo = [
    1 => ["nombre" => "Laptop Gamer", "precio" => 15000.00, "existencias" => 5],
    2 => ["nombre" => "Mouse Inalámbrico", "precio" => 450.00, "existencias" => 20],
    3 => ["nombre" => "Teclado Mecánico", "precio" => 1200.00, "existencias" => 10],
    4 => ["nombre" => "Monitor 24 pulgadas", "precio" => 3500.00, "existencias" => 8]
];

$compraRealizada = [];
$totalPagar = 0.00;

// Verificamos si los datos llegaron por método POST desde el catálogo
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cantidades'])) {
    foreach ($_POST['cantidades'] as $id => $cantidad) {
        $cantidad = intval($cantidad);
        if ($cantidad > 0 && isset($catalogo[$id])) {
            // Validamos que no exceda las existencias
            if ($cantidad > $catalogo[$id]['existencias']) {
                $cantidad = $catalogo[$id]['existencias'];
            }
            $subtotal = $cantidad * $catalogo[$id]['precio'];
            $totalPagar += $subtotal;

            $compraRealizada[] = [
                "nombre" => $catalogo[$id]['nombre'],
                "precio" => $catalogo[$id]['precio'],
                "cantidad" => $cantidad,
                "subtotal" => $subtotal
            ];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Compra - E-commerce</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        .container { max-width: 700px; margin: 30px auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        h2 { color: #333; text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border-bottom: 1px solid #ddd; text-align: left; }
        th { background-color: #007bff; color: white; }
        .total-section { text-align: right; margin-top: 20px; font-size: 18px; font-weight: bold; }
        .buttons { display: flex; justify-content: space-between; margin-top: 30px; }
        .btn { padding: 10px 20px; border-radius: 4px; text-decoration: none; color: white; }
        .btn-volver { background-color: #6c757d; }
        .btn-volver:hover { background-color: #5a6268; }
        .btn-logout { background-color: #dc3545; }
        .btn-logout:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Resumen de tu Compra</h2>
        <p>Cliente: <strong><?php echo htmlspecialchars($_SESSION['usuario']); ?></strong></p>

        <?php if (empty($compraRealizada)): ?>
            <p style="text-align: center; color: #dc3545; margin-top: 30px;">No seleccionaste ningún producto o las cantidades fueron cero.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio Unitario</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($compraRealizada as $item): ?>
                        <tr>
                            <td><?php echo $item['nombre']; ?></td>
                            <td>$<?php echo number_format($item['precio'], 2); ?></td>
                            <td><?php echo $item['cantidad']; ?></td>
                            <td>$<?php echo number_format($item['subtotal'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="total-section">
                Total a Pagar: $<?php echo number_format($totalPagar, 2); ?>
            </div>
        <?php endif; ?>

        <div class="buttons">
            <a href="cliente_catalogo.php" class="btn btn-volver">Regresar al Catálogo</a>
            <a href="logout.php" class="btn btn-logout">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>