<?php 

if (isset($_POST['signup-submit'])) {


require 'config.php';

$username = $_POST['uid'];
$email = $_POST['mail'];
$password = $_POST['pwd'];
$passwordRepeat = $_POST['pwd-repeat'];
$level = $_POST['level'];

if (empty($username) || empty($email) || empty($password) || empty($passwordRepeat)) {
    header("Location: signup.php?error=legevelden&uid=".$username. "&mail=".$email);
    exit();
}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: signup.php?error=nietbestaandemailennaam");
    exit();
}

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    header("Location: signup.php?error=nietbestaandemail&uid=".$username);
    exit();
}
else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    header("Location: signup.php?error=nietwerkendenaam&mail=".$email);
    exit();
}
else if ($password !== $passwordRepeat) {
    header("Location: signup.php?error=anderewachtwoord&uid=".$username."&mail=".$email);
    exit();
}
else {
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: signup.php?error=sqlerror");
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
            header("Location: signup.php?error=gebruikernietbeschikbaar&mail=".$email);
            exit();
        }
        else {

            $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers, userLevel) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: signup.php?error=sqlerror");
                exit();
        }
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ssss", $username, $email, $hashedPwd, $level);
            mysqli_stmt_execute($stmt);
            header("Location: signup.php?registratie=succes");
            exit();
        }
    }
}
}
mysqli_stmt_close($stmt);
mysqli_close($conn);

}
else {
    header("Location: signup.php");
    exit(); 
}

?>