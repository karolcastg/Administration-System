<?php

session_start();
$nombre = $_SESSION['nombre'];

if (empty( $_SESSION['idS'] ) ) {
  header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='../css/empleados.css' rel='stylesheet'>
    <script src="../js/jquery-3.3.1.min.js"></script>
    <script src="../js/empleados_alta.js"></script>
    <script src="../js/menu.js"></script>
    <title>Alta de empleados</title>

</head>

<body>
    <?php
      include('../menu.php');
    ?>

    <br>
    <div class='container-h1'>
        <h1 class='h1'>Alta de empleados</h1>
    </div>
    <a class="btn btn-secondary" href="empleados_lista.php"> Regresar al listado </a><br><br>

    <form action="">
        <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Escribe tu nombre" /><br>
        <input class="form-control" type="text" name="apellidos" id="apellidos"
            placeholder="Escribe tus apellidos" /><br>
        <div>
            <input class="form-control" type="text" name="correo" id="correo" placeholder="Escribe tu correo"
                onBlur="validMail()" />
            <div role="alert" id="mail" style="display: none;">
                El correo xxxx@mail.com ya existe.
            </div>
        </div>

        <br><input class="form-control" type="password" name="pass" id="pass" placeholder="Escribe tu contraseña" /><br>
        <select name="rol" id="rol" class="form-select">
            <option value="0"> Selecciona </option>
            <option value="1"> Gerente </option>
            <option value="2"> Ejecutivo </option>
        </select><br>

        <input class="form-control" type="file" id="file" name="file" enctype="multipart/form-data"><br>

        <br><button type="button" onclick="validaDatos()" class="btn btn-dark">Agregar empleado</button>
        <div role="alert" id="fail" class="fail" style="display: none;">
            Faltan campos por llenar.
        </div>
    </form>
</body>

</html>