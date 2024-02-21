<?php
//lista de pedidos

session_start();

if(empty($_SESSION['nombre'])){
  header('Location: index.php');
  exit();
}

require "../conecta.php";

$con = conecta();
$sql = "SELECT * FROM pedidos WHERE status = 1";
$res = $con->query($sql);

?>

<html>
<head>
    <title>Listado de pedidos</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/pedidos.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/pedidos_lista.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <?php
        include('../menu.php');

        echo "<br><div class='container-h1'>
            <h1 class='h1'>Lista de pedidos</h1>
            </div>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Status</th>
            <th>Detalles</th>
            </tr>";

        while ($row = $res->fetch_array()) {
            $id             = $row["id"];
            $fecha          = $row["fecha"];
            $status         = $row["status"];

            echo "<tr id='$id'>";
            echo "<td>$id</td>";
            echo "<td>$fecha</td>";
            echo "<td>$status</td>";

            echo "<td><input type='submit' class='btn btn-outline-info' id='details' onclick='details($id);' value='Ver detalle'></td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>