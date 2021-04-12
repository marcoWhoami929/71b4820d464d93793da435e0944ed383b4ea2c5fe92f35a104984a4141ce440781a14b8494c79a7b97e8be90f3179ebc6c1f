
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Lista De Visitas
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Visitas</li>

    </ol>

  </section>

  <section class="content">
 
    <div class="box">

      <div class="box-header with-border">


      </div>

      <div class="box-body">

        <div class="container col-lg-12">
           <div class="row">
               <div class="col-lg-12">
                <table id="tablaVisitas" class="table table-striped table-bordered table-condensed dt-responsive" style="width:100%">
                    <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Asunto</th>
                        <th>Contacto</th>                                
                        <th>Descripcion</th>  
                        <th>Fecha</th>
                        <th>FechaCreacion</th>
                        <th>Detalle</th>
                        <th>Estatus</th>
                
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
<!--MODAL DETALLE VISITA -->
<div class="modal fade" id="modalDetalleVisita" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header estiloModals">
        <h4 class="modal-title" id="exampleModalLabel">Detalle Visita</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <span id="detalle-visita"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnModal" data-dismiss="modal">Salir</button>
  
      </div>
    </div>
  </div>
</div>
<!--MODAL DETALLE VISITAS -->
