<?php
$email = $_GET["e"];
require "../connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>Refresh | Admin | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="../bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <?php
    $userrs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $email . "'");
    $user =  $userrs->fetch_assoc();
    ?>
    <div class="container-fluid">
        <div class="row">

            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <span>First Name</span>
                    </div>
                    <div class="col-8">
                        <?php echo $user["fname"] ?>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <span>last Name</span>
                    </div>
                    <div class="col-8">
                        <?php echo $user["lname"] ?>
                    </div>
                </div>

            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <span>Mobile</span>
                    </div>
                    <div class="col-8">
                        <?php echo $user["mobile"] ?>
                    </div>
                </div>

            </div>
<?php 
$addresrs = Database::search("SELECT * FROM `address` WHERE `user_email` = '".$email."'");
$address_num = $addresrs->num_rows;

if($address_num=="1"){
    $address = $addresrs->fetch_assoc();

    $cityrs = Database::search("SELECT * FROM `city` WHERE `id` = '".$address["city_id"]."'");
    $city = $cityrs->fetch_assoc();
    ?>
     <div class="col-12">
                <div class="row">
                    <div class="col-2">
                        <span>address</span>
                    </div>
                    <div class="col-8">
                        <?php echo $address["line1"]." ".$address["line2"]." ".$city["name"] ?>
                    </div>
                </div>

            </div>
    
    <?php
}
?>
           
        </div>
    </div>
</body>

</html>