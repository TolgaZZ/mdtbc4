<?php
  //voeg het bestand config.php toe:
require 'config.php';
$userid = $_GET['user_id'];
  
//Maak een query
// $query = "SELECT * FROM info WHERE user_id = " . $userid;

$query = "SELECT * FROM users 
JOIN info ON users.user_id=info.user_id WHERE users.user_id = " .$userid ;

//voeg het resultaat van de query op in 'resultaat'
$resulaat = mysqli_query($mysqli, $query);

//als het resultaat uit 0 rijen bestaat:
if (mysqli_num_rows($resulaat)== 0)
{

echo "<p>er zijn geen gegevens gevonden.</p>";
  }
//als er wel rijden zijn gevonden:
else{
        $rij = mysqli_fetch_array($resulaat);        
}

// echo $query
  ?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>HOME</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./profiel.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
  
<header>
  <a href="index.html"> 
  <img class="fotoboven" src="fotos/glrlogo.png">
  <div id="knoppen">
  <img class="homeknop1 homeknop" src="fotos/house.svg">
  <img class="homeknop2 homeknop" src="fotos/chat.svg">
  <img class="homeknop3 homeknop" src="fotos/suitcase.svg"> 
  <img class="homeknop4 homeknop" src="fotos/user.svg"> 
  </div>  
  </a>
  
  </header>
<div class="ruimte">	
</div>


<section class="profiel">
<div class="banner"></div>
  <div class="display_flex">
    <div class="wijzig_button"><a class="button_w" href="profiel_wijzigen.php">Profiel wijzigen</a></div>
    <div class="pf">
      <img src="<?php echo $rij['foto'] ?>" type="image">
    <section>
      <?php echo $rij['naam'] ?>
      <br>
      </section>
      <section style="padding-top: 10em">
    Student, Grafisch Lyceum Rotterdam
    Nederland
    Contactgegevens
    
  </div>
    <div><strong>Laat de services zien</strong> die u aanbiedt, zodat u en uw bedrijf gevonden kunnen worden in zoekopdrachten<br>
    Aan de slag</div>
  </section>
    <button type="button" class="bewerkknop">profiel bewerken</button>
  </div>
  <div>
    Ervaring

    Opleiding

  </div>
</section>
<div class="info1">
  <p class="tekst1">
  Ben je op zoek naar een beroeps opdracht meld je<br>
  hier aan
  </p>
  <a href="account_aanmaken.html">
  <button class="aanmeldknop1">Aanmaken</button>
  </a>
  </div>	
  <div class="info2">
    <p class="tekst2">
      Plaats een vacature<br>
      duizende mensen zullen het zien	
    </p>
    <button class="aanmeldknop2"></button>
  </div>
  <footer>
  <img class="foto" src="fotos/glrlogo.png">
  <div class="footertekst">
  <p>
  General<br>
  Sign up<br>
  Vacatures<br>
  </div>
  </footer>
</body>
</html>