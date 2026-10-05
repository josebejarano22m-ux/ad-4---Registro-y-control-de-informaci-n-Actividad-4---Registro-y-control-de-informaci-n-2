<?PHP
$hostname_localhost="localhost";
$database_localhost="id10746090_aplicacion";
$username_localhost="id10746090_huilaganadero";
$password_localhost="12345678"; 

$json=array();

				
		$conexion = mysqli_connect($hostname_localhost,$username_localhost,$password_localhost,$database_localhost);
		$id= $_GET['id'];
		$consulta="select * from razas where codigo_finca='$id'";
		
		$resultado=mysqli_query($conexion,$consulta);
		
		while($registro=mysqli_fetch_array($resultado)){
		    $result["nombre"]=$registro['nombre'];
			$result["img"]=$registro['img'];
			$json['promocion'][]=$result;
			//echo $registro['id'].' - '.$registro['nombre'].'<br/>';
		}
		mysqli_close($conexion);
		echo json_encode($json);
?>

