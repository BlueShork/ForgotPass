<?php 
session_start();
include('refresh_classement.php');
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
					$grades = $donnees['grades'];
				if($ban != 1){
					?>
					<!DOCTYPE html>
		<html>
			<head>
				<title><?php site(); ?> - Classement</title>
				<meta charset="utf-8">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<link rel="stylesheet" href="css/dashboard.css">
				<link href="https://fonts.googleapis.com/css?family=Jua" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
				<link href="https://fonts.googleapis.com/css?family=Do+Hyeon" rel="stylesheet">
				<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
				<link href="https://fonts.googleapis.com/css?family=Lilita+One" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
				<link rel="stylesheet" href="css/ptc.css">
				<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

				<link rel="stylesheet" href="css/cashlinks.css">
                <link rel="stylesheet" href="css/classement.css">
			</head>
			<body id="para">
				
			<?php 
				if(isset($_GET['quetes'])){
					?>
					<div class="message" id="missions">
						<a onclick="fermer()" id="fermer" href="cashlinks.php?actif=#"><i class="far fa-times-circle"></i></a>
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
						<li class="fonts none"><a href="index.php"><i class="fas fa-dove"></i> <?php echo site(); ?></a></li>
							<li class="fonts left racc pseudo_li hover"><a href="dashboard.php"><i class="fas fa-home"></i> Accueil</a></li>
						<li class="fonts left racc pseudo_li hover"><a style="cursor:pointer;"><i class="fas fa-money-check-alt"></i> Gagner de l'argent</a>
							<ul class="submenue">
								<li><a href="cashlinks.php"><img src="images/chain.svg" class="crown"> Cashlinks</a></li>
								<li><a href="inscription_liens.php"><img src="images/list.svg" class="crown"> Inscription remunérés</a></li>
								<li><a href="wanna.php"><img src="images/list.svg" class="crown"> Sondage</a></li>
<li><a href="wanna_offer.php"><img src="images/list.svg" class="crown"> Offerwall</a></li>
								<li><a href="liens_parrainage.php"><img src="images/shout.svg" class="crown"> Parrainage</a></li>
							</ul>
						</li>
						<li class="fonts left racc pseudo_li hover active"><a style="cursor: pointer;"><i class="fas fa-info"></i> Informations</a>
							<ul class="submenue in">
							<li><a href="classement.php"><img src="images/podium.svg" class="crown"> Classement</a></li>
							<li><a href="contact.php"target="_blank"><img src="images/discord.svg" class="crown"> Contact</a></li>
								<li><a href="deconnexion.php"><img src="images/sign-out-option.svg" class="crown"> Se déconnecter</a></li>
								<!--<li><a href="#"><img src="images/settings.svg" class="crown"> Paramètres</a></li>
								<li><a href="demande_paiement.php"><img src="images/online-store.svg" class="crown"> Demande de paiement</a></li>-->
							</ul>
						</li>
						<li class="fonts left racc pseudo_li hover"><a href="demande_paiement.php"><i class="fas fa-shopping-cart"></i> Boutique</a>
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
					<?php echo round($donnees['gains_total'], 0, PHP_ROUND_HALF_UP); ?>  <i class="fas fa-bullseye"></i>
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
	<!--<button class="reward"><a href="crediter.php?pseudo=<?php echo $pseudo;?>&gains=5">Récupérer</a></button>-->
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
							</li> -->
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
			<form method="POST" action="envoye_message.php?red=classement.php" class="chat_form">
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
				<script src="http://code.jquery.com/jquery-latest.js" > </script>
 
 
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


                    </script><?php echo $pseudo; ?> content de vous revoir parmi nous ! </p>
                    </div>





                        

                       
                        <div class="cardallc">
                        <!-- <h1 class="classem">Classement</h1> -->

						<div id="classmenu">
						
						<h3 style="text-align: center; padding-top: 20px;" id="titre_class"></h3>
							<a id="global_class" class="class_active"><i class="fas fa-globe"></i> Global</a><a id="weekly_class"><i class="far fa-calendar-alt"></i> Weekly</a>
						
						</div>
					
						

						</div>

						<div id="global_classement">
						<?php 
						$i = 0;
						$stmt = $bdd->prepare("SELECT * FROM classement ORDER BY points DESC");
						$stmt->execute();
						$rows = $stmt->fetchAll();
						
						foreach ($rows as $machin) {
							$i++;
							?>
							<div class="card_class">
                        <span class="rank">#<?php echo $i;?></span>
                            <p class="pseudo_c"><?php echo $machin['pseudo'];?></p>
                            <p class="points_c"><?php echo $machin['points']; ?><i class="fas fa-bullseye"></i></p>

                        </div>
							<?php
						
						} 
						
						?>
						</div>
						<div id="weekly_classement">
							<?php 
						$i = 0;
						$stmt = $bdd->prepare("SELECT * FROM weekly_classement ORDER BY points DESC");
						$stmt->execute();
						$rows = $stmt->fetchAll();
						
						foreach ($rows as $machin) {
							$i++;
							?>
							<div class="card_class">
                        <span class="rank">#<?php echo $i;?></span>
                            <p class="pseudo_c"><?php echo $machin['pseudo'];?></p>
                            <p class="points_c"><?php echo $machin['points']; ?><i class="fas fa-bullseye"></i></p>

                        </div>
							<?php
						
						} 
						
						?>
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


<script>
					function changeColor(newColor) {
  var elem = document.getElementById('para');
  elem.style.background = newColor;

   var eleme = document.getElementById('fg');
  eleme.style.color = '#fff';

}
				</script>
				<script src="js/classment.js"></script>
<footer>
		<div class="top">
           	<a href="#menu"><i class="fas fa-angle-up"></i></a>
           </div>
     		<p><i class="far fa-copyright"></i> <?php echo date('Y');?> <?php site(); ?></p>

		</footer>
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