<?php

session_start();

require "../conecta.php";

$con = conecta();
$id = $_POST['id'];

$sql = "UPDATE pedidos SET status = 1 WHERE id = $id";

$res = $con->query($sql);

$num = $con->affected_rows;

if ($num == 0) {
	echo 0;
} else {
    echo 1;
}

?>