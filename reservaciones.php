<?php
    // Conexión a la base de datos
    $host = 'localhost';  // Cambia esto por tu host si es diferente
    $user = 'root';  // Cambia esto por tu usuario de la base de datos
    $password = '';  // Cambia esto por tu contraseña de la base de datos
    $dbname = 'sdmakeup';  // Cambia esto por el nombre de tu base de datos

    // Crear la conexión
    $conn = new mysqli($host, $user, $password, $dbname);
    

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Procesar los datos del formulario
    if (isset($_POST['submit'])) {
        // Recoger los datos del formulario
        $name = $_POST['name'];
        $email = $_POST['email'];
        $service = $_POST['service'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $message = isset($_POST['message']) ? $_POST['message'] : '';

        // Insertar los datos en la base de datos
        $query = "INSERT INTO citas_servicios(name, email, service, date, time, message) 
                  VALUES ('$name', '$email', '$service', '$date', '$time', '$message')";

        if ($conn->query($query) === TRUE) {
            echo "<script>document.getElementById('response-message').innerHTML = '<p class=\"success-message\">¡Cita agendada exitosamente!</p>';</script>";
        } else {
            echo "<script>document.getElementById('response-message').innerHTML = '<p class=\"error-message\">Hubo un error al agendar la cita. Intenta nuevamente.</p>';</script>";
        }
    }

    // Cerrar la conexión
    $conn->close();
    ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Citas - Estética</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image:url(../proyecto-final_solennydeleon/imagen/cesta.jpg);
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
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group textarea {
            height: 100px;
            resize: none;
        }
        .success-message {
            margin-top: 20px;
            color: green;
            text-align: center;
        }
        .error-message {
            margin-top: 20px;
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Agendar Cita</h1>
        <form id="appointment-form">
            <div class="form-group">
                <label for="name">Nombre Completo</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="service">Servicio</label>
                <select id="service" name="service" required>
                    <option value="corte">Corte de cabello</option>
                    <option value="manicure">Manicura</option>
                    <option value="masajes">Masajes</option>
                    <option value="peinado">Peinado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Fecha de la cita</label>
                <input type="date" id="date" name="date" required>
            </div>
            <div class="form-group">
                <label for="time">Hora de la cita</label>
                <input type="time" id="time" name="time" required>
            </div>
            <div class="form-group">
                <label for="message">Mensaje (opcional)</label>
                <textarea id="message" name="message"></textarea>
            </div>
            <button type="submit">Agendar cita</button>
        </form>
        <div id="response-message"></div>
    </div>

   
</body>
</html>
