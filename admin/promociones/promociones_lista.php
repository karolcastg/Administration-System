<?php
//lista de promociones

session_start();

if(empty($_SESSION['nombre'])){
  header('Location: index.php');
  exit();
}

require "../conecta.php";

$con = conecta();
$sql = "SELECT * FROM promociones WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

?>

<html>
<head>
    <title>Listado de promociones</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/promociones.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/promociones_lista.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <?php
        include('../menu.php');

        echo "<br><div class='container-h1'>
            <h1 class='h1'>Lista de promociones</h1>
            </div>";

        echo "<input type='submit' id='new' value='Añadir promoción' onclick='add();' class='btn btn-dark'>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Foto</th>
            <th>Eliminar</th>
            <th>Detalles</th>
            <th>Editar</th>
            </tr>";

        while ($row = $res->fetch_array()) {
            $id             = $row["id"];
            $nombre         = $row["nombre"];
            $fileName1       = $row["archivo"];

            echo "<tr id='$id'>";
            echo "<td>$id</td>";
            echo "<td>$nombre</td>";
            echo "<td>$fileName1</td>";
            
            echo "<td><input type='submit' class='btn btn-outline-danger' id='idr' onclick='eliminado($id);' value='Eliminar'></td>";
            echo "<td><input type='submit' class='btn btn-outline-info' id='details' onclick='details($id);' value='Ver detalle'></td>";
            echo "<td><input type='submit' class='btn btn-outline-primary' id='edit' onclick='edit($id);' value='Editar'></td>";
            echo "</tr>";
        }

        echo "</table>";
    ?>
</body>
</html>