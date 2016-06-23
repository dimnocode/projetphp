<?php	
	require_once "../controllers/core.php";
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
	<?php
	if (isset($_SESSION['UTILISATEUR'])) {
	  require 'header.php';
	}
	else {
		header('Location: login.php');
		exit();
	}
	?>