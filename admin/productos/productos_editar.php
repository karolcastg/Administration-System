<?php

session_start();
$nombre = $_SESSION['nombre'];

if(empty($_SESSION['idS'])){
  header('Location: index.php');
  exit();
}

require "../conecta.php";
$con = conecta();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM productos WHERE id = $id";
    $res = $con->query($sql);

    if ($res) {
        while ($row = $res->fetch_array()) {
            $id             = $row["id"];
            $nombre         = $row["nombre"];
            $codigo         = $row["codigo"];
            $descripcion    = $row["descripcion"];
            $costo          = $row["costo"];
            $stock          = $row["stock"];
        }
    } else {
        // Manejar el caso en que la consulta no fue exitosa
        echo "Error en la consulta: " . $con->error;
    }
} else {
    // Manejar el caso en que 'id' no está definido en la solicitud
    echo "ID no definido";
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
    <script src="../js/productos_editar.js"></script>
    <script src="../js/menu.js"></script>
    <title>Editar producto</title>

</head>
<body>
    <?php
        include('../menu.php');
    ?>
    <br><div class='container-h1'>
        <h1 class='h1'>Detalles del producto</h1>
    </div>

    <form action="">
        <br><br><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/><br>
        <input class="form-control" type="text" name="codigo" id="codigo" value="<?php echo $codigo; ?>" onblur="validCode(<?php echo $codigo; ?>)"/><br>
        <div role="alert" id="code" style="display: none;">
          El código ya existe.
        </div>
        <textarea class="form-control" id="descripcion" value="" rows="5"><?php echo $descripcion; ?></textarea>
        <input type="number" class="form-control" id="costo" value="<?php echo $costo; ?>">
        <input type="number" class="form-control" id="stock" value="<?php echo $stock; ?>">

        <input class="form-control" type="file" id="file" name="file" enctype="multipart/form-data"><br>

        <br><button class="btn btn-dark" type="button" onclick="validaDatosEditados(<?php echo $id;?>)">Guardar cambios</button>
        <div role="alert" id="fail" class="fail" style="display: none;">
        Faltan campos por llenar.
        </div>
    </form>

    <br><br><input type='button' id='back' value='Regregar al listado' onclick='back();' class='btn btn-dark'>
</body>
</html>