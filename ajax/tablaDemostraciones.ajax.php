<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaDemostraciones{

  public function mostrarTablas(){  
    $tabla = "demostraciones";
    $item = "idProspecto";
    $valor = $_GET["idProspecto"];

    $parametros = "id,asunto,contacto,descripcion,productos,fecha,hora,ubicacion,fechaCreacion,finalizada,detalle";

    $demostraciones = ControladorFunciones::ctrMostrarEventos($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($demostraciones); $i++){
      if($demostraciones[$i]["finalizada"] == 0){
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:red'></i></div>";
      }else{
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:green'></i></div>";
      }

      if ($demostraciones[$i]["detalle"] != "") {
        $detalle = "<div class='btn-group'><button class='btn btn-info btnVisualizarDetalleDemostracion' data-toggle='modal' data-target='#modalDetalleDemostracion' idDemostracion = '".$demostraciones[$i]["id"]."'><i class='fas fa-eye'></i></button></div>";
      }else{
         $detalle = "<div class='btn-group'></div>";
      }
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$demostraciones[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $demostraciones[$i]["asunto"]).'</strong>",
              "'.$demostraciones[$i]["contacto"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $demostraciones[$i]["descripcion"]).'</strong>",
              "'.$demostraciones[$i]["productos"].'",
              "'.$demostraciones[$i]["fecha"].'-'.$demostraciones[$i]["hora"].'",
              "'.$demostraciones[$i]["ubicacion"].'",
              "'.$demostraciones[$i]["fechaCreacion"].'",
              "'.$detalle.'",
              "'.$estatus.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaDemostraciones();
$activar -> mostrarTablas();