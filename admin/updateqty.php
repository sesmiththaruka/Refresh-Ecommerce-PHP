<?php 
$qty =  $_GET["qty"];
echo $qty;
if(!isset($_GET["qty"])){
echo "1";
}else if(!intval($qty)){
    echo "2";

}else if($qty<0){
    echo "3";

}else{
    require "../connection.php";
    Database::iud("UPDATE `qty` SET `qty` = '".$qty."' WHERE `id` = '1'");
    echo "success";
}
?>