<?php 

require "connection.php";

$max_qty = Database::search("SELECT * FROM `qty`;");
$max = $max_qty->fetch_assoc();

echo $max["qty"];

?>