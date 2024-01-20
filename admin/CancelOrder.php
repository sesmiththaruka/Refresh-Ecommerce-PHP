<?php
require "../connection.php";
$oid = $_GET["id"];

Database::iud("UPDATE `order` SET `status_id` = '6' WHERE `order_id` = '".$oid."'");
echo "success";
?>
<script>window.location="dispatcher.php";</script>
<?php

?>