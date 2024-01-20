<?php 
session_start();
require "connection.php";

$useremail = $_SESSION["u"]["email"];
?>
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