<?php 
session_start();
include('../config/config.php');
if(!empty($_SESSION['pseudoadmin'])){
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
			<ul id="menuvertical">
            <li class="title"><a href="giftofgains.com" style="color: #22BAA0;">GOG</a></li>
            <li class="active"><a href="index.php"><i class="fas fa-tachometer-alt logo"></i><span class="br">Dashboard</span></a></li>
            <li><a href="quetes.php"><i class="fab fa-elementor logo"></i><span class="br"> Vérifications</span></a>
            	 <li><a href="givesaway.php"><i class="fas fa-box-open logo"></i><span class="br"> Giveaways</span></a> </li>
            <li><a href="account_details.php"><i class="fas fa-list logo"></i><span class="br"> List</span></a></li>
            <li><a href="inscription_verif.php"><i class="fab fa-wpforms logo"></i><span class="br"> Inscriptions</span></a></li>
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
        		<a href="account_details.php"><p class="p-email"><i class="far fa-list-alt"></i></p></a>
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
        <div class="statss">
        	
        	<h3><?php 
				
				
				
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM inscription');
                $donnees = $reponse->fetch();
                echo '<div class="sec"><span class="nb">'.$donnees['counte'].'</span>';
                ?><span class="te"> members</span></div><?php 
				
				
				
				$reponse = $bdd->prepare('SELECT COUNT(*) AS counte FROM inscription WHERE ban = :ban');
				$reponse->execute(array(
					':ban' => 1,
				));
                $donnees = $reponse->fetch();
                
                ?></h3>
        	

        </div>

        <div class="signalements">
        	
        	<h3><span class="box">15</span> Signalements <span class="right-i"><i class="fas fa-caret-up"></i></span></h3>
        	<p>Sleek, intuitive, and powerful mobile-first front-end framework for faster and easier web development.</p>

        </div>
        <div class="signalements">
        	
        	<h3><span class="box">32</span> Tricheries <span class="right-i"><i class="fas fa-caret-up"></i></span></h3>
        	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,</p>

        </div>
         <div class="signalements">
        	
        	<h3><span class="box">On</span> Tweets <span class="right-i"><i class="fas fa-caret-up"></i></span></h3>
        	<p><a class="twitter-timeline" href="https://twitter.com/SupportGog?ref_src=twsrc%5Etfw" height="750px">Tweets by SupportGog</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script></p>

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