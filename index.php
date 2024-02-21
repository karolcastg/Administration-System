<?php
//home del cliente

require('conecta.php');

$con = conecta();

$sql = "SELECT * FROM promociones WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 3";
$res = $con->query($sql);

while($row = $res->fetch_array()){
    $banner_nombre  = $row['nombre']; 
    $banner         = $row['archivo'];
}

$sql = "SELECT * FROM productos WHERE status = 1 AND eliminado = 0 ORDER BY RAND() LIMIT 3";
$res_producto = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/front.js"></script>
</head>
<body class="body">
    <?php
        include_once 'componentes/header.php';
    ?>

    <br><br><p class="h2">¡Distruta de nuestras promociones!</p><br><br>

    <section class="banner-section">
        <?php
            echo "<br><img class=\"container\" id='banner' src=\"./admin/archivos/promociones/$banner\">";
            echo "<div class='banner-name'>
                    <label>$banner_nombre</label>
                    </div>"   
        ?>
    </section>
    <br><br>
        
        <br>
        <div id='added' style='display: none;' class="alert alert-dark">
            Producto añadido al carrito.
        </div>
        <div id='empty' style='display: none; text-align: center;' class="alert alert-dark">
                Inicia sesión para continuar.
        </div>

        <?php
            echo "<div class='card-container'>";

            while ($row_producto = $res_producto->fetch_array()) {
                $id = $row_producto['id'];
                $imagen = $row_producto['archivo'];
                $nombre = $row_producto['nombre'];
                $descripcion = $row_producto['descripcion'];
                $codigo = $row_producto['codigo'];
                $costo = $row_producto['costo'];
            
                echo "
                    <div class='card' style='width: 12rem; margin-right: 100px; margin-bottom: 10px;'>
                        <img src=\"./admin/archivos/productos/$imagen\" class='card-img-top' style='max-height: 150px;'>
                        <div class='card-body'>
                            <h5 class='card-title text'>$nombre</h5>
                            <p class='card-text'>$descripcion</p>
                            <p class='card-text'>Código: $codigo</p>
                            <p class='card-text'>Precio: $$costo</p>
                            <input class='card' type='number' name='cantidad' id='cantidad_$id'>
                            <button class='btn btn-secondary' onclick='agregar($id)'>Añadir al carrito</button>
                        </div>
                    </div>
                ";
            }

            echo "</div><br><br>";
        ?>

    <?php
        include_once 'componentes/footer.php';
    ?>
</body>
</html>