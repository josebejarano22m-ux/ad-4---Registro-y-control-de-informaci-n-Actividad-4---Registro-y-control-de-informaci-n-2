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
          
    			<a class="list-group-item-action active list-group-item list-group-item-success" href="programer.php"><b> Logo</b><blockquote class="blockquote text-center"><img src="img/logo.png" class="img-fluid" alt="Responsive image"></blockquote></a>
      
      		<a class=" list-group-item-action list-group-item list-group-item-success" href="inicio.php"><img src="img/menu.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Inicio</b></a>
      
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

    			<div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
            <?php  
            require "conexion.php";
            $result_1 = mysqli_query($conexion,"SELECT *  FROM  programer WHERE codigo_pro='1615944'");
            $mostrar = mysqli_fetch_array($result_1);
            ?>

      				<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  						<div class="carousel-inner">
    						<div class="carousel-item active">
        						<img src="<?php echo $mostrar['f1']; ?>" width="98" height="250" class="d-block w-100" alt="...">
    						</div>
    					
    						<div class="carousel-item">
      							<img src="<?php echo $mostrar['img2']; ?>" width="98" height="250" class="d-block w-100" alt="...">
    						</div>
    				
    						<div class="carousel-item">
      							<img src="<?php echo $mostrar['img3']; ?>" width="98" height="250" class="d-block w-100" alt="...">
    						</div>
  						</div>
					</div>
					
      				<blockquote class="blockquote text-center"><h1>Bienvenido al administrador de Huila ganadero</h1></blockquote>
     
      				<blockquote class="blockquote text-center"><img src="img/logo.png" class="img-fluid" alt="Responsive image">
      				<p>Una forma mas facil para ingresar tu información</p>
      				<p> y ahorrar mucho tiempo</p></blockquote>
      	
				</div>
<!------------------------------------ inicio--------------------------------------------->
     			<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">

                 
        </div>

          

<!----------------------------- administradores registrados---------------------------->

	    		<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
    			 
    		</div>

<!----------------------------- usuarios registrados----------------------------------->

      		<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">         
      		</div>
<!---------------------------- fincas registradas------------------------->
      		<div class="tab-pane fade" id="list-form" role="tabpanel" aria-labelledby="list-settings-list">
      	
      			  
			</div>
<!----------------------------mensajeria---------------------------------------------->
      		<div class="tab-pane fade" id="list-former" role="tabpanel" aria-labelledby="list-settings-list">
      			    
      		</div>
<!--contenido informacion-->
      		<div class="tab-pane fade" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">
  	      </div>
        </div>
      </div>
    </div>
</body>
</html>