<?php
//pedido abierto

require('conecta.php');

session_start();

$id_usuario = $_SESSION['id_usuario'];

if(!isset($id_usuario)) {
    header('Location: login.php');
}

$con = conecta();

$sql = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' AND status = 0";
$res_pedido = $con->query($sql);

$id_pedido = NULL;

while($row_pedido = $res_pedido->fetch_assoc()) {
    $id_pedido = $row_pedido['id'];
}

if(!isset($id_pedido)) {
    echo 'null';
}

$sql2 = "SELECT pedidos_productos.*, productos.nombre AS nombre_producto, productos.stock AS stock_producto 
FROM pedidos_productos LEFT JOIN productos ON productos.id = pedidos_productos.id_producto
WHERE id_pedido = '$id_pedido'";

$res_producto_pedido = $con->query($sql2);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/front.js"></script>
    <title>Carrito</title>
</head>
<body>
    <?php
        include_once 'componentes/header.php';

        echo "<br><div>
            <h1 class='h1'>Carrito de compras</h1>
            </div>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr class='align'>
            <th>Producto</th>
            <th>Costo</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Eliminar producto</th>
        </tr>";

        $total_pedido = 0;
        
        while ($row = $res_producto_pedido->fetch_array()) {
            $id         = $row['id'];
            $nombre     = $row['nombre_producto'];
            $precio     = $row['precio'];
            $cantidad   = $row['cantidad'];
            $stock      = $row['stock_producto'];
            
            $subtotal   = $precio * $cantidad;

            echo "<tr id='$id'>";
            echo "<td class='align'>$nombre</td>";
            echo "<td class='align'>$$precio</td>";
            echo "<td class='align'><select name='cantidad' id='cantidad_$id' onchange='subtotal($id, $precio)'>";
                for ($i = 1; $i <= $stock; $i++) {
                    if ($i == $cantidad) {
                        echo "<option value='$i' selected>$i</option>";
                    } else {
                        echo "<option value='$i'>$i</option>";
                    }
                }
            echo "</select></td>";
            echo "<td id='subtotal_$id' class='align'>$$subtotal</td>";
            echo "<td class='align'><input type='submit' class='btn btn-outline-danger' id='ide' onclick='eliminar($id);' value='Eliminar'></td>";
            echo "</tr>";

            $total_pedido += $subtotal;
        }
        echo "<tr><td>Total del Pedido</td><td></td><td></td><td></td><td id='total_pedido' class='align'>$$total_pedido</td></tr>";
        echo "</table>";

        echo "<br><br>
            <button class='btn btn-success' onclick='enviar($id_pedido)'>
                Enviar pedido
            </button><br>
            <div id='fail' style='display: none;'>
                Error en el envío del carrito
            </div>
            <br><br><br>";
    ?>

    <?php
        include_once 'componentes/footer.php';
    ?>
</body>
</html>