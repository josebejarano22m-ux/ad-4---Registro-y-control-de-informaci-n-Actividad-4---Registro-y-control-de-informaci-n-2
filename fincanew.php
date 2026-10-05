<?php include ('functions.php');
$codigo=$_GET['codigo'];
$nombre=$_GET['nombre'];
$municipio=$_GET['municipio'];
$vereda=$_GET['vereda'];
$area=$_GET['area'];
$foto="img/finca.jpg";


ejecutarSQLCommand("INSERT INTO  `finca` (codigo, nombre_fin, municipio, vereda, area,foto)
VALUES (
'$codigo' ,
'$nombre' ,
'$municipio' ,
'$vereda' ,
'$area' ,
'$foto')

 ON DUPLICATE KEY UPDATE `codigo`= '$codigo',
`nombre_fin`='$nombre',
`municipio`='$municipio',
`vereda`='$vereda',
`area`='$area',
`foto`='$foto';");

 ?>