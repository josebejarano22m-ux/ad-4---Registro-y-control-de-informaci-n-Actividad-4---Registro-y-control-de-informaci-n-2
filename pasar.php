<?php
session_start();
?>
<!DOCTYPE html> 
<html lang="es">
<head>
	
    <meta charset="utf-8">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>

</head>

<body>



<?php

session_destroy();

?>

<script>
        <?php

      $UNO= 0;
          if($UNO==0){
//aqui ira el sweet alert y aqui cerre el php , cosa habia hecho despues del sweet alert 
            
?>
        swal({
  title: 'Actualización exitosa',
  html: 'Ahora puedes usar tu nueva contraseña',
  type: 'success',
  confirmButtonText: 'OK!'
}).then(function () {
  window.location.href = "index.php";
}, function (dismiss) {
  // dismiss can be 'cancel', 'overlay',
  // 'close', and 'timer'
  if (dismiss === 'cancel') {
    window.location.href = "tickets-sin-revisar-1";
  }
});
          <?php    
            
          }

        ?>
   

  </script>






</body>

	
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  </html>