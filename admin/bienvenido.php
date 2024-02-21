<?php

session_start();
$nombre = $_SESSION['nombre'];
$correo = $_SESSION['correo'];

if (!isset( $_SESSION['idS'] ) ) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Sistema de administración</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/empleados.css">
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/menu.js"></script>
</head>

<body>
    <div>
        <br><br>
        <p class="navbar-brand h1 align">Bienvenido <?php echo $_SESSION['nombre'] ?></p><br>

        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false"
            style="max-width: 800px; margin: auto;">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner" style="max-height: 200px;">
                <div class="carousel-item active">
                    <img src="archivos/recursos/home1.jpeg" class="d-block w-100" alt="First slide">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item">
                    <img src="archivos/recursos/home2.jpeg" class="d-block w-100" alt="Second slide">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
                <div class="carousel-item">
                    <img src="archivos/recursos/home3.jpeg" class="d-block w-100" alt="Third slide">
                    <div class="carousel-caption d-none d-md-block"></div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <br>
        <div class="card align custom-card">
            <div class="card-body">
                <a class="nav-link active text" aria-current="page"
                    href="http://localhost/proyecto01/admin/bienvenido.php">Inicio</a>
            </div>
        </div>

        <br>
        <div class="card align custom-card">
            <div class="card-body">
                <a class="nav-link text" href="http://localhost/proyecto01/admin/empleados/empleados_lista.php">Empleados</a>
            </div>
        </div>

        <br>
        <div class="card align custom-card">
            <div class="card-body">
                <a class="nav-link text" href="http://localhost/proyecto01/admin/productos/productos_lista.php">Productos</a>
            </div>
        </div>

        <br>
        <div class="card align custom-card">
            <div class="card-body">
                <a class="nav-link text" href="http://localhost/proyecto01/admin/pedidos/pedidos_lista.php">Pedidos</a>
            </div>
        </div>

        <br>
        <div class="card align custom-card">
            <div class="card-body">
                <a class="nav-link text"
                    href="http://localhost/proyecto01/admin/promociones/promociones_lista.php">Promociones</a>
            </div>
        </div>

        <br>
        <div class="card align custom-card">
            <div class="card-body">
                <a class="nav-link text" onclick="logout()">Cerrar sesión</a>
            </div>
        </div>

    </div>
</body>

</html>