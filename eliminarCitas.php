<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$baseDatos = "sdmakeup";

$enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

if (!$enlace) {
    die("Error de conexión: " . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar la cita
    $deleteSql = "DELETE FROM citas WHERE id = $id";

    if (mysqli_query($enlace, $deleteSql)) {
        header("Location: ver_citas.php"); // Redirigir a la página de visualización de citas
    } else {
        echo "Error al eliminar la cita: " . mysqli_error($enlace);
    }
} else {
    echo "ID no proporcionado.";
}

mysqli_close($enlace);
?>
