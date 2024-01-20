<?php


?>
<!DOCTYPE html>

<html>
    

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
                            <a class="abtn btn mt-1 fs-3 nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="loadDashBoard();">Dashboard</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageOrder();">Order manage</a>
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
                                <div class="col-12 bg-light text-center rounded">
                                    <label class="form-label fs-2 fw-bold text-primary">Manage Order</label>
                                </div>

                                <div class="col-12 bg-light rounded">
                                    <div class="row">
                                        <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                                            <div class="row">
                                                <div class="col-9">
                                                <?php
require "../connection.php";


$pageno;

?>
                                                    <input type="text" class="form-control" id="searchtext" onkeyup="searchUser();" />
                                                </div>
                                                <div class="col-3">
                                                    <button class="btn btn-primary" onclick="searchUser();">Search</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-3 mb-2">
                                    <div class="row">

                                        <div class="col-1 col-lg-1 bg-primary pt-2 pb-2 text-end">
                                            <span class="fs-4 fw-bold text-white">#</span>
                                        </div>


                                        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-4 fw-bold text-white">Merchant Name</span>
                                        </div>

                                        <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
                                            <span class="fs-4 fw-bold"> Name</span>
                                        </div>

                                        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-4 fw-bold text-white">Item</span>

                                        </div>

                                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-4 fw-bold ">Trans Type</span>

                                        </div>
                                        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                        <span class="fs-4 fw-bold">Total </span>
                                        </div>
                                        

                                        <div class="col-4 col-lg-1 bg-white">Status</div>

                                    </div>
                                </div>


                                <?php

                                if (isset($_GET["page"])) {
                                    $pageno = $_GET["page"];
                                } else {
                                    $pageno = 1;
                                }


                                $usersrs = Database::search("SELECT * FROM `order`;");
                                $d = $usersrs->num_rows;
                                $row = $usersrs->fetch_assoc();
                                $result_per_page = 2;
                                $number_of_pages = ceil($d / $result_per_page);
                                $page_first_result = ((int)$pageno - 1) * $result_per_page;
                                $selectedrs = Database::search("SELECT * FROM `order` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                $srn = $selectedrs->num_rows;
                                $c=0;
                                
                                ?>




                                <div class="col-12 mb-2">
                                    <div class="row" id="utable">

                                        <?php
                                        while ($srow = $selectedrs->fetch_assoc()) {
                                            $c = $c + 1;
                                        ?>

                                            <div class="col-1 col-lg-1 bg-primary pt-2 pb-2 text-end mt-1" onclick="singleviewmodal('<?php echo $srow['order_id']; ?>');">
                                                <span class="fs-5 fw-bold text-white"><?php echo $c ?></span>
                                            </div>


                                            <?php 
                                            $mnamers = Database::search("SELECT * FROM `user` WHERE `email`='".$srow["user_email"]."'");
                                            $mname = $mnamers->fetch_assoc();
                                            ?>


                                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block mt-1">
                                                <span class="fs-6 fw-bold text-white"><?php echo $mname["fname"]." ".$mname["lname"] ?></span>
                                            </div>

                                            <?php
                                            $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$srow["order_id"]."'");
                                            $invoice = $invoicers->fetch_assoc();
                                            $invoicen = $invoicers->num_rows;
                                            ?>

                                            <div class="col-6 col-lg-2 bg-light pt-2 pb-2 mt-1">
                                                <span class="fs-5 fw-bold"><?php echo $invoice["d_fname"] . " " . $invoice["d_lname"] ?></span>
                                            </div>

                                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block mt-1">
                                            <span class="fs-5 fw-bold text-white">
                                                <?php
                                               $in =  Database::search("SELECT * FROM `invoice` WHERE `order_id` = '".$srow["order_id"]."'");
                                                for($x=0;$x<$invoicen;$x++){
                                                    $i = $in->fetch_assoc();
                                                    $productnamers = Database::search("SELECT * FROM `product` WHERE `id`='".$i["product_id"]."'");
                                                    $productname = $productnamers->fetch_assoc();
                                                    echo "*"; echo $productname["name"]; 
                                                     echo "<br/>";
                                                   

                                                    
                                                }
                                                ?>
                                                </span>
                                            </div>

                                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block mt-1">
                                                <span class="fs-5 fw-bold">Demo </span>
                                            </div>
                                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block mt-1">
                                                <span class="fs-5 fw-bold">Rs .<?php echo $srow["total_price"]; ?></span>
                                            </div>

                                            <div class="col-4 col-lg-1 bg-white d-grid p-1 mt-1">
                                                <?php
                                                $s = $srow["status_id"];
                                                if ($s == "1") {
                                                ?>
                                                    <button id="blockbtn<?php echo $srow["user_email"] ?>" class="btn btn-danger" onclick="blockusers('<?php echo $srow['user_email']; ?>');">New Order</button>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="btn btn-success" onclick="blockusers('<?php echo $srow['user_email']; ?>');">Complete Order</button>
                                                <?php
                                                //  echo $srow['order_id'];
                                                }
                                                ?>
                                            </div>

                                         
   
                                           
                                            
                                        <?php
                                        }
                                        ?>
                                      <!-- pagination -->
                                        <div class=" d-flex justify-content-center col-12  fs-5 fw-bold mt-2">
                                            <div class="pagination">
                                                <a href="<?php if ($pageno <= 1) {
                                                                echo "#";
                                                            } else {
                                                                echo "?page=" . ($pageno - 1);
                                                            }
                                                            ?>">
                                                    &laquo;</a>
                                                <?php
                                                for ($page = 1; $page <= $number_of_pages; $page++) {
                                                    if ($page == $pageno) {
                                                ?>
                                                        <a class="active ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <a class="ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                                                <?php
                                                    }
                                                }
                                                ?>


                                                <a href="<?php
                                                            if ($pageno >= $number_of_pages) {
                                                                echo "#";
                                                            } else {
                                                                echo "?page=" . ($pageno + 1);
                                                            }
                                                            ?>">&raquo;
                                                </a>
                                            </div>
                                        </div>
                                        <!-- pagination -->





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
