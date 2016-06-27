<?php
	require 'haut.php';
?>

<h2>Utilisateurs</h2>


<form id="searchFormUtilisateur" class="form-inline">
    <input type="text" id="searchNom" class="form-control" name="nom" placeholder="Nom">
    <input type="text" id="searchPrenom" class="form-control" name="prenom" placeholder="Prenom">
    <input type="radio" class="searchActif" name="actif" value="tous"> Tous     
    <input type="radio" class="searchActif" name="actif" value="actifs" checked> Actifs              
    <input type="radio" class="searchActif" name="actif" value="inactifs"> Incatifs      
	<button id="refresh" type="submit" class="btn btn-primary btn-sm">Rechercher</button>
    
</form>

<br>
<?php 
	$utilisateurs=Model::load("utilisateur");
	if (utilisateur::admin()){
		echo '<button type="button" id="ajoutUtilisateur" class="btn btn-primary btn-sm">Ajouter un utilisateur</button><br>';
	}
?>

<div id="loadForm"> <?php require('utilisateurs_form.php'); ?></div>
<div id="listeUtilisateurs"></div>

   
    
<?php
	require 'bas.php';
?>
