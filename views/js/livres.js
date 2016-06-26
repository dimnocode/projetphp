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
	$.post( '../controllers/control_livre_ajout.php', {livre : $(this).parent().parent().parent().find("td#LivreID").html(),quantite : $(this).parent().parent().find("input#nbarticle").val()})
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

$(document).on('click','#livres #actif',clicActiveLivre);
$(document).on('click','#livres #btajout',clicAjoutPanier);
$(document).on('click', '#livres #modif', clicModifLivre);
$(document).on('click', '#saveLivre', clicSaveLivre);
$(document).on('click', '#ajoutLivre', clicAjoutLivre);