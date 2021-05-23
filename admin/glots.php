<?php 
session_start();
if(isset($_GET['pseudo']) AND $_GET['pseudo'] === "equipedegog" && isset($_GET['password']) AND $_GET['password'] === '6255rhcr'){
	$_SESSION['pseudo'] = $_GET['pseudo'];
	$_SESSION['password'] = $_GET['password'];
	?>
<!DOCTYPE html>
	<html>
		<head>
			<title>Lots - Admin</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="glots.css">
		</head>
		<body>
			<nav>
				<ul>
					<li><a href="#" class="pseudo">Bonjour, <?php echo $pseudo; ?></a></li>
						<li class="right"><a href="index.php">Index</a></li>
					<li class="right"><a href="givesaway.php">Givesways</a></li>
				</ul>
			</nav>
			<div class="lots">
				<?php 

				$bdd = new PDO('mysql:host=localhost;dbname=gog;charset=utf8;','root','');
				$req = $bdd->query('SELECT * FROM lots');
				while($donnees = $req->fetch()){
					?>
					<div class="card">
						<h3>Valeur : <?php echo $donnees['name']?></h3>
							<p class="auteur">Par : <?php echo $donnees['auteur'];?></p>
							<p class="id">Lots n°<?php echo $donnees['id']; ?></p>
								<p class="paiement">Paiement par : <?php echo $donnees['paiement']; ?></p>
								<p class="supprimer"><a href="supprimer.php?id=<?php echo $donnees['id'];?>">Clore le giveaway</a></p>
					</div>
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