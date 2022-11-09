<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Hoja de pedido</title>
<style type="text/css">
	body {
		background:rgb(255,160,122);
		font: 10pt Verdana, Geneva, Arial, Helvetica, sans-serif;
		text-align : left;
	}
	#inputcarro {
		border:1px inset rgb(153,204,255);
		width: 40px;
		background:rgb(102,153,204);
		text-align : center;
	color=white;
	}
	#inputs {
		border:1px inset rgb(153,204,255);
		width: 280px;
		background:rgb(102,153,204);
		text-align : center;
		}
	#boton  {
		background: rgb(102,153,204) border:1px outset rgb(153,204,255);
		width:80px;
		font : 8pt Verdana, Geneva, Arial, Helvetica, sans-serif;
		background-color : #FFFACD;
		color : #4B0082;
	}
	div.marco {border:2px groove rgb(153,204,255);width: 750px;	padding:15px}
	div.marco2 {border:2px groove rgb(153,204,255);width: 700px;padding:15px}
	p.texto {letter-spacing: 3px;color:rgb(0,51,102);font-weight: bold}
	span.label {width:150px;vertical-align:top;color:white;
		float:left}
	div {margin-top:15px}
</style>

<script type="text/javascript">
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

function formatoeuros(input) {
    var euros = Math.floor(input)
    var tmp = new String(input)
    for (var decimalAt = 0; decimalAt < tmp.length; decimalAt++) {
       if (tmp.charAt(decimalAt)==".")
       break;
       }
  var centimos  = "" + Math.round(input * 100)
  centimos = centimos.substring(centimos.length-2, centimos.length)
  euros += ((tmp.charAt(decimalAt+2)=="9")&&(centimos=="00"))? 1 : 0;

  return euros + "." + centimos
}

function quitardelcarrito(RemOrder) {
   if (confirm("El producto seleccionado va a ser eliminado de su carro de la compra.\n Esta Vd. de acuerdo?")) {
   numerodeorden = getcookie("numerodeorden");
   for(i=RemOrder; i < numerodeorden; i++) {
       nuevopedido1 = "Order." + (i+1);
       nuevopedido2 = "Order." + (i);
       datos = getcookie(nuevopedido1);
       setcookie (nuevopedido2, datos, null, "/");
       }
       nuevopedido = "Order." + numerodeorden;
       setcookie ("numerodeorden", numerodeorden-1, null, "/");
       deletecookie(nuevopedido,"/");
       location.href=location.href;
    }
}

function visualizarcarrito() {
   numerodeorden = 0;
   subtotal=0;
   preciototal=0;
   numerodeorden = getcookie("numerodeorden");
   tablas = "";
   for (i = 1; i <= numerodeorden; i++) {
    nuevopedido = "Order." + i;
    datos = "";
    datos = getcookie(nuevopedido);
    ficha0 = datos.indexOf("|", 0);
    ficha1 = datos.indexOf("|", ficha0+1);
    ficha2 = datos.indexOf("|", ficha1+1);
    ficha3 = datos.indexOf("|", ficha2+1);

    campos = new Array;
    campos[0] = datos.substring( 0, ficha0 );
    campos[1] = datos.substring( ficha0+1, ficha1 );
    campos[2] = datos.substring( ficha1+1, ficha2 );
    campos[3] = datos.substring( ficha2+1, datos.lenght );
  
    subtotal = subtotal + (campos[3] * campos[0]);
    preciototal = formatoeuros(subtotal);
    tablas += "<tr style='font: 9pt; text-align: justify; color=white'><td>" + campos[1] + "</td><td  style='color=navy'>"
        + campos[2] + "</td><td>" + campos[3]
        + "  </td><td><input type=text id='inputcarro' size=2 name=\"Cantidad " + "\" value= \" "
        + campos[0] + "\"></td>"
        + "<td><a href=\"ver_carrito.php\"> <input type=button id=boton value=\"  Eliminar  \" onClick=\"quitardelcarrito("+i+")\"></a>"
        + "&nbsp;<input type=button id=boton value=\"  Catalogo  \" onClick=\"parent.history.back()\"></td>"
        + "<input type=hidden name=\"Nombre de prenda" + "\" value= \" " + campos[1] + "\">"
        + "<input type=hidden name=\"Talla de prenda" + "\" value= \" " + campos[2] + "\">"
        + "<input type=hidden name=\"Precio " + "\" value= \" " + campos[3] + "\">";
        }
   document.write(tablas);
   document.write("</td></tr><tr><td colspan=2 style='font: 9pt'>TOTAL CARRITO IVA INCLUIDO</td><td style='color: navy'>");
   document.write(preciototal);
}

function deletecookie(name, path, domain) {
  if (getcookie(name)) {
    document.cookie = name + "=" + 
    ((path) ? "; path=" + path : "") +
    ((domain) ? "; domain=" + domain : "") +
    "; expires=Thu, 01-Jan-70 00:00:01 GMT";
  }
}
</script>



</head>


<body>
<div><b>Carrito de Compra</b></div>
<form action="mailto:gabrieleslava2@gmail.com" method="post" enctype="text/plain" id="cesta">
<table width="1000" border="1" cellspacing="1" cellpadding="5" style="font: 10pt Verdana, Geneva, Arial, Helvetica, sans-serif;">
<tr style="font: bold">
<td width="50">Producto</td>
<td width="160">Descipcion</td>
<td width="100">Precio</td>

<td width="40">Ud</td>
<td width="160">Control </td></tr>
<tr><td>
<script type="text/javascript">
visualizarcarrito();
</script>
</td></tr>
</table>

<br />

<div align="center" class="marco2">
<input type="submit" value="Enviar" id="boton" />
</div>
</form>

<br>
            <form action="generar_ticket.php" method="post">
            &nbsp;&nbsp;&nbsp;
                    <input type="hidden" name="generar_ticket">
                    <button class="btn btn-default">
                        Descargar Comprobante
                    </button>
            </form>
<br>

</body>
</html>
