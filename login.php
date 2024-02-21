<?php
session_start();

if (isset( $_SESSION['id_usuario'] ) ) {
    header("Location: carrito1.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css' rel='stylesheet' >
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/front.js"></script>
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
</head>
<body>
    <div class="card flex-row"><img class="card-img-left example-card-img-responsive" src="resources/Logo1.jpeg" height="640px"/>
        <p class="text">Login</p>
        <p class="text2">Ingresa a tu cuenta</p>
        <div class="container">
            <form action="">
                <br>
                <div class="textbox">
                    <input type="mail" class="form-control" id="mail" placeholder="Correo">
                    <svg class="left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="7" r="4"/>
                        <path d="M5 21v-2a7 7 0 0 1 14 0v2"/>
                    </svg>
                </div><br>
                <div class="textbox">
                    <input type="password" class="form-control" id="pass" placeholder="Contraseña">
                    <svg class="left2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"/>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"/>
                    </svg>
                </div>
                <div>
                    <button type="button" class="button :hover :active" onclick="user()">Ingresar</button>
                    <div role="alert" id="fail" class="fail" style="display: none;">
                        Faltan campos por llenar.
                    </div>
                    <div role="alert" id="fake" style="display: none;">
                        El usuario no existe.
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>