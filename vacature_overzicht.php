<?php

require_once 'vacature_session.php';

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vacature overzicht</title>
<link rel="stylesheet" type="text/css" href="oudergesprek_toon.css">

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<style>
table{
    -webkit-box-shadow: 0px 0px 46px -6px rgba(0,0,0,0.75);
-moz-box-shadow: 0px 0px 46px -6px rgba(0,0,0,0.75);
box-shadow: 0px 0px 46px -6px rgba(0,0,0,0.75);
}

    </style>
</head>

<body>

<?php 

if (isset($_SESSION['naam']) && $_SESSION['naam'] == true) {

echo "<header>";
echo "<a href='index.html'> ";
echo "<img class='fotoboven' src='fotos/glrlogo.png'>";
echo "<div id='knoppen'>";
echo "<a href='index2.html'><img class='homeknop1 homeknop' src='fotos/house.svg'></a>";
echo "<a href='Livechat/index.php'><img class='homeknop2 homeknop' src='fotos/chat.svg'></a>";
echo "<a href='vacature_overzicht.php'><img class='homeknop3 homeknop' src='fotos/suitcase.svg'></a> ";
echo "<a href=''><img class='homeknop4 homeknop' src='fotos/user.svg'></a>";
echo "</div>";
echo "</a>";

echo "</header>";
    
    
}
else{

    echo "<header>";
    echo "<a href='index.html'>"; 
    echo "<img class='fotoboven' src='fotos/glrlogo.png'>";
    echo "</a>";
    echo "<button class='inlogknop1'>";
    echo "  <a href='account_aanmaken.html'>Aanmaken</a>";
    echo "</button>	";
    echo "<button class='inlogknop2'>";
    echo "<a href='login/login.php'>Login</a>";
    echo "</button>";
    echo "</header>";

} 
?>
<div class="ruimte">	
</div>

    <div class="container">
<br>
<h1> Vacature overzicht  </h1>
<br>
<br>
<?php

//voeg het bestand config.php toe:
require 'config.php';

//Maak een query
// $query = "SELECT leerlingen.*, afspraken.tijd_van, afspraken.tijd_tot FROM leerlingen
//           JOIN afspraken ON afspraken.gebruikersID=leerlingen.gebruikersID";

// $query = "SELECT vacatuur.*, vacatuur.titel, vacatuur.datum_van, vacatuur.datum_tot, vacatuur.vacatuur_info, vacatuur.afdeling FROM users
// JOIN users ON users.gebruikersID=vacatuur.user_id";

$query = "SELECT * FROM vacatuur JOIN users ON users.user_id=vacatuur.user_id";

//voeg het resultaat van de query op in 'resultaat'
$resulaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 rijen bestaat:
if (mysqli_num_rows($resulaat)== 0)
{
    echo "<p>er zijn geen resultaten gevonden.</p>";
}
//als er wel rijden zijn gevonden:
else{

    
    echo "<table class='table'>";
    echo "<thead class='thead-dark'>";
    echo "<tr>";
    echo "<th><strong>Naam:</strong></th>";                                 //1
    echo "<th><strong>Vacature info:</strong></th>";                         //2
    echo "<th><strong>Datum van:</strong></th>";                            //3
	echo "<th><strong>Datum tot:</strong></th>";                            //4
	echo "<th><strong>Afdeling:</strong></th>";                             //5
    echo "<th><strong>Geplaatst door:</strong></th>";                       //6
    

    echo "<th><strong>Bekijk:</strong></th>";                               //7
    // echo "<th><strong>Bevestiging:</strong></th>";                       //8

    echo "</thead>";

    //alle rijen worden uitgelezen en getoondeen zolang
    while ($rij = mysqli_fetch_array($resulaat)){

        echo "</tr>";
        echo "<td>". $rij['titel'] . "</td>";                               //1
        echo "<td>". $rij['vacatuur_info'] . "</td>";                        //2
        echo "<td>". $rij['datum_van'] . "</td>";                           //3
        echo "<td>". $rij['datum_tot'] . "</td>";                           //4
        echo "<td>". $rij['afdeling'] . "</td>";                            //5
        echo "<td>". $rij['naam'] . "</td>";                                //6


        echo "<td> <a href='vacature_detail.php?vacature_id=".$rij['vacature_id'] . "'>Bekijk</a></td>";                     //7
        //  echo "<td> <a href='../PDF.Tester/index.php?gebruikersID=".$rij['gebruikersID'] . "'>Bevestiging</a></td>";      //8
        echo "</tr>";
    }
    echo "</table>";
}
?>
<hr>
<div class="info">

<?php 

if (isset($_SESSION['naam']) && $_SESSION['naam'] == true) {

    echo "<p>Je bent ingelogd als " .$_SESSION['naam'];
    echo "<br>";
    echo "<a href='login/uitlog.php'>uitloggen</a></p>";
    
    }
    else{
        echo "<p>Niet ingelogd";
        echo "<br>";
        echo "<a href='login/login.php'>inloggen</a></p>";

    } 
?>

<p>
    Terug naar <a href="index2.html">home</a><br>
    
</p>
</div>
</div>

</body>
</html>