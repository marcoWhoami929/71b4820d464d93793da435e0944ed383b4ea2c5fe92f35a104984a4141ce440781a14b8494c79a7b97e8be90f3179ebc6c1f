 <header class="main-header">


    <a href="#" class="logo">
      
      <span class="logo-mini"><img src="vistas/img/plantilla/icono.png" class="img-responsive" style="padding:10px; filter:contrast(200%);"></span>
  
      <span class="logo-lg"><img src="vistas/img/plantilla/logo.png" class="img-responsive" style="padding:10px 30px; filter:contrast(200%);"></span>
    
    </a>

    <nav class="navbar navbar-static-top" role="navigation">

      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        
        <i class="fas fa-bars"></i>
      </a>
      

    	<div class="navbar-custom-menu"> 
 
    		<ul class="nav navbar-nav">
			
				<?php

					include "cabezote/usuario.php";

				?>

    		</ul>

    	</div>
      <div class="col-lg-6 col-md-6 col-sm-6" id="divSearch">
          <form>
            <div class="form-group">
              <input type="search" class="form-control" name="nombreCompleto" id="nombreSearch" placeholder="Buscar prospecto o cliente"> 
              <div id="clientesSearch"></div>
            </div>
          </form>
      </div>

    </nav>

 </header>