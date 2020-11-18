
<?php

        require_once '../config.php';
        session_start();

        
        //gegevens uitlezen
        $gebruikers_id = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];

        //wanneer de formulier word verstuurd
        if (isset($_POST['login']))
        {

        
            //maak de query
            $opdracht = "SELECT * FROM users WHERE email = '$gebruikers_id' AND wachtwoord = '$wachtwoord'";
            
            //voer de query uit en vang het resultaat op
        
            $resultaat = mysqli_query($mysqli, $opdracht);
            
        
        
            //controleer of het resultaat een rij (user) heeft opgeleverd
            if (mysqli_num_rows($resultaat) > 0)
            {
                //haal de user uit het resultaat
                $user = mysqli_fetch_array($resultaat);

                $_SESSION['email']          = $user['email'];
                $_SESSION['user_id']        = $user['user_id'];
				$_SESSION['naam']        	= $user['naam'];
                //geef de melding
                
                header("Location: ../index2.html");
                exit;
            }
                //als het resultaat leeg is:
            else
            {
                    echo "<p>Naam en/of wachtwoord zijn onjuist.</p>";
                    echo "<p><a href= 'login.php'>Probeer opnieuw</a></p>";
            }
        
        }
        //als het formulier niet is verstuurd
        else
        {
?>

<!DOCTYPE html>
<html>
<head>

        <link rel="stylesheet" type="text/css" href="login.css"/>

    <body>

<form class="login" method="post">   

<h2>Log in</h2>

<input class="input" type="text" name="email" placeholder="email">
<input class="input" type="password" name="wachtwoord" placeholder="wachtwoord">
<br>
<br>
<input class="inloggen" type="submit" name="login" value="Login" >
<br>
<br>
<a class="Groen" href="/account_aanmaken.html">Account Aanmaken</a>
<br>
<br>
<a class="Groen" href="javascript:window.history.back();">Terug </a>
      
        </body>
        </html>
            <?php
        }
        ?>