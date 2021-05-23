<?php 

session_start();
include('config/config.php');
$message = $_POST['message'];
$pseudo = $_SESSION['pseudo'];

if($_POST['point'] >= $_POST['point']){
$req = $bdd->prepare('SELECT email FROM inscription WHERE pseudo = :pseudo');
                $req->execute(array(
                    ':pseudo' => $_SESSION['pseudo'],
                ));
                $donnees = $req->fetch();
                $email = $donnees['email'];


$req = $bdd->prepare('INSERT INTO paiement_quetes (pseudo, email, message, montant, types) VALUES (:pseudo, :email, :message, :montant, :types)');
$req->execute(array(
    ':pseudo' => $pseudo,
    ':email' => $email,
    ':message' => $message,
    ':montant' => $_POST['point'],
    ':types' => $_POST['types'],

));

$reqr = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email, :dates_quetes, :gains, :nom_quetes)');
    $reqr->execute(array(
        ':pseudo' => $_SESSION['pseudo'],
        ':email' => $email,
        ':dates_quetes' => "1970-03-17 22:45:45",
        ':gains' => -$_POST['point'],
        ':nom_quetes' => 'Demande de paiement envoyé',
    ));
    ?>
     <!DOCTYPE html>
            <head>
                <title>Chargement - Connexion</title>
                <link rel="stylesheet" href="css/loader.css">
                <link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
            <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta charset="utf-8">                
                
            </head>
            
            <body onselectstart="return false" oncontextmenu="return false" ondragstart="return false" onMouseOver="window.status='..message perso .. '; return true;">
                <div id="no_success">
                    <p>Redirection en cours ...</p>
                </div>
               <script language="javascript">document.location="demande_paiement.php?envoye=success"</script>
              <?php



?>
               
            </body>
    <?php
}
else{
    include('erreur.html');
}
				
?>