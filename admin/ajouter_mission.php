<?php 
session_start();
if(!empty($_SESSION['pseudoadmin'])){
	include('../config/config.php');
	$req = $bdd->prepare('INSERT INTO missions_inscription (nom, description, lien, gains, ban) VALUES (:nom, :remise, :liens, :limite_clicks, :ban)');
	$req->execute(array(
		':nom' => htmlspecialchars($_POST['name']),
		':description' => htmlspecialchars($_POST['description']),
		':lien' => htmlspecialchars($_POST['lien']),
		':gains' => htmlspecialchars($_POST['gains']),
		':ban' => htmlspecialchars($_POST['ban']),
    ));
    header('Location: givesaway.php?edit=success');
}
else{
	echo 'non';
}

?>