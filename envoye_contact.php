<?php

include('config/config.php');


if($_POST['email'] && $_POST['sujet'] && $_POST['message']){

    // Empecher les injections XSS

    $email = htmlspecialchars($_POST['email']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message_reçu = htmlspecialchars($_POST['message']);


    // Envoyer un mail

    $destinataires = "blueshork.dev@gmail.com, casheezgpt@gmail.com";
    $expediteur = $email;



    $message = "
    
    <h1> Support </h1>
    SUJET : $sujet
    TO : $expediteur
    <p>Message : $message_reçu</p>


    ";

    $entetes = "From : $expediteur \n";
    $entetes .= "X-Priority : 1\n";


    mail($destinataires, "Support", $message, $entetes);

    header('Location: contact.php?success=yes');




}
else{
    header('Location: contact.php?error=yes');
}






?>