
<!DOCTYPE html>   
<html>
<head>
	<title>Registro</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  

</head>
<body>
<br>
	<div class="container">
		<div class="row">
			<div class="col-1 col-sm-1 col-md-1 col-lg-2 col-xl-7"></div>

				<div class="shadow-xl p-2 mb-2 card s-text-black bg-success mb-3 ">	
					<div class="card"  style="width: 28rem;">
						<blockquote class="blockquote text-center"><div class="card-header p-3 mb-2 bg-success text-white"><h1>Registra tu finca</h1></div></blockquote>
							<div class="card-body">

								<form action="registro.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
  										
    									<label for="exampleInputEmail1">Codigo de su finca</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="number" class="form-control" id="codigo" name="codigo" aria-describedby="emailHelp" placeholder="codigo" required></div>
    								</div>
    								<div class="form-group"> 
  										
    									<label for="exampleInputEmail1">Nombre de  la finca</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="nom_finca" required></div>
    								</div>
    								<div class="form-group">
  										
    									<label for="exampleInputEmail1">Municipio</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control" id="municipio" name="municipio" aria-describedby="emailHelp" placeholder="Municipio" required></div>
    								</div>
                    <div class="form-group">
                      
                      <label for="exampleInputEmail1">Vereda</label>
                        <div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control" id="vereda" name="vereda" aria-describedby="emailHelp" placeholder="vereda" required></div>
                    </div>
                    <div class="form-group">
                      
                      <label for="exampleInputEmail1">Area total</label>
                        <div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="number" class="form-control" id="area" name="area" aria-describedby="emailHelp" placeholder="area en hectareas" required></div>
                    </div>
    								<div class="form-group">
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
  									</div>
   									
   									 <blockquote class="blockquote text-center"><input type="submit" name="regis" value="Siguiente" class="btn btn-info"></blockquote>
    							</form>
                  <?php
                  if (isset($_POST['regis'])) {
  session_start(); 
                    
  require "conexion.php";
  $cod= $_POST['codigo'];
  $_SESSION['usu_finca']=$cod;
  $result_1 = mysqli_query($conexion,"SELECT codigo  FROM  finca where codigo='$cod'");
  $mostrar = mysqli_fetch_array($result_1);
  if ($cod == $mostrar['codigo']) {
  ?>
  <script>
function alerta(){
 swal({
   title: "¡ERROR!",
   text: "Codigo ya existe",
   type: "error",
 });
}
     alerta(); 
</script>
  <?php 
  }else{

  $nom= $_POST['nombre'];
  $muni= $_POST['municipio'];
  $vere= $_POST['vereda'];
  $area= $_POST['area'];

  $nombre_img= $_FILES['imagen']['name'];
  if ($nombre_img=='') {
    $nombre_img= "finca.jpg";
    $ruta="img";
    $ruta= $ruta."/".$nombre_img;
    $insert="INSERT INTO  finca values ('$cod','$nom','$muni','$vere','$area','$ruta')";
  $res=mysqli_query($conexion, $insert);
    echo '<script>window.location.href="r_registro.php"</script>';
  
  }else{
  $archivo=$_FILES['imagen']['tmp_name'];

  $ruta="img";
  $ruta= $ruta."/".$nombre_img;

  move_uploaded_file($archivo, $ruta);

  $insert="INSERT INTO  finca values ('$cod','$nom','$muni','$vere','$area','$ruta')";

  $res=mysqli_query($conexion, $insert);
   echo '<script>window.location.href="r_registro.php"</script>';
}
}
}

?>
   							 <br><br>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>