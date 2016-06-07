<?php 

require_once 'core.php';

if( isset($_POST['livre'])){
    
	$livres=Model::load("livre");
	$livres->livre_desactiv($_POST['livre']);
    
    
}else{
	echo '0';
}

?>
