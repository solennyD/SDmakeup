<?php
//Archivo donde me aseguro la conexion con la bd de la cesta
$conexion=mysqli_connect("localhost","root","","sdmakeup");


?>
<!-- Mensaje -->
<H5 id="mensaje" class="good">CONECTADO</H5>

<script>
    // Función para mostrar el mensaje
    function mostrarMensaje() {
        const mensaje = document.getElementById('mensaje');
        mensaje.style.display = 'block'; // Mostrar el mensaje
        
        // Ocultar el mensaje después de 2 segundos (2000 milisegundos)
        setTimeout(() => {
            mensaje.style.display = 'none';
        }, 2000);
    }

    // Llamada a la función al cargar la página
    window.onload = mostrarMensaje;
</script>