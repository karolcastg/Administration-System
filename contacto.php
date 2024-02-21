<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/footer.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/front.js"></script>
    <title>Inicio</title>
</head>

<body>
    <?php
    include_once 'componentes/header.php';
    ?>

    <br><h1 class='h1'>¡Contactanos!</h1>

    <section class="contact-section mt-5 mb-5">
        <div class="contact-form">
            <label for="nombre" class="text">Nombre:</label><br>
                <input type="text" id="nombre" class="form-control" name="nombre"><br>
            <label for="asunto" class="text">Asunto:</label><br>
                <input type="text" id="asunto" class="form-control" name="asunto"><br>
            <label for="correo" class="text">Correo electrónico:</label><br>
                <input type="email" id="correo" class="form-control" name="correo"><br>
            <label for="mensaje" class="text">Comentarios:</label><br>
                <textarea id="mensaje" class="form-control" name="mensaje"></textarea><br>

            <button type="submit" class="btn btn-secondary" onclick="Mail()">Enviar</button>
            <div role="alert" id="fail" class="fail" style="display: none;">
                Faltan campos por llenar.
            </div>
        </div>
    </section>

    <?php
    include_once 'componentes/footer.php';
    ?>
</body>

</html>