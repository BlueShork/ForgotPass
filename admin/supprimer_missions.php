<?php 
session_start();
$pseudo = $_SESSION['pseudo'];
include('../config/config.php');
$id = $_GET['id'];
$req = $bdd->prepare('DELETE FROM missions_inscription WHERE id = :id');
$req->execute(array(
	':id' => $id,
));

header("Location: givesaway.php?delete=sucess");
?>