<?php
session_start();



$order_id =  $_GET["id"];
require "../connection.php";
?>

<!DOCTYPE html>

<html>
<?php
?>

<head>
    <title>Refresh | Admin | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="../bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);min-height: 100vh;">

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
                            <a class="abtn btn mt-1 fs-3 text-white" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" style="background-color: #DAA520;" onclick="loadManageOrder();">Order manage</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="ManageDelevery();" >Manage Delevery Cost</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadManageProduct();">Manage cuisines</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadAddProduct();">Add Cuisines</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageCategory();">Manage Category</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadUsers();">Users</a>
                                <a class="abtn link mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="goToSite();">View Site</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12" id="addContent">
                                <!-- ///////////////////////////////////////////////////////////////////////////// -->
                                <div class="row">
                                    <?php
                                    $selectedrs = Database::search("SELECT * FROM `order` WHERE `order_id` = '" . $order_id . "'");
                                    $srow = $selectedrs->fetch_assoc();;

                                    $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $srow["order_id"] . "'");
                                    $invoice = $invoicers->fetch_assoc();
                                    $invoicen = $invoicers->num_rows;
                                    ?>
                                    <div class="col-6  bg-white d-grid p-1 mt-1">
                                      <span class="fw-bolder">Order Id</span>  <span class="fs-3"><?php echo $order_id; ?></span>
                                    </div>
                                    
                                    <div class="col-12 mt-5 bg-light">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Merchant Name</span>
                                            </div>
                                            <?php
                                            $mnamers = Database::search("SELECT * FROM `user` WHERE `email`='" . $srow["user_email"] . "'");
                                            $mname = $mnamers->fetch_assoc();
                                            ?>
                                            <div class="col-9">
                                                <span class="fs-5"><?php echo $mname["fname"] . " " . $mname["lname"] ?></span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Name</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5"><?php echo $mname["fname"] . " " . $mname["lname"] ?></span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 bg-light">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Item</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5 ">
                                                    <?php
                                                    $in =  Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $srow["order_id"] . "'");
                                                    for ($x = 0; $x < $invoicen; $x++) {
                                                        $i = $in->fetch_assoc();
                                                        $productnamers = Database::search("SELECT * FROM `product` WHERE `id`='" . $i["product_id"] . "'");
                                                        $productname = $productnamers->fetch_assoc();
                                                        echo "*"; ?><span class="fw-bolder fs-3"><?php echo $productname["name"]  ?></span> <span class='fw-bold fs-4 text-danger'>QTY</span><span class="fs-3 fw-bolder text-primary"><?php echo $i["qty"] ?></span> ;<?php
                                                                                                                                                                                                                                                                    echo "<br/>";
                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                    ?>
                                                </span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Address</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5"><?php echo $invoice["d_address_line1"] . "," . $invoice["d_address_line2"] . "," . $invoice["d_city"] . "," . $invoice["d_district"]; ?></span><br>
                                                <span>Postal code:</span><span class="text-success fs-4"><?php echo $invoice["d_zip"] ?></span>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 bg-light">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Mobile</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5"><?php echo $invoice["d_mobile"] ?></span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Email</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5"><?php echo $invoice["d_email"] ?></span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 bg-light">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Date</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5"><?php echo $invoice["date"] ?></span>

                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-12 ">
                                        <div class="row">
                                            <div class="col-3">
                                                <span class="fs-3 fw-bolder">Total</span>
                                            </div>

                                            <div class="col-9">
                                                <span class="fs-5">Rs.<?php echo $srow["total_price"] ?></span>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                                <!-- //////////////////////////////////////////////////////////////////////////////////  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- ///////////////////////////////////////////////////// -->




        </div>
    </div>
    <script src="admin.js"></script>
    <script src="../bootstrap.js"></script>
</body>

</html>
