<?php 
include 'conexion_bd.php'; 

$correo =  $_POST['correo'];
$contraseña =  $_POST['contrasena'];

// Consulta para verificar si el usuario existe
$validar_login = mysqli_query($conexion, "SELECT * FROM usuario WHERE correo_electronico = '$correo' AND contraseña = '$contraseña'");

// Verificar si se encontró un registro
if (mysqli_num_rows($validar_login) > 0) {
    // Si el usuario existe, redirigir a la página de bienvenida
    header("Location: ../bienvenido.php");
    exit; 
} else {
    // Si el usuario no existe, mostrar mensaje de error y redirigir a index.php
    echo '<script>
        alert("Usuario no existe, por favor verifique los datos introducidos.");
        window.location = "../index.php";
    </script>';
    exit;
}
?>
