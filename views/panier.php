<?php
	require 'haut.php';
	?>

<h2>Votre panier</h2>


<?php
    
    if(isset($_SESSION["panier"])){
    	echo "<table class=\"table table-striped\" id=\"panier\">";
    	echo "<tr><th>Titre</th><th>Auteur</th><th>Prix unitaire</th><th>Quantité</th><th></th></tr>";
		foreach($_SESSION["panier"] as $livreid => $livre){
			echo "<tr>";
    		foreach($livre as $champs => $valeur){
    			if ($champs != 'quantite') {	
    				echo "<td>".$valeur."</td>";
    			} else {
    			   echo "
    					 <td>
    					 	<input type=\"number\" class=\"form-control input-sm\" id=\"quantite\" name=\"quantite\" value=\"".$valeur."\" min=\"1\" max=\"100\">
    					 </td>";
    			}
    		}
    		echo "<td>
    			  	<form action=\"../controllers/control_panier_supprime.php\" method=\"post\">
    					<input type=\"hidden\" id=\"LivreId\" name=\"livreid\" value=\"".$livreid."\"/>
    					<button class=\"btn btn-primary\" type=\"submit\" id=\"btsupprime\"><span class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"></span> Supprimer</button>
    				</form>
    				</td>";		 			
    		echo "</tr>";
    	}
    	echo "<tr><td colspan=\"2\">TOTAL:</td><td id=\"total\">";
    	require '../controllers/control_calcul_total.php'; 
    	echo "</td><td colspan=\"2\"><a href= \"../controllers/control_valide_vente.php\"><button class=\"btn btn-primary\"><span class=\"glyphicon glyphicon-check\" aria-hidden=\"true\"></span> Valider la vente</button></a></td></tr>";
    	echo "</table>";
    	
    }else{
            echo 'Votre panier est vide';
        }
?>

<?php
	require 'bas.php';
?>
