
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
    Ventas
    <small></small>
    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fas fa-tachometer-alt"></i> Inicio</a></li>
      <li class="active">Ventas</li>

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
                <table id="tablaVentas" class="table table-striped table-bordered table-condensed dt-responsive" style="width:100%">
                    <thead class="text-center">
                    <tr>
                        <th>Id</th>
                        <th>Serie</th>
                        <th>Folio</th>
                        <th>Concepto</th>
                        <th>Cerrada</th>               
                        <th>Estatus</th>
                        <th>Monto Cotizado</th>
                        <th>Monto Entregado</th>
                        <th>% Surtimiento</th>
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
<!--MODAL DETALLE VENTA -->
<div class="modal fade" id="modalDetalleVenta" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header estiloModals">
        <h4 class="modal-title" id="exampleModalLabel">DETALLE VENTA</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container col-lg-12 col-md-12 col-sm-12">
          <div class="logoholder text-center" >
        <img src="vistas/img/plantilla/logo-positivo.png" width="50%">
      </div><!--.logoholder-->

      <div class="me">
        <p >
          <strong>PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.</strong><br>
          PCP970822467<br>
          R??gimen General de Ley Personas Morales<br>

        </p>
      </div><!--.me-->

      <div class="info">
        <p >
          <strong>Matriz:</strong> Libertad 5973
          Col.San Baltazar Campeche C.P 72550 Localidad Puebla
          (Heroica Puebla) M??xico
           <br>

        </p>
      </div><!-- .info -->

      <hr>
      <div class="row section">

        <div class="col-2">
          <h1 >Detalle de Venta</h1>

        </div><!--.col-->

        <div class="col-2 text-right details">
          <p>
            <strong>Fecha Venta:</strong> <input type="text" class="datePicker" id="detalleFechaVenta"  /><br>

          </p>
          <p>
            <strong>Folio:</strong> <input type="text" disabled id="detalleFolio" /><br>
          </p>
        </div><!--.col-->



        <div class="col-2">


          <p class="client">
            <strong>Cliente</strong><br>
            <span id="detalleCliente"></span><br>
            <span id="detalleTaller"></span><br>
            <span id="detalleCelular"></span><br>
          </p>
        </div><!--.col-->


        <div class="col-2">
          <p  class="client">
            <strong>Direcci??n</strong><br>
            <span id="detalleDomicilio"></span><br>
          </p>
        </div><!--.col-->
        <div class="col-12">


          <p class="client">
            <strong>Concepto</strong><br>
            <span id="detalleConcepto"></span>
          </p>
        </div><!--.col-->


      </div><!--.row-->

      <div class="row section" style="margin-top:-1rem">
        <div class="col-1">
          <table style='width:100%'>
            <thead >
              <tr class="invoice_detail">
                <th width="25%" style="text-align">Vendedor</th>
                <th width="25%">Referencia </th>
                <th width="50%">Observaciones</th>

              </tr>
            </thead>
            <tbody>
              <tr class="invoice_detail">
                <td width="25%" style="text-align"><span id="detalleAgente"></span></td>
                <td width="25%"> </td>
                <td width="50%"><span id="detalleObservaciones"></span></td>

              </tr>
            </tbody>
          </table>
        </div>

      </div><!--.row-->
      <div class="row section" style="margin-top:1rem">
        <div class="col-1">
          <table style='width:100%'>
            <thead >
              <tr class="invoice_detail">
                <th width="25%" style="text-align">SERIE FACTURA</th>
                <th width="25%">FOLIO FACTURA </th>
                <th width="50%">ESTATUS</th>

              </tr>
            </thead>
            <tbody>
              <tr class="invoice_detail">
                <td width="25%" style="text-align"><span id="serieFactura"></span></td>
                <td width="25%"><span id="folioFactura"></span></td>
                <td width="50%"><span id="estatusFactura"></span></td>

              </tr>
            </tbody>
          </table>
        </div>

      </div><!--.row-->
      <div class="row section" style="margin-top:1rem;display:none"  id="seccionCancelacion">
        <div class="col-1">
          <table style='width:100%'>
            <thead >
              <tr class="invoice_detail">
                <th width="100%" style="text-align">Fecha Cancelaci??n</th>


              </tr>
            </thead>
            <tbody>
              <tr class="invoice_detail">
                <td width="100%" style="text-align"><span id="fechaCancelacion"></span></td>


              </tr>
            </tbody>
          </table>
        </div>

      </div><!--.row-->
      <div id="productosNoEncontrados" style="display:none">
        <table>

          <tr>
            <td ><strong><i class="fas fa-search-dollar fa-3x" ></i></strong></td>
            <td id="sinProductos" >Upps !Al parecer no hay productos!</td>
          </tr>
        </table>
      </div>
      <div class="invoicelist-body" id="invoicelist-body">
        <table>
          <thead contenteditable>
            <th width="10%">C??digo</th>
            <th width="50%">Descripci??n</th>
            <th width="30%">Unidades</th>
            <th width="10%">Total</th>
          </thead>
          <tbody id="productosDetalle">

          </tbody>
        </table>

      </div>

      <div class="invoicelist-footer" id="invoicelist-footer">
        <table>

          <tr>
            <td><strong>Total:</strong></td>
            <td id="detalleTotal"></td>
          </tr>
        </table>
      </div>
      
      <div class="col-lg-6" id="contenedorPostVenta">
        <button type="button" class="btn btn-success"  id="btnServicioPostVenta">PostVenta</button>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6 contenedor-url-postventa">
          <span style="font-weight:bold;font-size:16px" id="tituloPostVenta"></span><span id="nombre"></span><span style="font-weight:bold;font-size:16px" id="subtituloPostVenta"></span>
          <p id="linkPostventa"></p>
          <button type="button" class="btn btn-info buttonClipboard" onclick="copiarPortapapeles('linkPostventa')"><i class="far fa-clipboard"></i></button>
      </div>
      

          
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btnModal" data-dismiss="modal" >Salir</button>
        
      </div>
    </div>
  </div>
</div>
<!--MODAL DETALLE VENTA -->
<style type="text/css" >
  /*! normalize.css v3.0.2 | MIT License | git.io/normalize */


article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
menu,
nav,
section,
summary {
    display: block
}

audio,
canvas,
progress,
video {
    display: inline-block;
    vertical-align: baseline
}

audio:not([controls]) {
    display: none;
    height: 0
}

[hidden],
template {
    display: none
}

a {
    background-color: transparent
}

a:active,
a:hover {
    outline: 0
}

abbr[title] {
    border-bottom: 1px dotted
}

b,
strong {
    font-weight: bold
}

dfn {
    font-style: italic
}

h1 {
    font-size: 2em;
    margin: 0.67em 0
}

mark {
    background: #ff0;
    color: #000
}

small {
    font-size: 80%
}

sub,
sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline
}

sup {
    top: -0.5em
}

sub {
    bottom: -0.25em
}

img {
    border: 0
}

svg:not(:root) {
    overflow: hidden
}

figure {
    margin: 1em 40px
}

hr {
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    height: 0
}

pre {
    overflow: auto
}

code,
kbd,
pre,
samp {
    font-family: monospace, monospace;
    font-size: 1em
}

button,
input,
optgroup,
select,
textarea {
    color: inherit;
    font: inherit;
    margin: 0
}

button {
    overflow: visible
}

button,
select {
    text-transform: none
}

button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
    -webkit-appearance: button;
    cursor: pointer
}

button[disabled],
html input[disabled] {
    cursor: default
}

button::-moz-focus-inner,
input::-moz-focus-inner {
    border: 0;
    padding: 0
}

input {
    line-height: normal
}

input[type="checkbox"],
input[type="radio"] {
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0
}

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    height: auto
}

input[type="search"] {
    -webkit-appearance: textfield;
    -moz-box-sizing: content-box;
    box-sizing: content-box
}

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
    -webkit-appearance: none
}

fieldset {
    border: 1px solid #c0c0c0;
    margin: 0 2px;
    padding: 0.35em 0.625em 0.75em
}

legend {
    border: 0;
    padding: 0
}

textarea {
    overflow: auto
}

optgroup {
    font-weight: bold
}

table {
    border-collapse: collapse;
    border-spacing: 0
}

td,
th {
    padding: 0
}

html {
    font-size: 12px;
    line-height: 1.5;
    color: #000;
    background: #ddd;
    -moz-box-sizing: border-box;
    box-sizing: border-box
}


.home-venta{
  display:block;
  height: 50px;
  width: 50px;
  border-radius: 50%;
  border: 1px solid 024959;
  background:white;
  margin-top: 0px;
  margin-left: 5px;
  z-index: -1;
  margin-right: 5px;

}

.icono-home-venta{
  color: #008B8B;
  margin-top: -10px;
  margin-left: -10px;
}
*,
*:before,
*:after {
    -moz-box-sizing: inherit;
    box-sizing: inherit
}

[contenteditable]:hover,
[contenteditable]:focus,
input:hover,
input:focus {
    background: rgba(241, 76, 76, 0.1);
    outline: 1px solid #009688
}

.group:after,
.row:after,
.invoicelist-footer:after {
    content: "";
    display: table;
    clear: both
}

a {
    color: #009688;
    text-decoration: none
}

p {
    margin: 0
}

.row {
    position: relative;
    display: block;
    width: 100%;
    font-size: 0
}

.col,
.logoholder,
.me,
.info,
.bank,
[class*="col-"] {
    vertical-align: top;
    display: inline-block;
    font-size: 1rem;
    padding: 0 1rem;
    min-height: 1px
}

.col-4 {
    width: 25%
}

.col-3 {
    width: 33.33%
}

.col-2 {
    width: 50%
}

.col-2-4 {
    width: 75%
}

.col-1 {
    width: 100%
}

.text-center {
    text-align: center
}

.text-right {
    text-align: right
}

.control-bar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    background: #009688;
    color: white;
    line-height: 4rem;
    height: 4rem
}

.control-bar .slogan {
    font-weight: bold;
    font-size: 1.2rem;
    display: inline-block;
    margin-right: 2rem
}

.control-bar label {
    margin-right: 1rem
}

.control-bar a {
    margin: 0;
    padding: .5em 1em;
    background: rgba(255, 255, 255, 0.8)
}

.control-bar a:hover {
    background: #fff
}

.control-bar input {
    border: none;
    background: rgba(255, 255, 255, 0.2);
    padding: .5rem 0;
    max-width: 30px;
    text-align: center
}

.control-bar input:hover {
    background: rgba(255, 255, 255, 0.3)
}

.hidetax .taxrelated {
    display: none
}

.showtax .notaxrelated {
    display: none
}

.hidedate .daterelated {
    display: none
}

.showdate .notdaterelated {
    display: none
}


.logo {
    margin: 0 auto;
    width: auto;
    height: auto;
    border: none;
    fill: #009688
}
.contenedorDetalleVenta{
  margin-top: 80px;
}
.logoholder {
    width: 100%
}

.me {
    width: 50%
}

.info {
    width: 40%
}

.section {
    margin: 2rem 0 0
}

.smallme {
    display: inline-block;
    text-transform: uppercase;
    margin: 0 0 2rem 0;
    font-size: .9rem
}

.client {
    margin: 0 0 3rem 0
}

h1 {
    margin: 0;
    padding: 0;
    font-size: 2rem;
    color: #009688
}

.details input {
    display: inline;
    margin: 0 0 0 .5rem;
    border: none;
    width: 100px;
    min-width: 0;
    background: transparent;
    text-align: left
}


.invoice_detail{
  border: solid 1px #009688;
  padding:10px;
  height:25px;
  text-align:center
}

.rate:before,
.price:before,
.sum:before,
.tax:before,
#detalleTotal:before,
#total_tax:before {
    content: '$'
}

.invoicelist-body {
    margin: 1rem
}

.invoicelist-body table {
    width: 100%
}

.invoicelist-body thead {
    text-align: left;
    border-bottom: 1pt solid #666
}

.invoicelist-body td,
.invoicelist-body th {
    position: relative;
    padding: 1rem
}

.invoicelist-body tr:nth-child(even) {
    background: #ccc
}

.invoicelist-body tr:hover .removeRow {
    display: block
}

.invoicelist-body input {
    display: inline;
    margin: 0;
    border: none;
    width: 80%;
    min-width: 0;
    background: transparent;
    text-align: left
}

.invoicelist-body .control {
    display: inline-block;
    color: white;
    background: #009688;
    padding: 3px 7px;
    font-size: .9rem;
    text-transform: uppercase;
    cursor: pointer
}

.invoicelist-body .control:hover {
    background: #f36464
}

.invoicelist-body .newRow {
    margin: .5rem 0;
    float: left
}

.invoicelist-body .removeRow {
    display: none;
    position: absolute;
    top: .1rem;
    bottom: .1rem;
    left: -1.3rem;
    font-size: .7rem;
    border-radius: 3px 0 0 3px;
    padding: .5rem
}

.invoicelist-footer {
    margin: 1rem
}

.invoicelist-footer table {
    float: right;
    width: 25%
}

.invoicelist-footer table td {
    padding: 1rem 2rem 0 1rem;
    text-align: right
}

.invoicelist-footer table tr:nth-child(2) td {
    padding-top: 0
}

.invoicelist-footer table #detalleTotal {
    font-size: 2rem;
    color: #009688
}
#sinProductos {
    font-size: 2rem;
    color: #009688;
    margin-left: -50px;
}

.note {
    margin: 1rem
}

.hidenote .note {
    display: none
}

.note h2 {
    margin: 0;
    font-size: 1rem;
    font-weight: bold
}

footer {
    display: block;
    margin: 1rem 0;
    padding: 1rem 0 0
}

footer p {
    font-size: .8rem
}

@media print {
    html {
        margin: 0;
        padding: 0;
        background: #fff
    }
    body {
        width: 100%;
        border: none;
        background: #fff;
        color: #000;
        margin: 0;
        padding: 0
    }
    .control,
    .control-bar {
        display: none !important
    }
    [contenteditable]:hover,
    [contenteditable]:focus {
        outline: none
    }
}


/*# sourceMappingURL=main.css.map */

</style>
<script type="text/javascript">
  function copiarPortapapeles(id){

         var aux = document.createElement("input");
         var url = document.getElementById(id).innerHTML;
         var url = url.replace("amp;","");
         aux.setAttribute("value",url);
         document.body.appendChild(aux);
         aux.select();
         document.execCommand("copy");
         document.body.removeChild(aux);
       }
</script>