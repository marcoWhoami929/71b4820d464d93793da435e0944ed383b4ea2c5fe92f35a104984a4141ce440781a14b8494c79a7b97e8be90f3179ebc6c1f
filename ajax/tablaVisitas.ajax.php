<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaVisitas{

  public function mostrarTablas(){  
    $tabla = "visitas";
    $item = "idProspecto";
    $valor = $_GET["idProspecto"];

    $parametros = "id,asunto,contacto,descripcion,ubicacion,fecha,hora,fechaCreacion,finalizada,detalle";

    $visitas = ControladorFunciones::ctrMostrarEventos($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($visitas); $i++){
      if($visitas[$i]["finalizada"] == 0){
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:red'></i></div>";
      }else{
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:green'></i></div>";
      }

      if ($visitas[$i]["detalle"] != "") {
        $detalle = "<div class='btn-group'><button class='btn btn-info btnVisualizarDetalle' data-toggle='modal' data-target='#modalDetalleVisita' idVisita = '".$visitas[$i]["id"]."'><i class='fas fa-eye'></i></button></div>";
      }else{
         $detalle = "<div class='btn-group'></div>";
      }
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$visitas[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $visitas[$i]["asunto"]).'</strong>",
              "'.$visitas[$i]["contacto"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $visitas[$i]["descripcion"]).'</strong>",
              "'.$visitas[$i]["fecha"].'-'.$visitas[$i]["hora"].'",
              "'.$visitas[$i]["fechaCreacion"].'",
              "'.$detalle.'",
              "'.$estatus.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaVisitas();
$activar -> mostrarTablas();