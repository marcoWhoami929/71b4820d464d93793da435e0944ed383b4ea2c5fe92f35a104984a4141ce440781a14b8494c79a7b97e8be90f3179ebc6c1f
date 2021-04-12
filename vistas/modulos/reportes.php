<?php


require_once "../../controladores/reportes.controlador.php";
require_once "../../modelos/reportes.modelo.php";
require_once "../../controladores/funciones.controlador.php";
require_once "../../modelos/funciones.modelo.php";



$reporteSeguimientos = new ControladorReporteador();
$reporteSeguimientos -> ctrDescargarReporteSeguimientos();

