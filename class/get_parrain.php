<?php 


function test($parrain, $nom_quetes, $gains){

    if($parrain != 'Systeme'){
        $parrain = $parrain;
    }
    else{
        $parrain = '';
    }


    if($parrain != ''){

			// Insérer le bonus au parrain qui en a besoin
			// Récupérer l'email du parrain
            include('config/config.php');
			$req8 = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
			$req8->execute(array(
				':pseudo' => $parrain,
			));
			$info_parrain = $req8->fetch();
			$email_parrain = $info_parrain['email'];
			$nom_quetes = 'Parrainage bonus';
			$gains_parrain = $gains*0.10;

			$req9 = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email,NOW(), :gains, :nom_quetes)');
			$req9->execute(array(
				':pseudo' => $parrain,
				':email' => $email_parrain,
				':gains' => $gains_parrain,
				':nom_quetes' => $nom_quetes,
			));
		}
		else{
			// Ne rien faire il n'y pas de parrain, le parrain est = Systeme
		}
}


?>