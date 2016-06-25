//Activer et désactiver un utlisateur
var clicActive = function () {

    if ($(this).attr('checked')) {
        $destination = '../controllers/control_utilisateur_desactiv.php';
    } else {
        $destination = '../controllers/control_utilisateur_activ.php';
    }
    var elem = $(this);
    $.post($destination, {
        utilisateur: $(this).parent().parent().find("td#utilisateur").html()
    }).done(function (data) {

        elem.empty();
        elem.html(data);
    });
};

//Modification utilisateur
var clicModif = function () {


    $destination = '../controllers/call_utilisateur_form.php';

    var elem = $(this);
    $.post($destination, {
            utilisateur: $(this).parent().parent().find("td#utilisateur").html()
        })
        .done(function (data) {

            elem.empty();
            elem.html(data);
        });
    $('#myModal').modal('show');

};



//Afficher le formulaire d'ajout d'utilisateur
var clicAjoutUtilisateur = function () {

    $('#myModal').modal('show');

};






//Sauvegarder utilisateur
var clicSaveUtilisateur = function () {

        $.ajax({
            url: '../controllers/control_utilisateur_create.php',
            type: 'post',
            data: $('#uform').serialize(),
            success: function () {
                alert("Form sent")
            }
        });

    $('#myModal').modal('hide');

};


$(document).on('click', '#utilisateurs #actif', clicActive);
$(document).on('click', '#utilisateurs #modif', clicModif);
$(document).on('click', '#utilisateurs #modif', clicAjoutUtilisateur);
$(document).on('click', '#saveUtilisateur', clicSaveUtilisateur);

$(document).on('click', '#livres #modif', clicAjoutUtilisateur);
$(document).on('click', '#saveLivre', clicSaveUtilisateur);