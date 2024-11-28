<?php
session_start();

// Verificar si el usuario está autenticado y es un administrador
if (!isset($_SESSION["user"])) {
    // Si no está autenticado como administrador, redirigir al usuario al inicio de sesión del administrador
    header("Location: login.php");
    exit(); // Detener la ejecución del script después de redirigir
}

// Verificar si se recibió un ID de dependiente para eliminar
if (isset($_GET['id'])) {
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "sdmakeup");

    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener el ID del dependiente a eliminar
    $id = $_GET['ID'];

    // Query para eliminar el dependiente
    $sql = "DELETE FROM citas WHERE ID = ?";
    $consulta = $conexion->prepare($sql);
    $consulta->bind_param("i", $id);
    $consulta->execute();

    // Verificar si se eliminó correctamente la cita
    if ($consulta->affected_rows > 0) {
        $_SESSION['mensaje'] = '<div class="alert alert-success">La cita se ha eliminado correctamente.</div>';
    } else {
        $_SESSION['mensaje'] = '<div class="alert alert-danger">No se pudo eliminar la cita.</div>';
    }

    // Cerrar conexión y liberar recursos
    $consulta->close();
    $conexion->close();

    // Redireccionar después de 3 segundos
    header("refresh:3;url=eliminarCitas.php");
    exit();
} else {
    // Si no se recibió un ID de dependiente, redirigir a la página de eliminardependientes.php
    header("Location: eliminarCitas.php");
    exit();
}
?>
