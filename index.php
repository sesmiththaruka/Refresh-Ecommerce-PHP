<?php
require "header.php";
// echo $_SESSION["u"]["email"];
require "connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" href="resources/logo.png">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="product_view.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <!-- header -->


            <?php require "header1.php" ?>
            <!-- header -->



            <!-- carousal -->
            <div id="carouselExampleFade" class=" col-12 carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="resources/carousal3.jpg" class="d-block w-100" alt="...">

                    </div>
                    <div class="carousel-item">
                        <img src="resources/rachel-park-hrlvr2ZlUNk-unsplash.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="resources/eaters-collective-12eHC6FxPyg-unsplash.jpg" class="d-block w-100" alt="...">

                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <!-- carousal -->



        <!-- logo and searching section -->
        <div class="col-12 mt-5  justify-content-center">
            <div class="mt-3 col-12  text-center">
                <img src="resources/logo.png" alt="">
            </div>
            <div class="mt-4 col-12 d-flex justify-content-center">
                <span class="fs-3">Welcome to Galle’s largest online delivery menu, with over 400 dishes.</span>
            </div>
            <div class="mt-4 offset-lg-4 offset-0 col-12 col-lg-4">
                <div class="row">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-search"></i></span>
                        <input type="text" id="search" class="col-4 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search for your favourite dish" onkeyup="Search();">
                    </div>
                </div>

            </div>

        </div>

        <!-- logo and searching section -->


        <!-- view result -->
        <div class="col-12" id="view">

        </div>
        <!-- view result -->




        <!-- cuisine section -->
        <div class="mt-5 col-12">
            <div class="mt-3 row">
                <div class="mt-5 col-12 d-flex justify-content-center">
                    <h1>cuisine section</h1>
                </div>
                <div class="col-12 col-lg-6 offset-lg-3 " style="color:#DAA520;">
                    <hr class="hrbreak1">
                </div>
                <div class="col-12 mt-4"  style="background-color: rgba(148, 148, 0, 0.041);">
                    <!-- card -->
                    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->

                    <section class="hero-section">
                        <div class="card-grid" >
                            <?php
                            $catrs = Database::search("SELECT * FROM `category` LIMIT 8");
                            $catn = $catrs->num_rows;
                            for ($a = 0; $a < $catn; $a++) {
                                $cat = $catrs->fetch_assoc();
                            ?>
                                <a class="card1" href="product_view.php?id=<?php echo $cat["id"]; ?>">
                                    <?php
                                    $imgrs = Database::search("SELECT * FROM `images` WHERE `category_id`='" . $cat["id"] . "'");
                                    $img = $imgrs->fetch_assoc();
                                   
                                    ?>
                                    <div class="card__background" style="background-image:url(<?php echo $img["code"]; ?>)"></div>
                                    <div class="card__content">
                                        <p class="card__category">cuisine</p>
                                        <h3 class="card__heading"><?php echo $cat["name"]; ?></h3>
                                    </div>
                                </a>
                            <?php

                            }
                            ?>

                            <div>
                    </section>
                    <!-- link:- https://codepen.io/steveeeie/pen/NVWMEM -->
                    <!-- card -->

                </div>
            </div>
        </div>
        <!-- cuisine section -->

        <!-- //////////////////////// -->
         <!-- cuisine section -->
         <div class="mt-5 col-12" >
            <div class="mt-3 row">
                <div class="mt-5 col-12 d-flex justify-content-center">
                    <h1 class="ohead">Order From Refresh galle</h1>
                </div>
                <div class="col-12 mb-3 d-flex justify-content-center">
                <span class="ospan">Enjoy mouth-watering dishes from our handcrafted food delivery menus at Refresh Galle.</span>

                </div>
                <div class="col-12 mt-5" style="background-color: rgba(148, 148, 0, 0.041);">
                    <!-- card -->
                    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->

                    <section class="hero-section">
                        <div class="card-grid" >
                            <?php
                            $catrss = Database::search("SELECT * FROM `category` LIMIT 4 OFFSET 8");
                            $catns = $catrss->num_rows;
                            for ($b = 0; $b < $catns; $b++) {
                                $cats = $catrss->fetch_assoc();
                            ?>
                                <a class="card1" href="product_view.php?id=<?php echo $cats["id"]; ?>">
                                    <?php
                                    $imgrs = Database::search("SELECT * FROM `images` WHERE `category_id`='" . $cats["id"] . "'");
                                    $img = $imgrs->fetch_assoc();
                                   
                                    ?>
                                    <div class="card__background" style="background-image:url(<?php echo $img["code"]; ?>)"></div>
                                    <div class="card__content">
                                        <p class="card__category">cuisine</p>
                                        <h3 class="card__heading"><?php echo $cats["name"]; ?></h3>
                                    </div>
                                </a>
                            <?php

                            }
                            ?>

                            <div>
                    </section>
                    <!-- link:- https://codepen.io/steveeeie/pen/NVWMEM -->
                    <!-- card -->

                </div>
            </div>
        </div>
        <!-- cuisine section -->


        <div class="mt-1 col-12" style="background-color: rgba(148, 148, 0, 0.041);">
            <div class="mt-3 row">
                
                <div class="col-12">
                    <!-- card -->
                    <!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->

                    <section class="hero-section">
                        <div class="card-grid" >
                            <?php
                            $catrss = Database::search("SELECT * FROM `category` LIMIT 4 OFFSET 12");
                            $catns = $catrss->num_rows;
                            for ($b = 0; $b < $catns; $b++) {
                                $cats = $catrss->fetch_assoc();
                            ?>
                                <a class="card1" href="product_view.php?id=<?php echo $cats["id"]; ?>">
                                    <?php
                                    $imgrs = Database::search("SELECT * FROM `images` WHERE `category_id`='" . $cats["id"] . "'");
                                    $img = $imgrs->fetch_assoc();
                                   
                                    ?>
                                    <div class="card__background" style="background-image:url(<?php echo $img["code"]; ?>)"></div>
                                    <div class="card__content">
                                        <p class="card__category">cuisine</p>
                                        <h3 class="card__heading"><?php echo $cats["name"]; ?></h3>
                                    </div>
                                </a>
                            <?php

                            }
                            ?>

                            <div>
                    </section>
                    <!-- link:- https://codepen.io/steveeeie/pen/NVWMEM -->
                    <!-- card -->

                </div>
            </div>
        </div>


        <!-- ///////////////////////////// -->


        <!-- other services section -->

        <div class="mt-4 col-12">
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    <h1>Other Services</h1>

                </div>
                <div class="mt-3 col-12 text-center">
                    <span class="fs-5">
                        If you’re looking to celebrate an occasion or surprise a friend or loved one, our Safe Celebrations packages and range of Gift Vouchers have been designed, keeping you in mind. That’s not all – convenient Laundry Services within 48 hours, are also available for a quick wash, press or dry clean.</span>
                </div>


                <div class="mt-5 col-12 d-flex justify-content-center">
                    <h3>Food orders are delivered daily from</h3>
                </div>

                <div class="col-12 mt-2">
                    <div class="row">
                        <div class="col-12 offset-lg-4 col-lg-4 d-flex justify-content-center">
                            <span class="mt-5 ms-2 fs-2">9.00 A.M.</span>
                            <img src="resources/clock.png" alt="">
                            <span class="mt-5 fs-2">10.30 P.M.</span>
                        </div>
                    </div>
                </div>
                <div class="mt-3 col-12 text-center">
                    <span class=" fs-5">Orders placed after 10.30 p.m. will be delivered the following day.</span>
                </div>
                <div class="col-12 mt-5">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="resources/chef.png" alt=""><br>
                                </div>
                                <div class="col-12 text-center">
                                    <h2>Safety</h2>
                                    <span class="fs-4">Stringent protocols are followed in food preparation and handling</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="resources/car.png" alt=""><br>
                                </div>
                                <div class="col-12 text-center">
                                    <h2>Personalised Delivery</h2>
                                    <span class="fs-4">Deliveries are made solely by Hotel staff members</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4 mb-5 ">
                            <div class="row">
                                <div class="col-12 d-flex justify-content-center">
                                    <img src="resources/quality.png" alt=""><br>
                                </div>
                                <div class="col-12 text-center">
                                    <h2>Quality </h2>
                                    <span class="fs-4">Five-star quality and service</span>
                                </div>
                            </div>
                        </div>




                    </div>
                </div>
            </div>
        </div>

        <!-- other services section -->




    </div>
    </div>
    <!-- footer -->

    <?php
    require "footer.php";
    ?>
    <!-- footer -->


    <script src="bootstrap.bundle.js"></script>
    <!-- <script src="bootstrap.min.js"></script> -->
    <script src="jquery-3.6.0.min.js"></script>
</body>


</html>