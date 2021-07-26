<?php
error_reporting(E_ALL);
require_once('modelos/conexion.php');
$idAgente = $_SESSION['id'];
if ($idAgente == 11) {
  $sql = "SELECT id, asunto, idAgente,color,fechaInicial, fechaFinal,evento FROM eventosview";
}else if($idAgente == 1){
   $sql = "SELECT id, asunto, idAgente,color,fechaInicial, fechaFinal,evento FROM eventosview where idAgente in(1,2)";
}else{
  $sql = "SELECT id, asunto, idAgente,color,fechaInicial, fechaFinal,evento FROM eventosview where idAgente = $idAgente";
}


$req = Conexion::conectar()->prepare($sql);
$req->execute();

$recordatorios = $req->fetchAll();

?>
<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Calendario
      <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Calendario</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">


      </div>

      <div class="box-body">

        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="">
                  <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 50px">
                      
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 border-right p-r-0">
                      <div class="card-body border-bottom">
                        <h4 class="card-title m-t-10"></h4>
                      </div>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div id="calendar-events" class="">

                              <div class="calendar-events" data-class="bg-info"><i class="fa fa-circle fa-2x m-r-10" style="color:#ADFF2F"></i>Citas</div>
                              <div class="calendar-events" data-class="bg-success"><i class="fa fa-circle fa-2x m-r-10" style="color: #008000"></i>Visitas</div>
                              <div class="calendar-events" data-class="bg-danger"><i class="fa fa-circle fa-2x m-r-10" style="color: #FF8C00"></i>Llamadas</div>
                              <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle fa-2x m-r-10" style="color:#FF0000"></i>Recordatorios</div>
                              <div class="calendar-events" data-class="bg-warning"><i class="fa fa-circle fa-2x m-r-10" style="color:#0d98ba"></i>Demostraciones</div>
                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                 
                    <div class="col-lg-10 col-md-10 col-sm-10">
                      <div class="card-body b-l calender-sidebar">
                        <div id="calendario"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Modal -->
          <div class="modal fade" id="ModalAdd" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header estiloModals">

                  <h4 class="modal-title asunto" id="myModalLabel">Nuevo Evento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                 <div class="container col-md-12 col-sm-12 col-lg-12">
                  <div class="row">
                    <form >
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <span>Nombre: </span> <input type="text" class="form-control" id="nombreProspectoRecordatorio" value="" disabled>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                       <span>Tipo de Evento*: </span> 

                       <select name="color" class="form-control" id="colorRecordatorio" required>
                        <option value="">Seleccionar</option>
                        <option style="color:#ADFF2F;" value="#ADFF2F">Cita</option>
                        <option style="color:#008000;" value="#008000">Visita</option>
                        <option style="color:#FF8C00;" value="#FF8C00">Llamada</option>
                        <option style="color:#FF0000;" value="#FF0000">Recordatorio</option>
                        <option style="color:#0d98ba;" value="#0d98ba">Demostracion</option>

                      </select>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <span>Asunto*: </span> <input type="text" class="form-control" id="tituloRecordatorio" value="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <span>Fecha y Hora Inicial*: </span><input type="datetime-local" class="form-control" id="fechaInicialRecordatorio" placeholder="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <span>Fecha y Hora Final*: </span><input type="datetime-local" class="form-control" id="fechaFinalRecordatorio" placeholder="">
                    </div>
                    <div id="eventoElegido" style="display: none">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <span>Lugar: </span><input type="text" class="form-control" id="direccionPerfil"  placeholder="Ingrese su dirección" onFocus="geolocate()"  >
                      </div>
                      <div class="col-sm-12 col-md-12 col-lg-12">
                         <div id="mapa" style="width:100%;height: 400px;margin-top: 20px;margin-bottom: 30px"> </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <span>Lat: </span><input type="text" class="form-control" id="latRecordatorio" placeholder="" disabled>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <span>Long: </span><input type="text" class="form-control" id="longRecordatorio" placeholder="" disabled>
                      </div>
                    </div>
                    <div id="eventoElegido2" style="display: none">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <span>Productos Demostración*: </span><input class="form-control tagator" id="productos" data-tagator-show-all-options-on-focus="true" data-tagator-autocomplete="['XCLO BODY FILLER', 'XCLO PRIMER UNIVERSAL GRIS', 'FX PRIMER UNIVERSAL', 'FLEX BASE PRIMER', 'PLASTER PIROXILINA', 'FLEX PRIMER DE RELLENO', 'TRANSPARENTE UAD', 'KIT RTS TRANSPARENTE']">
                        
                      </div>
                    </div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <span>Descripcion: </span><textarea class="form-control" id="descripcionRecordatorio" rows="10" cols="50"></textarea>
                    </div>

                  </form>
                </div>
              </div>
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btnModal" data-dismiss="modal" id="btnModalEvento">Cerrar</button>
              <button type="submit" class="btn btnModal" id="btnGenerarNuevoEvento">Guardar</button>
            </div>

          </div>
        </div>
      </div>



      <!-- Modal -->
          <div class="modal fade" id="ModalEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header estiloModals">

                  <h4 class="modal-title asunto" id="myModalLabel">Editar Evento</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                 <div class="container col-md-12 col-sm-12 col-lg-12">
                  <div class="row">
                    <form >
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <input type="hidden" class="form-control" id="idEventoRecordatorio" value="" disabled>
                        <input type="hidden" class="form-control" id="idProspectoRecordatorio" value="" disabled>
                        <span>Nombre: </span> <input type="text" class="form-control" id="nombreProspectoRecordatorioEdit" value="" disabled>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12">
                       <span>Tipo de Evento*: </span> 

                       <select name="color" class="form-control" id="colorRecordatorioEdit" disabled>
                        <option value="">Seleccionar</option>
                        <option style="color:#ADFF2F;" value="#ADFF2F">Cita</option>
                        <option style="color:#008000;" value="#008000">Visita</option>
                        <option style="color:#FF8C00;" value="#FF8C00">Llamada</option>
                        <option style="color:#FF0000;" value="#FF0000">Recordatorio</option>
                        <option style="color:#0d98ba;" value="#0d98ba">Demostracion</option>

                      </select>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <span>Asunto*: </span> <input type="text" class="form-control" id="tituloRecordatorioEdit" value="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <span>Fecha y Hora Inicial*: </span><input type="datetime-local" class="form-control" id="fechaInicialRecordatorioEdit" placeholder="">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <span>Fecha y Hora Final*: </span><input type="datetime-local" class="form-control" id="fechaFinalRecordatorioEdit" placeholder="">
                    </div>
                    <div id="eventoElegidoEdit" style="display: none">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <span>Lugar: </span><input type="text" class="form-control" id="lugarRecordatorioEdit"  placeholder="" disabled>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <span>Lat: </span><input type="text" class="form-control" id="latRecordatorioEdit" placeholder="" disabled>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6">
                        <span>Long: </span><input type="text" class="form-control" id="longRecordatorioEdit" placeholder="" disabled>
                      </div>
                    </div>
                    <div id="eventoElegidoEdit2" style="display: none">
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <span>Productos Demostración*: </span><input class="form-control tagator" id="productosEdit" data-tagator-show-all-options-on-focus="true" data-tagator-autocomplete="['XCLO BODY FILLER', 'XCLO PRIMER UNIVERSAL GRIS', 'FX PRIMER UNIVERSAL', 'FLEX BASE PRIMER', 'PLASTER PIROXILINA', 'FLEX PRIMER DE RELLENO', 'TRANSPARENTE UAD', 'KIT RTS TRANSPARENTE']">
                        
                      </div>
                    </div>
                   
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <span>Descripcion: </span><textarea class="form-control" id="descripcionRecordatorioEdit" rows="10" cols="50"></textarea>
                    </div>

                  </form>
                </div>
              </div>
            </div>

            <div class="modal-footer">

              <button type="button" class="btn btnModal" data-dismiss="modal" id="btnModalEventoEdit">Cerrar</button>
              <button type="submit" class="btn btnModal" id="btnEditarEvento">Actualizar</button>

              <button type="submit" class="btn btn-danger" id="btnEliminarEvento">Eliminar</button>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</section>


</div>
<script>

  $(document).ready(function() {

    function fechaInicialEdit(fecha){
        var fecha = new Date(fecha); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours(); //obteniendo hora
        var minutos = fecha.getMinutes(); //obteniendo minuto

        document.getElementById("fechaInicialRecordatorioEdit").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
       
    }
    function fechaFinalEdit(fecha){
        var fecha = new Date(fecha); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours(); //obteniendo hora
        var minutos = fecha.getMinutes(); //obteniendo minuto

        document.getElementById("fechaFinalRecordatorioEdit").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
       
    }
    function fechaInicio(fecha){
        var fecha = new Date(fecha); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate()+1; //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours()-4; //obteniendo hora
        var minutos = fecha.getMinutes(); //obteniendo minuto

        document.getElementById("fechaInicialRecordatorio").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
       
    }
    function fechaFinal(fecha){
        var fecha = new Date(fecha); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        var hora = fecha.getHours()-4; //obteniendo hora
        var minutos = fecha.getMinutes(); //obteniendo minuto

        
        document.getElementById("fechaFinalRecordatorio").value=ano+"-"+minTwoDigits(mes)+"-"+minTwoDigits(dia)+"T"+minTwoDigits(hora)+":"+minTwoDigits(minutos);
    }
    function minTwoDigits(n) {
      return (n < 10 ? '0' : '') + n;
    }
    var date = new Date();
    var yyyy = date.getFullYear().toString();
    var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
    var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

    $('#calendario').fullCalendar({
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado'],
     dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
     monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     buttonText: {
      today:    'Hoy',
      month:    'Mes',
      week:     'Semana',
      day:      'Día',
      list:     'Lista'
    },
    header: {
     locale: 'es',
     left: 'prev,next today',
     center: 'title',
     right: 'month,basicWeek,listDay,agendaDay,agendaFiveDay'
     

   },
   defaultDate: yyyy+"-"+mm+"-"+dd,
   editable: false,
            eventLimit: true, 
            selectable: true,
            selectHelper: true,
            select: function(start, end) {

              fechaInicio(moment(start));
              fechaFinal(moment(end));
              $('#ModalAdd').modal('show');
            },
            eventRender: function(event, element) {
              element.bind('dblclick', function() {
                $('#ModalEdit #idEventoRecordatorio').val(event.id);

                 var datos = new FormData();
                 datos.append('eventId',event.id);
                 datos.append('eventoElegido',event.evento);
                 
                 $.ajax({
                  url: "ajax/funciones.ajax.php",
                  method: "POST",
                  data: datos,
                  cache: false,
                  contentType: false,
                  processData: false,
                  dataType: "json",
                  success: function(respuesta) {
                    console.log(respuesta);
                      
                        $('#ModalEdit #nombreProspectoRecordatorioEdit').val(respuesta["nombreCompleto"]);
                        $('#ModalEdit #idProspectoRecordatorio').val(respuesta["idProspecto"]);
                         $("#ModalEdit #colorRecordatorioEdit option[value='"+respuesta["color"]+"']").attr("selected", true);
                        $('#ModalEdit #lugarRecordatorioEdit').val(respuesta["ubicacion"]);
                        $('#ModalEdit #latRecordatorioEdit').val(respuesta["latitud"]);
                        $('#ModalEdit #longRecordatorioEdit').val(respuesta["longitud"]);
                        if (event.evento == 'Llamada') {
                          $('#ModalEdit #tituloRecordatorioEdit').val(respuesta["titulo"]);
                        }else{
                          $('#ModalEdit #tituloRecordatorioEdit').val(respuesta["asunto"]);
                        }
                        
                        var fechaInicio = new Date(respuesta["fechaInicial"]);
                        var fechaFin = new Date(respuesta["fechaFinal"]);
                        fechaInicialEdit(fechaInicio);
                        fechaFinalEdit(fechaFin);
                       
                        $('#ModalEdit #descripcionRecordatorioEdit').val(respuesta["descripcion"]);

                        var eventoEdit = $("#colorRecordatorioEdit").val();
                        switch (eventoEdit) {
                          case "#ADFF2F":
                            document.getElementById("eventoElegidoEdit").style.display = '';
                             document.getElementById("eventoElegidoEdit2").style.display = 'none';
                            break;
                          case "#008000":
                            document.getElementById("eventoElegidoEdit").style.display = '';
                             document.getElementById("eventoElegidoEdit2").style.display = 'none';
                            break;
                          case "#0d98ba":
                            document.getElementById("eventoElegidoEdit").style.display = '';
                            document.getElementById("eventoElegidoEdit2").style.display = '';
                            break;
                          default:
                            document.getElementById("eventoElegidoEdit").style.display = 'none';
                            document.getElementById("eventoElegidoEdit2").style.display = 'none';
                         
                            break;
                        }
                        $('#ModalEdit #productosEdit').val(respuesta["productos"]);
                     
          
                  }
                });
               

                $('#ModalEdit').modal('show');
              });
            },
            eventDrop: function(event, delta, revertFunc) { // si changement de position

              //edit(event);

            },
            eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

              //edit(event);

            },
            events: [
            <?php foreach($recordatorios as $recordatorio): 

              $start = explode(" ", $recordatorio['fechaInicial']);
              $end = explode(" ", $recordatorio['fechaFinal']);
              if($start[1] == '00:00:00'){
                $start = $start[0];
              }else{
                $start = $recordatorio['fechaInicial'];
              }
              if($end[1] == '00:00:00'){
                $end = $end[0];
              }else{
                $end = $recordatorio['fechaFinal'];
              }
              ?>
              {
                id: '<?php echo $recordatorio['id']; ?>',
                title: '<?php echo $recordatorio['asunto']; ?>',
                idAgente: '<?php echo $recordatorio['idAgente']; ?>',
                start: '<?php echo $start; ?>',
                end: '<?php echo $end; ?>',
                fechaInicial: '<?php echo $recordatorio['fechaInicial']; ?>',
                fechaFinal: '<?php echo $recordatorio['fechaFinal']; ?>',
                evento: '<?php echo $recordatorio['evento']; ?>',
                color: '<?php echo $recordatorio['color']; ?>',
              },
            <?php endforeach; ?>
            ]
          });

        
          /***MOSTRAR O OCULTAR LUGAR DEPENDIENDO DEL EVENTO**/

          $("#colorRecordatorio").on("change",function(){
              var evento = $("#colorRecordatorio").val();
              switch (evento) {
                case "#ADFF2F":
                  document.getElementById("eventoElegido").style.display = '';
                   document.getElementById("eventoElegido2").style.display = 'none';
                  break;
                case "#008000":
                  document.getElementById("eventoElegido").style.display = '';
                   document.getElementById("eventoElegido2").style.display = 'none';
                  break;
                case "#0d98ba":
                  document.getElementById("eventoElegido").style.display = '';
                  document.getElementById("eventoElegido2").style.display = '';
                  break;
                default:
                  document.getElementById("eventoElegido").style.display = 'none';
                  document.getElementById("eventoElegido2").style.display = 'none';
               
                  break;
              }
          });

          $("#colorRecordatorioEdit").on("change",function(){
              var evento = $("#colorRecordatorioEdit").val();
              switch (evento) {
                case "#ADFF2F":
                  document.getElementById("eventoElegidoEdit").style.display = '';
                   document.getElementById("eventoElegidoEdit2").style.display = 'none';
                  break;
                case "#008000":
                  document.getElementById("eventoElegidoEdit").style.display = '';
                   document.getElementById("eventoElegidoEdit2").style.display = 'none';
                  break;
                case "#0d98ba":
                  document.getElementById("eventoElegidoEdit").style.display = '';
                  document.getElementById("eventoElegidoEdit2").style.display = '';
                  break;
                default:
                  document.getElementById("eventoElegidoEdit").style.display = 'none';
                  document.getElementById("eventoElegidoEdit2").style.display = 'none';
               
                  break;
              }
          });



          var idProspecto = localStorage.idProspecto;
          if (idProspecto === undefined) {
           
          }else{
            var datos = new FormData();
            datos.append("identificador", ""+localStorage.idProspecto+"");
            $.ajax({
            url: "ajax/detalles.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(response) {
              
                $("#nombreProspectoRecordatorio").val(response["nombreCompleto"]);
                $("#direccionPerfil").val(response["domicilio"]);
                $("#latRecordatorio").val(response["latitud"]);
                $("#longRecordatorio").val(response["longitud"]);
                localStorage.setItem("latitud", response["latitud"]);
                localStorage.setItem("longitud", response["longitud"]);
    
            }
          });
          }


  });

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Ow27ztKwFY0_CyX5FXXfK6PV87gJsPQ&signed_in=true&libraries=places"></script>

<script type="text/javascript">
  $(document).ready(function(){
      initialize();
     
          /*
          CREACION DEL MAPA
           */
          mapa = {
           map : false,
           marker : false,

           initMap : function(lati,long) {

           // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.
           geocoder = new google.maps.Geocoder();
           mapa.map = new google.maps.Map(document.getElementById('mapa'), {
             center: {lat: lati, lng: long},
             scrollwheel: true,
             zoom: 14,
             zoomControl: true,
             rotateControl : true,
             mapTypeControl: true,
             streetViewControl: true,
           });

           // Creamos el marcador
           mapa.marker = new google.maps.Marker({
           position: {lat: lati, lng: long},
           draggable: true
           });

           google.maps.event.addListener(mapa.marker, 'dragend', function (evt) {
                var coordenadas = evt.latLng.lat().toFixed(6)+","+evt.latLng.lng().toFixed(6);
    
                $("#coordenadasPerfilCrear").val(coordenadas);

                $("#latRecordatorio").val(evt.latLng.lat().toFixed(6));
                $("#longRecordatorio").val(evt.latLng.lng().toFixed(6));
                localStorage.setItem("latitud", evt.latLng.lat().toFixed(6));
                localStorage.setItem("longitud",evt.latLng.lng().toFixed(6));
                 codeLatLng(evt.latLng.lat().toFixed(6),evt.latLng.lng().toFixed(6));
                //decodingDirecion(localStorage.latitud*1,localStorage.longitud*1);
                mapa.map.panTo(evt.latLng);
                
            });

            mapa.map.setCenter(mapa.marker.position);
           // Le asignamos el mapa a los marcadores.
            mapa.marker.setMap(mapa.map);

           }
          }

          mapa.initMap(localStorage.latitud*1,localStorage.longitud*1);
          history.forward();

       function codeLatLng(latitud,longitud) {

        var lat = latitud;
        var lng = longitud;
        var latlng = new google.maps.LatLng(lat, lng);
        geocoder.geocode({'latLng': latlng}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {

              $('#direccionPerfil').val(results[0].formatted_address);

            } else {
              alert('No results found');
            }
          } else {
            alert('Geocoder failed due to: ' + status);
          }
        });
      }
  })
</script>
<style type="text/css" media="screen">
  #autocomplete_textarea{
    background-color: #FFF;
    z-index: 2001;
    position: fixed;
    display: inline-block;
    float: left;
  }
  .pac-container {
    background-color: #FFF;
    z-index: 2001;
    position: fixed;
    display: inline-block;
    float: left;
  }
  .modal{
      z-index: 2000;
  }
  .modal-backdrop{
      z-index: 1000;
  }​
  
</style>