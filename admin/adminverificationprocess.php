<?php 

require "../connection.php";

use PHPMailer\PHPMailer\PHPMailer;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';


if(isset($_POST["e"])){
    $email  = $_POST["e"];

    if(empty($email)){
        echo "Please Enter your Email address";
    }else{
        $adminrs = Database::search("SELECT * FROM `admin` WHERE `email` = '".$email."'");
        $an = $adminrs->num_rows;
        if($an == 1){
            $code = uniqid();
            Database::iud("UPDATE `admin` SET `verification` = '".$code."' WHERE `email` = '".$email."' ");
            
//email code;



$mail = new PHPMailer;
$mail->IsSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = '#####################';
$mail->Password = '#############';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;
$mail->setFrom('sesmith.tharuka@gmail.com', 'eShop');
$mail->addReplyTo('sesmith.tharuka@gmail.com', 'eShop');
$mail->addAddress($email);
$mail->isHTML(true);
$mail->Subject = 'Refresh admin Verification Code';
$bodyContent = '<h1>Hello</h1>';
$bodyContent .= '<h1 style="color:red;">Your Verification Code: ' . $code . '</h1>';
$mail->Body    = $bodyContent;

if (!$mail->send()) {
    echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'success';
}
//email code

        
        }else{
            echo "You are not a valid user";
        }
    }
    
}else{
    echo "please enter your email";
}
