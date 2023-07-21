<?php
include 'conexion.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $total = $_POST['total'];
    $sqlCliente = "INSERT INTO clientes (nombre, apellido, telefono, correo) VALUES ('$nombre', '$apellido', '$telefono', '$correo')";
    if ($conn->query($sqlCliente) !== TRUE) {
        die("Error al insertar el cliente en la base de datos: " . $conn->error);
    }
    $idCliente = $conn->insert_id;
    $detallePedido = "";
    $productos = $_SESSION['carrito'] ?? array();
    foreach ($productos as $idProducto => $producto) {
        $detallePedido .= $producto['nombre'] . ";" . $producto['cantidad'] . ",";
    }
    $detallePedido = rtrim($detallePedido, ',');
    $sqlPedido = "INSERT INTO pedidos (fecha, detalle, monto) VALUES (NOW(), '$detallePedido', $total)";
    if ($conn->query($sqlPedido) !== TRUE) {
        die("Error al insertar el pedido en la base de datos: " . $conn->error);
    }
    $conn->close();
    unset($_SESSION['carrito']);
    header('Content-Type: application/json');
    echo json_encode(array('success' => true));
    exit;
} else {
    exit;
}
?>
