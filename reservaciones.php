<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "sdmakeup";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$enlace) {
    echo "Error de conexión: " . mysqli_connect_error();
}

// Procesar el formulario cuando se hace el submit
if (isset($_POST['agendar'])) {
    // Captura los datos del formulario
    $Nombre_Completo = $_POST['Nombre_Completo'];
    $Correo_Electronico = $_POST['Correo_Electronico'];
    $Servicios = $_POST['Servicios'];
    $Fecha_de_cita = $_POST['Fecha_de_cita'];
    $Hora_de_cita = $_POST['Hora_de_cita'];
    $Mensaje = isset($_POST['Mensaje']) ? $_POST['Mensaje'] : '';

    // Insertar los datos en la base de datos
    $insertarDatos = "INSERT INTO citas_servicios(Nombre_Completo, Correo_Electronico, Servicios, Fecha_de_cita, Hora_de_cita, Mensaje) 
                      VALUES ('$Nombre_Completo', '$Correo_Electronico', '$Servicios', '$Fecha_de_cita', '$Hora_de_cita', '$Mensaje')";

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
        <form id="appointment-form" action="verCitas.php" method="POST">
            <div class="form-group">
                <label for="Nombre_Completo">Nombre Completo</label>
                <input type="text" id="Nombre_Completo" name="Nombre_Completo" required>
            </div>
            <div class="form-group">
                <label for="Correo_Electronico">Correo Electrónico</label>
                <input type="email" id="Correo_Electronico" name="Correo_Electronico" required>
            </div>
            <div class="form-group">
                <label for="Servicios">Servicio</label>
                <select id="Servicios" name="Servicios" required>
                    <option value="corte">Corte de cabello</option>
                    <option value="manicure">Manicura</option>
                    <option value="masajes">Masajes</option>
                    <option value="peinado">Peinado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="Fecha_de_cita">Fecha de la cita</label>
                <input type="date" id="Fecha_de_cita" name="Fecha_de_cita" required>
            </div>
            <div class="form-group">
                <label for="Hora_de_cita">Hora de la cita</label>
                <input type="time" id="Hora_de_cita" name="Hora_de_cita" required>
            </div>
            <div class="form-group">
                <label for="Mensaje">Mensaje (opcional)</label>
                <textarea id="Mensaje" name="Mensaje"></textarea>
            </div>
            <button type="submit" name="agendar">Agendar cita</button>
        </form>
    </div>
</body>
</html>
