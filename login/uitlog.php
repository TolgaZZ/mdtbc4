<?php 
require "../config.php";
session_start();
$_SESSION = array(); // lege array van de sessie maken 
session_destroy(); // beindig de sessie 
header("Location: uitgelogd.html"); //terug verwijzen naar de inlog pagina 
exit; //en je header netjes afsluiten 
?> 