<?php 

require_once 'core.php';

//s$_POST = array("utilisateur"=>"dkr123", "code"=>"dkr123", "nom"=>"Krasucki", "prenom"=>"Dimitri", "admin"=>1, "actif"=>1);


if( isset($_POST['utilisateur']) && isset($_POST['code']) && isset($_POST['nom']) && isset($_POST['prenom'])){
    
    if(isset($_POST['admin'])){
        $_POST['admin'] = 1;
    } else {$_POST['admin']=2;}
    
    if(isset($_POST['actif'])){
        $_POST['actif'] = 1;
    } else {$_POST['actif']=2;}
    
	$utilisateurs=Model::load("utilisateur");
    var_dump($_POST);
	$utilisateurs->utilisateur_update($_POST);
    //echo 'ok';
    
}else{
	echo '0';
}

?>