<?php

session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $id = $_GET["id"];
    $qty = $_GET["txt"];
    $size = $_GET["s"];
    $uemail = $_SESSION["u"]["email"];
    

    if ($qty == 0) {
        echo "Please Add a Quantity";
    } else if ($qty < 0) {
        echo "Please add a valid Quantity";
    } else if($size=="0"){
        echo "Please select some product options before adding your cart.";
    }else {



        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email`='" . $uemail . "' AND `product_id` = '" . $id . "'");
        $cn = $cartrs->num_rows;

        if ($cn == 1) {
            echo "This Product Is Already Exists In Your Cart";
        } else {

                Database::iud("INSERT INTO `cart`(`user_email`,`product_id`,`qty`,`size`) VALUES ('" . $uemail . "','" . $id . "','" . $qty . "','".$size."')");
                echo "success";
           
        }
    }
}else{
    echo "Please Log In First";
}
