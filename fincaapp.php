<?php
include('functions.php');
$id=$_GET["id"];


if($resultset=getSQLResultSet("SELECT * FROM `finca` WHERE codigo='$id'")){
	while ($row = $resultset->fetch_array(MYSQLI_NUM)){
		$json= json_encode($row);
		echo $json;
		
	}
}

?>


