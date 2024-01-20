<div class="row">


<?php 

require "connection.php";

$one = $_POST["o"];
$two = $_POST["t"];
$search = $_POST["s"];
$cat_id = $_POST["i"];
$meal = $_POST["m"];
$veg = $_POST["v"];

if($veg!="0" && $meal!="0"){
    $productrs = Database::search("SELECT * FROM `product` INNER JOIN `product_has_meal` ON `product`.`id` = `product_has_meal`.`product_id` WHERE `product_has_meal`.`meal_id` = '".$meal."' AND `product`.`condition_id`='".$veg."' AND `name` LIKE '%".$search."%' AND `category_id` = '".$cat_id."' AND `r-price` BETWEEN '".$one."' AND '".$two."'");

}else if($veg!="0" && $meal == "0"){
    $productrs = Database::search("SELECT * FROM `product` WHERE `name` LIKE '%".$search."%' AND `product`.`condition_id`='".$veg."' AND `category_id` = '".$cat_id."' AND `r-price` BETWEEN '".$one."' AND '".$two."'");

}else if($meal!="0" && $veg == "0"){
    // echo $meal;
    $productrs = Database::search("SELECT * FROM `product` INNER JOIN `product_has_meal` ON `product`.`id` = `product_has_meal`.`product_id` WHERE `product_has_meal`.`meal_id` = '".$meal."' AND `name` LIKE '%".$search."%' AND `category_id` = '".$cat_id."' AND `r-price` BETWEEN '".$one."' AND '".$two."'");

}else{
    // echo "hi";
    $productrs = Database::search("SELECT * FROM `product` WHERE `name` LIKE '%".$search."%' AND `category_id` = '".$cat_id."' AND `r-price` BETWEEN '".$one."' AND '".$two."'");

}


$pn = $productrs->num_rows;
if ($pn > 0) {
    for ($b = 0; $b < $pn; $b++) {
        $product = $productrs->fetch_assoc();
?>
        <!-- card -->
        <div class="big">
            <article class="recipe">
                <div class="pizza-box" onclick="goToSingleProductView(<?php echo $product['id']; ?>);" style="cursor:pointer">
                    <?php
                    $imgrs = Database::search("SELECT * FROM `pro_image` WHERE `product_id`='" . $product["id"] . "'");
                    $img = $imgrs->fetch_assoc();
                    // echo $cat["id"];
                    ?>
                    <!-- <img src="https://brotokoll.com/wp-content/uploads/2019/12/xPSX_20190928_134709.jpg.pagespeed.ic.qsjw5ilFw5.jpg" width="1500" height="1368" alt=""> -->
                    <img src="<?php echo $img["code"]; ?>" width="1500" height="1368" alt="">


                </div>
                <div class="recipe-content">
                    <div class="col-12" onclick="goToSingleProductView(<?php echo $product['id']; ?>);" style="cursor:pointer">
                        <p class="recipe-tags">
                            <span class="recipe-tag"> <span class="fs-6">Regular :-</span> <span class="fs-3">Rs.<?php echo $product['r-price']; ?>.00</span> </span>
                            <span class="recipe-tag"><span class="fs-6">Large :-</span><span class="fs-3"> Rs.<?php echo $product['l-price']; ?>.00</span></span>
                        </p>

                        <h1 class="recipe-title"><a href="#"><?php echo $product["name"]; ?></a></h1>

                        <p class="recipe-metadata">
                            <span class="recipe-rating">★★★★<span>☆</span></span>
                            <span class="recipe-votes">(12 votes)</span>
                        </p>

                        <p class="recipe-desc"><?php echo $product["description"] ?></p>
                    </div>
                    <button class="recipe-save" type="button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000">
                            <path d="M 6.0097656 2 C 4.9143111 2 4.0097656 2.9025988 4.0097656 3.9980469 L 4 22 L 12 19 L 20 22 L 20 20.556641 L 20 4 C 20 2.9069372 19.093063 2 18 2 L 6.0097656 2 z M 6.0097656 4 L 18 4 L 18 19.113281 L 12 16.863281 L 6.0019531 19.113281 L 6.0097656 4 z" fill="currentColor" />
                        </svg>
                        ADD TO CART
                    </button>

                </div>
            </article>
        </div>


        <!-- card -->
<?php
    }
} else {
    echo "you have no product to show";
}

?>



</div>