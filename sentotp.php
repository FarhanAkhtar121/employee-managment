<?php
session_start();
$getotp=rand(6,999999);

$_SESSION['setotp']=$getotp;

header("location:verifyotp.php")
?>
