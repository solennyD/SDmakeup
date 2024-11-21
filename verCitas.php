<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Historial Médico</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 0;
            padding: 0;
            background-image: url(../proyecto-final_solennydeleon/imagen/cesta.jpg);
        }
        h2 {
            margin-top: 50px;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-buttons a {
            margin: 0 10px;
            padding: 5px 10px;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .edit-button {
            background-color: #007bff;
        }
        .edit-button:hover {
            background-color: #0056b3;
        }
        .delete-button {
            background-color: #dc3545;
        }
        .delete-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <header>
    <a href="./reservaciones.php">Atras</a>
    </header>
    <h2>Citas Agendadas</h2>

    <table>
        <thead>
            <tr>
                <th>ID </th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Servicio</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Acciones</th> <!-- Columna para los botones -->
            </tr>
        </thead>
        <tbody>
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "sdmakeup");

            // Verificar la conexión
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta SQL para obtener las citas
            $sql = "SELECT ID, Nombre, Apellidos, Email, Servicio, Fecha, Hora FROM citas";
            $result = $conexion->query($sql);

            // Mostrar los resultados en la tabla
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["ID"] . "</td>";
                    echo "<td>" . $row["Nombre"] . "</td>";
                    echo "<td>" . $row["Apellidos"] . "</td>";
                    echo "<td>" . $row["Email"] . "</td>";
                    echo "<td>" . $row["Servicio"] . "</td>";
                    echo "<td>" . $row["Fecha"] . "</td>";
                    echo "<td>" . $row["Hora"] . "</td>";
                    echo "<td class='action-buttons'>";
                    // Botón de Editar
                    echo "<a href='editarCitas.php=" . $row["ID"] . "' class='edit-button'>Editar</a>";
                    // Botón de Eliminar
                    echo "<a href='?eliminarCitas.php=" . $row["ID"] . "' class='delete-button' onclick='return confirm(\"¿Estás seguro de eliminar esta cita?\")'>Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No se encontraron registros de citas.</td></tr>";
            }

            // Cerrar la conexión
            $conexion->close();
            ?>
        </tbody>
    </table>
</body>
</html>
