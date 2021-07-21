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
               	<div class="col-sm-2 col-md-2 col-lg-2">
                  <span>Identificador Factura: </span> 
               
                  <input type="text" class="form-control" id="idFactura" value="" disabled>
              
                </div>
               	<div class="col-sm-2 col-md-2 col-lg-2">
                  <span>Serie Factura: </span> 
               
                  <input type="text" class="form-control" id="serieFactura" value="" disabled>
              
                </div>
               	<div class="col-sm-2 col-md-2 col-lg-2">
                  <span>Folio Factura: </span> 
               
                  <input type="text" class="form-control" id="folioFactura" value="" disabled> 
              
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Cliente Factura: </span> 
               
                  <input type="text" class="form-control" id="clienteFactura" value="" disabled>
              
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Concepto: </span> 
                  <input type="text" class="form-control" id="conceptoOportunidad" value="">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Fase Oportunidad: </span>
                    <select class="form-control" id="faseOportunidad" disabled>
                      <option value="1">Cotizado</option>
                      <option value="2">Esperando Aprobación</option>
                      <option value="3">Pospuesta</option>
                      <option value="4">Venta Directa</option>
                    </select>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Monto: </span><input type="text" class="form-control" id="montoOportunidad" placeholder="$" disabled>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Cierre Estimado: </span>
                  <input type="date" class="form-control" id="cierreEstimado">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Certeza: </span>
                  <select id="certezaOportunidad" class="form-control" disabled>
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
                   <textarea class="form-control" id="comentariosOportunidad" rows="10" cols="50"></textarea>
                </div>
      
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <br>
                   <button type="button" class="btn btn-success btnGenerarVentaDirecta">Generar<i class="fas fa-pen-alt fa-1x" style="color:white"></i></button>
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
    $("#faseOportunidad option[value='4']").attr("selected", true);
    $("#certezaOportunidad option[value='10']").attr("selected", true);
  });


  function getDataUrl(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
  }

  var idFactura = getDataUrl('idFactura');
  var fechaFactura = getDataUrl('fecha');
  var serie = getDataUrl('serie');
  var folio = getDataUrl('folio');
  var total = getDataUrl('total');
  var observaciones = getDataUrl('observaciones');
  var cliente = getDataUrl('cliente');

  $("#conceptoOportunidad").val("Venta Directa");
  $("#montoOportunidad").val(total);
  $("#idFactura").val(idFactura);
  $("#serieFactura").val(serie);
  $("#folioFactura").val(folio);
  $("#clienteFactura").val(cliente);
  $("#comentariosOportunidad").val(observaciones);
  var fecha = new Date(fechaFactura);
  var mes = fecha.getMonth()+1;
  var dia = fecha.getDate()+1; 
  var anio = fecha.getFullYear();
  if(dia<10)
    dia='0'+dia;
  if(mes<10)
    mes='0'+mes;

  document.getElementById("cierreEstimado").value = anio+"-"+mes+"-"+dia;
  /***CREAR NUEVA VENTA DIRECTA***/
	$(".btnGenerarVentaDirecta").on('click', function() {
		var idProspecto = localStorage.getItem("idProspecto");
		var nombreOportunidad = localStorage.getItem("nombreProspecto");
	    var conceptoOportunidad = $("#conceptoOportunidad").val();
	    var faseOportunidad = $("#faseOportunidad").val();
	    var montoOportunidad = $("#montoOportunidad").val();
	    var cierreEstimado = $("#cierreEstimado").val();
	    var certezaOportunidad = $("#certezaOportunidad").val();
	    var comentariosOportunidad = $("#comentariosOportunidad").val();

	    var idFactura = $("#idFactura").val();
		var serie = $("#serieFactura").val();
		var folio = $("#folioFactura").val();
		var cliente = $("#clienteFactura").val();

    	var datos = new FormData();
    	datos.append('idProspectoVentaDirecta',idProspecto);
    	datos.append('nombreVentaDirecta',nombreOportunidad);
    	datos.append('conceptoVentaDirecta',conceptoOportunidad);
    	datos.append('faseVentaDirecta',faseOportunidad);
    	datos.append('montoVentaDirecta',montoOportunidad);
    	datos.append('cierreEstimadoVentaDirecta',cierreEstimado);
    	datos.append('certezaVentaDirecta',certezaOportunidad);
    	datos.append('comentariosVentaDirecta',comentariosOportunidad);
    	datos.append('idFacturaVentaDirecta',idFactura);
    	datos.append('serieVentaDirecta',serie);
    	datos.append('folioVentaDirecta',folio);
    	datos.append('clienteVentaDirecta',cliente);

    	$.ajax({
            url: "ajax/funciones.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
              
                var respuesta = response;
	            var responseFinal = respuesta.replace(/['"]+/g, '');
	            if (responseFinal == "ok") {

	            	swal({

						type: "success",
						title: "Venta Directa Creada!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "tableroAcciones";

						}

					});

            	}
  
            }
          });

	});	
  
</script>


  

