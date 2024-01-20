<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $id = $_GET["id"];
    $qty = $_GET["qty"];
    $size = $_GET["s"];
    $umail = $_SESSION["u"]["email"];

    if ($size == "0") {
    } else {

        $array;
        $orderID = uniqid();

        $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $id . "'");
        $pr = $productrs->fetch_assoc();

        $cityrs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $umail . "'");
        $cn = $cityrs->num_rows;

        $delivery = "0";
        $price = "0";

        if ($cn == 1) {
            $cr = $cityrs->fetch_assoc();
            $cityid = $cr["city_id"];
            $add = $cr["line1"] . "," . $cr["line2"];
            $districtrs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityid . "'");
            $dr = $districtrs->fetch_assoc();

            $districtid = $dr["district_id"];



            if ($districtid == "1") {
                $delivery = 0;
            } else {
                $delivery = 450;
            }
            if($size=="1"){
                $price = $pr["l-price"];
            }else if($size=="2"){
                $price = $pr["r-price"];
            }



            $item = $pr["name"];
            $amount = $price * $qty + $delivery;
            // echo $amount;

            $fname = $_SESSION["u"]["fname"];
            $lname = $_SESSION["u"]["lname"];
            $mobile = $_SESSION["u"]["mobile"];
            $address = $add;
            $city = $dr["name"];

            $array['id'] = $orderID;
            $array['item'] = $item;
            $array['amount'] = $amount;
            $array['fname'] = $fname;
            $array['lname'] = $lname;
            $array['email'] = $umail;
            $array['mobile'] = $mobile;
            $array['address'] = $address;
            $array['city'] = $city;

            echo json_encode($array);
        } else {
            echo "2";
        }
    }
} else {
    echo "1";
}
