<?php
	require 'haut.php';
    require_once '../models/utilisateur.php'
?>
       <form action="" method="post">
            <label for="login">Utilisateur</label> 
            <input type="text" name="login" id="login" value="" required=True/>
       
          <label for="password">Mot de passe&nbsp;&nbsp;</label>
          <input type="password" name="password" id="password" value="" required=True/> 
        
        <input class="btn btn-large btn-info" type="submit" name="submit" value="Connexion" />
    </form>   
<?php
    $ESSION['userid'] = utilisateur::auth($POST['login'],$POST['password']);
    
    
	require 'bas.php';
?>
