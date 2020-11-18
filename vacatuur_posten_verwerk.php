<?php
require_once 'session.php';
require_once 'config.php';


$user_id = $_SESSION['user_id'];
$titel   =   $_POST['titel'];
$datum_van   =   $_POST['datum_van'];
$datum_tot    =   $_POST['datum_tot'];
$vacatuur_info =   $_POST['vacatuur_info'];
$afdeling =   $_POST['afdeling'];

var_dump($_POST);
var_dump($_SESSION);

if  (strlen($titel)     > 0 &&
strlen($user_id)        > 0 &&
strlen($datum_van)      > 0 &&
strlen($datum_tot)      > 0 &&
strlen($vacatuur_info)  > 0 && 
strlen($afdeling)       > 0)
{

    $check1 = strtotime($datum_van);
    $check2 = strtotime($datum_tot);
    if (date('Y-m-d', $check1) == $datum_van &&
        date('Y-m-d', $check2) == $datum_tot){

    //controlleer of de data wel corect is
    /////////////////////////////////database conectie moet nog verandert worden\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
    $query = "INSERT INTO vacatuur
    (titel, datum_van, datum_tot, vacatuur_info, afdeling, user_id)
    VALUES ( '$titel',
             '$datum_van', 
             '$datum_tot', 
             '$vacatuur_info',
             '$afdeling',
             '$user_id')";

    //voer de query uit
            echo $query;
    $result = mysqli_query($mysqli, $query);

    //controlleer het resultaat
            echo mysqli_error($mysqli);
    if ($result) 
    {
        header("Location:vacature_overzicht.php");
        exit;
    }
        else
        {
            echo'er ging iets mis met het toevoegen';
        }
     } else
            {
                //er ging wat mis met de datum
                echo 'een van de ingevulde data was ongeldig!';
            }
}else
                {
                    echo 'Niet alle velden waren ingevuld <br> <button onclick="history.back();return false;">ga terug</button>';
                }






?>
