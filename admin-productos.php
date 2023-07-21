<?php
include 'conexion.php';
session_start();

$sql = "SELECT * FROM productos";
$result = $conn->query($sql);
$cantidadProductos = $result->num_rows;
$query = "SELECT DISTINCT categoria FROM productos";
$categoriasResult = $conn->query($query);
$categorias = array();

if ($categoriasResult->num_rows > 0) {
    while ($row = $categoriasResult->fetch_assoc()) {
        $categorias[] = $row['categoria'];
    }
}
$mensajePredeterminado = "Actualmente hay $cantidadProductos productos.";

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Productos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
    <div style="padding: 70px; padding-top: 10px; padding-bottom: 10px;"></div>
        <h1>Administración de Productos</h1>
        <?php
        if (isset($_SESSION["mensaje"])) {
            $mensaje = $_SESSION["mensaje"];
            unset($_SESSION["mensaje"]);
            echo "<div class='alert alert-success' role='alert'>$mensaje</div>";
        } else {
            echo "<div class='alert alert-info' role='alert'>$mensajePredeterminado</div>";
        }
        ?>
        <div class="container">
            <h2>Lista de productos</h2>

            <div class="text-end">
              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  Agregar producto
              </button>
            </div>
            <table class="table table-striped table-hover">
              
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoría</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $conta = 0;
                        while ($row = $result->fetch_assoc()) {
                            $conta++;
                    ?>
                            <tr>
                                <th scope="row"><?php echo $conta; ?></th>
                                <form id="form-<?php echo $row['id']; ?>" action="editar-producto.php" method="POST">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <td><input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"></td>
                                    <td><input type="text" name="descripcion" value="<?php echo $row['descripcion']; ?>"></td>
                                    <td><input type="number" name="precio" step="0" value="<?php echo $row['precio']; ?>"></td>
                                    <td>
                                        <select name="categoria">
                                            <?php
                                            foreach ($categorias as $categoria) {
                                                $selected = ($categoria == $row['categoria']) ? 'selected' : '';
                                                echo "<option value='$categoria' $selected>$categoria</option>";
                                            }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type="number" name="cantidad" value="<?php echo $row['cantidad']; ?>"></td>
                                    <td>
                                        <button class="btn btn-success btn-guardar" data-id="<?php echo $row['id']; ?>"
                                            type="button">Guardar</button>
                                        <a href="eliminar-producto.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                                    </td>
                                </form>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">No se encontraron productos.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <script>
                            <?php
                            session_start();
                            if (isset($_SESSION["mensaje"])) {
                                $mensaje = $_SESSION["mensaje"];
                                unset($_SESSION["mensaje"]);
                                echo "alert('$mensaje');";
                            }
                            ?>
                        </script>
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nuevo producto</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
            <div class="modal-body">
                <form id="exampleModalForm" class="form-container" action="guardar-producto.php" method="POST" enctype="multipart/form-data">
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
                        </form>
                    </div>
                    <<div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>
