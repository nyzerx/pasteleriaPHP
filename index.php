<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pasteleria Dulces Sueños</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="slider-container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="pastel1.jpg" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="pastel2.jpg" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="pastel3.jpg" class="d-block w-100" alt="Imagen 3">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-beta1/js/bootstrap.bundle.min.js"></script>

    <div style="padding: 70px; padding-top: 10px; padding-bottom: 10px;">
        <h1 class="my-4">Los más vendidos</h1>
    </div>
    
    <div class="container text-center">
    <div class="row align-items-center">
        <?php

        $sql = "SELECT * FROM productos LIMIT 4";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $nombre = $row['nombre'];
                $descripcion = $row['descripcion'];
                $imagen = $row['imagen'];
                echo '<div class="col-md-3">';
                echo '<div class="card m-2" style="width: 18rem;">';
                echo '<img src="'.$imagen.'" class="card-img-top" alt="'.$nombre.'">';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">'.$nombre.'</h5>';
                echo '<p class="card-text">'.$descripcion.'</p>';
                echo '<a href="producto.php?id='.$row['id'].'" class="btn btn-success">Ver más</a>';
                ?>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#carritoModal">Carrito</button>
                <?php
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo 'No se encontraron productos.';
        }
        $result->free_result();
        ?>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0-beta1/js/bootstrap.bundle.min.js"></script>

    <script>
    const botonesAgregarCarrito = document.querySelectorAll('.agregar-al-carrito');
    botonesAgregarCarrito.forEach(botonesAgregarCarrito => {
        botonesAgregarCarrito.addEventListener('click', agregarAlCarrito);
    });

    function agregarAlCarrito(event) {
        const idProducto = event.target.dataset.id;
        const nombreProducto = event.target.dataset.nombre;
        const precioProducto = parseFloat(event.target.dataset.precio);

        fetch('agregar_al_carro.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                id: idProducto,
                nombre: nombreProducto,
                precio: precioProducto
            })
        }).then(response => {
            $('#carritoModalBody').load('carrito.php #carritoContent');
            $('#carritoModal').modal('show');
        }).catch(error => {
            console.error('Error al agregar el producto al carrito:', error);
        });
    }
</script>
                <footer>
                    <p>© 2023 Pastelería Dulces Sueños. Todos los derechos reservados.</p>
                </footer>
                </body>
</html>                