<?php
session_start();

if (isset($_POST['logout'])) {
    // Cerrar sesión
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit;
}
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
        <h1>Panel de Administración</h1>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4">
                <a href="admin-clientes.php" class="btn btn-primary btn-lg btn-block">Administración de Clientes</a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="admin-productos.php" class="btn btn-primary btn-lg btn-block">Administración de Productos</a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="admin-pedidos.php" class="btn btn-primary btn-lg btn-block">Administración de Pedidos</a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 mb-4">
                <a href="generar-informes.php" class="btn btn-primary btn-lg btn-block">Generación de Informes</a>
            </div>
            <div class="col-lg-4 mb-4">
                <a href="configuracion.php" class="btn btn-primary btn-lg btn-block">Configuración</a>
            </div>
            <div class="col-lg-4 mb-4">
                <form method="POST">
                    <button type="submit" name="logout" class="btn btn-danger btn-lg btn-block">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>