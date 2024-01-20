<?php
session_start();
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

        <link rel="icon" href="../resources/logo.jpeg">
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
                                    <span class="fs-5"><?php echo $_SESSION["a"]["fname"] . " " . $_SESSION["a"]["lname"] ?></span>
                                </div>
                                <div class="col-12 mt-4 d-grid  nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="abtn btn mt-1 fs-5 text-white" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" style="background-color: 	#DAA520;">Dashboard</a>
                                    <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageOrder();">Order manage</a>
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
                                <div class="col-12" id="addContent">
                                    <div class="row">
                                        <?php require "../connection.php" ?>
                                        <!-- ////////////////////////////////////////////////////////////////// -->
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="mt-5 ms-5 col-12 col-lg-5">
                                                    <div class="row">
                                                        <div class="bg-dark text-white col-12">
                                                            <h4>Order Statistics</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="bg-white col-12 p-3">
                                                            <div class="row">

                                                                <div class="col-5 mx-2 my-1 bg-primary text-white text-center rounded" onclick="goToOrder();">
                                                                    <?php
                                                                    $nos = Database::search("SELECT * FROM `order` WHERE `status_id`='1'");
                                                                    $nordern = $nos->num_rows;
                                                                    ?>
                                                                    <span>Pending</span><br>
                                                                    <span><?php echo $nordern ?></span>
                                                                </div>
                                                                <div class="col-5 ms-5 my-1  bg-warning text-white text-center rounded">
                                                                    <?php
                                                                    $nosp = Database::search("SELECT * FROM `order` WHERE `status_id`='3'");
                                                                    $nordernp = $nosp->num_rows;
                                                                    ?>
                                                                    <span>Processing </span><br>
                                                                    <span><?php echo $nordernp ?></span>
                                                                </div>
                                                                <div class="col-5 mx-2 my-1  bg-success text-white text-center rounded">
                                                                    <?php
                                                                    $nospd = Database::search("SELECT * FROM `order` WHERE `status_id`='5'");
                                                                    $nordernpd = $nospd->num_rows;
                                                                    ?>
                                                                    <span>Delievered </span><br>
                                                                    <span><?php echo $nordernpd ?></span>
                                                                </div>
                                                                <div class="col-5 ms-5 my-1  bg-danger text-white text-center rounded">
                                                                    <?php
                                                                    $nospdc = Database::search("SELECT * FROM `order` WHERE `status_id`='6'");
                                                                    $nordernpdc = $nospdc->num_rows;
                                                                    ?>
                                                                    <span>Cancelled </span><br>
                                                                    <span><?php echo $nordernpdc ?></span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mt-5 ms-5 col-12 col-lg-5">

                                                    <div class="row">
                                                        <div class="bg-dark text-white col-12">
                                                            <h4>Selling Statistics</h4>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12 bg-white p-3">
                                                            <div class="row">


                                                                <div class="col-5 mx-2 my-1 bg-primary text-white text-center rounded">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>Daily Earnings</span>
                                                                            <br>
                                                                            <?php
                                                                            $today = date("Y-m-d");
                                                                            $thismonth  = date("m");
                                                                            $thisyear = date("Y");

                                                                            $a = "0";
                                                                            $b = "0";
                                                                            $c = "0";
                                                                            $e = "0";
                                                                            $f = "0";

                                                                            $invoicers = Database::search("SELECT * FROM `invoice`");
                                                                            $in = $invoicers->num_rows;

                                                                            for ($x = 0; $x < $in; $x++) {
                                                                                $ir = $invoicers->fetch_assoc();
                                                                                $f = $f + $ir["qty"];
                                                                                $d = $ir["date"];
                                                                                $splitdate = explode(" ", $d);
                                                                                $pdate = $splitdate[0];

                                                                                if ($pdate == $today) {
                                                                                    $a = $a + $ir["total"];
                                                                                    $c = $c + $ir["qty"];
                                                                                }

                                                                                $splitmonth = explode("-", $pdate);
                                                                                $pyear = $splitmonth[0];
                                                                                $pmonth = $splitmonth[1];
                                                                                if ($pyear == $thisyear) {
                                                                                    if ($pmonth == $thismonth) {
                                                                                        $b = $b + $ir["total"];
                                                                                        $e = $e + $ir["qty"];
                                                                                    }
                                                                                }
                                                                            }



                                                                            ?>
                                                                            <span>Rs.<?php echo $a ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-5 ms-5 my-1  bg-warning text-white text-center rounded">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>Monthly Earnings</span>
                                                                            <br>
                                                                            <span>Rs.<?php echo $b ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 mx-2 my-1  bg-success text-white text-center rounded">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>Today Sellings</span>
                                                                            <br>
                                                                            <span><?php echo $c ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-5 ms-5 my-1  bg-danger text-white text-center rounded">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <span>Monthly Sellings</span>
                                                                            <br>
                                                                            <span><?php echo $e ?></span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="mt-5 ms-5 col-12 col-lg-5">
                                                        <div class="row">
                                                            <div class="bg-dark text-white col-12">
                                                                <h4>Site Statistics</h4>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="bg-white col-12 p-3">
                                                                <div class="row">

                                                                    <div class="col-5 mx-2 my-1 bg-primary text-white text-center rounded" onclick="loadUsers();">
                                                                        <?php
                                                                        $us = Database::search("SELECT * FROM `user`");
                                                                        $un = $us->num_rows;
                                                                        ?>
                                                                        <span>Users</span>
                                                                        <br>
                                                                        <span><?php echo $un ?></span>
                                                                    </div>
                                                                    <div class="col-5 ms-5 my-1  bg-warning text-white text-center rounded" onclick="loadManageCategory();">
                                                                        <?php
                                                                        $cs = Database::search("SELECT * FROM `category`");
                                                                        $cn = $cs->num_rows;
                                                                        ?>
                                                                        <span>Categories</span>
                                                                        <br>
                                                                        <span><?php echo $cn ?></span>
                                                                    </div>
                                                                    <div class="col-5 mx-2 my-1  bg-success text-white text-center rounded" onclick="loadManageProduct();">
                                                                        <?php
                                                                        $ps = Database::search("SELECT * FROM `product`");
                                                                        $pn = $ps->num_rows;
                                                                        ?>
                                                                        <span>Cuisines</span>
                                                                        <br>
                                                                        <span><?php echo $pn ?></span>
                                                                    </div>
                                                                    <div class="col-5 ms-5 my-1  bg-danger text-white text-center rounded" onclick="gotochat();">
                                                                        <?php
                                                                        $chatrs = Database::search("SELECT DISTINCT `from` FROM `chat` WHERE `status_id` = '1'");
                                                                        $cn = $chatrs->num_rows;
                                                                        ?>
                                                                        <span>Chat</span>
                                                                        <br>
                                                                        <span><?php echo $cn; ?></span>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- /////// parana eka .//////////////// -->




                                        </div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <hr />
                                    </div>
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12 bg-dark">
                                                <div class="row">
                                                    <div class="col-12 col-lg-3  text-center mt-1 mb-1">
                                                        <label class="form-label fs-5 ms-5 fw-bold text-white"> Total Active Time</label>
                                                    </div>
                                                    <?php
                                                    $startdate = new DateTime("2021-10-01 00:00:00");
                                                    $tdate = new DateTime();
                                                    $tz = new DateTimeZone("Asia/Colombo");
                                                    $tdate->setTimezone($tz);
                                                    $endDate = new DateTime($tdate->format("Y-m-d H:i:s"));

                                                    $difference = $endDate->diff($startdate);

                                                    ?>
                                                    <div class="col-12 col-lg-9 text-center mt-1 mb-1">
                                                        <label class="form-label fs-4 fw-bold text-success">
                                                            <?php
                                                            echo
                                                            $difference->format('%Y') . "Years" . " " . $difference->format('%M') . "Months" . " " .
                                                                $difference->format('%d') . "Days" . " " . $difference->format('%H') . "Hours" . " " .
                                                                $difference->format('%i') . "Minutes" . " " . $difference->format('%s') . "Seconds";
                                                            ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <hr>
                                            </div>

                                            <div class="col-12 bg-light">
                                                <div class="row">
                                                    <div class="col-3 ">
                                                        <h4 class="ms-5 mt-3  ">Selling History</h4>
                                                    </div>
                                                    <div class="col-3 ">
                                                        <span class="fs-4">From Date</span> <br>
                                                        <input class="col-12" type="date" id="fromdate">
                                                    </div>
                                                    <div class="col-3 ">
                                                        <span class="fs-4">To Date</span> <br>
                                                        <input class="col-12" type="date" id="todate">
                                                    </div>
                                                    <div class="d-grid col-3">
                                                        <button class="btn btn-outline-dark" onclick="dailySellings();">Search</button>
                                                    </div>
                                                </div>
                                            </div>






                                        </div>
                                    </div>
                                    <!-- ////////////////////////////////////////////////////////////////////// -->
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