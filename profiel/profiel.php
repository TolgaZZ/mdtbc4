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
<link rel="stylesheet" href="profiel.css">
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
    <div class="wijzig_button"><a class="button_w" href=" ../profiel_info_wijzig.php" style="      float: right;
      margin-right: 5%;
      border: 1px black solid;
      background-color: darkblue;
      color: white;">Profiel wijzigen</a><a class="button_w" style="      float: right;
      margin-right: 5%;
      border: 1px black solid;
      background-color: darkblue;
      color: white; " href="../Livechat/index.php">Livechat</a><a class="button_w" style="      float: right;
      margin-right: 5%;
      border: 1px black solid;
      background-color: darkblue;
      color: white;" href="../ww_wijzigen/change_password.php">Wachtwoord wijzigen</a></div>
    <div class="pf">
      <img src="fotos/profiel2.jpg" type="image" style="height: 100%;
    width: 100%;
    border-radius: 50%;">
    <section>
      <strong style="color:black;"><?php echo $rij['naam'] ?><?php echo $rij['achternaam'] ?></strong><br>
      <strong style="color:black">Email: <?php echo $rij['email'] ?></strong><br>
      <strong style="color:black">Opleiding: <?php echo $rij['afdeling'] ?></strong><br>
      <strong style="color:black">Leerjaar: <?php echo $rij['leerjaar'] ?></strong><br>
      <strong style="color:black">Klas: <?php echo $rij['klas'] ?></strong><br>
      <strong style="color:black">Info: <?php echo $rij['info'] ?></strong><br>
      <br>
      </section>
      <section>
    Student, Grafisch Lyceum Rotterdam
    Nederland
    Contactgegevens
    
  </div>
  <div style="position: absolute;
    bottom: 0;
    margin-bottom: 15%;
    margin-left: 40%;
    margin-right: 5%;"><strong>Laat de services zien</strong> die u aanbiedt, zodat u en uw bedrijf gevonden kunnen worden in zoekopdrachten<br>
    Aan de slag</div>
    
  </div>
  
  </section>
  
</section>
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