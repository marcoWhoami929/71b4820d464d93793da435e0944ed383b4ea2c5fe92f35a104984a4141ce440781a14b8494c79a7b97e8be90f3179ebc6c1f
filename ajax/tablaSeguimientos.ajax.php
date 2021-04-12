<?php
error_reporting(0);
session_start();
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaSeguimientos{

  public function mostrarTablas(){  
    $tabla = "seguimientos";

    
    $idAgente = $_SESSION["id"];
    if ($idAgente == 11) {
      if (isset($_GET["idProspecto"])) {
        $item = "idProspecto";
        $valor = $_GET["idProspecto"];
      }else{
        $item = "idAgente";
        $valor = $_GET["usuario"];

        $datos = array('fechaInicio' => $_GET["fechaIni"],
                       'fechaFinal' => $_GET["fechaFin"] );
      }
     
    }else{
      $item = "idProspecto";
      $valor = $_GET["idProspecto"];
      $datos = array('fechaInicio' => '');

    }
    
    $parametros = "seg.id,seg.titulo,seg.fecha,agv.nombre as agente,pros.nombreCompleto as prospecto,asg.accion";

    $seguimientos = ControladorFunciones::ctrMostrarSeguimientos($tabla, $item, $valor, $parametros,$datos);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($seguimientos); $i++){
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$seguimientos[$i]["id"].'",
              "'.$seguimientos[$i]["prospecto"].'",
              "'.$seguimientos[$i]["fecha"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $seguimientos[$i]["titulo"]).'</strong>",
               "'.$seguimientos[$i]["accion"].'",
               "'.$seguimientos[$i]["agente"].'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaSeguimientos();
$activar -> mostrarTablas();