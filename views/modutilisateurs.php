<?php
	require 'haut.php';
?>

<h2>Modification/Ajout utilisateur</h2>

<?php
    $last_post = $_POST;
?>

<form method="post" action="">
    <input type="button" value="Actif/Inactif"><br>
    <input type="text" name="nom" placeholder="Nom" value="<?php if(isset($last_post["nom"])){ echo $last_post["nom"];} ?>"><br>
    <input type="text" name="prenom" placeholder="Prenom" value="<?php if(isset($last_post["prenom"])){ echo $last_post["prenom"];} ?>"><br>
    <input type="text" name="utilisateur" placeholder="Utilisateur" value="<?php if(isset($last_post["utilisateur"])){ echo $last_post["utilisateur"];} ?>"><br>
    <input type="password" name="code" placeholder="Code" value="<?php if(isset($last_post["code"])){ echo $last_post["code"];} ?>"><br>

    <input type="submit" value="Envoyer">
</form>


<?php
	require 'bas.php';
?>