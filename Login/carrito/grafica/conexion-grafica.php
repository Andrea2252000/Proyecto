<?php
header('Content-Type: application/json');

$conn = mysqli_connect("localhost","root","","pruebas");

$sqlQuery = "SELECT Producto, Precio FROM datos_usuarios";

$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>