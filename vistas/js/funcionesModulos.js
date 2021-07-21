$(document).ready(function(){

	/****FUNCTION BTNVIEWCLIENT***/
	$("#tablaProspectos").on("click",".btnViewClient",function(){
		var id = $(this).attr("id");
		var nombre = $(this).attr("nombre");

		localStorage.setItem("idProspecto",id);
		localStorage.setItem("nombreProspecto",nombre);
		$('#nombreSearch').val(nombre);

		window.location.href = "tableroAcciones";
	});
	$("#tablaProspectos").on("click",".btnDescartarCliente",function(){
		var id = $(this).attr("id");
		var nombreDescartado = $(this).attr("nombre");
		

		localStorage.setItem("idDescartado",id);
		localStorage.setItem("nombreDescartado",nombreDescartado);
		
	});
	$("#btnDescartarProspecto").on("click",function(){

		var idDescartado = localStorage.getItem("idDescartado");
		var nombreDescartado = localStorage.getItem("nombreDescartado");
		var motivoDescartado = $("#motivoDescarte").val();

	    
    	var datos = new FormData();
    	datos.append('idDescartado',idDescartado);
    	datos.append('nombreDescartado',nombreDescartado);
    	datos.append('motivoDescartado',motivoDescartado);
   
    	
    	
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
						title: "Prospecto descartado exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
							localStorage.removeItem("idDescartado");
							localStorage.removeItem("nombreDescartado");
							window.location = "prospectos";

						}

					});

            	}
  
            }
          });
          

	});
	$("#tablaClientes").on("click",".btnViewClient",function(){
		var id = $(this).attr("id");
		var nombre = $(this).attr("nombre");

		localStorage.setItem("idProspecto",id);
		localStorage.setItem("nombreProspecto",nombre);
		$('#nombreSearch').val(nombre);

		window.location.href = "tableroAcciones";
	});
	$("#tablaListaLlamadas").on("click",".btnViewClient",function(){
		var id = $(this).attr("id");
		var nombre = $(this).attr("nombre");

		localStorage.setItem("idProspecto",id);
		localStorage.setItem("nombreProspecto",nombre);
		$('#nombreSearch').val(nombre);

		window.location.href = "tableroAcciones";
	});
	/***ACTUALIZAR PERFIL***/
	$(".btnActualizarDatos").on('click', function() {
		var idProspecto = localStorage.getItem("idProspecto");
	    var nombrePerfil = $("#nombrePerfil").val();
	    var correoPerfil = $("#correoPerfil").val();
	    var tallerPerfil = $("#tallerPerfil").val();
	    var telefonoPerfil = $("#telefonoPerfil").val();
	    var celularPerfil = $("#celularPerfil").val();
	    var direccionPerfil = $("#direccionPerfil").val();
	    var latitud = localStorage.latitud;
	    var longitud = localStorage.longitud;
	    var tituloProspectoPerfil = $("#tituloProspectoPerfil").val();
	    var faseProspectoPerfil = $("#faseProspectoPerfil").val();
	    var origenProspectoPerfil = $("#origenProspectoPerfil").val();
    	var comentariosPerfil = $("#comentariosPerfil").val();

    	var datos = new FormData();
    	datos.append('idProspecto',idProspecto);
    	datos.append('nombrePerfil',nombrePerfil);
    	datos.append('correoPerfil',correoPerfil);
    	datos.append('tallerPerfil',tallerPerfil);
    	datos.append('telefonoPerfil',telefonoPerfil);
    	datos.append('celularPerfil',celularPerfil);
    	datos.append('direccionPerfil',direccionPerfil);
    	datos.append('latitudPerfil',latitud);
    	datos.append('longitudPerfil',longitud);
    	datos.append('tituloProspectoPerfil',tituloProspectoPerfil);
    	datos.append('faseProspectoPerfil',faseProspectoPerfil);
    	datos.append('origenProspectoPerfil',origenProspectoPerfil);
    	datos.append('comentariosPerfil',comentariosPerfil);

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
						title: "¡Datos Actualizados!",
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

		/***CREAR NUEVA OPORTUNIDAD***/
	$(".btnGenerarOportunidad").on('click', function() {
		var idProspecto = localStorage.getItem("idProspecto");
		var nombreOportunidad = localStorage.getItem("nombreProspecto");
	    var conceptoOportunidad = $("#conceptoOportunidad").val();
	    var faseOportunidad = $("#faseOportunidad").val();
	    var montoOportunidad = $("#montoOportunidad").val();
	    var cierreEstimado = $("#cierreEstimado").val();
	    var certezaOportunidad = $("#certezaOportunidad").val();
	    var comentariosOportunidad = $("#comentariosOportunidad").val();

    	var datos = new FormData();
    	datos.append('idProspectoOportunidad',idProspecto);
    	datos.append('nombreOportunidad',nombreOportunidad);
    	datos.append('conceptoOportunidad',conceptoOportunidad);
    	datos.append('faseOportunidad',faseOportunidad);
    	datos.append('montoOportunidad',montoOportunidad);
    	datos.append('cierreEstimado',cierreEstimado);
    	datos.append('certezaOportunidad',certezaOportunidad);
    	datos.append('comentariosOportunidad',comentariosOportunidad);

    	if (cierreEstimado === "") {
    		swal({

						type: "error",
						title: "¡Falta Ingresar El Cierre Estimado!",
						showConfirmButton: true,
						confirmButtonText: "Aceptar"

					}).then(function(result){

						

					});
    	}else{
    		
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
						title: "¡Oportunidad Creada!",
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
    		 
    	}

	});		
	/**ACTUALIZAR OPORTUNIDAD DE VENTA***/
	$("#tablaListaOportunidades").on("click",".btnEditarOportunidad",function(){

		var idProspecto = localStorage.getItem("idProspecto");
		var newIdProspecto = $(this).attr("idProspecto");
		var newNombreProspecto = $(this).attr("nombreProspecto");
		if (idProspecto === null) {
			localStorage.setItem("idProspecto",newIdProspecto);
			localStorage.setItem("nombreProspecto",newNombreProspecto);
			if (localStorage.idProspecto === undefined || localStorage.idProspecto === '0') {
				$("#nombreSearch").val(newNombreProspecto);
			}else{
				$('#nombreSearch').val(newNombreProspecto);
			}
		}else{

			localStorage.setItem("idProspecto",newIdProspecto);
			localStorage.setItem("nombreProspecto",newNombreProspecto);
			if (localStorage.idProspecto === undefined || localStorage.idProspecto === '0') {
				$("#nombreSearch").val(newNombreProspecto);
			}else{
				$('#nombreSearch').val(newNombreProspecto);
			}

		}
		
		var idOportunidad = $(this).attr("idOportunidad");
		var datos = new FormData();
  		datos.append("idOportunidad", idOportunidad);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 
		      
		    	$("#conceptoOportunidadEdit").val(respuesta["concepto"]);

		    	$("#faseOportunidadEdit option[value='"+respuesta["idFaseOportunidad"]+"']").attr("selected", true);
    			$("#certezaOportunidadEdit option[value='"+respuesta["idCerteza"]+"']").attr("selected", true);

				$("#montoOportunidadEdit").val(respuesta["monto"]);

				  var fecha = new Date(respuesta["cierreEstimado"]);

				  var mes = fecha.getMonth()+1;
				  var dia = fecha.getDate()+1; 
				  var anio = fecha.getFullYear();
				  if(dia<10)
				    dia='0'+dia;
				  if(mes<10)
				    mes='0'+mes;
				  
				  document.getElementById("cierreEstimadoEdit").value = anio+"-"+mes+"-"+dia;
				
				  $("#comentariosOportunidadEdit").val(respuesta["observaciones"]);

				  var btnActualizar = document.getElementById("btnActualizarOportunidad");
				  btnActualizar.setAttribute("idOportunidad", respuesta["id"]);

		    }


		  })

	});

	$("#btnActualizarOportunidad").on('click', function() {
		
		var idOportunidad = $(this).attr("idOportunidad");
		var conceptoOportunidad = $("#conceptoOportunidadEdit").val();
	    var faseOportunidad = $("#faseOportunidadEdit").val();
	    var montoOportunidad = $("#montoOportunidadEdit").val();
	    var cierreEstimado = $("#cierreEstimadoEdit").val();
	    var certezaOportunidad = $("#certezaOportunidadEdit").val();
	    var comentariosOportunidad = $("#comentariosOportunidadEdit").val();

    	var datos = new FormData();
    	datos.append('idOportunidadEdit',idOportunidad);
    	datos.append('conceptoOportunidadEdit',conceptoOportunidad);
    	datos.append('faseOportunidadEdit',faseOportunidad);
    	datos.append('montoOportunidadEdit',montoOportunidad);
    	datos.append('cierreEstimadoEdit',cierreEstimado);
    	datos.append('certezaOportunidadEdit',certezaOportunidad);
    	datos.append('comentariosOportunidadEdit',comentariosOportunidad);
    	datos.append('idProspectoOportunidadEdit',localStorage.idProspecto);

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
						title: "¡Oportunidad Actualizada!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						$("#btnSalirActualizarOportunidad").click();
						tablaListaOportunidades.ajax.reload();

					});

            	}
  
            }
          });


	});
	/**CERRAR VENTA**/
	$("#tablaListaOportunidades").on("click",".btnCerrarVenta",function(){

		var idProspecto = localStorage.getItem("idProspecto");
		var newIdProspecto = $(this).attr("idProspecto");
		var newNombreProspecto = $(this).attr("nombreProspecto");
		if (idProspecto === null) {
			localStorage.setItem("idProspecto",newIdProspecto);
			localStorage.setItem("nombreProspecto",newNombreProspecto);
			if (localStorage.idProspecto === undefined || localStorage.idProspecto === '0') {
				$("#nombreSearch").val(newNombreProspecto);
			}else{
				$('#nombreSearch').val(newNombreProspecto);
			}
		}else{

			localStorage.setItem("idProspecto",newIdProspecto);
			localStorage.setItem("nombreProspecto",newNombreProspecto);
			if (localStorage.idProspecto === undefined || localStorage.idProspecto === '0') {
				$("#nombreSearch").val(newNombreProspecto);
			}else{
				$('#nombreSearch').val(newNombreProspecto);
			}

		}
		
		var idOportunidad = $(this).attr("idOportunidad");
		var nombreProspecto = $(this).attr("nombreProspecto");
		var datos = new FormData();
  		datos.append("idOportunidad", idOportunidad);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 
		      
		    	$("#conceptoVenta").val(respuesta["concepto"]);

				  var fecha = new Date();

				  var mes = fecha.getMonth()+1;
				  var dia = fecha.getDate(); 
				  var anio = fecha.getFullYear();
				  if(dia<10)
				    dia='0'+dia;
				  if(mes<10)
				    mes='0'+mes;
				  
				  document.getElementById("fechaVenta").value = anio+"-"+mes+"-"+dia;
				  $("#montoVenta").val(respuesta["monto"]);
				  $("#observacionesVenta").val("Nueva Venta cerrada del cliente"+" "+localStorage.nombreProspecto);

				  var btnFinalizar = document.getElementById("btnFinalizarVenta");
				  btnFinalizar.setAttribute("idOportunidad", respuesta["id"]);
				  btnFinalizar.setAttribute("nombreProspecto", nombreProspecto);

		    }


		  })

	});

	/***FINALIZAR VENTA***/
	$("#btnFinalizarVenta").on('click', function() {
		
		var idOportunidad = $(this).attr("idOportunidad");
		var prospectoVenta = $(this).attr("nombreProspecto");
		var conceptoVenta = $("#conceptoVenta").val();
	    var fechaVenta = $("#fechaVenta").val();
	    var montoVenta = $("#montoVenta").val();
	    var serieVenta = $("#serieVenta").val();
	    var folioVenta = $("#folioVenta").val();
	    var observacionesVenta = $("#observacionesVenta").val();

    	var datos = new FormData();
    	datos.append('idOportunidadVenta',idOportunidad);
    	datos.append('prospectoVenta',prospectoVenta);
    	datos.append('conceptoVenta',conceptoVenta);
    	datos.append('fechaVenta',fechaVenta);
    	datos.append('montoVenta',montoVenta);
    	datos.append('serieVenta',serieVenta);
    	datos.append('folioVenta',folioVenta);
    	datos.append('observacionesVenta',observacionesVenta);
    	datos.append('idProspectoVenta',localStorage.idProspecto);

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
						title: "¡Venta cerrada exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						$("#btnSalirVenta").click();
						var serieVenta = $("#serieVenta").val("");
	    				var folioVenta = $("#folioVenta").val("");
						tablaListaOportunidades.ajax.reload();


					});

            	}
  
            }
          });


	});
	/**VISUALIZAR DETALLE DE VISITA**/
	$("#tablaVisitas").on("click",".btnVisualizarDetalle",function(){
		
		var idVisita = $(this).attr("idVisita");
		var datos = new FormData();
  		datos.append("idVisita", idVisita);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 
		      
		    	$("#detalle-visita").html(respuesta["detalle"]);

		    }


		  })

	});
	/**VISUALIZAR DETALLE DE RECORDATORIOS**/
	$("#tablaRecordatorios").on("click",".btnVisualizarDetalleRecordatorio",function(){
		
		var idRecordatorio = $(this).attr("idRecordatorio");
		var datos = new FormData();
  		datos.append("idRecordatorio", idRecordatorio);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 
		      
		    	$("#detalle-recordatorio").html(respuesta["detalle"]);

		    }


		  })

	});
	/**VISUALIZAR DETALLE DE DEMOSTRACIONES**/
	$("#tablaDemostraciones").on("click",".btnVisualizarDetalleDemostracion",function(){
		
		var idDemostracion = $(this).attr("idDemostracion");
		var datos = new FormData();
  		datos.append("idDemostracion", idDemostracion);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 
		      
		    	$("#detalle-demostracion").html(respuesta["detalle"]);

		    }


		  })

	});
	/*****GENERAR NUEVA CITA***/
	function reformatDateString(s) {
	  var b = s.split(/\D/);
	  return b.reverse().join('-');
	}
	$("#btnGenerarNuevoEvento").on("click",function(){
		  var idProspecto = localStorage.idProspecto;
          if (idProspecto === undefined) {
            alert("Elige un prospecto");
          }else{
          	  var evento = document.getElementById("colorRecordatorio");
              var eventoElegido = evento.options[evento.selectedIndex].text;

               		  var nombreProspecto = $("#nombreProspectoRecordatorio").val();
				      var lugar = $("#direccionPerfil").val();
				      var lat = $("#latRecordatorio").val();
				      var long = $("#longRecordatorio").val();
				      var titulo = $("#tituloRecordatorio").val();
				      var fechaInicial = $("#fechaInicialRecordatorio").val();
				      var fechaFinal = $("#fechaFinalRecordatorio").val();
				      var descripcion = $("#descripcionRecordatorio").val();
				      var productos = $("#productos").val();
				      var eventoFinal = eventoElegido;
				      var colorRecordatorio = $("#colorRecordatorio").val();

		              var fechaInicioTimestamp= new Date(fechaInicial.replace('T', ' ')).toLocaleString('es-MX',{ 
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit' });
		    		  var fechaFinalTimestamp= new Date(fechaFinal.replace('T', ' ')).toLocaleString('es-MX',{ 
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit' });

		    		  	
		    		  	var fechaSeparada = fechaInicioTimestamp.split(' ');
		    		  	var fecha = fechaSeparada[0];
		    		  	var hora = fechaSeparada[1];
		    		  	var fecha = reformatDateString(fecha);

		    		  	var datos = new FormData();
			            datos.append("idProspectoRecordatorio", localStorage.idProspecto);
			            datos.append("nombreProspectoRecordatorio", nombreProspecto);
			            datos.append("lugarRecordatorio", lugar);
			            datos.append("latRecordatorio", lat);
			            datos.append("longRecordatorio", long);
			            datos.append("tituloRecordatorio", titulo);
			            datos.append("fechaInicialRecordatorio", fechaInicioTimestamp);
			            datos.append("fechaFinalRecordatorio", fechaFinalTimestamp);
			            datos.append("fecha", fecha);
			            datos.append("hora", hora);
			            datos.append("descripcionRecordatorio", descripcion);
			            datos.append("productosRecordatorio", productos);
			            datos.append("colorRecordatorio", colorRecordatorio);
			            datos.append("evento", eventoFinal);

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
				            		$("#btnModalEvento").click();
				            	   	swal({

										type: "success",
										title: "Evento Generado Exitosamente",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"

									}).then(function(result){

										window.location.href = "calendario";

									});

			            	}else{
			            		  swal("Upss", "No se pudo guardar el evento.", "info");
			            	}
			    
			            }
			          });
			          

            }
	});

	/**VISUALIZAR DETALLE DE VENTA**/
	/**
       * COPIAR AL PORTAPAPELES
       */
       
	$("#tablaVentas").on("click",".btnMostrarDetalleVenta",function(){
		
		var idVenta = $(this).attr("idVenta");
		var datos = new FormData();
  		datos.append("idVenta", idVenta);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 
		      
		    	$("#detalleFechaVenta").val(respuesta["cerradoDia"]);
                $("#detalleFolio").val(respuesta["id"]);
                $("#detalleCliente").html(respuesta["nombreCompleto"]);
                $("#detalleTaller").html(respuesta["taller"]);
                $("#detalleCelular").html(respuesta["celular"]);
                $("#detalleDomicilio").html(respuesta["domicilio"]);
                $("#detalleConcepto").html(respuesta["concepto"]);
            
                  var agentes = [
                  {"id":2,"agente":"Orlando Briones"},
                  {"id":4,"agente":"Jonathan González Sánchez"},
                  {"id":5,"agente":"San Manuel"},
                  {"id":6,"agente":"Reforma"},
                  {"id":7,"agente":"Capu"},
                  {"id":8,"agente":"Santiago"},
                  {"id":9,"agente":"Las Torres"},
                  {"id":11,"agente":"Ivan Herrera"},
                  {"id":12,"agente":"Jesus Garcia"},
                  {"id":13,"agente":"Mario Hernandez"},
                  {"id":14,"agente":"Gabriel Andrade"}];


                Array.prototype.findBy = function(column,value){
                  for (var i = 0; i < this.length; i++) {
                    var object = this[i];
                    if (column in object && object[column]=== value) {
                      return object["agente"];
                    }
                  }
                  return null;
                }
                var agente = respuesta["idAgente"]*1;
                var agenteVenta = agentes.findBy('id', agente);

                $("#detalleAgente").html(agenteVenta);
                $("#detalleObservaciones").html(respuesta["observaciones"]);

                $("#detalleTotal").html(respuesta["montoTotal"]);
                var postVenta = document.getElementById("btnServicioPostVenta");
                postVenta.setAttribute("prospectoId",respuesta["prospectoId"]);
                postVenta.setAttribute("ventaId",respuesta["id"]);
                if (respuesta["productos"] == "" || respuesta["productos"] === null) {

                  document.getElementById("invoicelist-body").style.display = "none";

                  document.getElementById("productosNoEncontrados").style.display = "";

                }else{
                	alert("fs");
                  document.getElementById("productosNoEncontrados").style.display = "none";
                  document.getElementById("invoicelist-body").style.display = "";
                  var productos = respuesta["productos"];
                  var codigos = respuesta["codigos"];
                  var cantidades = respuesta["cantidades"];
                  var precios = respuesta["precios"];
                  var separador = ",";
                  var arregloProductos = productos.split(separador);
                  var arregloCodigos = codigos.split(separador);
                  var arregloCantidades = cantidades.split(separador);
                  var arregloPrecios = precios.split(separador);

                  $("#productosDetalle").html("");
                  $("#fila").html("");
                  for (var x=0; x < arregloProductos.length; x++) {

                    var fila = `<tr id="fila"><td>`+arregloCodigos[x]+`</td><td>`+arregloProductos[x]+`</td><td>`+arregloCantidades[x]+`</td><td>`+arregloPrecios[x]+`</td></tr>`;
                      $("#productosDetalle").append(fila);
                   }

                }

                if (respuesta["cancelado"] == 1) {
                  $("#serieFactura").html(respuesta["serie"]);
                  $("#folioFactura").html(respuesta["folio"]);
                  $("#estatusFactura").html(respuesta["estatus"]);
                  var estatus =  document.getElementById("estatusFactura");
                  estatus.setAttribute("style","color:red");
                  var seccion =  document.getElementById("seccionCancelacion");
                  seccion.style.display = "";
                  $("#fechaCancelacion").html(respuesta["fechaCancelacion"]);


                }else{

                  $("#serieFactura").html(respuesta["serie"]);
                  $("#folioFactura").html(respuesta["folio"]);
                  $("#estatusFactura").html(respuesta["estatus"]);

                }

		    }


		  })

	});
	 $("#btnServicioPostVenta").click(function(){

    var prospectoId = $(this).attr("prospectoId");
    var idVenta = $(this).attr("ventaId");

		var datos = new FormData();
  		datos.append("idVenta", idVenta);

  		$.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 

		    	var idVenta = respuesta["id"];
        		var nombreProspecto = respuesta["nombreCompleto"];
        		var titulo = "Porfavor copie el siguiente link para enviarlo a ";
			    var subtitulo = " y pueda contestar la encuesta de satisfacción.";
			    $("#tituloPostVenta").html(titulo);
			    $("#nombre").html(nombreProspecto);
			    $("#subtituloPostVenta").html(subtitulo);

			    var link = "https://sanfranciscodekkerlab.com/postventa?keyUser="+prospectoId+"&keySale="+idVenta;
			    $("#linkPostventa").html(link);
		      
		    }


		  })
  

  });

  /***ACTUALIZAR PERFIL***/
	$(".btnCargarNuevoProspecto").on('click', function() {

	    var nombrePerfil = $("#nombrePerfilCrear").val();
	    var correoPerfil = $("#correoPerfilCrear").val();
	    var tallerPerfil = $("#tallerPerfilCrear").val();
	    var telefonoPerfil = $("#telefonoPerfilCrear").val();
	    var celularPerfil = $("#celularPerfilCrear").val();
	    var direccionPerfil = $("#direccionPerfil").val();
	    var latitud = localStorage.latitud;
	    var longitud = localStorage.longitud;
	    var tituloProspectoPerfil = $("#tituloProspectoPerfilCrear").val();
	    var faseProspectoPerfil = $("#faseProspectoPerfilCrear").val();
	    var origenProspectoPerfil = $("#origenProspectoPerfilCrear").val();
	    var clasificacionProspectoPerfil = $("#clasificacionProspectoPerfilCrear").val();
    	var comentariosPerfil = $("#comentariosPerfilCrear").val();

    	/*
    	&& telefonoPerfil != "" && direccionPerfil != "" && latitud != "" && longitud != ""
    	 */
    	if (nombrePerfil === "" || celularPerfil === "" || direccionPerfil === "" || latitud === "" || longitud === ""  ) {

   
    		
    		swal({

						type: "error",
						title: "¡Faltan Llenar Algunos Campos!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						

					});

    	}else{

    		var datos = new FormData();
    	datos.append('nombrePerfilCrear',nombrePerfil);
    	datos.append('correoPerfilCrear',correoPerfil);
    	datos.append('tallerPerfilCrear',tallerPerfil);
    	datos.append('telefonoPerfilCrear',telefonoPerfil);
    	datos.append('celularPerfilCrear',celularPerfil);
    	datos.append('direccionPerfilCrear',direccionPerfil);
    	datos.append('latitudPerfilCrear',latitud);
    	datos.append('longitudPerfilCrear',longitud);
    	datos.append('tituloProspectoPerfilCrear',tituloProspectoPerfil);
    	datos.append('faseProspectoPerfilCrear',faseProspectoPerfil);
    	datos.append('origenProspectoPerfilCrear',origenProspectoPerfil);
    	datos.append('clasificacionProspectoPerfilCrear',clasificacionProspectoPerfil);
    	datos.append('comentariosPerfilCrear',comentariosPerfil);

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
						title: "¡Datos Registrados Exitosamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "inicio";

						}

					});

            	}
  
            }
          });


    	}
    	

	});	

	 $('#tablaListaLlamadas').on('click', '.btnNuevaLlamada', function(){
    var hoy = new Date();

    var numeroTelefono = $(this).attr("telefonoCliente");

      var idProspecto = $(this).attr("idCliente");
      var nombreProspecto = $(this).attr("nameProspecto");
      var idAgente = $(this).attr("idAgenteVenta");
      var titulo = "Lamada Directa Realizada";
      var fecha = hoy.getFullYear()+'-'+(hoy.getMonth()+1)+'-'+hoy.getDate();
      var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
      var descripcion = "Llamada Realizada a: "+nombreProspecto;

      var datos = new FormData();
      	datos.append('idProspectoLlamada',idProspecto)
		datos.append('nombreProspectoLlamada',nombreProspecto)
		datos.append('idAgenteLlamada',idAgente)
		datos.append('tituloLlamada',titulo)
		datos.append('fechaLlamada',fecha)
		datos.append('horaLlamada',hora)
		datos.append('descripcionLlamada',descripcion)

      $.ajax({

		    url:"ajax/funciones.ajax.php",
		    method: "POST",
		    data: datos,
		    cache: false,
		    contentType: false,
		    processData: false,
		    dataType: "json",
		    success: function(respuesta){ 

		    location.href = "tel:"+numeroTelefono+"";
		      
		    }


		  })



  });

  $("#btnEditarEvento").on("click",function(){
		 	var evento = document.getElementById("colorRecordatorioEdit");
            var eventoElegido = evento.options[evento.selectedIndex].text;

               		  var idEvento = $("#idEventoRecordatorio").val();
				      var lugar = $("#lugarRecordatorioEdit").val();
				      var lat = $("#latRecordatorioEdit").val();
				      var long = $("#longRecordatorioEdit").val();
				      var titulo = $("#tituloRecordatorioEdit").val();
				      var fechaInicial = $("#fechaInicialRecordatorioEdit").val();
				      var fechaFinal = $("#fechaFinalRecordatorioEdit").val();
				      var descripcion = $("#descripcionRecordatorioEdit").val();
				      var productos = $("#productosEdit").val();
				      var eventoFinal = eventoElegido;
				      var colorRecordatorio = $("#colorRecordatorioEdit").val();
				      var nombreProspecto = $("#nombreProspectoRecordatorioEdit").val();
				      var idProspecto = $("#idProspectoRecordatorio").val();

		              var fechaInicioTimestamp= new Date(fechaInicial.replace('T', ' ')).toLocaleString('es-MX',{ 
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit' });
		    		  var fechaFinalTimestamp= new Date(fechaFinal.replace('T', ' ')).toLocaleString('es-MX',{ 
    year: 'numeric',
    month: '2-digit',
    day: '2-digit',
    hour: '2-digit',
    minute: '2-digit',
    second: '2-digit' });

		    		  	
		    		  	var fechaSeparada = fechaInicioTimestamp.split(' ');
		    		  	var fecha = fechaSeparada[0];
		    		  	var hora = fechaSeparada[1];
		    		  	var fecha = reformatDateString(fecha);

		    		  	var datos = new FormData();
		    		  	datos.append("idEventoRecordatorioEdit", idEvento);
			            datos.append("lugarRecordatorioEdit", lugar);
			            datos.append("latRecordatorioEdit", lat);
			            datos.append("longRecordatorioEdit", long);
			            datos.append("tituloRecordatorioEdit", titulo);
			            datos.append("fechaInicialRecordatorioEdit", fechaInicioTimestamp);
			            datos.append("fechaFinalRecordatorioEdit", fechaFinalTimestamp);
			            datos.append("fechaEdit", fecha);
			            datos.append("horaEdit", hora);
			            datos.append("descripcionRecordatorioEdit", descripcion);
			            datos.append("productosRecordatorioEdit", productos);
			            datos.append("colorRecordatorioEdit", colorRecordatorio);
			            datos.append("nombreProspectoRecordatorioEdit", nombreProspecto);
			            datos.append("idProspectoRecordatorioEdit", idProspecto);
			            datos.append("eventoEdit", eventoFinal);

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
				            		$("#btnModalEventoEdit").click();
				            	   	swal({

										type: "success",
										title: "Evento Actualizado Exitosamente",
										showConfirmButton: true,
										confirmButtonText: "Cerrar"

									}).then(function(result){

										window.location.href = "calendario";

									});

			            	}else{
			            		  swal("Upss", "No se pudo guardar el evento.", "info");
			            	}
			    
			            }
			          });
			          

	});

 

});