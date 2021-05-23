<?php

$ip_user = $_SERVER['REMOTE_ADDR'];
$vanish_ip_offer = "54.175.173.245";


if($ip_user === $vanish_ip_offer){
    // Server has been succefully logged it's the true server of OfferToro
    include('config/config.php');
        $userId = $_GET['user_id'];

        $info = $bdd->prepare('SELECT * FROM inscription WHERE id = :id');
        $info->execute(array(
            ':id' => $userId,

        ));

        while($donnees = $info->fetch()){
            $req = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email,NOW(), :gains, :nom_quetes)');
		    $req->execute(array(
			':pseudo' => $donnees['pseudo'],
			':email' => $donnees['email'],
			':gains' => $_GET['amount'],
			':nom_quetes' => $_GET['o_name'],
		));
        $parrain = $donnees['parrain'];
        $nom_quetes = $_GET['o_name'];
        $gains = $_GET['amount'];
        // Insert parrain bonus !
		include('class/get_parrain.php');
		test($parrain, $nom_quetes, $gains);

        }
}
else{
    echo "Dobby à détecter une tentative de fraude de votre part. Un administrateur à été prévenu.";
}






?>