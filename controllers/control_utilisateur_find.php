<?php 

require_once 'core.php';

//$_POST = array("utilisateur"=>"dkr123");


if( isset($_POST['utilisateur']) ){
    
    $utilisateurs=Model::load("utilisateur");
    //var_dump($_POST);
	echo $utilisateurs->utilisateur_find($_POST);
    
    
}else{
	echo '0';
}

?>
