<?php

require_once "conexion.php";
require_once "conexion-blitz.php";

/**
 * 
 */
class ModeloFunciones
{

	static public function mdlMostrarListadoConceptos($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;
	}

	static public function mdlMostrarDetalleCliente($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla where $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	static public function mdlActualizarDatos($tabla, $datos){

			session_start();
	        $idAgente = $_SESSION["id"];
	        $idProspecto = $datos["idProspecto"];
	        $accion = "".$_SESSION["nombre"]." actualizó los datos de ".$datos["nombrePerfil"]."";
        	$idAccion = 17;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombreCompleto = :nombrePerfil,correo = :correoPerfil,taller = :tallerPerfil,telefono = :telefonoPerfil,celular = :celularPerfil,domicilio = :direccionPerfil,latitud = :latitudPerfil,longitud = :longitudPerfil,tituloProspecto = :tituloProspectoPerfil, faseProspecto = :faseProspectoPerfil, origenProspecto = :origenProspectoPerfil,comentario = :comentariosPerfil WHERE id = :idProspecto");

			$stmt -> bindParam(":idProspecto", $datos["idProspecto"], PDO::PARAM_INT);
			$stmt -> bindParam(":nombrePerfil", $datos["nombrePerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":correoPerfil", $datos["correoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":tallerPerfil", $datos["tallerPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":telefonoPerfil", $datos["telefonoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":celularPerfil", $datos["celularPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":direccionPerfil", $datos["direccionPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":latitudPerfil", $datos["latitudPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":longitudPerfil", $datos["longitudPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":tituloProspectoPerfil", $datos["tituloProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":faseProspectoPerfil", $datos["faseProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":origenProspectoPerfil", $datos["origenProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":comentariosPerfil", $datos["comentariosPerfil"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mldGenerarOportunidad($tabla, $datos){

			 switch ($datos["certezaOportunidad"]) {
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
	        session_start();
	        $idAgente = $_SESSION["id"];
	        $idProspecto = $datos["idProspectoOportunidad"];
	        $accion = "Nueva oportunidad de venta creada para ".$datos["nombreOportunidad"]." con el ".$certeza." en certeza.";
        	$idAccion = 7;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();

        	$obtenerTotalOportunidades = Conexion::conectar()->prepare("SELECT COUNT(id) as total FROM oportunidades WHERE idProspecto = '".$idProspecto."' and ventaCerrada = 0");

        	$obtenerTotalOportunidades -> execute();

        	$filas = $obtenerTotalOportunidades->fetchAll(PDO::FETCH_ASSOC);
			foreach ($filas as $fila) {
			     $totalOportunidades = $fila['total']+1;
			}

			$prospecto = Conexion::conectar()->prepare("UPDATE `prospectos` SET `oportunidad` = '1',`oportunidadesCreadas` = '".$totalOportunidades."' WHERE `id` = '".$idProspecto."'");

			$prospecto -> execute();

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`idProspecto`,`concepto`,`idFaseOportunidad`,`monto`,`comision`,`porcentajeComision`,`cierreEstimado`,`idCerteza`,`observaciones`,`idAgente`,`ventaCerrada`) values (:idProspectoOportunidad,:conceptoOportunidad,:faseOportunidad,:montoOportunidad,'0','0.00',:cierreEstimado,:certezaOportunidad,:comentariosOportunidad,'$idAgente','0')");
	
			$stmt -> bindParam(":idProspectoOportunidad", $datos["idProspectoOportunidad"], PDO::PARAM_INT);
			$stmt -> bindParam(":conceptoOportunidad", $datos["conceptoOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":faseOportunidad", $datos["faseOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":montoOportunidad", $datos["montoOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":cierreEstimado", $datos["cierreEstimado"], PDO::PARAM_STR);
			$stmt -> bindParam(":certezaOportunidad", $datos["certezaOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":comentariosOportunidad", $datos["comentariosOportunidad"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarListaOportunidadesVenta($item,$valor){
			if ($valor == "0") {
			session_start();
			$idAgente = $_SESSION["id"];


		$stmt = Conexion::conectar()->prepare("SELECT prosp.id as idProspecto,prosp.nombreCompleto,opor.id as idOportunidadVenta,opor.fecha,opor.monto,opor.concepto,opor.cierreEstimado,opor.idCerteza,fas.faseOportunidad FROM oportunidades as opor INNER JOIN prospectos as prosp ON opor.idProspecto = prosp.id INNER JOIN faseoportunidades as fas ON opor.idFaseOportunidad = fas.id WHERE opor.idAgente = $idAgente and ventaCerrada = 0");


		$stmt -> execute();

		return $stmt -> fetchAll();
		
			
		}else{


		$stmt = Conexion::conectar()->prepare("SELECT prosp.id as idProspecto,prosp.nombreCompleto,opor.id as idOportunidadVenta,opor.fecha,opor.monto,opor.concepto,opor.cierreEstimado,opor.idCerteza,fas.faseOportunidad FROM oportunidades as opor INNER JOIN prospectos as prosp ON opor.idProspecto = prosp.id INNER JOIN faseoportunidades as fas ON opor.idFaseOportunidad = fas.id WHERE opor.idProspecto = :$item and ventaCerrada = 0");


		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();


		}


		$stmt -> close();

		$stmt = null;
	}
	static public function mdlDetalleOportunidad($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT id,concepto,idFaseOportunidad,monto,cierreEstimado,idCerteza,observaciones FROM $tabla WHERE id = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	static public function mdlActualizarOportunidad($tabla, $datos){

			 switch ($datos["certezaOportunidad"]) {
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
	        session_start();
	        $idAgente = $_SESSION["id"];
	        $idProspecto = $datos["idProspecto"];
	        $idOportunidad = $datos["idOportunidad"];
	        $accion = "Oportunidad con identificador ".$idOportunidad." actualizada con el ".$certeza." de certeza.";
        	$idAccion = 7;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set concepto = :conceptoOportunidad, idFaseOportunidad =:faseOportunidad,monto = :montoOportunidad,cierreEstimado = :cierreEstimado,idCerteza = :certezaOportunidad,observaciones = :comentariosOportunidad where id = :idOportunidad");
	
			$stmt -> bindParam(":idOportunidad", $datos["idOportunidad"], PDO::PARAM_INT);
			$stmt -> bindParam(":conceptoOportunidad", $datos["conceptoOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":faseOportunidad", $datos["faseOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":montoOportunidad", $datos["montoOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":cierreEstimado", $datos["cierreEstimado"], PDO::PARAM_STR);
			$stmt -> bindParam(":certezaOportunidad", $datos["certezaOportunidad"], PDO::PARAM_STR);
			$stmt -> bindParam(":comentariosOportunidad", $datos["comentariosOportunidad"], PDO::PARAM_STR);
		

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlCerrarVenta($tabla,$datos){

		session_start();
	        $idAgente = $_SESSION["id"];
	        $idProspecto = $datos["idProspectoVenta"];
	        $idOportunidad = $datos["idOportunidadVenta"];

	        $accion = "Nueva Venta Realizada para ".$datos["prospectoVenta"]." apartir de la oportunidad ".$idOportunidad."";
        	$idAccion = 8;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();

        	$obtenerTotalOportunidades = Conexion::conectar()->prepare("SELECT oportunidadesCreadas FROM prospectos WHERE id = '".$idProspecto."'");

        	$obtenerTotalOportunidades -> execute();

        	$filas = $obtenerTotalOportunidades->fetchAll(PDO::FETCH_ASSOC);
			foreach ($filas as $fila) {
			     $totalOportunidades = $fila['oportunidadesCreadas']-1;
			}

			$prospecto = Conexion::conectar()->prepare("UPDATE `prospectos` SET `cliente` = '1',`oportunidadesCreadas` = '".$totalOportunidades."' WHERE `id` = '".$idProspecto."'");

			$prospecto -> execute();


			$oportunidad = Conexion::conectar()->prepare("UPDATE `oportunidades` SET `ventaCerrada` = '1' WHERE `id` = '".$idOportunidad."'");

			$oportunidad -> execute();

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`idOportunidad`,`concepto`,`cerradoDia`,`montoTotal`,`observaciones`,`noPagos`,`periodicidad`,`comisiones`,`porcentajeComision`,`estatusPagos`,`idAgente`,`idOportunidadVenta`,`estatusVenta`,`serie`,`folio`,`estatus`) values ('$idProspecto',:conceptoVenta,:fechaVenta,:montoVenta,:observacionesVenta,'1','Actual','0.00','0','Pagado','$idAgente','$idOportunidad','1',:serieVenta,:folioVenta,'Vigente')");
	
			$stmt -> bindParam(":conceptoVenta", $datos["conceptoVenta"], PDO::PARAM_STR);
			$stmt -> bindParam(":fechaVenta", $datos["fechaVenta"], PDO::PARAM_STR);
			$stmt -> bindParam(":montoVenta", $datos["montoVenta"], PDO::PARAM_STR);
			$stmt -> bindParam(":serieVenta", $datos["serieVenta"], PDO::PARAM_STR);
			$stmt -> bindParam(":folioVenta", $datos["folioVenta"], PDO::PARAM_STR);
			$stmt -> bindParam(":observacionesVenta", $datos["observacionesVenta"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarEventos($tabla, $item, $valor, $parametros){
		if ($valor == "0") {
			session_start();
			$idAgente = $_SESSION["id"];
			$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla where idAgente = $idAgente");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;
			
		}else{


		$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla WHERE $item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

		}

	}
	static public function mdlDetallesEventos($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT detalle FROM $tabla WHERE id = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	static public function mdlGenerarEventoNuevo($tabla, $datos){

	        $idProspecto = $datos["idProspectoRecordatorio"];
	        $idAgente = $datos["idAgenteRecordatorio"];

	       	$fechaInicio = strtotime(str_replace('/', '-', $datos["fechaInicialRecordatorio"])); 
	       	$fechaFin = strtotime(str_replace('/', '-', $datos["fechaFinalRecordatorio"]));

	       	$fechaInicial = date('Y-m-d H:i:s', $fechaInicio);
	       	$fechaFinal = date('Y-m-d H:i:s', $fechaFin);

	        switch ($datos["evento"]) {
	        	case 'Cita':
	        		$accion = "Nueva Cita Agendada con ".$datos["nombreProspectoRecordatorio"]." para el dia ".$datos["fechaRecordatorio"]." a las ".$datos["horaRecordatorio"]."";
	        		$idAccion = 2;
	        		break;
	        	case 'Visita':
	        		$accion = "Nueva Visita Agendada con ".$datos["nombreProspectoRecordatorio"]." para el dia ".$datos["fechaRecordatorio"]." a las ".$datos["horaRecordatorio"]."";
        			$idAccion = 3;
	        		break;
	        	case 'Llamada':
	        		$accion = "Nueva Llamada Agendada con ".$datos["nombreProspectoRecordatorio"]." para el dia ".$datos["fechaRecordatorio"]." a las ".$datos["horaRecordatorio"]."";	
	        		$idAccion = 1;
	        		break;
	        	case 'Recordatorio':
	        		$accion = "Nuevo Recordatorio Agendado para el dia ".$datos["fechaRecordatorio"]." a las ".$datos["horaRecordatorio"]."";
        			$idAccion = 4;
	        		break;
	        	case 'Demostracion':
	        		$accion = "Nueva Demostración Agendada con ".$datos["nombreProspectoRecordatorio"]." el dia ".$datos["fechaRecordatorio"]." a las ".$datos["horaRecordatorio"]."";
        			$idAccion = 5;
	        		break;
	        }
	        
        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();
      	
        	switch ($datos["evento"]) {
	        	case 'Cita':

	        		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`asunto`,`descripcion`,`fecha`,`hora`,`invitados`,`ubicacion`,`latitud`,`longitud`,`idProspecto`,`idAgente`,`finalizada`,`detalle`,`fechaInicial`,`fechaFinal`,`color`) values ('".$datos['tituloRecordatorio']."','".$datos['descripcionRecordatorio']."','".$datos['fechaRecordatorio']."','".$datos['horaRecordatorio']."','".$datos['nombreProspectoRecordatorio']."','".$datos['lugarRecordatorio']."','".$datos['latRecordatorio']."','".$datos['longRecordatorio']."','".$idProspecto."','".$idAgente."','0','','".$fechaInicial."','".$fechaFinal."','".$datos['colorRecordatorio']."')");

	        		break;
	        	case 'Visita':

	        		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`asunto`,`descripcion`,`fecha`,`hora`,`contacto`,`ubicacion`,`latitud`,`longitud`,`idProspecto`,`idAgente`,`finalizada`,`detalle`,`fechaInicial`,`fechaFinal`,`color`) values ('".$datos['tituloRecordatorio']."','".$datos['descripcionRecordatorio']."','".$datos['fechaRecordatorio']."','".$datos['horaRecordatorio']."','".$datos['nombreProspectoRecordatorio']."','".$datos['lugarRecordatorio']."','".$datos['latRecordatorio']."','".$datos['longRecordatorio']."','".$idProspecto."','".$idAgente."','0','','".$fechaInicial."','".$fechaFinal."','".$datos['colorRecordatorio']."')");
	        		break;
	        	case 'Llamada':

	        	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`titulo`,`descripcion`,`fecha`,`hora`,`idProspecto`,`idAgente`,`finalizada`,`detalle`,`fechaInicial`,`fechaFinal`,`color`) values ('".$datos['tituloRecordatorio']."','".$datos['descripcionRecordatorio']."','".$datos['fechaRecordatorio']."','".$datos['horaRecordatorio']."','".$idProspecto."','".$idAgente."','0','','".$fechaInicial."','".$fechaFinal."','".$datos['colorRecordatorio']."')");
	        		
	        		break;
	        	case 'Recordatorio':

	        		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`asunto`,`descripcion`,`fecha`,`hora`,`idProspecto`,`idAgente`,`finalizada`,`detalle`,`fechaInicial`,`fechaFinal`,`color`) values ('".$datos['tituloRecordatorio']."','".$datos['descripcionRecordatorio']."','".$datos['fechaRecordatorio']."','".$datos['horaRecordatorio']."','".$idProspecto."','".$idAgente."','0','','".$fechaInicial."','".$fechaFinal."','".$datos['colorRecordatorio']."')");
	        		break;
	        	case 'Demostracion':

	        		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`asunto`,`descripcion`,`fecha`,`hora`,`contacto`,`ubicacion`,`latitud`,`longitud`,`idProspecto`,`idAgente`,`productos`,`finalizada`,`detalle`,`fechaInicial`,`fechaFinal`,`color`) values ('".$datos['tituloRecordatorio']."','".$datos['descripcionRecordatorio']."','".$datos['fechaRecordatorio']."','".$datos['horaRecordatorio']."','".$datos['nombreProspectoRecordatorio']."','".$datos['lugarRecordatorio']."','".$datos['latRecordatorio']."','".$datos['longRecordatorio']."','".$idProspecto."','".$idAgente."','".$datos["productosRecordatorio"]."','0','','".$fechaInicial."','".$fechaFinal."','".$datos['colorRecordatorio']."')");
	        		break;
	        }
			
			

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;
			

	}
	static public function mdlMostrarSeguimientos($tabla, $item, $valor, $parametros,$datos){
		if ($valor == "0") {
			session_start();
			$idAgente = $_SESSION["id"];
			$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla as seg INNER JOIN agentesventas as agv ON seg.idAgente = agv.id INNER JOIN prospectos as pros ON seg.idProspecto = pros.id INNER JOIN accionesseguimientos as asg ON seg.idAccion = asg.id where seg.idAgente = '".$idAgente."'");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;
			
		}else{

		if ($datos["fechaInicio"] == "") {


			$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla as seg INNER JOIN agentesventas as agv ON seg.idAgente = agv.id INNER JOIN prospectos as pros ON seg.idProspecto = pros.id INNER JOIN accionesseguimientos as asg ON seg.idAccion = asg.id WHERE seg.$item = :$item");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;
			
		}else{


			$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla as seg INNER JOIN agentesventas as agv ON seg.idAgente = agv.id INNER JOIN prospectos as pros ON seg.idProspecto = pros.id INNER JOIN accionesseguimientos as asg ON seg.idAccion = asg.id WHERE seg.$item = :$item and  STR_TO_DATE(seg.fecha,'%Y-%m-%d') BETWEEN STR_TO_DATE(:fechaInicio,'%Y-%m-%d') AND STR_TO_DATE(:fechaFinal,'%Y-%m-%d')");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt -> bindParam(":fechaInicio", $datos["fechaInicio"], PDO::PARAM_STR);
			$stmt -> bindParam(":fechaFinal", $datos["fechaFinal"], PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;
		}



		}

	}
	static public function mdlMostrarVentas($tabla, $item, $valor, $parametros){
		if ($valor == "0") {
			session_start();
			$idAgente = $_SESSION["id"];
			$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla as vt INNER JOIN oportunidades as op ON vt.idOportunidadVenta = op.id where vt.idAgente = $idAgente");
		
			$stmt -> execute();

			return $stmt -> fetchAll();

			$stmt -> close();

			$stmt = null;
			
		}else{


		$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla as vt INNER JOIN oportunidades as op ON vt.idOportunidadVenta = op.id WHERE vt.$item = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

		}

	}
	static public function mdlDetalleVenta($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT vent.id,vent.concepto,vent.cerradoDia,vent.montoTotal,vent.observaciones,vent.serie,vent.folio,vent.cancelado,vent.estatus,vent.fechaCancelacion,vent.motivoCancelacion,opor.productos,opor.codigos,opor.cantidades,opor.precios,prosp.nombreCompleto,prosp.domicilio,prosp.celular,prosp.taller,vent.idOportunidad as prospectoId,vent.idAgente FROM $tabla as vent INNER JOIN oportunidades as opor ON vent.idOportunidadVenta= opor.id INNER JOIN prospectos as prosp ON vent.idOportunidad = prosp.id WHERE vent.id = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	static public function mdlCargarNuevoProspecto($tabla, $datos){
		

			if ($datos["tituloProspectoPerfil"] == '1') {
				$oportunidad = '0';
				$cliente = '0';
			}else{
				$oportunidad = '1';
				$cliente = '1';
			}
			
			$stmt = Conexion::conectar()->prepare("INSERT INTO prospectos(nombreCompleto,tituloProspecto,proveedorPinturas,productosFaltantes,mejorar,correo,telefono,celular,taller,sexo,domicilio,origenProspecto,faseProspecto,comentario,idAgente,comentarioReasignacion,latitud,longitud,estatus,reasignado,oportunidad,cliente,descartado,oportunidadesCreadas,habilitado,clasificacion,estadoProspecto) VALUES(:nombrePerfil,:tituloProspectoPerfil,'','','',:correoPerfil,:telefonoPerfil,:celularPerfil,:tallerPerfil,'M',:direccionPerfil,:origenProspectoPerfil,:faseProspectoPerfil,:comentariosPerfil,:idAgentePerfil,'',:latitudPerfil,:longitudPerfil,'1','0','".$oportunidad."','".$cliente."','0','0','1',:clasificacionProspectoPerfil,'Nuevo')");


			$stmt -> bindParam(":nombrePerfil", $datos["nombrePerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":correoPerfil", $datos["correoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":tallerPerfil", $datos["tallerPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":telefonoPerfil", $datos["telefonoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":celularPerfil", $datos["celularPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":direccionPerfil", $datos["direccionPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":latitudPerfil", $datos["latitudPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":longitudPerfil", $datos["longitudPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":tituloProspectoPerfil", $datos["tituloProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":faseProspectoPerfil", $datos["faseProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":origenProspectoPerfil", $datos["origenProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":clasificacionProspectoPerfil", $datos["clasificacionProspectoPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":comentariosPerfil", $datos["comentariosPerfil"], PDO::PARAM_STR);
			$stmt -> bindParam(":idAgentePerfil", $datos["idAgentePerfil"], PDO::PARAM_INT);

			$stmt -> execute();



			
			$agente = $_SESSION["nombre"];

			$time = time();
			$fechaActual = date("d-m-Y H:i:s", $time);

			$consulta = Conexion::conectar()->prepare("SELECT id FROM prospectos where nombreCompleto like '%".$datos["nombrePerfil"]."%'");
		
			$consulta -> execute();

			$idProspecto = $consulta->fetchColumn();

			$accion = "".$agente." agregó a ".$datos["nombrePerfil"]." como nuevo prospecto/cliente el dia ".$fechaActual."";
        	$idAccion = 16;
			$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$datos["idAgentePerfil"]."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$datos["idAgentePerfil"]."','".$idProspecto."','".$idAccion."') ");

			if ($seguimiento -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}
	static public function mdlMostrarListaProspectosClientes($tabla, $item, $valor, $parametros){

		if ($valor == 1) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM clientesviewrocio");
			
		}else{

			if ($valor != 11 && $valor != 15) {
      
		      $stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla WHERE $item in(:$item)");
		
			  $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		    }else{

		      $stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla WHERE $item in(5,6,7,8,9,11)");

		    }
			

		}



		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;


	}

	static public function mdlGenerarLlamadaDirecta($tabla, $datos){

	        $idProspecto = $datos["idProspectoLlamada"];
	        $idAgente = $datos["idAgenteLlamada"];

	       	$time = time();
			$fechaActual = date("Y-m-d H:i:s", $time);
	       	$fechaInicial = $fechaActual;
	       	$fechaFinal = $fechaActual;

	        
	        $accion = "Nueva Llamada Realizada a: ".$datos["nombreProspectoLlamada"]." el dia ".$fechaActual." ";
	        $idAccion = 1;
	        
        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();
      		
        	$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (`titulo`,`descripcion`,`fecha`,`hora`,`idProspecto`,`idAgente`,`finalizada`,`detalle`,`fechaInicial`,`fechaFinal`,`color`) values ('".$datos['tituloLlamada']."','".$datos['descripcionLlamada']."','".$datos['fechaLlamada']."','".$datos['horaLlamada']."','".$idProspecto."','".$idAgente."','0','','".$fechaInicial."','".$fechaFinal."','#FF8C00')");
			

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;
			

	}
	static public function mdlDetallesEvento($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT ev.*,pros.nombreCompleto FROM $tabla as ev inner join prospectos as pros ON ev.idProspecto = pros.id WHERE ev.id = :$item");
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;
	}
	static public function mdlActualizarEvento($tabla, $datos){

	        $idEvento = $datos["idEventoRecordatorioEdit"];
	        $idAgente = $datos["idAgenteRecordatorioEdit"];
	        $idProspecto = $datos["idProspectoRecordatorioEdit"];

	       	$fechaInicio = strtotime(str_replace('/', '-', $datos["fechaInicialRecordatorioEdit"])); 
	       	$fechaFin = strtotime(str_replace('/', '-', $datos["fechaFinalRecordatorioEdit"]));

	       	$fechaInicial = date('Y-m-d H:i:s', $fechaInicio);
	       	$fechaFinal = date('Y-m-d H:i:s', $fechaFin);

	        switch ($datos["eventoEdit"]) {
	        	case 'Cita':
	        		$accion = "Cita Actualizada de ".$datos["nombreProspectoRecordatorioEdit"]." para el dia ".$datos["fechaEdit"]." a las ".$datos["horaEdit"]."";
	        		$idAccion = 6;
	        		break;
	        	case 'Visita':
	        		$accion = "Visita Actualizada de ".$datos["nombreProspectoRecordatorioEdit"]." para el dia ".$datos["fechaEdit"]." a las ".$datos["horaEdit"]."";
        			$idAccion = 10;
	        		break;
	        	case 'Llamada':
	        		$accion = "Llamada Actualizada de ".$datos["nombreProspectoRecordatorioEdit"]." para el dia ".$datos["fechaEdit"]." a las ".$datos["horaEdit"]."";	
	        		$idAccion = 9;
	        		break;
	        	case 'Recordatorio':
	        		$accion = "Recordatorio Actualizado para el dia ".$datos["fechaEdit"]." a las ".$datos["horaEdit"]."";
        			$idAccion = 11;
	        		break;
	        	case 'Demostracion':
	        		$accion = "Demostración Actualizada de ".$datos["nombreProspectoRecordatorioEdit"]." el dia ".$datos["fechaEdit"]." a las ".$datos["horaEdit"]."";
        			$idAccion = 12;
	        		break;
	        }
	        
        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();
      	
        	switch ($datos["eventoEdit"]) {
	        	case 'Cita':

	        		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `asunto` = '".$datos['tituloRecordatorioEdit']."',`descripcion` = '".$datos['descripcionRecordatorioEdit']."',`fecha` = '".$datos['fechaEdit']."',`hora` = '".$datos['horaEdit']."',`ubicacion` = '".$datos['lugarRecordatorioEdit']."',`latitud` = '".$datos['latRecordatorioEdit']."',`longitud` = '".$datos['longRecordatorioEdit']."',`fechaInicial` = '".$fechaInicial."',`fechaFinal` = '".$fechaFinal."' WHERE id = '".$idEvento."'");

	        		break;
	        	case 'Visita':

	        		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `asunto` = '".$datos['tituloRecordatorioEdit']."',`descripcion` = '".$datos['descripcionRecordatorioEdit']."',`fecha` = '".$datos['fechaEdit']."',`hora` = '".$datos['horaEdit']."',`ubicacion` = '".$datos['lugarRecordatorioEdit']."',`latitud` = '".$datos['latRecordatorioEdit']."',`longitud` = '".$datos['longRecordatorioEdit']."',`fechaInicial` = '".$fechaInicial."',`fechaFinal` = '".$fechaFinal."' WHERE id = '".$idEvento."'");
	        		break;
	        	case 'Llamada':

	        		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `titulo` = '".$datos['tituloRecordatorioEdit']."',`descripcion` = '".$datos['descripcionRecordatorioEdit']."',`fecha` = '".$datos['fechaEdit']."',`hora` = '".$datos['horaEdit']."',`fechaInicial` = '".$fechaInicial."',`fechaFinal` = '".$fechaFinal."' WHERE id = '".$idEvento."'");
	        		
	        		break;
	        	case 'Recordatorio':

	        		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `asunto` = '".$datos['tituloRecordatorioEdit']."',`descripcion` = '".$datos['descripcionRecordatorioEdit']."',`fecha` = '".$datos['fechaEdit']."',`hora` = '".$datos['horaEdit']."',`fechaInicial` = '".$fechaInicial."',`fechaFinal` = '".$fechaFinal."' WHERE id = '".$idEvento."'");
	        		break;
	        	case 'Demostracion':

	        		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET `asunto` = '".$datos['tituloRecordatorioEdit']."',`descripcion` = '".$datos['descripcionRecordatorioEdit']."',`fecha` = '".$datos['fechaEdit']."',`hora` = '".$datos['horaEdit']."',`ubicacion` = '".$datos['lugarRecordatorioEdit']."',`latitud` = '".$datos['latRecordatorioEdit']."',`longitud` = '".$datos['longRecordatorioEdit']."',`fechaInicial` = '".$fechaInicial."',`fechaFinal` = '".$fechaFinal."',`productos` = '".$datos["productosRecordatorioEdit"]."' WHERE id = '".$idEvento."'");
	        		break;
	        }
			
			

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;
			

	}

	static public function mdlGenerarNuevaVentaDirecta($tabla, $datos){

			 switch ($datos["certezaVentaDirecta"]) {
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
	        session_start();
	        $idAgente = $_SESSION["id"];
	        $idProspecto = $datos["idProspectoVentaDirecta"];
	        $accion = "Nueva oportunidad directa creada para ".$datos["nombreVentaDirecta"]." con el ".$certeza." en certeza.";
        	$idAccion = 18;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();

        	$obtenerTotalOportunidades = Conexion::conectar()->prepare("SELECT COUNT(id) as total FROM oportunidades WHERE idProspecto = '".$idProspecto."' and ventaCerrada = 0");

        	$obtenerTotalOportunidades -> execute();

        	$filas = $obtenerTotalOportunidades->fetchAll(PDO::FETCH_ASSOC);
			foreach ($filas as $fila) {
			     $totalOportunidades = $fila['total']+1;
			}

			$prospecto = Conexion::conectar()->prepare("UPDATE `prospectos` SET `oportunidad` = '1',`oportunidadesCreadas` = '".$totalOportunidades."' WHERE `id` = '".$idProspecto."'");

			$prospecto -> execute();

			$generarOportunidad = Conexion::conectar()->prepare("INSERT INTO $tabla (`idProspecto`,`concepto`,`idFaseOportunidad`,`monto`,`comision`,`porcentajeComision`,`cierreEstimado`,`idCerteza`,`observaciones`,`idAgente`,`ventaCerrada`) values (:idProspectoVentaDirecta,:conceptoVentaDirecta,:faseVentaDirecta,:montoVentaDirecta,'0','0.00',:cierreEstimadoVentaDirecta,:certezaVentaDirecta,:comentariosVentaDirecta,'$idAgente','0')");
	
			$generarOportunidad -> bindParam(":idProspectoVentaDirecta", $datos["idProspectoVentaDirecta"], PDO::PARAM_INT);
			$generarOportunidad -> bindParam(":conceptoVentaDirecta", $datos["conceptoVentaDirecta"], PDO::PARAM_STR);
			$generarOportunidad -> bindParam(":faseVentaDirecta", $datos["faseVentaDirecta"], PDO::PARAM_STR);
			$generarOportunidad -> bindParam(":montoVentaDirecta", $datos["montoVentaDirecta"], PDO::PARAM_STR);
			$generarOportunidad -> bindParam(":cierreEstimadoVentaDirecta", $datos["cierreEstimadoVentaDirecta"], PDO::PARAM_STR);
			$generarOportunidad -> bindParam(":certezaVentaDirecta", $datos["certezaVentaDirecta"], PDO::PARAM_STR);
			$generarOportunidad -> bindParam(":comentariosVentaDirecta", $datos["comentariosVentaDirecta"], PDO::PARAM_STR);

			$generarOportunidad -> execute();

			$obtenerIdOportunidad =  Conexion::conectar()->prepare("SELECT MAX(id) as idOportunidad from oportunidades where idProspecto = '".$idProspecto."'");

        	$obtenerIdOportunidad -> execute();

        	$filas = $obtenerIdOportunidad->fetchAll(PDO::FETCH_ASSOC);
			foreach ($filas as $fila) {
			     $id = $fila['idOportunidad'];
			}

			$idOportunidad = $id;

	        $accion = "Venta Directa Realizada para ".$datos["nombreVentaDirecta"]." apartir de la oportunidad ".$idOportunidad."";
        	$idAccion = 19;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idProspecto."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idProspecto."','".$idAccion."') ");
        	$seguimiento -> execute();

        	$obtenerTotalOportunidades = Conexion::conectar()->prepare("SELECT oportunidadesCreadas FROM prospectos WHERE id = '".$idProspecto."'");

        	$obtenerTotalOportunidades -> execute();

        	$filas = $obtenerTotalOportunidades->fetchAll(PDO::FETCH_ASSOC);
			foreach ($filas as $fila) {
			     $totalOportunidades = $fila['oportunidadesCreadas']-1;
			}

			$prospecto = Conexion::conectar()->prepare("UPDATE `prospectos` SET `cliente` = '1',`oportunidadesCreadas` = '".$totalOportunidades."' WHERE `id` = '".$idProspecto."'");

			$prospecto -> execute();


			$oportunidad = Conexion::conectar()->prepare("UPDATE `oportunidades` SET `ventaCerrada` = '1' WHERE `id` = '".$idOportunidad."'");

			$oportunidad -> execute();

			$time = time();
		    $fechaVenta = date("Y-m-d", $time);

			$stmt = Conexion::conectar()->prepare("INSERT INTO ventas (`idOportunidad`,`concepto`,`cerradoDia`,`montoTotal`,`observaciones`,`noPagos`,`periodicidad`,`comisiones`,`porcentajeComision`,`estatusPagos`,`idAgente`,`idOportunidadVenta`,`estatusVenta`,`serie`,`folio`,`estatus`,`idFactura`,`clienteFactura`,`fechaFactura`) values ('$idProspecto',:conceptoVentaDirecta,'$fechaVenta',:montoVentaDirecta,:comentariosVentaDirecta,'1','Actual','0.00','0','Pagado','$idAgente','$idOportunidad','1',:serieVentaDirecta,:folioVentaDirecta,'Vigente',:idFacturaVentaDirecta,:clienteVentaDirecta,:fechaFactura)");
	
			$stmt -> bindParam(":conceptoVentaDirecta", $datos["conceptoVentaDirecta"], PDO::PARAM_STR);
			$stmt -> bindParam(":montoVentaDirecta", $datos["montoVentaDirecta"], PDO::PARAM_STR);
			$stmt -> bindParam(":serieVentaDirecta", $datos["serieVentaDirecta"], PDO::PARAM_STR);
			$stmt -> bindParam(":folioVentaDirecta", $datos["folioVentaDirecta"], PDO::PARAM_STR);
			$stmt -> bindParam(":comentariosVentaDirecta", $datos["comentariosVentaDirecta"], PDO::PARAM_STR);
			$stmt -> bindParam(":idFacturaVentaDirecta", $datos["idFacturaVentaDirecta"], PDO::PARAM_INT);
			$stmt -> bindParam(":clienteVentaDirecta", $datos["clienteVentaDirecta"], PDO::PARAM_STR);
			$stmt -> bindParam(":fechaFactura", $datos["cierreEstimadoVentaDirecta"], PDO::PARAM_STR);

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}

	static public function mdlObtenerIndicadores($tabla,$parametros,$condicion){
		
			$stmt = Conexion::conectar()->prepare("SELECT $parametros FROM $tabla $condicion");
		
			$stmt -> execute();

			return $stmt -> fetch();

			$stmt -> close();

			$stmt = null;

		
	}
	static public function mdlDescartarProspecto($tabla, $datos){

			
	        session_start();
	        $idAgente = $_SESSION["id"];
	        $nombreAgente = $_SESSION["nombre"];
	        $idDescartado = $datos["idDescartado"];
	        $motivo = $datos["motivoDescartado"];
	        $nombreDescartado = $datos["nombreDescartado"];
	        $accion = "".$nombreDescartado." ha sido descartado por ".$nombreAgente."";
        	$idAccion = 14;

        	$bitacora = Conexion::conectar()->prepare("INSERT INTO `bitacora` (`accion`,`idAgente`,`idProspecto`) values ('".$accion."','".$idAgente."','".$idDescartado."') ");

        	$bitacora -> execute();

        	$seguimiento =  Conexion::conectar()->prepare("INSERT INTO `seguimientos` (`titulo`,`idAgente`,`idProspecto`,`idAccion`) values ('".$accion."','".$idAgente."','".$idDescartado."','".$idAccion."') ");
        	$seguimiento -> execute();

        	$descartar =  Conexion::conectar()->prepare("INSERT INTO `descartados` (`razonDescartado`,`idProspecto`,`idAgente`) values ('".$motivo."','".$idDescartado."','".$idAgente."') ");
        	$descartar -> execute();

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla set descartado = 1,estatus = 0 where id = ".$idDescartado." ");

			if ($stmt -> execute()) {
				return "ok";
			}else{
				return "error";
			}

			$stmt -> close();

			$stmt = null;

	}


}

?>