<?php 



require_once 'core.php';

//$_POST = array("titre"=>"bbb", "auteur"=>"dsfsdfsdf", "prix_unitaire"=>23, "actif"=>1);

if( isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['prix_unitaire'])){
    
    if(isset($_POST['actif'])){
        $_POST['actif'] = 1;
    } else {$_POST['actif']=2;}
    
	$livres=Model::load("livre");
    var_dump($_POST);
	$livres->livre_create($_POST);
    //echo 'ok';
    
}else{
	echo '0';
}

?>
