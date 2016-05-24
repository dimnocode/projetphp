<?php
	require 'haut.php';
?>

<h2>Modification/Ajout livre</h2>

<?php
    $last_post = $_POST;
?>

<form method="post" action="">
    <input type="button" value="Actif/Inactif"><br>
    
    <input type="text" name="titre" placeholder="Titre" value="<?php if(isset($last_post["titre"])){ echo $last_post["titre"];} ?>"><br>
    <input type="text" name="auteur" placeholder="Auteur" value="<?php if(isset($last_post["auteur"])){ echo $last_post["auteur"];} ?>"><br>
    <input type="text" name="prix_unitaire" placeholder="Prix unitaire" value="<?php if(isset($last_post["prix_unitaire"])){ echo $last_post["prix_unitaire"];} ?>"><br>

    <input type="submit" value="Envoyer">
</form>


<?php
	require 'bas.php';
?>