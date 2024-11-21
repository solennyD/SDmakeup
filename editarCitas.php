<?php

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sdmakeup";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $servicio = $_POST['servicio'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

    // Actualizar los datos en la base de datos
    $sql = "UPDATE citas SET Nombre='$nombre', Apellidos='$apellidos', Email='$email', Servicio='$servicio', Fecha='$fecha', Hora='$hora' WHERE ID='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "¡Perfil actualizado correctamente!";
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
} else {
    // Obtener los datos del usuario de la base de datos
    $sql = "SELECT * FROM citas WHERE ID='$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["Nombre"];
        $apellidos = $row["Apellidos"];
        $email = $row["Email"];
        $servicio = $row["Servicio"];
        $fecha = $row["Fecha"];
        $hora = $row["Hora"];
    } else {
        echo "No se encontró el usuario";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil - MedicCare</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            margin-top: 50px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Editar citas</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="Nombre">Nombre:</label>
            <input type="text" id="Nombre" name="Nombre" value="<?php echo $nombre; ?>">
            <label for="Apellidos">Apellido:</label>
            <input type="text" id="Apellidos" name="Apellidos" value="<?php echo $apellidos; ?>">
            <label for="Email">Correo Electronico:</label>
            <input type="Email" id="Email" name="Email" value="<?php echo $email; ?>">
            <label for="Servicio">Servicio:</label>
            <input type="text" id="Servicio" name="Servicio" value="<?php echo $servicio; ?>">
            <label for="fecha">Fecha de la cita</label>
            <input type="date" id="Fecha" name="Fecha" value="<?php echo $fecha; ?>">
            <label for="Hora">Hora de la cita</label>
            <input type="time" id="Hora" name="Hora" value="<?php echo $hora; ?>">
            <input type="submit" value="Actualizar ">
        </form>
    </div>


</html>
