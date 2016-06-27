<?php
require_once "../controllers/core.php";
if (isset($_SESSION['UTILISATEUR'])) {
	 

    $livres=Model::load("livre");

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
    
    $livres->list(null, $_POST);
    echo $livres->rtv_Table("livre");
	}
?>