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
	<title>Administrador</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
<!--sweetalert-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
<!--bootstrap-->
   <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
<!--database-->  
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

</head>

<body>

<!--------------------------------------menu------------------------------------------------------------------------>

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
        $result_1 = mysqli_query($conexion,"SELECT *  FROM administrador WHERE codigo_finca='$cod'and correo='$core'");
                      $mostra = mysqli_fetch_array($result_1);
        ?>
        <img src="<?php echo $mostra['foto']; ?>" width="360" height="360" alt="avatar" class="rounded-circle img-responsive">
      </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">

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


        <div class="text-center mt-4">
          <a href="perfil.php" class="btn btn-success">Editar tu perfil</a> 
        </div>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->

<div class="text-center">
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
      
        <form class="form-inline my-0 my-lg-0">
          <a class="nav-link" href=""><?php echo $_SESSION['usu_finca']; ?></a>
      </form>
        <form class="form-inline my-0 my-lg-0">
           <a class="nav-link text-danger border border-danger rounded" href="cerrar.php">Salir</a>
      </form>
      
   
  </ul>
     <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <form class="form-inline my-0 my-lg-0">
          <a class="nav-link" href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin"><?php echo $mostra['correo']; ?></a>
      </form>
    </li>
  </ul>
</div>
  </div>

 

</nav>

  <br>
<!---------------------------------menu izquierdo----------------------------------->

  <div class="row">
  
      <div class="col-2">
    
        <div class="list-group" id="list-tab" role="tablist">
        
          <br><br>

          <a class="list-group-item-action list-group-item list-group-item-success" href="admin.php"><b> Logo</b><blockquote class="blockquote text-center"><img src="<?php echo $mostra['foto']; ?>" width="200" height="200" class="img-fluid rounded-circle" alt="Responsive image"></blockquote></a>
      
          <a class="list-group-item-action list-group-item list-group-item-success"  href="tufinca.php"><img src="img/menu.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Tu finca</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="usuariosusu.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Usuarios</b></a>

          <a class="list-group-item-action active list-group-item list-group-item-success" href="informacionadmin.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="razas.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Razas</b></a>

          <a class="list-group-item list-group-item-action list-group-item list-group-item-success" href="registros.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Registros</b></a>

            <a class="list-group-item-action list-group-item list-group-item-success" href="valance.php"><img src="img/208.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Balance</b></a>

      			<a class=" list-group-item list-group-item-success"><br><br></a>
    		</div>
		</div>
	
<!---------------------------------logo------------------------------------->
		<div class="col-10">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
<!---------------------------------tu finca--------------------------------->
      		<div class="tab-pane fade" id="list-former" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!----------------------------usuarios registrados-------------------------->
          <div class="tab-pane fade" id="list-usu" role="tabpanel" aria-labelledby="list-usu-list"></div>
<!-------------------------------informacion-------------------------------->
      		<div class="tab-pane fade show active" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">
      			<div class="container">

              <form action="informacionadmin.php" method="post" enctype="multipart/form-data">

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Contenido: información</h1></a>
                  
              </nav>
              <br><br>

				<div class="row">
      					<div class="col-4">		
							<div class="card" style="width: 20rem; height: 17rem;" >
  								<img src="<?php echo $_SESSION['usu_foto']; ?>" width="950" height="280" class="card-img-top" alt="...">
  									<div class="card-body">
    									
    									
                    </div>
							</div>
						</div>
					
						<div class="col-8">
							<div class="form-group">
              <label for="exampleFormControlTextarea1" >Descripción</label>
                <textarea class="form-control" id="descripcion_cat" name="descripcion_cat" rows="10" required></textarea>
              </div>
            </div>
							
				</div>
				<br>
				<blockquote class="blockquote text-center"><input type="submit" name="enviar_descri" value="Guardar cambios" class="btn btn-info"></blockquote>

      </form>
      			</div>
            <?php  
            if (isset($_POST['enviar_descri'])) {
              require "conexion.php";
             $cod= $_SESSION['usu_usuario'];
             $foto= $_SESSION['usu_foto'];
             $cod2= $_SESSION['usu_finca'];
            $descripcion= $_POST['descripcion_cat'];

            $t_7 = mysqli_query($conexion,"SELECT informacion FROM  informacion1 where informacion='$descripcion'");
                   if ($n=mysqli_fetch_array($t_7)) {
                     ?>
                     <script>
function alerta(){
 swal({
   title: "¡ERROR!",
   text: "La información ya se encuentra registrada",
   type: "error",
 });
}
     alerta(); 
</script>
                     <?php
                   }else{
            $actualizar="INSERT INTO informacion1 (informacion,img_informacion,usuario,codigo_finca)values('$descripcion','$foto','$cod','$cod2')";
            $res=mysqli_query($conexion, $actualizar);
              ?>
             <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Buen trabajo!',
      text: "Información agregada!",
      type: 'success',
      confirmButtonColor: '#3085d6',
      confirmButtonText: 'OK!',
      allowOutsideClick: false 
    })



  });
</script>
             <?php 
             }
             }
            ?>

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Información agregada</h1></a>
                  
              </nav>

              <br>

          <div class="row">
              <?php  
              $cod= $_SESSION['usu_finca'];
              $result_1 = mysqli_query($conexion,"SELECT *  FROM informacion1 WHERE codigo_finca='$cod'");
                      $a=0;
                      while ( $mostra = mysqli_fetch_array($result_1)) {  
                         $a++;
        ?>

                  <div class="col-4 mb-5">
                    <div class="card" style="width: 18rem;">
  <img src="<?php echo $mostra['img_informacion']; ?>" width="900" height="210" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Información</h5>
    <p class="card-text"><?php echo $mostra['informacion']; ?></p>
    <div class="d-flex justify-content-center">
    <div class="col-6">
      <form action="eliminar.php" method="post">
      <input type="hidden" name="subirtg" value="<?php echo $mostra['informacion'];?>">
      <input type="hidden" name="subirtd" value="<?php echo $mostra['codigo_finca'];?>">
    </div>
    <div class="col-12">
    
      <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $a?>">
  Eliminar
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $a?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       Esta seguro de eliminar esta información
      </div>
      <div class="modal-footer">
          <input type="hidden" name="subirtg" value="<?php echo $mostra['informacion'];?>">
      <input type="hidden" name="subirtd" value="<?php echo $_SESSION['usu_finca'];?>">
      
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name="u_elim" value="Eliminar" class="btn btn-danger">
      </div>
    </div>
  </div>
</div>

    </div>
    </form>
    </div>
  </div>
</div>
                  </div>
                
              <?php 
              }
              ?>

              </div>
              
              
			</div>
<!----------------------razas registradas---------------------------------->
      		<div class="tab-pane fade" id="list-raz" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!---------------------------- registros------------------------------------>
      		<div class="tab-pane fade" id="list-reg" role="tabpanel" aria-labelledby="list-profile-list">
      			</div>
<!----------------------------- balance------------------------------------->
      		<div class="tab-pane fade" id="list-valan" role="tabpanel" aria-labelledby="list-settings-list">
           
          </div>      
    	</div>
  	</div>
  	</div>
</body>
</html>