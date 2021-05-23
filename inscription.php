<?php include('class/get_name_site.php'); ?>
<!DOCTYPE html>
	<html>
		<head>
			<title><?php site(); ?> - Inscription</title>
			<meta charset="utf-8">
			<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
			<link rel="stylesheet" href="css/index.css">
			<link rel="stylesheet" href="css/inscription.css">
			<link rel="stylesheet" href="css/connexion.css">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
			<link href="https://fonts.googleapis.com/css?family=Noto+Sans|Roboto&display=swap" rel="stylesheet">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		</head>
		<body>
			<nav>
				<!-- <ul id="menu">
					<li class="right last"><a href="dashboard.php" class="inscription">Dashboard</a></li>

				</ul> -->
				<ul>
				<li class="left"><a href="index.php" class="logo"><i class="fas fa-dove"></i> <?php site(); ?></a></li>
					<li class="right last"><a href="inscription.php" class="inscription"><img src="images/avatar_defaut.png" style="box-shadow: 0px 4px 4px #DCDCDC;"></a><img class="cancel" src="images/cancel.png"></li>

				</ul>
			</nav>
			<script>
				var element = document.getElementById('fass').style.display = 'none';
				function aa(){

					var elements = document.getElementById('a');
					elements.addEventListener('click',function(e){
					/*var i = document.getElementById('fas').classList.add('fa-times');
					var i = document.getElementById('fas').classList.remove('fa-bars');*/
					var element1 = document.getElementById('fass').style.display = 'block';
						var element2 = document.getElementById('fas').style.display = 'none';
					var element3 = document.getElementById('menu').style.display = 'block';

				});
				}
				function tt(){
					var elementsz = document.getElementById('a');
				elementsz.addEventListener('click',function(e){
					/*var i = document.getElementById('fas').classList.add('fa-times');
					var i = document.getElementById('fas').classList.remove('fa-bars');*/
					var element1 = document.getElementById('fass').style.display = 'none';
					var element2 = document.getElementById('fas').style.display = 'block';
					var element3 = document.getElementById('menu').style.display = 'none';


				});
				}



				/*var elementsd = document.getElementById('body');
				elementsd.addEventListener('click',function(e){
					var is = document.getElementById('fas').classList.remove('fa-times');
					var is = document.getElementById('fas').classList.add('fa-bars');
					var elementr = document.getElementById('menu').style.display = 'none';

				});*/
			</script>
			<?php

			if(isset($_GET['account'])){
				?>
				<div id="no_success">
					<p>Vous avez déjà un compte / Pseudo déjà utilisé ! <a onClick="document.getElementById('no_success').style.display = 'none';"> <i class="fas fa-times"></i>  </a></p>
				</div>
				<?php
			}
			if(isset($_GET['inscription'])){
				?>
				<div id="yes_success">
					<p>Votre compte à été crée !<a onClick="document.getElementById('yes_success').style.display = 'none';"> <i class="fas fa-times"></i>  </a></p>
				</div>
				<?php
			}
			if(isset($_GET['inscriptions'])){
				?>
				<div id="erreur_success">
					<p>Le pseudo ou l'email est déjà utilisé<a onClick="document.getElementById('erreur_success').style.display = 'none';"> <i class="fas fa-times"></i>  </a></p>
				</div>
				<?php
			}
			if(isset($_GET['erreur'])){
				?>
				<div id="erreur_success">
					<p>Certains champs sont manquants !<a onClick="document.getElementById('erreur_success').style.display = 'none';"> <i class="fas fa-times"></i>  </a></p>
				</div>
				<?php
			}

			if(isset($_GET['mdp'])){
				?>
				<div id="no_success">
					<p>Les mots de passes ne correspondes pas !<a onClick="document.getElementById('no_success').style.display = 'none';"><i class="fas fa-times"></i> </a></p>
				</div>
				<?php
			}
			?>
			<div class="inscription_card">
				<h1 style="margin-top: 75px; font-size: 64px;">Inscription à votre <span style="color: #7DCEA0;">espace</span>.</h1>
					<p style="color: #333333;font-size: 24px;font-weight: 0;">Inscrivez-vous pour maintenant pour gagner de l'argent facilement.</</p>
				<form method="post" action="<?php 
			
			if(isset($_GET['parrain'])){
				if(!empty($_GET['parrain'])){
					echo 'inscription_envoye.php?parrain='.$_GET['parrain'];
				}
				else{
					echo 'inscription_envoye.php?parrain=Systeme';
				}
			}
			else{
				echo 'inscription_envoye.php?parrain=Systeme';
			}

			
			?>" style="border: none;
				height: 1081px;">
					<img src="images/avatar_defaut.png" class="avatar_login"><br>
						<p class="log"><span style="color: #7DCEA0">Inscrivez</span>-vous pour commencer</p>
						<legend style="color: #333333; font-size: 14px;">Entrer votre pseudo</legend>
					<input type="text" style="border: none;color: #D5D5D5; border-radius: 4px; width: 397px;" name="pseudo" placeholder="pseudo" required>
					<legend style="color: #333333; font-size: 14px;">Entrer votre e-email</legend>
					<input type="email" style="border: none;color: #D5D5D5; border-radius: 4px; width: 397px;" name="email" placeholder="email" required>
					<legend style="color: #333333; font-size: 14px;">Entrer votre adresse paypal</legend>
					<input type="text" style="border: none;color: #D5D5D5; border-radius: 4px; width: 397px;"  name="paypal" placeholder="paypal" required>
					<legend style="color: #333333; font-size: 14px;">Entrer votre mot de passe</legend>
					<input type="password" style="border: none;color: #D5D5D5; border-radius: 4px; width: 397px;" name="motdepasse" placeholder="Mot de passe" required>
					<legend style="color: #333333; font-size: 14px;">Répétez votre mot de passe</legend>
					<input type="password" style="border: none;color: #D5D5D5; border-radius: 4px; width: 397px;" name="motdepasse2" placeholder="Retaper votre mot de passe" required>
					<input type="submit" value="Suivant" class="submit" style="margin-top: 45px;">
					<p class="have" style="font-size: 14px;color:#333333;">Vous avez un compte ?<span style="color: #00CC6F;"> <a href="connexion.php" style="text-decoration: none;color: #7DCEA0;">Sign in</a></span></p>
				</form>
				<img src="images/call_not_connected.jpg" class="call">
				<img src="images/the_different_business.png" class="different">
			</div>
			
			<footer><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia delectus voluptates, possimus iure modi, quia sunt sed cupiditate deleniti excepturi unde accusamus temporibus error. Ea quos repellat aspernatur facilis repellendus?</p></footer>
		</body>
	</html>
