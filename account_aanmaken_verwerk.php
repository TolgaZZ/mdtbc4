<?php 

require_once 'config.php';

$naam = $_POST['naam'];
$achternaam = $_POST['achternaam'];
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];



// require 'config.inc.php';
// require_once 'session.inc.php';

// alles controleren 
$foutmelding = "";

if ($naam == "")
{
    $foutmelding .= "U heeft geen naam ingevoerd. <br>";
}
if ($achternaam == "")
{
    $foutmelding .= "U heeft geen achtwenaam ingevoerd. <br>";
}
if ($email == "")
{
    $foutmelding .= "U heeft geen email ingevoerd. <br>";
}
if ($wachtwoord == "")
{
    $foutmelding .= "U heeft geen wachtwoord ingevoerd. <br>";
}

// klaar met checken

// als de foutmelding leeg is voeg de gegevens toe
if ($foutmelding == "")
{
    //maak de query 
    $query  = "INSERT INTO users (user_id, naam, achternaam, email, wachtwoord)
     VALUES (NULL,'$naam','$achternaam','$email','$wachtwoord')";

// voer query uit
    $result = mysqli_query($mysqli, $query);

//controleer het resultaat
    if($result)
    {
        header("location:index.html");
        exit;    
    }
    else
    {
        echo "<p>Er ging wat mis bij het aanmelden!</p>";
        echo "<p>" . $query . "</p>";
        echo "<p>" . mysqli_error($mysqli) . "<p>";
    }

}
//als er wel een foutmelding is...
else{
    echo "<h1>" . $foutmelding . "</h1>";
}

?>