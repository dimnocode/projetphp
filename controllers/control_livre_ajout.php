<?php 

require_once 'core.php';

if( isset($_POST['livre'])){
	$livreId = $_POST['livre'];
	$livres=Model::load("livre");
	$search['id'] = $livreId;
	$livres->list(null,$search);
	if (isset($livres->data)) {
		if (isset($_SESSION['panier'])){
			$panier=$_SESSION['panier'];
		}
		if (isset($panier[$livreId])) {
			$panier[$livreId]['quantite']=$_POST['quantite'];
		} else {
			$panier[$livreId]['quantite'] += $_POST['quantite'];
		}
		echo $panier;
	}
	
}else{
	echo '0';
}

?>
