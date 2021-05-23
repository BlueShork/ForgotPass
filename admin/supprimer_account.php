<?php 

$pseudo = $_GET['pseudo'];
include('../config/config.php');
$req = $bdd->prepare('DELETE FROM inscription WHERE pseudo = :pseudo');
$req->execute(array(
':pseudo' => $pseudo,

));


header('Location: account_details.php?delete=success');

?>