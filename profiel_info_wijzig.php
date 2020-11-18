<?php
// require_once('session.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>account info</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css'>
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.0/css/bootstrapValidator.min.css'>
<script src="script.js"></script>
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

<!-- partial:index.partial.html -->
<div class="container">

    <form class="well form-horizontal" action="account_info_verwerk.php" method="post"  id="contact_form">
<fieldset>

<!-- Formulirt Naamß -->
<legend><center><h2><b>Account Info</b></h2></center></legend><br>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label">Naam</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="Voornaam" class="form-control" value="<?php echo $rij['naam'] ?>" type="text">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Achternaam</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Achternaam" class="form-control" value="<?php echo $rij['achternaam'] ?>"   type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control" value="<?php echo $rij['email'] ?>" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Opleiding</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
        <input name="afdeling" placeholder="afdeling" class="form-control" value="<?php echo $rij['afdeling'] ?>" type="text">
    </div>
  </div>
</div>


<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Leerjaar</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-star"></i></span>
  <input name="email" placeholder="Leerjaar" class="form-control" value="<?php echo $rij['leerjaar'] ?>" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Klas</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
  <input name="email" placeholder="Klas" class="form-control" value="<?php echo $rij['klas'] ?>" type="text">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Foto</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-folder-open">    <input type="file" style="opacity: 0.0; position: absolute; top:0; left: 0; bottom: 0; right:0; width: 100%; height:100%;" /></i></span>
  <input name="email" placeholder="Foto" class="form-control" value="<?php echo $rij['foto'] ?>" type="image">
    </div>
  </div>
</div>

<!-- Text input-->
       <div class="form-group">
  <label class="col-md-4 control-label">Info over jezelf</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-comment"></i></span>
  <textarea name="email" placeholder="Info over jezelf" class="form-control"  type="text"></textarea>
    </div>
  </div>
</div>

  
<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4"><br>
    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="submit" class="btn btn-warning" >&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspWijzig <span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</button>
  </div>
</div>

</fieldset>
</form>
</div>
    </div>

    <div class="info2"></div>ß


<footer>
<img class="foto" src="fotos/glrlogo.png">
<div class="footertekst">
<p>
General<br>
Sign up<br>
Vacatures<br>
Voor werkgevers<br>
Partners<br>
Contact
</p>
</div>
</footer>

</body>
</html>