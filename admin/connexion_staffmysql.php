<?php 
$pseudo = htmlspecialchars($_POST['pseudo']);

include('../config/config.php');
$req = $bdd->prepare('SELECT id, password FROM connexion_staff WHERE pseudo = :pseudo');
$req->execute(array(
    ':pseudo' => $pseudo,
));

$resultat = $req->fetch();

$IsPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

if(!$resultat){
   echo 'diffrents conard !';
}
else{
    if($IsPasswordCorrect){
        session_start();
        $_SESSION['pseudoadmin'] = $pseudo;
        $_SESSION['id'] = $resultat['id'];
       ?>
        <!DOCTYPE html>
            <head>
                <title>Chargement - Connexion</title>
                <link rel="stylesheet" href="../css/loader.css">
                <meta charset="utf-8">                
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            </head>
            <body>
               <div class="center"><i class="fas fa-spinner"></i></div>
                <script language="javascript">document.location="index.php"</script>
            </body>
        <?php
    }
    else{
        echo 'NTM';
    }
}

?>