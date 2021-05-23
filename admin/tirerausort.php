<?php 
session_start();
if(isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] === "BlueShork" && isset($_SESSION['password']) AND $_SESSION['password'] === '*M!Rdb26' OR isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] === "Spiflick" && isset($_SESSION['password']) AND $_SESSION['password'] === 'g43m/BC%' OR isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] === "Tom-Morty" && isset($_SESSION['password']) AND $_SESSION['password'] === ',h5D^Jr9' OR isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] === "Stymix" && isset($_SESSION['password']) AND $_SESSION['password'] === ')8L?eCn7'){
	$_SESSION['pseudo'] = $_GET['pseudo'];
	$_SESSION['password'] = $_GET['password'];
	?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Tirer au sort- Admin</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="glots.css">
		</head>
		<body>
			<nav>
				<ul>
					<li class="left"><a href="glots.php?pseudo=<?php echo $_SESSION['pseudo'];?>&password=<?php echo $_SESSION['password'];?>">Gérer les lots</a></li>
					<li><a href="#">Gérer les Participations</a></li>
					<li><a href="tirerausort.php?pseudo=<?php echo $_SESSION['pseudo'];?>&password=<?php echo $_SESSION['password'];?>">Tirer au sort un gagnant</a></li>
				</ul>
			</nav>
			<div class="tirerausort">
				<form method="post" action="tierausort_rand.php">
				<input type="text" name="iddebut" placeholder="iddebut">
				<input type="text" name="idfin" placeholder="idfin">
				<input type="submit">
			</form>
			</div>
			<div class="tirer">
				<?php 

				include('../config/config.php');
				$reponse = $bdd->query('SELECT * FROM participations');
				while($donnees = $reponse->fetch()){
					?>
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
	// Enter the refuse page !
	header('Location: ../admin.php?access=no');
}


?>