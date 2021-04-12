<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaRecordatorios{

  public function mostrarTablas(){  
    $tabla = "recordatorios";
    $item = "idProspecto";
    $valor = $_GET["idProspecto"];

    $parametros = "id,asunto,descripcion,fecha,hora,fechaCreacion,finalizada,detalle";

    $recordatorios = ControladorFunciones::ctrMostrarEventos($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($recordatorios); $i++){
      if($recordatorios[$i]["finalizada"] == 0){
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:red'></i></div>";
      }else{
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:green'></i></div>";
      }

      if ($recordatorios[$i]["detalle"] != "") {
        $detalle = "<div class='btn-group'><button class='btn btn-info btnVisualizarDetalleRecordatorio' data-toggle='modal' data-target='#modalDetalleRecordatorio' idRecordatorio = '".$recordatorios[$i]["id"]."'><i class='fas fa-eye'></i></button></div>";
      }else{
         $detalle = "<div class='btn-group'></div>";
      }
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$recordatorios[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $recordatorios[$i]["asunto"]).'</strong>",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $recordatorios[$i]["descripcion"]).'</strong>",
              "'.$recordatorios[$i]["fecha"].'-'.$recordatorios[$i]["hora"].'",
              "'.$recordatorios[$i]["fechaCreacion"].'",
              "'.$detalle.'",
              "'.$estatus.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaRecordatorios();
$activar -> mostrarTablas();