<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "sdmakeup";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener todas las citas
$sql = "SELECT * FROM citas";
$result = mysqli_query($enlace, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<table border='1' style='width:100%; margin: 20px 0;'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Email</th><th>Servicio</th><th>Fecha</th><th>Hora</th><th>Acciones</th></tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['apellidos'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['servicios'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['hora'] . "</td>";
        echo "<td><a href='editarCitas.php?id=" . $row['id'] . "'>Editar</a> | 
                  <a href='eliminarCitas.php?id=" . $row['id'] . "' onclick='return confirm(\"¿Estás seguro de que quieres eliminar esta cita?\");'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay citas registradas.";
}

mysqli_close($enlace);
?>

