<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['precio'])) {
    $idProducto = $_POST['id'];
    $nombreProducto = $_POST['nombre'];
    $precioProducto = floatval($_POST['precio']);
    agregarProductoAlCarrito($idProducto, $nombreProducto, $precioProducto);
    http_response_code(200);
} else {
    http_response_code(400);
}
function agregarProductoAlCarrito($idProducto, $nombreProducto, $precioProducto)
{
    $carrito = $_SESSION['carrito'] ?? array();
    if (isset($carrito[$idProducto])) {
        $carrito[$idProducto]['cantidad']++;
    } else {
        $carrito[$idProducto] = array(
            'nombre' => $nombreProducto,
            'precio' => $precioProducto,
            'cantidad' => 1
        );
    }
    $_SESSION['carrito'] = $carrito;
}
?>