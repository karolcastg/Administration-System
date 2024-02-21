<?php

// update.php
require "conecta.php";
$con = conecta();

// Recibe variables
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];
$apellidos = $_REQUEST['apellidos'];
$correo = $_REQUEST['correo'];
$contrasena = ($_REQUEST['pass'] != '') ? sha1($_REQUEST['pass']) : '';
$contrasena_nueva = ($contrasena != '') ? ", pass='$contrasena'" : '';
$rol = $_REQUEST['rol'];

$file_name = (isset($_FILES['file'])) ? $_FILES['file']['name'] : '';
$file_tmp = (isset($_FILES['file'])) ? $_FILES['file']['tmp_name'] : '';
$dir = "../../archivos/empleados/";

// Verifica si se cargó un archivo
if (!empty($file_name) && is_uploaded_file($file_tmp)) {
    $arreglo = explode(".", $file_name);
    $ext = end($arreglo);
    $file_enc = md5_file($file_tmp);
    $file_path = $file_enc . '_' . time() . '.' . $ext;

    // Mueve el archivo al directorio destino
    if (move_uploaded_file($file_tmp, $dir . $file_path)) {
        $file_name_sql = ", archivo_n='$file_name'"; //$file_name_sql, si existe un nuevo archivo o no
        $file_name_enc_sql = ", archivo='$file_path'";

    } else {
        echo "Error al subir el archivo.";
        exit();
    }
} else {
    $file_name_sql = '';
    $file_name_enc_sql = '';
}

$sql = "UPDATE empleados SET nombre='$nombre', apellidos='$apellidos', correo='$correo', rol=$rol $contrasena_nueva $file_name_sql $file_name_enc_sql WHERE id = $id";

$res = $con->query($sql);

if ($res == true) {
    echo 1;
} else {
    echo 0;
}

?>
