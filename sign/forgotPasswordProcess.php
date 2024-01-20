<?php

require "../connection.php";

use PHPMailer\PHPMailer\PHPMailer;

require '../admin/Exception.php';
require '../admin/PHPMailer.php';
require '../admin/SMTP.php';

if (isset($_GET["e"])) {

    $e = $_GET["e"];

    if (empty($e)) {
        echo "Please enter your email address";
    } else {
        $rs = Database::search("SELECT * FROM `user` WHERE `email` = '" . $e . "'");

        if ($rs->num_rows == 1) {

            $code = uniqid();
            Database::iud("UPDATE `user` SET `verification_code`='" . $code . "' WHERE `email` = '" . $e . "'");

            //email code;



            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = '##########';
            $mail->Password = '##########';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sesmith.tharuka@gmail.com', 'eShop');
            $mail->addReplyTo('sesmith.tharuka@gmail.com', 'eShop');
            $mail->addAddress($e);
            $mail->isHTML(true);
            $mail->Subject = 'Refresh Forgot Password Verification Code';
            $bodyContent = '<h1>Hello</h1>';
            $bodyContent .= '<h1 style="color:red;">Your Verification Code: ' . $code . '</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
            } else {
                echo 'success';
            }
            //email code

        } else {

            echo "Email address not found";
        }
    }
} else {
    echo "Please enter your email address";
}
