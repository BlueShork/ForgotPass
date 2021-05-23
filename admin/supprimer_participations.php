<?php 
session_start();
$pseudo = $_SESSION['pseudoadmin'];
include('../config/config.php');
$id = $_GET['id'];
$req = $bdd->prepare('DELETE FROM quetes_liens WHERE id = :id');
$req->execute(array(
	':id' => $id,
));

?>
 <!DOCTYPE html>
 <html>
            <head>
                <title>Chargement - Connexion</title>
                <link rel="stylesheet" href="../css/loader.css">
                <meta charset="utf-8">                
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            </head>
            <body>
               <div class="center"><img src="../images/spinner.svg"></div>
                <script language="javascript">document.location="quetes.php"</script>
            </body>
            </html>