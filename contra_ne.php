<?php
session_start();
?>
<!DOCTYPE html>  
<html>
<head>
	<title>Recuperar contraseña</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

   <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
	<div class="container">
		<div class="row">
			<div class="col-1 col-sm-1 col-md-1 col-lg-2 col-xl-7"></div>

				<div class="shadow-xl p-2 mb-2 card s-text-black bg-success mb-3 ">	
					<div class="card"  style="width: 28rem;">
						<blockquote class="blockquote text-center"><div class="card-header p-3 mb-2 bg-success text-white"><h1>Recuperar contraseña</h1></div></blockquote>
							<div class="card-body">

								<form action="contra_ne.php" method="post">
									<div class="form-group">
  										
    									<label for="exampleInputEmail1">Codigo finca</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="number" class="form-control" id="codigo" name="codigo" aria-describedby="emailHelp" placeholder="codigo" required></div>
    								</div>
    								<div class="form-group">
  										
    									<label for="exampleInputEmail1">Usuario</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control" id="nombre" name="nombre" aria-describedby="emailHelp" placeholder="nombre" required></div>
    								</div>
    								<div class="form-group">
  										
    									<label for="exampleInputEmail1">Nombre finca</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control" id="finca" name="finca" aria-describedby="emailHelp" placeholder="nom_finca" required></div>
    								</div>
                    
   									 <blockquote class="blockquote text-center"><input type="submit" name="Recu_contra" value="Siguiente" class="btn btn-info"></blockquote>
    							</form>
                  <?php 
                  if (isset($_POST['Recu_contra'])) {
   
  
  require "conexion.php";
  $codigo_finca=$_POST['codigo'];
  $nombre=$_POST['nombre'];
  $finca=$_POST['finca'];

  $consulta1="SELECT * FROM administrador WHERE codigo_finca= '$codigo_finca' and usuario='$nombre'";

  $respal="SELECT nombre_fin FROM finca WHERE codigo='$codigo_finca'";

  $consulta2="SELECT * FROM usuario WHERE codigo_finca='$codigo_finca' and usuario='$nombre'";

  $resultado1=mysqli_query($conexion, $consulta1);
  $arespal= mysqli_query($conexion, $respal);
  $f=mysqli_fetch_array($arespal);
  $resultado2=mysqli_query($conexion, $consulta2);

  if ($filas1=mysqli_fetch_array($resultado1)) {
    if ($codigo_finca == $filas1['codigo_finca'] and $nombre == $filas1['usuario'] and $finca == $f['nombre_fin']) {
      $_SESSION['usu_usu']=$filas1['usuario'];
      $_SESSION['usu_fin']=$filas1['codigo_finca'];
      echo '<script>window.location.href="nueva_contra.php"</script>';
    }
  }
  if ($filas2=mysqli_fetch_array($resultado2)) {
    if ($codigo_finca == $filas2['codigo_finca'] and $nombre == $filas2['usuario'] and $finca == $f['nombre_fin']) {
      $_SESSION['usu_usu']=$filas2['usuario'];
      $_SESSION['usu_fin']=$filas2['codigo_finca'];
      echo '<script>window.location.href="nueva_contra.php"</script>';
    }
  }else{
    ?>
    <script>
function alerta(){
 swal({
   title: "¡ERROR!",
   text: "Datos incorrectos",
   type: "error",
 });
}
     alerta(); 
</script>
    <?php
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
	
</body>
</html>