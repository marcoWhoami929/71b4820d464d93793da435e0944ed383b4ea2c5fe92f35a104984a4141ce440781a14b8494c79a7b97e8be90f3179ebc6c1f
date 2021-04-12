<?php

require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class AjaxFuncionesCrm{


	/*=============================================
	OBTENER DETALLE PROSPECTO
	=============================================*/	

	public $identificador;

	public function ajaxObtenerDetalleCliente(){

		$tabla = "prospectos";
		$item = "id";
		$valor = $this->identificador;

		$respuesta = ControladorFunciones::ctrMostrarDetalleCliente($tabla,$item,$valor);

		echo json_encode($respuesta);

	}


}

/*=============================================
OBTENER  DETALLE CLIENTE
=============================================*/	

if(isset($_POST["identificador"])){

	$detalle = new AjaxFuncionesCrm();
	$detalle -> identificador = $_POST["identificador"];
	$detalle -> ajaxObtenerDetalleCliente();

}
