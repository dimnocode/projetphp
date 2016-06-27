<?php 

require_once 'core.php';

if( isset($_POST['LivreID']) ){
    
    $livres=Model::load("livre");
	echo $livres->livre_find($_POST);
    
    
}else{
	echo '0';
}

?>