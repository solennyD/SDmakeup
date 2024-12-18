<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard de Cliente</title>
    <style>
        /* Reset de márgenes */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-image: url(./imagen/SEa.jpeg);
            background-size: cover;
            display: flex;
        }

        /* Barra lateral */
        .sidebar {
            width: 250px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            height: 100vh;
            padding: 20px;
            position: fixed;
            box-shadow: 0 2px 5px darkgoldenrod;
            
        }

        .sidebar h2 {
            margin-bottom: 30px;
            font-size: 24px;
        }

        .sidebar ul {
            list-style-type: none;
        }

        .sidebar ul li {
            margin: 20px 0;
        }

        .sidebar ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 10px;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .sidebar ul li a:hover {
            background-color: darkgoldenrod;
        }

        /* Contenedor principal */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            width: 100%;
        }

        .main-content h1 {
            color: #333;
            font-size: 32px;
        }

        .card {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 5px darkgoldenrod;
        }

        .card h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 16px;
            color: #666;
        }

        /* Botón de logout */
        .nav-btn {
            background-color: #ff4c4c;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .nav-btn:hover {
            background-color:rgb(85, 3, 3);
        }
    </style>
</head>
<body>

    <!-- Barra lateral -->
    <div class="sidebar">
        <h2>Mi perfil</h2>
        <ul>
            <li><a href="#">Inicio</a></li>
            <li><a href="./reservaciones.php">Agendar una cita</a></li>
            <li><a href="./verCitas.php">Mis Citas</a></li>
            <li><a href="./cesta.php">Carrito de compras</a></li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="main-content">
<?php
session_start(); // Iniciar sesión para acceder a las variables de sesión

// Verifica si el usuario está logueado
if (isset($_SESSION['usuario'])) {
    // luego de confirmar el nombre del user, se muestra
    echo "<h1 class='bienvenido'>Bienvenido/a , " . $_SESSION['usuario'] . "</h1>";
} else {
    // Si no está logueado, redirigimos al login
    header("Location: login.php");
    exit(); // Asegura que no se ejecute el código posterior
}
?>
        
        <!-- Tarjetas de información -->
        <div class="card">
            <h3>Mi carrito de compras</h3>
            <p>Actualiza tu información personal y preferencias.</p>
        </div>
        
        <div class="card">
            <h3>Ver Citas</h3>
            <p>Consulta y administra tus citas programadas.</p>
        </div>

    <div>
	<!-- Formulario que enviará una solicitud POST para cerrar sesión -->
        <form action="logout.php" method="post" style="display: inline;">
        <button type="submit" name="logout" class="nav-btn">
        <i class='glyphicon glyphicon-off'></i> Cerrar sesión
        </button>
		</form>
     </div>

</body>
</html>
