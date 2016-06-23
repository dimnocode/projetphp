<?php
require_once "../controllers/core.php";
require_once ('../models/utilisateur.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo basename($_SERVER['PHP_SELF']); ?></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<h2 class="text-center login-title">Identifiez-vous</h2>
				<form action="" method="post">
					<label for="login">Utilisateur</label> 
					<input type="text" class="form-control" name="login" id="login" value="" required=True /> 
					<label for="password">Mot de passe&nbsp;&nbsp;</label> 
					<input type="password" class="form-control" name="password" id="password" value=""
						required=True /> 
					<br>
					<input class="btn btn-lg btn-primary btn-block"
						type="submit" name="submit" value="Connexion" />					
				</form>
			</div>
		</div>	
       
<?php
if (isset ( $_POST ['login'] ) && isset ( $_POST ['password'] )) {
	if (utilisateur::auth ( $_POST ['login'], $_POST ['password'] )) {
		$_SESSION ['UTILISATEUR'] = $_POST ['login'];
		header ( 'Location: accueil.php' );
		exit ();
	}
}

require_once 'bas.php';
?>
