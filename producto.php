<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasteleria Dulces Sueños</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <?php
                include 'conexion.php';
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $productId = $_GET['id'];

                    $sql = "SELECT * FROM productos WHERE id = $productId";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $row = $result->fetch_assoc();
                        $nombre = $row['nombre'];
                        $descripcion = $row['descripcion'];
                        $imagen = $row['imagen'];
                        $precio = $row['precio'];
                        $categoria = $row['categoria'];
                        echo '<h1>'.$nombre.'</h1>';
                        echo '<p>Categoría: '.$categoria.'</p>';
                        echo '<img src="'.$imagen.'" alt="'.$nombre.'" style="width: 200px;">';
                        echo '<p>'.$descripcion.'</p>';
                        echo '<p>Precio: $'.$precio.'</p>';
                    } else {
                        echo 'El producto no existe.';
                    }
    
                    $result->free_result();
                } else {
                    echo 'ID de producto inválido.';
                }
        
                $conn->close();
                ?>
            </div>

            <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="carritoModalLabel">Carrito de Compras</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="carritoModalBody">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <a href="pago.php" class="btn btn-primary">Ir a pagar</a>
                        </div>
                    </div>
                </div>
            </div>
        </body>
    </html>