<?php 

include('../config/config.php');

$pseudo = $_GET['pseudo'];

$req = $bdd->prepare('UPDATE inscription SET ban = 1 WHERE pseudo = :pseudo');
$req->execute(array(

	':pseudo' => $pseudo,

));

header('Location: account_details.php?ban=sucess');

?>