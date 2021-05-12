<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="registerstyle.css">
    <title>Document</title>
</head>
<body>
<?php 
 
 session_start();
 require 'layout.php';

?>
<div class="maincontent">
    <h1>Registreren</h1>
    <?php 
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "legevelden") {
                echo '<p class="signuperror">Vul alle velden in!</p>';
            }
            else if ($_GET['error'] == "verkeerdwachtwoord") {
                echo '<p class="signuperror">Wachtwoord klopt niet.</p>';
            }
            else if ($_GET['error'] == "nietbestaandemail") {
                echo '<p class="signuperror">Dit email bestaat niet.</p>';
            }
            else if ($_GET['error'] == "nietwerkendenaam") {
                echo '<p class="signuperror">Gebruik normale lees-tekens.</p>';
            }
            else if ($_GET['error'] == "anderewachtwoord") {
                echo '<p class="signuperror">Een van de wachtwoorden zijn niet hetzelfde.</p>';
            }
            else if ($_GET['error'] == "gebruikernietbeschikbaar") {
                echo '<p class="signuperror">Er is al een account aangemaakt met dit email/gebruikersnaam.</p>';
            }
        }
        else if ($_GET['registratie'] == "succes") {
            echo '<p class="succesmessage">Account is aangemaakt! Log in met uw gebruikersnaam/email en wachtwoord. <a href="loginPage.php">Inloggen</a><p>';
        }
    ?>
    <div class="form"><form action="signup_verwerk.php" method="post">
        <input type="text" name="uid" placeholder="Gebruikersnaam">
        <input type="text" name="mail" placeholder="E-mail">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <input type="password" name="pwd-repeat" placeholder="Opnieuw wachtwoord invullen">
        <select name="level" required>
    <?php 
        require 'config.php';
        echo '<option value="1">Ouder</option>';
        echo '<option value="2">Docent</option>';
        ?>
       </select>
        <button type="submit" name="signup-submit">Registreren</button>
    </form>
    </div>
    </div>
</body>
</html>