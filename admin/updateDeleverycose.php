<?php
$id = $_GET["id"];
$price = $_GET["dc"];
// echo $id;

if(empty($id)){
    echo "please add cost";
}else{
    require "../connection.php";

    Database::iud("UPDATE `delivery` SET `price`='".$price."' WHERE `id`='".$id."'");
    echo "success";
}


?>