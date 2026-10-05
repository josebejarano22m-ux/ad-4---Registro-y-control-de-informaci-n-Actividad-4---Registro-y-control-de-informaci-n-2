<?php 
//declarar variables para la conexion del servidor y la base de datos 
$nombre_servidor="localhost";
$nombre_usuario="root";
$password="";
$nombre_bd="aplicacion";

//crear una variable de conexion utilizando la extencion  de mysqli
$conexion= new mysqli($nombre_servidor, $nombre_usuario, $password,  $nombre_bd);
if ($conexion->connect_error) {
	echo "<b>Error de la conexion a la base de datos<b>". $conexion->connect_error;
	exit();
}
else{
	
}

 ?>
