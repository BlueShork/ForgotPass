<?php 
session_start();
include('class/get_name_site.php');
if(isset($_SESSION['id']) AND isset($_SESSION['email'])){
	include("config/config.php");
				$req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
				$req->execute(array(
					':email' => $_SESSION['email'],
				));
				$donnees = $req->fetch();
				$mail = $donnees['email'];
				$ban = $donnees['ban'];
				$pseudo = $donnees['pseudo'];
					$_SESSION['grades'] = $donnees['grades'];
					$grades = $donnees['grades'];
	?>

	<!DOCTYPE html>
		<html>
			<head>
				<title><?php site(); ?> - Boutique</title>
				<meta charset="utf-8">
				<link rel="stylesheet" href="css/dashboard.css">
				<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
			<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
				<link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
				<link rel="stylesheet" href="css/informations.css">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

			<meta name="viewport" content="width=device-width, initial-scale=1">
			</head>
			<body>
				<body id="para">
			<?php 
				 
				if(isset($_GET['envoye'])){
					?>
					<div id="missions">
						<a onclick="fermer()" id="fermer" href="demande_paiement.php?actif=#"><i class="far fa-times-circle"></i></a>
					<p class="first">Votre demande est en cours de validation.</p>
						<p class="merci">Vous recevrez votre paiement dans quelques jours maximum.</p>
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
						<li class="fonts left racc pseudo_li hover"><a style="cursor: pointer;"><i class="fas fa-money-check-alt"></i> Gagner de l'argent</a>
							<ul class="submenue">
							<li><a href="cashlinks.php"><img src="images/chain.svg" class="crown"> Cashlinks</a></li>
								<li><a href="inscription_liens.php"><img src="images/list.svg" class="crown"> Inscription remun??r??s</a></li>
								<li><a href="wanna.php"><img src="images/list.svg" class="crown"> Sondage</a></li>
<li><a href="wanna_offer.php"><img src="images/list.svg" class="crown"> Offerwall</a></li>
								<li><a href="liens_parrainage.php"><img src="images/shout.svg" class="crown"> Parrainage</a></li>
							</ul>
						</li>
						<li class="fonts left racc pseudo_li"><a style="cursor: pointer"><i class="fas fa-info"></i> Informations</a>
							<ul class="submenue in">
							<li><a href="classement.php"><img src="images/podium.svg" class="crown"> Classement</a></li>
							<li><a href="contact.php"target="_blank"><img src="images/discord.svg" class="crown"> Contact</a></li>
								<li><a href="deconnexion.php"><img src="images/sign-out-option.svg" class="crown"> Se d??connecter</a></li>
								<!--<li><a href="#"><img src="images/settings.svg" class="crown"> Param??tres</a></li>
								<li><a href="demande_paiement.php"><img src="images/online-store.svg" class="crown"> Demande de paiement</a></li>-->
							</ul>
						</li>
						<li class="fonts left racc pseudo_li hover active"><a href="demande_paiement.php"><i class="fas fa-shopping-cart"></i> Boutique</a>
						
						<li class="fonts right pseudo_li hover"><a class="pseudo"><i class="fas fa-user-circle"></i> <?php echo $pseudo; ?>

					</li>
						<li class="fonts money"><a href="#" class="coin"><div class="coins">
				
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
						<!-- <li class="fonts right notif notif racc pseudo_li hover"><a href="#" onclick='document.getElementById("notif-sub").style.display = "block";'><i class="fas fa-trophy"><span class="notife">1</span></i></a>
							<ul class="notif-sub" id="notif-sub">
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
	<span class="ko">&lt;progress&gt; non support?? par votre navigateur !</span>
</progress><br><br>
<?php 
$req = $bdd->prepare('SELECT * FROM quetes_verif WHERE nom_quetes = :nom_quetes AND pseudo = :pseudo');
$req->execute(array(
	':nom_quetes' => 'R??compenses',
	':pseudo' => $pseudo,
));
$donnees1 = $req->fetch();

if($donnees1['nom_quetes'] != 'R??compenses'){
?>
	<!--<button class="reward"><a href="crediter.php?pseudo=<?php echo $pseudo;?>&gains=5">R??cup??rer</a></button>-->
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
	<span class="ko">&lt;progress&gt; non support?? par votre navigateur !</span>
</progress><br><br>

	<?php
				}

								?>
							</ul>
							</li> -->
					</ul>
				</nav>
			</div>
			<div class="truechat" style="display: none;" id="truechat">
				<h2>G??n??rale  </h2><div class="chat time" onclick="fermerchat()" id="chate">
				<span class="icone"><i class="fas fa-times"></i></span>
			</div>
			<div class="messagesbox" id="messagebox">
			<?php 

$req = $bdd->query('SELECT * FROM chat ORDER BY id DESC LIMIT 25');


while($donnees2 = $req->fetch()){
    $pseudo_chat = $donnees2['pseudo'];
    $messages = $donnees2['messages'];
    if($pseudo_chat == $pseudo){
		?>
		<div class="me_send">
				   <p><?php echo $messages;?></p>
			   </div>
	   <?php
	}
	else{
		?>
		 <div class="message_send">
					<p><?php echo $messages;?></p>
					<span class="pseudo"><?php echo $pseudo_chat;?></span>
				</div>
		<?php
	}
    
}
?>


				
			</div>
			<form method="POST" action="envoye_message.php?red=dashboard.php" class="chat_form">
					<input type="text" name="messages" required placeholder="??crivez un petit mot d'amour :p">
					<button type="submit"><i class="far fa-paper-plane"></i></button>
				</form>
				

			</div>

			<div class="chat" onclick="chat()" id="chat">
				<span class="icone"><i class="fas fa-comments"></i></span>
			</div>
				<script>

					function chat(){
						var element = document.getElementById("truechat");
						element.style.display="block";

						var element2 = document.getElementById("chat");
						element2.style.display="none";

					}

					function fermerchat(){
						var element4 = document.getElementById("truechat");
						element4.style.display="none";
						var element3 = document.getElementById('chat');
						element3.style.display = "block";
					}
				</script>
			<div class="global"  id="messagea">
			<div class="tuto">
				<img src="images/confetti.svg">
				<h1>New Design in 2019 !</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
					quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
					consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
					cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
					proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					<a href="#" id="cross" class="continu" onclick="document.getElementById('messagea').style.display ='none';"><i class="fas fa-times"></i></a>			
				</div>
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

                    
<div class="pub-header"></div>
                   
                    
<div id="contener" class="row">

<div id="page_contener_left" class="col">
  <p style="overflow: hidden;" id="messages3"><i class="fas fa-globe-africa"></i><?php
include('config/config.php');
$temps_session = 15;
$temps_actuel = date("U");
$user_ip = $_SERVER['REMOTE_ADDR']; // $_SERVER('REMOTE_ADDR')
$req_ip_exist = $bdd->prepare('SELECT * FROM online WHERE ip = ?');
$req_ip_exist->execute(array($user_ip));
$ip_existe = $req_ip_exist->rowCount();
if($ip_existe == 0) {
$add_ip = $bdd->prepare('INSERT INTO online(ip,time) VALUES(?,?)');
$add_ip->execute(array($user_ip,$temps_actuel));
} else {
$update_ip = $bdd->prepare('UPDATE online SET time = ? WHERE ip = ?');
$update_ip->execute(array($temps_actuel,$user_ip));
}
$session_delete_time = $temps_actuel - $temps_session;
$del_ip = $bdd->prepare('DELETE FROM online WHERE time < ?');
$del_ip->execute(array($session_delete_time));
$show_user_nbr = $bdd->query('SELECT * FROM online');
$user_nbr = $show_user_nbr->rowCount();
echo ' '.$user_nbr.' ';if($user_nbr > 1){echo "utilisateurs";}else{echo "utilisateur";}if($user_nbr != 1) { }
echo ' en ligne';
?>
</p>

</div>
<?php 


if(isset($_GET['message'])){
?>
<script>
var element = document.getElementById("truechat");
					element.style.display="block";

					var element2 = document.getElementById("chat");
					element2.style.display="none";
					
					</script>
<?php
}
else{

}

?>
<div id="page_contener_right" class="col" style="display: inline-block;">
  <p id="messages1" style="display: inline-block;"><i class="fas fa-bullseye"></i> <?php 

			
$req = $bdd->query('SELECT SUBSTRING(sum(gains), 1, 5) AS gains_total FROM quetes_liens');
$donnees = $req->fetch();
if(isset($donnees['gains_total'])){
?>
<?php echo round($donnees['gains_total'], 0, PHP_ROUND_HALF_UP); ?> en circulation</i>
<?php
}
else{
?>
0
<?php
}
?></p>
</div>
<div id="page_contener_right2" class="col-2"> 
  <p id="messages"><i class="fas fa-newspaper"></i> <?php 

	   
$reponse = $bdd->query('SELECT *, DATE_FORMAT(dates_quetes, "%d %M ?? %H H %i ") AS quetes_dd FROM  quetes_liens ORDER BY id DESC LIMIT 0,1');
$donnees = $reponse->fetch();
   echo $donnees['pseudo'].' vient de finir la mission ';
   echo $donnees['nom_quetes'].' + ';
   echo $donnees['gains'].' <i class="fas fa-bullseye"></i>';
?>
				
				
				</p>
				<script src="http://code.jquery.com/jquery-latest.js" > </script>

<script>
var refreshId = setInterval(function()
{
  $('#messages').fadeOut("slow").load('refresh.php').fadeIn("slow");
}, 10000);
</script>

<script>
var refreshId = setInterval(function()
{
  $('#messages1').fadeOut("slow").load('refresh2.php').fadeIn("slow");
}, 10000);
</script>
<script>
var refreshId = setInterval(function()
{
  $('#messages3').fadeOut("slow").load('refresh3.php').fadeIn("slow");
}, 10000);
</script>
<script>
var refreshId = setInterval(function()
{
  $('#messagebox').load('chat.php')
}, 1000);
</script>
				<script>
function refresh_div()
{
var xhr_object = null;
if(window.XMLHttpRequest)
{ // Firefox
xhr_object = new XMLHttpRequest();
}
else if(window.ActiveXObject)
{ // Internet Explorer
xhr_object = new ActiveXObject('Microsoft.XMLHTTP');
}
var method = 'POST';
var filename = 'refresh.php';
xhr_object.open(method, filename, true);
xhr_object.onreadystatechange = function()
{
if(xhr_object.readyState == 4)
{
var tmp = xhr_object.responseText;
document.getElementById('refresh').innerHTML = tmp;
setTimeout(refresh_div, 10000);
}
}
xhr_object.send(null);
}
</script>
</div>
</div>

				 <div class="Informations" id="Informations">
                    	<p><a href="#" onclick="document.getElementById('Informations').style.display ='none';document.getElementById('attente').style.marginTop= '1%';"><i class="fas fa-times"></i></a><script>
                    	var heure = new Date();

                    	var element = heure.getHours(heure);

                    	switch(element){
                    		case 21 :
                    		document.write('Bonsoir, ');
                    		break; 

                    		case 22 :
                    		document.write('Bonsoir, ');
                    		break;

                    		case 23 :
                    		document.write('Bonsoir, ');
                    		break;

                    		case 00 :
                    		document.write('Bonsoir, ');
                    		break;

                    		default: 
                    		document.write('Bonjour, ');

                    	}


                    </script><?php echo $_SESSION['pseudo'];?> content de vous revoir parmi nous !</p>
                    </div>

				
				</div>
			<div class="title_gains">
				<h1>Demander un paiement :</h1>
						<p>INFO : 1000 points = 1 EURO</p>
			</div>

			<!-- <?php 

				
				$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $pseudo,
				));
				$donnees = $req->fetch();
				
				if($donnees['gains_total'] >= 1000){
					$gains = $donnees['gains_total'];
					
					?>
				<div class="contact">
					<form method="post" action="envoyer_contact.php">
						<input type="text" name="point" class="messages" placeholder="Combien retirer ? >= 1000" required>
						<input type="email" name="message" class="messages" placeholder="Votre email PayPal" required>
						<input type="submit" class="submit" value="Demander">
					</form>
			</div>
					<?php
				}
				else{
					$gains = $donnees['gains_total'];
					$seuil = 1000;
					?>
					<p class="nop"><i class="fas fa-question-circle"></i>  E-Gardiens vous n'avez pas finis encore de compl??ter toutes les qu??tes, il vous manque encore : <?php echo $seuil-$gains;?> G-Bucks</p>
					<?php
				}
				?> -->
				<div class="container">
				
				<div id="global_giftcard" class="row">
					<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/paypal.png">
							<p style="text-align: center;">Virement Paypal</p>
							<div class="alert alert-danger" style="text-align: center"><i class="fas fa-exclamation-triangle"></i> L'email sera utilis??e pour le versement</div>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 2500){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="2500" style='display: none;'>
									<input type="text" name="types" class="messages" required value="paypal" style="display: none;">
									<input type="email" name="message" class="messages" placeholder="Votre email PayPal" required>
									<input type="submit" class="submit" value="Demander 2.5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="paypal" style="display: none;">
									<input type="email" name="message" class="messages" placeholder="Votre email PayPal" required>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 2500 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/amazon.png">
							<p style="text-align: center;">Carte Amazon</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="Amazon" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="Amazon" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/steam.png">
							<p style="text-align: center;">Carte Steam</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="steam" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="steam" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/instantgaming.png">
							<p style="text-align: center;">Carte InstantGaming</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="instantgaming" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="instantgaming" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="w-100"></div>
				<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/xbox.png">
							<p style="text-align: center;">Carte XBOX</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="xbox" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="xbox" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/psn.png">
							<p style="text-align: center;">Carte PSN</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="psn" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="psn" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="gift_card col">

						<img src="https://www.ba-click.com/img/partenaires/paysafecard.png">
							<p style="text-align: center;">Carte Paysafecard</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="Paysafecard" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="Paysafecard" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>

									
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				<div class="gift_card col">

						<img src="https://dundle.com/resources/images/products/340w/nintendo-340w.png">
							<p style="text-align: center;">Carte Nintendo E-Shop</p>
							<?php 
							
							$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1,7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
							$req->execute(array(
								':pseudo' => $pseudo,
							));
							$donnees = $req->fetch();
							if($donnees['gains_total'] >= 5000){
								$gains = $donnees['gains_total'];
								?>
								<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="5000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="nintendo" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 5???">
									
									</form>

									
									</button>
								<?php
								if($donnees['gains_total'] >= 10000){
									?>
									<button id="ten">
									
									<form method="post" action="envoyer_contact.php">
									<input type="text" name="point" class="messages" required value="10000" style='display: none;'>
									<input type="text" name="types" class="messages" required value="nintendo" style="display: none;">
									<input type="email" name="message" class="messages" value="<?php echo $_SESSION['email'];?>" style='display: none;'>
									<input type="submit" class="submit" value="Demander 10???">
									
									</form>							
									</button>
									<?php
								}
							}
							else{
								?>
								<div class="alert alert-primary" style="text-align: center;">Vous n'avez pas le montant requis | 5000 points ou 10 000 points</div>
								<?php
							}
							?>

				</div>
				</div>

				</div>
				
			 

				<!-- Card paiement paypal -->



				
				<!--<div class="card">
					<span class="original"><p class="fonts"><i class="fab fa-paypal"></i> PayPal</p></span>
					<img src="images/paypal.png" class="mario" alt="Erreur -59">
					<p class="name">1??? </p>
					
				


					<div class="progress-div">
<progress id="progress" value="950" max="1000">
	<span class="ko">&lt;progress&gt; non support?? par votre navigateur !</span>
</progress><br><br>

<p>
</div>

						
				</div>
				
			</div>
			<div class="card">
					<span class="original"><p class="fonts"><i class="fab fa-paypal"></i> PayPal</p></span>
					<img src="images/paypal.png" class="mario" alt="Erreur -59">
					<p class="name">10??? </p>
					
				


					<div class="progress-div">
<progress id="progress" value="950" max="10000">
	<span class="ko">&lt;progress&gt; non support?? par votre navigateur !</span>
</progress><br><br>

<p>
</div>

						
				</div>
				
			</div>
				-->



				<!-- Fin -->



			 <footer>
          
		  <p><i class="far fa-copyright"></i> <?php date('Y'); ?> <?php site(); ?></p>

	 </footer>
			</body>
		</html>

	<?php
}
else{
	echo 'Vous avez ??t?? d??connect?? reconnectez vous !';
	?>
	<script>document.location="connexion.php"</script>
	<?php
}

?>













































