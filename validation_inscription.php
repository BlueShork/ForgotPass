<?php 

include('config/config.php');

$req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
		$req->execute(array(
			':email' => $_GET['email'],
		));
		$donnees = $req->fetch();

 $req = $bdd->prepare('UPDATE inscription SET validation = 1 WHERE email = :email');
            $req->execute(array(
             ':email' => $_GET['email'], 
             ));

       header('Location: connexion.php?validation=success');
?>