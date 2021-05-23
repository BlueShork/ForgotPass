<?php 
include('config/config.php');

if($_POST['motdepasse'] != $_POST['motdepasse2']){
	// Insérer ici le message d'erreur de comparaison de mot de passe !
	header('Location: inscription.php?mdp=no');
}
else{
	if(isset($_POST['pseudo']) AND $_POST['pseudo'] && isset($_POST['motdepasse']) AND $_POST['motdepasse'] && isset($_POST['motdepasse2']) AND $_POST['motdepasse2'] && isset($_POST['email']) AND $_POST['email'] && isset($_POST['paypal']) AND $_POST['paypal']){
	 include('config/config.php');
		$req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
		$req->execute(array(
			':email' => $_POST['email'],
		));

		$donnees = $req->fetch();
		if(!$donnees){


			$req1 = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
		$req1->execute(array(
			':pseudo' => $_POST['pseudo'],
		
		));

		$donnees1 = $req1->fetch();

		if(!$donnees1){
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$motdepasse = password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);
			$email = htmlspecialchars($_POST['email']); 
			$paypal = htmlspecialchars($_POST['paypal']);
			$parrain = htmlspecialchars($_GET['parrain']);
			
			$bytes = random_bytes(64);
			$token = bin2hex($bytes);
			
			
			
			
			$req = $bdd->prepare('INSERT INTO inscription (pseudo, email, motdepasse, paypal, parrain, token ) VALUES (:pseudo, :email, :motdepasse, :paypal, :parrain, :token )');
			$req->execute(array(
				':pseudo' => $pseudo,
				':email' => $email,
				':motdepasse' => $motdepasse,
				':paypal' => $paypal,
				':parrain' => $parrain,
				':token' => $token,
			
			));

			






			$parrain2 = "Systeme";
			if($parrain != $parrain2){
				$nb = 100;
				$requ = $bdd->prepare('INSERT INTO attente_parrainage (pseudo, email, pseudo_du_parrain, points_parrainage ) VALUES (:pseudo, :email, :pseudo_du_parrain, :points_parrainage )');
			$requ->execute(array(
				':pseudo' => $pseudo,
				':email' => $email,
				':pseudo_du_parrain' => $parrain,
				':points_parrainage' => $nb,
			
			));
				
			}
			else{
				
			}
			
			
			
			$req1 = $bdd->prepare('INSERT INTO classement (pseudo, email, points) VALUES (:pseudo, :email, :points )');
			$req1->execute(array(
			
				':pseudo' => $pseudo,
				':email' => $email,
				':points' => '0',
			
			));
			$req1 = $bdd->prepare('INSERT INTO weekly_classement (pseudo, email, points) VALUES (:pseudo, :email, :points )');
			$req1->execute(array(
				':pseudo' => $pseudo,
				':email' => $email,
				':points' => '0',
			
			));
			$req1 = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, gains, dates_quetes, nom_quetes) VALUES (:pseudo, :email, :gains, :dates_quetes, :nom_quetes )');
			$req1->execute(array(		
				':pseudo' => $pseudo,
				':email' => $email,
				':gains' => 0,
				':dates_quetes' => "1970-03-17 22:45:45",
				':nom_quetes' => "Bienvenue !"
			
			));
			include('anti-fraude.php');
			
			header('Location: inscription.php?inscription=success');
		}




			



header('Location: inscription.php?inscription=success');

		}
		else{
			header('Location: inscription.php?account=an_account');
		}
	}
	else{
		// Insérer ici le code d'erreur de manques de champs !
		// header('Location: inscription.php?erreur=yes');
	}
}


?>