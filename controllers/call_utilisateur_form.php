<?php

    if (isset($_POST['utilisateur'])) {
                        
        echo $_POST['utilisateur'];
        $action = "Ajout";
        var_dump($_POST);
    
    }else {$action = "Modification";}
                
    require '../views/utilisateurs_form.php';

?>