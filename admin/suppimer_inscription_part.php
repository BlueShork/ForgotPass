<?php 
session_start();
include('../config/config.php');
$id = $_GET['id'];
$dates_inscription = $_GET['dates_inscription'];
$reqs = $bdd->prepare('DELETE FROM inscription_verif WHERE id = :id');
$reqs->execute(array(
	':id' => $id,
));


$reqe = $bdd->prepare('DELETE FROM participations_inscription WHERE dates_inscription = :dates_inscription');
$reqe->execute(array(
	':dates_inscription' => $dates_inscription,
));


header("Location: inscription_verif.php?delete=success");
?>