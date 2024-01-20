<?php

session_start();

require "../connection.php";

if(isset($_SESSION["a"])){

    $recever = $_POST["e"];
    $msg = $_POST["t"];

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    if(empty($msg)){
        echo "Please enter a message to send";
    }else{

        Database::iud("INSERT INTO `chat` (`from`,`to`,`content`,`date`,`status_id`) VALUES ('admin@gmail.com','".$recever."','".$msg."','".$date."','2')");
      Database::iud("UPDATE `chat` SET `status_id` = '2' WHERE `from` = '".$recever."'");
        echo "success";

    }

}

?>
