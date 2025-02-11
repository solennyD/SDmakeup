<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de servicios</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* generales */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image:url(../proyecto-final_solennydeleon/imagen/cesta.jpg);
        }

        /* Contenedor de la galería */
        .gallery-container {
            max-width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.21); 
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            border: 2px solid #d4af37;
        }

        /* Título de la galería */
        .gallery-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2rem;
            color: #d4af37; 
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Estilos de la rejilla de imágenes */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); 
            gap: 15px;
        }

        /* Estilo de cada imagen dentro de la galería */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 2px solid rgba(212, 175, 55, 0.8);
        }

        /* Estilo de la imagen dentro del contenedor */
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        /* Efecto al pasar el cursor sobre la imagen */
        .gallery-item:hover {
            transform: scale(1.05); 
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        /* Texto superpuesto en cada imagen */
        
.gallery-item .text-overlay {
    position: absolute; 
    bottom: 10px; 
    left: 10px; 
    color: white; 
    font-size: 15px; 
    font-weight: bold; 
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); 
    text-align: left; 
    padding: 10px; 
    background-color: rgba(0, 0, 0, 0.5); 
    border-radius: 5px; 
    width: auto; 
    box-sizing: border-box; /
}
    </style>
</head>

<body>

<header>

<a style="margin-left: 25%;"href="./index.html" >
    <img src="imagen/Grupo 1@2x.png">
    </a>

<div class="menu">
  <a class="item" href="./formulario.php">
    <div>Regístrate</div>
  </a>
  <a class="item" href="./login.php">
    <div>Iniciar Sección</div>
  </a>
  <a class="item" href="./servicios.php">
    <div>Servicios</div>
  </a>

  <a href="#sobre-nosotros" style="padding-top: 1.8%;">Sobre Nosotros</a>
</div>
</header>

    <!-- Contenedor de la galería -->
    <div class="gallery-container">
        <h2>Servicios que ofrecemos</h2>
        <div class="gallery-grid">
            <!-- Imagen 1 -->
            <div class="gallery-item">
                <img src="https://image.tuasaude.com/media/article/eh/sf/depilacao-a-laser_28999_l.jpg" alt="depilacion laser 1">
                <div class="text-overlay">Depilacion Laser</div>
            </div>
            <!-- Imagen 2 -->
            <div class="gallery-item">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSHsAnWWoDLTt3fk3G2Qs_BZ9zZNhnHfcVUSQ&s" alt="tintado de cejas 2">
                <div class="text-overlay">Tintado de cejas</div>
            </div>
            <!-- Imagen 3 -->
            <div class="gallery-item">
                <img src="https://images.fresha.com/lead-images/placeholders/nail-salon-72.jpg?class=width-small" alt="postura de Uñas 3">
                <div class="text-overlay">Postura de uñas</div>
            </div>
            <!-- Imagen 4 -->
            <div class="gallery-item">
                <img src="https://vitasantispa.com/cdn/shop/files/m4.jpg?v=1696890966&width=533" alt="masajes corporales 4">
                <div class="text-overlay">Masajes corporales</div>
            </div>
            <!-- Imagen 5 -->
            <div class="gallery-item">
                <img src="https://makeupbycatagarcia.com/wp-content/uploads/2023/08/03-Galeria_Master-Virtual-en-Maquillaje-profesional-min.jpg" alt="Maquillajes de eventos 5">
                <div class="text-overlay">Maquillaje para cada ocasión</div>
            </div>
            <!-- Imagen 6 -->
            <div class="gallery-item">
                <img src="https://ehairschool.com/es/wp-content/uploads/2024/03/trenzas-sueltas.png" alt="trenzas 6">
                <div class="text-overlay">Trenzas</div>
            </div>
             <!-- Imagen 7 -->
             <div class="gallery-item">
                <img src="https://media.istockphoto.com/id/1165541046/es/foto/cosmetologist-beautician-depilar-las-piernas-femeninas-en-el-sal%C3%B3n-de-belleza-del-centro-de-spa.jpg?s=612x612&w=0&k=20&c=aMXrIByDK9Fmmvd53PKBVAjRQhff44y8i0aWAQK7Ru0=" alt="Depilacion con cera">
                <div class="text-overlay">Depilación con cera</div>
            </div>
             <!-- Imagen 8 -->
             <div class="gallery-item">
                <img src="https://www.druni.es/blog/wp-content/uploads/2022/06/portada-4.jpg" alt="Micropigmentacion de labios">
                <div class="text-overlay">Micropigmentación de labios</div>
        </div>
         <!-- Imagen 9 -->
         <div class="gallery-item">
                <img src="https://imagenes.20minutos.es/files/image_1920_1080/uploads/imagenes/2019/12/18/tratamiento-arrugas-de-expresion.jpeg" alt="Botox">
                <div class="text-overlay">Botox</div>
        </div>
    </div>

    <footer>
        

        <div>
          <h1>Contáctanos</h1>

          <p style="margin-left: 10%;">
            📍 Dirección: Blue Mall. 2do piso
            📞 Teléfono: +[1] 650-852-1212
            📧 Correo electrónico: [sdmakeup@gmail.com] 
            🌐 Sitio web: www.sdmakeup.com
            📱 Redes sociales: Instagram: https://www.instagram.com/ 

          </p>

        </div>
        
        
        
        
    </footer>
    

</body>
</html>
