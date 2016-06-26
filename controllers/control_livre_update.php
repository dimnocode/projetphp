<?php 

require_once 'core.php';

//$_POST = array("LivreID"=>6, "titre"=>"Croc blanc", "auteur"=>"Jacques Londre", "prix_unitaire"=>12, "actif"=>1);


if( isset($_POST['LivreID']) && isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['prix_unitaire'])){
    

    if(isset($_POST['actif'])){
        $_POST['actif'] = 1;
    } else {$_POST['actif']=2;}
    
	$livres=Model::load("livre");
    var_dump($_POST);
	$livres->livre_update($_POST);
    //echo 'ok';
    
}else{
	echo '0';
}

?>