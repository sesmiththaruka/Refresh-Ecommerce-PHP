<?php
session_start();
require "connection.php";
$cid = $_POST["cid"];
$qty = $_POST["qty"];

// echo $cid;
// echo $qty;
$qtyrs = Database::search("SELECT * FROM `qty`");
$qtyr = $qtyrs->fetch_assoc();

if (!isset($_POST["cid"])) {
} else if (!isset($_POST["qty"])) {

} else if (!intval($qty)) {

} else if ($qty < 0) {
    

}else if($qty>$qtyr["qty"]){
    echo "Maximum quantity count has been achieved";
} else {
   

    Database::iud("UPDATE `cart` SET `qty` = '" . $qty . "' WHERE `id`='" . $cid . "' AND `user_email` = '" . $_SESSION["u"]["email"] . "'");
?>
    <button class="btn btn-outline-danger" type="button" onclick="refreshcart();">
        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
        <span class="fw-bolder sr-only">Update Cart</span>
    </button>
<?php
}
?>