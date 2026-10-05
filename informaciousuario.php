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
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

   <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<!--database-->
   
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
  
  
</head>

<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="#"><img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" class="display-1">Huila ganadero</a>
 
  <ul class="navbar-nav mr-auto">
    <form class="form-inline my-0 my-lg-0">
     <div class="modal fade" id="modalLoginAvatar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content" style="width: 25rem">

      <!--Header-->
      <div class="modal-header">
        <?php  
        $cod= $_SESSION['usu_finca'];
        $core= $_SESSION['usu_correo'];
        $result_1 = mysqli_query($conexion,"SELECT *  FROM usuario WHERE codigo_finca='$cod' and correo='$core'");
                      $mostra = mysqli_fetch_array($result_1);
        ?>
        <img src="<?php echo $mostra['foto']; ?>" width="360" height="360" alt="avatar" class="rounded-circle img-responsive">
      </div>
      <!--Body-->
      <div class="modal-body text-center mb-2" >

        <h5 class="mt-1 mb-2"><b><?php echo $mostra['usuario']; ?></b></h5>
        <br>
        <div class="md-form ml-1 mr-1">
          <fieldset disabled>
          <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label"><b>Usuario:</b></label>
          <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword" placeholder="<?php echo $_SESSION['usu_usuario']; ?>">
          </div>
         </div>
         <br>
          <div class="form-group row">
          <label for="inputPassword" class="col-sm-3 col-form-label"><b>Gmail:</b></label>
          <div class="col-sm-9">
          <input type="password" class="form-control" id="inputPassword" placeholder="<?php echo $_SESSION['usu_correo']; ?>">
          </div>
         </div>
        </fieldset>
        </div>


        <div class="text-center mt-4" >
          <a href="perfilusuario.php" class="btn btn-success">Editar tu perfil</a> 
        </div>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->

<div class="text-center" >
  <a href="" class="btn btn-default text-light bg-dark" data-toggle="modal" data-target="#modalLoginAvatar"><?php echo $mostra['usuario']; ?></a>
</div>
    </form>
   </ul>
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
        <form class="form-inline my-2 my-lg-0">
      <a class="nav-link text-danger border border-danger rounded" href="cerrar.php">Salir</a>
    </form>
    </li>
  </ul>
  <ul class="navbar-nav mr-auto">
    <form class="form-inline my-0 my-lg-0">
          <a class="nav-link" href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><?php echo $mostra['correo']; ?></a>
      </form>
    <form class="form-inline my-0 my-lg-0">
        <a class="nav-link" href=""><?php echo $_SESSION['usu_finca']; ?></a>
    </form>  
  </ul>

  </div>
</div>
</nav>

	<br>

	<div class="row">
  
  		<div class="col-2">
  	
    		<div class="list-group" id="list-tab" role="tablist">
				
    			<br><br><br>

    			<a class="list-group-item-action list-group-item list-group-item-success" href="usuario.php"><b> Foto</b><blockquote class="blockquote text-center"><img src="<?php echo $_SESSION['usu_foto']; ?>" width="200" height="200" style="border-radius: 50%;" class="img-fluid rounded-circle" alt="Responsive image"></blockquote></a>

          <a class="list-group-item-action active list-group-item list-group-item-success" href="informaciousuario.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="razasusuario.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Razas</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="registrousuario.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Registros</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="balanceusuario.php"><img src="img/208.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Balance</b></a>

            <a class=" list-group-item list-group-item-success"><br><br></a>
    		</div>
		</div>
	
<!------------------------------------ logo--------------------------------------------->

		<div class="col-10">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
              
				</div>
<!------------------------------------informacion--------------------------------------->
      		<div class="tab-pane fade show active" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">
          <h2>Contenido: información</h2>
          <div class="row">
           <?php  
            $cod= $_SESSION['usu_finca'];
            $consulta= mysqli_query($conexion,"SELECT * FROM informacion1 where codigo_finca='$cod'");

            while ($mostrar3= mysqli_fetch_array($consulta)) {
            
            ?>
          <div class="col-6">
      					
					   
            <div class="card" style="width: 25rem;">
              <img src="<?php echo $mostrar3['img_informacion'] ?>" width="100" height="250" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">Contenido</h5>
                      <p class="card-text"><?php echo $mostrar3['informacion']; ?></p>
                        
                </div>
            </div>
            </div>
          
      
            <br>
            <?php  
          }
            ?>
            </div>


			</div>

<!------------------------------ razas registradas-------------------------------------->

      		<div class="tab-pane fade" id="list-raz" role="tabpanel" aria-labelledby="list-settings-list">
          
          </div>

<!------------------------------------ registros--------------------------------------->

          <div class="tab-pane fade" id="list-reg" role="tabpanel" aria-labelledby="list-profile-list">
           
          </div>

<!------------------------------------ balance--------------------------------------->

      		<div class="tab-pane fade" id="list-valan" role="tabpanel" aria-labelledby="list-settings-list">
          </div>      
    	</div>
  	</div>
  	</div>
    <br>
</body>
</html>