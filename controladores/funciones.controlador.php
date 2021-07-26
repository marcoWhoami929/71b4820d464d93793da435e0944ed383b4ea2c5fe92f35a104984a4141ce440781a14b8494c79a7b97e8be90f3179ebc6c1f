<?php

/**
 * 
 */
class ControladorFunciones
{
	
	static public function ctrMostrarListadoConceptos($tabla){

		$respuesta = ModeloFunciones::mdlMostrarListadoConceptos($tabla);

		return $respuesta;

	}
	static public function ctrMostrarDetalleCliente($tabla,$item,$valor){

		$respuesta = ModeloFunciones::mdlMostrarDetalleCliente($tabla,$item,$valor);

		return $respuesta;

	}
	static public function ctrActualizarDatos($tabla,$datos){

		$respuesta = ModeloFunciones::mdlActualizarDatos($tabla,$datos);

		return $respuesta;

	}
	static public function ctrGenerarOportunidad($tabla,$datos){

		$respuesta = ModeloFunciones::mldGenerarOportunidad($tabla,$datos);

		return $respuesta;

	}
	static public function ctrMostrarListaOportunidadesVenta($item,$valor){

		$respuesta = ModeloFunciones::mdlMostrarListaOportunidadesVenta($item,$valor);

		return $respuesta;

	}
	static public function ctrDetalleOportunidad($tabla,$item,$valor){

		$respuesta = ModeloFunciones::mdlDetalleOportunidad($tabla,$item,$valor);

		return $respuesta;

	}
	static public function ctrActualizarOportunidad($tabla,$datos){

		$respuesta = ModeloFunciones::mdlActualizarOportunidad($tabla,$datos);

		return $respuesta;

	}
	static public function ctrCerrarVenta($datos){
		$tabla = 'ventas';

		$respuesta = ModeloFunciones::mdlCerrarVenta($tabla,$datos);

		return $respuesta;

	}
	static public function ctrMostrarEventos($tabla, $item, $valor, $parametros){

		$respuesta = ModeloFunciones::mdlMostrarEventos($tabla, $item, $valor, $parametros);

		return $respuesta;

	}
	static public function ctrDetalleEventos($tabla,$item,$valor){

		$respuesta = ModeloFunciones::mdlDetallesEventos($tabla,$item,$valor);

		return $respuesta;

	}
	static public function ctrGenerarEventoNuevo($tabla,$datos){

		$respuesta = ModeloFunciones::mdlGenerarEventoNuevo($tabla,$datos);

		return $respuesta;

	}
	static public function ctrMostrarSeguimientos($tabla, $item, $valor, $parametros,$datos){

		$respuesta = ModeloFunciones::mdlMostrarSeguimientos($tabla, $item, $valor, $parametros,$datos);

		return $respuesta;

	}
	static public function ctrMostrarVentas($tabla, $item, $valor, $parametros){

		$respuesta = ModeloFunciones::mdlMostrarVentas($tabla, $item, $valor, $parametros);

		return $respuesta;

	}
	static public function ctrDetalleVenta($tabla,$item,$valor){

		$respuesta = ModeloFunciones::mdlDetalleVenta($tabla,$item,$valor);

		return $respuesta;

	}
	static public function ctrCargarNuevoProspecto($tabla,$datos){

		$respuesta = ModeloFunciones::mdlCargarNuevoProspecto($tabla,$datos);

		return $respuesta;

	}
	static public function ctrMostrarListaProspectosClientes($tabla, $item, $valor, $parametros){

		$respuesta = ModeloFunciones::mdlMostrarListaProspectosClientes($tabla, $item, $valor, $parametros);

		return $respuesta;

	}
	static public function ctrGenerarLlamadaDirecta($tabla,$datos){

		$respuesta = ModeloFunciones::mdlGenerarLlamadaDirecta($tabla,$datos);

		return $respuesta;

	}
	static public function ctrDetalleEvento($tabla,$item,$valor){

		$respuesta = ModeloFunciones::mdlDetallesEvento($tabla,$item,$valor);

		return $respuesta;

	}
	static public function ctrActualizarEvento($tabla,$datos){

		$respuesta = ModeloFunciones::mdlActualizarEvento($tabla,$datos);

		return $respuesta;

	}
	static public function ctrGenerarNuevaVentaDirecta($tabla,$datos){

		$respuesta = ModeloFunciones::mdlGenerarNuevaVentaDirecta($tabla,$datos);

		return $respuesta;

	}
	static public function ctrObtenerIndicadores($tabla,$parametros,$condicion){

		$respuesta = ModeloFunciones::mdlObtenerIndicadores($tabla,$parametros,$condicion);

		return $respuesta;

	}
	static public function ctrDescartarProspecto($tabla,$datos){

		$respuesta = ModeloFunciones::mdlDescartarProspecto($tabla,$datos);

		return $respuesta;

	}
	static public function ctrEliminarEvento($tabla,$datos){

		$respuesta = ModeloFunciones::mdlEliminarEvento($tabla,$datos);

		return $respuesta;

	}
	
}
?>