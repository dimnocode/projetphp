<?php 

require_once 'core.php';
if( isset($_POST['livreid'])){
	unset($_SESSION['panier'][$_POST['livreid']]);
	if (empty($_SESSION['panier'])) {
       unset($_SESSION['panier']);
    }
}
header ( 'Location: ../views/panier.php' );

?>
