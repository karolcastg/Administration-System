<?php

//empleados_salva.php
require "../../conecta.php";
$con = conecta();

//Recibe variables
$nombre         = $_REQUEST['nombre'];
$codigo         = $_REQUEST['codigo'];
$descripcion    = $_REQUEST['descripcion'];
$costo          = $_REQUEST['costo'];
$stock          = $_REQUEST['stock'];
$file_name      = $_FILES['file']['name'];
$file_tmp       = $_FILES['file']['tmp_name'];
$arreglo        = explode(".", $file_name);
$len            = count($arreglo);
$pos            = $len - 1;
$ext            = $arreglo[$pos];
$dir            = "../../archivos/productos/";
$file_enc       = md5_file($file_tmp);

if($file_name != '') {
    $fileName1 = $file_enc . '_' . time() . '.' . $ext;
    copy($file_tmp, $dir.$fileName1);
}

$sql = "INSERT INTO productos(nombre, codigo, descripcion, costo, stock, archivo_n, archivo) VALUES 
('$nombre', '$codigo', '$descripcion', '$costo', $stock, '$file_name', '$fileName1')";

$res = $con->query($sql);

if($res == true){
    echo 1;
}else {
    echo 0;
}

?>