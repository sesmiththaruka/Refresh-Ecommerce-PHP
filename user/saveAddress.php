<?php
session_start();
require "../connection.php";

$al1 = $_POST["al1"];
$al2 = $_POST["al2"];
$city = $_POST["c"];


// echo $al1;
// echo $al2;
// echo $city;
// echo $district;
// echo $province;
if(empty($al1)){
    echo "Please Add Address line 1";
}else if(empty($al2)){
    echo "Please Add Address line 2";
}else if($city=="0"){
    echo "Please Add Address line 2";
}else{

$srs = Database::search("SELECT * FROM `address` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");
$sn = $srs->num_rows;

if($sn=="1"){
    Database::iud("UPDATE `address` SET `line1` = '".$al1."',`line2`='".$al2."',`city_id`='".$city."'");
    echo "success";
}else{
    Database::iud("INSERT INTO `address`(`line1`,`line2`,`user_email`,`city_id`) VALUES ('".$al1."','".$al2."','".$_SESSION["u"]["email"]."','".$city."')");
    echo "success";

}
}



?>