<?php 

include('../config/config.php');


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../semantic/semantic.min.css">
    <title>Forgot Password</title>
</head>
<body>
    <style>
    .container{
        margin-top: 100px;
    }
    </style>
<div class="ui main container">
            <?php 

            if(isset($_GET['success'])){
            	?>
            	<div class="ui positive message">Votre message à bien été envoyée !<br>Vous aurez une réponse dans les plus brefs délais.</datagrid></div>
            	<?php
            }elseif(isset($_GET['error'])){
                ?>
                <div class="ui negative message">Une erreur est survenu veuillez réessayer plus tard :(<br>En cas de problème contact : blueshork.dev@gmail.com</div>
                <?php
            }
            else{
            
            }
            
            ?>

            <h2>J'ai oublié mon mot de passe :'( </h2>
                <p>Veuillez renseigner l'email du compte que vous voulez récuperer.</p>
                <form action="forgot_traitment.php" method="post" class="ui form">

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email">
                </div>
                <button type="submit" class="ui blue labeled submit icon button send">
                    <i class="icon send"></i>
                    Envoyer
                </button>

                </form>
            </div>




</body>
</html>
