<?php

//empleados_salva.php
require "conecta.php";
$con = conecta();

//Recibe variables
$nombre     = $_REQUEST['nombre'];
$apellidos  = $_REQUEST['apellidos'];
$correo     = $_REQUEST['correo'];
$pass       = $_REQUEST['pass'];
$rol        = $_REQUEST['rol'];
$passEnc    = md5($pass);
$file_name  = $_FILES['file']['name'];
$file_tmp   = $_FILES['file']['tmp_name'];
$arreglo    = explode(".", $file_name);
$len        = count($arreglo);
$pos        = $len - 1;
$ext        = $arreglo[$pos];
$dir        = "../../archivos/empleados/";
$file_enc   = md5_file($file_tmp);

if($file_name != '') {
    $fileName1 = $file_enc . '_' . time() . '.' . $ext;
    copy($file_tmp, $dir.$fileName1);
}

$sql = "INSERT INTO empleados(nombre, apellidos, correo, pass, rol, archivo_n, archivo) VALUES 
('$nombre', '$apellidos', '$correo', '$passEnc', $rol, '$file_name', '$fileName1')";

$res = $con->query($sql);

if($res == true){
    echo 1;
}else {
    echo 0;
}

?>