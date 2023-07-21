<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'conexion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
<header class="bg-light">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="index.php">
            <img src="logo.png" alt="Logo de Dulces Sueños" width="100" style="max-width: 70px; height: auto;">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav flex-grow-1">
                    <a class="nav-link" href="index.php">Inicio</a>
                    <a class="nav-link" href="productos.php">Productos</a>
                    <a class="nav-link" href="contacto.php">Contacto</a>
                </div>
                <ul class="navbar-nav">
                    <?php
                    if (isset($_SESSION['username'])) {
                        echo '<div class="user-info">';
                        echo '<span class="username">Hola, ' . $_SESSION['username'] . '</span>';
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="admin-panel.php">';
                        echo '<img src="usuario.png" alt="Icono de Usuario" width="24" class="mr-2">';
                        echo '</a>';
                        echo '</li>';
                        echo '</div>';
                    } else {
                        ?>
                        <?php include 'carrito.php'; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#carritoModal">
                                <img src="carrito.png" alt="Icono de Carrito de Compras" width="24" class="mr-2">
                                Carrito
                            </a>
                        </li>
                        <?php
                        echo '<li class="nav-item">';
                        echo '<a class="nav-link" href="login.php">';
                        echo '<img src="usuario.png" alt="Icono de Usuario" width="24" class="mr-2">';
                        echo '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </div>
</header>
</body>
</html>
