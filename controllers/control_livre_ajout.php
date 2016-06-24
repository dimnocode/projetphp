<?php 

require_once 'core.php';
if( isset($_POST['livre'])){
	$livreId = $_POST['livre'];
	$livres=Model::load("livre");
	$search['LivreId'] = (int)$livreId;
	$livres->list(null,$search);
	if (isset($livres->data)) {
		if (isset($_SESSION['panier'])){
			$panier=$_SESSION['panier'];
		}
		else {
			$panier=[];
		}
		if (isset($panier[$livreId])) {
			$panier[$livreId]['quantite'] += (int)$_POST['quantite'];
		} else {
			foreach($livres->data[0] as $livreClef => $livreElement){
				$panier[$livreId][$livreClef]=$livreElement;
			}
			$panier[$livreId]['quantite']=(int)$_POST['quantite'];
			var_dump($panier);
		}
	}
	
}else{
	echo '0';
}

?>
