<?php 
session_start();
$pseudo = $_SESSION['pseudoadmin'];
include('../config/config.php');
$req = $bdd->prepare('SELECT *  FROM connexion_staff WHERE pseudo = :pseudo');
$req->execute(array(
    ':pseudo' => $pseudo,
));

$resultat = $req->fetch();
$comparaison = 'Administrateur';
if($resultat['roles'] != $comparaison){

echo 'Vous avez tenter de contourner notre système, le directeur est avertit de votre tentative.';

}
else{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Dashboard - Admin</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="index.css">
			<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		</head>
		<body>
			<?php


$montant = $_POST['montant'];
$pseudo = $_GET['pseudo'];
$email = $_GET['email'];
$message = 'Fournis par le staff';

	$req = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email, NOW(), :gains, :nom_quetes)');
	$req->execute(array(
		':pseudo' => $pseudo,
		':email' => $email,
		':gains' => $montant,
		':nom_quetes' => $message,
 	));

	header('Location: account_details.php?pseudo=azert&paye=success');

?>
		</body>
	</html>
	<?php
}


?>
