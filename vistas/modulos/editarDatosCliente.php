<script type="text/javascript">
  if (localStorage.idProspecto === undefined) {

    window.location.href = "tableroAcciones";
  }else{

  }
</script>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Editar
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Editar</li>

    </ol>

  </section>

  <section class="content">
 
    <div class="box">

      <div class="box-header with-border">
        <center><i class="fas fa-user-circle fa-7x" style="color:#008080"></i><h3 id="nombreProspectoEdicion"></h3></center>
      </div>

      <div class="box-body">

        <div class="container col-md-12 col-sm-12 col-lg-12">
           <div class="row">
               <form>
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Nombre: </span> <input type="text" class="form-control" id="nombrePerfil" name="nombrePerfil" value="" placeholder="Nombre Completo">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <span>Correo: </span><input type="email" class="form-control" id="correoPerfil" placeholder="Correo Electrónico">
                </div>
               
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Taller: </span><input type="text" class="form-control" id="tallerPerfil" placeholder="Taller">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                   <span>Tel: </span><input type="text" class="form-control" id="telefonoPerfil" placeholder="Teléfono">
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Cel: </span><input type="text" class="form-control" id="celularPerfil" placeholder="Celular">
                </div>
              
       
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Dirección: </span><input type="text" class="form-control" id="direccionPerfil" placeholder="Ingrese su dirección" onFocus="geolocate()" >
                </div>
                <div class="col-sm-12 col-md-12 col-lg-12">
                   <div id="mapa" style="width:100%;height: 400px;margin-top: 20px;margin-bottom: 30px"> </div>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>GPS: </span><input type="text" class="form-control" id="coordenadasPerfil" placeholder="Coordenadas" disabled>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                <span>Título Prospecto: </span>
                  <select id="tituloProspectoPerfil" class="form-control">
                  </select>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Fase Prospecto: </span>
                  <select id="faseProspectoPerfil" class="form-control">
                  </select>
                </div>
                 <div class="col-sm-6 col-md-6 col-lg-6">
                  <span>Origen Prospecto: </span>
                  <select id="origenProspectoPerfil" class="form-control">
                  </select>
                </div>
                 <div class="col-sm-12 col-md-12 col-lg-12">
                  <span>Comentario: </span>
                   <textarea class="form-control" id="comentariosPerfil" rows="10" cols="50"></textarea>
                </div>
      
                <div class="col-sm-12 col-md-12 col-lg-12">
                  <br>
                   <button type="button" class="btn btn-success btnActualizarDatos">Actualizar<i class="fas fa-pen-alt fa-1x" style="color:white"></i></button>
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
  $(document).ready(function(){
      initialize();
     
      var edicionUsuario = localStorage.nombreProspecto;
      $("#nombreProspectoEdicion").html(edicionUsuario);

       /*OBTENER LOS LISTADOS*/

       var conceptos = ["tituloprospectos","faseprospecto","origenprospectos"];
        for (var i = 0; i < conceptos.length; i++) {

          var datos = new FormData();
           datos.append("tablaListado", 'tituloprospectos');
            $.ajax({
            url: "ajax/funciones.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
               $("#tituloProspectoPerfil").html("");
              for (var i =0; i < respuesta.length; i++) {
                var titulo = `<option value="`+respuesta[i]["id"]+`">`+respuesta[i]["titulo"]+`</option>`;
                $("#tituloProspectoPerfil").append(titulo);
                
              }
              
            }
          });

          datos.append("tablaListado", 'faseprospecto');
            $.ajax({
            url: "ajax/funciones.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
               $("#faseProspectoPerfil").html("");
              for (var i =0; i < respuesta.length; i++) {
                var titulo = `<option value="`+respuesta[i]["id"]+`">`+respuesta[i]["fase"]+`</option>`;
                $("#faseProspectoPerfil").append(titulo);
                
              }
              
            }
          });

          datos.append("tablaListado", 'origenprospectos');
            $.ajax({
            url: "ajax/funciones.ajax.php",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function(respuesta) {
               $("#origenProspectoPerfil").html("");
              for (var i =0; i < respuesta.length; i++) {
                var titulo = `<option value="`+respuesta[i]["id"]+`">`+respuesta[i]["origen"]+`</option>`;
                $("#origenProspectoPerfil").append(titulo);
                
              }
              
            }
          });

        }
        /***OBETENER DATOS DEL CLIENTE/PROSPECTO**/
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
              
                $("#nombrePerfil").val(response["nombreCompleto"]);
                $("#correoPerfil").val(response["correo"]);
                $("#tallerPerfil").val(response["taller"]);
                $("#telefonoPerfil").val(response["telefono"]);
                $("#celularPerfil").val(response["celular"]);
                $("#direccionPerfil").val(response["domicilio"]);
                $("#autocomplete").val(response["domicilio"]);
                var coordenadasPerfil = response["latitud"]+","+response["longitud"];
                $("#coordenadasPerfil").val(coordenadasPerfil);
                var tituloP = response["tituloProspecto"];
                $("#tituloProspectoPerfil option[value='"+tituloP+"']").attr("selected", true);
                 var faseP = response["faseProspecto"];
                $("#faseProspectoPerfil option[value='"+faseP+"']").attr("selected", true);
                var origenP = response["origenProspecto"];
                $("#origenProspectoPerfil option[value='"+origenP+"']").attr("selected", true);
                $("#comentariosPerfil").val(response["comentario"]);

                localStorage.setItem("latitud",response["latitud"]);
                localStorage.setItem("longitud",response["longitud"]);

  
            }
          });


          /*
          CREACION DEL MAPA
           */
          mapa = {
           map : false,
           marker : false,

           initMap : function(lati,long) {

           // Creamos un objeto mapa y especificamos el elemento DOM donde se va a mostrar.

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
                $("#latitud").html(evt.latLng.lat().toFixed(6));
                $("#longitud").html(evt.latLng.lng().toFixed(6));
                localStorage.setItem("latitud", evt.latLng.lat().toFixed(6));
                localStorage.setItem("longitud",evt.latLng.lng().toFixed(6));
                //decodingDirecion(localStorage.latitud*1,localStorage.longitud*1);
                mapa.map.panTo(evt.latLng);
                
            });

            mapa.map.setCenter(mapa.marker.position);
           // Le asignamos el mapa a los marcadores.
            mapa.marker.setMap(mapa.map);

           }
          }

          mapa.initMap(localStorage.latitud*1,localStorage.longitud*1);
          function decodingDirecion(lat,lng){
             var Http = new XMLHttpRequest();
              var latitud = lat;
              var logitud = lng;
              var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitud + ',' + logitud
                  + '&key=AIzaSyA7Ow27ztKwFY0_CyX5FXXfK6PV87gJsPQ';
              Http.open('POST', url);
              Http.send();
              Http.onreadystatechange = (e) => {
                  var json = JSON.parse(Http.responseText)
                  console.log(json["results"]);
                  //console.log(results.address_components[0]["long_name"]);
                  /*
                  for (var i = 0; i < place.address_components.length; i++) {
                  var addressType = place.address_components[i].types[0];
                  if (componentForm[addressType]) {
                    var val = place.address_components[i][componentForm[addressType]];
                    document.getElementById(addressType).value = val;
                    localStorage.setItem(addressType,val);
                  }
                   */
                  
              }
           
          }
  })
</script>

  