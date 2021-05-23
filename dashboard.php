<?php 
session_start();
include('class/get_name_site.php');
if(isset($_SESSION['id']) AND isset($_SESSION['email'])){
	        include("config/config.php");
				$req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
				$req->execute(array(
					':email' => $_SESSION['email'],
				));
				$donnee = $req->fetch();
				$mail = $donnee['email'];
				$ban = $donnee['ban'];
				$pseudo = $donnee['pseudo'];
					$_SESSION['grades'] = $donnee['grades'];
					$grades = $donnee['grades'];
					$_SESSION['pseudo'] = $pseudo;
					$_SESSION['email'] = $mail;
				if($ban != 1){
					?>
	<!DOCTYPE html>
		<html>
			<head>
				<title><?php site(); ?> - Dashboard</title>
				<meta charset="utf-8">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<link rel="stylesheet" href="css/dashboard.css">
				<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
				<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald|Raleway" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
			      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
				  <link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet"> 
				  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

			</head>
			<body id="para">
				
				
			<?php 
				 
				if(isset($_GET['quetes'])){
					?>
					<div class="message" id="missions">
						<a onclick="fermer()" id="fermer" href="dashboard.php?actif=#"><i class="far fa-times-circle"></i></a>
					<p class="first">Vous avez réussit une quête !</p>
						<p>Encore plus de coins à gagner !</p>
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
							<li class="fonts left racc pseudo_li hover active"><a href="dashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
						<li class="fonts left racc pseudo_li hover"><a style="cursor:pointer;" href="cashlinks.php"><i class="fas fa-money-check-alt"></i> Gagner de l'argent</a>
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
						
						<li class="fonts right pseudo_li hover"><a class="pseudo"><i class="fas fa-user-circle"></i> <?php echo $donnee['pseudo']; ?>

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
			<div class="truechat" style="display: none;" id="truechat">
				<h2>Générale  </h2><div class="chat time" onclick="fermerchat()" id="chate">
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
					<input type="text" name="messages" required placeholder="Écrivez un petit mot d'amour :p">
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
	  <p id="messages1" style="display: inline-block;"><i class="fas fa-bullseye"></i><?php 

				
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

           
$reponse = $bdd->query('SELECT *, DATE_FORMAT(dates_quetes, "%d %M à %H H %i ") AS quetes_dd FROM  quetes_liens ORDER BY id DESC LIMIT 0,1');
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
<div id="coordinate" class="right_display">
		<h5>Informations</h5>
		<p>Une question ou un bug ? Contactez-nous !</p>
		<div class="report_span"><a href="contact.php" class="report_button"><button type="button" class="btn btn-warning btn-bug">Report bug</button></a></div>
</div>
				 <div class="Informations" id="Informations">
                    	<p><a href="#" onclick="document.getElementById('Informations').style.display ='none';document.getElementById('attente').style.marginTop= '1%';"><i class="fas fa-times" style="display: none;"></i></a><script>
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


                    </script><?php echo $donnee['pseudo'];?> content de vous revoir parmi nous. 	<?php 

				
$req = $bdd->prepare('SELECT SUBSTRING(sum(gains), 1, 7) AS gains_total FROM quetes_liens WHERE pseudo = :pseudo');
$req->execute(array(
	':pseudo' => $pseudo,
));
$donnees = $req->fetch();
if(isset($donnees['gains_total'])){
	?>
	Vous avez 
	<?php echo $donnees['gains_total']; ?>  <i class="fas fa-bullseye"></i>
	<?php
}
else{
	?>
	0 <i class="fas fa-bullseye"></i>
	<?php
}
?> </p>
                    </div>

					

				
				

				<!--<div class="title_gains">
				<h1 class="fg">Nos giveaways en cours : (<?php 
				
				
				
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM lots');
				$donnees = $reponse->fetch();
			
				
				$reponses = $bdd->query('SELECT COUNT(*) AS counte_p FROM lots_partenariat');
				$donneess = $reponses->fetch();
				$donneess['counte_p'];
				echo $donnees['counte'] + $donneess['counte_p'];
				
				?>)</h1>
			</div>
				
			<?php 

			 
			$req = $bdd->query('SELECT * FROM lots');

			while($donnees = $req->fetch()){
				$id = $donnees['id'];
				$int_participation = $donnees['int_participation'];
				?>
				<div class="card">
					<span class="original"><p class="fonts"><i class="fas fa-globe"></i> Original</p></span>
					<img src="images/gg_by_nezox.png" class="mario" alt="Erreur -59">
					<p class="name"><span class="chiffre"><?php echo $donnees['name']; ?> <i class="fas fa-bullseye"></i> </span></p>
					
				


					<div class="progress-div">
<progress id="progress" value="<?php 

        
			$reponse = $bdd->prepare('SELECT COUNT(*) AS counten_p FROM participations WHERE id_participations = :id_participations');
			$reponse->execute(array(
				':id_participations' => $id,
			));
          $donnees = $reponse->fetch();
                echo $donnees['counten_p'];
            ?>" max="<?php echo $int_participation; ?>">
	<span class="ko">&lt;progress&gt; non supporté par votre navigateur !</span>
</progress><br><br>
 <?php echo $donnees['counten_p']; ?> / <?php echo $int_participation;?>
<p>
</div>

							<div class="button">
							<?php

							if($_COOKIE[$id] === $id){
								?>
								<p class="temps">Vous pourrez participer dans 10 minutes !</p>
								<?php
							}
							else{
								?>

								<a href="participer.php?id=<?php echo $id; ?>" class="participer"> <i class="fas fa-caret-right"></i> Participer</a>
								
								<?php
							}
							 ?>
						</div>
				</div>
				
			</div>
				<?php
			}
			?>



			<?php 

			
			$req = $bdd->query('SELECT * FROM lots_partenariat');
			while($donnees = $req->fetch()){
				$id = $donnees['id'];
				?>
				<div class="card partner">
					<span class="partenariat"><p class="fonts"> <i class="fas fa-hands-helping"></i>  Partenariat</p></span>
					<img src="images/headache.png" class="mario" alt="Erreur -59">
					<p class="name"><span class="chiffre"><?php echo $donnees['nb']; ?></span></p>
					<div class="progress-div">
<progress id="progress" value="<?php 

          
			$reponse = $bdd->prepare('SELECT COUNT(*) AS counten_p FROM participations_partenariat WHERE id_participations = :id_participations');
			$reponse->execute(array(
				':id_participations' => $id,
			));
          $donnees = $reponse->fetch();
                echo $donnees['counten_p'];
            ?>" max="<?php echo $int_participation; ?>">
	<span class="ko">&lt;progress&gt; non supporté par votre navigateur !</span>
</progress><br><br>
<?php 

           
			$reponse = $bdd->prepare('SELECT COUNT(*) AS counten_p FROM participations_partenariat WHERE id_participations = :id_participations');
			$reponse->execute(array(
				':id_participations' => $id,
			));
          $donnees = $reponse->fetch();
               $calculs = $donnees['counten_p'].'/'.$int_participation.'';
                echo $calculs;
            ?>
<p>
</div>

							<div class="button">
							<?php

							if($_COOKIE['participations'] === "partner"){
								?>
								<p class="temps">Vous pourrez participer dans 50 minutes</p>
								<?php
							}
							else{
								
			$reponse = $bdd->prepare('SELECT *  FROM lots_partenariat WHERE id = id');
			$reponse->execute(array(
				':id' => $id,
			));
          $donnees = $reponse->fetch();
								?>
								<a href="<?php echo $donnees['lien']; ?>" class="participer"> <i class="fas fa-caret-right"></i> Participer</a>
								<?php
							}
							 ?>
						</div>
				</div>
				
			</div>
				<?php
			}
			?>







<!--

<div class="title_gains">
				<h1 class="fg"
				id="fg">Giveaways Journalier  : (<?php 
				
				
				
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM giveaways_journalier');
				$donnees = $reponse->fetch();
				echo $donnees['counte'];
				
				?>)</h1>
			</div>



			<?php 

			 
			$req = $bdd->query('SELECT * FROM giveaways_journalier');

			while($donnees = $req->fetch()){
				$id = $donnees['id'];
				?>
				<div class="card">
					<span class="original"><p id="demo" class="fonts"></p></span>
					<img src="images/279.jpg" class="mario" alt="Erreur -59">
					<p class="name"><span class="chiffre"><?php echo $donnees['nom']; ?></span></p>
					
				<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $donnees['dates_finish']; ?>").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get todays date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = "<i class='fas fa-clock'></i> " + days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  // If the count down is finished, write some text 
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("demo").innerHTML = "<?php echo 'Tirage en cours ... '?>";
  }
}, 1000);
</script>


					<div class="progress-div">
<?php 

			$reponse = $bdd->prepare('SELECT COUNT(*) AS counten_p FROM participations_journalier WHERE id_participation = :id_participation');
			$reponse->execute(array(
				':id_participation' => $id,
			));
          $donnees = $reponse->fetch();
                $calculs = $donnees['counten_p'];
                echo 'Participations : '.$calculs;
            ?>
<p>
</div>

							<div class="button">
							<?php

							if($_COOKIE[$id] === $id){
								?>
								<p class="temps">Vous pourrez participer dans 10 minutes !</p>
								<?php
							}
							else{
								?>
								<a href="participer_journalier.php?id=<?php echo $id; ?>" class="participer"> <i class="fas fa-caret-right"></i> Participer </a>
								<?php
							}
							 ?>
						</div>
				</div>
				
			</div>
				<?php
			}
			?>

-->

<div class="boxe container">
<div class="row ">

<div class="onebox pc col-sm">
			<p class="titre" style="background: #7DCEA0;color: #fff;">NEW ! <span class="right">+10 000C</span></p>
			<img src="images/pero.png" class="missions">
			<p style="color: #666666;" class="info">Inscriptions rémunérés</p>

			<a href="inscription_liens.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<div class="onebox2 pc col-sm">
			<p class="titre" style="background: #7DCEA0;color: #fff;"><?php 
				
				
				include('config/config.php');
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM quetes');
				$donnees = $reponse->fetch();
			
				
				$reponses = $bdd->query('SELECT SUBSTRING(sum(remise), 1, 5) AS gains_total FROM quetes');
				while($donneess = $reponses->fetch()){
					echo $donnees['counte'].' missions';
					?>
					<span class="right"><?php echo $donneess['gains_total'];?> c</span></p>
					<?php
				}

				
				?>
			<img src="images/sweet.png" class="missions">
			<p class="info">Cashlinks</p>

			<a href="cashlinks.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<div class="onebox3 pc col-sm">
			<p class="titre" style="background: #7DCEA0;color: #fff;"><?php 
				
				
				include('config/config.php');
				
			
				// Click_timers
				
				$reponse_timers = $bdd->query('SELECT COUNT(*) AS counte_timers FROM click_timers');
				$donnees_timers = $reponse_timers->fetch();
				
				$reponses_timers = $bdd->query('SELECT SUBSTRING(sum(gains), 1, 5) AS gains_total_timers FROM click_timers');
				while($donneess_timers = $reponses_timers->fetch()){
					//echo $donneess_timers['gains_total_timers'];
					$gains_all_timers = $donneess_timers['gains_total_timers'];
					
					?>
					
					<?php
				}

				
				
				// END
				
				// Click_quetes
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM click_quetes');
				$donnees = $reponse->fetch();

				$reponses = $bdd->query('SELECT SUBSTRING(sum(gains), 1, 5) AS gains_total_click FROM click_quetes');
				while($donneess_click = $reponses->fetch()){
					/*echo $donnees['counte']+$donnees_timers['counte_timers'].' missions';*/
					echo 'NEW !';
					?>
					<span class="right"><?php /*echo $donneess_click['gains_total_click']+$gains_all_timers;;
					*/?> +50 000c</span></p>
					<?php
				}
				
				// END
				
				?>
			<img src="images/avatars.png" class="missions">
			<p class="info">Sondage</p>

			<a href="wanna.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<div class="onebox3 pc col-sm">
			<p class="titre" style="background: #7DCEA0;color: #fff;">Illimité<span class="right">100c/u</span></p>
			<img src="images/getpaid.gif" class="missions">
			<p class="info">OfferWall</p>

			<a href="wanna_offer.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>




</div>
	
	<div class="row">
	<!-- Mobile nav card-->
	<div class="onebox mobile">
			<p class="titre" style="background: #7DCEA0;color: #fff;">NEW ! <span class="right">+10 000C</span></p>
			<img src="images/pero.png" class="missions">
			<p style="color: #666666;" class="info">Inscriptions rémunérés</p>

			<a href="inscription_liens.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<div class="onebox2 mobile">
			<p class="titre" style="background: #7DCEA0;color: #fff;"><?php 
				
				
				include('config/config.php');
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM quetes');
				$donnees = $reponse->fetch();
			
				
				$reponses = $bdd->query('SELECT SUBSTRING(sum(remise), 1, 5) AS gains_total FROM quetes');
				while($donneess = $reponses->fetch()){
					echo $donnees['counte'].' missions';
					?>
					<span class="right"><?php echo $donneess['gains_total'];?> c</span></p>
					<?php
				}

				
				?>
			<img src="images/sweet.png" class="missions">
			<p class="info">Cashlinks</p>

			<a href="cashlinks.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<div class="onebox3 mobile">
			<p class="titre" style="background: #7DCEA0;color: #fff;"><?php 
				
				
				include('config/config.php');
				
			
				// Click_timers
				
				$reponse_timers = $bdd->query('SELECT COUNT(*) AS counte_timers FROM click_timers');
				$donnees_timers = $reponse_timers->fetch();
				
				$reponses_timers = $bdd->query('SELECT SUBSTRING(sum(gains), 1, 5) AS gains_total_timers FROM click_timers');
				while($donneess_timers = $reponses_timers->fetch()){
					//echo $donneess_timers['gains_total_timers'];
					$gains_all_timers = $donneess_timers['gains_total_timers'];
					
					?>
					
					<?php
				}

				
				
				// END
				
				// Click_quetes
				$reponse = $bdd->query('SELECT COUNT(*) AS counte FROM click_quetes');
				$donnees = $reponse->fetch();

				$reponses = $bdd->query('SELECT SUBSTRING(sum(gains), 1, 5) AS gains_total_click FROM click_quetes');
				while($donneess_click = $reponses->fetch()){
					/*echo $donnees['counte']+$donnees_timers['counte_timers'].' missions';*/
					echo 'NEW !';
					?>
					<span class="right"><?php /*echo $donneess_click['gains_total_click']+$gains_all_timers;;
					*/?> +50 000c</span></p>
					<?php
				}
				
				// END
				
				?>
			<img src="images/avatars.png" class="missions">
			<p class="info">Sondage</p>

			<a href="wanna.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<div class="onebox3 mobile">
			<p class="titre" style="background: #7DCEA0;color: #fff;">Illimité<span class="right">100c/u</span></p>
			<img src="images/hercules-large.png" class="missions">
			<p class="info">Parrainage</p>

			<a href="liens_parrainage.php" class="start">Commencer</a>
			<a href="#" class="savoir">En savoir plus</a>

	</div>
	<!-- END --> 
	</div>

</div>

<script>
					function changeColor(newColor) {
  var elem = document.getElementById('para');
  elem.style.background = newColor;

   var eleme = document.getElementById('fg');
  eleme.style.color = '#fff';

}
				</script>
<footer>
     		<p><i class="far fa-copyright"></i> <?php echo date('Y'); ?> <?php site(); ?></p>

		</footer>
		<!--
<style>
	*{
	padding:0px;
	margin:0px;
}

#contener {
	width:auto;
	padding: 10px;
	color:#FFFFFF;
	margin-top: 4%;
	margin-bottom: 2%;
	text-align: center;
}

#page_contener_left{
	width:25%;
	height:15px;
	float:left;
	background-color:#fff;
	padding: 10px;
	border: 0px solid #bdc3c7;
	color: rgba(33,33,33,.7);
	box-shadow: 3px 2px 5px 0px #d5d5d5;
	margin-right: 10px;
	margin-left: 10px;
	margin-left: 2.5%;
	border-radius: 3px;
}

#page_contener_right{
	width:15%;
	height:15px;
	float:left;
	background-color:#fff;
	padding: 10px;
	padding: 10px;
	border: 0px solid #bdc3c7;
	box-shadow: 3px 2px 5px 0px #d5d5d5;
	margin-right: 10px;
	border-radius: 3px;
	color: rgba(33,33,33,.7);
}

#page_contener_right2{
	width:50.5%;
	height:15px;
	float:left;
	background-color:red;
	padding: 10px;
	background-color:#fff;
	padding: 10px;
	box-shadow: 3px 2px 5px 0px #d5d5d5;
	overflow: hidden;
	border-radius: 3px;
	color: rgba(33,33,33,.7);
}

</style>-->  
<script src="js/right_click_menu.js"></script>
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
						Veuillez nous contacter sur discord en cas d'erreur(Discord : Cr3sus!#8736 ).<br>Cordialement Cr3sus!</h1>
					</div>
							</body>
						</html>
					<?php
				}
}
else{
	echo 'Vous avez été déconnecté reconnectez vous !';
	?>
	
	<?php
}

?>