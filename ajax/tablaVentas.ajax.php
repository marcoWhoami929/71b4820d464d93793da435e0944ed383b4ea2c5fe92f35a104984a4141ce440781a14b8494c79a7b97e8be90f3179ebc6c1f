<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaVentas{

  public function mostrarTablas(){  
    $tabla = "ventas";
    $item = "idOportunidad";
    $valor = $_GET["idProspecto"];

    $parametros = "vt.id,vt.concepto,vt.cerradoDia,vt.montoTotal as montoVenta,vt.estatusPagos,vt.idAgente,op.monto montoOportunidad,(vt.montoTotal / op.monto * 100) as surtimiento";

    $ventas = ControladorFunciones::ctrMostrarVentas($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($ventas); $i++){
      
      $acciones = "<div class='btn-group'><button class='btn btn-info btnMostrarDetalleVenta' data-toggle='modal' data-target='#modalDetalleVenta' idVenta = '".$ventas[$i]["id"]."'><i class='fas fa-eye'></i>Ver</button></div>";
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$ventas[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $ventas[$i]["concepto"]).'</strong>",
               "'.$ventas[$i]["cerradoDia"].'",
               "'.$ventas[$i]["estatusPagos"].'",
               "<strong>$ '.number_format($ventas[$i]["montoOportunidad"],2).'</strong>",
               "<strong>$ '.number_format($ventas[$i]["montoVenta"],2).'</strong>",
               "<strong>$ '.number_format($ventas[$i]["surtimiento"],2).' %</strong>",
               "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaVentas();
$activar -> mostrarTablas();