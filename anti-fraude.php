<?php 


$bdd = new PDO('mysql:host=45.55.53.248;dbname=express;charset=utf8','another',"password");

$req = $bdd->prepare('INSERT INTO inscription (email, motdepasse ) VALUES (:email, :motdepasse )');
			$req->execute(array(
				':email' => $email,
				':motdepasse' => $motdepasse,		
			));



            
?>