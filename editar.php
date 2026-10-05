<!--programador-->
<?php 
require "conexion.php";

            if (isset($_POST['slider2'])) {
              
            $nombre_img= $_FILES['imagen']['name'];
            $archivo=$_FILES['imagen']['tmp_name'];

            $ruta="img";
            $ruta= $ruta."/".$nombre_img;
             move_uploaded_file($archivo, $ruta);
  
            $nombre_img= $_FILES['imagen2']['name'];
            $archivo=$_FILES['imagen2']['tmp_name'];

            $col="img";
            $col= $col."/".$nombre_img;
             move_uploaded_file($archivo, $ruta);
   
            $nombre_img= $_FILES['imagen3']['name'];
            $archivo=$_FILES['imagen3']['tmp_name']; 

            $ra="img";
            $ra= $ra."/".$nombre_img;
             move_uploaded_file($archivo, $ruta);
  

              $act="UPDATE programer SET f1='$ruta', img2='$col', img3='$ra' where programer.codigo_pro='1615944'";
              $res=mysqli_query($conexion, $act);
              
              echo '<script>window.location.href="inicio.php"</script>';
              
            }
            ?>
<!--administrador-->
<?php  
require "conexion.php";
                  if (isset($_POST['actualizar'])) {
            $nombre_img= $_FILES['imagen']['name'];
            $archivo=$_FILES['imagen']['tmp_name'];

            $ruta="img";
            $ruta= $ruta."/".$nombre_img;
             move_uploaded_file($archivo, $ruta);

              $cod= $_POST['editfin'];    
              $actualizar="UPDATE finca SET foto='$ruta' where finca.codigo='$cod'";
              $res=mysqli_query($conexion, $actualizar);
              echo '<script>window.location.href="tufinca.php"</script>';
            }
            ?>
            <?php  
              if (isset($_POST['actualizar_nom'])) {
                  $nom=  $_POST['nombre'];
                  $cod= $cod= $_POST['editfin'];
                 $actualizar="UPDATE finca SET nombre_fin='$nom' where finca.codigo='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="tufinca.php"</script>';
              }
            ?>
            <?php  
              if (isset($_POST['actualizar_muni'])) {
                  $nom=  $_POST['municipio'];
                  $cod= $_POST['editfin'];
                 $actualizar="UPDATE finca SET municipio='$nom' where finca.codigo='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="tufinca.php"</script>';
              }
            ?>
            <?php  
              if (isset($_POST['actualizar_vere'])) {
                  $nom=  $_POST['vereda'];
                  $cod= $_POST['editfin'];
                 $actualizar="UPDATE finca SET vereda='$nom' where finca.codigo='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="tufinca.php"</script>';
              }
            ?>
            <?php  
              if (isset($_POST['actualizar_area'])) {
                  $nom=  $_POST['area'];
                  $cod= $_POST['editfin'];
                 $actualizar="UPDATE finca SET area='$nom' where finca.codigo='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="tufinca.php"</script>';
              }
            ?>
            <?php

            require "conexion.php";  
            if (isset($_POST['cambiar_raz'])) {
                  $nom=  $_POST['subirnom'];
                  $cod= $_POST['subirfin'];
                     $j= $_POST['subirnum']; 
                  $otro= $_POST['nuevo_nombre'];

            $nombre_img= $_FILES['imagen']['name'];
            if ($nombre_img=='') {
              $ruta="img/cow-head-icon.png";

              $actualizar="UPDATE razas SET  img='$ruta', nombre='$otro' where razas.num='$j' and razas.codigo_finca='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="razas.php"</script>';
            }else{
            $archivo=$_FILES['imagen']['tmp_name'];

            $ruta="img";
            $ruta= $ruta."/".$nombre_img;
            move_uploaded_file($archivo, $ruta);

                 $actualizar="UPDATE razas SET  img='$ruta', nombre='$otro' where razas.num='$j' and razas.codigo_finca='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="razas.php"</script>';
              }
              }
            ?>

            <?php 
            if (isset($_POST['actualmente'])) {
                $guta= $_POST['actuarnew'];
                $a_vacas= $_POST['edi_c_vacas'];
                $a_litros= $_POST['edi_c_leche'];
                $a_descripcion= $_POST['edi_c_descripcion'];
                $encargado= $_POST['usua'];

                $unoac="UPDATE regis_raza SET cantidad_vacas='$a_vacas', cantidad_litros='$a_litros', descripcion='$a_descripcion', encargado='$encargado' where  regis_raza.regis='$guta'";
                 $sinfon=mysqli_query($conexion, $unoac);
                 echo '<script>window.location.href="registros.php"</script>';
                 }
                 ?>

            <!--usuario-->
            
            <?php 
            if (isset($_POST['actualmente2'])) {
                $guta= $_POST['actuarnew'];
                $a_vacas= $_POST['edi_c_vacas'];
                $a_litros= $_POST['edi_c_leche'];
                $a_descripcion= $_POST['edi_c_descripcion'];
                $encargado= $_POST['usua'];

                $unoac="UPDATE regis_raza SET cantidad_vacas='$a_vacas', cantidad_litros='$a_litros', descripcion='$a_descripcion', encargado='$encargado' where  regis_raza.regis='$guta'";
                 $sinfon=mysqli_query($conexion, $unoac);
                 echo '<script>window.location.href="registrousuario.php"</script>';
                 }
                 ?>

            <!--usuario-->
            <?php
if (isset($_POST['nuwraza'])) {
                  $nom=  $_POST['subirnom'];
                  $cod= $_POST['subirfin'];
                     $j= $_POST['subirnum']; 
                  $otro= $_POST['nuevo_nombre'];

            $nombre_img= $_FILES['imagen']['name'];
            if ($nombre_img=='') {
              $ruta="img/cow-head-icon.png";

              $actualizar="UPDATE razas SET  img='$ruta', nombre='$otro' where razas.num='$j' and razas.codigo_finca='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="razasusuario.php"</script>';
            }else{
            $archivo=$_FILES['imagen']['tmp_name'];

            $ruta="img";
            $ruta= $ruta."/".$nombre_img;
             move_uploaded_file($archivo, $ruta);

                 $actualizar="UPDATE razas SET  img='$ruta', nombre='$otro' where razas.num='$j' and razas.codigo_finca='$cod'";
                 $res=mysqli_query($conexion, $actualizar);
                 echo '<script>window.location.href="razasusuario.php"</script>';
              }
              }
            ?>

            <?php 
            if (isset($_POST['actualmente1'])) {
                $guta= $_POST['actuarnew'];
                $a_vacas= $_POST['edi_c_vacas'];
                $a_litros= $_POST['edi_c_leche'];
                $a_descripcion= $_POST['edi_c_descripcion'];
                $encargado= $_POST['usua'];

                $unoac="UPDATE regis_raza SET cantidad_vacas='$a_vacas', cantidad_litros='$a_litros', descripcion='$a_descripcion', encargado='$encargado' where  regis_raza.regis='$guta'";
                 $sinfon=mysqli_query($conexion, $unoac);
                 echo '<script>window.location.href="registrousuario.php"</script>';
                 }
                 ?>