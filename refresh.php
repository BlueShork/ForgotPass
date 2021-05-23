<p id="messages"><i class="fas fa-newspaper"></i> <?php 
include('config/config.php');
           
$reponse = $bdd->query('SELECT *, DATE_FORMAT(dates_quetes, "%d %M à %H H %i ") AS quetes_dd FROM  quetes_liens ORDER BY id DESC LIMIT 0,1');
$donnees = $reponse->fetch();
echo $donnees['pseudo'].' vient de finir la mission ';
echo $donnees['nom_quetes'].' + ';
echo $donnees['gains'].' <i class="fas fa-bullseye"></i>';
?>
					
					
					</p>