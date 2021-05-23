<?php 


foreach($_POST['liens'] AS $liens){

header('Location: quetes.php?liens='.$liens.'');

}



?>
