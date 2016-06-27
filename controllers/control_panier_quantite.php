<?php 

require_once 'core.php';
if( isset($_POST['livreid']) && isset($_POST['quantite'])){
	$_SESSION['panier'][$_POST['livreid']]['quantite']=(int)$_POST['quantite'];
}

?>
