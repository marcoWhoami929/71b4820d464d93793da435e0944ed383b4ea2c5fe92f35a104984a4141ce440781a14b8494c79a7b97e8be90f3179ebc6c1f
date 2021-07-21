<?php
require 'serverside.php';
session_start();
$opcion = $_GET["opcion"];

$idAgente = $_SESSION["id"];
if ($idAgente != 11 && $idAgente != 15) {
	$tabla = "";
	$tabla2 = "";
	$idAgente = $idAgente;
}else{
	$tabla = "Amin";
	$tabla2 = "admin";
	$idAgente = "5,6,7,8,9,11";
}
switch ($opcion) {
	case '1':

	$table_data->get('prospectosView'.$tabla,'id',array('id', 'nombreCompleto','correo','telefono','celular','taller','domicilio','estatus'),$idAgente);
	break;
	case '2':
	
	break;
	case '3':
	if ($idAgente == 1) {
		$table_data->get('clientesviewrocio','id',array('id', 'nombreCompleto','correo','telefono','celular','taller','domicilio','estatus'),$idAgente);
		
	}else{
		$table_data->get('clientesview'.$tabla2,'id',array('id', 'nombreCompleto','correo','telefono','celular','taller','domicilio','estatus'),$idAgente);

	}
	
	break;
}


?>
