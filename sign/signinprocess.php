<?php 
require "../connection.php";
session_start();
 $email = $_POST["e"];
 $password = $_POST["p"];
 $r = $_POST["remember"];


//  echo $email;
//  echo $password;
if(empty($email)){
    echo "Please Enter Your Email";

}else if(empty($password)){
    echo "Please Enter Your Password";
}else{

$userrs = Database::search("SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."'");
$usern = $userrs->num_rows;

if($usern==1){
    $user = $userrs->fetch_assoc();
    $_SESSION["u"]=$user;
    echo "success";
    if($r=="true"){
        
        setcookie("e",$email,time()+(60*60*24*365));
        setcookie("p",$password,time()+(60*60*24*365));
    }else{

        setcookie("e","",-1);
        setcookie("p","",-1);
    }

}else{
    echo "Invalid Details";
}
}
?>