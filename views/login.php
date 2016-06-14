<?php
	require_once "../controllers/core.php";
	require_once('../models/utilisateur.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo basename($_SERVER['PHP_SELF']); ?></title>
	<link rel="stylesheet" href="page.css">
</head>
<body>
       <form action="" method="post">
            <label for="login">Utilisateur</label> 
            <input type="text" name="login" id="login" value="" required=True/>
       
          <label for="password">Mot de passe&nbsp;&nbsp;</label>
          <input type="password" name="password" id="password" value="" required=True/> 
        
        <input class="btn btn-large btn-info" type="submit" name="submit" value="Connexion" />
    </form>   
<?php
	if (isset($_POST['login']) && isset($_POST['password'])) {
		if (utilisateur::auth($_POST['login'],$_POST['password']))
		{
			$_SESSION['UTILISATEUR'] = $_POST['login'];
			header('Location: accueil.php');
			exit();
		}
    	
	}
    
	require_once 'bas.php';
?>
