<?php
include 'conexion.php';
session_start();
$sql = "SELECT * FROM pedidos";
$result = $conn->query($sql);
$cantidadPedidos = $result->num_rows;
$mensajePredeterminado = "Actualmente hay $cantidadPedidos pedidos.";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración de Pedidos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
    <div style="padding: 70px; padding-top: 10px; padding-bottom: 10px;"></div>
        <h1>Administración de Pedidos</h1>
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
            <h2>Lista de pedidos</h2>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Detalle</th>
                        <th scope="col">Monto</th>
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
                                    <td><?php echo $row['fecha']; ?></td>
                                    <td><?php echo $row['detalle']; ?></td>
                                    <td><?php echo $row['monto']; ?></td>
                                </form>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="7">No se encontraron pedidos.</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>
