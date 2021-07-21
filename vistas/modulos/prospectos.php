
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Prospectos
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Prospectos</li>

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
                <table id="tablaProspectos" class="table table-striped table-bordered table-condensed dt-responsive" style="width:100%">
                    <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Correo</th>                                
                        <th>Telefono</th>  
                        <th>Celular</th>
                        <th>Taller</th>
                        <th>Domicilio</th>
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

<div class="modal fade" id="modalDescartarProspecto" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header estiloModals">
        <h4 class="modal-title" id="exampleModalLabel">DESCARTAR PROSPECTO</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
        <div class="col-lg-12">
          <h4 class="modal-title" id="exampleModalLabel">Motivo por el cual se descarta</h4>
          <textarea id="motivoDescarte" cols="60" rows="8" class="form-control col-lg-12" style="margin-bottom: 20px"></textarea>
        </div>
      </div>
      <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnModal" data-dismiss="modal" >Salir</button>
        <button type="button" class="btn btn-success btnModal" id="btnDescartarProspecto">Descartar</button>
        
      </div>
    </div>
  </div>
</div>