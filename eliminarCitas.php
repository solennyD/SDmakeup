<?php
// Verificar si se ha enviado un ID para eliminar
if(isset($_GET['ID'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "sdmakeup");

    // Verificar si hay errores de conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener el ID del centro a eliminar
    $id = $_GET['ID'];

    // Query para eliminar el centro
    $sql = "DELETE FROM citas WHERE ID = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    // Verificar si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . $conexion->error);
    }

    $stmt->bind_param("i", $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        if ($stmt->affected_rows > 0) {
            $mensaje = "La cita ha sido eliminada correctamente.";
        } else {
            $mensaje = "No se pudo eliminar la cita. Puede que no exista.";
        }
    } else {
        $mensaje = "Error al ejecutar la consulta: " . $stmt->error;
    }

    // Cerrar la declaración
    $stmt->close();
    
    // Cerrar conexión
    $conexion->close();

    // Mostrar mensaje
    echo $mensaje;

    // Redireccionar después de 3 segundos
    header("refresh:3;url=eliminarCitas.php");
    exit();
} else {
    // Si no se proporcionó un ID, redireccionar a la página de verCitas.php
    header("Location: verCitas.php");
    exit();
}

?>
