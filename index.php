<?php include('class/get_name_site.php'); ?>

<!DOCTYPE html>
    <html>
        <head>
            <title><?php site(); ?> - Accueil</title>
            <meta charset="utf-8">
            <link rel="stylesheet" href="css/index.css">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
            <link href="https://fonts.googleapis.com/css?family=Lilita+One&display=swap" rel="stylesheet"> 
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        </head>
        <body>
        

<script>
var no = 40;var delai = 10;
var dx = new Array(), xp = new Array(), yp = new Array();
var am = new Array(), stx = new Array(), sty = new Array();
var i;
larg_fenetre = (document.body.offsetWidth<window.innerWidth)? window.innerWidth:document.body.offsetWidth;
haut_fenetre = (document.body.offsetHeight<window.innerHeight)? window.innerHeight:document.body.offsetHeight;

for (i = 0; i < no; i++) {
dx[i] = 0;
xp[i] = Math.random()*(larg_fenetre-90);
yp[i] = Math.random()*haut_fenetre;
am[i] = Math.random()*90;
stx[i] = 0.02 + Math.random()/90;
sty[i] = 0.7 + Math.random();

obj = document.getElementsByTagName('body')[0];
para = document.createElement("img");
para.setAttribute("src","images/snowflake2.svg");
para.setAttribute("id","dot" + i);
para.style.position = "absolute";
para.style.zIndex = "2";
para.setAttribute('width', 10);
para.setAttribute('height',10);
obj.appendChild(para);
}

function neige() {
for (i = 0; i < no; i++) {
dx[i] += stx[i];
yp[i] += sty[i];
if (yp[i] > haut_fenetre-90) {
xp[i] = Math.random()*(larg_fenetre-am[i]-90);
yp[i] = 0;
}
document.getElementById("dot"+i).style.top = yp[i] + "px";
document.getElementById("dot"+i).style.left = xp[i] + am[i]*Math.sin(dx[i]) + "px";
}
setTimeout("neige()", delai);
}

neige();
</script>
            
<nav>
<?php 

if(isset($_GET['p'])){
  ?>
  <div class="alert alert-success text-center" role="alert">
  Félicitation ! Votre mot de passe à bien été changé.
</div>
  <?php
}


?>
                <ul>
                    <li><a href="#"><i class="fas fa-dove"></i> Casheez.fr</a></li>
                    <li class="right espace"><a href="connexion.php">Connexion</a></li>
                    <li class="right"><a href="inscription.php">Inscription</a></li>
                </ul>
            </nav>
            <div class="center">
                <!-- <div class="new"><p>by Cashfr</p></div> -->
                <h1><img src="images/casheez_logo.png" alt="" class="logo_center"></h1>
                    <p>Gagnez de l'argent facilement</p>
                    <a href="inscription.php"><img src="images/play-button.svg" style="color: #fff;">Commencer</a>
            </div>

            <section class="video-inline first_section" id="comment">
				<div class="container">
					<div class="row">
                        
						<div class="col-md-6 col-sm-12">
							<h1 class="space-bottom-medium">Comment ça marche ?</h1>
							<p class="lead space-bottom-medium">
								Lorsque que vous serez inscrits des missions seront mises à votre dispositions<br> Ces missions sont <strong>gratuites</strong> et <strong>simples</strong> à réaliser (visite de sites internet, concours etc.).<br> Chaque mission vous fait gagner des Coins qui peuvent être échangés contre de l'argent ou des bons d'achat !
		<br></p>
							<a href="inscription.php" class="btn btn-primary">Je m'inscris</a>&nbsp;
						</div>
						
						<div class="col-md-6 col-sm-12">
							<div class="media-holder" src="https://player.vimeo.com/video/538115273?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479">
								<iframe src="https://player.vimeo.com/video/538115273?badge=0&amp;autopause=0&amp;player_id=0&amp;app_id=58479" width="640" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" id="video"></iframe>
							</div>
						</div>
					</div>
				</div>
			</section>
            <!-- Second section, -->
            <section class="video-inline second_section" id="comment">
				<div class="container">
					<div class="row">
                    <div class="col-md-6 col-sm-12">
							<div class="media-holder" src="images/533542.svg" id="source">
								<img src="images/533542.svg" alt="Erreur d'image" width="640" height="360" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" id="img"/>
							</div>
						</div>
						<div class="col-md-6 col-sm-12">
							<h1 class="space-bottom-medium">Comment ça marche ?</h1>
							<p class="lead space-bottom-medium">
								Dès votre inscription, une liste de missions vous sera proposée.<br> Ces missions sont <strong>gratuites</strong> et <strong>simples</strong> à réaliser (visite de sites internet, concours etc.).<br> Chaque mission vous fait gagner des Coins qui peuvent être échangés contre de l'argent ou des bons d'achat !
		<br></p>
							<a href="inscription.php" class="btn btn-primary">Je m'inscris</a>&nbsp;
						</div>
						
						
					</div>
				</div>
			</section>
            <footer class="text-center text-white" style="background-color: #fff;">
  <!-- Grid container -->

      <!-- Facebook -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a
        class="btn btn-link btn-floating btn-lg text-dark m-1"
        href="#!"
        role="button"
        data-mdb-ripple-color="dark"
        ><i class="fab fa-instagram"></i
      ></a>

 
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center text-dark p-3" style="background-color: #7DCEA0; color: #fff !important;">
    © 2020 Copyright:
    <a class="text-dark" style="color: #fff !important;">Casheez.fr</a>
  </div>
  <!-- Copyright -->
</footer>
               
        </body>
    </htmL>