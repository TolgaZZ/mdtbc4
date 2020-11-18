<?php
require_once('../config.php');


$naam = $_POST['naam'];
$password = $_POST['password'];


$query = "SELECT * FROM login
			  WHERE naam = '$naam'
              AND password = '$password'";
$result = mysqli_query($mysqli, $query);
echo($query);

           
            if (mysqli_num_rows($result) > 0) {
                echo('Tolga de neger');
                // login correct, start de sessie
                session_start();

                $row = mysqli_fetch_row($result);
        
                // sla de username op in de sessie
                $_SESSION['naam'] = $row[0];
                $_SESSION['user_id'] = $row[2];
        
                // stuur door naar de homepagee
                header("Location:index.php");
                exit;
            } else {
                // login incorrect, terug naar het login-formulier
                header("Location:login.php");
                exit;
            } 
?>  
<p>Je bent ingelogd als <?php echo $_SESSION['naam']; ?><br>