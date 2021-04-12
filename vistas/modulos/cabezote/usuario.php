<!--=====================================
USUARIOS
======================================-->	

<li class="dropdown user user-menu">


	<a href="#" class="dropdown-toggle" data-toggle="dropdown">
	
		<?php

		if(isset($_SESSION["foto"]) == ""){

			echo '<img src="vistas/img/usuarios/user.png" class="user-image" alt="User Image">';

		}else{

			echo '<img src="'.isset($_SESSION["foto"]).'" class="user-image" alt="User Image">';

		}


		?>	
		
		<span class="hidden-xs"><?php echo $_SESSION["nombre"] ?></span>
	
	</a>

	<ul class="dropdown-menu">

		<li class="user-header">
		
			<?php

			if(isset($_SESSION["foto"]) == ""){

				echo '<img src="vistas/img/usuarios/user.png" class="user-image" alt="User Image">';

			}else{

				echo '<img src="'.isset($_SESSION["foto"]).'" class="user-image" alt="User Image">';

			}


			?>	

			<p>
			<?php echo $_SESSION["nombre"]; ?>
			<h4 style="color:white"><?php echo $_SESSION["area"]; ?></h4>
			</p>
		
		</li>

		<li class="user-footer">

			
			<div class="pull-right">
			
				<a href="salir" class="btn btn-warning btn-flat">Salir</a>
			
			</div>
		</li>

	</ul>


</li>
