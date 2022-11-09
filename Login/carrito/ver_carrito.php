<?php include_once "encabezado.php" ?>
<?php
include_once "funciones.php";
$productos = obtenerProductosEnCarrito();
if (count($productos) <= 0) {
?>
    <section class="hero is-info">
        <div class="hero-body">
            <div class="container">
                <img src="../img/error.png" width="256" height="200" />
                <h1 class="title">
                    Todavía no hay productos
                </h1>
                <h2 class="subtitle">
                    Visita la tienda para agregar productos a tu carrito
                </h2>
                <h4><a href="catalogo.php" class="button is-warning"><strong>Ver tienda</strong></a></h4>
            </div>
        </div>
    </section>
<?php } else { ?>

    
    <div class="columns">
        <div class="column">
            <h2 class="is-size-2">Mi carrito de compras</h2>
            <table class="table">
                <thead>
                    <tr>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <th>Producto</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <th>Precio</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <th>Descripcion</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <th>Imagen</td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <th>Quitar</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $total = 0;
                    foreach ($productos as $producto) {
                        $total += $producto->Precio;
                    ?>
                        <tr>
                            <td><?php echo $producto->Producto ?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <td><?php echo $producto->Precio?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <td><?php echo $producto->Descripción?></td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <td><?php 
                        // Include the database configuration file  
                        require_once '../ej-insert/dbConfig.php'; 
                        
                        // Get image data from database 
                        $result = $db->query("SELECT Imagen FROM datos where id_prin = $producto->Id"); 
                        ?>

                        <?php if($result->num_rows > 0){ ?> 
                            <div class="gallery"> 
                                <?php while($row = $result->fetch_assoc()){ ?> 
                                    <img src="data:Imagen/jpg;charset=utf8;base64,<?php echo base64_encode($row['Imagen']); ?>" /> 
                                <?php } ?> 
                            </div> 
                            <br>
                                </td>
                            <td>$<?php echo number_format($producto->Precio, 2) ?></td>
                           
                        <?php } ?>

                            <td>
                                <form action="eliminar_del_carrito.php" method="post">
                                    <input type="hidden" name="id_producto" value="<?php echo $producto->Id ?>">
                                    <input type="hidden" name="redireccionar_carrito">
                                    <button class="button is-danger">
                                        <i class="fa fa-trash-o normal-txt-color">Quitar Producto</i>
                                    </button>
                                </form>
                            </td>
                            
                        <?php } ?>
                        </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2" class="is-size-4 has-text-right"><strong>Total</strong></td>
                        <td colspan="2" class="is-size-4">
                            $<?php echo number_format($total, 2) ?>
                        </td>
                    </tr>
                </tfoot>
            </table>
           
        </div>
    </div>
<?php } ?>
<br><br><br><br>
