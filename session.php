<?php
session_start();

// als je nog niet bent ingelogd

if(!isset($_SESSION['user_id']) || strlen ($_SESSION['user_id']) == 0) {
 
    echo('geen sessie!!!');
    //die();
    //geen geldig  login, stuur terug naar de login pagina
    header("location:login/login.php");
    exit;
    echo(isset($_SESSION['user_id']));
	 
}
?>