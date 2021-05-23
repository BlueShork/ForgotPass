
    
   <?php

    
   include('config/config.php');
                
   $req = $bdd->query('SELECT * FROM inscription');
				
				while($donnee = $req->fetch()){
                    $email = $donnee['email'];
				$ban = $donnee['ban'];
				$pseudo = $donnee['pseudo'];
                
                
                $req1 = $bdd->prepare('SELECT * FROM quetes_liens WHERE email = :email');
                $req1->execute(array(
                    ':email' => $email,
                ));
                $demande_paiement = 0;
                while($donnees = $req1->fetch()){

                    if($donnees['nom_quetes'] === "Demande de paiement envoyé"){
                        $demande_paiement+=$donnees['gains']-$donnees["gains"];
                    }
                    else{
                        $demande_paiement+=$donnees['gains'];
                    }


            

                    
                    // $money = $donnees['gains_total'];
                    
                    

                    // Update the All time classement
                    
                    $req2 = $bdd->prepare('UPDATE classement SET points = :points WHERE email = :email');
                    $req2->execute(array(
                        ':points' => $demande_paiement,
                        ':email' => $email,
                    ));


                    

                    // // Update the weekly classement
                    // $req2 = $bdd->prepare('UPDATE weekly_classement SET points = :points WHERE email = :email');
                    // $req2->execute(array(
                    //     ':points' => $money,
                    //     ':email' => $email,
                    // ));
                   
                }


                // Weekly classement
                
                $req24 = $bdd->prepare('SELECT * FROM quetes_liens WHERE email = :email');
                $req24->execute(array(
                    ':email' => $email,
                ));
                 
                $money = 0;

                while($data = $req24->fetch()){















                    $timestamp = strtotime("-1 week");
                    $valid_previous_week_date = date('Y-m-d H:i:s', $timestamp);
                   
                    
                    if($data['dates_quetes'] > $valid_previous_week_date){

                        $money+=$data['gains'];

                            
                           $req4 = $bdd->prepare('UPDATE weekly_classement SET points = :points WHERE email = :email');
                                    $req4->execute(array(
                                        ':points' => $money,
                                        ':email' => $email,
                                 ));
        
                        
                        



                        
                        
                           
                       
                        
                        

                            // $money .= $data['gains'];
                            // echo $money;

                        

            
                                // $req4 = $bdd->prepare('UPDATE weekly_classement SET points = :points WHERE email = :email');
                                //     $req4->execute(array(
                                //         ':points' => $money,
                                //         ':email' => $email,
                                //  ));
        
        
                                    
                                    
        
                                    
        
        
        
        
                                
                            
                            
                            

                            
                           
                        }
                        

                        
                           


                        
                        // echo 'Compatibilisé';
                        // echo $data['nom_quetes'];
                        // echo $data['gains'];
                        // echo '<br>';

                        //Comptons les résultats de moins de une semaine

                        
                        






                    
                    else{
                        // echo $data['email']."quetes Valide";
                        // echo '<br>';
                        // echo 'Non comaptibilisé';
                        // echo $data['nom_quetes'];

                        // $req4 = $bdd->prepare('UPDATE weekly_classement SET points = :points WHERE email = :email');
                        //     $req4->execute(array(
                        //         ':points' => 0,
                        //         ':email' => $email,
                        //     ));
                    }




                }

                
                 
                


             

                }

                



                $req->closeCursor();



   
   ?>
