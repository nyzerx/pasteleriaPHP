<?php
include 'conexion.php';
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        $_SESSION["mensaje"] = "Producto eliminado exitosamente.";
        header("Location: admin-productos.php");
        exit();
    } else {
        $_SESSION["mensaje"] = "Error al eliminar el producto.";
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    echo "ID de producto no especificado.";
}
$conn->close();
?>
