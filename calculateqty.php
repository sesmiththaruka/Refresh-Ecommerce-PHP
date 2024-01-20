<?php
$pricem = "0";
$price = "0";

if (isset($_GET["nv"])) {


    require "connection.php";
    $nqty = $_GET["nv"];
    $size = $_GET["s"];
    $id = $_GET["id"];

    $productrs = Database::search("SELECT * FROM `product` WHERE `id`='" . $id . "'");
    $product = $productrs->fetch_assoc();


   

    if ($size == "0") {
        $price =  "Please select some product options before buying your product.";
    } else if ($size == "1") {
        $price = $product["l-price"] * $nqty;
    } else if ($size == "2") {
        $price = $product["r-price"] * $nqty;
    }
?>
<?php echo $price ?>
<?php


} else if (isset($_GET["mv"])) {

    require "connection.php";
    $nqtym = $_GET["mv"];
    $sizem = $_GET["s"];
    $idm = $_GET["id"];
    $p = $_GET["p"];

    // echo $nqtym . "$";
    // $pricem = "0";
    $productrsm = Database::search("SELECT * FROM `product` WHERE `id`='" . $idm . "'");
    $productm = $productrsm->fetch_assoc();

    if ($sizem == "0") {
        echo "Please select some product options before buying your product.";
    } else if ($sizem == "1") {
        $pricem = $p - $productm["l-price"];
    } else if ($sizem == "2") {
        $pricem = $p - $productm["r-price"];
    }
?>
<?php echo $pricem ?>
<?php
}
?>