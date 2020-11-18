<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1); 
error_reporting(E_ALL);

if (is_numeric($_POST['channel'])) {
    require_once "../config.php";
    session_start();


    $user_id = $_SESSION['user_id'];
    $naam = $_SESSION['naam'];
    $message = $_POST['message'];
    $channel = $_POST['channel'];
    $date = date('Y-m-d h:i:s');

    $query = "INSERT INTO `livechat`(`user_id`, `Naam`, `message`, channel, created_at) VALUES ($user_id, '$naam', '$message', '$channel', '$date')";

    echo $query;

    mysqli_query($mysqli, $query);
}

?>