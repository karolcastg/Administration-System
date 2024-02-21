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

    if ($res) {
        while ($row = $res->fetch_array()) {
            $id         = $row["id"];
            $nombre     = $row["nombre"];
            $apellidos  = $row["apellidos"];
            $correo     = $row["correo"];
            $rol        = $row["rol"];
            $status     = $row["status"];
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
        }
    } else {
        // Manejar el caso en que la consulta no fue exitosa
        echo "Error en la consulta: " . $con->error;
    }
} else {
    // Manejar el caso en que 'id' no está definido en la solicitud
    echo "ID no definido";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='../css/empleados.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/empleados_editar.js"></script>
    <script src="../js/menu.js"></script>
    <title>Editar empleado</title>

</head>
<body>
    <?php
        include('../menu.php');
    ?>
    <br><div class='container-h1'>
        <h1 class='h1'>Detalles del empleado</h1>
    </div>

    <form action="">
        <br><br><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $nombre; ?>"/><br>
        <input class="form-control" type="text" name="apellidos" id="apellidos" value="<?php echo $apellidos; ?>"/><br>
        <input class="form-control" type="text" name="correo" id="correo" value="<?php echo $correo; ?>" onblur="validMail(<?php echo $id; ?>)"/>
        <div role="alert" id="mail" style="display: none;">
          El correo xxxx@mail.com ya existe.
        </div>
        <br><input class="form-control" type="password" name="pass" id="pass" placeholder="Escribe tu contraseña" /><br>
        <select name="rol" id="rol" class="form-select">
            <option value="0"></option>
            <option value="1" <?php echo (($rol == 1)?'selected':'')?>> Gerente </option>
            <option value="2" <?php echo (($rol == 2)?'selected':'')?>> Ejecutivo </option>
        </select><br>

        <input class="form-control" type="file" id="file" name="file" enctype="multipart/form-data"><br>

        <br><button class="btn btn-dark" type="button" onclick="validaDatos(<?php echo $id;?>)">Guardar cambios</button>
        <div role="alert" id="fail" class="fail" style="display: none;">
        Faltan campos por llenar.
        </div>
    </form>

    <br><br><input type='button' id='back' value='Regregar al listado' onclick='back();' class='btn btn-dark'>
</body>
</html>