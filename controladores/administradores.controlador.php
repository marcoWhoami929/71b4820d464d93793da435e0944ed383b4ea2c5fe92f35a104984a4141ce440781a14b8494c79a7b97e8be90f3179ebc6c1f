<?php

class ControladorAdministradores{

	public function ctrIngresoAdministrador(){
		require_once "modelos/encriptador.php";
		if(isset($_POST["ingEmail"])){

			if(preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["ingEmail"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["ingPassword"])){
			   
			   $encriptado = $encriptar($_POST["ingPassword"]);
						
				$tabla = "agentesventas";
				$item = "correo";
				$valor = $_POST["ingEmail"];

				$respuesta = ModeloAdministradores::mdlMostrarAdministradores($tabla, $item, $valor);

				if($respuesta["correo"] == $_POST["ingEmail"] && $respuesta["password"] == $encriptado){

					$_SESSION["validarSesionBackend"] = "ok";
					$_SESSION["id"] = $respuesta["id"];
					$_SESSION["nombre"] = $respuesta["nombre"];
					$_SESSION["correo"] = $respuesta["correo"];
					$_SESSION["area"] = $respuesta["area"];

					echo '<script>

						window.location = "inicio";

					</script>';

				}else{

					echo '<script>

					swal({

						type: "error",
						title: "¡La contraseña es incorrecta!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "login";

						}

					});
				

				</script>';	


				}


			}

		}

	}

}