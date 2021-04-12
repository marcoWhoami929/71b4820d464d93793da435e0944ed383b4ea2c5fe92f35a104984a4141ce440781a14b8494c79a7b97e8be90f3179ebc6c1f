<!--=====================================
PÁGINA DE INICIO
======================================-->

<!-- content-wrapper -->
<div class="content-wrapper">

  <!-- content-header -->
  <section class="content-header">
    
    <h1>
    Tablero
    <small>Panel de Control</small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Tablero</li>

    </ol>

  </section>
  <!-- content-header -->

  <!-- content -->
  <section class="content">
 
    <!-- row -->
    <div class="row">

       <?php

        include "inicio/cajas-superiores.php";
      
      ?>

    </div>
    <!-- row -->

    <!-- row -->
    <div class="row">
      <div class="col-lg-12">
        
         <?php
       
          include "inicio/grafico-ventas-canales.php";   

        ?>

      </div>
    

    </div>


 </section>


</div>

  