<?php 

require_once 'core.php';
if( isset($_POST['livre'])){
	$livreId = $_POST['livre'];
	$livres=Model::load("livre");
	$search['LivreId'] = (int)$livreId;
	$livres->list("titre,auteur,prix_unitaire",$search);
	if (isset($livres->data)) {
		if (isset($_SESSION['panier']) && isset($_SESSION['panier'][$livreId])) {
			$_SESSION['panier'][$livreId]['quantite'] += (int)$_POST['quantite'];
		} else {
			foreach($livres->data[0] as $livreClef => $livreElement){
				$_SESSION['panier'][$livreId][$livreClef]=$livreElement;
			}
			$_SESSION['panier'][$livreId]['quantite']=(int)$_POST['quantite'];
		}
	}
	
}else{
	echo '0';
}

?>
