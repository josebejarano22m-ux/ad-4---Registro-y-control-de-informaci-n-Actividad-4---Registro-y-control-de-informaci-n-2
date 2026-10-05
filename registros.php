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

          <a class="list-group-item-action list-group-item list-group-item-success" href="razas.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Razas</b></a>

          <a class="list-group-item list-group-item-action active list-group-item list-group-item-success" href="registros.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Registros</b></a>

            <a class="list-group-item-action list-group-item list-group-item-success" href="valance.php"><img src="img/208.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Balance</b></a>

      			<a class=" list-group-item list-group-item-success"><br><br></a>
    		</div>
		</div>
<!------------------------------------logo--------------------------------------------->
		<div class="col-10">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">
    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
<!-------------------------------------tu finca---------------------------------------->
      		<div class="tab-pane fade" id="list-former" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!------------------------------usuarios registrados----------------------------------->
          <div class="tab-pane fade" id="list-usu" role="tabpanel" aria-labelledby="list-usu-list"></div>
<!------------------------------------informacion-------------------------------------->
      		<div class="tab-pane fade" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">
      			</div>
<!----------------------razas registradas------------------------------------------------------------------>
      		<div class="tab-pane fade" id="list-raz" role="tabpanel" aria-labelledby="list-settings-list">
      			 </div>
<!------------------------------------ registros--------------------------------------->
      		<div class="tab-pane fade show active" id="list-reg" role="tabpanel" aria-labelledby="list-profile-list">
      			<nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Registros</h1></a>
              </nav>

              <br>

              
              <?php 
                  require "conexion.php";
                    $cod= $_SESSION['usu_finca'];
                      $result_1 = mysqli_query($conexion,"SELECT nombre FROM  razas WHERE codigo_finca='$cod'");
                          $a=1;
                          while ($mostrar = mysqli_fetch_array($result_1)) {
                          $a++;                       
               ?>

              <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="heading<?php echo $a; ?>">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collaps<?php echo $a; ?>" aria-expanded="true" aria-controls="collapse<?php echo $a; ?>">
          <?php echo $mostrar['nombre']; ?>
        </button>
      </h2>
    </div>

    <div id="collaps<?php echo $a; ?>" class="collapse" aria-labelledby="heading<?php echo $a; ?>" data-parent="#accordionExample">
      <div class="card-body">
        
              <script>
                $('#eter').DataTable( {
    responsive: true;
} );
              </script>
 
              <script>
  $(document).ready(function() {
    $('#eter <?php echo $a ?>').DataTable({
        language:{
             "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "porfavor registra un administrador",
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
  <table id="eter<?php echo $a ?>" class="table table-striped table-bordered" style="width:100%">
        <thead class="bg-success">
            <tr class="text-center">
                <th>N° </th>
                <th>Cantidad de ganado</th>
                <th>Cantidad de litros</th>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Encargado</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
                <?php  
                  $uno=$mostrar['nombre'];
                  $contra2=mysqli_query($conexion,"SELECT * from razas where nombre='$uno'");
                  $mostrar11 = mysqli_fetch_array($contra2);
                  $porfi= $mostrar11['num'];
                  $contra=mysqli_query($conexion,"SELECT * from regis_raza where num_raz='$porfi'");
                          $b=1;
                          while ($mostrar1 = mysqli_fetch_array($contra)) {

                ?>
               
                  <tr>
                    <th scope="row"><?php echo $b++; ?></th>
                      <td class="text-center"><?php echo $mostrar1['cantidad_vacas']; ?></td>
                      <td class="text-center"><?php echo $mostrar1['cantidad_litros']; ?></td>
                      <td><?php echo $mostrar1['fecha_regis']; ?></td>
                      <td><?php echo $mostrar1['descripcion']; ?></td>
                      <td><?php echo $mostrar1['encargado']; ?></td>
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="editar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#editar<?php echo $mostrar1['regis']; ?>">Editar 
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="editar<?php echo $mostrar1['regis']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                    <input type="hidden" name="actuarnew" value="<?php echo $mostrar1['regis'];?>">
                                    <input type="hidden" name="usua" value="<?php echo $_SESSION['usu_usuario'];?>">
                                      <div class="col-12">
                                      <label for="formGroupExampleInput">Si edita este registro automaticamente guardara sus datos para notificar la ultima actualizacion N° <?php echo $mostrar1['regis']; ?>
                                      <div class="container">
                                        <div class="row">
                                          <div class="col-12">
                                          <label for="formGroupExampleInput">Cantidad de cabezas de vacas</label>
                                        </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                          <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="100%" name="edi_c_vacas">
                                          </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                          <label for="formGroupExampleInput">Cantidad de litros de leche</label>
                                        </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                          <input type="number" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="55%" name="edi_c_leche">
                                        </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                          <label for="formGroupExampleInput">Descripcion</label>
                                        </div>
                                        </div>
                                        <div class="row">
                                          <div class="col-12">
                                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="cantidad" size="20%" name="edi_c_descripcion">
                                        </div>
                                        </div>
                                      </div>
                                      </label>
                                      </div>
                                  </div>

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="actualmente" value="Editar" class="btn btn-info">
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
            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<?php  
}
?> 
        
      		</div>

<!------------------------------------ balance--------------------------------------->
      		<div class="tab-pane fade" id="list-valan" role="tabpanel" aria-labelledby="list-settings-list">
           
          </div>      
    	</div>
  	</div>
  	</div>
</body>
</html>