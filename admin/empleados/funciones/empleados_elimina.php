<?php

require "conecta.php";
$con = conecta();

$id = $_REQUEST['id'];

//$sql = "DELETE FROM empleados WHERE id = $id";
$sql = "UPDATE empleados SET eliminado = 1 WHERE id = $id";
$res = $con->query($sql);

echo $res;

?>