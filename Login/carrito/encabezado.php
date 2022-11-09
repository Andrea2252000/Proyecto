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

<body style="background-image:url('../img/fondos/<?php echo rand(1, 7); ?>.png'" class="fondo">
    
    <script src="../../js/jquery-3.5.1-jquery.min.js"></script>
    <script src="../../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../../js/4.3.1/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel='stylesheet prefetch' href='../../css/3.2.0/bootstrap.min.css'>

    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark" aria-label="Main navigation">
          <div class="container-fluid">
          <a class="navbar-brand" href="../pagina_principal.php">Productos</a>
            <a class="navbar-brand" href="catalogo.php">Tienda</a>
            <div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div>
            
            <div class="navbar-end">
                <div class="navbar-brand">
                    <div class="buttons">
                        <a href="pedido.php" class="button is-success">
                            <strong>Ver carrito</strong>
                        </a>
                    </div>
                </div>
            </div>
            

          </div>
        </nav>
        <br>

    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", () => {
            const boton = document.querySelector(".navbar-burger");
            const menu = document.querySelector(".navbar-menu");
            boton.onclick = () => {
                menu.classList.toggle("is-active");
                boton.classList.toggle("is-active");
            };
        });
    </script>
    <section class="section">