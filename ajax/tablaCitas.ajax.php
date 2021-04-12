<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaCitas{

  public function mostrarTablas(){  
    $tabla = "citas";
    $item = "idProspecto";
    $valor = $_GET["idProspecto"];

    $parametros = "id,descripcion,fecha,hora,invitados,ubicacion,fechaCreacion,finalizada";

    $citas = ControladorFunciones::ctrMostrarEventos($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($citas); $i++){
      if($citas[$i]["finalizada"] == 0){
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:red'></i></div>";
      }else{
        $estatus = "<div class='btn-group'><i class='fas fa-flag' style='color:green'></i></div>";
      }
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$citas[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $citas[$i]["descripcion"]).'</strong>",
              "'.$citas[$i]["fecha"].'-'.$citas[$i]["hora"].'",
              "'.$citas[$i]["invitados"].'",
              "'.$citas[$i]["ubicacion"].'",
              "'.$citas[$i]["fechaCreacion"].'",
              "'.$estatus.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaCitas();
$activar -> mostrarTablas();