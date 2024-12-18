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

        img{
            width: 900px; /* Ancho fijo */
            height: 400px; /* Alto fijo */
            border-radius: 5px;
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

<!-- ////////////////////////////////////////////////////////////////////////////-->
        
<div class="card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color:rgba(243, 247, 247, 0.23); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 1500px; margin: 20px auto;">
    <h3 style="color: #333; font-size: 30px; margin-bottom: 20px; ">Productos Recomendados</h3>
    
    <div style="display: flex; gap: 20px; justify-content: space-between; flex-wrap: wrap;">
        <div style="text-align: center; max-width: 450px; flex: 1 1 30%; background-color:rgba(0, 0, 0, 0.26);; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <img src="https://apolomakeup.es/wp-content/uploads/2023/01/karly-jones-xBqYLnRhfaI-unsplash-1-1.jpg" alt="Base de Maquillaje" style="width: 100%; border-radius: 8px; margin-bottom: 15px;" />
            <p style="color: #333; font-size: 16px; margin-bottom: 10px;">Base de Maquillaje - $680.00</p>
            <a href="./cesta.php" style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">Comprar ahora</a>
        </div>
        
        <div style="text-align: center; max-width: 450px; flex: 1 1 30%; background-color: rgba(0, 0, 0, 0.26);; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <img src="https://images.unsplash.com/photo-1684244110880-b7dda6c68618?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGFsZXRhJTIwZGUlMjBtYXF1aWxsYWplfGVufDB8fDB8fHww" alt="Paleta de Sombras" style="width: 100%; border-radius: 8px; margin-bottom: 15px;" />
            <p style="color: #333; font-size: 16px; margin-bottom: 10px;">Paleta de Sombras - $500.00</p>
            <a href="./cesta.php" style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">Comprar ahora</a>
        </div>
        
        <div style="text-align: center; max-width: 450px; flex: 1 1 30%; background-color: rgba(0, 0, 0, 0.26);; border-radius: 8px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
            <img src="https://images.unsplash.com/photo-1618331755914-6397194df631?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVtb3ZlZG9yJTIwZGUlMjBtYXF1aWxsYWplfGVufDB8fDB8fHww" alt="Desmaquillante" style="width: 100%; border-radius: 8px; margin-bottom: 15px;" />
            <p style="color: #333; font-size: 16px; margin-bottom: 10px;">Desmaquillante - $360.00</p>
            <a href="./cesta.php" style="color: #fff; text-decoration: none; font-weight: bold; transition: color 0.3s;">Comprar ahora</a>
        </div>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color:rgba(255, 255, 254, 0.45); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 1500px; margin: 20px auto;">
    <h3 style="color: #333; font-size: 30px; margin-bottom: 15px;">Consejos de Belleza</h3>
    <ul style="list-style-type: none; padding: 0; margin: 0;">
        <li style="margin-bottom: 10px;">
            <a href="https://www.esteticachezvous.es/cuidados-piel-antes-despues-maquillarte/" style="color: #007BFF; text-decoration: none; font-size: 16px; transition: color 0.3s;">
                Cómo cuidar tu piel antes y después del maquillaje.
            </a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="https://artdeco.com/es-es/blogs/make-up-guides/eye-makeup-tips" style="color: #007BFF; text-decoration: none; font-size: 16px; transition: color 0.3s;">
                Trucos para un maquillaje de ojos perfecto.
            </a>
        </li>
        <li style="margin-bottom: 10px;">
            <a href="https://www.nyxcosmetics.es/blog/maquillaje-para-el-rostro/como-hacer-contouring-cara.html" style="color: #007BFF; text-decoration: none; font-size: 16px; transition: color 0.3s;">
                El arte del contouring: Cómo hacerlo correctamente.
            </a>
        </li>
    </ul>
</div>


<!-- ////////////////////////////////////////////////////////////////////////////-->

<div class="card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color:rgba(249, 249, 249, 0.58); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 1500px; margin: 20px auto;">
    <h3 style="color: #333; font-size: 30px; margin-bottom: 15px;">Reseñas de Clientes</h3>
    <div class="reviews" style="font-style: italic; color: #555;">
        <p style="margin-bottom: 15px; padding-left: 20px; position: relative;">
            <span style="position: absolute; left: -20px; top: 50%; transform: translateY(-50%); font-size: 24px;">"</span>
            "Excelente atención y un maquillaje increíble para mi boda!" - Sandra
        </p>
        <p style="margin-bottom: 15px; padding-left: 20px; position: relative;">
            <span style="position: absolute; left: -20px; top: 50%; transform: translateY(-50%); font-size: 24px;">"</span>
            "Me encantó el servicio de peinado, totalmente recomendable." - Julia
        </p>
    </div>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

        <div class="card" style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; background-color:rgba(249, 249, 249, 0.59); box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); max-width: 1500px; margin: 20px auto;">
    <h3 style="color: #333; font-size: 30px; margin-bottom: 10px;">Ofertas Especiales</h3>
    <p style="color: #555; font-size: 16px; margin-bottom: 20px;">¡Aprovecha nuestras promociones exclusivas!</p>
    <ul style="list-style-type: none; padding: 0;">
        <li style="background-color: #e2f7e2; padding: 10px; margin-bottom: 8px; border-radius: 4px; color: #333;">25% de descuento en tu primer servicio.</li>
        <li style="background-color: #e2f7e2; padding: 10px; margin-bottom: 8px; border-radius: 4px; color: #333;">Compra uno y lleva el segundo a mitad de precio en productos seleccionados.</li>
        <li style="background-color: #e2f7e2; padding: 10px; margin-bottom: 8px; border-radius: 4px; color: #333;">Usa tu masterCard y ahorrate hasta un 40% de descuento en todos nuestros servicios.</li>
    </ul>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->

        <div class="card">
    <h3>Mi Historial de Servicios</h3>
    <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
        <thead>
            <tr style="background-color: rgba(0, 0, 0, 0.26); color: #333;">
                <th style="padding: 8px; text-align: left;">Servicio</th>
                <th style="padding: 8px; text-align: left;">Fecha</th>
                <th style="padding: 8px; text-align: left;">Precio</th>
            </tr>
        </thead>
        <tbody>
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">Trenzas</td>
                <td style="padding: 8px;">2024-10-15</td>
                <td style="padding: 8px;">$2800</td>
            </tr>
            <tr style="border-bottom: 1px solid #ddd;">
                <td style="padding: 8px;">Postura de uñas</td>
                <td style="padding: 8px;">2024-08-23</td>
                <td style="padding: 8px;">$1000</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- ////////////////////////////////////////////////////////////////////////////-->



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
