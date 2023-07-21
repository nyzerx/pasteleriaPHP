<?php
include 'conexion.php';
session_start();
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
$cantidadClientes = $result->num_rows;
$mensajePredeterminado = "Actualmente hay $cantidadClientes clientes.";
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
        <h1>Administración de Clientes</h1>
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
            <h2>Lista de clientes</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Email</th>
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
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apellido']; ?></td>
                                    <td><?php echo $row['telefono']; ?></td>
                                    <td><?php echo $row['correo']; ?></td>
                                </form>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">No se encontraron clientes.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>
