<?php
session_start();

//evita que se el navegador me guarde cachet
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
//header("Expires: 0");  // Fecha en el pasado

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mediccare";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
   // $cedula = $_POST['cedula'];
    $puesto = $_POST['puesto'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $correo_electronico = $_POST['correo'];
    $contrasena = $_POST['contrasena']; 
  

    // Actualizar los datos en la base de datos
    $sql = "UPDATE administrador SET nombre='$nombre', apellido='$apellido', puesto='$puesto' /*, cedula='$cedula'*/, fecha_nacimiento='$fecha_nacimiento', Correo_Electronico='$correo_electronico', contrasena='$contrasena' WHERE cedula='$cedula'";


    if ($conn->query($sql) === TRUE) {
        echo "¡Perfil actualizado correctamente!";
    } else {
        echo "Error al actualizar el perfil: " . $conn->error;
    }
} else {
    // Obtener los datos del usuario de la base de datos
    $sql = "SELECT * FROM administrador WHERE cedula='$cedula'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nombre = $row["Nombre"];
        $apellido = $row["Apellido"];
       // $cedula = $row["Cedula"];
        $puesto = $row["Puesto"];
        $fecha_nacimiento = $row["Fecha_Nacimiento"];
        $correo_electronico = $row["Correo_Electronico"];
        $contrasena = $row["Contrasena"];
        
    }else{
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
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .form-group {
        margin-bottom: 20px;
        width: 100%; /* Asegura que las agrupaciones de campos tomen el 100% del ancho */
    }

    .form-group textarea {
        height: 100px;
        resize: none;
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
</body>

</html>

<!--<!DOCTYPE html>
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
    
-->  


