<?php
// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "sdmakeup";

// Establecer conexión
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Función para eliminar cita
if (isset($_GET['eliminar'])) {
    $idCita = $_GET['eliminar'];
    $eliminarCita = "DELETE FROM citas WHERE id = $idCita";
    if (mysqli_query($enlace, $eliminarCita)) {
        echo "<p class='success-message'>Cita eliminada correctamente.</p>";
    } else {
        echo "<p class='error-message'>Error al eliminar la cita.</p>";
    }
}

// Obtener todas las citas
$query = "SELECT * FROM citas";
$resultado = mysqli_query($enlace, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Citas - Estética</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            width: 90%;
            max-width: 900px;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e2e2e2;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .success-message, .error-message {
            text-align: center;
            margin-top: 20px;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Lista de Citas</h1>

        <!-- Mostrar las citas -->
        <?php
        // Ver las citas almacenadas en la base de datos
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Servicio</th><th>Fecha</th><th>Hora</th><th>Acciones</th></tr>";
            while ($row = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['apellidos'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['servicios'] . "</td>";
                echo "<td>" . $row['fecha'] . "</td>";
                echo "<td>" . $row['hora'] . "</td>";
                echo "<td><a href='verCitas.php?eliminar=" . $row['id'] . "'><button>Eliminar</button></a> 
                          <a href='editarCita.php?id=" . $row['id'] . "'><button>Editar</button></a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No hay citas registradas.</p>";
        }

        // Cerrar la conexión
        mysqli_close($enlace);
        ?>
    </div>
</body>
</html>

