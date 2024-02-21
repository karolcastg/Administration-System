<?php
session_start();

if(isset($_SESSION['usuario'])){
    header('Location: bienvenido.php');
}

require "conecta.php";

$correo = $_POST['correo'];
$pass = md5($_POST['pass']);

$con = conecta();
$sql = "SELECT * FROM empleados WHERE correo = '$correo' AND pass = '$pass' AND status = 1 AND eliminado = 0";

$res = $con->query($sql);
//echo "$sql";

$rows = $res->fetch_assoc();

if($res->num_rows > 1){
    echo "incorrecto";
}else if($res->num_rows == 0){
    echo "incorrecto";
}else if($res->num_rows == 1) {
    $idS = $rows["id"];
    $nombre = $rows["nombre"].' '.$rows["apellidos"];
    $correo = $rows['correo'];
    $_SESSION['idS'] = $idS;
    $_SESSION['nombre'] = $nombre;
    $_SESSION['correo'] = $correo;
    echo "correcto";
}

?>