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
      
          <a class=" list-group-item-action list-group-item list-group-item-success" href="inicio.php"><img src="img/menu.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Inicio</b></a>
      
          <a class="list-group-item-action list-group-item list-group-item-success" href="administradores.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Administradores registrados</b></a>
      
          <a class="list-group-item-action list-group-item list-group-item-success" href="usuarios.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Usuarios registrados</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="finca.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Fincas registradas</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="contactos.php"><img src="img/cont.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Contactos</b></a>

          <a class="list-group-item-action active list-group-item list-group-item-success" href="informacion.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

    		</div>
		</div>
<!----------------------------contenido menu ----------------------------------->
		<div class="col-7 col-sm-8 col-md-8 col-lg-9 col-xl-9">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
<!------------------------- administradores registrados------------------------->
	    		<div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list"> 			 
    		</div>
<!----------------------- usuarios registrados--------------------------------->
      		<div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!---------------------------- fincas registradas------------------------------>
      		<div class="tab-pane fade" id="list-form" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!----------------------------mensajeria---------------------------------------->
      		<div class="tab-pane fade" id="list-former" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!------------------------contenido informacion--------------------------------->

      		<div class="tab-pane fade show active" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list">

          <div class="container">

              <form action="informacion.php" method="post" enctype="multipart/form-data">

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Contenido: información</h1></a>
                  
              </nav>
              <br><br>

        <div class="row">
                <div class="col-4">   
              <div class="card" style="width: 19rem;">
                  <img src="img/logo.png" width="900" height="210" class="card-img-top" alt="...">
                    <div class="card-body">                      
                   </div>
              </div>
            </div>
          
            <div class="col-8">
              <div class="form-group">
              <label for="exampleFormControlTextarea1" >Descripción</label>
                <textarea class="form-control" id="informacion" name="informacion" rows="8" required></textarea>
              </div>
            </div>
              
        </div>
        <br>
        <blockquote class="blockquote text-center"><input type="submit" name="new_info" value="Guardar cambios" class="btn btn-info"></blockquote>

      </form>

            </div>

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Información agregada</h1></a>
                  
              </nav>

              <br>
                      

             <script>
  $(document).ready(function() {
    $('#info').DataTable({
        language:{
             "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Por favor ingresa información",
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
  <table id="info" class="table table-striped table-bordered" style="width:100%">
        <thead class="bg-success">
            <tr class="text-center">
                <th>N°</th>
                <th>Imagen</th>
                <th>Información</th>
                <th>Usuario</th>
                <th>Codigo finca</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                  require "conexion.php";
                    
                      $result_1 = mysqli_query($conexion,"SELECT * FROM  informacion1");
                          $a=1;
                          while ($mostrar = mysqli_fetch_array($result_1)) {
                                                    
               ?>
                  <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                      <td><img src="<?php echo $mostrar['img_informacion']; ?>" width="50" height="50"></td>
                      <td><?php echo $mostrar['informacion']; ?></td>
                      <td><?php echo $mostrar['usuario']; ?></td>
                      <td><?php echo $mostrar['codigo_finca']; ?></td>                  
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="eliminar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eli<?php echo $a; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="eli<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Desea eliminar esta informacion: <?php echo $mostrar['informacion']; ?></label>
                                  </div>
                                  <input type="hidden" name="mt" value="<?php echo $mostrar['informacion'];?>">
                                  <input type="hidden" name="mt2" value="<?php echo $mostrar['codigo_finca'];?>">


                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="d_i" value="Eliminar" class="btn btn-danger">
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
                if (isset($_POST['new_info'])) {
                   $cat= $_POST['informacion'];
                    $t_7 = mysqli_query($conexion,"SELECT informacion FROM  informacion1 where informacion='$cat'");
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
                                    
                  $ruta= "img/logo.png";
                  $usu= "huilaganadero";

        $result_1 = mysqli_query($conexion,"SELECT codigo  FROM finca");
        while ($mostra = mysqli_fetch_array($result_1)) {
          $ingresa= $mostra['codigo'];
          $insert="INSERT INTO  informacion1 (informacion,img_informacion,usuario,codigo_finca) values ('$cat','$ruta','$usu','$ingresa')";
          $res=mysqli_query($conexion, $insert);
        }
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
                 $result_1 = mysqli_query($conexion,"SELECT * FROM  informacion1 where informacion='$cat'");
                          
                 while ($mostrar = mysqli_fetch_array($result_1)) {                 
                  ?>
                  <tr>
                    <th scope="row"><?php echo $a++; ?></th>
                      <td><img src="<?php echo $mostrar['img_informacion']; ?>" width="50" height="50"></td>
                      <td><?php echo $mostrar['informacion']; ?></td>
                      <td><?php echo $mostrar['usuario']; ?></td>
                      <td><?php echo $mostrar['codigo_finca']; ?></td>                  
                      <td>
                        <form class="form-inline my-2 my-lg-0" action="eliminar.php" method="post">
                      <!-- Button  modal -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#eli<?php echo $a; ?>">Eliminar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="eli<?php echo $a; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                          <div class="modal-content">
                              
                          
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                      
                            <div class="modal-body">
                                <div class="container">
                                  <div class="row">
                                      <label for="formGroupExampleInput">Desea eliminar esta raza de su finca: <?php echo $mostrar['informacion']; ?></label>
                                  </div>
                                  <input type="hidden" name="mt" value="<?php echo $mostrar['informacion'];?>">
                                  <input type="hidden" name="mt2" value="<?php echo $mostrar['codigo_finca'];?>">

                                  <br>
                                  
                                </div>          
                            </div>
                            <div class="modal-footer">
                              <input type="submit" name="d_i" value="Eliminar" class="btn btn-danger">
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
?>
              </table>
  	      </div>
        </div>
      </div>
    </div>
</body>
</html>