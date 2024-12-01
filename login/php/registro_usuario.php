<?php
 include 'conexion_bd.php';
$nombre_completo = $_POST['nombre_completo'];
$apellido_completo = $_POST['apellido_completo'];
$correo_electronico= $_POST['correo_electronico'];
$nombre_usuario = $_POST['usuario'];
$contraseña = $_POST['contrasena'];
//encitamiento
//$contraseña = hash('sha512',$contraseña);
$query = "INSERT INTO usuario (nombre_completo,apellido_completo,correo_electronico,nombre_usuario,contraseña)
  VALUES('$nombre_completo','$apellido_completo','$correo_electronico','$nombre_usuario','$contraseña')";

// funcion para que no se repita el correo 
$verficar_correo=mysqli_query($conexion,"SELECT * FROM usuario WHERE correo_electronico='$correo_electronico'");
if(mysqli_num_rows ($verficar_correo)>0){
  echo '<script> 
            alert("Este correo ya esta registrado");
            window.location = "../index.php";
          </script>';
          exit();

}

$verficar_usuario=mysqli_query($conexion,"SELECT * FROM usuario WHERE nombre_usuario='$nombre_usuario'");
if(mysqli_num_rows ($verficar_usuario)>0){
  echo '<script> 
            alert("Este usuario ya esta registrado");
            window.location = "../index.php";
          </script>';
          exit();

}



$ejecutar = mysqli_query($conexion,$query);

if ($ejecutar) {
    echo '<script> 
            alert("Usted se ha registrado exitosamente");
            window.location = "../index.php";
          </script>';
} else {
    echo '<script> 
            alert("No se ha registrado ");
            window.location = "../index.php";
          </script>';
}

mysqli_close($conexion);
?>