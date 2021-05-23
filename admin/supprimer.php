<?php 
session_start();
$pseudo = $_SESSION['pseudo'];
$password = $_SESSION['password'];
include('../config/config.php');
$id = $_GET['id'];
$reponse = $bdd->prepare('DELETE FROM lots WHERE id = :id');
$reponse->execute(array(
	':id' => $id,
));
$reponse = $bdd->prepare('DELETE FROM participations WHERE id_participations = :id');
$reponse->execute(array(
	':id_participations' => $id,
));
header("Location: givesaway.php");

?>