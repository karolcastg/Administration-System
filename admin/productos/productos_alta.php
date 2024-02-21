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
    <link href='../css/productos.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/productos_alta.js"></script>
    <script src="../js/menu.js"></script>
    <title>Alta de productos</title>

</head>

  <body>
    <?php
      include('../menu.php');
    ?>
    <br><div class='container-h1'>
      <h1 class='h1'>Alta de productos</h1>
    </div>
    <a class="btn btn-secondary" href="productos_lista.php"> Regresar al listado </a><br><br>
    <form action="">
      <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre del producto" /><br>
      <div>
        <input class="form-control" type="text" name="codigo" id="codigo" placeholder="Código del producto" onBlur="validCode()"/>
        <div role="alert" id="code" style="display: none;">
          El código ya existe.
        </div>
      </div>
      <textarea class="form-control" id="descripcion" placeholder="Descripción del producto" rows="5"></textarea>
      <input type="number" class="form-control" id="costo" placeholder="Costo del producto">
      <input type="number" class="form-control" id="stock" placeholder="Cantidad en stock">
      <input class="form-control" type="file" id="file" name="file" enctype="multipart/form-data"><br>
      
      <br><button type="button" onclick="addProduct()" class="btn btn-dark">Agregar producto</button>
      <div role="alert" id="fail" class="fail" style="display: none;">
        Faltan campos por llenar.
      </div>
    </form>
  </body>
</html>