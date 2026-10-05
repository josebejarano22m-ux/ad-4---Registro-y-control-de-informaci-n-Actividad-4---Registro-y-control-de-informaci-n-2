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

          <a class="list-group-item-action list-group-item list-group-item-success" href="informaciousuario.php"><img src="img/b3.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Información</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="razasusuario.php"><img src="img/finca.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Razas</b></a>

          <a class="list-group-item-action list-group-item list-group-item-success" href="registrousuario.php"><img src="img/registro.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Registros</b></a>

      		<a class="list-group-item-action active list-group-item list-group-item-success" href="balanceusuario.php"><img src="img/208.png" width="20" height="20" class="d-inline-block align-top" alt="" class="display-1"><b> Balance</b></a>

          <a class=" list-group-item list-group-item-success"><br><br></a>
    		</div>
		</div>
	
<!------------------------------------ logo--------------------------------------------->
		<div class="col-10">
    		<div class="tab-content list-group-item  list-group-item-dark" id="nav-tabContent">

    			<div class="tab-pane fade" id="list-home" role="tabpanel" aria-labelledby="list-home-list"></div>
<!------------------------------------informacion--------------------------------------->
      		<div class="tab-pane fade" id="list-infor" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!------------------------------ razas registradas-------------------------------------->
      		<div class="tab-pane fade" id="list-raz" role="tabpanel" aria-labelledby="list-settings-list"></div>
<!------------------------------------ registros--------------------------------------->
          <div class="tab-pane fade" id="list-reg" role="tabpanel" aria-labelledby="list-profile-list"></div>
<!------------------------------------ balance--------------------------------------->

      		<div class="tab-pane fade show active" id="list-valan" role="tabpanel" aria-labelledby="list-settings-list">

            <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="#"><h1>Balance</h1></a>
              </nav>
           <br>
<br>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"> General de razas</a>
      </li>
    </ul>
    <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        
        <html>
  <head>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Topping');
        data.addColumn('number', 'Slices');
        data.addRows([
          <?php  
          require "conexion.php";
                  $uno= $_SESSION['usu_finca'];
                  $contra2=mysqli_query($conexion,"SELECT * from razas where codigo_finca='$uno'");
                  while ($mostrar11 = mysqli_fetch_array($contra2)) {
                    $dos= $mostrar11['num'];
                  $contra3=mysqli_query($conexion,"SELECT * from regis_raza where num_raz='$dos'");
                  $mostrar12 = mysqli_fetch_array($contra3);
                 ?>
          ['<?php echo $mostrar11['nombre'];?>', <?php echo $mostrar12['cantidad_litros']; ?>],
          <?php } ?>
        ]);
        
        // Set chart options
        var options = {'title':'Balance producción por razas',
                       'height':300
                       };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>

  <body>
    <!--Div that will hold the pie chart-->
    
    <div id="chart_div" class="col-5 col-sm-4 col-md-6 col-lg-7 col-xl-12"></div>
    
    
  </body>
</html>

      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
        
        <html>
<head>
  <title>logio</title>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawAnnotations);

function drawAnnotations() {
      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population', '2000 Population'],
        ['New York City, NY', 81, 80],
        ['Los Angeles, CA', 3792000, 3694000],
        ['Chicago, IL', 2695000, 2896000],
        ['Houston, TX', 2099000, 1953000],
        ['Philadelphia, PA', 1526000, 1517000]
      ]);

      var data = google.visualization.arrayToDataTable([
        ['City', '2010 Population', {type: 'string', role: 'annotation'},
         '2000 Population', {type: 'string', role: 'annotation'}],
        ['New York City, NY', 8175000, '8.1M', 8008000, '8M'],
        ['Los Angeles, CA', 3792000, '3.8M', 3694000, '3.7M'],
        ['Chicago, IL', 2695000, '2.7M', 2896000, '2.9M'],
        ['Houston, TX', 2099000, '2.1M', 1953000, '2.0M'],
        ['Philadelphia, PA', 1526000, '1.5M', 1517000, '1.5M']
      ]);

      var options = {
        title: 'Population of Largest U.S. Cities',
        chartArea: {width: '50%'},
        annotations: {
          alwaysOutside: true,
          textStyle: {
            fontSize: 12,
            auraColor: 'none',
            color: '#555'
          },
          boxStyle: {
            stroke: '#ccc',
            strokeWidth: 1,
            gradient: {
              color1: '#f3e5f5',
              color2: '#f3e5f5',
              x1: '0%', y1: '0%',
              x2: '100%', y2: '100%'
            }
          }
        },
        hAxis: {
          title: 'Total Population',
          minValue: 0,
        },
        vAxis: {
          title: 'City'
        }
      };
      var chart = new google.visualization.BarChart(document.getElementById('ger'));
      chart.draw(data, options);
    }
</script>
</head>
<body>

  <div id="ger"></div>

</body>
</html>

      </div>
      
          </div>


          </div>      
      </div>
    </div>
            
  	</div>
    
</body>
</html>