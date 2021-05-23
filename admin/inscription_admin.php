<?php 
session_start();
if(isset($_SESSION['pseudo']) AND $_SESSION['pseudo'] === '1'){
	$pseudo = $_SESSION['pseudo'];
	include('../config/config.php');
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Dashboard - Admin</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="inscription_admin.css">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
		</head>
		<body>
			<nav>
				<ul>
					<li><a href="#" class="pseudo">Bonjour, <?php echo $pseudo; ?></a></li>
					<li class="right topright active"><a href="inscription_admin.php" target="_blank">Inscription</a></li>
					<li class="right"><a href="#">Givesways</a></li>
					<li class="right"><a href="#">Quêtes</a></li>
					<li class="right"><a href="#">Générale</a></li>
				</ul>
			</nav>
			<h1 class="table">Listes des inscrits : </h1>
				<p class="table-p"></p>
				<?php 

				
				$req = $bdd->query('SELECT * FROM inscription');
				while($donnees = $req->fetch()){
					?><br>
					<table>
   <thead> <!-- En-tête du tableau -->
   	<caption>Utilisateurs : <?php echo $donnees['pseudo']; ?></caption>
       <tr>
           <th>Pseudo</th>
           <th>E-mail</th>
           <th>Grades</th>
           <th>Supprimer</th>
       </tr>
   </thead>
   <tbody> <!-- Corps du tableau -->
       <tr>
           <td><?php echo $donnees['pseudo']; ?></td>
           <td><?php echo $donnees['email']; ?></td>
           <td><?php echo $donnees['grades']; ?></td>
           <td><a href="delete.php?id=<?php echo $donnees['id']; ?>" onclick="return confirm('Supprimer cette personne ? ( irréversible )');">Supprimer</a></td>
           <td><a onClick="alert('Attention cette action est irréversible ! Si vous ne voulez pas supprimer cette personne merci de quitter cette page !')" href="#?id=<?php echo $donnees['id']; ?>">Modifier</a></td>
       </tr>
   </tbody>
</table><br>
					<?php
				}
				?>
		</body>
	</html>
	<?php
}
else{
	echo 'non';
}

?>