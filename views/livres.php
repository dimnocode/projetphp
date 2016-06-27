<?php
	require 'haut.php';
	?>

<h2>Livres</h2>

<form id="searchFormLivre" class="form-inline">
    <input type="text" id="searchTitre" class="form-control" name="titre" placeholder="Titre">
    <input type="text" id="searchAuteur" class="form-control" name="auteur" placeholder="Auteur">
    <input type="radio" class="searchActif" name="actif" value="tous"> Tous     
    <input type="radio" class="searchActif" name="actif" value="actifs" checked> Disponibles              
    <input type="radio" class="searchActif" name="actif" value="inactifs"> Indisponibles  
    <button id="refresh" type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
</form>

<br>
<button type="button" id="ajoutLivre" class="btn btn-primary btn-sm" ><span class="glyphicon glyphicon-plus"></span> Ajouter un livre</button>
<br>

<div id="loadForm"> <?php require('livres_form.php'); ?></div>
<div id="listeLivres"></div>


<?php
	require 'bas.php';
?>
