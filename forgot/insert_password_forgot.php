<?php 

include('../config/config.php');

if(isset($_POST['token_user']) && isset($_POST['password']) && !empty($_POST['token_user']) && !empty($_POST["password"])){


    $token = htmlspecialchars($_POST['token_user']);
    echo $_POST['token_user'];
    $pass_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    echo '<br>';
    echo $pass_hash;


    $modif = $bdd->prepare('UPDATE inscription SET motdepasse = :motdepasse WHERE token = :token');
    $modif->execute(array(
        ":motdepasse" => $pass_hash,
        ":token" => $token,
    ));

    header('Location: ../index.php?p=true');

}
else{
    echo 'Une erreur est survenue';
}



?>