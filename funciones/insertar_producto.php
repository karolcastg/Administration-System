<?php
//insertarProducto.php

session_start();
require('../conecta.php');

$con = conecta();

$id_producto  = $_REQUEST['id_producto'];
$cantidad = $_REQUEST['cantidad'];
$id_usuario = $_SESSION['id_usuario'];

if(!isset($id_usuario)) {
    header ('Location: ../login.php');
}

//id del pedido
$sql = "SELECT * FROM pedidos WHERE id_usuario = $id_usuario AND status = 0";

$res = $con->query($sql);
$num = $res->num_rows;

if ($num == 0) {
	$fecha = date('Y-m-d h:i:s');
	$sql = "INSERT INTO pedidos (fecha, id_usuario) VALUES ('$fecha', $id_usuario)";
	$res = $con->query($sql);
	$id_pedido = $con->insert_id;
} else {
    $row = $res->fetch_assoc();
	$id_pedido = $row['id'];
}

//Obtener costo
$sql = "SELECT costo FROM productos WHERE id = $id_producto";
$res = $con->query($sql);
$num = $res->num_rows;

if ($num) {
    $row = $res->fetch_assoc();
	$costo = $row['costo'];
}

if ($cantidad > 0) {
	$sql = "SELECT * FROM pedidos_productos WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
	$res = $con->query($sql);
	$num = $res->num_rows;
	if ($num == 0) {
		$sql = "INSERT INTO pedidos_productos (id_pedido, id_producto, cantidad, precio) VALUES ($id_pedido, $id_producto, $cantidad, $costo);";
	} else {
		$sql = "UPDATE pedidos_productos SET cantidad = cantidad + $cantidad WHERE id_producto = $id_producto AND id_pedido = $id_pedido";
	}
	$con->query($sql);
    echo 1;	
}
?>