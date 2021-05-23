<?php 
session_start();
include('../config/config.php');
$id = $_GET['id'];
$pseudo = $_GET['pseudo'];
$reqs = $bdd->prepare('DELETE FROM paiement_quetes WHERE id = :id');
$reqs->execute(array(
	':id' => $id,
));


header("Location: demandes.php?delete=success");
?>