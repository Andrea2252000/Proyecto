<?php
session_start();
include('funciones.php'); 
?>
<html>
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Inicio de Sesión</title>

</head>

   
    <script src="../js/jquery-3.5.1-jquery.min.js"></script>
    <script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/4.3.1/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='../css/3.2.0/bootstrap.min.css'>
    <script src="js/carousel-slider.js"></script>

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
           <div class="container-fluid">
            <b class="navbar-brand">Bienvenido!<?php //echo $_POST['user_id'];?></b> 
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            <a class="navbar-brand" href="logout.php" >Cerrar Sesión</a>
            <button class="navbar-toggler p-0 border-0" type="button" id="navbarSideCollapse" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

          </div>
        </nav>
        <br>


<body> 

<?php
include("crud/conexion.php");

/*$conexion=$base–>query("SELECT * FROM DATOS_USUARIOS");
$registros=$conexion–>fetchAll(PDO::FETCH_OBJ);*/

$registros=$base->query("SELECT * FROM DATOS_USUARIOS")->fetchAll(PDO::FETCH_OBJ);

if(isset($_POST["cr"])){
	
	$producto=$_POST["Pro"];
	
	$precio=$_POST["Pre"];
      
      $cantidad=$_POST["Can"];

      $descripción=$_POST["Des"];

      $stock=$_POST["Sto"];
      
   
	
	$sql="INSERT INTO DATOS_USUARIOS (PRODUCTO, PRECIO, CANTIDAD, DESCRIPCIóN, STOCK) VALUES(:pro, :pre, :can, :des, :sto)";
	
	$resultado=$base->prepare($sql);
	
	$resultado->execute(array(":pro"=>$producto, ":pre"=>$precio, "can"=>$cantidad, ":des"=>$descripción, ":sto"=>$stock ));
	
	header("Location:pagina_principal.php");
	
}

?>

<h1>Bodega Cervecera<span class="subtitulo"></span></h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
  <table width="50%" border="0" align="center">
    <tr >
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Producto</td>
      <td class="primera_fila">Precio</td>
      <td class="primera_fila">Cantidad</td>
      <td class="primera_fila">Descripción</td>
      <td class="primera_fila">Stock</td>
      <td class="primera_fila">Imagen</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr> 
   
   
  <?php

foreach($registros as $producto):?>
   
   	<tr>
      <td><?php echo $producto->Id?></td>
      <td><?php echo $producto->Producto?></td>
      <td><?php echo $producto->Precio?></td>
      <td><?php echo $producto->Cantidad?></td>
      <td><?php echo $producto->Descripción?></td>
      <td><?php echo $producto->Stock?></td>

      <td><?php 
                        // Include the database configuration file  
                        require_once 'ej-insert/dbConfig.php'; 
                        
                        // Get image data from database 
                        $result = $db->query("SELECT Imagen FROM datos where id_prin = $producto->Id"); 
                        ?>

                        <?php if($result->num_rows > 0){ ?> 
                            <div class="gallery"> 
                                <?php while($row = $result->fetch_assoc()){ ?> 
                                    <img src="data:Imagen/jpg;charset=utf8;base64,<?php echo base64_encode($row['Imagen']); ?>" /> 
                                <?php } ?> 
                            </div>
                           <br><a href="change-img.php?Id=<?php echo $producto->Id?>">
                            <input type='button' name='add' id='add' value='Cambiar Imagen'></a> 
                        <?php }else{ ?> 
                            <a href="insert.php?Id=<?php echo $producto->Id?>">
                            <input type='button' name='add' id='add' value='Agregar Imagen'></a>
                        <?php } ?></td>

 
      <td class="bot"><a href="javascript:borrar_todo('crud/borrar.php?Id=<?php echo $producto->Id?>')"><input type='button' name='del' id='del' value='Borrar'></a></td>
      <td class='bot'><a href="javascript:editar_todo('crud/editar.php?Id=<?php echo $producto->Id?> & pro=<?php echo $producto->Producto?> & pre=<?php echo $producto->Precio?>
       & can=<?php echo $producto->Cantidad?> & des=<?php echo $producto->Descripción?> & sto=<?php echo $producto->Stock?>')">
       <input type='button' name='up' id='up' value='Actualizar'></a></td>
    
      </tr>  

 <?php
endforeach;
?>

	<tr>
	<td></td>
      <td><input type='text' name='Pro' size='10' class='centrado'></td>
      <td><input type='text' name='Pre' size='10' class='centrado'></td>
      <td><input type='text' name='Can' size='10' class='centrado'></td>
      <td><input type='text' name='Des' size='10' class='centrado'></td>
      <td><input type='text' name='Sto' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td></tr>
      <td class='bot'><a href="carrito/catalogo.php"><input type='button' name='up' id='up' value ="Carrito"></a></td></tr>
    
  </table>
</form>
<p>&nbsp;</p>
</body>     
</html>


</script>

<style type="text/css">

h1{
text-align:center;
font-family: Century Ghotic;
font size: 3em;
color: Purple;

}

.subtitulo{
	font-size:12px;
}

body{
	background-image: url(de.jpg);
      font-family:Century Ghotic;
      text-align:center;
       widht:"100" height="100";
}

body#logueo{
	background-image: url(C.jpg);
      font-family:Century Ghotic;
      text-align:center;
       widht:"100" height="100";
}

table td{
      background-color:mediumaquamarine;
	text-align:center;
	border-collapse: collapse;
      widht:100%;

}

img{
        width:150%;
        height:150%;
        object-fit: cover;
}

</style>