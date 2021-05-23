<?php 


foreach($_POST['checkbox'] AS $checkbox){

header('Location: quetes.php?nom_quetes='.$checkbox.'');

}



?>
