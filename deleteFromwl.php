<?php
require "connection.php";
$id = $_GET["id"];
// echo $id;


Database::iud("DELETE FROM `watchlist` WHERE `id` = '".$id."'");
echo "removed";

?>