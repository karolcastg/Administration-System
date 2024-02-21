<?php
//detalles de las promociones
session_start();
$nombre = $_SESSION['nombre'];

if(empty($_SESSION['nombre'])){
  header('Location: index.php');
  exit();
}

require "../conecta.php";
$con = conecta();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM promociones WHERE id = $id";
    $res = $con->query($sql);
}else{
    echo "ID no proporcionado en la solicitud.";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' >
    <link href='../css/promociones.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/menu.js"></script>

    <script>
        function back(){
            window.location.href = 'promociones_lista.php';
        }
    </script>
</head>
<body>
    <?php
        include('../menu.php');
        
        echo "<br><div class='container-h1'>
        <h1 class='h1'>Detalles de la promoción</h1>
        </div>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>Nombre</th>
            <th>Status</th>
            <th>Foto</th>
        </tr>";

        while ($row = $res->fetch_array()) {
        $nombre         = $row["nombre"];
        $status         = $row["status"];
        $foto           = $row["archivo"];

        if ($status == 1) {
            $estado = 'Activa';
        }
        if ($status == 2) {
            $estado = 'Inactiva';
        }

        echo "<tr id='$id'>";
        echo "<td>$nombre</td>";
        echo "<td>$estado</td>";
        echo "<td><img src=\"../archivos/promociones/$foto\" class='img-thumbnail' width=\"600\" height=\"200\"></td>";
        echo "</tr>";
        }
        echo "</table>";

        echo "<input type='submit' id='back' value='Regresar al listado' onclick='back();' class='btn btn-dark'>";
    ?>
</body>
</html>