<?php 
session_start();
if(!empty($_SESSION['pseudoadmin'])){
	include('../config/config.php');
	$req = $bdd->prepare('INSERT INTO lots (name, paiement, auteur, int_participation) VALUES (:name, :paiement, :auteur, :int_participation)');
	$req->execute(array(
		':name' => $_POST['name'],
		':paiement' => $_POST['paiement'],
		':auteur' => $_POST['auteur'],
		':int_participation' => $_POST['int_participation'],
	));
	header("Location: givesaway.php?ajout=sucess");
}
else{
	echo 'non';
}

?>