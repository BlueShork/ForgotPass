<?php 

session_start();
$messages = htmlspecialchars($_POST['messages']);

include('config/config.php');
$req = $bdd->prepare('INSERT INTO chat (pseudo, messages, dates_publications) VALUES (:pseudo, :messages,NOW())');
	$req->execute(array(
		':pseudo' => $_SESSION['pseudo'],
		':messages' => $messages,
	));

$red = $_GET['red'];
    header('Location: '.$red.'?message=send');
         
                

?>
