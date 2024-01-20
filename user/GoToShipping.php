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
            require "../connection.php";

            ?>
        </div>
    </div>

    <div class="container" style="background-color: rgba(148, 148, 0, 0.041);">
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
       
                            <div class="text-white mt-2 col-12" style="height:55px; background-color:#DAA520; cursor: pointer;" onclick="goTOaddress();">
                                <h5 class="mt-3 ms-3">Address</h5>
                            </div>
                            <div class=" mt-2 col-12" style="height:55px; background-color:#F0E68C; cursor: pointer;" onclick="GoToBilling();">
                                <h5 class="mt-3 ms-3">Account Details</h5>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-lg-9">
                        <div class="row">
                            <div id="adddiv" class="mt-3 col-12 offset-lg-2 col-lg-10">
                                <div class="row">
                                    <?php
                                    $al1 = "";
                                    $al2 = "";
                                    $city = "";
                                    $district = "";
                                    $province = "";
                                    $addressrs = Database::search("SELECT * FROM `address` WHERE `user_email` = '" . $_SESSION["u"]["email"] . "'");
                                    $addressn = $addressrs->num_rows;
                                    if ($addressn == 1) {
                                        $address = $addressrs->fetch_assoc();
                                        $al1 = $address["line1"];
                                        $al2 = $address["line2"];

                                        $cityrs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address["city_id"] . "'");
                                        $cityname = $cityrs->fetch_assoc();
                                        $city = $cityname["name"];

                                        $districtrs = Database::search("SELECT * FROM `district` WHERE `id`='" . $cityname["district_id"] . "'");
                                        $districtname = $districtrs->fetch_assoc();
                                        $district = $districtname["name"];


                                        $provincers = Database::search("SELECT * FROM `province` WHERE `id`='" . $districtname["province_id"] . "'");
                                        $provincename = $provincers->fetch_assoc();
                                        $province = $provincename["name"];

                                    ?>

                                        <?php
                                        $cityid = $address["city_id"];

                                        $ucity = Database::search("SELECT * FROM `city` WHERE `id` = '" . $cityid . "'");
                                        $c = $ucity->fetch_assoc();

                                        $districtid = $c["district_id"];
                                        $udist = Database::search("SELECT * FROM `district` WHERE `id` = '" . $districtid . "'");
                                        $k = $udist->fetch_assoc();

                                        $provinceid = $k["province_id"];
                                        $uprovince = Database::search("SELECT * FROM `province` WHERE `id` = '" . $provinceid . "'");
                                        $l = $uprovince->fetch_assoc();

                                        ?>


                                        <div class="col-12 col-lg-6">
                                            <span class="fs-6">Address Line 1</span><br>
                                            <input class="form-control" type="text" value="<?php echo $al1 ?>" id="al1">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <span class="fs-6">Address Line 2</span><br>
                                            <input class="form-control" type="text" value="<?php echo $al2 ?>" id="al2">
                                        </div>
                                        


                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Province</label>
                                            <select class="form-select" id="province">
                                                <option value="<?php echo $l["id"]; ?>"><?php echo $l["name"]; ?></option>
                                                <?php
                                                $provincers = Database::search("SELECT * FROM `province` WHERE `id` != '" . $l["id"] . "'");
                                                $pn = $provincers->num_rows;
                                                for ($i = 0; $i < $pn; $i++) {
                                                    $pr = $provincers->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $pr["id"] ?>"><?php echo $pr["name"]; ?></option>
                                                <?php


                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">District</label>
                                            <select class="form-select" id="District">
                                                <option value="<?php echo $k["id"]; ?>"><?php echo $k["name"]; ?></option>
                                                <?php
                                                $districtrs = Database::search("SELECT * FROM `district` WHERE `id` != '" . $k["id"] . "'");
                                                $dn = $districtrs->num_rows;
                                                for ($i = 0; $i < $dn; $i++) {
                                                    $dr = $districtrs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"]; ?></option>
                                                <?php


                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">City</label>



                                            <!-- <input id="city" type="text" class="form-control" placeholder="City" value="" /> -->

                                            <select class="form-select" id="city">
                                                <option value="<?php echo $c["id"] ?>"><?php echo $c["name"] ?></option>
                                                <?php
                                                $citynames = Database::search("SELECT * FROM `city` WHERE `id` != '" . $c["id"] . "'");
                                                $citynums = $citynames->num_rows;
                                                for ($i = 0; $i < $citynums; $i++) {
                                                    $cityname = $citynames->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $cityname["id"]; ?>"><?php echo $cityname["name"]; ?></option>
                                                <?php

                                                }
                                                ?>
                                            </select>

                                        </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <div class="row">
                                            <div class="d-grid col-4">
                                                <button class="btn text-white" style="background-color:#DAA520 ;" onclick="saveShipping();">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php
                         } else{
                             ?>
                             <!-- /////////////////////////////////// -->
                             

                                      


                                        <div class="col-12 col-lg-6">
                                            <span class="fs-6">Address Line 1</span><br>
                                            <input class="form-control" type="text"  id="al1">
                                        </div>
                                        <div class="col-12 col-lg-6">
                                            <span class="fs-6">Address Line 2</span><br>
                                            <input class="form-control" type="text"  id="al2">
                                        </div>
                                        


                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Province</label>
                                            <select class="form-select" id="province">
                                                <option value="0">Select Province</option>
                                                <?php
                                                $provincers = Database::search("SELECT * FROM `province` WHERE `id` != '" . $l["id"] . "'");
                                                $pn = $provincers->num_rows;
                                                for ($i = 0; $i < $pn; $i++) {
                                                    $pr = $provincers->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $pr["id"] ?>"><?php echo $pr["name"]; ?></option>
                                                <?php


                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">District</label>
                                            <select class="form-select" id="District">
                                                <option value="0">Select District</option>
                                                <?php
                                                $districtrs = Database::search("SELECT * FROM `district` WHERE `id` != '" . $k["id"] . "'");
                                                $dn = $districtrs->num_rows;
                                                for ($i = 0; $i < $dn; $i++) {
                                                    $dr = $districtrs->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $dr["id"] ?>"><?php echo $dr["name"]; ?></option>
                                                <?php


                                                }
                                                ?>
                                            </select>

                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">City</label>



                                            <!-- <input id="city" type="text" class="form-control" placeholder="City" value="" /> -->

                                            <select class="form-select" id="city">
                                                <option value="0">Select City</option>
                                                <?php
                                                $citynames = Database::search("SELECT * FROM `city` WHERE `id` != '" . $c["id"] . "'");
                                                $citynums = $citynames->num_rows;
                                                for ($i = 0; $i < $citynums; $i++) {
                                                    $cityname = $citynames->fetch_assoc();
                                                ?>
                                                    <option value="<?php echo $cityname["id"]; ?>"><?php echo $cityname["name"]; ?></option>
                                                <?php

                                                }
                                                ?>
                                            </select>

                                        </div>

                                </div>
                                <div class="row">
                                    <div class="col-12 mt-5">
                                        <div class="row">
                                            <div class="d-grid col-4">
                                                <button class="btn text-white" style="background-color:#DAA520 ;" onclick="saveShipping();">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                             <!-- ///////////////////////////////////// -->
                             <?php
                         }
                         ?>
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