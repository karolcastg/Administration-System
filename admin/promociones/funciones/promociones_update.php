<?php
// update promociones.php
require "../../conecta.php";
$con = conecta();

// Recibe variables
$id = $_REQUEST['id'];
$nombre = $_REQUEST['nombre'];

$file_name = (isset($_FILES['file'])) ? $_FILES['file']['name'] : '';
$file_tmp = (isset($_FILES['file'])) ? $_FILES['file']['tmp_name'] : '';
$dir = "../../archivos/promociones/";

// Verifica si se cargó un archivo
if (!empty($file_name) && is_uploaded_file($file_tmp)) {
    $arreglo = explode(".", $file_name);
    $ext = end($arreglo);
    $file_enc = md5_file($file_tmp);
    $file_path = $file_enc . '_' . time() . '.' . $ext;

    // Mueve el archivo al directorio destino
    if (move_uploaded_file($file_tmp, $dir . $file_path)) {
        $file_name_enc_sql = ", archivo='$file_path'"; //si existe un nuevo archivo o no

    } else {
        echo "Error al subir el archivo.";
        exit();
    }
} else {
    $file_name_enc_sql = '';
}

$sql = "UPDATE promociones SET nombre='$nombre' $file_name_enc_sql WHERE id = $id";

$res = $con->query($sql);

if ($res == true) {
    echo 1;
} else {
    echo 0;
}

?>
