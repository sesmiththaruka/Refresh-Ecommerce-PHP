
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
            ?>
        </div>
    </div>

    <div class="container p-5" style="background-color: rgba(148, 148, 0, 0.041);">
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
                            <div class=" mt-3 col-12" style="height:55px; background-color: #F0E68C;" onclick="goToDashBoard();">
                                <h5 class="mt-3 ms-3">Dashboard</h5>
                            </div>
                            <div class="mt-2 col-12" style="height:55px; background-color: #F0E68C; cursor: pointer;" onclick="goToOrders();">
                                <h5 class="mt-3 ms-3">Orders</h5>
                            </div>
                            <div class="mt-2 col-12" style="height:55px; background-color:#F0E68C; cursor: pointer;">
                                <h5 class="mt-3 ms-3">Downloads</h5>
                            </div>
                            <div class=" mt-2 col-12" style="height:55px; background-color:#F0E68C; cursor: pointer;" onclick="goTOaddress();">
                                <h5 class="mt-3 ms-3">Address</h5>
                            </div>
                            <div class="text-white mt-2 col-12" style="height:55px; background-color:#DAA520; cursor: pointer;" onclick="GoToBilling();">
                                <h5 class="mt-3 ms-3">Account Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-lg-9">
                        <div class="row">
                            <div id="adddiv" class="mt-3 col-12 offset-lg-2 col-lg-10">
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <span class="fs-6">First Name*</span><br>
                                        <input class="form-control" type="text" placeholder="Enter Your First Name" value="<?php echo $_SESSION["u"]["fname"] ?>" id="fn">
                                    </div>
                                    <div class="col-12 col-lg-6">
                                        <span class="fs-6">Last Name*</span><br>
                                        <input class="form-control" type="text" placeholder="Enter Your Last Name" value="<?php echo $_SESSION["u"]["lname"] ?>" id="ln">
                                    </div>
                                    <div class="mt-5 col-12 col-lg-6">
                                        <span class="fs-6">Phone*</span><br>
                                        <input class="form-control" type="text" placeholder="Enter Your Mobile Number" value="<?php echo $_SESSION["u"]["mobile"] ?>" id="m">
                                    </div>
                                    <div class="mt-5 col-12 col-lg-6">
                                        <span class="fs-6">Email*</span><br>
                                        <input class="form-control" type="text" placeholder="Enter Your Email" value="<?php echo $_SESSION["u"]["email"] ?>" disabled id="e">
                                    </div>
                                    <h5 class="mt-5">Change Password</h5>
                                    <div class="mt-2 col-12 ">
                                        <span class="fs-6">Current Password</span><br>
                                        <input class="form-control" type="password" placeholder="Enter Current Password" id="currentp">
                                    </div>
                                    <div class="mt-2 col-12 ">
                                        <span class="fs-6">New  Password</span><br>
                                        <input class="form-control" type="password" placeholder="Enter  New  Password" id="newp">
                                    </div>
                                    <div class="mt-2 col-12 ">
                                        <span class="fs-6">Confirm Password</span><br>
                                        <input class="form-control" type="password" placeholder="Enter Confirm password" id="confirmp">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <div class="row">
                                            <div class="d-grid col-4">
                                                <button class="btn text-white" style="background-color:#DAA520 ;" onclick="saveBilling();">Save</button>
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
    </div>













<script src="../bootstrap.bundle.js"></script>
    <script src="user.js"></script>
    <script src="../script.js"></script>

</body>

</html>