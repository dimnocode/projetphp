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

var clicAjout = function(){
	var elem = $( this );
	$.post( '../controllers/control_livre_ajout.php', {livre : $(this).parent().parent().find("td#LivreID").html(),quantite : $(this).parent().parent().find("td#nbarticle").value()})
  			.done(function() {
	    			elem.html('0');
  					}
  				);
}

$(document).on('click','#livres #actif',clicActive);
$(document).on('click','#livres #btajout',clicAjout);
//$('#livres #actif').on('click',clicActive);

var  clicModif = function(){

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

$(document).on('click','#livres #modif',clicModif);