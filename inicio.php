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
	<title>Programador</title>
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


<!------------------------------------menu------------------------------------------>
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
        <form class="form-inline my-0 my-lg-0">
          <a class="nav-link" href="https://accounts.google.com/ServiceLogin/signinchooser?service=mail&passive=true&rm=false&continue=https%3A%2F%2Fmail.google.com%2Fmail%2F&ss=1&scc=1&ltmpl=default&ltmplcache=2&emr=1&osid=1&flowName=GlifWebSignIn&flowEntry=ServiceLogin">huilaganadero@gmail.com</a>
      </form>
        <form class="form-inline my-0 my-lg-0">
           <a class="nav-link text-danger border border-danger rounded" href="cerrar.php">Salir</a>
      </form>
      
   
  </ul>
  </div>
</nav>
<br>

<!--------------------------------- menu izquierdo------------------------------------->

	<div class="row">
  
  		<div class="col-5 col-sm-4 col-md-4 col-lg-3 col-xl-3 ">
      
  	   
    		<div class="list-group" id="list-tab" role="tablist">
    			<br><br>
          
    			<a class="list-group-item-action list-group-item list-group-item-success" href="programer.php"><b> Logo</b><blockquote class="blockquote text-center"><img src="img/logo.png" class="img-fluid" alt="Responsive image"></blockquote></a>
      
      		<a class=" list-group-item-action active list-group-item list-group-item-success" href="inicio.php"><img src="img/menu.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Inicio</b></a>
      
    			<a class="list-group-item-action  list-group-item list-group-item-success" href="administradores.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Administradores registrados</b></a>
      
    			<a class="list-group-item-action list-group-item list-group-item-success" href="usuarios.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Usuarios registrados</b></a>

    			<a class="list-group-item-action list-group-item list-group-item-success" href="finca.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Fincas registradas</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="contactos.php"><img src="img/cont.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Contactos</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="informacion.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

    		</div>
		</div>
  
	
<!------------------------------contenido menu -------------------------------------->

		<div class="col-7 col-sm-8 col-md-8 col-lg-9 col-xl-9">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
				</div>
<!------------------------------------ inicio--------------------------------------------->
     			<div class="tab-pane fade show active" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
            <?php  
            require "conexion.php";
            $result_1 = mysqli_query($conexion,"SELECT *  FROM  programer WHERE codigo_pro='1615944'");
            $mostrar = mysqli_fetch_array($result_1);
            ?>
            <h1 class="text-center">Actualizar imagenes del slider</h1>
             <br><br><br>
              <div class="container">
                <div class="row">
                  <div class="col-7 col-sm-7 col-md-6 col-lg-4 col-xl-4">
                    <form action="editar.php" method="post" enctype="multipart/form-data">
                    <div class="card" style="width: 15rem;">
                    <img src="<?php echo $mostrar['f1']; ?>" width="200" height="200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Imagen 1</h5>
                      <div class="form-group">
                          <input type="file" class="form-control-file" id="imagen" name="imagen" required>
                      </div>
                    </div>
                    </div>
                  </div>
              <div class="col-7 col-sm-7 col-md-4 col-lg-4 col-xl-4">   
                <div class="card" style="width: 15rem;">
                    <img src="<?php echo $mostrar['img2']; ?>" width="200" height="200" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">Imagen 2</h5>
                        <div class="form-group">
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen2" required>
                        </div>
                      </div>
                </div>
              </div>

              <div class="col-7 col-sm-7 col-md-7 col-lg-4 col-xl-3">   
                <div class="card" style="width: 15rem;">
                    <img src="<?php echo $mostrar['img3']; ?>" width="200" height="200" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Imagen 3</h5>
                      <div class="form-group">
                        <input type="file" class="form-control-file" id="imagen3" name="imagen3" required>
                      </div>
                    </div>
                </div>
              </div>


            
            <div class="row">
              <div class="col-11 col-sm-6 col-md-8 col-lg-9 col-xl-9">
                <br>
                <p>Las imagenes deben ser del mismo tamaño</p>
              </div>
              <div class="col-2 col-sm-4 col-md-4 col-lg-2 col-xl-1">
                <br>
                <blockquote class="blockquote text-center"><input type="submit" name="slider2" value="Guardar cambios" class="btn btn-info"></blockquote>
              </div>
            </div>
             </form>
        </div>

        </div>     
        </div>
<!-------------------------- administrado resregistrados------------------------>

	    		<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
    		</div>
<!----------------------------- usuarios registrados--------------------------->

      		<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">  
      		</div>
<!---------------------------- fincas registradas------------------------------->
      		<div class="tab-pane fade" id="list-form" role="tabpanel" aria-labelledby="list-settings-list">    
      		</div>
<!-----------------------------contenido informacion---------------------------->

      		<div class="tab-pane fade" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">			
  	      </div>
        </div>
      </div>
    </div>
</body>
</html>