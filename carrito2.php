<?php
//carrito con pedido cerrado

require('conecta.php');

session_start();

$id_usuario = $_SESSION['id_usuario'];

if(!isset($id_usuario)) {
    header('Location: login.php');
}

$con = conecta();

$sql = "SELECT * FROM pedidos WHERE id_usuario = '$id_usuario' AND status = 1";
$res_pedido = $con->query($sql);

$id_pedido = NULL;

while($row_pedido = $res_pedido->fetch_assoc()) {
    $id_pedido = $row_pedido['id'];
}

echo $id_pedido;
if(!isset($id_pedido)) {
    //echo 'null';
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
            <p class='h1'>Carrito</p><br>
            <p class='h2'>Pedidos cerrados</p>
            </div>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>Producto</th>
            <th>Costo</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
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
            echo "<td>$nombre</td>";
            echo "<td>$precio</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$subtotal</td>";
            echo "</tr>";

            $total_pedido += $subtotal;
        }
        echo "<tr><td>Total del Pedido</td><td></td><td></td><td>$total_pedido</td></tr>";
        echo "</table>";

        echo "<br><div>
            <p class='h2'>¡Gracias por tu compra!</p><br><br>
            </div>";

        include_once 'componentes/footer.php';
    ?>
</body>
</html>