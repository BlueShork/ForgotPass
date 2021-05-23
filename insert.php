<?php 

include('config/config.php');

    $req1 = $bdd->query('SELECT * FROM inscription');

    while($donnees = $req1->fetch()){

        $req2 = $bdd->prepare('INSERT INTO classement (pseudo, email, points) VALUES (:pseudo, :email, :points)');
        $req2->execute(array(
            ':pseudo' => $donnees['pseudo'],
            ':email' => $donnees['email'],
            ':points' => 0,
    
    
        ));
    }


  
    


echo 'Finish';


?>