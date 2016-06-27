<?php 

require_once 'core.php';

if( isset($_POST['utilisateur']) && isset($_POST['code']) && isset($_POST['nom']) && isset($_POST['prenom'])){
    
	if ((strlen($_POST['utilisateur']) >= 4) 
		&& (strlen($_POST['nom']) >= 4)
		&& (strlen($_POST['prenom']) >= 4)) {
		
		$utilisateurs=Model::load("utilisateur");
		if ($utilisateurs->utilisateur_exist($_POST)) {
			echo "L'utilisateur existe déjà";
		} else {
    		if(isset($_POST['admin'])){
        		$_POST['admin'] = 1;
    		} else {$_POST['admin']=2;}
    
    		if(isset($_POST['actif'])){
        		$_POST['actif'] = 1;
    		} else {$_POST['actif']=2;}
    
			
			$utilisateurs->utilisateur_create($_POST);
		}
	} else {
		echo "L'utilisateur, le nom et le prénom doivent avoir minimum 4 caractères";
	}
    
}else{
	echo '0';
}

?>
