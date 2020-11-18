<?php
if (is_numeric($_POST['channel'])) {
    require_once('../config.php');
    session_start();

    $query = "SELECT * FROM livechat WHERE channel = {$_POST['channel']} AND user_id = {$_SESSION['user_id']} OR channel = {$_SESSION['user_id']} AND user_id = {$_POST['channel']}";
    $result = mysqli_query($mysqli, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            if ($_SESSION['user_id'] == $row['user_id']) {
                echo("<li message='{$row['message_id']}'><b>{$row['Naam']}</b><br>{$row['message']}</li>&");
            } else {
                echo("<li message='{$row['message_id']}' style='background-color: #D3D3D3'><b>{$row['Naam']}</b><br>{$row['message']}</li>&");
            }
        }
    }
}