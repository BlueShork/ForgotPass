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

?>
<!DOCTYPE html>
	<html>
		<head>
			<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
			<title>Accés refusé !</title>
			<meta charset="utf-8">
		</head>
		<body>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		    <script>
    $(document).ready(function()
{
    $('body div').last().remove();
});
</script>
				<div class="container">
  					<p>Clique sur la page pour nous soutenir !<br>Une fois la pub ouverte vous pouvez revenir dans 24h ou sur un autre appareil.<br>Sinon vous pouvez fermer votre naviguateur internet.<br><br>Toute notre équipe vous remercie du soutient que vous nous apportaient.</p>
</div>
				<style>
					*{
				padding: 0;
				border: 0;
				margin: 0;
			}
			body{
				background: #6f74dd;
				font-family: 'Raleway', cursive;
			}
			div{
				display: flex;
				min-height: 100vh;
			}
			p{
				margin: auto;
				color: #d1d9ff;
			}
			a{
				color: #fff;
			}

				</style>
</body>
	</html>
<?php

}else{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<title>Dashboard - Admin</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="givesaway.css">
			<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
							<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
		</head>
		<body>
			<?php 
				if(isset($_GET['paye'])){
					?>
					<div class="message" id="missions">
						<a onclick="fermer()" id="fermer" href="account_details.php?actif=#"><i class="far fa-times-circle"></i></a>
					<p class="first">Changements effectués !</p>
					</div>
					<?php
				}
				else{

				}

				?>
				<script>
					function fermer(){
						var element = document.getElementById("missions");
					element.style.display = "none";
					}
				</script>
			<ul id="menuvertical">
            <li class="title"><a href="giftofgains.com" style="color: #22BAA0;">GOG</a></li>
            <li><a href="index.php"><i class="fas fa-tachometer-alt logo"></i><span class="br">Dashboard</span></a></li>
            <li><a href="quetes.php"><i class="fab fa-elementor logo"></i><span class="br"> Vérifications</span></a>
            	 <li class="active"><a href="givesaway.php"><i class="fas fa-box-open logo"></i><span class="br"> Giveaways</span></a></li>
            <li><a href="account_details.php"><i class="fas fa-list logo"></i><span class="br"> List</span></a></li>
            <li><a href="inscription_verif.php"><i class="fab fa-wpforms logo"></i><span class="br"> Inscriptions</span></a></li>
             <li><a href="ptc_admin.php"><i class="fab fa-wpforms logo"></i><span class="br"> PTC</span></a></li>
        </ul>
        <ul id="menuhorizontal">
        	<li><a href="#"><i class="far fa-comment"><span class="notif"></span></i></a></li>
                    <li class="more" style="padding-bottom: 5px;"><a href="#" class="plus" style="font-size: 13px;
	background: #5191d1;
	border-radius: 3px;
	padding: 10px;
	color: #fff;
	font-weight: bold;
	padding-top: 10px;
	padding-bottom: 10px;
	padding-left: 15px;
	padding-right: 15px;">+ POST</a></li>
                    <li class="settings"><a href="#">Settings <i class="fas fa-angle-down"></i></a></li>
                    <li><a href="demandes.php"><i class="fas fa-credit-card"></i><span class="notif"><?php 
                
                
               
                $reponse = $bdd->query('SELECT COUNT(*) AS counte FROM paiement_quetes');
                $donnees = $reponse->fetch();
                echo $donnees['counte'];
                ?></span></i></a></li>

                    <li class="profile"><a href="#">BlueShork <i class="fas fa-angle-down"></i></a></li>
        </ul>
        <div class="tache">
        	<div class="email">
        		<p class="p-email"><i class="far fa-envelope"></i></p>
        	</div>
        	<div class="email tasks">
        		<p class="p-email"><i class="far fa-list-alt"></i></p>
        	</div>
        	<div class="email tasks">
        		<p class="p-email"><i class="far fa-chart-bar"></i></p>
        	</div>
        	<div class="email tasks">
        		<p class="p-email"><i class="fas fa-check"></i></p>
        	</div>
        	<div class="email tasks">
        		<p class="p-email"><i class="fab fa-twitter"></i></p>
        	</div>
        	<div class="email tasks">
        		<p class="p-email"><i class="fab fa-instagram"></i></p>
        	</div>
        	<div class="email">
        		<p class="p-email"><i class="fas fa-plus"></i></p>
        	</div>
        </div>
        <div class="users_stats">
        	
        	<h3><i class="fas fa-users"></i> <?php 
				
				
				
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM inscription');
                $donnees = $reponse->fetch();
                echo $donnees['counte'];
                ?> </h3>
        	<p>Dernier inscrit : <?php 

           
            $reponse = $bdd->query('SELECT * FROM  inscription ORDER BY id DESC LIMIT 0,1');
            $donnees = $reponse->fetch();

               	echo $donnees['pseudo'];
            ?></p>

        </div>

        <div class="stats">
        	
        	<h3><i class="fas fa-bullseye"></i> G-Bucks </h3>
        	<p><?php 

				
				$req = $bdd->query('SELECT SUBSTRING(sum(gains), 1, 5) AS gains_total FROM quetes_liens');
				$donnees = $req->fetch();
				if(isset($donnees['gains_total'])){
					?>
					<?php echo $donnees['gains_total']; ?> <i class="fas fa-bullseye"></i>
					<?php
				}
				else{
					?>
					0.00€
					<?php
				}
				?></p>

        </div>
         <div class="stats">
        	
        	<h3>Dernières quêtes</h3>
        	
        	<p><?php 

           
            $reponse = $bdd->query('SELECT pseudo,id, nom_quetes, DATE_FORMAT(dates_quetes, "%d %M à %H H %i ") AS quetes_dd FROM  quetes_liens ORDER BY id DESC LIMIT 0,1');
            $donnees = $reponse->fetch();

               	echo $donnees['nom_quetes'].' | ';
               	echo $donnees['quetes_dd'];
            ?><?php 
								

								
								
							
								
								
								
								?></p>

        </div>
        
        <div class="more-givesaway">
				<div class="gives">
				<h1>Giveaways : </h1>
					
				</div>
				<form method="post" action="ajouter.php">
					<input type="text" name="name" class="name" placeholder="Montant du paiement...">
					<input type="text" name="paiement" class="paiement" placeholder="Moyen de paiement...">
					<input type="text" name="auteur" class="auteur" placeholder="Votre pseudo...">
					<input type="text" name="int_participation" class="auteur" placeholder="Combien de participations ?">
					<input type="submit" value="Envoyer" class="submit giveas">
				</form>
			</div>
			<div class="lots">
				<?php 

			
				$req = $bdd->query('SELECT * FROM lots');
				while($donnees = $req->fetch()){
					?>
					<div class="carde">
					<img src="../images/gg_by_nezox.png" alt="Erreur -59">
						<h3>Gains : <?php echo $donnees['name']?></h3>
							<p class="auteur">Par : <?php echo $donnees['auteur'];?></p>
							<p class="id">ID : <?php echo $donnees['id']; ?></p>
								<p class="paiement">Paiement par : <?php echo $donnees['paiement']; ?></p>
								<p class="supprimer supp"><a href="supprimer.php?id=<?php echo $donnees['id'];?>" onClick="test()"><i class="fas fa-times"></i></a></p>
								<p class="supprimer tirage"><a href="tirer.php?id=<?php echo $donnees['id'];?>"><i class="fas fa-check"></i> Commencer</a></p>
								<script>
									function test(){
										prompt('Voulez vous vraiment supprimer cet élément ?');

									}
								</script>
					</div>
					<?php
				}

				?>
			</div>
			<!-- Partenariat -->

			<div class="more-givesaway">
				<div class="gives">
				<h1>Giveaways  PARTENARIAT: </h1>
					
				</div>
				<form method="post" action="ajouter_partenariat.php">
					<input type="text" name="nb" class="nab" placeholder="Montant du paiement...">
					<input type="text" name="lien" class="paiement" placeholder="Lien">
					<input type="text" name="int_participation" class="auteur" placeholder="Combien de participations ?">
					<input type="submit" class="submit">
				</form>
			</div>
			<div class="lots">
				<?php 

				
				$req = $bdd->query('SELECT * FROM lots_partenariat');
				while($donnees = $req->fetch()){
					?>
					<div class="carde">
					<img src="../images/couch-01.jpg" alt="Erreur -59">
						<h3>Valeur : <?php echo $donnees['nb']?></h3>
							<p class="id">ID : <?php echo $donnees['id']; ?></p>
								<p class="paiement">Lien : <?php echo $donnees['lien']; ?></p>
								<p class="supprimer supp"><a href="supprimer_partenariat.php?id=<?php echo $donnees['id'];?>" onClick="test()"><i class="fas fa-times"></i></a></p>
								<p class="supprimer tirage"><a href="tirer_partenariat.php?id=<?php echo $donnees['id'];?>"><i class="fas fa-check"></i> Commencer</a></p>
								<script>
									function test(){
										prompt('Voulez vous vraiment supprimer cet élément ?');

									}
								</script>
					</div>
					<?php
				}

				?>
			</div>

			<!-- END -->
			<!-- Journalier -->

			<div class="more-givesaway">
				<div class="gives">
				<h1>Giveaways JOURNALIER: </h1>
				</div>
				<form method="post" action="ajouter_journalier.php">
					<input type="text" name="nom" class="nab" placeholder="Nom">
					<input type="text" name="lien" class="paiement" placeholder="Lien">
					<input type="text" name="gains" class="paiement" placeholder="Gains">
					<input type="text" name="dates_finish" class="paiement" placeholder="Dates">
					<input type="submit" class="submit">
				</form>
			</div>
			<div class="lots">
				<?php 

			
				$req = $bdd->query('SELECT * FROM giveaways_journalier');
				while($donnees = $req->fetch()){
					?>
					<div class="carde">
					<img src="../images/bg5.jpg" alt="Erreur -59">
						<h3>Valeur : <?php echo $donnees['nom']?></h3>
							<p class="id">ID : <?php echo $donnees['id']; ?></p>
								<p class="paiement">Lien : <?php echo $donnees['lien']; ?></p>
								<p class="paiement">Dates de fin  : <?php echo $donnees['dates_finish']; ?></p>
								<p class="supprimer"><a href="supprimer_partenariat.php?id=<?php echo $donnees['id'];?>" onClick="test()">Fermer le givesaway</a></p>
								<p class="supprimer"><a href="tirer_journalier.php?id=<?php echo $donnees['id'];?>">Tirer le gagnant</a></p>
								<script>
									function test(){
										if(prompt('Voulez vous vraiment supprimer cet élément ?') == 'Oui'){

										}
										else{
											document.location="givesaway.php";
										}
									}
								</script>
					</div>
					<?php
				}

				?>
			</div>

			<!-- END -->
				<div class="more-givesaway">
				<div class="gives">
				<h1>Quêtes : </h1>
					<p>Ajouter des quêtes avec l'accord d'un supérieur ou certaines sanctions tomberons.</p><br>
					<p><span style="text-decoration: underline">Instructions : Pour le liens rémunéré il faut mettre comme liens : http://casheez.fr/quetes_validations.php?id=[insérer id de la prochaine quêtes / numéro]&liens=[insérerlenomdelaquete]</span></p>
				</div>
				<form method="POST" action="ajouter_quetes.php">
					<input type="text" name="name" class="name" placeholder="Nom de la quête...">
					<input type="text" name="paiement" class="paiement" placeholder="Récompense pour une quête...">
					<input type="text" name="auteur" class="auteur" placeholder="Liens rémunéré...">
					<input type="text" name="click" class="auteur" placeholder="Nombre de clique en 24h">
					<input type="text" name="ban" class="auteur" placeholder="Liens bannière">
					<input type="submit" class="submit">
				</form>
			</div>
			<div class="lots">
				<?php 
				$req = $bdd->query('SELECT * FROM quetes');
				while($donnees = $req->fetch()){
					?>
					<div class="carde">
						<img src="../images/sweet.png" alt="Erreur -59">
						<p>Nom : <?php echo $donnees['nom']?></p>
							<p class="id">ID : <?php echo $donnees['id']; ?></p>
							<p class="id">Clique journalier : <?php echo $donnees['limite_clicks']; ?> cliques</p>
								<p class="paiement">Gains : <?php echo $donnees['remise']; ?> G-Bucks</p>
								<p class="supprimer"><a href="supprimer_quetes.php?id=<?php echo $donnees['id'];?>">Supprimer</a></p>
								<script>
									function test(){
										prompt('Voulez vous vraiment supprimer cet élément ?');
									}
								</script>
					</div>
					<?php
				}

				?>
			</div>


<div class="more-givesaway">
				<div class="gives">
				<h1>Inscriptions : </h1>
					<p>Ajouter des missions avec l'accord d'un supérieur ou certaines sanctions tomberons.</p><br>
					<p>Instruction: <span style="text-decoration: underline">Rien à dire</span></p>
				</div>
				<form method="POST" action="ajouter_mission.php">
					<input type="text" name="name" class="name" placeholder="Nom de la quête...">
					<input type="text" name="description" class="paiement" placeholder="Description ...">
					<input type="text" name="lien" class="auteur" placeholder="Liens">
					<input type="text" name="gains" class="auteur" placeholder="Gains">
					<input type="text" name="ban" class="auteur" placeholder="Url de la bannière ... ">
					<input type="submit" class="submit">
				</form>
			</div>
			<div class="lots">
				<?php 
				$req = $bdd->query('SELECT * FROM missions_inscription');
				while($donnees = $req->fetch()){
					?>
					<div class="carde">
						<img src="<?php echo $donnees['ban']; ?>" alt="Erreur -59">
						<p>Nom : <?php echo $donnees['nom']?></p>
							<p class="id">ID : <?php echo $donnees['id']; ?></p>
							<p class="id">Lien: <?php echo $donnees['lien']; ?> cliques</p>
								<p class="paiement">Gains : <?php echo $donnees['gains']; ?> G-Bucks</p>
								<p class="supprimer"><a href="supprimer_missions.php?id=<?php echo $donnees['id'];?>">Supprimer</a></p>
								<script>
									function test(){
										prompt('Voulez vous vraiment supprimer cet élément ?');
									}
								</script>
					</div>
					<?php
				}

				?>
			</div>









				 
		</body>
	</html>
	<?php
}

}
else{
	?>
	<!DOCTYPE html>
	<html>
		<head>
			<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
			<title>Accé Refusé !</title>
			<meta charset="utf-8">
		</head>
		<body>
		    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		    <script>
    $(document).ready(function()
{
    $('body div').last().remove();
});
</script>
				<div class="container">
  					<p>Clique sur la page pour nous soutenir !<br>Une fois la pub ouverte vous pouvez revenir dans 24h ou sur un autre appareil.<br>Sinon vous pouvez fermer votre naviguateur internet.<br><br>Toute notre équipe vous remercie du soutient que vous nous apportaient.</p>
</div>
				<style>
					*{
				padding: 0;
				border: 0;
				margin: 0;
			}
			body{
				background: #6f74dd;
				font-family: 'Raleway', cursive;
			}
			div{
				display: flex;
				min-height: 100vh;
			}
			p{
				margin: auto;
				color: #d1d9ff;
			}
			a{
				color: #fff;
			}

				</style>
</body>
	</html>
	<?php
}
?>
