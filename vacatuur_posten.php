<?php
    require_once 'session.php';
    require_once 'config.php';


?>

<html>
<head><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="/style.css">

</head>
<body>
<header>
<a href="index.html"> 
<img class="fotoboven" src="fotos/glrlogo.png">
<div id="knoppen">
<a href="index2.html"><img class="homeknop1 homeknop" src="fotos/house.svg"></a>
<a href="Livechat/index.php"><img class="homeknop2 homeknop" src="fotos/chat.svg"></a>
<a href="vacature_overzicht.php"><img class="homeknop3 homeknop" src="fotos/suitcase.svg"></a> 
<a href=""><img class="homeknop4 homeknop" src="fotos/user.svg"></a>     
</div>  
</a>

</header>



<h1 class="text-center">vacaturen aanmaken</h1>

    <div class="container">
    <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
    <form action= "vacatuur_posten_verwerk.php" method="post">


    <p>

    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
           Titel van de vacaturen:
        </small>
        <input type="text" name="titel" id="titel" placeholder="Titel:" required="required">
    </p>
        <br>
   
        <div class="form-row mb-4">
            <div class="col">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Tijd van:
        </small>
                <input type="date" name="datum_van" id="datum_van" class="form-control">
            </div>
            <div class="col">
            <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Tijd tot
        </small>    
                <input type="date" name="datum_tot" id="datum_tot" class="form-control">
            </div>
        </div>
        
    <p>
    <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            informatie over de vacaturen
        </small>
        <textarea id="vacatuur_info" name="vacatuur_info" required="required"
        rows="10" cols="30"></textarea>
  
        </p>
        <br>
    <p>
        <select name="afdeling">
        <option value="Mediavormgeven">Mediavormgeving</option>
        <option value="Creatieve Productie">CreatieveProductie</option>
        <option value="Mediamanagement">Mediamenagement</option>
        <option value="Redactiemedewerker">Redactiemedewerker</option>
        <option value="Mediatechnologie">Mediatechnologie</option>
        <option value="Audiovisuele media">Audiovisuele media</option>
        <option value="Podium- en Evenemententechnie">Podium- en Evenemententechnie</option>
        </select>
    </p>

        <br>



    <p>
        <input class="btn btn-info" type="submit" name="submit" id="submit" value="Opslaan">
        <button class="btn btn-info" onclick="history.back();return false;">Annuleren</button>
    </p>


    </form>
    </div>
    <!--</div>-->
</div>
<footer>
<img class="foto" src="fotos/glrlogo.png">
	<hr>
<div class="footertekst">
<p>
<a href="privacy/privacy.html">General</a><br>
<a href="account_aanmaken.html">Account aanmaken</a><br>
<a href="vacature_overzicht.php">Vacatures</a><br>
</p>
</div>
</footer>

</body>
<html>