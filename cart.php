<?php
require "header.php";
require "connection.php";

if (isset($_SESSION["u"])) {

    $umail = $_SESSION["u"]["email"];
    $total = "0";
    $subtotal = "0";
    $shipping = "0";
?>

    <!-- cart start -->


    <!DOCTYPE html>
    <html>

    <head>
        <title>eShop | cart</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <link rel="icon" href="resources/logo.png" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="index.css">
    </head>

    <body>

        <div class="container-fluid">
            <div class="row">


                <div class="mt-2 col-12" style="background-color: #E3E5E4;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" onclick="history.back(-2)">Back</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Library</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12  border border-1 border-secondary rounded mb-3">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label fs-1 fw-bolder">My Cart <i class="bi bi-cart3"></i></label>
                        </div>
                        <div class="col-12 col-lg-6">
                            <hr class="hrbreak1" />
                        </div>



                        <?php


                        $total = "";




                        $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '" . $umail . "'");
                        $cn = $cartrs->num_rows;
                        if ($cn == 0) {
                        ?>
                            <!-- empty cart -->

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 emptycart"></div>
                                    <div class="col-12 text-center">
                                        <label class="form-label fs-1 fw-bolder">You have no item in your busket</label>
                                    </div>
                                    <div class="offset-0 offset-lg-4 col-12 col-lg-4 d-grid mb-4">
                                        <a href="index.php" class="btn fs-3" style="background-color: 	#FF8C00;">Start Shopping</a>
                                    </div>
                                </div>
                            </div>

                            <!-- empty cart -->

                        <?php


                        } else {

                        ?>
                            <!-- cart product -->

                            <div class="col-12 col-lg-9 ">
                                <div class="row">
                                    <?php
                                    $price = "";

                                    for ($i = 0; $i < $cn; $i++) {
                                        $cr = $cartrs->fetch_assoc();
                                        $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $cr["product_id"] . "'");
                                        $pr = $productrs->fetch_assoc();
                                        if ($cr["size"] == "1") {
                                            $price = $pr["l-price"];
                                        } else if ($cr["size"] == "2") {
                                            $price = $pr["r-price"];
                                        }
                                    ?>
                                        <div class="mb-3 mx-0  col-12">
                                            <div class="row g-0">

                                                <hr>
                                                <div class="col-md-4">
                                                    <?php
                                                    $imagers = Database::search("SELECT * FROM `pro_image` WHERE `product_id` = '" . $pr["id"] . "'");
                                                    $in = $imagers->num_rows;

                                                    $arr;

                                                    for ($x = 0; $x < $in; $x++) {
                                                        $ir = $imagers->fetch_assoc();
                                                        $arr[$x] = $ir["code"];
                                                    }
                                                    ?>

                                                    <img src="<?php echo $arr[0] ?>" class="img-fluid rounded-start d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-content="  <?php echo $pr["description"];  ?>" title="<?php echo $pr["name"];  ?>">

                                                </div>
                                                <div class="col-md-5">
                                                    <div class="card-body">
                                                        <h3 class="card-title"><?php echo $pr["name"]; ?></h3>


                                                        <span class="fw-bold text-black-50 fs-5">Price:</span>&nbsp;
                                                        <span class="fw-bolder text-black fs-5"><?php echo $price ?></span>
                                                        <br />
                                                        <span class="fw-bold text-black-50 fs-5">Quantity:</span>&nbsp;
                                                        <input id="qty<?php echo $cr['id'] ?>" type="text" value="<?php echo $cr["qty"] ?>" class="mt-5 border border-2 border-secondary fs-4 fw-bold px-3 cartqtytext" onkeyup="qtyupdate_in_cart(<?php echo $cr['id'] ?>);" />
                                                        <br>
                                                        <?php
                                                        $cityrs = Database::search("SELECT `city`.`name` FROM `address` INNER JOIN `city` ON `address`.`city_id` = `city`.`id` WHERE `address`.`user_email` = '" . $cr['user_email'] . "'");
                                                        $cityn = $cityrs->num_rows;
                                                        $deleveryFee = "";
                                                        if ($cityn == 1) {
                                                            $city = $cityrs->fetch_assoc();
                                                            // echo $city["name"];
                                                            if ($city["name"] == "galle") {
                                                                $deleveryrs = Database::search("SELECT * FROM `delivery` WHERE `name`='galle'");
                                                                $deleveryn = $deleveryrs->num_rows;
                                                                $delevery = $deleveryrs->fetch_assoc();
                                                                $deleveryFee = "0";
                                                        ?>
                                                                <span class="fw-bold text-black-50 fs-5">Delivery Fee:</span>&nbsp;
                                                                <span class="fw-bolder text-black fs-5">Free Delivery</span>
                                                                <?php

                                                            } else {

                                                                $dr = Database::search("SELECT * FROM `delivery` WHERE `name`='" . $city["name"] . "'");
                                                                $dnnn = $dr->num_rows;
                                                                if ($dnnn == 1) {
                                                                    $d = $dr->fetch_assoc();
                                                                    $deleveryFee = $d["price"];
                                                                ?>
                                                                    <span class="fw-bold text-black-50 fs-5">Delivery Fee:</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $d["price"] ?></span>
                                                                <?php
                                                                } else {
                                                                    $dogrs = Database::search("SELECT * FROM `delivery` WHERE `name`='out_of_galle'");
                                                                    $dog = $dogrs->fetch_assoc();
                                                                    $deleveryFee = $dog["price"];
                                                                ?>
                                                                    <span class="fw-bold text-black-50 fs-5">Delivery Fee:</span>&nbsp;
                                                                    <span class="fw-bolder text-black fs-5"><?php echo $dog["price"] ?></span>
                                                            <?php
                                                                }
                                                            }
                                                        } else {
                                                            // echo "Can't Calculate your Delivery fee Because you have not update your profile";
                                                            ?>
                                                            <span class="text-danger">Can't Calculate your Delivery fee Because you have not update your profile. <a href="user/userAddress.php">Update Address?</a> </span>
                                                        <?php
                                                            // $deleveryFee = "without delevery";
                                                            $deleveryFee = 0;
                                                        }
                                                        ?>

                                                        <br />
                                                    </div>
                                                </div>
                                                <div class="col-md-3 mt-4">
                                                    <div class="card-body d-grid">
                                                        <a class="btn btn-outline-danger mb-2" onclick="deletefromcart(<?php echo $cr['id']; ?>)">Remove</a>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="col-md-12 mt-3 mb-3">
                                                    <div class="row">
                                                        <div class="col-6 col-md-6">
                                                            <span class="fw-bold fs-5 text-black-50">Requested Total <i class="bi bi-info-circle"></i></span>
                                                        </div>
                                                        <?php
                                                        $reqtotal = "";
                                                        $subtotal = $price * $cr["qty"];

                                                        $reqtotal = ($price * $cr["qty"] + $deleveryFee);

                                                        ?>
                                                        <div class="col-6 col-md-6 text-end">
                                                            <span class="fw-bold fs-5 text-black-50">Rs <?php echo $reqtotal ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php
                                        $total = (int)$total + (int)$subtotal;
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-lg-3">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="form-label fs-3 fw-bold">Summary</label>
                                    </div>
                                    <div class="col-12">
                                        <hr>
                                    </div>
                                    <div class="col-6">
                                        <span class="fs-6 fw-bold"> Items (<?php echo $cn; ?>)</span>
                                    </div>
                                    <div class="col-6 text-end">
                                        <span class="fs-6 fw-bold"> Rs.<?php echo $total ?></span>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <span class="fs-6 fw-bold"> Shipping</span>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <span class="fs-6 fw-bold"> Rs.<?php echo $deleveryFee; ?></span>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <hr>
                                    </div>
                                    <div class="col-6 mt-2">
                                        <span class="fs-4 fw-bold"> Total</span>
                                    </div>
                                    <div class="col-6 text-end mt-2">
                                        <?php $checkoutTotal = $total + $deleveryFee ?>
                                        <span class="fs-4 fw-bold"> <?php echo $checkoutTotal ?></span>
                                    </div>
                                    <div class="col-12 mt-3 mb-3 d-grid">

                                        <button style="background-color: #DAA520;" class="btn  fs-5 fw-bold" onclick="address();">CHECKOUT</button>
                                    </div>
                                    <div class="col-12 mt-3 mb-3 d-grid" id="addbutton">

                                    </div>
                                </div>
                            </div>




                    </div>
                </div>


                <!-- cart product-->




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
                                                    <label for="mycity" class="form-label">City</label>
                                                    <!-- <input type="text" class="form-control" id="mycity"> -->
                                                    <select class="form-select" id="mycity">
                                                        <option value="0">Select Your city</option>
                                                        <?php
                                                        $cityrs =  Database::search("SELECT * FROM `city`;");
                                                        $cityn = $cityrs->num_rows;
                                                        for ($k = 0; $k < $cityn; $k++) {
                                                            $city = $cityrs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $city["id"] ?>"><?php echo $city["name"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="mydistrict" class="form-label">District</label>
                                                    <!-- <input type="text" class="form-control" id="mydistrict"> -->
                                                    <select class="form-select" id="mydistrict">
                                                        <!-- <option value="0">Select Your District</option> -->
                                                        <?php
                                                        $disrtictrs =  Database::search("SELECT * FROM `district`;");
                                                        $districtn = $disrtictrs->num_rows;
                                                        for ($k = 0; $k < $districtn; $k++) {
                                                            $d = $disrtictrs->fetch_assoc();
                                                        ?>
                                                            <option value="<?php echo $d["id"] ?>"><?php echo $d["name"] ?></option>
                                                        <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                            </form>

                                            <!-- /////////////////////// -->
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" id="payhere-payment" class="btn btn-primary" onclick="checkout();">CHECK OUT</button>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- /////////////////////////////////////////////// -->

                        </div>
                    </div>
                </div>










            <?php
                        }

            ?>







            </div>
        </div>
        <script src="script.js"></script>
        <!-- <script src="https://unpkg.com/@popperjs/core@2"></script> -->

        <script src="bootstrap.bundle.js"></script>
        <!-- <script src="jquery-3.5.1.min.js"></script> -->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->



        <!-- <script type="text/javascript">
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
        </script> -->


        <?php
        require "footer.php";
        ?>
        <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>

    </body>

    </html>


    <!-- cart end    -->


<?php

} else {
    echo "please log in first";
}
