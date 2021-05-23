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
			<link rel="stylesheet" href="index.css">
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
            	 <li><a href="givesaway.php"><i class="fas fa-box-open logo"></i><span class="br"> Giveaways</span></a>  </li>
            <li><a href="account_details.php"><i class="fas fa-list logo"></i><span class="br"> List</span></a></li>
             <li class="active"><a href="inscription_verif.php"><i class="fab fa-wpforms logo"></i></i><span class="br"> Inscriptions</span></a></li>
              <li><a href="ptc_admin.php"><i class="fab fa-wpforms logo"></i><span class="br"> PTC</span></a></li>
        </ul>
        <ul id="menuhorizontal">
        	<li><a href="#"><i class="far fa-comment"><span class="notif">5</span></i></a></li>
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
        
        <?php
		

			$videosParPage = 100;
			$videosTotalesReq = $bdd->query('SELECT * FROM participations_inscription');
			$videosTotales = $videosTotalesReq->rowCount();
			$pagesTotales = ceil($videosTotales/$videosParPage);
			if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0){
				$_GET['page'] = intval($_GET['page']);
				$pageCourante = $_GET['page'];
			}
			else{
				$pageCourante = 1;
			}
			$depart = ($pageCourante-1)*$videosParPage;
			?>
				<h1>Inscription aujourd'hui : (<?php 
				
				
			
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM participations_inscription');
                $donnees = $reponse->fetch();
                echo $donnees['counte'];
				?>).</h1>
				</div> 
<div class="signalements quetes cent">
        	
        	<h3><span class="box"><?php  echo $donnees['counte']; ?></span> Quêtes<span class="right-i"><i class="fas fa-caret-up"></i></span></h3>
			<?php
				$req = $bdd->query('SELECT * FROM participations_inscription ORDER BY id DESC LIMIT  '.$depart.','.$videosParPage);
				?>
				<?php
				while($donnees = $req->fetch()){
					$id = $donnees['id'];
					?>
					<div class="card">
						<p class="id inline"><span class="boxe ip"><?php echo $donnees['ip']; ?></span></p>
						<p class="auteur inline"><i class="fas fa-user-circle"></i> <?php echo $donnees['pseudo'];?>  | </p>
						<p class="name_quetes inline"><?php 
						if(!empty($donnees['nom_inscription'])){
							echo $donnees['nom_inscription'].' | ';
						}else{
							echo 'Elément introuvable';
						} 
						?></p>
							
							

								<p class="paiement ciffreinline no_border"><span class="chiffre coins"><?php echo $donnees['gains']; ?><i class="fas fa-bullseye"></i></span> | </p>
								<p class="paiement ciffreinline no_border"><span class="chiffre coins"><?php echo $donnees['dates_inscription']; ?></span></p>
								<div class="suppression"><p class="supprimer inline"><a href="suppimer_inscription_part.php?id=<?php echo $donnees['id'];?>&dates_inscription=<?php echo $donnees['dates_inscription'];?>"><i class="fas fa-times"></i></a></p></div>
					</div>
					<?php
				}

				?>
<div class="div-pages">
				<?php 
				for($i=1;$i<=$pagesTotales;$i++){
					if($i == $pageCourante){
						
							echo '<a class="indexion here">'.$i.'</a>';
						
					}
					else{
							echo '<a class="indexion" href="quetes.php?page='.$i.'">'.$i.'</a>';
					}
				}


				?>
			</div>

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
