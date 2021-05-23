<?php 
session_start();
if(isset($_SESSION['pseudoadmin'])){
	$pseudo = $_SESSION['pseudo'];
	?>
	<?php 

$pseudo = $_SESSION['pseudoadmin'];
include('../config/config.php');
$req = $bdd->prepare('SELECT *  FROM connexion_staff WHERE pseudo = :pseudo');
$req->execute(array(
    ':pseudo' => $pseudo,
));

$resultat = $req->fetch();
?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Dashboard - Admin</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="../css/giveaways.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
			<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
		</head>
		<body>
		<nav>
				<ul>
				<li><a href="#" class="pseudo"><i class="fas fa-dove"></i> Gift of Gains.com</a></li>
					<li><a href="#" class="pseudo">Connecté en tant que : <?php echo $_SESSION['pseudoadmin']; ?></a></li>
					<li><a href="#" class="pseudo">Rôles : <?php echo $resultat['roles']; ?></a></li>
					<li><a href="#" class="pseudo">E-mail : <?php echo $resultat['email']; ?></a></li>
					<?php 

					if($resultat['roles'] === 'Modo'){
						?>
						<li class="right"><a href="quetes.php"><i class="fas fa-list-alt"></i>   Quêtes</a></li>
						<?php
					}
					else{

					}
					if($resultat['roles'] === 'ModoGiveaways'){
						?>
							<li class="right"><a href="givesaway.php"><i class="fas fa-box-open"></i>  Lots</a></li>
						<?php
					}else{

					}
					if($resultat['roles'] === 'Staff'){
						?>
						<li class="right"><a href="quetes.php"><i class="fas fa-list-alt"></i>   Quêtes</a></li>
							<li class="right"><a href="givesaway.php"><i class="fas fa-box-open"></i>  Lots</a></li>
							<li class="right"><a href="demandes.php"><i class="fas fa-money-check-alt"></i>   Demandes de paiement</a></li>
						<?php
					}else{

					}

					?>
				</ul>
			</nav>
			<?php 
$rand = rand($_POST['iddebut'], $_POST['idfin']);

?>
<p class="winners">Le gagnants est le numéros :  <span style="text-decoration: underline;font-weight:bold;"><?php echo $rand; ?></span></p>
			<div class="more-givesaway">
				
				<?php 

			
				$reponse = $bdd->prepare('SELECT * FROM participations WHERE id_participations = :id');
				$reponse->execute(array(
					':id' => $_GET['id'],
				));
				$test = 0;
					
				while($donnees = $reponse->fetch()){
					?>
					<div class="banner"><p class="ide"><?php echo ++$test; ?></p></div>
					<p class="tableau"><?php echo $donnees['id']; ?> . <?php echo $donnees['mail'];?></p>
					<?php
				}

				?>
			</div>
		</body>
	</html>
	<?php
}
else{
	echo 'non';
}

?>
