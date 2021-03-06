<?php 

include('../config/config.php');

if(isset($_POST['email'])){

    // Initalize variable

    $email = htmlspecialchars($_POST['email']);

    // Get the token of the user in inscription
    // Add one line in password_recover tempo db

    $req = $bdd->prepare('SELECT * FROM inscription WHERE email = :email');
    $req->execute(array(
        ':email' => $email,
    ));
    $data = $req->fetch();
    $token_user = $data['token'];

    // Add one line in password_recover with u = Another token and token with the token of user

    // Set another new token value

    $bytes = random_bytes(64);
    $token = bin2hex($bytes);
    


    $password_recover = $bdd->prepare('INSERT INTO password_recover (token_user, token) VALUES (:token_user, :token) ');
    $password_recover->execute(array(
        ':token_user' => $token_user,
        ':token' => $token,
    ));


    // Send email with link

    // Envoyer un mail

    $destinataires = $email;
    $link = "casheez.fr/forgot/forgot_link.php?u=$token_user&token=$token";

    $message = '
    

    <!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Casheez - Recover password</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
    /* Fonts and Content */
    body, td { font-family: \'Helvetica Neue\', Arial, Helvetica, Geneva, sans-serif; font-size:14px; }
    body { background-color: #2A374E; margin: 0; padding: 0; -webkit-text-size-adjust:none; -ms-text-size-adjust:none; }
    h2{ padding-top:12px; /* ne fonctionnera pas sous Outlook 2007+ */color:#0E7693; font-size:22px; }
    
    @media only screen and (max-width: 480px) { 

        table[class=w275], td[class=w275], img[class=w275] { width:135px !important; }
        table[class=w30], td[class=w30], img[class=w30] { width:10px !important; }  
        table[class=w580], td[class=w580], img[class=w580] { width:280px !important; }
        table[class=w640], td[class=w640], img[class=w640] { width:300px !important; }
        img{ height:auto;}
         /*illisible, on passe donc sur 3 lignes */
        table[class=w180], td[class=w180], img[class=w180] { 
            width:280px !important; 
            display:block;
        }    
        td[class=w20]{ display:none; }    
    } 
    .btn{
        background: #7DCEA0;
        cursor: pointer;
        display: inline-block;
        letter-spacing: 0.075em;
        padding: .8em 1em;
        position: relative;
        align-self: center;
        text-transform: uppercase;
        margin-top: 10px;
        margin-bottom: 10px;
        text-decoration: none;
        color: #fff;
    }
    </style>
   
</head>
<body style="margin:0px; padding:0px; -webkit-text-size-adjust:none;">

    <table width="100%" cellpadding="0" cellspacing="0" border="0" style="background-color:rgb(42, 55, 78)" >
        <tbody>
            <tr>
                <td align="center" bgcolor="#2A374E">
                    <table  cellpadding="0" cellspacing="0" border="0">
                        <tbody>                            
                            <tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>

                           
                            <tr>
                                <td class="w640"  width="640" height="10"></td>
                            </tr>


                            <!-- entete -->
                            <tr class="pagetoplogo">
                                <td class="w640"  width="640">
                                    <table  class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#F2F0F0">
                                        <tbody>
                                            <tr>
                                                <td class="w30"  width="30"></td>
                                                <td  class="w580"  width="580" valign="middle" align="left">
                                                    <div class="pagetoplogo-content">
                                                        <img class="w580" style="text-decoration: none; display: block; color:#476688; font-size:30px;" src="casheez.fr/images/casheez_logo.png" alt="Mon Logo" width="150" height="auto"/>
                                                    </div>
                                                </td> 
                                                <td class="w30"  width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!-- separateur horizontal -->
                            <tr>
                                <td  class="w640"  width="640" height="1" bgcolor="#d7d6d6"></td>
                            </tr>

                             <!-- contenu -->
                            <tr class="content">
                                <td class="w640" class="w640"  width="640" bgcolor="#ffffff">
                                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0">
                                        <tbody>
                                            <tr>
                                                <td  class="w30"  width="30"></td>
                                                <td  class="w580"  width="580">
                                                    <!-- une zone de contenu -->
                                                    <table class="w580"  width="580" cellpadding="0" cellspacing="0" border="0">
                                                        <tbody>                                                            
                                                            <tr>
                                                                <td class="w580"  width="580">
                                                                    <h2 style="color:#7DCEA0; font-size:22px; padding-top:12px;">
                                                                        R??cup??ration de votre mot de passe  </h2>

                                                                    <div align="left" class="article-content">
                                                                        <p> Veuillez suivre le lien ci-dessous pour r??initialiser votre mot de passe.</p>
                                                                        <a href='.$link.' class="btn">Veuillez cliquer ici</a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td class="w580"  width="580" height="1" bgcolor="#c7c5c5"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <!-- fin zone -->                                                   
                                                </td>
                                                <td class="w30" class="w30"  width="30"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <!--  separateur horizontal de 15px de haut -->
                            <tr>
                                <td class="w640"  width="640" height="15" bgcolor="#ffffff"></td>
                            </tr>

                            <!-- pied de page -->
                            <tr class="pagebottom">
                                <td class="w640"  width="640">
                                    <table class="w640"  width="640" cellpadding="0" cellspacing="0" border="0" bgcolor="#c7c7c7">
                                        <tbody>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                            <tr>
                                                <td class="w30"  width="30"></td>
                                                <td class="w580"  width="580" valign="top">
                                                    <p align="right" class="pagebottom-content-left">
                                                        <a style="color:#255D5C;" href="casheez.fr"><span style="color:#255D5C;">Casheez.fr</span></a>
                                                    </p>
                                                </td>

                                                <td class="w30"  width="30"></td>
                                            </tr>
                                            <tr>
                                                <td colspan="5" height="10"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td class="w640"  width="640" height="60"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
    
    
    
    
    ';


    $headers = "From: Casheez\r\n";
    $headers .= "CC:". $destinataires."\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";




    mail($destinataires, "Casheez.fr - Forgot your password ?", $message, $headers);
    ?>



    <link rel="stylesheet" href="../semantic/semantic.min.css">
    <body style="background: #F8F8F9;">
    <br><br>
    <div class="ui main container" style="margin-top: 50xp;"> 
    
    <div class="ui icon message">
  <i class="inbox icon"></i>
  <div class="content">
    <div class="header">
      Casheez - Recover Password
    </div>
    <p>Nous avons envoy?? un lien ?? votre adresse email.</p>
  </div>
</div>


    
    </div>    
    </body>
    






    <?php




}
else{
    echo 'Une erreur est survenu';
}






?>