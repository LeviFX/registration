
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Muli&display=swap" rel="stylesheet">
    <title>Hoofdstuk 6 PHP Levi Vogel</title>
</head>
<body>
    <div class="container">
    <div class="nav">
        <nav class='navClass'>
            <ul>
                <li><a href="index.php">Home</a></li>
    <?php
        if (isset($_SESSION['ID'])) {
                   echo "<li class='rightli' style='float:right'><a href='loginPage.php'>Uitloggen</a></li>";
                } else {
                    echo "<li class='rightli' style='float:right'><a href='loginPage.php'>Inloggen</a></li>";
                 }
    ?>
    </div>
</body>
</html>