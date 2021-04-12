<script type="text/javascript">
  if (localStorage.idProspecto === undefined) {

    window.location.href = "tableroAcciones";
  }else{

  }
</script>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Lista De Oportunidades
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Convertir a Venta</li>

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
                <table id="tablaListaOportunidades" class="table table-striped table-bordered table-condensed dt-responsive" style="width:100%">
                    <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Cliente</th>
                        <th>Concepto</th>
                        <th>Fecha</th>                                
                        <th>Monto</th>
                        <th>Cierre Estimado</th>
                        <th>Certeza</th>  
                        <th>Fase</th> 
                        <th>Acciones</th>
                
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
<!--MODAL EDITAR OPORTUNIDAD DE VENTA -->
<div class="modal fade" id="modalActualizarOportunidad" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header estiloModals">
        <h4 class="modal-title" id="exampleModalLabel">EDITAR OPORTUNIDAD</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="container col-md-12 col-sm-12 col-lg-12">
           <div class="row">
        
               <form>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Concepto: </span> 
                  <input type="text" class="form-control" id="conceptoOportunidadEdit" value="">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Fase Oportunidad: </span>
                    <select class="form-control" id="faseOportunidadEdit">
                      <option value="1">Cotizado</option>
                      <option value="2">Esperando Aprobación</option>
                      <option value="3">Pospuesta</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Monto: </span><input type="text" class="form-control" id="montoOportunidadEdit" placeholder="$">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Cierre Estimado: </span>
                  <input type="date" class="form-control" id="cierreEstimadoEdit">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Certeza: </span>
                  <select id="certezaOportunidadEdit" class="form-control">
                    <option value="1">10%</option>
                    <option value="2">20%</option>
                    <option value="3">30%</option>
                    <option value="4">40%</option>
                    <option value="5">50%</option>
                    <option value="6">60%</option>
                    <option value="7">70%</option>
                    <option value="8">80%</option>
                    <option value="9">90%</option>
                    <option value="10">100%</option>
                   

                  </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <span>Comentario: </span>
                   <textarea class="form-control" id="comentariosOportunidadEdit" rows="10" cols="50"></textarea>
                </div>

              </form>
           </div> 
        </div>
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnModal" data-dismiss="modal" id="btnSalirActualizarOportunidad">Salir</button>
        <button type="button" class="btn btn-info btnModal" id="btnActualizarOportunidad">Actualizar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL EDITAR OPORTUNIDAD DE VENTA -->
<!--MODAL CERRAR VENTA -->
<div class="modal fade" id="modalCerrarVenta" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header estiloModals">
        <h4 class="modal-title" id="exampleModalLabel">CERRAR VENTA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="container col-md-12 col-sm-12 col-lg-12">
           <div class="row">
        
               <form>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Concepto: </span> 
                  <input type="text" class="form-control" id="conceptoVenta" value="">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Cerrado el: </span>
                  <input type="date" class="form-control" id="fechaVenta">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Monto: </span>
                   <input type="text" class="form-control" id="montoVenta" placeholder="$">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Serie Factura: </span>
                   <select class="form-control" name="serieVenta" id="serieVenta">
                    <option value="">Elegir</option>
                    <option value="FACD">FACD</option>
                    <option value="FAND">FAND</option>
                    <option value="FAPB">FAPB</option>
                    <option value="FASM">FASM</option>
                    <option value="FACP">FACP</option>
                    <option value="FASG">FASG</option>
                    <option value="FARF">FARF</option>
                    <option value="FATR">FATR</option>
                </select>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Folio Factura: </span>
                  <input type="text" class="form-control" id="folioVenta">
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <span>Observaciones: </span>
                   <textarea class="form-control" id="observacionesVenta" rows="10" cols="50"></textarea>
                </div>

              </form>
           </div> 
        </div>
     
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnModal" data-dismiss="modal" id="btnSalirVenta">Salir</button>
        <button type="button" class="btn btn-info btnModal" id="btnFinalizarVenta">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!--MODAL CERRAR VENTA -->

  