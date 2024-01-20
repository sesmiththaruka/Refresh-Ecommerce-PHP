<?php
session_start();
require "connection.php";
$id = $_GET["id"];
$email = $_SESSION["u"]["email"];
// echo $id;

// echo $_SESSION["u"]["email"];

// echo $_SESSION["u"]["email"].': '.$_SESSION["u"]["mobile"];


if(isset($_SESSION["u"])){

    $watchrs = Database::search("SELECT * FROM `watchlist` WHERE `product_id` = '".$id."'");
    $watch = $watchrs->num_rows;
    if($watch==1){
        echo "Product Already Added";
    }else{
        Database::iud("INSERT INTO `watchlist`(`user_email`,`product_id`) VALUES ('".$email."','".$id."')");
        echo "Added WatchList";
    }

   
}else{
 echo "please Log In first";
}
?>