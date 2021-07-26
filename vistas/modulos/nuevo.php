
<div class="content-wrapper">

  <section class="content-header">

    <h1>
      Registrar Prospecto/Cliente
      <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Registrar Prospecto/Cliente</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
        <center><i class="fas fa-user-circle fa-7x" style="color:#008080"></i><h3 id="nombreProspectoCreacion"></h3></center>
      </div>

      <div class="box-body">

        <div class="container col-md-12 col-sm-12 col-lg-12">
         <div class="row">
           <form id="formulario">
            <div class="col-sm-6 col-md-6 col-lg-6">
             <span>Nombre: </span> <input type="text" class="form-control" id="nombrePerfilCrear" name="nombrePerfil" onblur="document.getElementById('nombreProspectoCreacion').innerHTML=this.value" value="" placeholder="Nombre Completo">
           </div>
           <div class="col-sm-6 col-md-6 col-lg-6">
            <span>Correo: </span><input type="email" class="form-control" id="correoPerfilCrear" placeholder="Correo Electrónico"  >
          </div>

          <div class="col-sm-6 col-md-6 col-lg-6">
           <span>Empresa / Negocio: </span><input type="text" class="form-control" id="tallerPerfilCrear" placeholder="Taller">
         </div>
         <div class="col-sm-6 col-md-6 col-lg-6">
           <span>Tel: </span><input type="tel" class="form-control" maxlength="10" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" id="telefonoPerfilCrear" placeholder="Teléfono">
         </div>
         <div class="col-sm-6 col-md-6 col-lg-6">
          <span>Cel: </span><input type="tel" class="form-control" maxlength="10" onkeyup="limpiarNumero(this)" onchange="limpiarNumero(this)" id="celularPerfilCrear" placeholder="Celular">
        </div>


        <div class="col-sm-6 col-md-6 col-lg-6">
          <span>Dirección: </span><input type="text" class="form-control" id="direccionPerfil" placeholder="Ingrese su dirección" onFocus="geolocate()" >
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
         <div id="mapa" style="width:100%;height: 400px;margin-top: 20px;margin-bottom: 30px"> </div>
       </div>
       <div class="col-sm-6 col-md-6 col-lg-6">
        <span>GPS: </span><input type="text" class="form-control" id="coordenadasPerfilCrear" placeholder="Coordenadas" disabled>
       
      </div>
      <div class="col-sm-6 col-md-6 col-lg-6">
        <span>Típo de Cliente: </span>
        <select id="tipoClientePerfilCrear" class="form-control">
        </select>
      </div>

      <div class="col-sm-6 col-md-6 col-lg-6">
        <span>Clasificación: </span>
        <select id="clasificacionProspectoPerfilCrear" class="form-control">
          <option value="1">Conversion Swam</option>
          <option value="2">Clientes Corporativos</option>
          <option value="3">Clientes Tiendas</option>
          <option value="4">Clientes Distribucion</option>
        </select>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-12">
        <span>Comentario: </span>
        <textarea class="form-control" id="comentariosPerfilCrear" rows="10" cols="50"></textarea>
      </div>
      
      <div class="col-sm-12 col-md-12 col-lg-12">
        <br>
        <button type="button" class="btn btn-success btnCargarNuevoProspecto">Crear<i class="fas fa-pen-alt fa-1x" style="color:white"></i></button>
      </div>


    </form>
  </div> 
</div>
</div>
</div>

</section>


</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7Ow27ztKwFY0_CyX5FXXfK6PV87gJsPQ&signed_in=true&libraries=places"></script>

<script type="text/javascript">


 function limpiarNumero(obj) {
  /* El evento "change" sólo saltará si son diferentes */
  obj.value = obj.value.replace(/\D/g, '');
}
function validarEmail(valor) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3,4})+$/.test(valor)){
   alert("La dirección de email " + valor + " es correcta.");
 } else {
   alert("La dirección de email es incorrecta.");
 }
}
$(document).ready(function(){

  initialize();


  /*OBTENER LOS LISTADOS*/

  var conceptos = ["tiposclientes","clasificacion"];
  for (var i = 0; i < conceptos.length; i++) {

    var datos = new FormData();
    datos.append("tablaListado", 'tiposclientes');
    $.ajax({
      url: "ajax/funciones.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
       $("#tipoClientePerfilCrear").html("");
       for (var i =0; i < respuesta.length; i++) {
        var titulo = `<option value="`+respuesta[i]["id"]+`">`+respuesta[i]["nombre"]+`</option>`;
        $("#tipoClientePerfilCrear").append(titulo);

      }

    }
  });

    datos.append("tablaListado", 'clasificacion');
    $.ajax({
      url: "ajax/funciones.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(respuesta) {
       $("#clasificacionProspectoPerfilCrear").html("");
       for (var i =0; i < respuesta.length; i++) {
        var titulo = `<option value="`+respuesta[i]["id"]+`">`+respuesta[i]["clasificacion"]+`</option>`;
        $("#clasificacionProspectoPerfilCrear").append(titulo);

      }

    }
  });

  }

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
            localStorage.setItem("latitud", evt.latLng.lat().toFixed(6));
            localStorage.setItem("longitud",evt.latLng.lng().toFixed(6));
            codeLatLng(evt.latLng.lat().toFixed(6),evt.latLng.lng().toFixed(6));
                //decodingDrecion(localStorage.latitud*1,localStorage.longitud*1);
                mapa.map.panTo(evt.latLng);
                
              });

           mapa.map.setCenter(mapa.marker.position);
           // Le asignamos el mapa a los marcadores.
           mapa.marker.setMap(mapa.map);

         }
       }

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
