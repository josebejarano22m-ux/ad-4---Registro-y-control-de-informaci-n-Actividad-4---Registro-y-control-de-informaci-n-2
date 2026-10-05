<?php
require "conexion.php";
session_start();
if(isset($_SESSION['usu_usuario'])){
  
} 
  else {
     echo '<script>window.location.href="cerrar.php"</script>';
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Usuario</title>
	<meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
  <!-- Font Awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
<!--sweetalert-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

</head>
<body>
    <!-- Grid column -->
  <div class="col-md-12">
    <ul class="nav aqua-gradient py-2 mb-2 font-weight-bold z-depth-1">
      <li class="nav-item">
        <a class="nav-link active white-text" href="usuario.php"><img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" class="display-1">Huila ganadero</a>
      </li>
    </ul>

  </div>
  <!-- Grid column -->


  <div class="bg"></div>


  <!--Modal: Login with Avatar Form-->
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content" style="width: 20rem;">

      <!--Header-->
      <div class="modal-header">
        <?php  
        $cod= $_SESSION['usu_finca'];
        $una= $_SESSION['usu_usuario'];
        $result_1 = mysqli_query($conexion,"SELECT *  FROM usuario WHERE codigo_finca='$cod' and usuario='$una'");
                      $mostrar = mysqli_fetch_array($result_1);
        ?>
        <img src="<?php echo $mostrar['foto']; ?>" width="300" height="150" alt="avatar" class="rounded-circle img-responsive">
      </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">

        <h5 class="mt-1 mb-2"><?php echo $mostrar['usuario']; ?></h5>

        <div class="md-form ml-0 mr-0">
        <div class="md-form">
          
          <form action="perfilusuario.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="imagenes" value="<?php echo $mostrar['foto'];?>">
          <input type="text" id="materialLoginFormEmail" class="form-control" name="usuario" value="<?php echo $mostrar['usuario']; ?>">
          <label for="materialLoginFormEmail">Usuario</label>
        </div>

      <!-- Password -->
        <div class="md-form">
          <input type="email" id="materialLoginFormPassword" class="form-control" name="correo" value="<?php echo $mostrar['correo']; ?>">
          <label for="materialLoginFormPassword">Correo</label>
        </div>

      <div class="md-form">
        <input type="password" id="materialLoginFormcon" class="form-control" name="contra" value="<?php echo $mostrar['clave']; ?>">
        <label for="materialLoginFormcon">Contraseña nueva</label>
      </div>
      <div class="md-form">
        <input type="password" id="materialLoginFormconn" class="form-control" name="contran" value="<?php echo $mostrar['clave']; ?>">
        <label for="materialLoginFormconn">Verificar contraseña</label>
      </div>  
      <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen" >
                                                 

        </div>

        <div class="text-center mt-4">
          <button class="btn btn-cyan mt-1" name="enviar">Guardar</button>
        </form>
        </div>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<?php 
if (isset($_POST['enviar'])) {
  $tres= $_POST['contra'];
  $validar = strlen($tres);
if($validar >=6) {

     $usua=$_SESSION['usu_usuario'];
  $result_2= mysqli_query($conexion,"SELECT * FROM usuario where usuario='$usua'");   
  $mostrar = mysqli_fetch_array($result_2);
  $total= $mostrar['num'];
  
  $cod= $_SESSION['usu_finca']; 
  $cargo= $_POST['imagenes'];
  $uno= $_POST['usuario'];
  $dos= $_POST['correo'];
  
  $cuatro= $_POST['contran'];
  if ($tres!=$cuatro) {
    ?>
    <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Error!',
      text: "Contraseña invalida",
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
$nombre_img= $_FILES['imagen']['name'];
            if ($nombre_img=='') {

              $cod= $_SESSION['usu_finca'];    
              $actualizar="UPDATE usuario SET usuario='$uno',correo='$dos',clave='$tres',foto='$cargo' where usuario.codigo_finca='$cod' and num='$total'";
              $res=mysqli_query($conexion, $actualizar);
               echo '<script>window.location.href="usuario.php"</script>';  
            }else{
            $archivo=$_FILES['imagen']['tmp_name'];

            $ruta="img";
            $ruta= $ruta."/".$nombre_img;
             move_uploaded_file($archivo, $ruta);

              $cod= $_SESSION['usu_finca'];    
              $actualizar="UPDATE usuario SET usuario='$uno',correo='$dos',clave='$tres',foto='$ruta' where usuario.codigo_finca='$cod'  and num='$total'";
              $res=mysqli_query($conexion, $actualizar);
              echo '<script>window.location.href="usuario.php"</script>'; 
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
<!--Modal: Login with Avatar Form-->
<!-- Material form login -->
</body>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
</html>