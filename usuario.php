<?php 

//importar la conexion
require './includes/config/database.php';
$db= conectarDB();

//crear un email y password
$email = "corro@correo.com";
$password = "12345";

$passwordHash = password_hash($password,PASSWORD_DEFAULT);

//Query para crear el usuario
$query = "INSERT INTO usuarios (email, password) VALUES ('$email', '$passwordHash')";

echo $query;
//agregar a la base de datos usurio y contraseña.
mysqli_query($db,$query);


?>
