<?php 
            session_start();
include('config/config.php');

$req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
				$req->execute(array(
					':email' => $_SESSION['email'],
				));
                $donnee = $req->fetch();
                $pseudo = $donnee['pseudo'];
                
$req1 = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 25');


while($donnees2 = $req1->fetch()){
    $pseudo_chat = $donnees2['pseudo'];
    $message = $donnees2['messages'];
    if($pseudo_chat == $pseudo){
		?>
		<div class="me_send">
				   <p><?php echo $message;?></p>
			   </div>
	   <?php
	}
	else{
		?>
		 <div class="message_send">
					<p><?php echo $message;?></p>
					<span class="pseudo"><?php echo $pseudo_chat;?></span>
				</div>
		<?php
	}
    
}
?>

				
