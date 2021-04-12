	<?php

	class ControladorReporteador
	{	

		 public function ctrDescargarReporteSeguimientos(){

		 	if(isset($_GET["reporteSeguimientos"])){
		 		session_start();

		 		$tabla = $_GET["reporteSeguimientos"];

		 		if (isset($_GET["fechaInicio"])) {

		 			$valor1 = $_GET["fechaInicio"];
		 			$fechaInicio = $valor1;


		 		}else{
		 			$hoy = date("Y-m-d");

		 			$fecha = str_replace('-', '/', $hoy);
		 			$fechaInicio = date('d/m/Y', strtotime($fecha."- 15 days"));

		 			$valor1 = $hoy;

		 		}

		 		if (isset($_GET["fechaFinal"])) {

		 			$valor2 = $_GET["fechaFinal"];
		 			$fechaFinal = $valor2;


		 		}else{
		 			$hoy = date("Y-m-d");

		 			$fecha = str_replace('-', '/', $hoy);
		 			$fechaFinal = date('d/m/Y', strtotime($fecha));
		 			$valor2 = $hoy;

		 		}

		 		$arreglo =  array('idAgente' => $_GET["usuario"], 
		 						  'fechaInicio' => $valor1,
		 						  'fechaFinal' => $valor2);
		 		$datos = "&nbsp; DEL &nbsp; DIA &nbsp;<br>".$fechaInicio." AL ".$fechaFinal;


		 		$reporteSeguimientos = ModeloReporteador::mdlDescargarReporteSeguimientos($tabla,$arreglo);
				/*=============================================
				CREAMOS EL ARCHIVO DE EXCEL
				=============================================*/
				$nombreArchivo = "REPORTE ".strtoupper($tabla);
				$nombre = $nombreArchivo.'.xls';

				header('Expires: 0');
				header('Cache-control: private');
				header('Content-type: application/vnd.ms-excel');// Archivo de Excel
				header("Cache-Control: cache, must-revalidate"); 
				header('Content-Description: File Transfer');
				header('Last-Modified: '.date('D, d M Y H:i:s'));
				header("Pragma: public"); 
				header('Content-Disposition:; filename="'.$nombre.'"');
				header("Content-Transfer-Encoding: binary");

				/*=============================================
				REPORTE LISTA DE FACTURAS
				=============================================*/

				if($_GET["reporteSeguimientos"] == "seguimientos"){

					$campos = ['Id','Titulo','Fecha','Agente','Prospecto','Accion'];

					echo utf8_decode("<table>");
					echo "<tr>
					<th colspan='6' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='6' style='font-weight:bold; background:#17202A; color:white;'>&nbsp; R E P O R T E &nbsp; ".strtoupper($tabla)."  &nbsp;&nbsp</th>
					</tr>

					<tr>
					<th colspan='6' style='font-weight:bold; background:#17202A; color:white;'>".$datos."</th>
					</tr>";
					echo utf8_decode("<tr>");
					for ($i=0; $i < count($campos); $i++) { 
						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
						
					}
					echo utf8_decode("</tr>");
					echo utf8_decode("<tr>");

					foreach ($campos as $key => $value) {

						echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>".$value."</td>");

					}
					echo utf8_decode("</tr>");

					foreach ($reporteSeguimientos as $key => $value) {
						
							echo utf8_decode("<tr>
										<td style='color:black;'>".$value["id"]."</td>
										<td style='color:black;'>".$value["titulo"]."</td>
										<td style='color:black;'>".$value["fecha"]."</td>
										<td style='color:black;'>".$value["agente"]."</td>
										<td style='color:black;'>".$value["prospecto"]."</td>
										<td style='color:black;'>".$value["accion"]."</td>
										
							
										</tr>");

									




					}


					echo "</table>";

				}
				/****FIN DE TABLA***/

			}

		}


	}

	?>