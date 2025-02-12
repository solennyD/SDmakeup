<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<header>
<a href="./index.html">
    <img src="imagen/Grupo 1@2x.png">
    </a>
</header>

<body>
    
   <form action="validar.php" method="post">
   <h1 class="animate__animated animate__backInLeft">Iniciar Sección</h1>
   <p>Usuario <input type="text" placeholder="usuario" name="usuario"></p>
   <br>
   <p>Contraseña <input type="password" placeholder="Contraseña" name="password"></p>
   <input type="submit" value="Ingresar">
   <br>
   <br>

   <a style=" text-decoration:none" href="./formulario.php">
              <div style="color: white">¿Aún no tienes cuenta?</div>
            </a>
   
   </form> 
</body>
</html>