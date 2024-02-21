<?php
//eliminar productos del carrito
require "../conecta.php";

$con = conecta();
$id = $_POST['id'];

$sql = "DELETE FROM pedidos_productos WHERE id = $id";
$res = $con->query($sql);
$num = $con->affected_rows;

if ($num == 0) {
	echo 0;
} else {
    echo 1;
}

?>