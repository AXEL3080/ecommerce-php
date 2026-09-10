<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['tipo'] !== 'Cliente') {
    header("Location: index.php");
    exit();
}

$catalogo = [
    1 => ["nombre" => "Laptop Gamer", "precio" => 15000.00, "existencias" => 5, "imagen" => "https://images.unsplash.com/photo-1603302576837-37561b2e2302?w=300"],
    2 => ["nombre" => "Mouse Inalámbrico", "precio" => 450.00, "existencias" => 20, "imagen" => "https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?w=300"],
    3 => ["nombre" => "Teclado Mecánico", "precio" => 1200.00, "existencias" => 10, "imagen" => "https://images.unsplash.com/photo-1587829741301-dc798b83add3?w=300"],
    4 => ["nombre" => "Monitor 24 pulgadas", "precio" => 3500.00, "existencias" => 8, "imagen" => "https://images.unsplash.com/photo-1527443224154-c4a3942d3acf?w=300"]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos - E-commerce</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; margin: 0; padding: 20px; }
        .header { display: flex; justify-content: space-between; align-items: center; background: white; padding: 15px 30px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .container { max-width: 1000px; margin: 30px auto; }
        .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; }
        .card { background: white; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); padding: 15px; text-align: center; display: flex; flex-direction: column; justify-content: space-between; }
        .card img { width: 100%; height: 150px; object-fit: cover; border-radius: 4px; margin-bottom: 10px; }
        .card h4 { margin: 10px 0 5px; color: #333; }
        .card p { color: #666; margin: 5px 0; font-size: 14px; }
        .card input[type="number"] { width: 60px; padding: 5px; text-align: center; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        .btn-comprar { background-color: #28a745; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; width: 100%; }
        .btn-comprar:hover { background-color: #218838; }
        .btn-logout { background-color: #dc3545; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px; }
        .btn-logout:hover { background-color: #c82333; }
    </style>
</head>
<body>
    <div class="header">
        <h2>Bienvenid@, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
        <a href="logout.php" class="btn-logout">Cerrar Sesión</a>
    </div>

    <div class="container">
        <h3>Productos Disponibles</h3>
        <form action="resumen_compra.php" method="POST">
            <div class="grid">
                <?php foreach ($catalogo as $id => $prod): ?>
                    <div class="card">
                        <img src="<?php echo $prod['imagen']; ?>" alt="<?php echo $prod['nombre']; ?>">
                        <div>
                            <h4><?php echo $prod['nombre']; ?></h4>
                            <p>Precio: $<?php echo number_format($prod['precio'], 2); ?></p>
                            <p>Existencias: <?php echo $prod['existencias']; ?></p>
                        </div>
                        <div>
                            <label for="cantidad_<?php echo $id; ?>">Cantidad:</label>
                            <input type="number" id="cantidad_<?php echo $id; ?>" name="cantidades[<?php echo $id; ?>]" value="0" min="0" max="<?php echo $prod['existencias']; ?>">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div style="margin-top: 30px; text-align: center;">
                <button type="submit" class="btn-comprar" style="font-size: 16px; padding: 12px 30px; width: auto;">Ver Resumen de Compra</button>
            </div>
        </form>
    </div>
</body>
</html>