<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "sdmakeup";

// Crear la conexión
$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

// Verificar si la conexión fue exitosa
if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Procesar los datos cuando se envía el formulario
if (isset($_POST['agendar'])) {
    // Recoger los datos del formulario
    $Nombre_Completo = mysqli_real_escape_string($enlace, $_POST['Nombre_Completo']);
    $Correo_Electronico = mysqli_real_escape_string($enlace, $_POST['Correo_Electronico']);
    $Servicios = mysqli_real_escape_string($enlace, $_POST['Servicios']);
    $Fecha_de_cita = mysqli_real_escape_string($enlace, $_POST['Fecha_de_cita']);
    $Hora_de_cita = mysqli_real_escape_string($enlace, $_POST['Hora_de_cita']);
    $Mensaje = isset($_POST['Mensaje']) ? mysqli_real_escape_string($enlace, $_POST['Mensaje']) : '';

    // Insertar los datos en la base de datos
    $insertarDatos = "INSERT INTO citas_servicios (Nombre_Completo, Correo_Electronico, Servicios, Fecha_de_cita, Hora_de_cita, Mensaje)
                      VALUES ('$Nombre_Completo', '$Correo_Electronico', '$Servicios', '$Fecha_de_cita', '$Hora_de_cita', '$Mensaje')";

    // Ejecutar la consulta
    $ejecutarInsertar = mysqli_query($enlace, $insertarDatos);

    // Verificar si la inserción fue exitosa
    if (!$ejecutarInsertar) {
        echo "Error al insertar en la base de datos: " . mysqli_error($enlace);
    } else {
        echo "<h1>¡Cita agendada con éxito!</h1>";
        echo "<p>Nombre: $Nombre_Completo</p>";
        echo "<p>Correo: $Correo_Electronico</p>";
        echo "<p>Servicio: $Servicios</p>";
        echo "<p>Fecha de Cita: $Fecha_de_cita</p>";
        echo "<p>Hora de Cita: $Hora_de_cita</p>";
        if (!empty($Mensaje)) {
            echo "<p>Mensaje: $Mensaje</p>";
        }
    }
} else {
    // Si no se recibe el formulario, mostrar un mensaje de error
    echo "<h1>No se recibió el formulario.</h1>";
}

// Cerrar la conexión a la base de datos
mysqli_close($enlace);
?>
