<?php
require "../connection.php";
$search = $_GET["s"];
// echo $search;
if(empty($search)){

}else{



$orderrs = Database::search("SELECT * FROM `order` WHERE `order_id` LIKE '" . $search . "%'");
    $order_num = $orderrs->num_rows;
    if ($order_num == 0) {
        ?>
                <div class="mt-5 col-12">
                    <div class="mt-5 row">
                        <div class="text-black-50 offset-4 col-4">
                            <h3>No Pending Orders</h3>
                        </div>
                    </div>
                </div>
            <?php
            } else {
           
                for ($a = 0; $a < $order_num; $a++) {
                    $order = $orderrs->fetch_assoc();
                    $sid = $order["status_id"];
        
                ?>
                    <!-- /////////////////////////////////// -->
        
                    <div class="mt-5 card">
                        <?php
                        $staters = Database::search("SELECT * FROM `order_status` WHERE `id` = '" . $sid . "' ");
                        $state = $staters->fetch_assoc();
                        ?>
                        <h5 class="card-header"><?php echo $state["name"] ?></h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <h5>
                                        <?php
                                        $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $order["order_id"] . "'");
                                        $invoice = $invoicers->fetch_assoc();
                                        $invoicen = $invoicers->num_rows;
        
                                        $in =  Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $order["order_id"] . "'");
                                        for ($x = 0; $x < $invoicen; $x++) {
                                            $i = $in->fetch_assoc();
                                            $productnamers = Database::search("SELECT * FROM `product` WHERE `id`='" . $i["product_id"] . "'");
                                            $productname = $productnamers->fetch_assoc();
                                            echo "*";
                                            echo $productname["name"];
                                            echo "<br/>";
                                        }
                                        ?>
                                    </h5>
                                </div>
                                <div class="col-5">
                                    <div class="row">
                                        <h6>Order Id:- <?php echo $order["order_id"] ?></h6>
                                        <div class="col-12">
                                            <span class="text-black-50">Merchant Email</span><span class="ms-2 fw-bold"><?php echo $order["user_email"] ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-black-50">Shipping Address</span> <span><?php echo $invoice["d_address_line1"] . " " . $invoice["d_address_line2"] . "," . $invoice["d_city"] ?></span>
                                        </div>
                                        <div class="col-12">
                                            <span class="text-black-50">Mobile</span><span class="ms-2 fw-bold"><?php echo $invoice["d_mobile"] ?></span>
                                        </div>
                                    </div>
        
                                </div>
                                <div class="d-grid col-4">
                                    <button class="mt-2 btn btn-warning" onclick="goToOtherDetails('<?php echo $order["order_id"] ?>');">Other Details</button>

                                </div>
        
                            </div>
                        </div>
                    </div>
        
                <?php
                }
            }
        }
?>
