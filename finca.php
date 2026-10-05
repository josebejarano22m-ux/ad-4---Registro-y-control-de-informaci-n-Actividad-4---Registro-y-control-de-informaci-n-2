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
          
    			<a class="list-group-item-action list-group-item list-group-item-success" href="programer.php"><b> Foto</b><blockquote class="blockquote text-center"><img src="img/logo.png" class="img-fluid" alt="Responsive image"></blockquote></a>
      
          <a class=" list-group-item-action list-group-item list-group-item-success" href="inicio.php"><img src="img/menu.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Inicio</b></a>
      
          <a class="list-group-item-action list-group-item list-group-item-success" href="administradores.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Administradores registrados</b></a>
      
          <a class="list-group-item-action list-group-item list-group-item-success" href="usuarios.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Usuarios registrados</b></a>

    			<a class="list-group-item-action active list-group-item list-group-item-success" href="finca.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Fincas registradas</b></a>

    			<a class="list-group-item-action list-group-item list-group-item-success" href="contactos.php"><img src="img/cont.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Contactos</b></a>

      		<a class="list-group-item-action list-group-item list-group-item-success" href="informacion.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

    		</div>
		</div>
  
	
<!---------------------------contenido menu ------------------------------------>

		<div class="col-7 col-sm-8 col-md-8 col-lg-9 col-xl-9">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
<!---------------------------------- inicio------------------------------------->
     			<div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list"></div>
<!----------------------------- administradores registrados---------------------------->
	    		<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"></div>
<!---------------------------- usuarios registrados----------------------------->
      		<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">     </div>
<!---------------------------- fincas registradas------------------------->
      		<div class="tab-pane fade show active" id="list-form" role="tabpanel" aria-labelledby="list-settings-list">
      	
      			 <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Fincas registradas</h1></a>
                  <form class="form-inline my-2 my-lg-0" method="post" action="finca.php" enctype="multipart/form-data">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#nuev">Nueva finca
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="nuev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Agregar nueva finca</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              	<div class="container">
                                	<div class="row">
                                   		<label for="formGroupExampleInput">Codigo de la finca</label>
                                	</div>

                                	<div class="row">
                                   		<input type="number" class="form-control" id="formGroupExampleInput" placeholder="codigo" size="52%" name="codigo">
                                	</div>
                                	
                                	<div class="row">
                                   		<label for="formGroupExampleInput">Nombre de la finca</label>
                                	</div>

                                	<div class="row">
                                   		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="nombre" size="52%" name="nombre">
                                	</div>
                                	<div class="row">
                                   		<label for="formGroupExampleInput">Municipio</label>
                                	</div>

                                	<div class="row">
                                   		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="municipio" size="52%" name="municipio">
                                	</div>
                                	<div class="row">
                                   		<label for="formGroupExampleInput">Vereda</label>
                                	</div>

                                	<div class="row">
                                   		<input type="text" class="form-control" id="formGroupExampleInput" placeholder="vereda" size="52%" name="vereda">
                                	</div>
                                	<div class="row">
                                   		<label for="formGroupExampleInput">Area total</label>
                                	</div>

                                	<div class="row">
                                   		<input type="number" class="form-control" id="formGroupExampleInput" placeholder="area en hectares" size="52%" name="area">
                                	</div>
                                  <br>
                                	<div class="row">
										<div class="card" style="width: 20rem;">
  											<img src="img/finca.jpg" height="150" class="card-img-top" alt="...">
  											<div class="card-body">
    											<h5 class="card-title">Imagen de perfil</h5>
    											<div class="form-group">
                                  					<input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
                                				</div>
  											</div>
										</div>
									</div>
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="registrar_fin" value="Agregar" class="btn btn-info">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
              </nav>

              <br>
              
              

              <script>
  $(document).ready(function() {
    $('#expe').DataTable({
        language:{
             "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Por favor registra una finca",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
        }
    });
} );
  </script>
  <table id="expe" class="table table-striped table-bordered" style="width:100%">
        <thead class="bg-success">
            <tr class="text-center">
                <th>N° fincas</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Municipio</th>
                <th>Vereda</th>
                <th>Area total</th>
                <th>Foto</th>
                <th>Eliminar</th>
                
            </tr>
        </thead>
        <tbody>
                <?php 
                  require "conexion.php";
                      $result_1 = mysqli_query($conexion,"SELECT * FROM finca");
                          $a=1;
                          while ($mostrar = mysqli_fetch_array($result_1)) {
                                                    
               ?>
                  <tr>
                      <td ><?php echo $a++; ?></td>
                      <td><?php echo $mostrar['codigo']; ?></td>
                      <td><?php echo $mostrar['nombre_fin']; ?></td>
                      <td><?php echo $mostrar['municipio']; ?></td>
                      <td><?php echo $mostrar['vereda']; ?></td>
                      <td><?php echo $mostrar['area']; ?></td>
                      <td><img src="<?php echo $mostrar['foto']; ?>" width="50" height="50"></td>
                      <td>
                      	<form class="form-inline my-2 my-lg-0" action="eliminar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del<?php echo $a; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            	
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                              	<div class="container">
                                	<div class="row">
                                   		<label for="formGroupExampleInput">Desea <br> <b> eliminar a <br> </b> <?php echo $mostrar['nombre_fin']; ?> de sus registros</label>
                                      <input type="hidden" name="carga3" value="<?php echo $mostrar['codigo'];?>">
                                	</div>

                                	<br>
                                	
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="eli_f" value="Eliminar" class="btn btn-danger">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
                      </td>
                  </tr>
                
                <?php  
                }
                ?>
                <?php
                if (isset($_POST['registrar_fin'])) {
                  
                  $codigo= $_POST['codigo'];
                  $re_1 = mysqli_query($conexion,"SELECT codigo  FROM  finca where codigo='$codigo'");
                  $mostra = mysqli_fetch_array($re_1);
                  if ($codigo == $mostra['codigo']) {
                    ?>
                    <script>
function alerta(){
 swal({
   title: "¡ERROR!",
   text: "Este codigo ya esta registrado",
   type: "error",
 });
}
     alerta(); 
</script>

                    <?php
                  }else{
                  $nombre= $_POST['nombre'];
                  $municipio= $_POST['municipio'];
                  $vereda= $_POST['vereda'];
                  $area= $_POST['area'];

                  $nombre_img= $_FILES['imagen']['name'];
                  if ($nombre_img=='') {
                    $nombre_img= "finca.jpg";
                    $ruta="img";
                    $ruta= $ruta."/".$nombre_img;
                    $insert="INSERT INTO  finca values ('$codigo','$nombre','$municipio','$vereda','$area','$ruta')";
                    $res=mysqli_query($conexion, $insert);
                  }
                  $archivo=$_FILES['imagen']['tmp_name'];

                  $ruta="img";
                  $ruta= $ruta."/".$nombre_img;

                  move_uploaded_file($archivo, $ruta);

                  $insert="INSERT INTO  finca values ('$codigo','$nombre','$municipio','$vereda','$area','$ruta')";
                  $res=mysqli_query($conexion, $insert);
                  ?>
                  <script LANGUAGE="javascript">
  $(document).ready(function() {

    swal({
      title: 'Buen trabajo!',
      text: "Se ha registrado con éxito la finca!",
      type: 'success',
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

                      $res_2 = mysqli_query($conexion,"SELECT * FROM  finca where codigo='$codigo'");

                  
                  while ($mostrar2 = mysqli_fetch_array($res_2)) {
                  ?>
                 <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                      <td><?php echo $mostrar2['codigo']; ?></td>
                      <td><?php echo $mostrar2['nombre_fin']; ?></td>
                      <td><?php echo $mostrar2['municipio']; ?></td>
                      <td><?php echo $mostrar2['vereda']; ?></td>
                      <td><?php echo $mostrar2['area']; ?></td>
                      <td><img src="<?php echo $mostrar2['foto']; ?>" width="50" height="50"></td>
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="eliminar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#del<?php echo $a; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="del<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Desea <br> <b> eliminar a <br> </b> <?php echo $mostrar2['codigo']; ?> de sus registros</label>
                                      <input type="hidden" name="carga3" value="<?php echo $mostrar2['nombre_fin'];?>">
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="eli_f" value="Eliminar" class="btn btn-danger">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
                      </td>
                  </tr>
                  <?php  
                  }
                  }
                  }
                ?>
                </tbody>
              </table> 
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