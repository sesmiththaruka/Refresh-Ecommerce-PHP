<?php

session_start();
require "../connection.php";



// if(isset($_SESSION["a"])){

// }

$name = $_POST["n"];
$desc = $_POST["d"];

if(empty($name)){
    echo "You must enter a category.";
} else if(empty($desc)){
    echo "You must enter a category description";
}else if(isset($_FILES["img"])){
    $categoryrs = Database::search("SELECT * FROM `category` WHERE `name` = '%".$name."%' ");

    $n = $categoryrs->num_rows;

    if($n == 1){
        echo "The category already exists.";
    }else{
        Database::iud("INSERT INTO `category`(`name`,`description`) VALUES ('".$name."','".$desc."')");
        $imageFile = $_FILES["img"]; 

        $last_id = Database::$connection->insert_id;

        $allowed_image_extention = array("image/jpeg","image/jpg","image/png","image/svg");
        $fileex = $imageFile["type"];

        if(!in_array($fileex,$allowed_image_extention)){
            echo "Please select a valid image";
        }else{
            $newimgextention;
            
            if($fileex == "image/jpeg"){
                $newimgextention = ".jpeg";
            }else if($fileex == "image/jpg"){
                $newimgextention = ".jpg";
            }else if($fileex == "image/png"){
                $newimgextention = ".png";
            }else if($fileex == "image/svg"){
                $newimgextention = ".svg";
            }

            $fileName = "resources//products//".uniqid().$newimgextention;
            
            move_uploaded_file($imageFile["tmp_name"],"../".$fileName);

            Database::iud("INSERT INTO `images`(`code`,`category_id`) VALUES ('".$fileName."','".$last_id."')");
            echo "success";

        }
        
        // echo "success";
    }
}

?>