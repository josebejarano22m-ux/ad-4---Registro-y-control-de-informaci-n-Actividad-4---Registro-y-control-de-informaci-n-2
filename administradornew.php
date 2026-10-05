<?php include ('functions.php');
$usuario=$_GET['usuario'];
$correo=$_GET['correo'];
$clave=$_GET['clave'];
$codigo=$_GET['codigo'];
$foto="img/usuario.jpg";


ejecutarSQLCommand("INSERT INTO  `administrador` (usuario, correo, clave, codigo_finca, foto)
VALUES (
'$usuario' ,
'$correo' ,
'$clave' ,
'$codigo' ,
'$foto')

 ON DUPLICATE KEY UPDATE `usuario`= '$usuario',
`correo`='$correo',
`clave`='$clave',
`codigo_finca`='$codigo',
`foto`='$foto';");

 ?>