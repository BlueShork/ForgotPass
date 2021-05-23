<?php 


	if(isset($_POST['nom']) AND $_POST['nom'] && isset($_POST['message']) AND $_POST['message'] && isset($_POST['email']) AND $_POST['email'] && isset($_POST['prenom']) AND $_POST['prenom']){

$prenom = htmlspecialchars($_POST['prenom']);
$email = htmlspecialchars($_POST['email']); 
$nom = htmlspecialchars($_POST['nom']);

$mail = 'blueshork.dev@gmail.com'; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui présentent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = $prenom;
$message_html = "Candidature bêta testeurs de : $nom $prenom <br><br>".$_POST['message'];
//==========
 
//=====Lecture et mise en forme de la pièce jointe.

//==========
 
//=====Création de la boundary.
$boundary = "-----=".md5(rand());
$boundary_alt = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = $email;
//=========
 
//=====Création du header de l'e-mail.
$header = "From: \"Eco+\"<blueshork.dev@gmail.com>".$passage_ligne;
$header.= "Reply-to: \"Eco+\" <blueshork.dev@gmail.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
$message.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary_alt\"".$passage_ligne;
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
 
$message.= $passage_ligne."--".$boundary_alt.$passage_ligne;
 
//=====Ajout du message au format HTML.
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_html.$passage_ligne;
//==========
 
//=====On ferme la boundary alternative.
$message.= $passage_ligne."--".$boundary_alt."--".$passage_ligne;
//==========
 
 
 
$message.= $passage_ligne."--".$boundary.$passage_ligne;

//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
 
//==========



header('Location: beta.php?inscription=success');
		
	}
	else{
		// Insérer ici le code d'erreur de manques de champs !
		header('Location: beta.php?erreur=yes');
	}



?>