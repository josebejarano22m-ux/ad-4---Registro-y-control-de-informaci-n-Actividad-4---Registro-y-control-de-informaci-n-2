<?php
require "conexion.php";
session_start();
if(isset($_SESSION['usu_finca'])){
  
}
  else {
    echo '<script>window.location.href="cerrar.php"</script>';
  }
?>
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
						<blockquote class="blockquote text-center"><div class="card-header p-3 mb-2 bg-success text-white"><h1>Registro de administrador</h1></div></blockquote>
							<div class="card-body">

								<form action="r_registro.php" method="post" enctype="multipart/form-data">
									<div class="form-group">
  										
    									<label for="exampleInputEmail1">Usuario</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="emailHelp" placeholder="nombre de usuario" required></div>
    								</div>
    								<div class="form-group">
  										
    									<label for="exampleInputEmail1">Correo</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="email" class="form-control" id="correo" name="correo" aria-describedby="emailHelp" placeholder="correo" required></div>
    								</div>
                    
  										
    									<label for="exampleInputEmail1">Clave</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="password" class="form-control" id="clave" name="clave" aria-describedby="emailHelp" placeholder="contraseña" required></div>
    								</div>
                    
    								<div class="form-group">
                    <input type="file" class="form-control-file" id="imagen" name="imagen">
  									</div>
   									
   									 <blockquote class="blockquote text-center"><input type="submit" name="Enviar" value="Registrar" class="btn btn-info"></blockquote>
    							</form>
                  <?php 
  if (isset($_POST['Enviar'])) {  
  require "conexion.php";
$clave= $_POST['clave'];
  $validar = strlen($clave);
  if($validar >=6) {


  $usu= $_POST['usuario'];
  $result_1 = mysqli_query($conexion,"SELECT usuario  FROM  usuario");
  $mostrar1 = mysqli_fetch_array($result_1);
  $result_2 = mysqli_query($conexion,"SELECT usuario  FROM  administrador");
  $mostrar2 = mysqli_fetch_array($result_2);
  if ($usu== $mostrar1['usuario'] or $usu== $mostrar2['usuario']) {
    require "alert3.php";
  }else{


  $correo= $_POST['correo'];
  $result_1= mysqli_query($conexion,"SELECT * FROM administrador where correo='$correo'");   
  if($mostrar = mysqli_fetch_array($result_1)){
      ?>
    <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Error!',
      text: "Correo exixtente",
      type: 'error',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK!'
    }).then((result) => {
      if (result.value) {
        window.location.href = "listar.php";
      }
    })

  });
</script>
    <?php
  }else{  
  $cod= $_SESSION['usu_finca'];

  $nombre_img= $_FILES['imagen']['name']; 
  if ($nombre_img=='') {
    $nombre_img= "usuario.jpg";
    $ruta="img";
    $ruta= $ruta."/".$nombre_img; 
     $insert="INSERT INTO  administrador (usuario,correo,clave,codigo_finca,foto)values ('$usu','$correo','$clave','$cod','$ruta')";
  $res=mysqli_query($conexion, $insert);
      
 echo '<script>window.location.href="num.php"</script>';
session_start();
session_destroy();

  }else{
  $archivo=$_FILES['imagen']['tmp_name'];

  $ruta="img";
  $ruta= $ruta."/".$nombre_img;

  move_uploaded_file($archivo, $ruta);

  $insert="INSERT INTO  administrador (usuario,correo,clave,codigo_finca,foto)values ('$usu','$correo','$clave','$cod','$ruta')";
  $res=mysqli_query($conexion, $insert);
  
  echo '<script>window.location.href="num.php"</script>';
  
    
  mysqli_close($conexion);
 }
}
}
} else {
  ?>
      <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Ciudado!',
      text: "Contraseña menor de 6 digitos",
      type: 'warning',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK!',
      allowOutsideClick: false
    }).then((result) => {
      if (result.value) {
        window.location.href = "index.php";
      }
    })

  });
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
	<script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>