<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/proyecto01/admin/bienvenido.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/proyecto01/admin/empleados/empleados_lista.php">Empleados</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/proyecto01/admin/productos/productos_lista.php">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/proyecto01/admin/pedidos/pedidos_lista.php">Pedidos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/proyecto01/admin/promociones/promociones_lista.php">Promociones</a>
                </li>
                <a class="navbar-brand">Bienvenido <?php echo $_SESSION['nombre'] ?></a>
                <li class="nav-item">
                    <a class="nav-link" onclick="logout()">Cerrar sesión</a>
                </li>
            </ul>
        </div>
    </div>
</nav>