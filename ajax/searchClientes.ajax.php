<?php
  session_start();
	include_once "../modelos/conexion.php";

	if (isset($_POST['nombre'])) {

  		$output = "";
  		$nombre = $_POST['nombre'];
      $agente = $_SESSION["id"];

      if ($agente == 11) {
        $query = "SELECT id,nombreCompleto FROM prospectos WHERE nombreCompleto LIKE '%$nombre%' and descartado = 0 and estatus = 1 and habilitado = 1";
      }else if($agente == 1){

        $query = "SELECT id,nombreCompleto FROM prospectos WHERE nombreCompleto LIKE '%$nombre%' and idAgente in(1,2) and descartado = 0 and estatus = 1 and habilitado = 1 and clasificacion = 4";
      }
      else{
        $query = "SELECT id,nombreCompleto FROM prospectos WHERE nombreCompleto LIKE '%$nombre%' and idAgente = '$agente' and descartado = 0 and estatus = 1 and habilitado = 1";
      }
  		
  		$result = Conexion::conectar()->query($query);

  		$output = '<ul class="list-unstyled">';		

  		if ($result->rowCount() > 0) {
       
        $row = $result->fetchAll();
        foreach ($row as $key => $value) {
            $output .= '<li value="'.$value["id"].'">'.ucwords($value["nombreCompleto"]).'</li>';
        }
  			
  		}else{
  			  $output .= '<li> Cliente no encontrado</li>';
  		}
  		
	  	$output .= '</ul>';
	  	echo $output;
	}

?>