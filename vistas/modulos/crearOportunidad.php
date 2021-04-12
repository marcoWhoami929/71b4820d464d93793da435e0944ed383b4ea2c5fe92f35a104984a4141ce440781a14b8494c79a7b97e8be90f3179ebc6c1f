<script type="text/javascript">
  if (localStorage.idProspecto === undefined) {

    window.location.href = "tableroAcciones";
  }else{

  }
</script>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Crear Oportunidad
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Crear Oportunidad</li>

    </ol>

  </section>

  <section class="content">
 
    <div class="box">

      <div class="box-header with-border">
     
      </div>

      <div class="box-body">
      
        <div class="container col-md-12 col-sm-12 col-lg-12" style="margin-top:70px">
           <div class="row">
        
               <form>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Concepto: </span> 
                  <input type="text" class="form-control" id="conceptoOportunidad" value="">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Fase Oportunidad: </span>
                    <select class="form-control" id="faseOportunidad">
                      <option value="1">Cotizado</option>
                      <option value="2">Esperando Aprobación</option>
                      <option value="3">Pospuesta</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Monto: </span><input  type="number" min="0.00" max="10000.00" step="0.01" class="form-control" id="montoOportunidad" placeholder="$">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Cierre Estimado: </span>
                  <input type="date" class="form-control" id="cierreEstimado">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Certeza: </span>
                  <select id="certezaOportunidad" class="form-control">
                  
                    <option value="7">70%</option>
                    <option value="8">80%</option>
                    <option value="9">90%</option>
                    <option value="10">100%</option>
                   

                  </select>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <span>Comentario: </span>
                   <textarea class="form-control" id="comentariosOportunidad" rows="10" cols="50"></textarea>
                </div>
      
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <br>
                   <button type="button" class="btn btn-success btnGenerarOportunidad">Generar<i class="fas fa-pen-alt fa-1x" style="color:white"></i></button>
                </div>
              </form>
           </div> 
        </div>
      </div>
    </div>

 </section>
</div>
<script type="text/javascript">
  $(document).ready(function($) {
    $("#faseOportunidad option[value='1']").attr("selected", true);
    $("#certezaOportunidad option[value='10']").attr("selected", true);


  });

  function getDataUrl(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }
  
  var folio = getDataUrl('folio');
  var letras="abcdefghyjklmnñopqrstuvwxyz";
  function contieneLetras(texto){
   texto = texto.toLowerCase();
   for(i=0; i<texto.length; i++){
      if (letras.indexOf(texto.charAt(i),0)!=-1){
         return 1;
      }
   }
   return 0;
}


  if(contieneLetras(folio) == 1){
      $("#conceptoOportunidad").val(folio);
  }else{
      $("#conceptoOportunidad").val("COMA"+" "+folio);
  }

  var monto = getDataUrl('monto');
  $("#montoOportunidad").val(monto);
  var observaciones = getDataUrl('observaciones');
  $("#comentariosOportunidad").val(observaciones);
  var fecha = getDataUrl('fecha');
  var fecha = new Date(fecha);
  var mes = fecha.getMonth()+1;
  var dia = fecha.getDate()+1; 
  var anio = fecha.getFullYear();
  if(dia<10)
    dia='0'+dia;
  if(mes<10)
    mes='0'+mes;
  
  document.getElementById("cierreEstimado").value = anio+"-"+mes+"-"+dia;

  
</script>


  