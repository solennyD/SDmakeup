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
            echo '<h1 id="success-message" style="position: fixed; top: 0; left: 50%; transform: translateX(-50%); background-color: rgba(0, 128, 0, 0.7); color: white; padding: 10px 20px; border-radius: 5px; z-index: 1000; text-align: center;">
              Registro exitoso!
            </h1>
            <script>
              // Desaparece el mensaje después de 2 segundos
              setTimeout(function() {
                const message = document.getElementById("success-message");
                if (message) {
                  message.style.transition = "opacity 0.4s ease";
                  message.style.opacity = "0";
                  setTimeout(() => message.remove(), 500); // Elimina completamente el elemento después de la animación
                }
              }, 2000);
            </script>
            ';
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

  <a style="color: darkgreen; text-decoration:none"href="./login.php">
              <div>¿Ya tienes cuenta con SD-makeup?</div>
            </a>

            
        
    </form>
</body>
</html>
