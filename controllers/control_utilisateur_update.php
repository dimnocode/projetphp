<?php 

require_once 'core.php';

if( isset($_POST['utilisateur'])){
	$utilisateurs=Model::load("utilisateur");
	$utilisateurs->utilisateur_desactiv($_POST['utilisateur']);
    
    
}else{
	echo '0';
}

?>
