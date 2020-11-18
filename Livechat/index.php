<!DOCTYPE html>
<html>
    <script></script>
    <title>Live Chat</title>
    <link rel="stylesheet" type="text/css" href="style.css">
<body>
<header>
<a href="index2.html"> 
<img class="fotoboven" src="fotos/glrlogo.png">
<div id="knoppen">
<a href="../index2.html"><img class="homeknop1 homeknop" src="../fotos/house.svg"></a>
<a href="../Livechat/index.php"><img class="homeknop2 homeknop" src="../fotos/chat.svg"></a>
<a href="../vacature_overzicht.php"><img class="homeknop3 homeknop" src="../fotos/suitcase.svg"></a> 
<a href="../index2.html"><img class="homeknop4 homeknop" src="../fotos/user.svg"></a>     
</div>  
</a>
</header>
<!-- Space between black and white called OFF-WHITE -->
    <div class="ruimte"></div>
    

    <div class= "chatbox-all">
    
        <div class="chatbox-parent"><h1 style=" padding-left:20px;">Berichten</h1></div>
            <ul class="chatform"></ul>
                <input type="text" class="chatinput" id="input">
        
        <?php
        require_once('../config.php');
        session_start();
        $query = "SELECT * FROM users WHERE user_id != {$_SESSION['user_id']}";
        $result = mysqli_query($mysqli, $query);
        
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo("<button class='buttonchatbox' channel='{$row['user_id']}'><p>{$row['naam']}</p></button>");
            }
        }
        ?>
        </div>    
       
    
           <div class="info2"></div>

           
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

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="script.js"></script>
</body>
</html>