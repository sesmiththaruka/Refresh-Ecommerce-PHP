<?php


require "header.php";

// session_start();
require "connection.php";
if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
    $oid = $_GET["id"];
?>

    <!DOCTYPE html>
    <html>

    <head>
        <title>Refresh | invoice</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="resources/logo.jpeg" />
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="style.css">
    </head>

    <body class="mt-2">

        <div class="container-fluid">
            <div class="row">





                <div class="col-12">
                    <hr />
                </div>


                <div class="col-12 btn-toolbar justify-content-end">
                    <button class="btn btn-dark me-2" onclick="printDiv();"><i class="bi bi-printer-fill"></i> Print</button>
                    <button class="btn btn-danger me-2"><i class="bi bi-file-earmark-pdf-fill"></i> Save as PDF</button>
                </div>

                <div id="GFG">
                    <div class="col-12">
                        <hr />
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <div class="col-6">
                                <div class="invoiceheaderimg"></div>
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-12 text-end text-decoration-underline text-primary ">
                                        <h2>eShop</h2>
                                    </div>
                                    <div class="col-12 text-end fw-bold">
                                        <span>Maradana,Colombo 10,Sri Lanka</span><br>
                                        <span>+94776348896</span><br>
                                        <span>esop@gmail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 mb-4">
                        <div class="row">
                            <div class="col-6">
                                <h5>INVOICE TO : </h5>
                                <?php
                                $invoicers = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");
                                $in = $invoicers->num_rows;

                                $ir = $invoicers->fetch_assoc();

                                // $addressrs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`= '" . $umail . "'");
                                // $ar = $addressrs->fetch_assoc();

                                $invoicers

                                ?>
                                <h2><?php echo $ir["d_fname"] . " " . $ir["d_lname"]; ?></h2>
                                <span class="fw-bold"><?php echo $ir["d_address_line1"] . "," . $ir["d_address_line2"] . "," . $ir["d_city"] . ","; ?></span><br>
                                <span class="fw-bold"><?php echo $ir["d_district"]; ?></span><br>
                                <span class="fw-bold text-primary text-decoration-underline"><?php echo $ir["d_email"]; ?></span>
                            </div>

                            <?php

                            ?>
                            <div class="col-6 text-end mt-4">
                                <h1 class="text-primary">INVOICE 0<?php echo $ir["id"] ?></h1>
                                <span class="fw-bold">Date and time of Invoice :</span> &nbsp;
                                <span class="fw-bold"><?php echo $ir["date"] ?></span>
                            </div>
                            <?php

                            ?>


                        </div>
                    </div>

                    <div class="col-12">
                        <table class="table">
                            <thead>
                                <tr class="border border-1 border-white">
                                    <th>#</th>
                                    <th>Order Id & Product</th>
                                    <th class="text-end">Unit Price</th>
                                    <th class="text-end">Quantity</th>
                                    <th class="text-end">Total</th>
                                </tr>

                            </thead>
                            <tbody>

                                <?php
                                $subtotal = "";
                                $invoicers2 = Database::search("SELECT * FROM `invoice` WHERE `order_id` = '" . $oid . "'");

                                for ($x = 0; $x < $in; $x++) {
                                    $ir2 = $invoicers2->fetch_assoc();

                                    $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '" . $ir2["product_id"] . "'");
                                    $pr = $productrs->fetch_assoc();
                                ?>
                                    <tr style="height: 70px;">
                                        <td class="bg-primary text-white fs-3"><?php echo $ir2["id"]; ?></td>
                                        <td>
                                            <a href="#" class="fs-6 fw-bold p-2"><?php echo $ir2["order_id"]; ?></a>
                                            <br>
                                            <a href="#" class="fs-6 fw-bold p-2"><?php echo $pr["name"]; ?></a>

                                        </td>
                                        <td class="fs-6 text-end pt-3" style="background-color: rgb(199,199,199);">Rs. <?php echo $ir2["total"] ?></td>
                                        <td class="fs-6 text-end pt-3"><?php echo $ir2["qty"]; ?></td>
                                        <?php
                                        $tot = $ir2["total"] * $ir2["qty"];
                                        ?>
                                        <td class="fs-6 text-end pt-3 bg-primary text-white"><?php echo $tot; ?></td>
                                    </tr>
                                <?php
                                    $subtotal =  (int)$subtotal + (int)$tot;
                                }
                                ?>


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-5 text-end">SUBTOTAL</td>
                                    <td class="fs-5 text-end"><?php echo $subtotal; ?></td>
                                </tr>
                                <?php
                                $city = $ir2["d_city"];

                            // delevery

            $citynamers = Database::search("SELECT * FROM `city` WHERE `id` = '".$city."'");
            $citynamef = $citynamers->fetch_assoc();
            $cityname = $citynamef["name"];


            $deleveryFee = "";

                $dr = Database::search("SELECT * FROM `delivery` WHERE `name`='" . $cityname . "'");
                $dnnn = $dr->num_rows;
                if ($dnnn == 1) {
                    $d = $dr->fetch_assoc();
                    $deleveryFee = $d["price"];
                } else {
                    $dogrs = Database::search("SELECT * FROM `delivery` WHERE `name`='out_of_galle'");
                    $dog = $dogrs->fetch_assoc();
                    $deleveryFee = $dog["price"];
                }
            

            // delevery
                                
                                ?>
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-5 text-end">Delevery fee</td>
                                    <td class="fs-5 text-end"><?php echo $deleveryFee ?></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-5 text-end border-primary">Discount</td>
                                    <td class="fs-5 text-end border-primary">Rs.00.00</td>
                                </tr>
                                <?php
                                $myorderrs = Database::search("SELECT * FROM `order` WHERE `order_id`='" . $oid . "'");
                                $myorder = $myorderrs->fetch_assoc();
                                ?>
                                <tr>
                                    <td colspan="2" class="border-0"></td>
                                    <td colspan="2" class="fs-4 text-end border-0 text-primary">GRAND TOTAL</td>
                                    <td class="fs-5 text-end border-0 text-primary"><?php echo $myorder["total_price"]; ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="col-4 text-center" style="margin-top: -100px; margin-bottom: 50px;">
                        <span class="fs-1 fw-bold">Thank You!</span>
                    </div>

                    <!-- <div class="col-12 mt-3 mb-3 border border-start border-end-0 border-top-0 border-bottom-0 border-5 border-primary rounded" style="background-color: #e7f2ff;">
                        <div class="row">
                            <div class="col-12 mt-3 mb-3">
                                <label class="form-label fs-5 fw-bold">NOTICE :</label>
                                <label class="form-label fs-5 ">Purchased items can return before 7 days of delivery</label>
                            </div>
                        </div>
                    </div> -->

                    <div class="col-12">
                        <hr class="border border-1 border-primary" />
                    </div>

                    <div class="col-12 mb-3 text-center">
                        <label class="form-label fs-6 text-black-50">
                            Invoice was created on a computer and is valid without signature and seal
                        </label>
                    </div>


                    <?php
                    
                    require "footer.php";
                    ?>
                </div>
            </div>
        </div>

        <script src="script.js"></script>
    </body>

    </html>

<?php


}
?>