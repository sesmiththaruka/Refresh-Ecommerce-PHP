<!DOCTYPE html>
<html>

<head>
    <title>Refresh | MyProfile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../bootstrap.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <?php
             require "header.php";
            require "../header1.php";
           
            require "../connection.php";

            ?>
        </div>
    </div>

    <div class="container" style="background-color: rgba(148, 148, 0, 0.041);">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <p>Thank you for your continued patronage. Our site has been upgraded to offer you more dining options. We apologise for any inconvenience caused</p>

                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class=" mt-3 col-12" style="height:55px; background-color: #F0E68C; cursor: pointer;" onclick="goToDashBoard();">
                                <h5 class="mt-3 ms-3">Dashboard</h5>
                            </div>
                            <div class="text-white mt-2 col-12" style="height:55px; background-color: #DAA520; cursor: pointer;" onclick="goToOrders();">
                                <h5 class="mt-3 ms-3">Orders</h5>
                            </div>
                         
                            <div class="mt-2 col-12" style="height:55px; background-color:#F0E68C; cursor: pointer;" onclick="goTOaddress();">
                                <h5 class="mt-3 ms-3">Address</h5>
                            </div>
                            <div class="mt-2 col-12" style="height:55px; background-color:#F0E68C; cursor: pointer;" onclick="GoToBilling();">
                                <h5 class="mt-3 ms-3">Account Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-lg-9">
                        <div class="row">
                            <div id="adddiv" class="mt-3 col-12 offset-lg-2 col-lg-10">
                                <div class="row">
                                    <?php
                                    $orderrs = Database::search("SELECT * FROM `order` WHERE `user_email`='" . $_SESSION["u"]["email"] . "' AND `status_id` = '1'");
                                    $ordern = $orderrs->num_rows;
                                    if ($ordern == 0) {
                                    ?>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12 col-lg-6">
                                                    <span class="fs-4 text-text-black-50">No order has been made yet.
                                                    </span>
                                                </div>
                                                
                                            </div>
                                        </div>


                                    <?php
                                    }else{

                                    //    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$order["order_id"]."'");
                                    //    $invoice_num = $invoicers->num_rows;
                                    //    $invoice = $invoicers->fetch_assoc();

                                        
                                       ?>
                                       <div class="col-12">
                                           <div class="row">
                                               <div class="col-4">
                                                   <span class="fs-5 fw-bold text-black-50">Order Id</span>
                                               </div>
                                               <div class="col-4">
                                                   <span class="fs-5 fw-bold text-black-50" >Date & Time</span>
                                               </div>
                                               <div class="col-4">
                                                  <span class="fs-5 fw-bold text-black-50">Purchased Price</span> 
                                               </div>
                                              
                                           </div>
                                       </div>
                                       <?php
                                       

                                       for($x=0;$x<$ordern;$x++){
                                        $order =  $orderrs->fetch_assoc();
                                        
                                       $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$order["order_id"]."'");
                                       $invoice_num = $invoicers->num_rows;
                                       $a="";
                                       $product="";

                                            $invoice = $invoicers->fetch_assoc();
                                            $pro_id = $invoice["product_id"];
    
                                       
                                        
                                       

                                        ?>
                                        <div class="col-12 mt-2">
                                            <div class="row bg-danger text-white">
                                                <div class="col-4">
                                                    <span><?php echo $order["order_id"] ?></span>
                                                </div>
                                                <div class="col-4">
                                                    <span><?php echo $invoice["date"] ?></span>
                                                </div>
                                                
                                                <div class="col-4">
                                                   <span><?php echo $order["total_price"] ?></span> 
                                                </div>
                                                
                                                
                                               
                                            </div>
                                        </div>
                                        <?php
                                       }

                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>













    <script src="../bootstrap.bundle.js"></script>

    <script src="user.js"></script>
    <script src="../script.js"></script>

</body>

</html>