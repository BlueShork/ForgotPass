<?php 

if(empty($_GET['pseudo'])){
	echo 'erreur';
}
else{
	if(isset($_GET['pseudo']) && isset($_GET['radio']))
		{
		header('Location: quetes.php?pseudo='.$_GET["pseudo"].'&quetes='.$_GET["radio"].'');
}else{
	echo 'erreur erreur';
}
}

?>