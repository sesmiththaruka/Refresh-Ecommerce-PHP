<?php 

session_start();
require "connection.php";

if(isset($_SESSION["u"])){

    $oid = $_POST["oid"];
    $demail = $_POST["de"];
    $dmobile = $_POST["dm"];
    $dfname = $_POST["dfn"];
    $dlname = $_POST["dln"];
    $dal1 = $_POST["dal1"];
    $dal2 = $_POST["dal2"];
    $ddistrict = $_POST["dd"];
   
    $dcity = $_POST["dc"];
    $price="";
   
    
    // $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
    // $pn = $productrs->fetch_assoc();
    // $qty = $pn["qty"];
    // $newqty = $qty - $pqty;
    // Database::iud("UPDATE `product` SET `qty`='".$newqty."' WHERE `id` = '".$pid."'");

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date=$d->format("Y-m-d H:i:s");

    $cartrs = Database::search("SELECT * FROM `cart` WHERE `user_email` = '".$_SESSION["u"]["email"]."'");
    $cartn = $cartrs->num_rows;
    if($cartn>0){

        for($x=0;$x<$cartn;$x++){
            $cart = $cartrs->fetch_assoc();
            $pid = $cart["product_id"];
            $proqty = $cart["qty"];
            //
            $productrs = Database::search("SELECT * FROM `product` WHERE `id` = '".$pid."'");
            $pn = $productrs->fetch_assoc();

            if($cart["size"]=="1"){
                $price = $pn["l-price"];
            }else if($cart["size"]=="2"){
                $price = $pn["r-price"];
            }
      
            // echo $oid;
            // echo $date;
            // echo $demail;
            // echo $dmobile;
            // echo $dal1;
            // echo $dal2;
            // echo $dcity;
            // echo $ddistrict;
            // echo $dname;
            // echo $dzip;
            // echo $price;
            // echo $proqty;
            // echo $pid;

            $dzip = "2397";

            Database::iud("INSERT INTO `invoice`(`order_id`,`date`,`d_email`,`d_mobile`,`d_address_line1`,`d_address_line2`,`d_city`,`d_district`,`d_fname`,`d_lname`,`d_zip`,`total`,`qty`,`product_id`) VALUES ('".$oid."','".$date."','".$demail."','".$dmobile."','".$dal1."','".$dal2."','".$dcity."','".$ddistrict."','".$dfname."','".$dlname."','".$dzip."','".$price."','".$proqty."','".$pid."')");

            Database::iud("DELETE FROM `cart`");
            
        }



  
}else{

    }
    echo "1";
}





?>