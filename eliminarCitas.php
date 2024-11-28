<?php
session_start();

$id=$_GET['id'];
include('bd.php');

$sql = "DELETE FROM citas WHERE id='".$id."'";
$resultado=mysqli_query($conexion, $sql);
if($resultado){
    echo "<script language='JavaScript'>
    alert('Los datos se eliminaron correctamente');
    location.assign('verCitas.php');
    </script>";

}else{
    echo "<script language='JavaScript'>
    alert('Los datos no se eliminaron correctamente');
    location.assign('verCitas.php');
    </script>";
}
