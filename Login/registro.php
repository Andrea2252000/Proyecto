<!DOCTYPE html>
<html>
<head>
<?php
 
include('config.php');
session_start();
 
if (isset($_POST['register'])) {
 
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_BCRYPT);
    $date = date('Y-m-d H:i:s');
 
    $query = $connection->prepare("SELECT * FROM users WHERE EMAIL=:email");
    $query->bindParam("email", $email, PDO::PARAM_STR);
    $query->execute();
 
    if ($query->rowCount() > 0) {
        echo '<p class="error">Este correo ya esta registrado!</p>';
    }
 
    if ($query->rowCount() == 0) {
        $query = $connection->prepare("INSERT INTO users (USERNAME,PASSWORD,EMAIL,FECHA_REGISTRO) 
                                        VALUES (:username,:password_hash,:email,:date)");
        $query->bindParam("username", $username, PDO::PARAM_STR);
        $query->bindParam("password_hash", $password_hash, PDO::PARAM_STR);
        $query->bindParam("email", $email, PDO::PARAM_STR);
        $query->bindParam("date",$date );
        $result = $query->execute();
 
        if ($result) {
            echo '<p class="success">Registrado Correctamente!</p>';
            
        } else {
            echo '<p class="error">Uno de los parametros esta mal registrado</p>';
        }
    }
}
 
?>

<style type="text/css">
        * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
 
body {
    background-image: url(C.jpg);
    margin: 50px auto;
    text-align: center;
    width: 800px;
}
 
h1 {
    font-family: 'Century Ghotic';
    font-size: 2rem;
    text-transform: Century Gothic;
}
 
label {
    width: 150px;
    display: inline-block;
    text-align: left;
    font-size: 1.5rem;
    font-family: 'Century Ghotic';
}
 
input {
    border: 2px solid #ccc;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Lato';
    padding: 10px;
}
 
form {
    margin: 25px auto;
    padding: 20px;
    border: 5px solid #00ffff;
    width: 500px;
    background: #7fffd4;
    opacity: .9;
}
 
div.form-element {
    margin: 20px 0;
}
 
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Century Ghotic';
    font-weight: 100;
    background: purple;
    color: white;
    border: none;
}
 
p.success,
p.error {
    color: white;
    font-family: Century Ghotic;
    background: blue;
    display: inline-block;
    padding: 2px 10px;
}
 
p.error {
    background: blue;
}

.background {
    background-size: cover; 
    background-position:fixed;
    background-attachment: fixed;
    background-repeat : no-repeat;
    opacity: .8;
    } 



</style>
        <title>Registro de usuario</title>
        <meta charset="UTF-8">
       
    </head>
    <body background="" class="background">
    
        <form method="post" action="" name="signup-form">

        <h1><b padding="10px">Registro de usuario</b></h1>

        <div class="form-element">
        
            <label>Nombre de usuario</label>
            <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
        </div>
        <div class="form-element">
            <label>Correo Eletronico</label>
            <input type="email" name="email" required />
        </div>
        <div class="form-element">
            <label>Contraseña</label>
            <input type="password" name="password" required />
        </div>
        <button type="submit" name="register" value="register">Registrar</button>
        <button onclick="location.href='logueo.php'">Regresar</button>
    </form>
    
    </body>
</html>