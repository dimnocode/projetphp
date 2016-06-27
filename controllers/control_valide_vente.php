<?php
require_once 'core.php';
$ventes=Model::load("vente");
$vente_details=Model::load("vente_details");
$idvente = $ventes->vente_create($_SESSION ['UTILISATEUR']);

if ($idvente > 0) {
	$errmsg='';
	foreach($_SESSION["panier"] as $livreid => $livre){		
		if ($vente_details->vente_details_create($livreid,$livre['prix_unitaire'],$livre['quantite'],$idvente) < 1) {
			$errmsg .= "Erreur lors de l'enregistrement de la vente du livre id: ".$livreid."<br>";
		}		
	}
	if (strlen($errmsg) > 0) {
		echo $errmsg;
	} else {
		unset($_SESSION["panier"]);
		header ( 'Location: ../views/livres.php' );
	}
} else {
	echo 'Erreur lors de la création de la vente';
}
?>