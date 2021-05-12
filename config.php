<?php 

$servername = "";
$dBUsername = "";
$dBPassword = "";
$dBName = "";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
    die("Connectie is mislukt: ".mysqli_connect_error());
}

?>