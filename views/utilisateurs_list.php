<?php
require_once "../controllers/core.php";

if (isset($_SESSION['UTILISATEUR'])) {
		
        //Si le champs actif est setté
        if(isset($_POST["actif"])){ 
            
            //Si le champs actif a comme valeur "actifs"
            if($_POST["actif"] == "actifs"){                
                $_POST["actif"] = 1; 
            }
            //Si le champs actif a comme valeur "inactifs"
            if($_POST["actif"] == "inactifs"){
                $_POST['actif'] = 2;
            }
            
            //Si le champs actif a comme valeur "tous"
            if($_POST["actif"] == "tous" ){
                unset($_POST["actif"]);  
            }
        }else{
            $_POST["actif"] = 1;
        }
    $utilisateurs=Model::load("utilisateur");
    $utilisateurs->list("utilisateur,nom,prenom,admin,actif", $_POST);
    echo $utilisateurs->rtv_Table("utilisateur");
}
?>