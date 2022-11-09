<html>
<head>
<meta charset="utf-8">
<title>Borrar</title>
</head>

<body>

<?php

include("conexion.php");

$Id=$_GET["Id"];

$base->query("DELETE FROM DATOS_USUARIOS WHERE ID='$Id'");
$base->query("DELETE FROM datos WHERE id_prin='$Id'");

header("Location:../pagina_principal.php");

?>
</body>
</html>