<?php 

session_start();
include('../config/config.php');
if(!empty($_SESSION['pseudoadmin'])){
$req = $bdd->prepare('SELECT *  FROM connexion_staff WHERE pseudo = :pseudo');
$req->execute(array(
    ':pseudo' => $_SESSION['pseudoadmin'],
));

$resultat = $req->fetch();
$comparaison = 'Administrateur';
if($resultat['roles'] != $comparaison){
	echo 'Erreur survenue | Instrusion interceptée !';
}
else{

	$req = $bdd->prepare('INSERT INTO click_quetes (nom, liens, gains, limite_clicks, nb_clicks) VALUES (:nom, :liens, :gains, :limite_clicks, :nb_clicks)');
	$req->execute(array(
		':nom' => htmlspecialchars($_POST['nom']),
		':liens' => htmlspecialchars($_POST['liens']),
		':gains' => htmlspecialchars($_POST['gains']),
		':limite_clicks' => htmlspecialchars($_POST['limite_clicks']),
		':nb_clicks' => htmlspecialchars($_POST['nb_clicks']),
    ));
    header('Location: ptc_admin?delete=sucess');
}

}
else{
	echo 'Pas de session ouverte !';
}

?>
