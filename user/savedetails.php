<?php
session_start();
require "../connection.php";

$fname = $_POST["fn"];
$lname = $_POST["ln"];
$mobile = $_POST["m"];
$email = $_POST["e"];
$currentp = $_POST["cup"];
$newp = $_POST["np"];
$conp = $_POST["conp"];

// echo $fname;
// echo $lname;
// echo $mobile;
// echo $email;
// echo $currentp;
// echo $newp;
// echo $conp;

if ($_SESSION["u"]["email"] == $email) {

    if (empty($currentp) && empty($newp) && empty($conp)) {
        if (empty($fname)) {
            echo "Please Enter Your First Name";
        } else if (strlen($fname) >= 50) {
            echo "First Name Must Be Less Than 50 Characters";
        } else if (empty($lname)) {
            echo "Please enter your Last Name";
        } else if (strlen($lname) >= 50) {
            echo "Last Name Must Be Less Than 50 Characters";
        } else if (empty($mobile)) {
            echo "Please enter your Mobile";
        } else if (strlen($mobile) != 10) {
            echo "Please Enter 10 digit mobile number";
        } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
            echo "Invalid Mobile Number";
        } else {
            Database::iud("UPDATE `user` SET `mobile` = '" . $mobile . "',`fname`='" . $fname . "',`lname`='" . $lname . "' WHERE `email` ='" . $_SESSION["u"]["email"] . "'");
            echo "success";
            $userrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["u"]["email"] . "'");
            $usern = $userrs->num_rows;
            $user = $userrs->fetch_assoc();
            $_SESSION["u"] = $user;
        }
    } else {

        if (empty($fname)) {
            echo "Please Enter Your First Name";
        } else if (strlen($fname) >= 50) {
            echo "First Name Must Be Less Than 50 Characters";
        } else if (empty($lname)) {
            echo "Please enter your Last Name";
        } else if (strlen($lname) >= 50) {
            echo "Last Name Must Be Less Than 50 Characters";
        } else if (empty($mobile)) {
            echo "Please enter your Mobile";
        } else if (strlen($mobile) != 10) {
            echo "Please Enter 10 digit mobile number";
        } else if (preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/", $mobile) == 0) {
            echo "Invalid Mobile Number";
        } else if ($currentp != $_SESSION["u"]["password"]) {
            echo "Your Passowrd unmatched";
        } else if (empty($newp)) {
            echo "Please enter your Password";
        } else if (strlen($newp) < 5 || strlen($newp) > 20) {
            echo "New Password length must between 5 to 20";
        } else if ($newp != $conp) {
            echo "Password Unmatched";
        } else {
            Database::iud("UPDATE `user` SET `mobile` = '" . $mobile . "',`fname`='" . $fname . "',`lname`='" . $lname . "',`password` = '" . $newp . "' WHERE `email` ='" . $_SESSION["u"]["email"] . "' ");
            echo "success";
            $userrs = Database::search("SELECT * FROM `user` WHERE `email`='" . $_SESSION["u"]["email"] . "'");
            $usern = $userrs->num_rows;
            $user = $userrs->fetch_assoc();
            $_SESSION["u"] = $user;
        }
    }
} else {
    echo "Can't Update your email";
}
