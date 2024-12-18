<?php
// Archivo donde conecto mi bd donde almaceno y consulto datos en mi bd (login, formulario)
session_start(); // Iniciamos sesión para acceder a las variables de sesión

include('bd.php');
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$conexion = mysqli_connect("localhost", "root", "", "sdmakeup");

// Consulta para verificar las credenciales (ya no se compara la contraseña directamente)
$consulta = "SELECT * FROM user WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $consulta);

// Verifica si se encontraron filas (es decir, si el usuario existe)
$filas = mysqli_num_rows($resultado);

if ($filas) {
    // Si el usuario existe, obtenemos los datos
    $usuario_data = mysqli_fetch_assoc($resultado); // obtenemos los datos del user

    // Verificar la contraseña usando password_verify
    if (password_verify($password, $usuario_data['password'])) {
        // Si la contraseña es correcta, almacenamos la información en la sesión
        $_SESSION['usuario_id'] = $usuario_data['id']; // se guarda el id del user
        $_SESSION['usuario'] = $usuario_data['usuario']; // se guarda el nombre del user

        // Redirigimos a la página del user o del compras
        header("Location: dashboardUser.php");
        exit(); // Detener el código después de la redirección
    } else {
        // Si la contraseña es incorrecta
        include("login.php");
        echo '<h3 class="bad">Contraseña incorrecta</h3>';
    }
} else {
    // Si el usuario no existe
    include("login.php");
    echo '<h3 class="bad">Usuario no encontrado</h3>';
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
