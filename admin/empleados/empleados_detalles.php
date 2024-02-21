<?php

session_start();
$nombre = $_SESSION['nombre'];

if(empty($_SESSION['nombre'])){
  header('Location: index.php');
  exit();
}

require "funciones/conecta.php";
$con = conecta();

if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM empleados WHERE id = $id";
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
    <link href='../css/empleados.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/menu.js"></script>

    <script>
        function back(){
            window.location.href = 'empleados_lista.php';
        }
    </script>
</head>
<body>
    <?php
        include('../menu.php');
        
        echo "<br><div class='container-h1'>
        <h1 class='h1'>Detalles del empleado</h1>
        </div>";

        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Status</th>
            <th>Foto</th>
        </tr>";

        while ($row = $res->fetch_array()) {
        $nombre     = $row["nombre"];
        $apellidos  = $row["apellidos"];
        $correo     = $row["correo"];
        $rol        = $row["rol"];
        $status     = $row["status"];
        $foto       = $row["archivo"];

        if ($rol == 1) {
            $etiqueta = 'Gerente';
        }
        if ($rol == 2) {
            $etiqueta = 'Ejecutivo';
        }
        if ($status == 1) {
            $estado = 'Activo';
        }
        if ($status == 2) {
            $estado = 'Inactivo';
        }

        echo "<tr id='$id'>";
        echo "<td>$nombre $apellidos</td>";
        echo "<td>$correo</td>";
        echo "<td>$etiqueta</td>";
        echo "<td>$estado</td>";
        echo "<td><img src=\"../archivos/empleados/$foto\" class='img-thumbnail' width=\"80\" height=\"80\"></td>";
        echo "</tr>";
        }
        echo "</table>";

        echo "<input type='submit' id='back' value='Regregar al listado' onclick='back();' class='btn btn-secondary'>";
    ?>
</body>
</html>