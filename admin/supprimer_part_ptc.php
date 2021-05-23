<?php 
session_start();
include('../config/config.php');
$id = $_GET['id'];
$pseudo = $_GET['pseudo'];
$dates_quetes = $_GET['dates_quetes'];


$reqe = $bdd->prepare('DELETE FROM quetes_liens WHERE pseudo = :pseudo AND dates_quetes = :dates_quetes');
$reqe->execute(array(
	':pseudo' => $pseudo,
	':dates_quetes' => $dates_quetes,
));


$reqe = $bdd->prepare('DELETE FROM ptc_verif WHERE pseudo = :pseudo AND dates_quetes = :dates_quetes');
$reqe->execute(array(
	':pseudo' => $pseudo,
	':dates_quetes' => $dates_quetes,
));


header("Location: quetes.php?delete=success");
?>