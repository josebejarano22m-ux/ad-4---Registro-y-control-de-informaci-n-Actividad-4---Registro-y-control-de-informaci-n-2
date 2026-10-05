<?php 
include('functions.php');
$codigo=$_GET['codigo'];
$usuario=$_GET['usuario'];
$contra=$_GET['contra'];

$resultset=getSQLResultSet("SELECT * FROM `usuarios` WHERE codigo='$codigo'")
	$res = $resultset->fetch_array(MYSQLI_NUM);
		$datos= array();
		foreach ($res as $row) {
			$datos[]=$row;
		}
		echo json_encode($datos);
?>