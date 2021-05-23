<?php 
session_start();
if(!empty($_SESSION['pseudoadmin'])){
	include('../config/config.php');
	$req = $bdd->prepare('INSERT INTO giveaways_journalier (nom, lien, gains, dates_finish) VALUES (:nom, :lien, :gains, :dates_finish)');
	$req->execute(array(
		':nom' => $_POST['nom'],
		':lien' => $_POST['lien'],
		':gains' => $_POST['gains'],
		':dates_finish' => $_POST['dates_finish'],
	));
	header("Location: givesaway.php?ajout=sucess");
}
else{
	echo 'non';
}

?>