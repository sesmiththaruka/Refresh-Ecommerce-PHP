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

    <div class="container" style="background-color: rgba(148, 148, 0, 0.041);">
        <div class="row" >

            <div class="mt-5 col-12">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <p>Thank you for your continued patronage. Our site has been upgraded to offer you more dining options. We apologise for any inconvenience caused</p>

                    </div>
                </div>
            </div>
            <div class="ms-3 col-12">
                <div class="row">
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="text-white mt-3 col-12" style="height:55px; background-color: #DAA520;" onclick="goToDashBoard();">
                                <h5 class="mt-3 ms-3">Dashboard</h5>
                            </div>
                            <div class="mt-2 col-12" style="height:55px; background-color: #F0E68C; cursor: pointer;" onclick="goToOrders();">
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
                            <div id="adddiv" class="mt-3 col-12 offset-lg-1 col-lg-10">
                                <span>Hello <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?> (not <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"] ?> ? <a onclick="signout();" style="color: #DAA520;">Log out</a> ) <br><br>

                                    From your account dashboard you can view your <span style="color: #DAA520;">recent orders</span>, manage your <span style="color: #DAA520;">shipping and billing addresses</span>, and <span style="color: #DAA520;">edit your password and account details</span> .</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>













    <script src="../bootstrap.bundle.js"></script>

    <script src="user.js"></script>
    <!-- <script src="../script.js"></script> -->

</body>

</html>