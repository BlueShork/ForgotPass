
<?php 
session_start();
include('class/get_name_site.php');
if(isset($_SESSION['id']) AND isset($_SESSION['pseudo'])){
	        include("config/config.php");
				$req = $bdd->prepare('SELECT * FROM inscription WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $_SESSION['pseudo'],
				));
				$donnees = $req->fetch();
				$id = $donnees['id'];
				$mail = $donnees['email'];
				$ban = $donnees['ban'];
				$pseudo = $donnees['pseudo'];
				$grades = $donnees['grades'];
				if($ban != 1){
					?>
					<!DOCTYPE html>
		<html>
			<head>
				<title><?php site(); ?> - WMobile</title>
				<meta charset="utf-8">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<link rel="stylesheet" href="css/dashboard.css">
				<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
				<link rel="stylesheet" href="css/ptc.css">
				<link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

			<link rel="stylesheet" href="css/ptc.css">
			</head>
			<body id="para">
			<?php 
				
				if(isset($_GET['quetes'])){
					?>
					<div class="message" id="missions">
						<a onclick="fermer()" id="fermer" href="dashboard.php?actif=#"><i class="far fa-times-circle"></i></a>
					<p class="first">Vous avez réussit une quête !</p>
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
				<div class="main" id="menu">
				<nav>
				<?php include('./class/get_mobile_menu.php'); ?>
					<ul class="menu none1">
						<li class="fonts none"><a href="index.php"><i class="fas fa-dove"></i> <?php site(); ?></a></li>
							<li class="fonts left racc pseudo_li hover"><a href="dashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
						<li class="fonts left racc pseudo_li hover active"><a style="cursor:pointer;" href="cashlinks.php"><i class="fas fa-money-check-alt"></i> Gagner de l'argent</a>
							<ul class="submenue">
								<li><a href="cashlinks.php"><img src="images/chain.svg" class="crown"> Cashlinks</a></li>
								<li><a href="inscription_liens.php"><img src="images/list.svg" class="crown"> Inscription remunérés</a></li>
								<li><a href="wanna.php"><img src="images/list.svg" class="crown"> Sondage</a></li>
								<li><a href="wanna_offer.php"><img src="images/list.svg" class="crown"> Offerwall</a></li>
								<li><a href="liens_parrainage.php"><img src="images/shout.svg" class="crown"> Parrainage</a></li>
							</ul>
						</li>
						<li class="fonts left racc pseudo_li hover"><a style="cursor: pointer;"><i class="fas fa-info"></i> Informations</a>
							<ul class="submenue in">
							<li><a href="classement.php"><img src="images/podium.svg" class="crown"> Classement</a></li>
							<li><a href="contact.php"target="_blank"><img src="images/discord.svg" class="crown"> Contact</a></li>
								<li><a href="deconnexion.php"><img src="images/sign-out-option.svg" class="crown"> Se déconnecter</a></li>
								<!--<li><a href="#"><img src="images/settings.svg" class="crown"> Paramètres</a></li>
								<li><a href="demande_paiement.php"><img src="images/online-store.svg" class="crown"> Demande de paiement</a></li>-->
							</ul>
						</li>
						<li class="fonts left racc pseudo_li hover"><a href="demande_paiement.php"><i class="fas fa-shopping-cart"></i> Boutique</a>
						
						<li class="fonts right pseudo_li hover"><a class="pseudo"><i class="fas fa-user-circle"></i> <?php echo $donnees['pseudo']; ?>

					</li>
						<li class="fonts money"><a class="coin"><div class="coins">
				
				<?php 

				
				$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1, 7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $pseudo,
				));
				$donnees = $req->fetch();
				if(isset($donnees['gains_total'])){
					?>
					<?php echo $donnees['gains_total']; ?>  <i class="fas fa-bullseye"></i>
					<?php
				}
				else{
					?>
					0 <i class="fas fa-bullseye"></i>
					<?php
				}
				?>
			</div></a></li>
						<!-- <li class="fonts right notif notif racc pseudo_li hover"><a href="#" onclick='document.getElementById("notif-sub").style.display = "block";'><i class="fas fa-trophy"><span class="notife">1</span></i></a> -->
							<!-- <ul class="notif-sub" id="notif-sub">
								<h3><a onclick='document.getElementById("notif-sub").style.display = "none";'><i id="times-n" class="fas fa-times"></i></a></h3>
								<p class="request">Faire 10 cashlinks</p><?php 
$int_participation1 = 10;
								$req = $bdd->prepare('SELECT COUNT(*) AS gains_total FROM quetes_verif WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $pseudo,
				));
				$donnees = $req->fetch();
				if($donnees['gains_total'] >= 10){
					$_SESSION['reward'] = 'accept';
					?> 
					<progress class="progress" id="progress" value="<?php echo $donnees['gains_total'];?>" max="<?php echo $int_participation1; ?>">
	<span class="ko">&lt;progress&gt; non supporté par votre navigateur !</span>
</progress><br><br>
<?php 
$req = $bdd->prepare('SELECT * FROM quetes_verif WHERE nom_quetes = :nom_quetes AND pseudo = :pseudo');
$req->execute(array(
	':nom_quetes' => 'Récompenses',
	':pseudo' => $pseudo,
));
$donnees1 = $req->fetch();

if($donnees1['nom_quetes'] != 'Récompenses'){
?>
	<button class="reward"><a href="crediter.php?pseudo=<?php echo $pseudo;?>&gains=5">Récupérer</a></button>
	<?php
}
else{

	echo '<p class="center">Revenez demain</p>';
}

?>

	<?php
				}
				else{
					?>
					<progress class="progress" id="progress" value="<?php echo $donnees['gains_total'];?>" max="<?php echo $int_participation1; ?>">
	<span class="ko">&lt;progress&gt; non supporté par votre navigateur !</span>
</progress><br><br>

	<?php
				}

								?>
							</ul> 
							</li>-->
					</ul>
				</nav>
			</div>
			
			<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
                     <script type="text/javascript">
                       $(document).ready(function(){
                         $('.menu').click(function(){
                           $('ul').toggleClass('active');
                         })
                       })
                     </script>
                     <script>
                        $(".btn").on("click", function(){
                            $(".note").toggleClass("hide");
                        })
                    </script>
          
                   





				
        <iframe src="https://surveywall.wannads.com/?apiKey=607ebbd8b3728369256886&userId=<?php echo $id; ?>" style="position:absolute; width: 100%;height:100%;top:55px; left:0px; bottom:0px; right:0px;  border:none; margin:0; padding:0; overflow:hidden; z-index:999999;frameborder='0';"></iframe>
				

<!-- EDND -->



<script>
					function changeColor(newColor) {
  var elem = document.getElementById('para');
  elem.style.background = newColor;

   var eleme = document.getElementById('fg');
  eleme.style.color = '#fff';

}
				</script>

			</body>
		</html>
					<?php
				}else{
					?>
					<!DOCTYPE html>
						<html>
							<head>
								<title>Vous êtes bannis !</title>
								<meta charset="utf-8">
								
								<link rel="stylesheet" href="css/ban.css">
				<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
			<meta name="viewport" content="width=device-width, initial-scale=1">
							</head>
							<body>
								<div class="center">
						<h1>Vous êtes bannis.<br>
						Veuillez nous contacter sur discord en cas d'erreur.<br>Cordialement BlueShork</h1>
					</div>
							</body>
						</html>
					<?php
				}
}
else{
	echo 'Vous avez été déconnecté reconnectez vous !';
	?>
	<script>document.location="connexion.php"</script>
	<?php
}

?>
















































































