<!--programador-->
<?php 
require "conexion.php";
if (isset($_POST['d_i'])) {
  $lo= $_POST['mt'];
  $los= $_POST['mt2'];
  $y_1 = mysqli_query($conexion,"DELETE FROM  informacion1 WHERE informacion1.informacion='$lo' and codigo_finca='$los'");
  echo '<script>window.location.href="informacion.php"</script>';
} 
?>

<?php 
if (isset($_POST['eli_f'])) {
               $toma= $_POST['carga3'];

                $y_1 = mysqli_query($conexion,"DELETE FROM  administrador WHERE administrador.codigo_finca='$toma'");
                $y_2 = mysqli_query($conexion,"DELETE FROM  usuario WHERE usuario.codigo_finca='$toma'");
                $y_3 = mysqli_query($conexion,"DELETE FROM  informacion1 WHERE informacion1.codigo_finca='$toma'");

                
                $b_1 = mysqli_query($conexion,"SELECT num FROM  razas WHERE codigo_finca='$toma'");
                
                while ($fon=mysqli_fetch_array($b_1)) {
                  $r=$fon['num'];
                
                  $y_4 = mysqli_query($conexion,"DELETE FROM  regis_raza WHERE regis_raza.num_raz='$r'");
                }
                $y_4 = mysqli_query($conexion,"DELETE FROM  razas WHERE razas.codigo_finca='$toma'");

                $y_5 = mysqli_query($conexion,"DELETE FROM  finca WHERE finca.codigo='$toma'");
                echo '<script>window.location.href="finca.php"</script>';
              }
          ?>

          <?php
          if (isset($_POST['todo'])) {
               $toma= $_POST['carga2'];
                 $sefue_1 = mysqli_query($conexion,"DELETE FROM  usuario WHERE usuario.usuario='$toma'");
                echo '<script>window.location.href="usuarios.php"</script>';  
              }

          if (isset($_POST['elitodo'])) {
               $toma= $_POST['carga'];
                 $sefue_1 = mysqli_query($conexion,"DELETE FROM  administrador WHERE administrador.usuario='$toma'");
                 echo '<script>window.location.href="administradores.php"</script>';
              }
          ?>
<!--administrador-->
<?php 
require "conexion.php";
if (isset($_POST['u_elim'])) {
              $tr= $_POST['subirtd'];
              $rt= $_POST['subirtg'];
              $deleform_1 = mysqli_query($conexion,"DELETE FROM  informacion1 WHERE informacion1.codigo_finca='$tr' and informacion1.informacion='$rt'");
              	echo '<script>window.location.href="informacionadmin.php"</script>';
}
?>

<?php  
require "conexion.php";
if (isset($_POST['eli_m'])) { 
  $cod= $_POST['codigo'];
  $par= $_POST['subir'];
  $rmd_3 = mysqli_query($conexion,"SELECT num FROM  razas WHERE codigo_finca='$cod' and nombre='$par'");
  $p1 = mysqli_fetch_array($rmd_3);
  $x= $p1['num'];
  $sefue_1 = mysqli_query($conexion,"DELETE FROM  regis_raza WHERE regis_raza.num_raz='$x'");
  $deleform_1 = mysqli_query($conexion,"DELETE FROM  razas WHERE razas.num='$x' and razas.codigo_finca='$cod'");
  echo '<script>window.location.href="razas.php"</script>';  
}
?>

<?php
    if (isset($_POST['eliminar'])) {
               $toma= $_POST['cargo'];
                 $sefue_1 = mysqli_query($conexion,"DELETE FROM  usuario WHERE usuario.usuario='$toma'");
                 echo '<script>window.location.href="usuariosusu.php"</script>';
              }
          ?>
           <!--usuario-->
<?php 
if (isset($_POST['eli_ma'])) {
  $cod= $_POST['codigo'];
  $par= $_POST['subir'];
  $rmd_3 = mysqli_query($conexion,"SELECT num FROM  razas WHERE codigo_finca='$cod' and nombre='$par'");
  $p1 = mysqli_fetch_array($rmd_3);
  $x= $p1['num'];
  $sefue_1 = mysqli_query($conexion,"DELETE FROM  regis_raza WHERE regis_raza.num_raz='$x'");
  $deleform_1 = mysqli_query($conexion,"DELETE FROM  razas WHERE razas.num='$x' and razas.codigo_finca='$cod'");
  echo '<script>window.location.href="razasusuario.php"</script>';
}
?>