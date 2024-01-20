<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">


</head>

<body>


    <div class="container-fluid ">
        <div class="mb-5 row">
            <div class=" col-12 mb-5 fixed-top text-white " style="background-color:#7e5a002f; ">
                <div class="row headfirst">


                    <div class="d-none d-lg-block fs-6 col-md-3 col-12 col-lg-4 align-self-start" style="color:#DAA520;">
                        <!-- <span class="fs-5 fw-bold ms-1 me-2"> <a class="text-black-50" href="index.php">Home</a> </span> -->
                        <a href="index.php"><img src="resources/logo.png" alt="" height="50px"></a>
                        <span class=" ms-5">Cuisine Section</span>
                        <span class=" ms-5">Contact Us</span>

                    </div>
                    <div class="offset-lg-5  col-12 col-md-6 col-lg-3 align-self-end">
                        <div class="row  mb-3">
                           
                            <?php
                            if (isset($_SESSION["u"])) {
                                $user = $_SESSION["u"]["fname"];
                                $email = $_SESSION["u"]["email"];

                            ?>
                                <div class="col-3 mt-2">
                                    <span style="color:#DAA520 ;" class="fs-6">Welcome</span>
                                </div>
                                <div class="col-2  col-lg-6 col-md-6 dropdown">
                                    <button style="background-color:#f3b4157c; border-radius: 10%;" class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <!-- <li><a class="dropdown-item" href="watchlist.php">Watchlist</a></li> -->
                                        <li><a class="dropdown-item" href="purchasehistory.php">Purchase History</a></li>
                                        <li><a class="dropdown-item" href="messages.php?email=<?php echo $email ?>">Message</a></li>
                                        <li><a class="dropdown-item" href="user/userprofile.php">My Profile</a></li>
                                        <li><a class="dropdown-item" onclick="signout();">Log Out</a></li>

                                    </ul>
                                </div>
                                <div onclick="gotocart();" class="col-1  col-lg-3 col-md-3 mt-1 ms-5 ms-lg-0 carticon" style="cursor: pointer;"></div>


                            <?php
                            } else {
                            ?>
                                <a href="sign/signin.php" class="fs-6 ms-1" style="text-decoration: none; color:#DAA520"><i class="fs-3 mt-3 me-2 bi bi-person"></i>Sign In</a>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <script src="script.js"></script>
    <!-- <script src="bootstrap.bundle.js"></script>  -->

</body>

</html>