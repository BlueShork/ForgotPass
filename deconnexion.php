<?php
session_start();

$_SESSION['nom'] = $_SESSION['pseudo'];

session_destroy();
header('Location: index.php?deconnexion=success');


?>