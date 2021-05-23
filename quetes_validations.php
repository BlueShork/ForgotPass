<?php


session_start();
$id_id = $_GET['id'];
setcookie($id_id.'quetes', $id_id, time()+ 86400, null, null, false, true);
$nom_quetes = $_GET['liens'];
include('config/config.php');
$req = $bdd->prepare('SELECT * FROM quetes WHERE id : id');
$req->execute(array(
	':id' => $id_id,
));
$donnees = $req->fetch();
	$id = $donnees['id'];
	$nom = $donnees['nom'];

if(isset($_SESSION['pseudo'])){
				$req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $_SESSION['pseudo'],
				));
				$donnees = $req->fetch();
				$mail = $donnees['email'];
				$pseudo = $_SESSION['pseudo'];
    			$email = $mail;
				$parrain = $donnees['parrain'];
    

$req = $bdd->prepare('SELECT * FROM quetes WHERE id = :id');
$req->execute(array(
	':id' => $_GET['id'],
));

			$donnees = $req->fetch();
            $id = $donnees['id'];
            $gains = $donnees['remise'];
            $limite = $donnees['limite_clicks'];
            $nom_quetes = $donnees['nom'];
           
// Verification de triche 

	$requete = $bdd->prepare('SELECT COUNT(*) AS nb_participations FROM quetes_journalier WHERE pseudo = :pseudo AND nom_quetes = :nom_quetes');
	$requete->execute(array(
	':pseudo' => $_SESSION['pseudo'],
	':nom_quetes' => $nom_quetes,
	));

	while($donneess = $requete->fetch()){
		if($donneess['nb_participations'] >= $limite){
			// include('erreur.html');
			// Erreur le nombre de participation max est atteint pour aujourd'hui
			header('Location: cashlinks.php?quetes=error');
		}
	else{
		$req = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email,NOW(), :gains, :nom_quetes)');
		$req->execute(array(
			':pseudo' => $pseudo,
			':email' => $email,
			':gains' => $gains,
			':nom_quetes' => $nom_quetes,
		));

		// Insert parrain bonus !
		include('class/get_parrain.php');
		test($parrain, $nom_quetes, $gains);
		

		$req = $bdd->prepare('INSERT INTO quetes_journalier (pseudo, email, gains, nom_quetes) VALUES (:pseudo, :email, :gains, :nom_quetes)');
		$req->execute(array(
			':pseudo' => $pseudo,
			':email' => $email,
			':gains' => $gains,
			':nom_quetes' => $nom_quetes,
		));
	
	
		$req = $bdd->prepare('INSERT INTO quetes_verif (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email,NOW(), :gains, :nom_quetes)');
		$req->execute(array(
			':pseudo' => $pseudo,
			':email' => $email,
			':gains' => $gains,
			':nom_quetes' => $nom_quetes,
		));
	
	header('Location: cashlinks.php?quetes=success');
	}
	}

// End


}
else{
	echo 'Vous avez été déconnecté reconnectez vous !';
	header('Location: connexion.php');
}

?>