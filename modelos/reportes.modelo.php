<?php
require_once "conexion.php";
/**
 * 
 */
class ModeloReporteador
{

	static public function mdlDescargarReporteSeguimientos($tabla,$arreglo){


			$stmt = Conexion::conectar()->prepare("SELECT seg.id,seg.titulo,seg.fecha,agv.nombre as agente,pros.nombreCompleto as prospecto,acs.accion FROM $tabla as seg INNER JOIN agentesventas as agv ON seg.idAgente = agv.id INNER JOIN prospectos as pros ON seg.idProspecto = pros.id INNER JOIN accionesseguimientos as acs ON seg.idAccion = acs.id where seg.idAgente = :idAgente and  STR_TO_DATE(seg.fecha,'%Y-%m-%d') BETWEEN STR_TO_DATE(:fechaInicio,'%Y-%m-%d') AND STR_TO_DATE(:fechaFinal,'%Y-%m-%d') ORDER BY seg.id DESC");


			$stmt -> bindParam(":idAgente",  $arreglo["idAgente"], PDO::PARAM_INT);
			$stmt -> bindParam(":fechaInicio", $arreglo["fechaInicio"], PDO::PARAM_STR);
			$stmt -> bindParam(":fechaFinal", $arreglo["fechaFinal"], PDO::PARAM_STR);
			
			$stmt -> execute();

			return $stmt->fetchAll();

			$stmt -> close();

			$stmt = null;

	}

}
?>