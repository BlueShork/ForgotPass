<?php 

include('../config/config.php');

$token_user = $_GET['u'];
$token = $_GET['token'];


$response = $bdd->prepare('SELECT * FROM password_recover WHERE token_user = :token_user && token = :token');
$response->execute(array(
    ':token_user' => $token_user,
    ':token' => $token,
));

$data = $response->rowCount();

if($data){
    // Exist or this demande has been order by the true person


    $request = $bdd->prepare('SELECT * FROM inscription WHERE token = :token');
    $request->execute(array(
        ':token' => $_GET['u'],
    ));
    $user_data = $request->fetch();



    ?>
    <link rel="stylesheet" href="../semantic/semantic.min.css" />
    <div class="ui main container" style="margin-top: 50px;">
        <h2>Change your password</h2>
        <form action="insert_password_forgot.php" method="post" class="ui form">

            <div class="field">
                <label for="email">Password</label>
                <input type="password" name="password">
                <input type="hidden" name="token_user" value="<?php echo $user_data['token']; ?>">
            </div>

            <button type="submit" class="ui blue labeled submit icon button send">
                <i class="icon send"></i>
                Envoyer
            </button>

        </form>



    </div>




    <?php



}
else{
    echo 'Doesnt exist FRAUDE';
}





?>