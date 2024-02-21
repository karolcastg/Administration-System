<?php
//verificar Codigo.php
require "../../conecta.php";
$con = conecta();

$codigo = $_REQUEST['codigo'];

$sql = "SELECT * FROM productos WHERE codigo = '$codigo' AND eliminado = 0";
$res = $con->query($sql);
$num = $res->num_rows;

if($num > 0){
    echo true; //si existe el codigo
}else{
    echo false;
}

?>