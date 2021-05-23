<?php 


include('../config/config.php');
				if(isset($_GET['pseudo']) && $_GET['quetes']){
					?>
					<?php
				$req = $bdd->prepare('SELECT * FROM quetes_liens ORDER BY dates_quetes DESC WHERE pseudo = :pseudo');
				$req->execute(array(
					':pseudo' => $_GET['pseudo'],
				));
				while($donnees = $req->fetch()){
					$id = $donnees['id'];
					?>
					<div class="card">
						<p class="name_quetes inline">Quêtessssss : <?php 
						if(!empty($donnees['nom_quetes'])){
							echo $donnees['nom_quetes'];
						}else{
							echo 'Elément introuvable';
						} 
						?></p><span class="bar"></span>
							<p class="auteu inlin">Pseudo : <?php echo $donnees['pseudo'];?> </p><span class="bar"></span>
							<p class="i inine">Email : <?php echo $donnees['email']; ?></p><span class="bar"></span>
								<p class="paieent ininedats">Participer le : <span style="font-weight: bold;"><?php 
								

								
								$reponse= $bdd->prepare('SELECT DATE_FORMAT(dates_quetes, "%d %M à %H H %i   (%Y)") AS quetes_dd FROM quetes_liens WHERE id = :id');
								$reponse->execute(array(
									":id" => $id,
								));
								$reponses = $reponse->fetch();
									echo $reponses['quetes_dd'];
								
								
								
								?></span>
								<p class="paiemnt ciffreinline no_border"><span class="chiffre coins"><?php echo $donnees['gains']; ?> <i class="fas fa-bullseye"></i></span></p>
								<div class="supression"><p class="supprimer inline"><a href="supprimer_participations.php?id=<?php echo $donnees['id'];?>"><i class="fas fa-trash-alt"></i></a></p></div>
					</div><br><br><Br><br>
					<?php
				}

				?>
					<?php
				}	
				else{
					echo 'Erreur Interne n°10';
				}



				?>