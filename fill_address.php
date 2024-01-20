<?php
session_start();
require "connection.php";

$useremail = $_SESSION["u"]["email"];

$addressrs = Database::search("SELECT * FROM `address` WHERE `user_email`='" . $useremail . "'");
if ($addressrs->num_rows == 1) {
    $address = $addressrs->fetch_assoc();

    // search city

    $cityrs = Database::search("SELECT * FROM `city` WHERE `id` = '" . $address['city_id'] . "'");
    $city = $cityrs->fetch_assoc();

    //search district

    $districtrs = Database::search("SELECT * FROM `district` WHERE `id` = '" . $city['district_id'] . "'");
    $district = $districtrs->fetch_assoc();

    // search province

    $provincers = Database::search("SELECT * FROM `province` WHERE `id` = '" . $district['province_id'] . "'");
    $province = $provincers->fetch_assoc();

    $email = $useremail;
    $mobile = $_SESSION["u"]["mobile"];
    $address1 = $address["line1"];
    $address2 = $address["line2"];
    $cityname = $city["name"];
    $fname = $_SESSION["u"]["fname"];
    $lname = $_SESSION["u"]["lname"];
    $districtname = $district["name"];
    $provincename = $province["name"];
    $zip = $city["postal_code"];



?>


    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="myemail" value="<?php echo $email ?>" >
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mymobile" value="<?php echo $mobile ?>">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">First Name</label>
            <input type="text" class="form-control" id="myfname" value="<?php echo $fname ?>" >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="mylname" value="<?php echo $lname ?>" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address line1</label>
            <input type="text" class="form-control" id="myaddress1" value="<?php echo $address1 ?>" >
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address line2</label>
            <input type="text" class="form-control" id="myaddress2" value="<?php echo $address2 ?>">
        </div>
     

        <div class="col-md-6">
            <label for="mycity" class="form-label">City</label>
            <!-- <input type="text" class="form-control" id="mycity"> -->
            <select class="form-select" id="mycity">
            <option value="<?php echo $city["id"] ?>"><?php echo $city["name"] ?></option>
                <?php
                $cityrs =  Database::search("SELECT * FROM `city` WHERE `id` != '" . $city["id"] . "';");
                $cityn = $cityrs->num_rows;
                for ($k = 0; $k < $cityn; $k++) {
                    $city = $cityrs->fetch_assoc();
                ?>
                    <option value="<?php echo $city["id"] ?>"><?php echo $city["name"]?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="mydistrict" class="form-label">District</label>
            <!-- <input type="text" class="form-control" id="mydistrict"> -->
            <select class="form-select"  id="mydistrict">
            <option value="<?php echo $district["id"]; ?>"><?php echo $district ["name"]; ?></option>
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
<!-- //////////////////////// -->

<!-- //////////////////////// -->


<?php

} else {
?>
    <!-- //////////////////////////// -->

    <form class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="myemail" value="<?php echo $_SESSION["u"]["email"] ?>">
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Mobile</label>
            <input type="text" class="form-control" id="mymobile" value="<?php echo $_SESSION["u"]["mobile"] ?>" >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">First Name</label>
            <input type="text" class="form-control" id="myfname" value="<?php echo $_SESSION["u"]["fname"] ?>" >
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="mylname" value="<?php echo $_SESSION["u"]["lname"] ?>" >
        </div>
        <div class="col-12">
            <label for="inputAddress" class="form-label">Address line1</label>
            <input type="text" class="form-control" id="myaddress1" placeholder="You have not update your address">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address line2</label>
            <input type="text" class="form-control" id="myaddress2" placeholder="You have not update your address">
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
                    <option value="<?php echo $city["id"] ?>"><?php echo $city["name"]?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="mydistrict" class="form-label">District</label>
            <!-- <input type="text" class="form-control" id="mydistrict"> -->
            <select class="form-select"  id="mydistrict">
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

    <!-- /////////////////////////////// -->
<?php
}

?>