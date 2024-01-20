<?php
require "connection.php";
$pid = $_POST["pid"];
$size = $_POST["ps"];
$qtyinput = $_POST["qty"];

// echo $size;
$pcalrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $pid . "'");
$pac = $pcalrs->fetch_assoc();

if ($size == 0) {


} else if ($size == 1) {
   
    $lprice = ($pac["l-price"]*$qtyinput);
        ?>
        <div class="ms-5 col-5">
            <span class="fs-2" >Rs. <div class="price" id="price"><?php echo $lprice ?></div> .00</span>
        </div>
    <?php
  
} else if ($size == 2) {
    $rprice = (int)$pac["r-price"]*(int)$qtyinput;
?>
    <div class="ms-5 col-5">
        <!-- <span class="fs-2" id="price">Rs.<?php echo $pac["r-price"] ?>.00</span> -->
        <span class="fs-2" >Rs. <div class="price" id="price"><?php echo $rprice ?></div> .00</span>

    </div>
<?php
}

?>