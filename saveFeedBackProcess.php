<?php 

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $mail = $_SESSION["u"]["email"];
    

    $pid = $_POST["i"];
    $feedback = $_POST["ft"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    Database::iud("INSERT INTO `feedback` (`feed`,`date`,`user_email`,`product_id`) VALUES ('".$feedback."','".$date."','".$mail."','".$pid."')");
echo "1";
}

?>