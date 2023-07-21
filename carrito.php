<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="carritoContent">
                    <?php
                    $hayProductosEnCarrito = !empty($_SESSION['carrito']);
                    $productos = $_SESSION['carrito'] ?? array();
                    if ($hayProductosEnCarrito) {
                        echo '<table class="table">';
                        echo '<thead>
                                  <tr>
                                      <th>Producto</th>
                                      <th>Cantidad</th>
                                      <th>Precio</th>
                                      <th>Subtotal</th>
                                  </tr>
                              </thead>';
                        echo '<tbody>';
                        $totalGeneral = 0;
                        foreach ($productos as $idProducto => $producto) {
                            echo '<tr>';
                            echo '<td>' . $producto['nombre'] . '</td>';
                            echo '<td>' . $producto['cantidad'] . '</td>';
                            echo '<td>' . $producto['precio'] . '</td>';
                            $subtotal = $producto['cantidad'] * $producto['precio'];
                            echo '<td>' . $subtotal . '</td>';
                            echo '</tr>';
                            $totalGeneral += $subtotal;
                        }
                        echo '</tbody>';
                        echo '</table>';
                        echo '<p>Total: $' . number_format($totalGeneral, 2) . '</p>';
                    } else {
                        echo '<p>El carrito está vacío.</p>';
                    }
                    ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                <a href="pago.php" class="btn btn-success">Ir a pagar</a>
            </div>
        </div>
    </div>
</div>
