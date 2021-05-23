<p id="message1"><i class="fas fa-bullseye"></i><?php 

include('config/config.php');
				
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