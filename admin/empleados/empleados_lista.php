<?php
//empleados_lista.php

session_start();

if(empty($_SESSION['nombre'])){
  header('Location: index.php');
  exit();
}

require "funciones/conecta.php";

$con = conecta();
$sql = "SELECT * FROM empleados WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/empleados.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/empleados_lista.js"></script>
    <script src="../js/menu.js"></script>
</head>
<body>
    <?php
        include('../menu.php');

        echo "<br><div class='container-h1'>
            <h1 class='h1'>Lista de empleados</h1>
            </div>";
        
        echo "<br><input type='submit' id='new' value='Crear nuevo registro' onclick='add();' class='btn btn-dark'>";
        
        echo "<br><br><br><table class='table table-dark table-striped'>";
        echo "<tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Rol</th>
            <th>Foto</th>
            <th>Nombre encriptado</th>
            <th>Eliminar</th>
            <th>Detalles</th>
            <th>Editar</th>
            </tr>";
        
        while ($row = $res->fetch_array()) {
            $id         = $row["id"];
            $nombre     = $row["nombre"];
            $apellidos  = $row["apellidos"];
            $correo     = $row["correo"];
            $rol        = $row["rol"];
            $file_name  = $row["archivo"];
            $file_enc  = $row["archivo_n"];
            if ($rol == 1) {
                $etiqueta = 'Gerente';
            }
            if ($rol == 2) {
                $etiqueta = 'Ejecutivo';
            }
        
            echo "<tr id='$id'>";
            echo "<td>$id</td>";
            echo "<td>$nombre $apellidos</td>";
            echo "<td>$correo</td>";
            echo "<td>$etiqueta</td>";
            echo "<td>$file_enc</td>";
            echo "<td>$file_name</td>";
            
            echo "<td><input type='submit' class='btn btn-outline-danger' id='idr' onclick='eliminado($id);' value='Eliminar'></td>";
            echo "<td><input type='submit' class='btn btn-outline-info' id='details' onclick='details($id);' value='Ver detalle'></td>";
            echo "<td><input type='submit' class='btn btn-outline-primary' id='edit' onclick='edit($id);' value='Editar'></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    ?>
</body>
</html>
