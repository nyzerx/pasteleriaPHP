<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexion.php';
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST['imagen'];
$sql = "INSERT INTO productos (nombre, descripcion, precio, categoria, cantidad, imagen) VALUES ('$nombre', '$descripcion', '$precio', '$categoria', '$cantidad', '$imagen')";

if ($conn->query($sql) === TRUE) {
    $_SESSION["mensaje"] = "Producto guardado exitosamente.";
    header("Location: admin-productos.php");
    exit();
} else {
    $_SESSION["mensaje"] = "Error al guardar el producto: " . $conn->error;
    header("Location: admin-productos.php");
    exit();
}
$conn->close();
?>
