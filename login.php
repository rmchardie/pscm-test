<?php
session_start();

//login details
$username = "rmchardie";
$password = "pscm2020";

//store form variables
$entered_username = $_POST['username'];
$entered_password = $_POST['password'];

//check entered details match stored details
if (($entered_username == $username) && ($entered_username == $username)){
    $_SESSION['user_id'] = $username;
    header("Location: updateSite.php");
} else {
    header("Location: login.html");
}
?>
