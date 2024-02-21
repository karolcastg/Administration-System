<?php

session_start();

if(empty($_SESSION['nombre'])){
  header('Location: index.php');
  exit();
}

require "../conecta.php";
$con = conecta();

$id_pedido = $_GET['id'];

$sql = "SELECT pedidos_productos.*, productos.nombre AS nombre_producto FROM pedidos_productos 
LEFT JOIN productos ON productos.id = pedidos_productos.id_producto
WHERE id_pedido = '$id_pedido'";

$res = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' >
    <link href='../css/pedidos.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/menu.js"></script>

    <script>
        function back(){
            window.location.href = 'pedidos_lista.php';
        }
    </script>
</head>
<body>
    <?php
        include('../menu.php');
        
        echo "<br><div class='container-h1'>
        <h1 class='h1'>Detalles del pedido</h1>
        </div>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Costo Unitario</th>
            <th>Subtotal</th>
        </tr>";

        $total_pedido = 0;
        
        while ($row = $res->fetch_array()) {
            $id         = $row['id'];
            $nombre     = $row['nombre_producto'];
            $cantidad   = $row['cantidad'];
            $precio     = $row['precio'];
            $subtotal   = $precio * $cantidad;

            echo "<tr id='$id'>";
            echo "<td>$nombre</td>";
            echo "<td>$cantidad</td>";
            echo "<td>$precio</td>";
            echo "<td>$subtotal</td>";
            echo "</tr>";

            $total_pedido += $subtotal;
        }
        echo "<tr><td>Total del Pedido</td><td></td><td></td><td>$total_pedido</td></tr>";
        echo "</table>";

        echo "<input type='submit' id='back' value='Regresar al listado' onclick='back();' class='btn btn-dark'>";
    ?>
</body>
</html>