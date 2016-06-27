<?php
require_once 'core.php';
$total=0;
foreach($_SESSION["panier"] as $livreid => $livre){
	$total += ($livre['prix_unitaire'] * $livre['quantite']);
}
echo $total;
?>