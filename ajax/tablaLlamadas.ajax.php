<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaLlamadas{

  public function mostrarTablas(){  
    $tabla = "llamada";
    $item = "idProspecto";
    $valor = $_GET["idProspecto"];

    $parametros = "id,titulo,descripcion,fecha,hora,fechaCreacion,finalizada";

    $llamadas = ControladorFunciones::ctrMostrarEventos($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($llamadas); $i++){
      if($llamadas[$i]["finalizada"] == 0){
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:red'></i></div>";
      }else{
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:green'></i></div>";
      }
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$llamadas[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $llamadas[$i]["titulo"]).'</strong>",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $llamadas[$i]["descripcion"]).'</strong>",
              "'.$llamadas[$i]["fecha"].'-'.$llamadas[$i]["hora"].'",
              "'.$llamadas[$i]["fechaCreacion"].'",
              "'.$estatus.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaLlamadas();
$activar -> mostrarTablas();