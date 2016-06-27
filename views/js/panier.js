
var changeQuantite = function () {
    $.post('../controllers/control_panier_quantite.php', {
        livreid: $(this).parent().parent().find("#LivreId").val(),
        quantite: $(this).val()}).done(function() {
        	$.get('../controllers/control_calcul_total.php').done(function(data){
        		$('#total').html(data);
        	});       
		}
	);
};

$(document).on('change', '#panier #quantite', changeQuantite);

