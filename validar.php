
<?php
//Archivo donde conecto mi bd donde almaceno y cosulto datos en mi bd (login, formulario)
session_start(); // aqui Iniciamos sesión para acceder a las variables de sesión

include('bd.php');
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$conexion = mysqli_connect("localhost", "root", "", "sdmakeup");

// Consulta para verificar las credenciales
$consulta = "SELECT * FROM user WHERE usuario='$usuario' AND password='$password'";
$resultado = mysqli_query($conexion, $consulta);

// Verifica si se encontraron filas (es decir, si el usuario existe)
$filas = mysqli_num_rows($resultado);

if ($filas) {
    // Si el usuario y la contraseña son correctos, almacenamos la información en la sesión
    $usuario_data = mysqli_fetch_assoc($resultado); // obtenemos los datos del user
    $_SESSION['usuario_id'] = $usuario_data['id']; // se guarda el id del user
    $_SESSION['usuario'] = $usuario_data['usuario']; // se guarda el nombre del user

    // Redirigimos a la página de la cesta o del compras
    header("Location: cesta.php");
    exit(); // Detener el código después de la redirección
} else {
    // Si las credenciales son incorrectas
    include("login.php");
    echo '<h3 class="bad">Contraseña o usuario incorrectos</h3>';
}

mysqli_free_result($resultado);
mysqli_close($conexion);
?>
