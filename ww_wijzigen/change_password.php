<?php
session_start();
// require '/config.php';
$conn = mysqli_connect("localhost", "mdt4", "#1Geheim", 
    "beroeps2_mdt") or die("Connection Error: " . mysqli_error($conn));
$_SESSION["user_id"] = '$userid'; 

if (count($_POST) > 0) {
    $result = mysqli_query($conn, "SELECT *from users WHERE user_id='" . $_SESSION["user_id"] . "'");
    $row = mysqli_fetch_array($result);
    //hier door verandert het wachtwoord
    if ($_POST["currentPassword"] == $row["wachtwoord"]) {
        mysqli_query($conn, "UPDATE users set wachtwoord='" . $_POST["newPassword"] . "' WHERE user_id='" . $_SESSION["user_id"] . "'");
        $message = "wachtwoord verandert";
    } else
        $message = "Current Password is not correct";
}

// echo $conn;
// echo $_SESSION;

?>

<html>
<head>
  <meta charset="UTF-8">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="./style.css">

</head>
<body>
<header>
<a href="/index.html"> 
<img class="fotoboven" src="/fotos/glrlogo.png">
</a>   
<button class="inlogknop1">
  <a href="/account_aanmaken.html">Aanmaken</a>
</button>   
<button class="inlogknop2">
<a href="/login/login.php">Login</a>
</button>   
</header>
<title>Verander Wachtwoord</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script>
function validatePassword() {
var currentPassword,newPassword,confirmPassword,output = true;

currentPassword = document.frmChange.currentPassword;
newPassword = document.frmChange.newPassword;
confirmPassword = document.frmChange.confirmPassword;

if(!currentPassword.value) {
	currentPassword.focus();
	document.getElementById("currentPassword").innerHTML = "required";
	output = false;
}
else if(!newPassword.value) {
	newPassword.focus();
	document.getElementById("newPassword").innerHTML = "required";
	output = false;
}
else if(!confirmPassword.value) {
	confirmPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "required";
	output = false;
}
if(newPassword.value != confirmPassword.value) {
	newPassword.value="";
	confirmPassword.value="";
	newPassword.focus();
	document.getElementById("confirmPassword").innerHTML = "not same";
	output = false;
} 	
return output;
}
</script>
</header>
<div class="ruimte">    
</div>
<body>
    <div class="formulier">
    <form name="frmChange" method="post" action=""
        onSubmit="return validatePassword()">
        <div style="width: 400px;" align="center">
            <div class="message"><?php if(isset($message)) { echo $message; } ?></div>
            <table border="0" cellpadding="10" cellspacing="0"
                width="500" align="center" class="tblSaveForm">
                <tr class="tableheader">
                    <td colspan="2">Wachtwoord wijzigen</td>
                </tr>
                <tr>
                    <td width="40%"><label>Oude Wachtwoord</label></td>
                    <td width="60%"><input type="password"
                        name="currentPassword" class="txtField" /><span
                        id="currentPassword" class="required"></span></td>
                </tr>
                <tr>
                    <td><label>Nieuw Wachtwoord</label></td>
                    <td><input type="password" name="newPassword"
                        class="txtField" /><span id="newPassword"
                        class="required"></span></td>
                </tr>
                <td><label>Herhaal Nieuw Wachtwoord</label></td>
                <td><input type="password" name="confirmPassword"
                    class="txtField" /><span id="confirmPassword"
                    class="required"></span></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit"
                        value="Opslaan" class="btnSubmit"></td>
                </tr>
            </table>
        </div>
    </form>
    </div>
<div class="info1">
<p class="tekst1">
Ben je op zoek naar een beroeps opdracht meld je<br>
hier aan
</p>
<button class="aanmeldknop1">
<a href="/account_aanmaken.html">Aanmaken</a>
</button>   
</div>  
<div class="info2">
    <p class="tekst2">
        Plaats een vacature<br>
        duizende mensen zullen het zien 
    </p>
    <button class="aanmeldknop2"></button>
</div>
<footer>
<img class="foto" src="/fotos/glrlogo.png">
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