jQuery(document).ready(function($) {
	if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
});
/*=============================================
CORRECCIÓN BOTONERAS OCULTAS BACKEND	
=============================================*/

if(window.matchMedia("(max-width:767px)").matches){
	
	$("body").removeClass('sidebar-collapse');

}else{

	$("body").addClass('sidebar-collapse');
}

