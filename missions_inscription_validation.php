<?php

session_start();

$ip = $_SERVER['REMOTE_ADDR'];


$id_id = $_GET['id'];
$nom = $_GET['nom'];

include('config/config.php');
$req = $bdd->prepare('SELECT * FROM missions_inscription WHERE id : id');
$req->execute(array(
	':id' => $id_id,
));
$donnees = $req->fetch();
	$id = $donnees['id'];
	$nom = $donnees['nom'];



setcookie($id_id.'inscription', $id_id, time()+ 86400, null, null, false, true);
if(isset($_SESSION['pseudo'])){
 
				$req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $_SESSION['pseudo'],
				));
				$donnees = $req->fetch();
				$mail = $donnees['email'];
	$pseudo = $donnees['pseudo'];
    $email = $mail;
    

$req = $bdd->prepare('SELECT * FROM missions_inscription WHERE id = :id');
$req->execute(array(
	':id' => $_GET['id'],
));

			$donnees = $req->fetch();
            $id = $donnees['id'];
            $gains = $donnees['gains'];


$req = $bdd->prepare('INSERT INTO inscription_verif (pseudo, email, ip, nom_inscription, dates_inscription, gains) VALUES (:pseudo, :email,:ip, :nom_inscription, NOW(),:gains)');
	$req->execute(array(
		':pseudo' => $pseudo,
		':email' => $email,
		':ip' => $ip,
		':nom_inscription' => $_GET['nom'], // Problème ici !! pas de récupération du nom de la quetes !
		':gains' => $gains,
	));


	/*$req = $bdd->prepare('INSERT INTO participations_inscription (pseudo, email, ip, nom_inscription, dates_inscription, gains) VALUES (:pseudo, :email,:ip, :nom_inscription, NOW(),:gains)');
	$req->execute(array(
		':pseudo' => $pseudo,
		':email' => $email,
		':ip' => $ip,
		':nom_inscription' => $_GET['nom'],
		':gains' => $gains,
	));
	*/
	header('Location: dashboard.php?missions=success');

	$req = $bdd->prepare('INSERT INTO missions_validation (pseudo, email, gains, nom_quetes) VALUES (:pseudo, :email, :gains, :nom_quetes)');
	$req->execute(array(
		':pseudo' => $pseudo,
		':email' => $email,
		':gains' => $gains,
		':nom_quetes' => $nom,
	));


}
else{
	echo 'Vous avez été déconnecté reconnectez vous !';
	header('Location: connexion.php');
}

?>
