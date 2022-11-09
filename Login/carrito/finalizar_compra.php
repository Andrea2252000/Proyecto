<?php
include_once "funciones.php";

if (isset($sql["finalizar_compra"])) {
    echo 'si entro';
    header("Location: ver_carrito.php");
} else {
    $pdo = new PDO('mysql:host=localhost;dbname=pruebas', 'root', '');
    $sql = "TRUNCATE TABLE `carrito_usuarios`";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    header("Location: catalogo.php");
}
