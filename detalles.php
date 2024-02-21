<?php

require('conecta.php');

$id = $_GET['id'];

$con = conecta();
$sql = "SELECT * FROM productos WHERE id = $id AND status = 1 AND eliminado = 0";
$res_producto = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="js/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/front.js"></script>
    <title>Detalles</title>
</head>

<body>
    <?php
    include_once 'componentes/header.php';
    ?>

    <p class="h2">Detalles del producto</p>

    <?php 
        while($row = $res_producto->fetch_array()) {
            $id             = $row['id'];
            $imagen         = $row['archivo'];
            $nombre         = $row['nombre'];
            $descripcion    = $row['descripcion'];
            $codigo         = $row['codigo'];
            $costo          = $row['costo'];
            
            echo "
                <div class='card mx-auto' style='width: 40rem;'>
                    <img src='./admin/archivos/productos/$imagen' class='card-img-top' style='max-height: 300px;'>
                    <div class='card-body'>
                        <h5 class='card-title text'>$nombre</h5>
                        <p class='card-text'>$descripcion</p>
                        <p class='card-text'>Código: $codigo</p>
                        <p class='card-text'>Precio: $$costo</p>
                        <input class='card' type='number' name='cantidad' id='cantidad_$id'>
                        <button class='btn btn-secondary' onclick='agregar($id)'>Añadir al carrito</button>
                        <div id='added' style='display: none;'>
                            Producto añadido al carrito.
                        </div>
                    </div>
                </div>
            ";
        }

        include_once 'componentes/footer.php';
    ?>
</body>

</html>