<?php 

if (isset($_POST['login-submit'])) {

    require 'config.php';

    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    if (empty($mailuid) || empty($password)) {
        header("Location: loginPage.php?error=leegveld");
        exit(); 
    }
    else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: loginPage.php?error=sqlerror");
            exit(); 
        }
        else {

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: bands_toon.php?error=verkeerdwachtwoord");
                    exit(); 
                }
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['ID'] = $row['idUsers'];
                    $_SESSION['Naam'] = $row['uidUsers'];
                    $_SESSION['Level'] = $row['userLevel'];

                    header("Location: index.php?login=succes");
                    exit();
                }
                else {
                    header("Location: loginPage.php?error=verkeerdwachtwoord");
                    exit();  
                }
            }
            else {
                header("Location: loginPage.php?error=geengebruiker");
                exit(); 
            }

        }
    }

}
else {
    header("Location: index.php");
    exit(); 
}

?>