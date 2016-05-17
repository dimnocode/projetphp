<?php
	require 'haut.php';
	?>

<h2>Livres</h2>

<?php
    $last_post = $_POST;
?>

<form method="post" action="">
    <input type="text" name="titre" placeholder="Titre" value="<?php if(isset($last_post["titre"])){ echo $last_post["titre"];} ?>">
    <input type="text" name="auteur" placeholder="auteur" value="<?php if(isset($last_post["auteur"])){ echo $last_post["auteur"];} ?>">
    
    <input type="radio" name="actif" value="tous"       <?php if(isset($last_post["actif"]) && $last_post["actif"] == "tous"){ echo 'checked';} ?>          > Tous     
    <input type="radio" name="actif" value="actifs"     <?php if(!isset($last_post["actif"]) || $last_post["actif"] == "actifs"){ echo 'checked';} ?>       > Disponibles              
    <input type="radio" name="actif" value="inactifs"   <?php if(isset($last_post["actif"]) && $last_post["actif"] == "inactifs"){ echo 'checked';} ?>      > Indisponibles  
    
    <input type="submit" value="Envoyer">
</form>


<?php
    $livres=Model::load("livre");

    //Si le champs actif est setté
    if(isset($_POST["actif"])){ 
            
        //Si le champs actif a comme valeur "actifs"
        if($_POST["actif"] == "actifs"){                
            $_POST["actif"] = 1; 
        }
        //Si le champs actif a comme valeur "inactifs"
        if($_POST["actif"] == "inactifs"){
            $_POST['actif'] = 2;
        }
            
        //Si le champs actif a comme valeur "tous"
        if($_POST["actif"] == "tous" ){
             unset($_POST["actif"]);  
        }
    }else{
            $_POST["actif"] = 1;
        }
    
    $livres->list(null, $_POST);
    echo $livres->rtv_Table("livre");
?>

<?php
	require 'bas.php';
?>