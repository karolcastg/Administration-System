<?php

require "../conecta.php";

$con = conecta();

$id = $_POST['id'];
$cantidad = $_POST['cantidad'];

$sql = "UPDATE pedidos_productos SET cantidad = $cantidad WHERE id = $id";

$res = $con->query($sql);
$num = $con->affected_rows;

if ($num == 0) {
	echo 0;
} else {
    echo 1;
}

?>