<?php
session_start();
$nombre = $_SESSION['nombre'];

if (empty( $_SESSION['idS'] ) ) {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='../css/promociones.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/promociones_alta.js"></script>
    <script src="../js/menu.js"></script>
    <title>Alta de pomociones</title>

</head>

  <body>
    <?php
      include('../menu.php');
    ?>
    <br><div class='container-h1'>
      <h1 class='h1'>Alta de promociones</h1>
    </div>
    <a class="btn btn-secondary" href="promociones_lista.php"> Regresar al listado </a><br><br>
    <form action="">
      <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del producto" /><br>
      <div>
      <input class="form-control" type="file" id="file" name="file" enctype="multipart/form-data"><br>
      
      <br><button type="button" onclick="addProm()" class="btn btn-dark">Agregar promoción</button>
      <div role="alert" id="fail" class="fail" style="display: none;">
        Faltan campos por llenar.
      </div>
    </form>
  </body>
</html>