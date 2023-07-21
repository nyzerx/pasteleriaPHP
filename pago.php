<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexion.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pago</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago - Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
    <script src="search.js"></script>
</head>
<body>
    <?php
    include 'header.php';
    ?>
    <div class="my-3"></div>
    <div class="container">
        <h1>Carrito de Compras</h1>
        <?php
$hayProductosEnCarrito = !empty($_SESSION['carrito']);
$productos = $_SESSION['carrito'] ?? array();
if ($hayProductosEnCarrito) {
    echo '<table class="table">';
    echo '<thead>
              <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
              </tr>
          </thead>';
    echo '<tbody>';
    foreach ($productos as $idProducto => $producto) {
        echo '<tr>';
        echo '<td>' . $producto['nombre'] . '</td>';
        echo '<td>' . $producto['cantidad'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    $totalGeneral = 0;
    foreach ($productos as $producto) {
        $totalGeneral += $producto['cantidad'] * $producto['precio'];
    }
    echo '<p>Total a pagar: $' . number_format($totalGeneral, 2) . '</p>';
    echo '
        <form action="procesar_pedido.php" method="POST">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required>
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono:</label>
                <input type="tel" class="form-control" id="telefono" name="telefono" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <input type="hidden" name="total" value="' . $totalGeneral . '">
            <button type="submit" class="btn btn-success">Pagar</button>
        </form>
    ';

    echo '<button type="button" class="btn btn-primary" onclick="window.location.href=\'productos.php\'">Volver atrás</button>';
} else {
    echo '<p>El carrito está vacío.</p>';
}
?>
    </div>
    <div class="modal fade" id="exitoModal" tabindex="-1" aria-labelledby="exitoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exitoModalLabel">Pago exitoso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¡Muchas gracias por su compra!
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-beta1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
