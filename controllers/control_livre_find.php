<?php 

require_once 'core.php';

//$_POST = array("LivreID"=>"1");


if( isset($_POST['LivreID']) ){
    
    $livres=Model::load("livre");
    //var_dump($_POST);
	echo $livres->livre_find($_POST);
    
    
}else{
	echo '0';
}

?>