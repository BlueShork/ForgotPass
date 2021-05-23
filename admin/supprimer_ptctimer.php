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
$id = $_GET['id'];
	$req = $bdd->prepare('DELETE FROM click_timers WHERE id = :id');
	$req->execute(array(
		':id' => $id,
	));

header("Location: ptc_admin.php?delete=sucess");
}

}
else{
	echo 'Pas de seesion ouverte !';
}

?>

	