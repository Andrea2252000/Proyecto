<?php  
$Id=$_GET["Id"];?>

<form action="ej-insert/upload.php?Id=<?php echo $Id?>" method="post" enctype="multipart/form-data">
    <label>Select Image File:</label>
    <input type="file" name="image">
    <input type="submit" name="submit" value="Upload">
</form>



