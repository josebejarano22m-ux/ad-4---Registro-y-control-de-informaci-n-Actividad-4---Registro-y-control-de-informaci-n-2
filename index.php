<?php
session_start();
?>
<!DOCTYPE html>  
<html lang="es">
<head>
  <title>index</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
  <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
  

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" class="display-1">Huila ganadero</a>
 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
       
      </li>
    </ul>
    <div class="d-flex flex-row-reverse bd-highlight">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
     <a href="registro.php"  class="nav-link">Registrate</a>
   </li>
 </ul>
  </div>
</div>
</nav>

  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-2 col-sm-4 col-md-6 col-lg-7 col-xl-8"></div>

        <div class="shadow-xl p-2 mb-2 card p-3 mb-2 bg-transparent text-dark"> 
          <div class="card"  style="width: 20rem;">
            <blockquote class="blockquote text-center"><h5 class="card-title"><img src="img/logo.png" class="img-fluid" alt="Responsive image"></h5></blockquote>
              <div class="card-body">
                <form action="index.php" method="post">

                  
                  <div class="form-group">
                      
                      <label for="exampleInputEmail1">Codigo finca</label>
                      <div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="number" class="form-control"  name="codigo_finca" id="codigo_finca" aria-describedby="emailHelp" placeholder="ingrese su codigo" required></div>
                    </div>
                  <div class="form-group">
                      
                      <label for="exampleInputEmail1">Usuario</label>
                      <div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="text" class="form-control"  name="usuario" id="usuario" aria-describedby="emailHelp" placeholder="nombre de usuario" required></div>
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contraseña</label>
                        <div class="shadow-lg p-0 mb-0 bg-white rounded"><input type="password" class="form-control" name="clave" id="clave" placeholder="Password" required></div>
                    </div>
                    
                    <blockquote class="blockquote text-center"><button type="submit" class="btn btn-primary" name="enviar">Ingresar</button>

                    
                </form> 
                
                <?php
  if (isset($_POST['enviar'])) {
         
  
  
  require "conexion.php";
  $codigo_finca=$_POST['codigo_finca'];
  $usuario=$_POST['usuario'];
  $clave=$_POST['clave'];

  $consulta1="SELECT * FROM administrador WHERE codigo_finca= '$codigo_finca' and usuario= '$usuario'";
  $consulta2="SELECT * FROM usuario WHERE codigo_finca= '$codigo_finca' and usuario= '$usuario'";
  $consulta3="SELECT * FROM programer WHERE codigo_pro= '$codigo_finca'";

  $resultado1=mysqli_query($conexion, $consulta1);
  $resultado2=mysqli_query($conexion, $consulta2);
  $resultado3=mysqli_query($conexion, $consulta3);  
  

  if ($filas1=mysqli_fetch_array($resultado1)) {
    if ($clave == $filas1['clave']) {
      $_SESSION['usu_usuario']=$filas1['usuario'];
      $_SESSION['usu_correo']=$filas1['correo'];
      $_SESSION['usu_finca']=$filas1['codigo_finca'];
      $_SESSION['usu_foto']=$filas1['foto'];
      $_SESSION['usu_contra']=$filas1['clave'];
      
      echo '<script>window.location.href="num3.php"</script>';
    }else{
      ?>
      <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Ciudado!',
      text: "Contraseña Incorrecta",
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
  elseif ($filas2=mysqli_fetch_array($resultado2)) {
    if ($clave == $filas2['clave']) {
      $_SESSION['usu_usuario']=$filas2['usuario'];
      $_SESSION['usu_correo']=$filas2['correo'];
      $_SESSION['usu_finca']=$filas2['codigo_finca'];
      $_SESSION['usu_foto']=$filas2['foto'];
      
      echo '<script>window.location.href="num2.php"</script>'; 
    }else{
      ?>
      <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Ciudado!',
      text: "Contraseña Incorrecta",
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

  elseif ($filas3=mysqli_fetch_array($resultado3)) {
    if ($clave == $filas3['clave']) {
      
      $_SESSION['usu_usuario']=$filas3['usuario'];
      $_SESSION['usu_correo']=$filas3['correo'];
      
     echo '<script>window.location.href="num4.php"</script>';
    }else{
     ?>
      <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Ciudado!',
      text: "Contraseña Incorrecta",
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
}else{
      ?>
      <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Datos Incorrectos!',
      text: "Intente nuevamente",
      type: 'question',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK!',
      allowOutsideClick: false
    });

    $(".swal2-modal").css('background-color', '#00FF46');//Optional changes the color of the sweetalert 
        $(".swal2-container.in").css('background-color', 'rgba(43, 165, 137, 0.45)');//changes the color of the overlay


  });
</script>
<?php
      }
}
?>
                <br>
                <a href="contra_ne.php"> Olvido su contraseña</a>
                 <br>
                <a href="politica.php"> Politicas de privacidad</a>
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