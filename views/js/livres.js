var  clicActive = function(){

	if($(this).attr('checked')){
		$destination='../controllers/control_livre_desactiv.php';
	} else {
        $destination='../controllers/control_livre_activ.php';
    }
	var elem = $( this );
	$.post( $destination, { livre : $(this).parent().parent().find("td#LivreID").html()} )
  			.done(function( data ) {
                    elem.empty();
	    			elem.html(data);
                   
  					}
  				);
};

$(document).on('click','#livres #actif',clicActive);
//$('#livres #actif').on('click',clicActive);

var  clicModif = function(){

	
$destination='../controllers/find_livre.php';
    
	var elem = $( this );
	$.post( $destination, { livre : $(this).parent().parent().find("td#LivreID").html()} )
  			.done(function( data ) {
                    elem.empty();
	    			elem.html(data);
                   
  					}
  				);
};

$(document).on('click','#livres #modif',clicModif);