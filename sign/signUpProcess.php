<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$password = $_POST["password"];
$mobile = $_POST["mobile"];


require "../connection.php";


if (empty($fname)) {
    echo "Please Enter Your First Name";
} else if (strlen($fname) >= 50) {
    echo "First Name Must Be Less Than 50 Characters";
} else if (empty($lname)) {
    echo "Please enter your Last Name";
} else if (strlen($lname) >= 50) {
    echo "Last Name Must Be Less Than 50 Characters";
} else if (empty($email)) {
    echo "Please enter your Email";
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid Email Address";
}else if (strlen($email)>100) {
    echo "Email Must Be Less Than 100 Characters";
}else if (empty($password)) {
    echo "Please enter your Password";
}else if (strlen($password)<5 || strlen($password)>20) {
    echo "Password length must between 5 to 20";
}else if(empty($mobile)){
    echo "Please enter your Mobile";
}else if(strlen($mobile)!=10){
    echo "Please Enter 10 digit mobile number";
}else if(preg_match("/07[0,1,2,4,5,6,7,8][0-9]+/",$mobile)==0){
echo "Invalid Mobile Number";
}else{

    $r = Database::search("SELECT * FROM `user` where `email`='".$email."' OR `mobile` = '".$mobile."'");
    if($r->num_rows>0){
        echo "User With The Same Eamil Address Already Exsist";
    }else{

    

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $register_date = $d->format("Y-m-d H:i:s");
   

 Database::iud("INSERT INTO `user`(`email`,`fname`,`lname`,`password`,`mobile`,`register_date`,`status_id`) VALUES ('".$email."','".$fname."','".$lname."','".$password."','".$mobile."','".$register_date."','1')");
echo "success";
}
}