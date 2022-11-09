<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Carrito de la compra DEMO</title>
<style type="text/css">
	body {
		background:rgb(240,128,128);
		font: 10pt Verdana, Geneva, Arial, Helvetica, sans-serif;
	}
	#inputs {
		border:1px inset rgb(153,204,255);
		width: 40px;
		background:rgb(148,204,252);
		text-align : center;
	}
	#boton  {
		background: rgb(102,153,204) border:1px outset rgb(153,204,255);
		width:80px;
		font : 8pt Verdana, Geneva, Arial, Helvetica, sans-serif;
		background-color : #FFFACD;
		color : #4B0082;
	}

</style>


<script type="text/javascript">
function meterencarro(formu) {
unidades=formu.numpedido.value;
descripcion=formu.Producto.value;
if (confirm("El siguiente producto se va a añadir al carro de la compra.\n\n " + descripcion + " \n\n ¿Esta de acuerdo?")) {
numeroregistro = 0;  
numeroregistro = getcookie("numerodeorden");
numeroregistro++;
if ( numeroregistro > 5 )
     alert("ATENCION\nSu carrito esta lleno.\nPor favor, acceda a la hoja de pedido.\nGracias.");
else {
actualizarbase = formu.numpedido.value + "|"  + formu.Producto.value  + "|" + formu.Descripcion.value + "|" + formu.Precio.value;

nuevopedido = "Order." + numeroregistro;
setcookie (nuevopedido, actualizarbase, null, "/");
setcookie ("numerodeorden", numeroregistro, null, "/");

aviso = "PRODUCTO SELECCIONADO\n\n" + "Cantidad: " + unidades + " unidad/es.\n"
+ "Producto: \n" + descripcion + ".\n\nPulse sobre Ver Carro para acceder\na su lista de compra.\nGracias";
alert(aviso);
}
}
}

function getcookieval (offset) {
  var endstr = document.cookie.indexOf (";", offset);
  if (endstr == -1)
  endstr = document.cookie.length;
  return unescape(document.cookie.substring(offset, endstr));
}

function getcookie (name) {
   var arg = name + "=";
   var alen = arg.length;
   var clen = document.cookie.length;
   var i = 0;
   while (i < clen)
        {
        var j = i + alen;
        if (document.cookie.substring(i, j) == arg) return getcookieval (j);
        i = document.cookie.indexOf(" ", i) + 1;
        if (i == 0) break;
        }
   return null;
}

function setcookie (name,value,expires,path,domain,secure) {
   document.cookie = name + "=" + escape (value) +
      ((expires) ? "; expires=" + expires.toGMTString() : "") +
      ((path) ? "; path=" + path : "") +
      ((domain) ? "; domain=" + domain : "") +
      ((secure) ? "; secure" : "");
}
</script>

</head>

<body>
<center><p><strong>BODEGA CERVECERA</strong><br />
</p>

<?php
          include("envio-carrito/conexion.php");
          $registros=$base->query("SELECT * FROM datos_usuarios")->fetchAll(PDO::FETCH_OBJ);
          ?>

<table width="900" border="1" cellspacing="1" cellpadding="5" style="font: 10pt Verdana, Geneva, Arial, Helvetica, sans-serif;">
<tbody>
<tr >
                <td class="primera_fila">Producto</td>
                <td class="primera_fila">Precio</td>
                <td class="primera_fila">Descripcion</td>
		    <td class="primera_fila">Imagen</td>

			
              </tr> 

<tr>
              <?php foreach ($registros as $producto) : ?>
            
              <tr>
                <td><?php echo $producto->Producto?></td>
                <td>$<?php echo $producto->Precio?></td>
                <td> <?php echo $producto->Descripción?></td>
           
		   <td>
		   <?php 
                        // Include the database configuration file  
                        require_once '../ej-insert/dbConfig.php'; 
                        
                        // Get image data from database 
                        $result = $db->query("SELECT Imagen FROM datos where id_prin = $producto->Id"); 
                        ?>

                        <?php if($result->num_rows > 0){ ?> 
                            <div class="gallery"> 
							
                                <?php while($row = $result->fetch_assoc()){ ?> 
								
                                    <img width="100" height="150" src="data:Imagen/jpg;charset=utf8;base64,<?php echo base64_encode($row['Imagen']); ?>" /> 
                                <?php } ?> 
								
                            </div> <br>

                        <?php }else{ ?> 
                           
                        <?php } ?>
</td>


                <td class="bot"><form action="agregar_al_carrito.php" method="post" name="order" id="order">

                      <input type="hidden" name="id_producto" value="<?php echo $producto->Id ?>">
                            <button class="button is-primary normal-txt-color">
                                <i class="fa fa-cart-plus"></i>&nbsp;Confirmar producto
                            </button>

                    <input onclick="meterencarro(this.form)" type="button" id="boton" value="Adquirir" /><br />
                    <input maxlength="2" id="inputs" size="2" value="1" name="numpedido" /><br />
                    <a href="pedido.php"><img src="imagenes/varcarro.jpg" width="79" height="23" border="0" alt="" /></a><br />
                    <input type="hidden" value="<?php echo $producto->Producto?>" name="Producto" />
                    <input type="hidden" value="<?php echo $producto->Descripción?>" name="Descripcion" /> 
                    <input type="hidden" value="<?php echo $producto->Precio?>" name="Precio" />
                    
                  
                   </center>
                    </form></td>
                              
              </tr>   
          <?php
          endforeach;
          ?>

              </tr>  

</tbody></table>
               <td class='bot'><a href="grafica/grafica.php"><input type='button' name='up' id='up' value ="Grafica"></a></td></tr>
</body>
</html>
