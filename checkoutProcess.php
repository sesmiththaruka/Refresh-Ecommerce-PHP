<?php
session_start();
require "connection.php";
if (isset($_SESSION["u"])) {

    if (empty($_GET["e"])) {
        echo "3";
    } else if (empty($_GET["m"])) {
        echo "3";
    } else if (empty($_GET["fn"])) {
        echo "3";
    } else if (empty($_GET["ln"])) {
        echo "3";
    } else if (empty($_GET["adl1"])) {
        echo "3";
    } else if (empty($_GET["adl2"])) {
        echo "3";
    } else if (empty($_GET["c"])) {
        echo "3";
    } else {

        if ($_GET["c"] != "0") {


            $city = $_GET["c"];
            $umail = $_SESSION["u"]["email"];



            // $cityrs = Database::search("SELECT `city`.`name` FROM `address` INNER JOIN `city` ON `address`.`city_id` = `city`.`id` WHERE `address`.`user_email` = '" . $umail . "'");
            // $cityn = $cityrs->num_rows;



            // $city_name = $cityrs->fetch_assoc();
            // $city = $city_name["name"];


            // delevery

            $citynamers = Database::search("SELECT * FROM `city` WHERE `id` = '".$city."'");
            $citynamef = $citynamers->fetch_assoc();
            $cityname = $citynamef["name"];


            $deleveryFee = "";

                $dr = Database::search("SELECT * FROM `delivery` WHERE `name`='" . $cityname . "'");
                $dnnn = $dr->num_rows;
                if ($dnnn == 1) {
                    $d = $dr->fetch_assoc();
                    $deleveryFee = $d["price"];
                } else {
                    $dogrs = Database::search("SELECT * FROM `delivery` WHERE `name`='out_of_galle'");
                    $dog = $dogrs->fetch_assoc();
                    $deleveryFee = $dog["price"];
                }
            

            // delevery

            $array;
            $orderID = uniqid();

            // $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $id . "'");
            // $pr = $productrs->fetch_assoc();

            // $cityrs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $umail . "'");
            // $cn = $cityrs->num_rows;

            $price = "";
            $sub_price = "";

            $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $umail . "'");
            $cn = $cartrs->num_rows;


            if ($cn > 0) {

                $item = "";
                $total = "";

                for ($x = 0; $x < $cn; $x++) {
                    $cart = $cartrs->fetch_assoc();

                    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart["product_id"] . "'");
                    $pr = $productrs->fetch_assoc();

                    if ($cart["size"] == "1") {
                        $price = $pr["l-price"];
                    } else if ($cart["size"] == "2") {
                        $price = $pr["r-price"];
                    }


                    $sub_price = $price * $cart["qty"];
                    $total = (int)$total + (int)$sub_price;
                }




                $item = "thara";
                $amount = $total + $deleveryFee;
                // echo $amount;

                $fname = $_SESSION["u"]["fname"];
                $lname = $_SESSION["u"]["lname"];
                $mobile = $_SESSION["u"]["mobile"];
                // $address = $add;


                $array['id'] = $orderID;
                $array['item'] = $item;
                $array['amount'] = $amount;
                $array['fname'] = $fname;
                $array['lname'] = $lname;
                $array['email'] = $umail;
                $array['mobile'] = $mobile;
                $array['address'] = "144";
                $array['city'] = $city;

                echo json_encode($array);


                Database::iud("INSERT INTO `order`(`order_id`,`total_price`,`user_email`,`status_id`)VALUES('" . $orderID . "','" . $amount . "','" . $_SESSION["u"]["email"] . "','1')");
            } else {
                echo "2";
            }
        } else {
            echo "3";
        }
    }
} else {
    echo "1";
}
