<?php
// require_once 'session.inc.php';

//dit moet nog verandert worden naar de database instellingen
$db_hostname = 'localhost';
$db_username = 'mdt4';
$db_password = '#1Geheim';
$db_database = 'beroeps2_mdt';

//databse verbinding

$mysqli = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);

// de melding dat hij geeft bij een foutmelding

if (!$mysqli) {
    echo "Fout: kan geen verbinding maken met de database.<br>";
    echo "Error: " . mysqli_connect_error() . "<br>";
    echo "Errno: " . mysqli_connect_errno() . "<br>";
    exit;
}


?>