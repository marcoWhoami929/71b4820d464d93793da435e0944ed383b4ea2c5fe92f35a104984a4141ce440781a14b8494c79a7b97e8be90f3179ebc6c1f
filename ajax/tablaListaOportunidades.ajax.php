<?php
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaListaOportunidades{

  public function mostrarTablas(){  

    $item = "idProspecto";
    $valor = $_GET["idProspecto"];

    $lista = ControladorFunciones::ctrMostrarListaOportunidadesVenta($item, $valor);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($lista); $i++){


        $acciones = "<div class='btn-group'><button class='btn btn-info btnEditarOportunidad' data-toggle='modal' data-target='#modalActualizarOportunidad' idOportunidad = '".$lista[$i]["idOportunidadVenta"]."'  ><i class='fas fa-edit'></i>Editar</button><button class='btn btn-warning btnCerrarVenta' data-toggle='modal' data-target='#modalCerrarVenta' style='margin-left:20px;' idOportunidad = '".$lista[$i]["idOportunidadVenta"]."' nombreProspecto = '".$lista[$i]["nombreCompleto"]."'><i class='fas fa-money-bill-wave'></i>Cerrar</button></div>";


        switch ($lista[$i]["idCerteza"]) {
            case '1':
              $certeza = "10%";
              break;
            case '2':
              $certeza = "20%";
              break;
            case '3':
              $certeza = "30%";
              break;
            case '4':
              $certeza = "40%";
              break;
            case '5':
              $certeza = "50%";
              break;
            case '6':
              $certeza = "60%";
              break;
            case '7':
              $certeza = "70%";
              break;
            case '8':
              $certeza = "80%";
              break;
            case '9':
              $certeza = "90%";
              break;
            case '10':
              $certeza = "100%";
              break;

          }

      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.($i+1).'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["nombreCompleto"]).'</strong>",
              "<strong>'.rtrim($lista[$i]["concepto"]).'</strong>",
              "'.$lista[$i]["fecha"].'",
              "$ '.number_format($lista[$i]["monto"],2).'",
              "'.$lista[$i]["cierreEstimado"].'",
              "<strong>'.$certeza.'</strong>",
              "<strong>'.$lista[$i]["faseOportunidad"].'</strong>",
              "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaListaOportunidades();
$activar -> mostrarTablas();