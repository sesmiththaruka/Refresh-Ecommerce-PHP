<?php
require "../connection.php";
$name = $_POST["n"];
$cost = $_POST["c"];

// echo $name;
// echo $cost;

if(empty($name)){
    echo "Please enter Town Name";
}else if(empty($cost)){
    echo "Please Enter Cost";
}else if(!intval($cost)){
    echo "Please Enter a Valid Price";
}else{
    Database::iud("INSERT INTO `delivery`(`name`,`price`) VALUES ('".$name."','".$cost."')");
    echo "success";
}

?>