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
    if (isset($_POST['agendar'])) {
        // Captura los datos del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $servicio = $_POST['servicio'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        // Insertar los datos en la bd
        $insertarDatos = "INSERT INTO citas ( nombre, apellidos, email, servicio, fecha, hora)
                          VALUES ('$nombre', '$apellidos', '$email', '$servicio', '$fecha', '$hora')";

        $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

        if (!$ejecutarInsertar) {
            echo "Error en la consulta SQL: " . mysqli_error($enlace);
        } else {
            echo "<h4>Registro exitoso!</h4>";
        }
    }
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/style.css"> -->
    <title>Formulario de Citas - Estética</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(../proyecto-final_solennydeleon/imagen/cesta.jpg);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: rgba(203, 202, 202, 0.444);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        border: 2px solid #d4af37;
        display: flex;
        flex-direction: column;
        align-items: center; /* Centra los elementos dentro del contenedor */
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        color: #333;
        margin-bottom: 5px;
        display: block;
        text-align: left;
        width: 100%;
        
    }

    input, select, textarea {
        width: 70%; /* Aumenté el ancho al 80% para que se vean mejor centrados */
        padding: 10px;
        margin: 10px 0 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
       
    }

    button {
        background-color: darkgoldenrod;
        color: white;
        padding: 12px 100px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-left: 20%;
        position:relative;
    }

    button:hover {
        background-color: green;
    }

    .form-group {
        margin-bottom: 20px;
        width: 100%; /* Asegura que las agrupaciones de campos tomen el 100% del ancho */
    }

    .form-group textarea {
        height: 100px;
        resize: none;
    }

    .cita-button{
        background-color: #007bff;
        color: white;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
        margin: 3%;
        }
        .regre{
        background-color: darkgoldenrod;
        padding: 5px 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
        margin-left: 5px;
        }
        a{
        color: white; /* Cambia el color del texto a blanco */
        text-decoration: none; /* Quita el subrayado */
        }
        a:hover {
       text-decoration: underline; /* Opcional: Agrega subrayado al pasar el mouse */
       }

</style>

   
</head>
<body>
   
    <div class="container">
        <h1>Agendar Cita</h1>
        

        <form action="" method="POST" style="width: 800px; margin: auto;">
                <div class="form-group"> 
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
                <div class="form-group"> 
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos" required>
            </div>
                <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
                <div class="form-group"> 
                <label for="servicio">Servicio</label>
                <select id="servicio" name="servicio" required>
                    <option value="corte">Depilacion Laser</option>
                    <option value="manicure">Tintado de cejas</option>
                    <option value="masajes">Postura de uñas</option>
                    <option value="peinado">Masajes corporales</option>
                    <option value="peinado">Maquillaje para cada ocasión</option>
                    <option value="peinado">Trenzas</option>
                    <option value="peinado">Depilación con cera</option>
                    <option value="peinado">Micropigmentación de labios</option>
                    <option value="peinado">Botox</option>
                </select>
            </div>
                <div class="form-group">
                <label for="fecha">Fecha de la cita</label>
                <input type="date" id="fecha" name="fecha" required>
            </div>
                <div class="form-group">
                <label for="hora">Hora de la cita</label>
                <input type="time" id="hora" name="hora" required>
            </div>
           
            <button type="submit" name="agendar">AGENDAR CITA</button><br>
            <button class="cita-button"><a href="./verCitas.php">Citas</a></button>
            <button class="regre"> <a href="./index.html">Regresar</a></button>
        </form>
    </div>
</body>
</html>
