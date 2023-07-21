<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto - Dulces Sueños</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<?php include 'header.php'; ?>
    <div class="container">
    <h1 class="my-4">Contacto</h1>
    <div class="row">
      <div class="col-md-8 mb-4">
        <form>
          <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" required>
          </div>
          <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="form-group">
            <label for="mensaje">Mensaje</label>
            <textarea class="form-control" id="mensaje" rows="5" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
      </div>
      <div class="col-md-4 mb-4">
        <h3>Información de Contacto</h3>
        <ul class="list-unstyled">
          <li><i class="fa fa-phone"></i> +XX XXXXXXXXXX</li>
          <li><i class="fa fa-map-marker"></i> Dirección de la pastelería</li>
          <li><i class="fa fa-envelope"></i> info@dulcessuenos.com</li>
        </ul>
        <h3>Redes Sociales</h3>
        <ul class="list-unstyled">
          <li><a href="#"><i class="fa fa-facebook"></i> Facebook</a></li>
          <li><a href="#"><i class="fa fa-instagram"></i> Instagram</a></li>
          <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
        </ul>
      </div>
    </div>
  </div>
</body>