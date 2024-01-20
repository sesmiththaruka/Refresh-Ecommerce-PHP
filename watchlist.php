<?php
require "header.php";

// session_start();
require "connection.php";

if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
?>





    <!DOCTYPE html>
    <html>


    <head>
        <title>Refresh | Watchlist</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link rel="icon" href="resources/logo.svg" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <div class="container-fluid">
            <div class="row gx-2 gy-2">

                <div class="col-12 border border-1 border-secondary rounded">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">Watchlist &hearts;</label>
                        </div>
                      
                        <div class="col-12 col-lg-2  ">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                            <nav class="nav nav-pills flex-column">
                                <a class="nav-link active" aria-current="page" href="#">My Watchlist</a>
                                <a class="nav-link" href="cart.php">My cart</a>
                                <!-- <a class="nav-link" href="#">Recently Viewed</a> -->
                            </nav>
                        </div>

                        <?php

                        $watchlistrs = Database::search("SELECT * FROM `watchlist` WHERE `user_email` = '" . $umail . "'");
                        $wn = $watchlistrs->num_rows;

                        if ($wn == 0) {
                        ?>

                            <!-- without items -->
                            <div class="col-12 col-lg-9">
                                <div class="row">
                                    <div class="col-12 emptyview"></div>
                                    <div class="col-12 text-center">
                                        <label style="opacity: 55%;" class="form-label fs-1 mb-3 fw-bolder">You Have no items in your watchlist.</label>

                                    </div>
                                </div>
                            </div>
                            <!-- without items -->


                        <?php
                        } else {
                        ?>
                            <div class="col-12 col-lg-10 ">
                                <div class="row ">
                                    <?php
                                    for ($i = 0; $i < $wn; $i++) {
                                        $wr = $watchlistrs->fetch_assoc();
                                        $wid =  $wr["product_id"];

                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $wid . "'");
                                        $pn = $productrs->num_rows;
                                        if ($pn == 1) {
                                            $pr = $productrs->fetch_assoc();
                                            $prodid = $pr["id"];

                                    ?>



                                            <div class="card mb-3 mx-0 mx-lg-3 col-11 ">
                                                <div class="row g-2">
                                                    <div class="col-md-4">
                                                        <?php
                                                        $imagers = Database::search("SELECT * FROM `pro_image` WHERE `product_id` = '" . $prodid . "'");
                                                        $in = $imagers->num_rows;

                                                        $arr;

                                                        for ($x = 0; $x < $in; $x++) {
                                                            $ir = $imagers->fetch_assoc();
                                                            $arr[$x] = $ir["code"];
                                                        }
                                                        ?>
                                                        <img src="<?php echo $arr[0]; ?>" class="mt-1 img-fluid rounded-start" alt="...">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="card-body">
                                                            <h3 class="card-title"><?php echo $pr["name"]; ?></h3>
                                                           
                                                            
                                                           
                                                            <span class="fw-bold text-black-50 fs-5">Large Price:</span>&nbsp;
                                                            <span class="fw-bolder text-black fs-5">Rs. <?php echo $pr["l-price"]; ?></span>
                                                            <br>
                                                            <span class="fw-bold text-black-50 fs-5">Regular Price:</span>&nbsp;
                                                            <span class="fw-bolder text-black fs-5">Rs. <?php echo $pr["r-price"]; ?></span>
                                                            <br>
                                                           
                                    
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3 mt-4">
                                                        <div class="card-body d-grid">
                                                            <!-- <a href="" class="btn btn-outline-success mb-2">Buy Now</a> -->
                                                            <a href="singleProductView.php?id=<?php echo $pr["id"] ?>" class="btn btn-outline-secondary mb-2">Add cart</a>
                                                            <a href="##" class="btn btn-outline-danger mb-2" onclick="deletefromwatchlist(<?php echo $wr['id']; ?>)">Remove</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                <?php
                                        }
                                    }
                                }

                                ?>
                                </div>
                            </div>





                    </div>
                </div>


                <?php require "footer.php" ?>
            </div>
        </div>





<script src="bootstrap.bundle.js"></script>
        <script src="script.js"></script>
    </body>

    </html>

<?php
}
