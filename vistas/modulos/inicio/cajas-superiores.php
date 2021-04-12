<?php

require_once "controladores/funciones.controlador.php";
require_once "modelos/funciones.modelo.php";
$tabla = "prospectos";

$parametros = "COUNT(id) as total";
$idAgente = $_SESSION["id"];
if ($_SESSION["id"] == 11 || $_SESSION["id"] == 4) {
  $condicion = "WHERE oportunidad = 0 and cliente = 0 and estatus = 1";
}else{
  $condicion = "WHERE oportunidad = 0 and cliente = 0 and estatus = 1 and idAgente = ".$idAgente."";
}

$prospectos = ControladorFunciones::ctrObtenerIndicadores($tabla,$parametros,$condicion);
$prospectos = $prospectos["total"];

if ($_SESSION["id"] == 11 || $_SESSION["id"] == 4) {
  $condicion = "WHERE oportunidad = 1 and cliente = 0 and estatus = 1";
}else{
  $condicion = "WHERE oportunidad = 1 and cliente = 0 and estatus = 1 and idAgente = ".$idAgente."";
}

$oportunidades = ControladorFunciones::ctrObtenerIndicadores($tabla,$parametros,$condicion);
$oportunidades = $oportunidades["total"];


if ($_SESSION["id"] == 11 || $_SESSION["id"] == 4) {
  $condicion = "WHERE oportunidad = 1 and cliente = 1 and estatus = 1";
}else{
  $condicion = "WHERE oportunidad = 1 and cliente = 1 and estatus = 1 and idAgente = ".$idAgente."";
}

$clientes = ControladorFunciones::ctrObtenerIndicadores($tabla,$parametros,$condicion);
$clientes = $clientes["total"];

$tabla = "eventosview";
if ($_SESSION["id"] == 11 || $_SESSION["id"] == 4) {
  $condicion = "";
}else{
  $condicion = "WHERE idAgente = ".$idAgente."";
}

$eventos = ControladorFunciones::ctrObtenerIndicadores($tabla,$parametros,$condicion);
$eventos = $eventos["total"];


$fechaActual = date("Y-m-d"); 
if ($_SESSION["id"] == 11 || $_SESSION["id"] == 4) {
  $condicion = "WHERE STR_TO_DATE(fechaInicial,'%Y-%m-%d') >= STR_TO_DATE('".$fechaActual."','%Y-%m-%d')";
}else{
  $condicion = "WHERE STR_TO_DATE(fechaInicial,'%Y-%m-%d') >= STR_TO_DATE('".$fechaActual."','%Y-%m-%d') and idAgente = ".$idAgente."";
}

$pendientes = ControladorFunciones::ctrObtenerIndicadores($tabla,$parametros,$condicion);
$pendientes = $pendientes["total"];

$tabla = "ventas";
if ($_SESSION["id"] == 11 || $_SESSION["id"] == 4) {
  $condicion = "";
}else{
  $condicion = "WHERE  idAgente = ".$idAgente."";
}

$ventas = ControladorFunciones::ctrObtenerIndicadores($tabla,$parametros,$condicion);
$ventas = $ventas["total"];
?>

<!--=====================================
CAJAS SUPERIORES
======================================-->

<div class="col-lg-3 col-xs-6" style="margin-top:50px">

  <div class="small-box bg-aqua">
    
    <div class="inner">
      
      <h3><?php echo $prospectos  ?></h3>

      <strong><p>Prospectos</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-users"></i>
    
    </div>
    
    <a href="prospectos" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>


<!--===========================================================================-->

<div class="col-lg-3 col-xs-6" style="margin-top:50px">

  <div class="small-box bg-green">
    
    <div class="inner">
      
      <h3><?php echo $oportunidades  ?></h3>

      <strong><p>Oportunidades</p></strong>
    
    </div>

    <div class="icon">
    
       <i class="fas fa-hand-holding-usd"></i>
    
    </div>
    
    <a href="convertirOportunidad" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>

<!--===========================================================================-->

<div class="col-lg-3 col-xs-6" style="margin-top:50px">

  <div class="small-box bg-yellow">
    
    <div class="inner">
      
      <h3><?php echo $clientes ?></h3>

      <strong><p>Clientes</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-bookmark" aria-hidden="true"></i>
    
    </div>
    
    <a href="clientes" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>

<!--===========================================================================-->

<div class="col-lg-3 col-xs-6" style="margin-top:50px">

  <div class="small-box bg-lila">
    
    <div class="inner">
      
      <h3><?php echo $eventos ?></h3>

      <strong><p>Calendario</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fa fa-calendar" aria-hidden="true"></i>
    
    </div>
    
    <a href="calendario" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>

<!--===========================================================================-->

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-blue">
    
    <div class="inner">
      
      <h3><?php echo $pendientes ?></h3>

      <strong><p>Pendientes</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fas fa-thumbtack"></i>
    
    </div>
    
    <a href="calendario" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>
<!--===========================================================================-->

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-orange">
    
    <div class="inner">
      
      <h3 style="color: transparent;">0</h3>

      <strong><p>Seguimientos</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fas fa-flag-checkered"></i>
    
    </div>
    
    <a href="seguimientos" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>

<!--===========================================================================-->

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-red">
    
    <div class="inner">
      
      <h3><?php echo $ventas ?></h3>

      <strong><p>Ventas</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fas fa-wallet"></i>
    
    </div>
    
    <a href="ventas" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>

<!--===========================================================================-->

<div class="col-lg-3 col-xs-6">

  <div class="small-box bg-purple">
    
    <div class="inner">
      
      <h3 style="color: transparent;">0</h3>

      <strong><p>Nuevo</p></strong>
    
    </div>

    <div class="icon">
    
      <i class="fas fa-plus"></i>
    
    </div>
    
    <a href="nuevo" class="small-box-footer">Más Info <i class="fa fa-arrow-circle-right"></i></a>
  
  </div>


</div>