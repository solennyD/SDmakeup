
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="cache-control" content="max-age=0" />
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="expires" content="0" />
    <meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
    <meta http-equiv="pragma" content="no-cache" />

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
            width: 85%;
            margin: 20px auto;
            border-collapse: collapse;
            display: table;
            border-collapse: separate;
            box-sizing: border-box;
            text-indent: initial;
            unicode-bidi: isolate;
            border-spacing: 15px;
            border-color: gray;

        }

        th, td {
            padding: 8px;
            border-bottom: 2px solid #d4af37;
        }
        th {
            background-color: #d4af37;
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

        button{
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        text-decoration: none;
        margin-right: 74%;
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
   
    <h1>Citas Agendadas</h1>

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
            $resultado = $conexion->query($sql);

            $filas=mysqli_fetch_assoc($resultado);

            // Mostrar los resultados en la tabla
            if ($resultado->num_rows> 0) {
                while($filas = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $filas["ID"] . "</td>";
                    echo "<td>" . $filas["Nombre"] . "</td>";
                    echo "<td>" . $filas["Apellidos"] . "</td>";
                    echo "<td>" . $filas["Email"] . "</td>";
                    echo "<td>" . $filas["Servicio"] . "</td>";
                    echo "<td>" . $filas["Fecha"] . "</td>";
                    echo "<td>" . $filas["Hora"] . "</td>";
                    echo "<td class='action-buttons'>";

                    // Botón de Editar
                    echo "<a 
                    href='editarCitas.php?id=".$filas['ID']."'class='edit-button'>EDITAR</a>";

                    // Botón de Eliminar
                    echo "<a href='verCitas.php=" . $filas["ID"] . "' class='delete-button' onclick='return confirm(\"¿Estás seguro de eliminar esta cita?\")'>ELIMINAR</a>";
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
    
                <button> <a href="./reservaciones.php">Regresar</a></button>
            
</body>
</html>
