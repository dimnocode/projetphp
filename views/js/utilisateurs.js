
//Activer et désactiver un utlisateur
var clicActive = function () {

    if ($(this).attr('checked')) {
        var $destination = '../controllers/control_utilisateur_desactiv.php';
    } else {
        var $destination = '../controllers/control_utilisateur_activ.php';
    }
    var elem = $(this);
    $.post($destination, {
        utilisateur: $(this).parent().parent().find("td#utilisateur").html()
    }).done(function (data) {
        $('#refresh').click();
    });
};

//Modification utilisateur
var clicModif = function () {
    action='update';
    $.ajax({
            type: 'POST',
            url: '../controllers/control_utilisateur_find.php',
            data: {utilisateur: $(this).parent().parent().find("td#utilisateur").html()}, 
            //dataType: 'JSON',
            cache: false,
            success: function(res) {
                res=JSON.parse(res);
                $('#utilisateurInput').val(res[0].utilisateur)
                                        .prop('disabled', true);
                $('#codeInput').val(res[0].code);
                $('#nomInput').val(res[0].nom);
                $('#prenomInput').val(res[0].prenom);
                
                if(res[0].admin == '1'){                    
                    $('#adminCheck').prop('checked', true);
                }
                
                if(res[0].actif == '1'){                    
                    $('#actifCheck').prop('checked', true);
                }
                
                console.log(JSON.stringify(res));
                
            },
        });

    $('#myModal').modal('show');

};



//Afficher le formulaire d'ajout d'utilisateur
var clicAjoutUtilisateur = function () {
     action='add';
    $('#utilisateurInput').prop('disabled', false);    
    $('#uform')[0].reset();  
    
    $('#myModal').modal('show');

};


//Sauvegarder utilisateur
var clicSaveUtilisateur = function () {
    var $url;
    
    if(action == 'update'){$url = '../controllers/control_utilisateur_update.php';}
    if(action == 'add'){$url = '../controllers/control_utilisateur_create.php';}
    
    //alert(action+$url);
    
    var $myForm = $('#uform');
    
    if ($myForm[0].checkValidity()) {
        $('#utilisateurInput').prop('disabled', false);
         $.ajax({
            url: $url,
            type: 'post',
            data: $('#uform').serialize(),
            success: function () {
                //alert($('#uform').serialize());
                $('#refresh').click();
            }
        });

        $('#myModal').modal('hide');
        
    }else {$('<button type="submit">').hide().appendTo($myForm).click().remove();}



};

var userExist = function(){
    
    $destination = '../controllers/control_utilisateur_exist.php';
    
    var elem = $(this);
    $.post($destination, { utilisateur: $(this).val() }).done(function (data) {
       if(data == '1'){
           $('#alertZone').html('<div class="alert alert-danger"><strong>Attention!</strong> L\'utilisateur existe déjà </div>');
       }else {$('#alertZone').empty();}
        
    });

};


$(document).on('click', '#utilisateurs #actif', clicActive);
$(document).on('click', '#utilisateurs #modif', clicModif);
$(document).on('click', '#ajoutUtilisateur', clicAjoutUtilisateur);
$(document).on('click', '#saveUtilisateur', clicSaveUtilisateur);
$(document).on('focusout', '#utilisateurInput', userExist);