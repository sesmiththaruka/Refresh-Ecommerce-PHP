<?php
session_start();
require "../connection.php";
if (isset($_SESSION["a"])) {
?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Refresh | Admin</title>
        <link rel="stylesheet" href="admin.css">
        <title>Porduct view</title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <link rel="icon" href="resources/logo.jpeg">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="bootstrap.css">

    </head>

    <body style="background-color: 	#DCDCDC;">

        <div class="container-fluid">
            <div class="row">

                <div class="col-12">
                    <div class="row">
                        <div class="col-2 bg-dark">
                            <div class="row">
                                <div class="col-12 text-center text-white">
                                    <h2>Refresh</h2>
                                </div>
                                <div class="col-12  text-white-50">
                                    <span class="fs-6">Admin:-</span>
                                    <span class="fs-5">Sesmith</span>
                                </div>
                                <div class="col-12 mt-4 d-grid  nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="abtn btn mt-1 fs-3 text-white" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="loadDashBoard();">Dashboard</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" style="background-color: 	#DAA520;" onclick="loadManageOrder();">Order manage</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="ManageDelevery();">Manage Delevery Cost</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadManageProduct();">Manage cuisines</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadAddProduct();">Add Cuisines</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageCategory();">Manage Category</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadUsers();">Users</a>
                                    <a class="abtn link mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="goToQty();">Update Quantity</a>
                                    <a class="abtn link mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="goToSite();">View Site</a>

                                </div>
                            </div>
                        </div>
                        <div class="col-10">
                            <div class="row">
                                <div class="mt-3 col-12" id="addContent">
                                    <div class="row">
                                        <div class="col-10 offset-1" id="addnav">
                                            <div class="row">
                                                <?php
                                                $sid = "1";
                                                $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
                                                $order_num = $orderrs->num_rows;
                                                ?>
                                                <div id="1" class="order active_order text-center border border-1 border-light col-2" onclick="searchOrder('1')">
                                                    <span class="fs-6 fw-bolder">Pending </span><br>
                                                    <span class="text-white fw-bold">(<?php echo $order_num ?>)</span>
                                                </div>
                                                <?php
                                                $o = Database::search("SELECT * FROM `order` WHERE `status_id` = '2'");
                                                $on = $o->num_rows;
                                                ?>
                                                <div id="2" class=" order text-center border border-1 border-light col-2" onclick="searchOrder('2')">
                                                    <span class="fs-6 fw-bolder">Approved </span> <br>
                                                    <span class="text-white fw-bold">(<?php echo $on ?>)</span>
                                                </div>
                                                <?php
                                                $o1 = Database::search("SELECT * FROM `order` WHERE `status_id` = '3'");
                                                $on1 = $o1->num_rows;
                                                ?>
                                                <div id="3" class="text-center order border border-1 border-light col-2" onclick="searchOrder('3')">
                                                    <span class="fs-6 fw-bolder">processing </span><br>
                                                    <span class="text-white fw-bold">(<?php echo $on1 ?>)</span>
                                                </div>
                                                <?php
                                                $o2 = Database::search("SELECT * FROM `order` WHERE `status_id` = '4'");
                                                $on2 = $o2->num_rows;
                                                ?>
                                                <div id="4" class="order border text-center border-1 border-light col-2" onclick="searchOrder('4')">
                                                    <span class="fs-6 fw-bolder">Ongoing </span> <br>
                                                    <span class="text-white fw-bold">(<?php echo $on2 ?>)</span>
                                                </div>
                                                <?php
                                                $o3 = Database::search("SELECT * FROM `order` WHERE `status_id` = '5'");
                                                $on3 = $o3->num_rows;
                                                ?>
                                                <div id="5" class="order border text-center border-1 border-light col-2" onclick="searchOrder('5')">
                                                    <span class="fs-6 fw-bolder">Complete </span><br>
                                                    <span class="text-white fw-bold">(<?php echo $on3 ?>)</span>
                                                </div>
                                                <?php
                                                $o4 = Database::search("SELECT * FROM `order` WHERE `status_id` = '6'");
                                                $on4 = $o4->num_rows;
                                                ?>
                                                <div id="6" class="order border text-center border-1 border-light col-2" onclick="searchOrder('6')">
                                                    <span class="fs-6 fw-bolder">Cancelled </span><br>
                                                    <span class="text-white fw-bold">(<?php echo $on4 ?>)</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5 offset-1 col-10">

                                            <div class="row" id="Load_Orders">
                                                <div class="col-8 offset-2 mt-1">
                                                    <div class="row">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-search"></i></span>
                                                            <input type="text" id="search" class="col-4 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search Order" onkeyup="SearchOrder();">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 bg-danger">
                                                    <div class="row" id="so">

                                                    </div>
                                                </div>
                                                <!-- //////////////////////// -->
                                                <?php

                                                /////////////////////
                                                $orderrs = Database::search("SELECT * FROM `order` WHERE `status_id` = '" . $sid . "'");
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
                                                                        <button class="mt-2 btn btn-success" onclick="gotoApprove('<?php echo $order["order_id"] ?>')">Approve</button>
                                                                        <button class="mt-2 btn btn-warning" onclick="goToOtherDetails('<?php echo $order["order_id"] ?>');">Other Details</button>
                                                                        <button class="mt-2 btn btn-danger" onclick="gotocancel('<?php echo $order["order_id"] ?>')">Cancel Order</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                <?php
                                                    }
                                                }
                                                ?>

                                                <!-- ////////////////////////// -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <script src="../jquery-3.6.0.min.js"></script>

        <script src="../bootstrap.bundle.js"></script>
        <script src="admin.js"></script>
        <?php
        require "../footer.php"
        ?>
    </body>

    </html>
<?php
} else {
?>
    <script>
        window.location = "adminsignin.php"
    </script>
<?php
}
?>