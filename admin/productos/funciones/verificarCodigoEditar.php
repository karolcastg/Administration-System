<?php
//verificar codigo existente

require "../../conecta.php";
$con = conecta();

$codigo = $_REQUEST['codigo'];
$id = $_REQUEST['id'];

$sql = "SELECT * FROM productos WHERE codigo = '$codigo' AND eliminado = 0 AND id <> $id";
$res = $con->query($sql);
$num = $res->num_rows;

if($num > 0){
    echo true; //si existe el codigo
}else{
    echo false;
}

?>