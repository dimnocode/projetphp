var  clicActive = function(){

	if($(this).attr('checked')){
		$destination='../controllers/control_utilisateur_desactiv.php';
	} else {
        $destination='../controllers/control_utilisateur_activ.php';
    }
	var elem = $( this );
	$.post( $destination, { utilisateur : $(this).prev().attr('value')} )
  			.done(function( data ) {
                
	    			alert(data);
	    			elem.empty();
	    			elem.html(data);
  					}
  				);
};

$(document).on('click','#utilisateurs #actif',clicActive);
//$('#utilisateurs #actif').on('click',clicActive);
