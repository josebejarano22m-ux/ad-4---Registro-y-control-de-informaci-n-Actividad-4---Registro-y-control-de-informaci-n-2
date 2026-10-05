<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.css"/>
   <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.0/sweetalert2.js"></script>
</head>
<body>
<script>
        <?php

        $resultado_pendientes= 3;
          if($resultado_pendientes>=1){
//aqui ira el sweet alert y aqui cerre el php , cosa habia hecho despues del sweet alert 
?>
        swal({
  title: 'Tiene 1 ticket pendiente por cerrar',
  html: 'Cierrelos para poder crear uno nuevo ',
  type: 'warning',
  confirmButtonText: 'Got it!'
}).then(function () {
  window.location.href = "login.php";
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
</html>