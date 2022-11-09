<!DOCTYPE html>
<html>
<head>
<?php
 
 include('config.php');
 session_start();
  
 if (isset($_POST['login'])) {
  
     $username = $_POST['username'];
     $password = $_POST['password'];
  
     $query = $connection->prepare("SELECT * FROM users WHERE USERNAME=:username");
     $query->bindParam("username", $username, PDO::PARAM_STR);
     $query->execute();
  
     $result = $query->fetch(PDO::FETCH_ASSOC);

     
  
     if (!$result) {
         echo '<p class="error">El usuario no existe o esta mal escrito</p>';

          
         
     } else {
         if (password_verify($password, $result['password'])) {
             $_SESSION['user_id'] = $result['id'];

            

             echo '<p class="success">Login con exito!</p>';
             header('Location: pagina_principal.php');
                      
         } else {

           

             echo '<p class="error">La contraseña esta mal escrita</p>';
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
    background-image: url(col.jpg);
    margin: 200px auto;
    text-align: center;
    width: 800px;
}
 
h1 {
    font-family: 'Century Ghotic';
    font-size: 1.5rem;
    text-transform: Century Ghotic;
    
}

label {
    width: 100px;
    display: inline-block;
    text-align: center;
    font-size: 1.2rem;
    font-family: 'Century Ghotic';
}
 
input {
    border: 2px solid #8a2be2;
    font-size: 1.5rem;
    font-weight: 100;
    font-family: 'Century Ghotic';
    padding: 3px;
}
 
form {
    margin: 15px auto;
    padding: 10px;
    border: 2px solid #8a2be2;
    width: 500px;
    background: #00ced1;
}
 
div.form-element {
    margin: 20px 0;
}
 
button {
    padding: 10px;
    font-size: 1.5rem;
    font-family: 'Lato';
    font-weight: 100;
    background: #9400d3;
    color: white;
    border: none;
}
 
p.success,
p.error {
    color: white;
    font-family: lato;
    background: lightseagreen;
    display: inline-block;
    padding: 2px 10px;
}
 
p.error {
    background: ;
}

.background {
    background-size: cover; 
    background-position:fixed;
    background-attachment: fixed;
    background-repeat : no-repeat;
    opacity: .8;
    } 

    .branding {
    opacity: 1;
    color: red;
}


    </style>
        <title>Pagina de Inicio de Sesión</title>
        <meta charset="UTF-8">
    </head>
    <body background="" class="background">

    <form method="post" action="" name="signin-form">
    <h1><b padding="10px" >Inicio de Sesion</b></h1>

    <div class="form-element">
        <label>Nombre de usuario</label>
        <input type="text" name="username" pattern="[a-zA-Z0-9]+" required />
    </div>
    <div class="form-element">
        <label>Contraseña</label>
        <input type="password" name="password" required />
    </div>
    <button type="submit" name="login" value="login">Ingresar</button>
    <button onclick="location.href='registro.php'">Registro</button>
</form>
 </body>
</html>