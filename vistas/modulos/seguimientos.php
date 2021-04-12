
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Seguimientos
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Seguimientos</li>

    </ol>

  </section>

  <section class="content">
 
    <div class="box">

      <div class="box-header with-border">

      </div>

      <div class="box-body">

          <?php

            if ($_SESSION["nombre"] == "Ivan Herrera" || $_SESSION["nombre"] == "Jonathan Gonzalez") {

               echo '
                  <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:100px;" >
                      <div class="col-lg-3">
                        <select class="form-control" name="" id="usuario">

                          <option value="5">San Manuel</option>
                          <option value="6">Reforma</option>
                          <option value="7">Capu</option>
                          <option value="8">Santiago</option>
                          <option value="9">Las Torres</option>
                          <option value="11">Ivan Herrera</option>
                          <option value="1">Rocio Martínez</option>
                          <option value="2">Orlando Briones</option>
                          <option value="12">Jesus Garcia</option>
                          <option value="13">Mario Hernandez</option>
                          <option value="16">Luis Texis</option>
                      </select>
                      </div>
                      
                      <div class="col-lg-3">
                        <input type="date" id="fechaIni" name="fechaIni" class="form-control" placeholder="Fecha" value="" required>

                        <input type="date" id="fechaFin" name="fechaFin" class="form-control" placeholder="Fecha" value="" required>

                      '?>
                        <?php


                      echo'</div>

                      <div class="col-lg-2" >
                        <input type="button" class="btn btn-info btnBuscarSeguimientos" value="BUSCAR">
                         <input type="button" class="btn btn-warning btnLimpiarFiltros" value="Limpiar">
                      </div>
                     
                      <div class="enlaceReportes" id="enlaceReportes">
                         <a href="">

                        <button class="report btn btn-info" ><i class="fas fa-file-excel" aria-hidden="true"></i> Descargar</button>

                      </a>
                      </div></div>';
                     
                  
      

            }else{

            }

          ?>

        <div class="container col-lg-12 col-md-12 col-sm-12" style="margin-top: 20px">
           <div class="row">
               <div class="col-lg-12">
                <table id="tablaSeguimientos" class="table table-striped table-bordered table-condensed dt-responsive" style="width:100%">
                    <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Prospecto</th>
                        <th>Fecha</th>
                        <th>Seguimiento</th>
                        <th>Accion</th>
                        <th>Agente</th>
                                                         
                    </tr>
                    </thead>
                </table>   
               </div>
           </div> 
        </div>
      </div>
    </div>

 </section>


</div>
<script type="text/javascript">
  
$(document).ready(function(){

  var usuario = localStorage.usuario;
  var fechaIni = localStorage.fechaIni;
  var fechaFin = localStorage.fechaFin;

  if (usuario === undefined && fechaIni === undefined && fechaFin === undefined) {

      var usuario = $("#usuario").val();
      var fechaInicial = $("#fechaIni").val();
      var fechaFinal = $("#fechaFin").val();

      document.getElementById("enlaceReportes").style.display = 'none';

  }else{

      $("#usuario option[value='"+usuario+"']").attr("selected", true);
      var fechaInicial = $("#fechaIni").val(fechaIni);
      var fechaFinal = $("#fechaFin").val(fechaFin);
      document.getElementById("enlaceReportes").style.display = '';
      $('.enlaceReportes a').prop('href','vistas/modulos/reportes.php?reporteSeguimientos=seguimientos&fechaInicio='+fechaIni+'&fechaFinal='+fechaFin+'&usuario='+usuario);
  }


  $(".btnBuscarSeguimientos").on('click',function(){

    var usuario = $("#usuario").val();
    var fechaIni = $("#fechaIni").val();
    var fechaFin = $("#fechaFin").val();

    if (fechaIni == "" && fechaFin == "") {
      alert("Debes llenar todos los campos");
    }else{
        localStorage.setItem("fechaIni", fechaIni);
        localStorage.setItem("fechaFin", fechaFin);
        localStorage.setItem("usuario", usuario);
        $('.enlaceReportes a').prop('href','vistas/modulos/reportes.php?reporteSeguimientos=seguimientos&fechaInicio='+fechaIni+'&fechaFinal='+fechaFin+'&usuario='+usuario);

        location.reload();

    }
  });

   $(".btnLimpiarFiltros").on('click',function(){

    $("#usuario option[value='5']").attr("selected", true);
    $("#fechaIni").val("");
    $("#fechaFin").val("");

    localStorage.removeItem("fechaIni");
    localStorage.removeItem("fechaFin");
    localStorage.removeItem("usuario");

    document.getElementById("enlaceReportes").style.display = 'none';

    });
  });
</script>

  