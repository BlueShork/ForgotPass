<?php 
session_start();
if(!empty($_SESSION['pseudoadmin'])){
	include('../config/config.php');
	$req = $bdd->prepare('INSERT INTO quetes (nom, remise, liens, limite_clicks, ban) VALUES (:nom, :remise, :liens, :limite_clicks, :ban)');
	$req->execute(array(
		':nom' => htmlspecialchars($_POST['name']),
		':remise' => htmlspecialchars($_POST['paiement']),
		':liens' => htmlspecialchars($_POST['auteur']),
		':limite_clicks' => htmlspecialchars($_POST['click']),
		':ban' => htmlspecialchars($_POST['ban']),
    ));
    header('Location: givesaway.php?edit=success');
}
else{
	echo 'non';
}

?>