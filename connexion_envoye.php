<?php 
session_start();
$email = htmlspecialchars($_POST['email']);
$motdepasse = htmlspecialchars($_POST['motdepasse']);
include('config/config.php');
$req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
$req->execute(array(
    ':email' => $email,
));

$resultat = $req->fetch();
$IsPasswordCorrect = password_verify($_POST['motdepasse'], $resultat['motdepasse']);


if(!$resultat){
    header('Location: connexion.php?success=no');
    echo 'erreur mot de passe'; 
    
}
else{
    
    if($IsPasswordCorrect){
        $_SESSION['email'] = $email;
        $_SESSION['id'] = $resultat['id'];
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
             <div class="center"><div class="loader"></div></div>
               <script language="javascript">document.location="dashboard.php"</script>
              
               
            </body>
        <?php
    }
    else{
        header('Location: connexion.php?success=no');
        echo 'mot de passe2';
    }
}

?>