var  clicActiveLivre = function(){

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

var clicAjoutPanier = function(){
	var elem = $( this );
	$.post( '../controllers/control_livre_ajoutpanier.php', {livre : $(this).parent().parent().parent().find("td#LivreID").html(),quantite : $(this).parent().parent().find("input#nbarticle").val()})
  			.done(function(data) {
  					//on remet la quantité à 1 pour le prochain ajout au panier
  					elem.parent().parent().find("input#nbarticle").val(1);
  					}
  				);
}

//Modification livre
var clicModifLivre = function () {
    action='update';
    
    $('#lform')[0].reset();
    var $id = $(this).parent().parent().find("td#LivreID").html();
    $.ajax({
            type: 'POST',
            url: '../controllers/control_livre_find.php',
            data: {LivreID: $id}, 
            //dataType: 'JSON',
            cache: false,
            success: function(res) {
                res=JSON.parse(res);
                $('#LivreIDInput').val(res[0].LivreID)
                $('#titreInput').val(res[0].titre);
                $('#auteurInput').val(res[0].auteur);
                $('#prix_unitaireInput').val(res[0].prix_unitaire);
                                
                if(res[0].actif == '1'){                    
                    $('#actifCheck').prop('checked', true);
                    $('#btModalAjoutPanier').show();
                } else {
                	$('#btModalAjoutPanier').hide();
                }
                
                console.log(JSON.stringify(res));
                
            },
        });

    $('#myModal').modal('show');

};


//Afficher le formulaire d'ajout de livres
var clicAjoutLivre = function () {
    action='add';
    
    $('#lform')[0].reset();
    $('#btModalAjoutPanier').hide();
    $('#myModal').modal('show');

};

//Sauvegarder livre
var clicSaveLivre = function () {
    var $url;
    
    if(action == 'update'){$url = '../controllers/control_livre_update.php';}
    if(action == 'add'){$url = '../controllers/control_livre_create.php';}
    
    var $myForm = $('#lform');
    
    if ($myForm[0].checkValidity()) {
    
         $.ajax({
            url: $url,
            type: 'post',
            data: $('#lform').serialize(),
            success: function () {
                //alert($('#lform').serialize());
                $('#refresh').click();
            }
        });

        $('#myModal').modal('hide');
        
    }else {$('<button type="submit">').hide().appendTo($myForm).click().remove();}



};

var clicSearchLivre = function(){
	$.post( "livres_list.php", { titre: $('#searchTitre').val(), 
								auteur:$('#searchAuteur').val(),
								actif:$('input[name=actif]:checked', '#searchFormLivre').val()})
	
 	.done(function( data ) {
		$("#listeLivres").html(data);
		$("table#livres th#actif").hide();
		$("table#livres td#actif").hide();
	});
	return false;
}

var liveSearchLivre = function(){
	if ($('#searchTitre').val().length > 2 || $('#searchAuteur').val().length > 2 || ($('#searchTitre').val().length == 0 && $('#searchAuteur').val().length == 0)) {
		refresh();
	}
}

var clicAjoutPanierModal = function(){
	var elem = $( this );
	$.post( '../controllers/control_livre_ajoutpanier.php', {livre : $(this).parent().parent().find("input#LivreIDInput").val(),quantite : 1})
  			.done(function(data) {
  					elem.parent().find("#btclose").trigger("click");
  					}
  				);
}

$(document).on('submit', '#searchFormLivre', clicSearchLivre);
$(document).on('keyup', '#searchTitre', liveSearchLivre);
$(document).on('keyup', '#searchAuteur', liveSearchLivre);
$(document).on('click','#livres #actif',clicActiveLivre);
$(document).on('click','#livres #btAjoutPanier',clicAjoutPanier);
$(document).on('click', '#livres #modif', clicModifLivre);
$(document).on('click', '#saveLivre', clicSaveLivre);
$(document).on('click', '#ajoutLivre', clicAjoutLivre);
$(document).on('click', '#btModalAjoutPanier', clicAjoutPanierModal);
$(document).ready(function() {
	clicSearchLivre();
});

