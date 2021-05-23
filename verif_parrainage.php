<?php 

include('config/config.php');

$req = $bdd->query('SELECT * FROM attente_parrainage');
while($donnees = $req->fetch()){
    $pseudo_c = $donnees['pseudo'];
    $email_c = $donnees['email'];
    $pseudo_du_parrain = $donnees['pseudo_du_parrain'];
    $points_parrainage = $donnees['points_parrainage'];

    

    $req4 = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
    $req4->execute(array(
        ':pseudo' => $pseudo_du_parrain,

    ));
    $donnees2 = $req4->fetch();
    $email_du_parrain = $donnees2['email'];

    $req1 = $bdd->prepare('SELECT SUBSTRING(sum(gains),1,5) as gains_verif FROM quetes_liens WHERE email = :email');
    $req1->execute(array(
        ':email' => $email_c,
    ));

    while($donnees1 = $req1->fetch()){
        $phrase = "Parrainage de $pseudo_c";
        if($donnees1['gains_verif'] >= 1000){
           $req2 = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, gains, dates_quetes, nom_quetes) VALUES (:pseudo, :email, :gains, NOW(), :nom_quetes)');
           $req2->execute(array(
            ':pseudo' => $pseudo_du_parrain,
            ':email' => $email_du_parrain,
            ':gains' => $points_parrainage,
            ':nom_quetes' => $phrase,
           ));

           $req_delete = $bdd->prepare('DELETE FROM attente_parrainage WHERE pseudo = :pseudo');
           $req_delete->execute(array(
	        ':pseudo' => $pseudo_c,
           ));


        }
        else{
          
        }
    }


}

echo 'fin';


?>