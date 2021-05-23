<?php 
session_start();
include('config/config.php');




// Get the different user in the table

// Order an actualisation of classement for true real information
// include('refresh_classement.php');

                        $i = 0;
						$stmt = $bdd->prepare("SELECT * FROM classement ORDER BY points DESC");
						$stmt->execute();
						$rows = $stmt->fetchAll();
						
						foreach ($rows as $machin) {
                            $pseudo = $machin['pseudo'];
                            // if($i === 1){
                            //     $pseudo = $machin['pseudo'];
                            //     $email = $machin['email'];
                            //     $montant = 500;
                            //     $message = "Gagnant du concours de la semaine";
                            //     $req = $bdd->prepare('INSERT INTO quetes_liens (pseudo, email, dates_quetes, gains, nom_quetes) VALUES (:pseudo, :email, NOW(), :gains, :nom_quetes)');
                            //     $req->execute(array(
                            //         ':pseudo' => $pseudo,
                            //         ':email' => $email,
                            //         ':gains' => $montant,
                            //         ':nom_quetes' => $message,
                            //     ));

                            // }
							$i++;
							
                            // Reset the weekly table
                            $req = $bdd->prepare('UPDATE weekly_classement SET points = :points WHERE pseudo = :pseudo');
                            $req->execute(array(
                                ':points' => 0,
                                ':pseudo' => $pseudo,
                            ));

						
						} 
						


?>