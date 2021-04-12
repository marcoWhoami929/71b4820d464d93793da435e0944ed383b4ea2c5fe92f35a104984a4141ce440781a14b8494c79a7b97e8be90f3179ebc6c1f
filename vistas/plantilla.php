
<?php 
session_start();
 ?>
 <!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CRM 2021</title>

  <link rel="icon" href="vistas/img/plantilla/icono.png">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  

  <?php
   if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

        echo '<!-- Bootstrap 3.3.7 -->';
      echo '<link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">';
      echo '<!-- Font Awesome -->';
      echo '<link rel="stylesheet" href="vistas/bower_components/font-awesome/css/all.min.css">';
      echo '<!-- Theme style -->';
      echo '<link rel="stylesheet" href="vistas/dist/css/AdminLTE.min.css">';

      echo '<link rel="stylesheet" href="vistas/dist/css/skins/skin-green-light.min.css">';
      echo '<!-- iCheck -->';
      echo '<link rel="stylesheet" href="vistas/plugins/iCheck/square/green.css">';
      echo '<!-- plantilla -->';
      echo '<link rel="stylesheet" href="vistas/css/plantilla.css">';
      echo '<!--    Datatables  -->';
      echo '<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>';
      echo '<link href="vistas/assets/libs/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />';
      echo '<link href="vistas/assets/extra-libs/calendar/calendar.css" rel="stylesheet" />';
      echo '<link rel="stylesheet" type="text/css" href="vistas/assets/libs/tagator/fm.tagator.jquery.min.css">';
      

   
   }else{
     if(isset($_GET["ruta"]) == "ingreso" || isset($_GET["ruta"]) == "login" || isset($_GET["ruta"]) == ""){

      echo '<link rel="stylesheet" href="vistas/css/login.css">';


    }else{

    
       
    }
   }
  ?>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <!--SCRIPTS JS-->
  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Font Awesome -->
  <script src="vistas/bower_components/font-awesome/js/all.min.js"></script>
  <!-- SweetAlert 2 https://sweetalert2.github.io/-->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

   
   <?php
   if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

       echo '<!-- Bootstrap 3.3.7 -->';
        echo '<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>';
       
        echo '<!-- AdminLTE App -->';
        echo '<script src="vistas/dist/js/adminlte.min.js"></script>';
        echo '<!-- iCheck -->';
        echo '<script src="vistas/plugins/iCheck/icheck.min.js"></script>';
        echo '<!--HIGHTCHARTS--->';
        echo '<script src="https://code.highcharts.com/highcharts.js"></script>';
        echo '<script src="https://code.highcharts.com/modules/data.js"></script>';
        echo '<script src="https://code.highcharts.com/modules/exporting.js"></script>';
        echo '<script src="https://code.highcharts.com/modules/export-data.js"></script>';
        echo '<script src="https://code.highcharts.com/modules/accessibility.js"></script>';
        echo '<!--    Datatables-->';
        echo '<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>';
              echo `<script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-green',
              radioClass: 'iradio_square-green',
              increaseArea: '20%' // optional
            });
            /* SideBar Menu */
            $('.sidebar-menu').tree();
          });
          </script>`;
          echo '<script type="text/javascript" src="vistas/assets/libs/tagator/fm.tagator.jquery.js"></script>';
        
   }else{
     if(isset($_GET["ruta"]) == "ingreso" || isset($_GET["ruta"]) == "login" || isset($_GET["ruta"]) == ""){
      echo '<!--    Datatables-->';
        echo '<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>';


    }else{

       
    }
   }
  ?>

</head>

<body class="hold-transition skin-green-light sidebar-mini login-page">

<?php



 if(isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok"){

    echo '<div class="wrapper">';

    /*=============================================
     CABEZOTE
     =============================================*/

     include "modulos/cabezote.php";

    /*=============================================
     LATERAL
     =============================================*/

     include "modulos/lateral.php";

     /*=============================================
     CONTENIDO
     =============================================*/

     if(isset($_GET["ruta"])){

          $carpeta = "vistas/modulos/";
          $class = $carpeta . $_GET["ruta"]. '.php';


          if (!file_exists($class)) {
              include "modulos/404.php";
          }else{

            include "modulos/".$_GET["ruta"].".php";
            

          }   

     }else{

       include "modulos/inicio.php";

     }

     /*=============================================
     FOOTER
     =============================================*/

     include "modulos/footer.php";


    echo '</div>';

 }else{

  include "modulos/login.php";

 }

 
?>
<!--SCRIPTS JS-->

<script type="text/javascript" src="vistas/js/plantilla.js"></script>
<script type="text/javascript" src="vistas/js/gestorTablas.js"></script>
<script type="text/javascript" src="vistas/js/funcionesModulos.js"></script>
<script src="vistas/assets/libs/moment/min/moment.min.js"></script>
<script src="vistas/assets/libs/fullcalendar/dist/fullcalendar.min.js"></script>
<script type="text/javascript" src="vistas/js/getLocationClient.js"></script>


<!--SCRIPTS JS-->
</body>
</html>