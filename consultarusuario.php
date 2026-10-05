<?php
include('functions.php'); 
$user=$_GET['id'];
if ($resultset = getSQLResultSet("SELECT codigo FROM `finca` WHERE codigo='$user'")) {
	
    	while ($row = $resultset->fetch_array(MYSQLI_NUM)) {
    	echo json_encode($row);
		
    	
    	}
    	
   }
   
?>
