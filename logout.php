<?php
session_start(); // Inicia la sesión

// Destruir todas las variables de sesión
session_unset();   // Elimina todas las variables de sesión

// Destruir la sesión
session_destroy(); // Elimina la sesión

// Redirigir al login después de cerrar sesión
header("Location:../proyecto-final_solennydeleon/login.php");
exit();
?>
