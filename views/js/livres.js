var  clicActive = function(){

	if($(this).attr('checked')){
		$destination='../controllers/control_livre_desactiv.php';
	} else {
        $destination='../controllers/control_livre_activ.php';
    }
	var elem = $( this );
	$.post( $destination, { livre : $(this).parent().parent().find("td#LivreID").html()} )
  			.done(function( data ) {
                    //Fonction .done peut être retirée
                    //elem.empty();
	    			//elem.html(data);
                   
  					}
  				);
};

var clicAjout = function(){
	var elem = $( this );
	$.post( '../controllers/control_livre_ajout.php', {livre : $(this).parent().parent().parent().find("td#LivreID").html(),quantite : $(this).parent().parent().find("input#nbarticle").val()})
  			.done(function(data) {
  					//on remet la quantité à 1 pour le prochain ajout au panier
  					elem.parent().parent().find("input#nbarticle").val(1);
  					}
  				);
}

var  clicModif = function(){

	
$destination='../controllers/find_livre.php';
    
	var elem = $( this );
	$.post( $destination, { livre : $(this).parent().parent().find("td#LivreID").html()} )
  			.done(function( data ) {
                    //Fonction .done peut être retirée
                    //elem.empty();
	    			//elem.html(data);
                   
  					}
  				);
};


//Afficher le formulaire d'ajout de livres
var clicAjoutLivre = function () {

    $('#myModal').modal('show');

};

//Sauvegarder livre
var clicSaveLivre = function () {

        $.ajax({
            url: '../controllers/control_livre_create.php',
            type: 'post',
            data: $('#lform').serialize(),
            success: function () {
                alert("Form sent")
            }
        });

    $('#myModal').modal('hide');

};

$(document).on('click','#livres #actif',clicActive);
$(document).on('click','#livres #btajout',clicAjout);
$(document).on('click', '#livres #modif', clicAjoutLivre);
$(document).on('click', '#saveLivre', clicSaveLivre);