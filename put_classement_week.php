<?php 

include('config/config.php');

$req = $bdd->query('SELECT * FROM weekly_classement');
while($donnees = $req->fetch()){
    $money = 0;
    $email = $donnees['email'];
    $req2 = $bdd->prepare('UPDATE weekly_classement SET points = :points WHERE email = :email');
        $req2->execute(array(
            ':points' => $money,
            ':email' => $email,
        ));
}



?>