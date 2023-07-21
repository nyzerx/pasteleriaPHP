<?php
include 'conexion.php';

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $productos = array();
    while ($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
} else {
    $productos = array(); 
}
?>
<table class="product-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Categoría</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) { ?>
            <tr>
                <td><?php echo $producto['id']; ?></td>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['categoria']; ?></td>
                <td><?php echo $producto['cantidad']; ?></td>
                <td>
                    <button class="edit-button">Editar</button>
                    <button class="delete-button">Eliminar</button>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
