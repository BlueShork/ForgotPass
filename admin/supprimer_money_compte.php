<?php 

$id = $_GET['pseudo'];
include('../config/config.php');
$req = $bdd->prepare('DELETE FROM quetes_liens WHERE pseudo = :id');
$req->execute(array(
':id' => $id,

));

?>
<!DOCTYPE html>
            <head>
                <title>Chargement - Connexion</title>
                <link rel="stylesheet" href="../css/loader.css">
                <meta charset="utf-8">                
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
            </head>
            <body>
               <div class="center"><i class="fas fa-spinner"></i></div>
                <script language="javascript">document.location="quetes.php?pseudo=<?php echo $_GET['pseudo']; ?>"</script>
            </body>