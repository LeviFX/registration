<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="loginstyle.css">
</head>
<body>

<?php 
    session_start();
    require 'layout.php';

?>
<div class="maincontent">
    <div class="form">
    <?php 
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "geengebruiker") {
            echo '<p class="signuperror">Het opgegeven email adres of naam bestaad niet!</p>';
    }
        if (isset($_GET['error'])) {
            if ($_GET['error'] == "verkeerdwachtwoord") {
                echo '<p class="signuperror">Het wachtwoord klopt niet!</p>';
            }
            if (isset($_GET['error'])) {
                if ($_GET['error'] == "leegveld") {
                    echo '<p class="signuperror">Er is een veld niet ingevult.</p>';
                }
            }
        }
    }
    ?>
    <?php 
    if (isset($_SESSION['ID'])) {
        echo '</form>
        <h2>U bent ingelogt!</h2><br>
        <p>Wilt u <a href="index.php">Terug?</a>
        <form action="logout.php" method="post">
            <button type="submit" name="logout-submit">Uitloggen</button>
        </form>';
    } 
    else {
        echo '<form action="login_verwerk.php" method="post">
        <input type="text" name="mailuid" placeholder="Gebruikersnaam/E-mail">
        <input type="password" name="pwd" placeholder="Wachtwoord">
        <button type="submit" name="login-submit">Inloggen</button><br><br>';

        echo '<p>Geen account? </p><a href="signup.php">Registreren</a>';
    }
    ?>
    </div>
</div>
</body>
</html>