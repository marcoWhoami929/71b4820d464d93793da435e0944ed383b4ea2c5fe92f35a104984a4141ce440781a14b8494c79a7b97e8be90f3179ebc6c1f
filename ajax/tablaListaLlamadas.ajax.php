<?php
session_start();
require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class TablaListaLlamadas{

  public function mostrarTablas(){  
    $tabla = "prospectos";
    $item = "idAgente";
    $valor = $_SESSION["id"];

  
    $parametros = "id,nombreCompleto,telefono,celular,estatus,idAgente";

    $lista = ControladorFunciones::ctrMostrarListaProspectosClientes($tabla, $item, $valor, $parametros);

    $datosJson = '{
     
    "data": [ ';

    for($i = 0; $i < count($lista); $i++){
      if ($lista[$i]["estatus"] === 0) {
        $estatus = "<div class='btn-group'><button class='btn btn-danger'>Descartado</button></div>";
      }else{
        $estatus = "<div class='btn-group'><button class='btn btn-success'>Activo</button></div>";
      }
      if ($lista[$i]["telefono"] != "") {
          $telefono = "<button type='button' class='btnNuevaLlamada' style='border:none;background-color: transparent !important;' idAgenteVenta='".$lista[$i]["idAgente"]."' idCliente='".$lista[$i]["id"]."' telefonoCliente='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["telefono"])."' nameProspecto='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["nombreCompleto"])."'><i class='fas fa-phone-volume fa-3x'></i></button>";
      }else{

        $telefono ="";
      }

      if ($lista[$i]["celular"] != "") {
           $celular = "<button type='button' class='btnNuevaLlamada' style='border:none;background-color: transparent !important;' idAgenteVenta='".$lista[$i]["idAgente"]."' idCliente='".$lista[$i]["id"]."' telefonoCliente='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["celular"])."' nameProspecto='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["nombreCompleto"])."'><i class='fas fa-mobile-alt fa-3x'></i></button>";
      }else{

        $celular ="";
      }
    
      $acciones = "<button type=button id='".$lista[$i]["id"]."' nombre='".preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["nombreCompleto"])."' class='btn btnModal btn-sm btnViewClient'><i class='glyphicon glyphicon-pencil'></i></button>";
     
      /*=============================================
      DEVOLVER DATOS JSON
      =============================================*/
      
      $datosJson   .= '[
              "'.$lista[$i]["id"].'",
              "<strong>'.preg_replace(['/\s+/','/^\s|\s$/'],[' ',''], $lista[$i]["nombreCompleto"]).'</strong>",
              "'.$telefono.'",
              "'.$celular.'",
              "'.$estatus.'",
              "'.$acciones.'"],';

    }

    $datosJson = substr($datosJson, 0, -1);

    $datosJson.=  ']
        
    }'; 

    echo $datosJson;

  }

}

$activar = new TablaListaLlamadas();
$activar -> mostrarTablas();