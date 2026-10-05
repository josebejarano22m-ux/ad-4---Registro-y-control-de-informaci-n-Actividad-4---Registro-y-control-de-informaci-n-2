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

          <a class="list-group-item-action list-group-item list-group-item-success" href="admin.php"><b> Foto</b><blockquote class="blockquote text-center"><img src="<?php echo $mostra['foto']; ?>" width="200" height="200" class="img-fluid rounded-circle" style="border-radius: 50%;" alt="Responsive image"></blockquote></a>
      
          <a class="list-group-item-action list-group-item list-group-item-success"  href="tufinca.php"><img src="img/menu.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Tu finca</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="usuariosusu.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Usuarios</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="informacionadmin.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

          <a class="list-group-item-action active list-group-item list-group-item-success" href="razas.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Razas</b></a>

          <a class="list-group-item list-group-item-action list-group-item list-group-item-success" href="registros.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Registros</b></a>

            <a class="list-group-item-action list-group-item list-group-item-success" href="valance.php"><img src="img/208.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Balance</b></a>

      			<a class=" list-group-item list-group-item-success"><br><br></a>
    		</div>
		</div>
	
<!------------------------------------logo--------------------------------------------->

		<div class="col-10">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
				</div>

<!-------------------------------------tu finca---------------------------------------->
   
      		<div class="tab-pane fade" id="list-former" role="tabpanel" aria-labelledby="list-settings-list">
            </div>

<!------------------------------usuarios registrados----------------------------------->

          <div class="tab-pane fade" id="list-usu" role="tabpanel" aria-labelledby="list-usu-list">

            
          </div>


<!------------------------------------informacion-------------------------------------->

      		<div class="tab-pane fade" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">
      			</div>

<!----------------------razas registradas------------------------------------------------------------------>

      		<div class="tab-pane fade show active" id="list-raz" role="tabpanel" aria-labelledby="list-settings-list">
      			 <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Razas registradas</h1></a>
                  <form class="form-inline my-2 my-lg-0" action="razas.php" method="post" enctype="multipart/form-data">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#raz_new">Nueva raza
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="raz_new" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Agregar nueva raza</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Nombre de la raza</label>
                                  </div>

                                  <div class="row">
                                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nombre" size="52%" name="nombre" required>
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="card" style="width: 29rem;">
                                       <img src="img/descarga.jpg" class="card-img-top" alt="...">
                                       <div class="card-body">
                                        <h5 class="card-title">Imagen</h5>
                                           <div class="form-group">
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
                                        </div>
                        </div>
                    </div>
                  </div>
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="registrar_raz" value="Agregar" class="uno">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
              </nav>

              <br>


              <script>
                $('#example').DataTable( {
    responsive: true;
} );
              </script>
 
              <script>
  $(document).ready(function() {
    $('#example').DataTable({
        language:{
             "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Por favor registra una raza",
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
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead class="bg-success">
            <tr class="text-center">
                <th>N° razas</th>
                <th>Foto</th>
                <th>Raza</th>
                <th>Editar</th>
                <th>Registro</th>
                <th>Eliminar</th>  
            </tr>
        </thead>
        <tbody>
                <?php 
                  require "conexion.php";
                    $cod= $_SESSION['usu_finca'];
                      $result_1 = mysqli_query($conexion,"SELECT * FROM  razas WHERE codigo_finca='$cod'");
                          $a=1;
                          $c=3;
                          $d=3; 
                          while ($mostrar = mysqli_fetch_array($result_1)) {
                          $c++;
                          $d++;
                                                    
               ?>
               
                  <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                      <td><img src="<?php echo $mostrar['img']; ?>" width="50" height="50"></td>
                      <td><?php echo $mostrar['nombre']; ?></td>
                      <td>
                        <form class="form-inline my-0 my-lg-0" action="editar.php" method="post" enctype="multipart/form-data">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edi<?php echo $c; ?>">Editar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edi<?php echo $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="text-center">
                                        <input type="hidden" name="subirnom" value="<?php echo $mostrar['nombre'];?>">
                                        <input type="hidden" name="subirfin" value="<?php echo $_SESSION['usu_finca'];?>">
                                        <div class="container">
                                        <input type="hidden" name="subirnum" value="<?php echo $mostrar['num'];?>">
                                        <div class="container">
                                          
                                          <div class="row">
                                            Desea editar este campo <?php echo $mostrar['nombre']; ?>
                                          </div>
                                          <div class="row">
                                            <div class="col-xl-6">
                                            <div class="card" style="width: 20rem;">
                                       <img src="img/descarga.jpg" class="card-img-top" alt="...">
                                       <div class="card-body">
                                        <h5 class="card-title">Imagen</h5>
                                           <div class="form-group">
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
                                        </div>
                                        </div>
                                          </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                            <label for="formGroupExampleInput">Nombre raza</label>
                                          </div>
                                          <div class="row">
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nom_raza" size="30%" name="nuevo_nombre">
                                          </div>
                                        </div>
                                        
                                      </label>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="cambiar_raz" value="Editar" class="btn btn-info">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
                      </td>
                      <td>
                        <form class="form-inline my-2 my-lg-0"  action="razas.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrar<?php echo $c; ?>">Registrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="registrar<?php echo $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">
                                <input type="hidden" name="subir" value="<?php echo $mostrar['nombre'];?>">
                                Registro mensual de la vaca <?php echo $mostrar['nombre']; ?> 
                            </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Cantidad de cabezas de ganado</label>
                                  </div>

                                  <div class="row">
                                      <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="cantidad_vacas">
                                  </div>
                                  <br>
                                  <div class="row">
                                      <label for="formGroupExampleInput">Cantidad de litros de leche mensuales</label>
                                  </div>

                                  <div class="row">
                                      <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="cantidad_litros">
                                  </div>
                                  <br>
                                  
                                  <div class="row">
                                      <label for="formGroupExampleInput">Descripción</label>
                                  </div>

                                  <div class="row">
                                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="descripcion o datos relevantes" size="50%" name="descripcion">
                                  </div>
                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="regis_2" value="Guardar registro" class="btn btn-primary">
                            </div>

                          </div>
                      </div>
                    </div>
                  </form>
                  
                      </td>
                      
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="eliminar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eli<?php echo $d; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="eli<?php echo $d; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">
                                        <input type="hidden" name="subir" value="<?php echo $mostrar['nombre'];?>">
                                        <input type="hidden" name="codigo" value="<?php echo $_SESSION['usu_finca'];?>">
                                        <img src="img/figure_picking_up_trash_md_wm_v2.gif">
                                        Desea eliminar esta raza de su finca: <?php echo $mostrar['nombre']; ?></label>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="eli_m" value="Eliminar" class="btn btn-danger">
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
                if (isset($_POST['registrar_raz'])) {
                  $fin= $_SESSION['usu_finca'];
                  $nom= $_POST['nombre'];
                  $beri= mysqli_query($conexion,"SELECT nombre FROM razas WHERE codigo_finca='$fin'");
                  $full= mysqli_fetch_array($beri);
                  if ($nom== $full['nombre']) {
                    ?>
                    <script>
function alerta(){
 swal({
   title: "¡ERROR!",
   text: "Raza ya registrada",
   type: "warning",
 });
}
     alerta(); 
</script>
                    <?php
                  }else{
                  
                  $nombre_img= $_FILES['imagen']['name'];
                  if ($nombre_img=='') {
                    $nombre_img= "cow-head-icon.png";
                    $ruta="img";
                    $ruta= $ruta."/".$nombre_img; 
                    $insert="INSERT INTO  razas (nombre,img,codigo_finca)values ('$nom','$ruta','$fin')";
                    $res=mysqli_query($conexion, $insert);
                    ?>
                    <script>
function alerta(){
 swal({
   title: "¡Listo!",
   text: "Has registrado una nueva raza",
   type: "success",
 });
}
     alerta(); 
</script>
                    <?php
                    $cod= $_SESSION['usu_finca'];
                      $result_3 = mysqli_query($conexion,"SELECT nombre, img FROM  razas WHERE codigo_finca='$cod' and nombre='$nom'");
                          while ($mostrar3 = mysqli_fetch_array($result_3)) {
                          $c++;
                          $d++;
                                                    
               ?>
                  <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                      <td><img src="<?php echo $mostrar3['img']; ?>" width="50" height="50"></td>
                      <td><?php echo $mostrar3['nombre']; ?></td>
                      <td>
                        <form class="form-inline my-0 my-lg-0" action="editar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edi<?php echo $c; ?>">Editar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edi<?php echo $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="text-center">
                                        <input type="hidden" name="subir" value="<?php echo $mostrar3['nombre'];?>">
                                        <div class="container">
                                          <div class="row">
                                            Desea editar este campo <?php echo $mostrar['nombre']; ?>
                                          </div>
                                          <div class="row">
                                            <div class="col-xl-6">
                                            <div class="card" style="width: 20rem;">
                                       <img src="img/descarga.jpg" class="card-img-top" alt="...">
                                       <div class="card-body">
                                        <h5 class="card-title">Imagen</h5>
                                           <div class="form-group">
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagenv">
                                        </div>
                                        </div>
                                          </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                            <label for="formGroupExampleInput">Nombre raza</label>
                                          </div>
                                          <div class="row">
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="nuevo_nombre">
                                          </div>
                                        </div>
                                        
                                      </label>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="cambiar_raz" value="Editar" class="btn btn-info">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
                      </td>
                      <td>
                        <form class="form-inline my-2 my-lg-0"  action="razas.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrar<?php echo $c; ?>">Registrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="registrar<?php echo $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">
                                <input type="hidden" name="subir" value="<?php echo $mostrar3['nombre'];?>">
                                Registro mensual de la vaca <?php echo $mostrar3['nombre']; ?> 
                            </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Cantidad de cabezas de ganado</label>
                                  </div>

                                  <div class="row">
                                      <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="cantidad_vacas">
                                  </div>
                                  <br>
                                  <div class="row">
                                      <label for="formGroupExampleInput">Cantidad de litros de leche mensuales</label>
                                  </div>

                                  <div class="row">
                                      <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="cantidad_litros">
                                  </div>
                                  <br>
                                  
                                  <div class="row">
                                      <label for="formGroupExampleInput">Descripción</label>
                                  </div>

                                  <div class="row">
                                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="descripcion o datos relevantes" size="50%" name="descripcion">
                                  </div>
                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="regis_2" value="Guardar registro" class="btn btn-primary">
                            </div>

                          </div>
                      </div>
                    </div>
                  </form>
                  
                      </td>
                      
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="razas.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eli<?php echo $d; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="eli<?php echo $d; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">
                                        <input type="hidden" name="subir" value="<?php echo $mostrar3['nombre'];?>">
                                        Desea eliminar esta raza de su finca: <?php echo $mostrar['nombre']; ?></label>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="eli_m" value="Eliminar" class="btn btn-danger">
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
                  }else{

                  $archivo=$_FILES['imagen']['tmp_name'];

                  $ruta="img";
                  $ruta= $ruta."/".$nombre_img;

                  move_uploaded_file($archivo, $ruta);

                  $insert="INSERT INTO  razas (nombre,img,codigo_finca) values ('$nom','$ruta','$fin')";
                  $res=mysqli_query($conexion, $insert);
                  ?>
                    <script>
function alerta(){
 swal({
   title: "¡Listo!",
   text: "Has registrado una nueva raza",
   type: "success",
 });
}
     alerta(); 
</script>
                    <?php

                  $cod= $_SESSION['usu_finca'];
                      $result_3 = mysqli_query($conexion,"SELECT nombre, img FROM  razas WHERE codigo_finca='$cod' and nombre='$nom'");
                          while ($mostrar3 = mysqli_fetch_array($result_3)) {
                          $c++;
                          $d++;
                                                    
               ?>
                  <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                      <td><img src="<?php echo $mostrar3['img']; ?>" width="50" height="50"></td>
                      <td><?php echo $mostrar3['nombre']; ?></td>
                      <td>
                        <form class="form-inline my-0 my-lg-0" action="editar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edi<?php echo $c; ?>">Editar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="edi<?php echo $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="text-center">
                                        <input type="hidden" name="subir" value="<?php echo $mostrar3['nombre'];?>">
                                        <div class="container">
                                          <div class="row">
                                            Desea editar este campo <?php echo $mostrar['nombre']; ?>
                                          </div>
                                          <div class="row">
                                            <div class="col-xl-6">
                                            <div class="card" style="width: 20rem;">
                                       <img src="img/descarga.jpg" class="card-img-top" alt="...">
                                       <div class="card-body">
                                        <h5 class="card-title">Imagen</h5>
                                           <div class="form-group">
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagenv">
                                        </div>
                                        </div>
                                          </div>
                                          </div>
                                          </div>
                                          <div class="row">
                                            <label for="formGroupExampleInput">Nombre raza</label>
                                          </div>
                                          <div class="row">
                                            <input type="text" class="form-control" id="formGroupExampleInput" placeholder="nom_raza" size="55%" name="nuevo_nombre">
                                          </div>
                                        </div>
                                        
                                      </label>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="cambiar_raz" value="Editar" class="btn btn-primary">
                            </div>
                          </div>
                      </div>
                    </div>
                  </form>
                      </td>
                      <td>
                        <form class="form-inline my-2 my-lg-0"  action="razas.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#registrar<?php echo $c; ?>">Registrar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="registrar<?php echo $c; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">
                                <input type="hidden" name="subir" value="<?php echo $mostrar3['nombre'];?>">
                                Registro mensual de la vaca <?php echo $mostrar3['nombre']; ?> 
                            </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Cantidad de cabezas de ganado</label>
                                  </div>

                                  <div class="row">
                                      <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="cantidad_vacas">
                                  </div>
                                  <br>
                                  <div class="row">
                                      <label for="formGroupExampleInput">Cantidad de litros de leche mensuales</label>
                                  </div>

                                  <div class="row">
                                      <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="cantidad_litros">
                                  </div>
                                  <br>
                                  
                                  <div class="row">
                                      <label for="formGroupExampleInput">Descripción</label>
                                  </div>

                                  <div class="row">
                                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="descripcion o datos relevantes" size="35%" name="descripcion">
                                  </div>
                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="regis_2" value="Guardar registro" class="btn btn-primary">
                            </div>

                          </div>
                      </div>
                    </div>
                  </form>
                  
                      </td>
                      
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="eliminar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eli<?php echo $d; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="eli<?php echo $d; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">
                                        <input type="hidden" name="subir" value="<?php echo $mostrar['nombre'];?>">
                                        <input type="hidden" name="codigo" value="<?php echo $_SESSION['usu_finca'];?>">
                                        Desea eliminar esta raza de su finca: <?php echo $mostrar['nombre']; ?></label>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="eli_m" value="Eliminar" class="btn btn-danger">
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
}
}
}

if (isset($_POST['regis_2'])) {
  $cantidad_vacas= $_POST['cantidad_vacas'];
  $cantidad_litros= $_POST['cantidad_litros'];
  $descripcion= $_POST['descripcion'];
  $encargado= $_SESSION['usu_usuario'];

  $codis= $_SESSION['usu_finca'];
  $forz= $_POST['subir'];
  $simb_3 = mysqli_query($conexion,"SELECT num FROM  razas WHERE codigo_finca='$codis' and nombre='$forz'");
  $p9 = mysqli_fetch_array($simb_3);
  $todopq= $p9['num'];
  $fox="INSERT INTO  regis_raza (cantidad_vacas, cantidad_litros, descripcion,encargado, num_raz)values ('$cantidad_vacas','$cantidad_litros','$descripcion','$encargado','$todopq')";
  $prep=mysqli_query($conexion, $fox);
  ?>
  <script>
function alerta(){
 swal({
   title: "¡Listo!",
   text: "Registro exitoso",
   type: "success",
 });
}
     alerta(); 
</script>
  <?php 
}
?>
</tbody>

              </table>
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
</body>
</html>