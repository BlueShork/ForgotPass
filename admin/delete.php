<?php 

$id = $_GET['id'];
include('../config/config.php');
$req = $bdd->prepare('DELETE FROM inscription WHERE id = :id');
$req->execute(array(
':id' => $id,

));


header('index.php?delete=success');

?>