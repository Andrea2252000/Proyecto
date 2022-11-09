<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Actualizar</title>

</head>

<body>

<h1>ACTUALIZAR</h1>

 <?php
 
 include("conexion.php");
 
 if(!isset($_POST["bot_actualizar"])){
 
 $Id=$_GET["Id"];
 
  $pro=$_GET["pro"];

   $pre=$_GET["pre"];

    $can=$_GET["can"];
      
      $des=$_GET["des"];
       
        $sto=$_GET["sto"];

 }else{
	 $Id=$_POST["id"];
	 
	 $pro=$_POST["pro"];
	 
	 $pre=$_POST["pre"];
	 
	 $can=$_POST["can"];
       
       $des=$_POST["des"];

       $sto=$_POST["sto"];

       $ima=$_POST["ima"];	 

	 $sql="UPDATE DATOS_USUARIOS SET Producto=:miPro, Precio=:miPre, Cantidad=:miCan, Descripción=:miDes, Stock=:miSto  WHERE Id=:miId";
	 
	 $resultado=$base->prepare($sql);
	 
	 $resultado->execute(array(":miId"=>$Id, ":miPro"=>$pro, ":miPre"=>$pre, ":miCan"=>$can, ":miDes"=>$des, ":miSto"=>$sto));
	 
	 header("Location:../pagina_principal.php");
	 
 }
	
?>

<p>
 
</p>
<p>&nbsp;</p>
<form name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <table width="25%" border="0" align="center">
    <tr>
      <td></td>
      <td><label for="id"></label>
      <input type="hidden" name="id" id="id" value="<?php echo $Id?>></td>
    </tr>
    <tr>
      <td>Producto</td>
      <td><label for="pro"></label>
      <input type="text" name="pro" id="pro" value="<?php echo $pro?>"></td>
    </tr>
    <tr>
      <td>Precio</td>
      <td><label for="pre"></label>
      <input type="text" name="pre" id="pre"  value="<?php echo $pre?>"></td>
    </tr>
    <tr>
      <td>Cantidad</td>
      <td><label for="can"></label>
      <input type="text" name="can" id="can"  value="<?php echo $can?>"></td>
    </tr>
    <tr>
      <td>Descripción</td>
      <td><label for="des"></label>
      <input type="text" name="des" id="des"  value="<?php echo $des?>"></td>
    </tr>
    <tr>
      <td>Stock</td>
      <td><label for="sto"></label>
      <input type="text" name="sto" id="sto"  value="<?php echo $sto?>"></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>


