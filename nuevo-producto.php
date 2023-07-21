<?php
include 'conexion.php';
$query = "SELECT DISTINCT categoria FROM productos";
$result = $conn->query($query);
$categorias = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categorias[] = $row['categoria'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="containerForm">
        <form class="form-container" action="guardar-producto.php" method="POST">
            <h2>Agregar nuevo producto</h2>
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" required></textarea>
            
            <div class="input-group">
                <label for="precio" class="input-group-addon">Precio($):</label>
                <input type="number" name="precio" step="0.01" required>
            </div>
            <label for="categoria">Categoría:</label>
            <select name="categoria" required>
                <?php foreach ($categorias as $categoria) { ?>
                    <option value="<?php echo $categoria; ?>"><?php echo $categoria; ?></option>
                <?php } ?>
            </select>
            <label for="cantidad">Cantidad:</label>
            <input type="number" name="cantidad" required>
            <label for="imagen">Enlace de la imagen:</label>
            <input type="text" name="imagen" required>
            <button type="submit">Agregar</button>
        </form>
    </div>
</body>
</html>
