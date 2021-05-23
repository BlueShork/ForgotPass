<?php 
session_start();
$pseudo = $_SESSION['pseudo'];
$password = $_SESSION['password'];
include('../config/config.php');
$id = $_GET['id'];
$req = $bdd->prepare('DELETE FROM quetes_liens WHERE id = :id');
$req->execute(array(
	':id' => $id,
));

header("Location: glots.php?pseudo=$pseudo&password=$password");
?>