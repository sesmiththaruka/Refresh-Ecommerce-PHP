<?php
$id = $_GET["id"];
require "connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="icon" href="resources/logo.jpeg">
    <link rel="stylesheet" href="bootstrap.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" />
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="singleproductview.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- header1 -->
            <?php
            require "header.php";
            require "header1.php"
            ?>
            <!-- header1 -->

            <!-- hr -->
            <hr class="hrbreak1">
            <!-- hr -->

            <!-- product view -->



            <?php
            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $id . "'");
            $product = $productrs->fetch_assoc();
            ?>
            <div class="col-12 mt-5">
                <div class="row">
                    <?php
                    $imgrs = Database::search("SELECT * FROM `pro_image` WHERE `product_id`='" . $product["id"] . "'");
                    $imgn = $imgrs->num_rows;
                    $img = $imgrs->fetch_assoc();

                    // echo $cat["id"];
                    ?>
                    <!-- <div class="col-12 col-lg-6" style="background-image: url('resources/carousal1.jpg'); background-size:contain; background-repeat:no-repeat;height:500px;"> -->
                    <div class="col-12 col-lg-6" id="mainimg" style="background-image: url('<?php echo $img["code"]; ?>'); background-size:contain; background-repeat:no-repeat;height:500px;"></div>




                    <div class="col-12 col-lg-6">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1 style="color: #FF8C00;"><?php echo $product["name"] ?></h1>
                            </div>
                            <div class="col-12 mt-5">
                                <span class="ms-5 fs-3">Rs.<?php echo $product["r-price"] ?></span> - <span class="ms-2 fs-3">Rs.<?php echo $product["l-price"] ?>
                            </div>
                            <div class="col-12">
                                <div class="ms-5 col-3">
                                    <!-- hr -->
                                    <hr class="hrbreak1">
                                    <!-- hr -->
                                </div>
                            </div>
                            <div class="mt-3 col-12">
                                <div class="ms-5 col-4">
                                    <span class="fs-4">Product Option</span>
                                    <select class="mt-2 form-select" aria-label="Default select example" id="sizeSelect" onclick="changeprice(<?php echo $id ?>,0);">
                                        <option value="0" selected>choose an option</option>
                                        <option value="1">Large (4-Persons)</option>
                                        <option value="2">Regular (2-Persons)</option>

                                    </select>
                                </div>
                            </div>
                            <!-- price area -->
                            <div class="mt-4 col-12">
                                <div id="pricecal" class="row">

                                </div>
                            </div>
                            <!-- price area -->

                            <!-- qty area -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="ms-5 col-6 col-lg-4 col-md-6" style="margin-top: 15px;">
                                        <div class="row">
                                            <div class="ms-2 border border-1 border-secondary rounded overflow-hidden   product_qty mt-1 position-relative">
                                                <div class="col-12">
                                                    <span class="">QTY :</span>
                                                    <input id="qtyinput" class="border-0 fs-6 fw-bold text-start" type="text" pattern="[0-9]*" value="1" />
                                                    <div class="position-absolute qty-buttons">
                                                        <div class="d-flex flex-column align-items-center  qty-inc">
                                                            <i class="mb-2 fas fa-chevron-up" onclick="max_qty(<?php echo $id ?>);"></i>
                                                            <i class="mb-1 fas fa-chevron-down" onclick="qty_dec(<?php echo $id ?>)"></i>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- qty area -->

                            <!-- button area -->

                            <div class="col-12 mt-5">
                                <div class="row">
                                    <div class="ms-5 col-6 d-grid">
                                        <button onclick="addToCart(<?php echo $id ?>);" type="button" class="btn btn-outline-warning">Add to cart</button>
                                    </div>
                                    <?php $pid = $_GET["id"]; ?>
                                    <!-- <div class="col-3 d-grid">
                                        <button type="submit" onclick="paynow(<?php echo $pid; ?>);" id="payhere-payment" type="button" class="btn btn-outline-danger">Buy Now</button>
                                        <button type="submit" onclick="address(<?php echo $pid; ?>);" id="payhere-payment" type="button" class="btn btn-outline-danger">Buy Now</button>
                                    </div> -->
                                </div>
                            </div>
                            <!-- button area -->


                        </div>
                    </div>
                    <div class="col-12 mt-2 col-lg-6 ">
                        <div class="row">
                            <?php
                            $imgrss = Database::search("SELECT * FROM `pro_image` WHERE `product_id`='" . $product["id"] . "'");
                            $in = $imgrss->num_rows;
                            //  echo $imgns;
                            if ($in > 0) {

                                for ($x = 0; $x < $in; $x++) {
                                    $d = $imgrss->fetch_assoc();
                                    $img1 = $d["code"];
                            ?>
                                    <div style="background-image: url('<?php echo $d["code"]; ?>'); background-size:cover; background-repeat:no-repeat;height:200px;" class="col-4" id="pimg<?php echo $x; ?>" onclick="loadmainimg(<?php echo $x; ?>);">

                                    </div>

                            <?php
                                }
                            }
                            ?>




                        </div>
                    </div>
                </div>
            </div>
            <!-- product view -->

            <!-- hr -->
            <hr class="hrbreak1">
            <!-- hr -->
            <!-- Modal -->
            <div class="modal fade" id="addressModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- //////////////////// -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch" id="AddMyDetails" onclick="addmydetails();">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Add My details</label>
                                        </div>
                                    </div>
                                    <?php

                                    ?>
                                    <div class="col-12" id="add_details">
                                        <form class="row g-3">
                                            <div class="col-md-6">
                                                <label for="inputEmail4" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="myemail">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputPassword4" class="form-label">Mobile</label>
                                                <input type="text" class="form-control" id="mymobile">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">First Name</label>
                                                <input type="text" class="form-control" id="myfname">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">Last Name</label>
                                                <input type="text" class="form-control" id="mylname">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress" class="form-label">Address line1</label>
                                                <input type="text" class="form-control" id="myaddress1">
                                            </div>
                                            <div class="col-12">
                                                <label for="inputAddress2" class="form-label">Address line2</label>
                                                <input type="text" class="form-control" id="myaddress2">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">City</label>
                                                <input type="text" class="form-control" id="mycity">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">district</label>
                                                <input type="text" class="form-control" id="mydistrict">
                                            </div>
                                            <div class="col-md-6">
                                                <label for="inputCity" class="form-label">province</label>
                                                <input type="text" class="form-control" id="myprovince">
                                            </div>

                                            <div class="col-md-2">
                                                <label for="inputZip" class="form-label">Zip</label>
                                                <input type="text" class="form-control" id="myzip">
                                            </div>

                                        </form>

                                        <!-- /////////////////////// -->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" id="payhere-payment" class="btn btn-primary" onclick="paynow(<?php $id ?>);">CHECK OUT</button>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- /////////////////////////////////////////////// -->

                    </div>
                </div>
            </div>

            <!-- hr -->
            <hr class="hrbreak1">
            <!-- hr -->


            <!-- description -->
            <div class="mt-4 mb-4 col-12">
                <div class="row">
                    <div class="col-12">
                        <h3>Description</h3>
                    </div>
                    <div class="col-12 col-lg-6">
                        <span class="fs-5 text-black-50"><?php echo $product["description"] ?></span>
                    </div>
                </div>
            </div>
            <!-- description -->

            <!-- hr -->
            <hr class="hrbreak1">
            <!-- hr -->

            <div class="col-12">
                <div class="row">
                    <?php
                    $feedbackrs =  Database::search("SELECT * FROM `feedback` WHERE `product_id`='" . $product["id"] . "'");
                    $feedbackn = $feedbackrs->num_rows;
                    if($feedbackn>0){
                    for ($a = 0; $a < $feedbackn; $a++) {
                        $feedback = $feedbackrs->fetch_assoc();

                    ?>
                        <div class="col-5">

                            <span><?php echo $feedback["user_email"] ?></span><br>
                            <span><?php echo $feedback["feed"] ?></span>


                        </div>
                    <?php
                    }
                }
                    ?>


                </div>
            </div>

            <!-- related product -->

           
            <!-- related product -->

        </div>
    </div>

    <!-- navbar -->

    <?php
    require "footer.php";
    ?>
    <script src="script.js"></script>
    <script src="singleproductview.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>
    <script src="bootstrap.bundle.js"></script>


</body>

</html>