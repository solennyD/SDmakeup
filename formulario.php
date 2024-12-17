<?php 
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDatos = "sdmakeup";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

    if (!$enlace) {
        echo "Error de conexión: " . mysqli_connect_error();
    }

    // Procesar el formulario
    if (isset($_POST['registrarse'])) {
        // Captura los datos del formulario
        $usuario = $_POST['usuario'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Cifrar la contraseña antes de guardarla
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insertar los datos en la base de datos con la contraseña cifrada
        $insertarDatos = "INSERT INTO user (usuario, email, password)
                          VALUES ('$usuario', '$email', '$hashed_password')";

        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

        if (!$ejecutarInsertar) {
            echo "Error en la consulta SQL: " . mysqli_error($enlace);
        } else {
            echo "<h1>Registro exitoso!</h1>";
        }
    }
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
    <title>proyectofinal</title>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
    <header>
    <a href="./index.html">
    <img src="imagen/Grupo 1@2x.png">
    </a>

    </header>

    <br>
    <br>

    <form action="" method="POST" style="width: 800px; margin: auto;">
        <h1>Crear una cuenta</h1>
        
        <div>
    <label for="usuario">Nombre:</label>
    <input type="text" id="usuario" name="usuario" required>
  </div>

  <div>
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
  </div>

  <div>
   <label for="password">Contraseña:</label>
   <input type="password" id="password" name="password" required>

  </div>
  <br>
  <br>


  <div>
    <button type="submit" name="registrarse">Registrarse</button>
    <button type="reset">Limpiar</button>
  </div>
  <br>
  <br>

  <a class="" href="./login.php">
              <div>¿Ya tienes cuenta con SDmakeup?</div>
            </a>
    </form>
</body>
</html>
