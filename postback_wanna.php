<?php

$secret = "b3bd8e75b1"; // check your app info at www.wannads.com
$userId = isset($_GET['subId']) ? $_GET['subId'] : null;
$transactionId = isset($_GET['transId']) ? $_GET['transId'] : null;
$points = isset($_GET['reward']) ? $_GET['reward'] : null;
$signature = isset($_GET['signature']) ? $_GET['signature'] : null;
$action = isset($_GET['status']) ? $_GET['status'] : null;
$ipuser = isset($_GET['userIp']) ? $_GET['userIp'] : "0.0.0.0";

// validate signature
if(md5($userId.$transactionId.$points.$secret) != $signature)
{
    echo "ERROR: Signature doesn't match";
    return;
}
else{
	if($action == 1){// action = 1 CREDITED // action = 2 REVOKED  
    $points = -abs($points);
		echo "OK";
		include('config/config.php');



		$info = $bdd->prepare('SELECT * FROM inscription WHERE id = :id');
		$info->execute(array(
			':id' => $userId,

		));
		while($info = $info->fetch()){
			
		$req = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email,NOW(), :gains, :nom_quetes)');
		$req->execute(array(
			':pseudo' => $info['pseudo'],
			':email' => $info['email'],
			':gains' => $_GET['payout']*1000,
			':nom_quetes' => 'Sondage',
		));
		$parrain = $info['parrain'];
		$nom_quetes = "Sondage";
		$gains = $_GET['payout']*1000;

		include('class/get_parrain.php');
		test($parrain, $nom_quetes, $gains);


		}
	}
		else{
			$points = -abs($points);
		}
		

	
}

    





?>