<?php

// require_once 'session.php';
require 'config.php';


//lees alle velden uit
$userid   = $_POST['user_id'];

$naam           = $_POST['naam'];
$email           = $_POST['email'];
$afdeling       = $_POST['afdeling'];
$leerjaar       = $_POST['leerjaar'];
$klas           = $_POST['klas'];
$foto           = $_POST['foto'];
$overjezelf     = $_POST['overjezelf'];


// alles controleren 
$foutmelding = "";

// if ($afdeling == "")
// {
//     $foutmelding .= "U heeft geen afdeling aangegeven. <br>";
// }
// if ($klas == "")
// {
//     $foutmelding .= "U heeft geen klas ingevoerd. <br>";
// }



// als de foutmelding leeg is voeg de gegevens toe
if ($foutmelding == "")
{
    //maak de query 
    $query1  = "UPDATE leerlingen SET email = '$email'
    WHERE user_id = $user_id"; 


    $query2 = "UPDATE info SET afdeling ='$afdeling', leerjaar = '$leerjaar', klas = '$klas', foto = '$foto', overjezelf = '$overjezelf'
    WHERE user_id = $userid";

// voer query uit
$result = mysqli_query($mysqli, $query1);

$result = mysqli_query($mysqli, $query2);

//controleer het resultaat
    if($result)
    {
        header("location:profiel_info_wijzig.php");
        exit;    
    }
    else
    {
        echo "<p>Er ging wat mis bij het toevoegen!</p>";
        echo "<p>" . $result . "</p>";
        echo "<p>" . mysqli_error($mysqli,) . "<p>";
    }

}
//als er wel een foutmelding is...
else{
    echo "<h1>" . $foutmelding . "</h1>";
}
echo $query1;
echo "<br>";
echo $query2;
?>