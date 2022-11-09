<?php  
$Id=$_GET["Id"];?>

<style>
    .s-centrado{
        padding-left: 200px;
        border: 1px solid white;
    }
</style>

<div class="s-centrado">
<form action="ej-insert/update-img.php?Id=<?php echo $Id?>" method="post" enctype="multipart/form-data">
    <label>Selecciona una imagen:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>
</div>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="pagina_principal.php"><input type='button' name='reg' id='reg' value='Regresar'></a>


