<!-- <?php 

$timestamp = strtotime("-1 week");
echo date('Y-m-d H:i:s', $timestamp);

?> -->
<?php 

// Verify if we are on a new month for give the score to the first player

$verify_date = date('m').'-01';
// $date = date('m-d');
$date = "04-01";
echo $verify_date.'<br>';
echo $date;
if($date === $verify_date){
    echo 'Nous sommes le premier du mois';
}
else{
    echo 'Nous ne sommes pas le premier du mois';
}


?>