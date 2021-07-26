<?php

require_once "../controladores/funciones.controlador.php";
require_once "../modelos/funciones.modelo.php";

class AjaxFuncionesCrm{


	/*=============================================
	OBTENER LISTADO TITULOS
	=============================================*/	

	public $tablaListado;

	public function ajaxObtenerListadosConceptos(){

		$tabla = $this->tablaListado;

		$respuesta = ControladorFunciones::ctrMostrarListadoConceptos($tabla);

		echo json_encode($respuesta);

	}

	/*
	ACTUALIZAR DATOS DEL CLIENTE
	 */
	public $idProspecto;
	public $nombrePerfil;
	public $correoPerfil;
	public $tallerPerfil;
	public $telefonoPerfil;
	public $celularPerfil;
	public $direccionPerfil;
	public $latitudPerfil;
	public $longitudPerfil;
	public $tituloProspectoPerfil;
	public $faseProspectoPerfil;
	public $origenProspectoPerfil;
	public $comentariosPerfil;

	public function ajaxActualizarDatos(){

		$tabla = "prospectos";

		$datos = array('idProspecto' => $this->idProspecto,
					   'nombrePerfil' => $this->nombrePerfil,
					   'correoPerfil' => $this->correoPerfil,
					   'tallerPerfil' => $this->tallerPerfil,
					   'telefonoPerfil' => $this->telefonoPerfil,
					   'celularPerfil' => $this->celularPerfil,
					   'direccionPerfil' => $this->direccionPerfil,
					   'latitudPerfil' => $this->latitudPerfil,
					   'longitudPerfil' => $this->longitudPerfil,
					   'tituloProspectoPerfil' => $this->tituloProspectoPerfil,
					   'faseProspectoPerfil' => $this->faseProspectoPerfil,
					   'origenProspectoPerfil' => $this->origenProspectoPerfil,
					   'comentariosPerfil' => $this->comentariosPerfil);

		$respuesta = ControladorFunciones::ctrActualizarDatos($tabla,$datos);

		echo json_encode($respuesta);

	}
	public $idProspectoOportunidad;
	public $nombreOportunidad;
	public $conceptoOportunidad;
	public $faseOportunidad;
	public $montoOportunidad;
	public $cierreEstimado;
	public $certezaOportunidad;
	public $comentariosOportunidad;
	public function ajaxGenerarOportunidad(){
		$tabla = "oportunidades";

		$datos = array('idProspectoOportunidad' => $this->idProspectoOportunidad,
						'nombreOportunidad' => $this->nombreOportunidad,
						'conceptoOportunidad' => $this->conceptoOportunidad,
						'faseOportunidad' => $this->faseOportunidad,
						'montoOportunidad' => $this->montoOportunidad,
						'cierreEstimado' => $this->cierreEstimado,
						'certezaOportunidad' => $this->certezaOportunidad,
						'comentariosOportunidad' => $this->comentariosOportunidad);

		$respuesta = ControladorFunciones::ctrGenerarOportunidad($tabla,$datos);

		echo json_encode($respuesta);

	}

	public $idOportunidad;
	public function ajaxDetalleOportunidad(){

		$tabla = "oportunidades";
		$item = "id";
		$valor = $this->idOportunidad;

		$respuesta = ControladorFunciones::ctrDetalleOportunidad($tabla,$item,$valor);

		echo json_encode($respuesta);

	}

	public $idOportunidadEdit;
	public $conceptoOportunidadEdit;
	public $faseOportunidadEdit;
	public $montoOportunidadEdit;
	public $cierreEstimadoEdit;
	public $certezaOportunidadEdit;
	public $comentariosOportunidadEdit;
	public $idProspectoOportunidadEdit;

	public function ajaxActualizarOportunidad(){
		$tabla = "oportunidades";

		$datos = array('idOportunidad' => $this->idOportunidadEdit,
						'conceptoOportunidad' => $this->conceptoOportunidadEdit,
						'faseOportunidad' => $this->faseOportunidadEdit,
						'montoOportunidad' => $this->montoOportunidadEdit,
						'cierreEstimado' => $this->cierreEstimadoEdit,
						'certezaOportunidad' => $this->certezaOportunidadEdit,
						'comentariosOportunidad' => $this->comentariosOportunidadEdit,
						'idProspecto' => $this->idProspectoOportunidadEdit);

		$respuesta = ControladorFunciones::ctrActualizarOportunidad($tabla,$datos);

		echo json_encode($respuesta);

	}

	public $idOportunidadVenta;
	public $conceptoVenta;
	public $prospectoVenta;
	public $fechaVenta;
	public $montoVenta;
	public $serieVenta;
	public $folioVenta;
	public $observacionesVenta;
	public $idProspectoVenta;

	public function ajaxCerrarVenta(){

		$datos = array('idOportunidadVenta' => $this->idOportunidadVenta,
						'prospectoVenta' =>$this->prospectoVenta,
						'conceptoVenta' => $this->conceptoVenta,
						'fechaVenta' => $this->fechaVenta,
						'montoVenta' => $this->montoVenta,
						'serieVenta' => $this->serieVenta,
						'folioVenta' => $this->folioVenta,
						'observacionesVenta' => $this->observacionesVenta,
						'idProspectoVenta' => $this->idProspectoVenta);

		$respuesta = ControladorFunciones::ctrCerrarVenta($datos);

		echo json_encode($respuesta);

	}

	public $idVisita;
	public function ajaxDetalleVisita(){

		$tabla = "visitas";
		$item = "id";
		$valor = $this->idVisita;

		$respuesta = ControladorFunciones::ctrDetalleEventos($tabla,$item,$valor);

		echo json_encode($respuesta);

	}
	public $idRecordatorio;
	public function ajaxDetalleRecordatorios(){

		$tabla = "recordatorios";
		$item = "id";
		$valor = $this->idRecordatorio;

		$respuesta = ControladorFunciones::ctrDetalleEventos($tabla,$item,$valor);

		echo json_encode($respuesta);

	}
	public $idDemostracion;
	public function ajaxDetalleDemostraciones(){

		$tabla = "demostraciones";
		$item = "id";
		$valor = $this->idDemostracion;

		$respuesta = ControladorFunciones::ctrDetalleEventos($tabla,$item,$valor);

		echo json_encode($respuesta);

	}

	public $idProspectoRecordatorio;
	public $nombreProspectoRecordatorio;
	public $lugarRecordatorio;
	public $latRecordatorio;
	public $longRecordatorio;
	public $tituloRecordatorio;
	public $fechaInicialRecordatorio;
	public $fechaFinalRecordatorio;
	public $fecha;
	public $hora;
	public $descripcionRecordatorio;
	public $productosRecordatorio;
	public $colorRecordatorio;
	public $evento;

	public function ajaxGenerarEventoNuevo(){
		session_start();
		$idAgente = $_SESSION["id"];
		switch ($this->evento) {
			case 'Cita':
				$tabla = "citas";
				break;
			case 'Visita':
				$tabla = "visitas";
				break;
			case 'Llamada':
				$tabla = "llamada";
				break;
			case 'Recordatorio':
				$tabla = "recordatorios";
				break;
			case 'Demostracion':
				$tabla = "demostraciones";
				break;
			
		}

		$datos = array('idProspectoRecordatorio' => $this->idProspectoRecordatorio,
						'idAgenteRecordatorio' => $idAgente,
						'nombreProspectoRecordatorio' => $this->nombreProspectoRecordatorio,
						'lugarRecordatorio' => $this->lugarRecordatorio,
						'latRecordatorio' => $this->latRecordatorio,
						'longRecordatorio' => $this->longRecordatorio,
						'tituloRecordatorio' => $this->tituloRecordatorio,
						'fechaInicialRecordatorio' => $this->fechaInicialRecordatorio,
						'fechaFinalRecordatorio' => $this->fechaFinalRecordatorio,
						'fechaRecordatorio' => $this->fecha,
						'horaRecordatorio' => $this->hora,
						'descripcionRecordatorio' => $this->descripcionRecordatorio,
						'productosRecordatorio' => $this->productosRecordatorio,
						'colorRecordatorio' => $this->colorRecordatorio,
						'evento' => $this->evento);

		$respuesta = ControladorFunciones::ctrGenerarEventoNuevo($tabla,$datos);

		echo  json_encode($respuesta);


	}
	public $idVenta;
	public function ajaxDetalleVenta(){

		$tabla = "ventas";
		$item = "id";
		$valor = $this->idVenta;

		$respuesta = ControladorFunciones::ctrDetalleVenta($tabla,$item,$valor);

		echo json_encode($respuesta);

	}
	/*
	CREAR NUEVO CLIENTE O PROSPECTO
	 */
	
	public $nombrePerfilCrear;
	public $correoPerfilCrear;
	public $tallerPerfilCrear;
	public $telefonoPerfilCrear;
	public $celularPerfilCrear;
	public $direccionPerfilCrear;
	public $latitudPerfilCrear;
	public $longitudPerfilCrear;
	public $tipoClientePerfilCrear;
	public $clasificacionProspectoPerfilCrear;
	public $comentariosPerfilCrear;

	public function ajaxCargarNuevoProspecto(){

		session_start();
		$idAgente = $_SESSION["id"];
		$tabla = "prospectos";

		$datos = array(
					   'nombrePerfil' => $this->nombrePerfilCrear,
					   'correoPerfil' => $this->correoPerfilCrear,
					   'tallerPerfil' => $this->tallerPerfilCrear,
					   'telefonoPerfil' => $this->telefonoPerfilCrear,
					   'celularPerfil' => $this->celularPerfilCrear,
					   'direccionPerfil' => $this->direccionPerfilCrear,
					   'latitudPerfil' => $this->latitudPerfilCrear,
					   'longitudPerfil' => $this->longitudPerfilCrear,
					   'tipoClientePerfil' => $this->tipoClientePerfilCrear,
					   'clasificacionProspectoPerfil' => $this->clasificacionProspectoPerfilCrear,
					   'comentariosPerfil' => $this->comentariosPerfilCrear,
					  	'idAgentePerfil' => $idAgente);

		$respuesta = ControladorFunciones::ctrCargarNuevoProspecto($tabla,$datos);

		echo json_encode($respuesta);

	}

	public $idProspectoLlamada;
	public $nombreProspectoLlamada;
	public $idAgenteLlamada;
	public $tituloLlamada;
	public $fechaLlamada;
	public $horaLlamada;
	public $descripcionLlamada;

	public function ajaxGenerarLlamadaDirecta(){

		$tabla = 'llamada';
		$datos = array(
						'idProspectoLlamada' => $this->idProspectoLlamada,
						'nombreProspectoLlamada' => $this->nombreProspectoLlamada,
						'idAgenteLlamada' => $this->idAgenteLlamada,
						'tituloLlamada' => $this->tituloLlamada,
						'fechaLlamada' => $this->fechaLlamada,
						'horaLlamada' => $this->horaLlamada,
						'descripcionLlamada' => $this->descripcionLlamada);

		$respuesta = ControladorFunciones::ctrGenerarLlamadaDirecta($tabla,$datos);

		echo json_encode($respuesta);



	}
	public $eventId;
	public $eventoElegido;
	public function ajaxDetalleEvento(){
		$evento = $this->eventoElegido;
		switch ($evento) {
			case 'Cita':
				$tabla = "citas";
				break;
			case 'Visita':
				$tabla = "visitas";
				break;
			case 'Llamada':
				$tabla = "llamada";
				break;
			case 'Recordatorio':
				$tabla = "recordatorios";
				break;
			case 'Demostracion':
				$tabla = "demostraciones";
				break;
		}
		$item = "id";
		$valor = $this->eventId;

		$respuesta = ControladorFunciones::ctrDetalleEvento($tabla,$item,$valor);

		echo json_encode($respuesta);

	}

	public $idEventoRecordatorioEdit;
	public $lugarRecordatorioEdit;
	public $latRecordatorioEdit;
	public $longRecordatorioEdit;
	public $tituloRecordatorioEdit;
	public $fechaInicialRecordatorioEdit;
	public $fechaFinalRecordatorioEdit;
	public $fechaEdit;
	public $horaEdit;
	public $descripcionRecordatorioEdit;
	public $productosRecordatorioEdit;
	public $colorRecordatorioEdit;
	public $eventoEdit;
	public $nombreProspectoRecordatorioEdit;
	public $idProspectoRecordatorioEdit;

	public function ajaxActualizarEvento(){
		session_start();
		$idAgente = $_SESSION["id"];
		switch ($this->eventoEdit) {
			case 'Cita':
				$tabla = "citas";
				break;
			case 'Visita':
				$tabla = "visitas";
				break;
			case 'Llamada':
				$tabla = "llamada";
				break;
			case 'Recordatorio':
				$tabla = "recordatorios";
				break;
			case 'Demostracion':
				$tabla = "demostraciones";
				break;
			
		}
		$datos = array(
					    'idEventoRecordatorioEdit' => $this->idEventoRecordatorioEdit,
					    'idAgenteRecordatorioEdit' => $idAgente,
						'lugarRecordatorioEdit' => $this->lugarRecordatorioEdit,
						'latRecordatorioEdit' => $this->latRecordatorioEdit,
						'longRecordatorioEdit' => $this->longRecordatorioEdit,
						'tituloRecordatorioEdit' => $this->tituloRecordatorioEdit,
						'fechaInicialRecordatorioEdit' => $this->fechaInicialRecordatorioEdit,
						'fechaFinalRecordatorioEdit' => $this->fechaFinalRecordatorioEdit,
						'fechaEdit' => $this->fechaEdit,
						'horaEdit' => $this->horaEdit,
						'descripcionRecordatorioEdit' => $this->descripcionRecordatorioEdit,
						'productosRecordatorioEdit' => $this->productosRecordatorioEdit,
						'colorRecordatorioEdit' => $this->colorRecordatorioEdit,
						'nombreProspectoRecordatorioEdit' => $this->nombreProspectoRecordatorioEdit,
						'idProspectoRecordatorioEdit' => $this->idProspectoRecordatorioEdit,
						'eventoEdit' => $this->eventoEdit);

		$respuesta = ControladorFunciones::ctrActualizarEvento($tabla,$datos);

		echo  json_encode($respuesta);



	}

	public $idProspectoVentaDirecta;
	public $nombreVentaDirecta;
	public $conceptoVentaDirecta;
	public $faseVentaDirecta;
	public $montoVentaDirecta;
	public $cierreEstimadoVentaDirecta;
	public $certezaVentaDirecta;
	public $comentariosVentaDirecta;
	public $idFacturaVentaDirecta;
	public $serieVentaDirecta;
	public $folioVentaDirecta;
	public $clienteVentaDirecta;

	public function ajaxNuevaVentaDirecta(){

		$tabla = "oportunidades";

		$datos = array('idProspectoVentaDirecta' => $this->idProspectoVentaDirecta,
						'nombreVentaDirecta' => $this->nombreVentaDirecta,
						'conceptoVentaDirecta' => $this->conceptoVentaDirecta,
						'faseVentaDirecta' => $this->faseVentaDirecta,
						'montoVentaDirecta' => $this->montoVentaDirecta,
						'cierreEstimadoVentaDirecta' => $this->cierreEstimadoVentaDirecta,
						'certezaVentaDirecta' => $this->certezaVentaDirecta,
						'comentariosVentaDirecta' => $this->comentariosVentaDirecta,
						'idFacturaVentaDirecta' => $this->idFacturaVentaDirecta,
						'serieVentaDirecta' => $this->serieVentaDirecta,
						'folioVentaDirecta' => $this->folioVentaDirecta,
						'clienteVentaDirecta' => $this->clienteVentaDirecta);

		$respuesta = ControladorFunciones::ctrGenerarNuevaVentaDirecta($tabla,$datos);

		echo json_encode($respuesta);
	} 
	public $idDescartado;
	public $nombreDescartado;
	public $motivoDescartado;
	public function ajaxDescartarProspecto(){
	
		$tabla = 'prospectos';
		$datos = array(
						'idDescartado' => $this->idDescartado,
						'nombreDescartado' => $this->nombreDescartado,
						'motivoDescartado' => $this->motivoDescartado);

		$respuesta = ControladorFunciones::ctrDescartarProspecto($tabla,$datos);

		echo json_encode($respuesta);

	}
	public $idEventoDelete;
	public $eventoDelete;
	public $tituloEventoDelete;
	public $prospectoEventoDelete;
	public $idProspectoEventoDelete;

	public function ajaxEliminarEvento(){

		session_start();
		$idAgente = $_SESSION["id"];
		$agente = $_SESSION["nombre"];
		switch ($this->eventoDelete) {
			case 'Cita':
				$tabla = "citas";
				break;
			case 'Visita':
				$tabla = "visitas";
				break;
			case 'Llamada':
				$tabla = "llamada";
				break;
			case 'Recordatorio':
				$tabla = "recordatorios";
				break;
			case 'Demostracion':
				$tabla = "demostraciones";
				break;
			
		}
		$datos = array(
					    'idEvento' => $this->idEventoDelete,
					    'tituloEvento' => $this->tituloEventoDelete,
						'contactoEvento' => $this->prospectoEventoDelete,
						'idContactoEvento'  => $this->idProspectoEventoDelete,
						'idAgente' => $idAgente,
						'nombreAgente' => $agente,
						'evento' => $this->eventoDelete);

		$respuesta = ControladorFunciones::ctrEliminarEvento($tabla,$datos);

		echo  json_encode($respuesta);


	}

}
/*=============================================
OBTENER LISTADO CONCEPTOS
=============================================*/	

if(isset($_POST["tablaListado"])){

	$obtener = new AjaxFuncionesCrm();
	$obtener -> tablaListado = $_POST["tablaListado"];
	$obtener -> ajaxObtenerListadosConceptos();

}
if (isset($_POST["idProspecto"])) {
	$actualizar = new AjaxFuncionesCrm();
	$actualizar ->  idProspecto = $_POST["idProspecto"];
	$actualizar ->	nombrePerfil = $_POST["nombrePerfil"];
	$actualizar ->	correoPerfil = $_POST["correoPerfil"];
	$actualizar ->	tallerPerfil = $_POST["tallerPerfil"];
	$actualizar ->	telefonoPerfil = $_POST["telefonoPerfil"];
	$actualizar ->	celularPerfil = $_POST["celularPerfil"];
	$actualizar ->	direccionPerfil = $_POST["direccionPerfil"];
	$actualizar ->	latitudPerfil = $_POST["latitudPerfil"];
	$actualizar ->	longitudPerfil = $_POST["longitudPerfil"];
	$actualizar ->	tituloProspectoPerfil = $_POST["tituloProspectoPerfil"];
	$actualizar ->	faseProspectoPerfil = $_POST["faseProspectoPerfil"];
	$actualizar ->	origenProspectoPerfil = $_POST["origenProspectoPerfil"];
	$actualizar ->	comentariosPerfil = $_POST["comentariosPerfil"];
	$actualizar -> ajaxActualizarDatos();
}
if (isset($_POST["idProspectoOportunidad"])) {
	$generar = new AjaxFuncionesCrm();
	$generar -> idProspectoOportunidad  = $_POST["idProspectoOportunidad"];
	$generar -> nombreOportunidad  = $_POST["nombreOportunidad"];
	$generar ->	conceptoOportunidad = $_POST["conceptoOportunidad"];
	$generar ->	faseOportunidad = $_POST["faseOportunidad"];
	$generar ->	montoOportunidad = $_POST["montoOportunidad"];
	$generar ->	cierreEstimado = $_POST["cierreEstimado"];
	$generar ->	certezaOportunidad = $_POST["certezaOportunidad"];
	$generar ->	comentariosOportunidad = $_POST["comentariosOportunidad"];
	$generar -> ajaxGenerarOportunidad();
}
if (isset($_POST["idOportunidad"])) {

	$datos = new AjaxFuncionesCrm();
	$datos -> idOportunidad = $_POST["idOportunidad"];
	$datos -> ajaxDetalleOportunidad();
}
if (isset($_POST["idOportunidadEdit"])) {
	$actualizar = new AjaxFuncionesCrm();
	$actualizar -> idOportunidadEdit  = $_POST["idOportunidadEdit"];
	$actualizar -> conceptoOportunidadEdit = $_POST["conceptoOportunidadEdit"];
	$actualizar ->	faseOportunidadEdit = $_POST["faseOportunidadEdit"];
	$actualizar ->	montoOportunidadEdit = $_POST["montoOportunidadEdit"];
	$actualizar ->	cierreEstimadoEdit = $_POST["cierreEstimadoEdit"];
	$actualizar ->	certezaOportunidadEdit = $_POST["certezaOportunidadEdit"];
	$actualizar ->	comentariosOportunidadEdit = $_POST["comentariosOportunidadEdit"];
	$actualizar -> idProspectoOportunidadEdit = $_POST["idProspectoOportunidadEdit"];
	$actualizar -> ajaxActualizarOportunidad();
}
if (isset($_POST["idOportunidadVenta"])) {
	$cerrar = new AjaxFuncionesCrm();
	$cerrar -> idOportunidadVenta = $_POST["idOportunidadVenta"];
	$cerrar -> conceptoVenta = $_POST["conceptoVenta"];
	$cerrar -> prospectoVenta = $_POST["prospectoVenta"];
	$cerrar -> fechaVenta = $_POST["fechaVenta"];
	$cerrar -> montoVenta = $_POST["montoVenta"];
	$cerrar -> serieVenta = $_POST["serieVenta"];
	$cerrar -> folioVenta = $_POST["folioVenta"];
	$cerrar -> observacionesVenta = $_POST["observacionesVenta"];
	$cerrar -> idProspectoVenta = $_POST["idProspectoVenta"];
	$cerrar -> ajaxCerrarVenta();
}
if(isset($_POST["idVisita"])){

	$detalle = new AjaxFuncionesCrm();
	$detalle -> idVisita = $_POST["idVisita"];
	$detalle -> ajaxDetalleVisita();

}
if(isset($_POST["idRecordatorio"])){

	$detalle = new AjaxFuncionesCrm();
	$detalle -> idRecordatorio = $_POST["idRecordatorio"];
	$detalle -> ajaxDetalleRecordatorios();

}
if(isset($_POST["idDemostracion"])){

	$detalle = new AjaxFuncionesCrm();
	$detalle -> idDemostracion = $_POST["idDemostracion"];
	$detalle -> ajaxDetalleDemostraciones();

}
if (isset($_POST["idProspectoRecordatorio"])) {
	$nuevoEvento = new AjaxFuncionesCrm();
	$nuevoEvento -> idProspectoRecordatorio = $_POST["idProspectoRecordatorio"];
	$nuevoEvento -> nombreProspectoRecordatorio = $_POST["nombreProspectoRecordatorio"];
	$nuevoEvento -> lugarRecordatorio = $_POST["lugarRecordatorio"];
	$nuevoEvento -> latRecordatorio = $_POST["latRecordatorio"];
	$nuevoEvento -> longRecordatorio = $_POST["longRecordatorio"];
	$nuevoEvento -> tituloRecordatorio = $_POST["tituloRecordatorio"];
	$nuevoEvento -> fechaInicialRecordatorio = $_POST["fechaInicialRecordatorio"];
	$nuevoEvento -> fechaFinalRecordatorio = $_POST["fechaFinalRecordatorio"];
	$nuevoEvento -> fecha = $_POST["fecha"];
	$nuevoEvento -> hora = $_POST["hora"];
	$nuevoEvento -> descripcionRecordatorio = $_POST["descripcionRecordatorio"];
	$nuevoEvento -> productosRecordatorio = $_POST["productosRecordatorio"];
	$nuevoEvento -> colorRecordatorio = $_POST["colorRecordatorio"];
	$nuevoEvento -> evento = $_POST["evento"];
	$nuevoEvento -> ajaxGenerarEventoNuevo();
}
if (isset($_POST["idVenta"])) {

	$datos = new AjaxFuncionesCrm();
	$datos -> idVenta = $_POST["idVenta"];
	$datos -> ajaxDetalleVenta();
}
if (isset($_POST["nombrePerfilCrear"])) {
	$insertar = new AjaxFuncionesCrm();
	$insertar -> nombrePerfilCrear = $_POST["nombrePerfilCrear"];
	$insertar -> correoPerfilCrear = $_POST["correoPerfilCrear"];
	$insertar -> tallerPerfilCrear = $_POST["tallerPerfilCrear"];
	$insertar -> telefonoPerfilCrear = $_POST["telefonoPerfilCrear"];
	$insertar -> celularPerfilCrear = $_POST["celularPerfilCrear"];
	$insertar -> direccionPerfilCrear = $_POST["direccionPerfilCrear"];
	$insertar -> latitudPerfilCrear = $_POST["latitudPerfilCrear"];
	$insertar -> longitudPerfilCrear = $_POST["longitudPerfilCrear"];
	$insertar -> tipoClientePerfilCrear = $_POST["tipoClientePerfilCrear"];
	$insertar -> clasificacionProspectoPerfilCrear = $_POST["clasificacionProspectoPerfilCrear"];
	$insertar -> comentariosPerfilCrear = $_POST["comentariosPerfilCrear"];
	$insertar -> ajaxCargarNuevoProspecto();
}
if (isset($_POST["idProspectoLlamada"])) {
	$generar = new AjaxFuncionesCrm();
	$generar -> idProspectoLlamada = $_POST["idProspectoLlamada"];
	$generar -> nombreProspectoLlamada = $_POST["nombreProspectoLlamada"];
	$generar -> idAgenteLlamada = $_POST["idAgenteLlamada"];
	$generar -> tituloLlamada = $_POST["tituloLlamada"];
	$generar -> fechaLlamada = $_POST["fechaLlamada"];
	$generar -> horaLlamada = $_POST["horaLlamada"];
	$generar -> descripcionLlamada = $_POST["descripcionLlamada"];
	$generar -> ajaxGenerarLlamadaDirecta();

}
if (isset($_POST["eventId"])) {

	$detalleEvento = new AjaxFuncionesCrm();
	$detalleEvento -> eventId = $_POST["eventId"];
	$detalleEvento -> eventoElegido = $_POST["eventoElegido"];
	$detalleEvento -> ajaxDetalleEvento();
}
if (isset($_POST["idEventoRecordatorioEdit"])) {
	$actualizarEvento = new AjaxFuncionesCrm();
	$actualizarEvento -> idEventoRecordatorioEdit = $_POST["idEventoRecordatorioEdit"];
	$actualizarEvento -> lugarRecordatorioEdit = $_POST["lugarRecordatorioEdit"];
	$actualizarEvento -> latRecordatorioEdit = $_POST["latRecordatorioEdit"];
	$actualizarEvento -> longRecordatorioEdit = $_POST["longRecordatorioEdit"];
	$actualizarEvento -> tituloRecordatorioEdit = $_POST["tituloRecordatorioEdit"];
	$actualizarEvento -> fechaInicialRecordatorioEdit = $_POST["fechaInicialRecordatorioEdit"];
	$actualizarEvento -> fechaFinalRecordatorioEdit = $_POST["fechaFinalRecordatorioEdit"];
	$actualizarEvento -> fechaEdit = $_POST["fechaEdit"];
	$actualizarEvento -> horaEdit = $_POST["horaEdit"];
	$actualizarEvento -> descripcionRecordatorioEdit = $_POST["descripcionRecordatorioEdit"];
	$actualizarEvento -> productosRecordatorioEdit = $_POST["productosRecordatorioEdit"];
	$actualizarEvento -> colorRecordatorioEdit = $_POST["colorRecordatorioEdit"];
	$actualizarEvento -> nombreProspectoRecordatorioEdit = $_POST["nombreProspectoRecordatorioEdit"];
	$actualizarEvento -> idProspectoRecordatorioEdit = $_POST["idProspectoRecordatorioEdit"];
	$actualizarEvento -> eventoEdit = $_POST["eventoEdit"];
	$actualizarEvento -> ajaxActualizarEvento();
}
if (isset($_POST["idProspectoVentaDirecta"])) {

	$generarVentaDirecta = new AjaxFuncionesCrm();
	$generarVentaDirecta -> idProspectoVentaDirecta = $_POST["idProspectoVentaDirecta"];
	$generarVentaDirecta -> nombreVentaDirecta = $_POST["nombreVentaDirecta"];
	$generarVentaDirecta -> conceptoVentaDirecta = $_POST["conceptoVentaDirecta"];
	$generarVentaDirecta -> faseVentaDirecta = $_POST["faseVentaDirecta"];
	$generarVentaDirecta -> montoVentaDirecta = $_POST["montoVentaDirecta"];
	$generarVentaDirecta -> cierreEstimadoVentaDirecta = $_POST["cierreEstimadoVentaDirecta"];
	$generarVentaDirecta -> certezaVentaDirecta = $_POST["certezaVentaDirecta"];
	$generarVentaDirecta -> comentariosVentaDirecta = $_POST["comentariosVentaDirecta"];
	$generarVentaDirecta -> idFacturaVentaDirecta = $_POST["idFacturaVentaDirecta"];
	$generarVentaDirecta -> serieVentaDirecta = $_POST["serieVentaDirecta"];
	$generarVentaDirecta -> folioVentaDirecta = $_POST["folioVentaDirecta"];
	$generarVentaDirecta -> clienteVentaDirecta = $_POST["clienteVentaDirecta"];
	$generarVentaDirecta -> ajaxNuevaVentaDirecta();
}
if (isset($_POST["idDescartado"])) {

	$descartarProspecto = new AjaxFuncionesCrm();
	$descartarProspecto -> idDescartado = $_POST["idDescartado"];
	$descartarProspecto -> nombreDescartado = $_POST["nombreDescartado"];
	$descartarProspecto -> motivoDescartado = $_POST["motivoDescartado"];
	$descartarProspecto -> ajaxDescartarProspecto();
}
if(isset($_POST["idEventoDelete"])){
	
	$eliminarEvento = new AjaxFuncionesCrm();
	$eliminarEvento -> idEventoDelete = $_POST["idEventoDelete"];
	$eliminarEvento -> eventoDelete = $_POST["eventoDelete"];
	$eliminarEvento -> tituloEventoDelete = $_POST["tituloEventoDelete"];
	$eliminarEvento -> prospectoEventoDelete = $_POST["prospectoEventoDelete"];
	$eliminarEvento -> idProspectoEventoDelete = $_POST["idProspectoEventoDelete"];
	$eliminarEvento -> ajaxEliminarEvento();

}