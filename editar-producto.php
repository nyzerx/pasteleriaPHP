<?php
include 'conexion.php';
session_start();
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];
$cantidad = $_POST['cantidad'];
$sql = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', precio='$precio', categoria='$categoria', cantidad='$cantidad' WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    $_SESSION["mensaje"] = "Producto editado exitosamente.";
    header("Location: admin-productos.php");
    exit();
} else {
    $_SESSION["mensaje"] = "Error al editar el producto.";
    echo "Error al actualizar el producto: " . $conn->error;
}
$conn->close();
?>
