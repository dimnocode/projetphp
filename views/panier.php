<?php
	require 'haut.php';
	?>

<h2>Votre panier</h2>


<?php
    
    if(isset($_SESSION["panier"])){
    	echo "<table id=\"panier\">";
    	echo "<tr><th>Titre</th><th>Auteur</th><th>Prix unitaire</th><th>Quantité</th></tr>";
		foreach($_SESSION["panier"] as $livre){
			echo "<tr>";
    		foreach($livre as $champs => $valeur){
    			echo "<td>".$valeur."</td>";
    		}
    		echo "</tr>";
    	}
    	echo "</table>";
    }else{
            echo 'Votre panier est vide';
        }
?>

<?php
	require 'bas.php';
?>
