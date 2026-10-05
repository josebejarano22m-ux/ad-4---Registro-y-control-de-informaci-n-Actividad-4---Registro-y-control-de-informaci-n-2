<?php 
require "conexion.php";
session_start();
if(isset($_SESSION['usu_usu'])){
  
}
  else {
    echo '<script>window.location.href="cerrar.php"</script>';
  }
?>
<!DOCTYPE html> 
<html>
<head>
	<title>Recuperar contraseña</title>
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
						<blockquote class="blockquote text-center"><div class="card-header p-3 mb-2 bg-success text-white"><h1>Recuperar contraseña de <?php echo $_SESSION['usu_usu']; ?></h1></div></blockquote>
							<div class="card-body">

								<form action="nueva_contra.php" method="post" >
									<div class="form-group">
  										
    									<label for="exampleInputEmail1">Contraseña nueva</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="password" class="form-control" id="codigo1" name="codigo1" aria-describedby="emailHelp" placeholder="contraseña" required></div>
    								</div>
    								<div class="form-group">
  										
    									<label for="exampleInputEmail1">Confirmar contraseña</label>
   											<div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="password" class="form-control" id="codigo2" name="codigo2" aria-describedby="emailHelp" placeholder="contraseña" required></div>
    								</div>
   									 <blockquote class="blockquote text-center"><input type="submit" name="recuper" value="Siguiente" class="btn btn-info"></blockquote>
    							</form>
    							<?php if (isset($_POST['recuper'])){
    								require "conexion.php";
    								$con= $_POST['codigo1'];
                    $validar = strlen($con);
if($validar >=6) {

    								$con2= $_POST['codigo2'];
    								$usu= $_SESSION['usu_usu'];
    								$cod= $_SESSION['usu_fin'];

    								if ($con == $con2) {
    								$consulta1="SELECT usuario, codigo_finca  FROM administrador WHERE codigo_finca= '$cod' and usuario='$usu'";
    								$consulta2="SELECT usuario, codigo_finca FROM usuario WHERE codigo_finca='$cod' and usuario='$usu'";
    								$resultado1=mysqli_query($conexion, $consulta1);
									$resultado2=mysqli_query($conexion, $consulta2);
									if ($filas1=mysqli_fetch_array($resultado1)) {
										$contra="UPDATE  administrador SET clave='$con' where administrador.usuario='$usu'";
                 							$res=mysqli_query($conexion, $contra);
                 							echo '<script>window.location.href="num.php"</script>';
									}
									if ($filas2=mysqli_fetch_array($resultado2)) {
										$contra="UPDATE  usuario SET clave='$con' where usuario.usuario='$usu'";
                 							$res=mysqli_query($conexion, $contra);
                 							echo '<script>window.location.href="pasar.php"</script>';
									}
								}else{
    									?>
                      <script>
function alerta(){
 swal({
   title: "¡ERROR!",
   text: "contraseñas no coinciden",
   type: "error",
 });
}
     alerta(); 
</script>
                      <?php
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