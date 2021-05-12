<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<?php 
    require 'layout.php';
?>
<body>
    <?php 
    if (isset($_SESSION['ID'])) {
     if ($_SESSION['Level'] == 1) {
        // Hier komt het entor gesprek formulier te staan

        echo "U bent ouder";
     } else {
        // Hier komt de overzichtspagina voor docenten te staan

         echo "U bent docent";
     }
    } else {
        header("Location: loginPage.php");
            exit(); 
    }

    ?>
</body>
</html>