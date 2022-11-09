<?php
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
?>


<!--Header-->
<!DOCTYPE html>
<html lang="es">

<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../../css/4.3.1/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Carrito de compras</title>

</head>


<style type="text/css">
    .fondo {
    background-repeat : no-repeat;
    background-position : center;
    background-attachment : fixed;
    background-size: cover;
    } 
    .fix_img {
        width: 60%;
        height: 300px;
      }
      img {
        width: 30%;
        height: 30%;
        object-fit: cover;
      }
      .only-color{
        color:white;
    }
    .normal-txt-color{
        color:black;
    }
  </style>

<body background="../img/fondos/3.png" class="fondo">
    
    <script src="../../js/jquery-3.5.1-jquery.min.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../../js/4.3.1/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel='stylesheet prefetch' href='../../css/3.2.0/bootstrap.min.css'>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
          <div class="container-fluid">
          <a class="navbar-brand" href="../pagina_principal.php">Productos</a>
            <a class="navbar-brand" href="tienda.php">Tienda</a>
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            
          </div>
        </nav>
        <br>
<!-- Fin del Header-->
<!------------------------------------------------------------------------------------------------------------->
<!------------------------------------------------------------------------------------------------------------->
<!--Contenido-->
<div class="container">
          <div class="table-wrapper">
            <table class="table table-bordered" >
              <tr >
                <td class="primera_fila">Producto</td>
                <td class="primera_fila">Precio</td>
                <td class="primera_fila">Descripcion</td>

              </tr> 

              <?php foreach ($productos as $producto) { ?>
            
              <tr>
                <td><?php echo $producto->Producto?></td>
                <td>$ <?php echo $producto->Precio?></td>
                <td><?php echo $producto->Descripción?></td>
              
              </tr>  
         
              <?php } ?>
            </table>
            </div>
            
            <?php include("../funciones.php"); ?>
            &nbsp;&nbsp;&nbsp;
            <a href="javascript:enviar_correo('finalizar_compra.php')">
                    <input type="hidden" name="finalizar_compra">
                    <button class="btn btn-default">
                        Terminar compra
                    </button>
              </a>
                <br>
<br>
            <form action="generar_ticket.php" method="post">
            &nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="generar_ticket">
                    <button class="btn btn-default">
                        Descargar Comprobante
                    </button>
            </form>
<br>
        </div>

<?php include_once "../footer.php" ?>