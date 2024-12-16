<?php
include('bd.php');
?>
<?php
    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $baseDatos = "sdmakeup";

    $enlace = mysqli_connect($servidor, $usuario, $clave, $baseDatos);

    if (!$enlace) {
        echo "Error de conexión: " . mysqli_connect_error();
    }


    // Procesar el formulario
    if (isset($_POST['enviar'])) {
        // aqui entra cuando se presiona el boton de enviar
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $servicio = $_POST['servicio'];
        $fecha = $_POST['fecha'];
        $hora = $_POST['hora'];

        $sql = "UPDATE citas SET  nombre='".$nombre."', apellidos='".$apellidos."', email= '".$email."', servicio= '".$servicio."', fecha= '".$fecha."', hora='".$hora."' WHERE id='".$id."'";
        $resultado=mysqli_query($conexion, $sql);

        if($resultado){
            echo "<script language='JavaScript'>
            alert('Los datos se actualizaron correctamente');
            location.assign('verCitas.php');
            </script>";

        }else{
            echo "<script language='JavaScript'>
            alert('Los datos no se actualizaron correctamente');
            location.assign('verCitas.php');
            </script>";
        }

    }else{
        // aqui entra si no ha presionado el boton de enviar
        $id=$_GET['id'];
        $sql="SELECT * from citas where id='".$id."'"; //mandar a traer el registro
        $resultado=mysqli_query($conexion, $sql);
      //  $sql = "SELECT ID, Nombre, Apellidos, Email, Servicio, Fecha, Hora FROM citas";
          //  $resultado = $conexion->query($sql);

        $filas=mysqli_fetch_assoc($resultado);
        $nombre = $filas["Nombre"];
        $apellidos = $filas["Apellidos"];
        $email = $filas["Email"];
        $servicio = $filas["Servicio"];
        $fecha = $filas["Fecha"];
        $hora = $filas["Hora"];

        mysqli_close($conexion);

    }

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="css/style.css"> -->

    <style>
    body {
        font-family: Arial, sans-serif;
        background-image: url(../proyecto-final_solennydeleon/imagen/cesta.jpg);
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: rgba(203, 202, 202, 0.444);
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        border: 2px solid #d4af37;
        display: flex;
        flex-direction: column;
        align-items: center; /* Centra los elementos dentro del contenedor */
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    label {
        font-size: 16px;
        color: #333;
        margin-bottom: 5px;
        display: block;
        text-align: left;
        width: 100%;
        
    }

    input, select, textarea {
        width: 70%; /* Aumenté el ancho al 80% para que se vean mejor centrados */
        padding: 10px;
        margin: 10px 0 20px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
       
    }

    button {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    .form-group {
        margin-bottom: 20px;
        width: 100%; /* Asegura que las agrupaciones de campos tomen el 100% del ancho */
    }

    .form-group textarea {
        height: 100px;
        resize: none;
    }

</style>

   
</head>
<body>
    <div class="container">
        <h1>Editar Citas</h1>
        <form action="<?=$_SERVER ['PHP_SELF']?>" method="POST" style="width: 800px; margin: auto;">
                <div class="form-group"> 
                <label for="nombre">Nombre</label>
                <input type="text" id="nombre" name="nombre" required
                value="<?php echo $nombre;?>"><br>
            </div>
                <div class="form-group"> 
                <label for="apellidos">Apellidos</label>
                <input type="text" id="apellidos" name="apellidos"required
                value="<?php echo $apellidos;?>"><br>
            </div>
                <div class="form-group">
                <label for="email">Correo Electrónico</label>
                <input type="email" id="email" name="email" required
                value="<?php echo $email;?>"><br>
            </div>
                <div class="form-group"> 
                <label for="servicio">Servicio</label>
                <select id="servicio" name="servicio" required
                value="<?php echo $servicio;?>"><br>
                <option value="Depilacion Laser">Depilacion Laser</option>
                    <option value="Tintado de cejas">Tintado de cejas</option>
                    <option value="Postura de uñas">Postura de uñas</option>
                    <option value="Masajes corporales">Masajes corporales</option>
                    <option value="Maquillaje para cada ocasión">Maquillaje para cada ocasión</option>
                    <option value="Trenzas">Trenzas</option>
                    <option value="Depilación con cera">Depilación con cera</option>
                    <option value="Micropigmentación de labios">Micropigmentación de labios</option>
                    <option value="Botox">Botox</option>
                </select>
            </div>
                <div class="form-group">
                <label for="fecha">Fecha de la cita</label>
                <input type="date" id="fecha" name="fecha" required
                value="<?php echo $fecha;?>"><br>
            </div>
                <div class="form-group">
                <label for="hora">Hora de la cita</label>
                <input type="time" id="hora" name="hora" required
                value="<?php echo $hora;?>">
            </div>
            <input type="hidden" name="id"
            value="<?php echo $id;?>">
           
            <input type="submit" name="enviar" value="Actualizar" style="width: 20%;">
            <button style="width: 20%;"> <a href="./verCitas.php" style="margin-right: 100%;">Regresar</a></button>
        </form>
    </div>
</body>
</html>

   


  