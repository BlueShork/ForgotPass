<?php 
session_start();
if(!empty($_SESSION['pseudoadmin'])){
	include('../config/config.php');
	$req = $bdd->prepare('INSERT INTO lots_partenariat (nb, lien, int_participation) VALUES (:nb, :lien,:int_participation)');
	$req->execute(array(
		":nb" => $_POST['nb'],
		":lien" => $_POST['lien'],
		":int_participation" => $_POST['int_participation'],
	));
	header("Location: givesaway.php?ajout=sucess");
}
else{
	echo 'non';
}

?>