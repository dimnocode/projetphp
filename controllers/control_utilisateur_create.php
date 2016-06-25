<?php 

require_once 'core.php';

//$_POST = array("utilisateur"=>"bbb", "code"=>"dsfsdfsdf", "nom"=>"dfdsf3", "prenom"=>"fdsfsdffd", "admin"=>1, "actif"=>1);


if( isset($_POST['utilisateur']) && isset($_POST['code']) && isset($_POST['nom']) && isset($_POST['prenom'])){
    
    if(isset($_POST['admin'])){
        $_POST['admin'] = 1;
    } else {$_POST['admin']=2;}
    
    if(isset($_POST['actif'])){
        $_POST['actif'] = 1;
    } else {$_POST['actif']=2;}
    
	$utilisateurs=Model::load("utilisateur");
    var_dump($_POST);
	$utilisateurs->utilisateur_create($_POST);
    //echo 'ok';
    
}else{
	echo '0';
}

?>
