<?php
require_once 'vacature_session.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Vacature Details </title>	

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="oudergesprek_toon.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>

<body>
	
	
<?php 

if (isset($_SESSION['naam']) && $_SESSION['naam'] == true) {

echo "<header>";
echo "<a href='index.html'> ";
echo "<img class='fotoboven' src='fotos/glrlogo.png'>";
echo "<div id='knoppen'>";
echo "<img class='homeknop1 homeknop' src='fotos/house.svg'>";
echo "<img class='homeknop2 homeknop' src='fotos/chat.svg'>";
echo "<img class='homeknop3 homeknop' src='fotos/suitcase.svg'> ";
echo "<img class='homeknop4 homeknop' src='fotos/user.svg'> ";
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
	<?php
	

require 'config.php';
	
$vacature = $_GET['vacature_id'];
	
//Maak een query
// $query = "SELECT * FROM vacatuur JOIN users ON users.user_id=vacatuur.user_id WHERE vacatuur.vacature_id = $vacature";

$query = "SELECT * FROM vacatuur JOIN users ON vacatuur.user_id = users.user_id WHERE vacatuur.vacature_id = $vacature";

//voeg het resultaat van de query op in 'resultaat'
$resulaat = mysqli_query($mysqli, $query);

	
if(mysqli_num_rows($resulaat) == 0)
	{
		echo "<p>er zijn geen resultaten gevonden.</p>";
	}
	
else
	{
		$rij = mysqli_fetch_array($resulaat);

		echo "<div class='container'>";
		echo "<br>";
			echo "<h2> Gegevens van de vacature: " .$rij['naam']. "</h2> <br><br><br>";
			echo "<table class='table'>";
    		echo "<thead class='thead-dark'>";
			echo "<tr><td>Naam:</td>";
			echo 	"<td>" .$rij['titel']. "</td></tr>";
	

			echo "<tr><td>Informatie:</td>";
			echo 	"<td>" .$rij['vacatuur_info']. "</td></tr>";
	
			echo "<tr><td>Start datum:</td>";
			echo 	"<td>" .$rij['datum_van']. "</td></tr>";
	
			echo "<tr><td>Datum tot:</td>";
			echo 	"<td>" .$rij['datum_tot']. "</td></tr>";

			echo "<tr><td>Gezochte afdeling:</td>";
			echo 	"<td>" .$rij['afdeling']. "</td></tr>";

            echo "<tr><td>Geplaatst door:</td>";
			echo 	"<td>" .$rij['naam']. "</td></tr>";
			
			echo "<tr><td>Contact:</td>";
            echo 	"<td>" .$rij['email']. "</td></tr>";
            
			echo "</thead>";
			echo"</table>";
			
	}
	


echo "<hr>";
echo "<p>Terug naar <a href='vacature_overzicht.php?'>overzicht</a>";	
echo "<br>";
echo "<a href='uitgelogd.php'>uitloggen</a></p>";
	
?>

</body>
</html>