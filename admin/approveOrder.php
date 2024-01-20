<?php
require "../connection.php"; 
$oid = $_GET["oid"];
$idx = $_GET["idx"];

if($idx=="1"){
    Database::iud("UPDATE `order` SET `status_id` = '2' WHERE `order_id` = '".$oid."'");
    echo "approve";
}else if($idx=="2"){
    Database::iud("UPDATE `order` SET `status_id` = '3' WHERE `order_id` = '".$oid."'");
    echo "process";
}else if($idx=="3"){
    Database::iud("UPDATE `order` SET `status_id` = '4' WHERE `order_id` = '".$oid."'");
    echo "shipped";
}else if($idx=="4"){
    Database::iud("UPDATE `order` SET `status_id` = '5' WHERE `order_id` = '".$oid."'");
    echo "complete";
}



?>