<?php
	require 'haut.php';
?>

<h2>Utilisateurs</h2>

<?php
    $last_post = $_POST;
?>

<form method="post" action="" class="form-inline">
    <input type="text" class="form-control" name="nom" placeholder="Nom" value="<?php if(isset($last_post["nom"])){ echo $last_post["nom"];} ?>">
    <input type="text" class="form-control" name="prenom" placeholder="Prenom" value="<?php if(isset($last_post["prenom"])){ echo $last_post["prenom"];} ?>">

    <input type="radio" name="actif" value="tous"       <?php if(isset($last_post["actif"]) && $last_post["actif"] == "tous"){ echo 'checked';} ?>          > Tous     
    <input type="radio" name="actif" value="actifs"     <?php if(!isset($last_post["actif"]) || $last_post["actif"] == "actifs"){ echo 'checked';} ?>       > Actifs              
    <input type="radio" name="actif" value="inactifs"   <?php if(isset($last_post["actif"]) && $last_post["actif"] == "inactifs"){ echo 'checked';} ?>      > Incatifs      

    <input type="submit" class="btn btn-primary btn-sm" value="Rechercher">
</form>

<br>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Ajouter un utilisateur</button>
<br>

<div id="loadForm"> <?php require('utilisateurs_form.php'); ?></div>
<?php
    
    $utilisateurs=Model::load("utilisateur");
     
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
    
    $utilisateurs->list(null, $_POST);
    echo $utilisateurs->rtv_Table("utilisateur");
   
    

	require 'bas.php';
?>
