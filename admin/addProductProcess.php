<?php
session_start();
require "../connection.php";

$category = $_POST["c"];
$title=$_POST["t"];
$condition=$_POST["co"];

$lprice=(int)$_POST["lp"];
$rprice=(int)$_POST["rp"];
$description=$_POST["desc"];

/////////
$breakfast = $_POST["bf"];
$lunch = $_POST["l"];
$dinner = $_POST["d"];






$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;




// echo $category;
// echo $title; 
// echo $condition; 
// echo $lprice; 
// echo $description;
// echo $image;





if($category == "0"){
    echo "Please Select a Category";
}else if(empty($title)){
    echo "Please Add a Title";
}else if(strlen($title)>=100){
    echo "title more contain 100 or Less than 100 characters";
}else if(empty($lprice)){
    echo "Please Add the Price of your product";
}else if(!intval($lprice)){
    echo "Please insert a valid price";
}else if(empty($rprice)){
    echo "Please Add the Price of your product";
}else if(!intval($rprice)){
    echo "Please insert a valid price";
}else if(empty($description)){
    echo "Please enter the description of your product";
}else{
    $searchProRS = Database::search("SELECT * FROM `product` WHERE `name` = '".$title."'");
    if($searchProRS->num_rows == 1){
        echo "The Product Already Added";
    }else{
        
        
    
        // echo $modelHasBrandId;

        Database::iud("INSERT INTO `product`(`category_id`,`name`,`l-price`,`r-price`,`description`,`condition_id`,`status_id`,`date_time_added`) VALUES ('".$category."','".$title."','".$lprice."','".$rprice."','".$description."','".$condition."','".$state."','".$date."')");
        // echo "product Added Succsesfully";



        $last_id = Database::$connection->insert_id;

        

        if(isset($_FILES["img"])){
            $imageFile = $_FILES["img"]; 


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

                Database::iud("INSERT INTO `pro_image`(`code`,`product_id`) VALUES ('".$fileName."','".$last_id."')");
               

            }

        }else{
            echo "Please Select An Image";
        }

        // img2
        if(isset($_FILES["img1"])){
            $imageFile1 = $_FILES["img1"]; 


            $allowed_image_extention = array("image/jpeg","image/jpg","image/png","image/svg");
            $fileex = $imageFile1["type"];

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

                $fileName1 = "resources//products//".uniqid().$newimgextention;
                move_uploaded_file($imageFile1["tmp_name"],"../".$fileName1);

                Database::iud("INSERT INTO `pro_image`(`code`,`product_id`) VALUES ('".$fileName1."','".$last_id."')");
               

            }

        }else{
            echo "Please Select An Image";
        }

        
        // img3
        if(isset($_FILES["img2"])){
            $imageFile2 = $_FILES["img2"]; 


            $allowed_image_extention = array("image/jpeg","image/jpg","image/png","image/svg");
            $fileex = $imageFile2["type"];

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

                $fileName2 = "resources//products//".uniqid().$newimgextention;
                move_uploaded_file($imageFile2["tmp_name"],"../".$fileName2);

                Database::iud("INSERT INTO `pro_image`(`code`,`product_id`) VALUES ('".$fileName2."','".$last_id."')");
               echo "success";

            }

        }else{
            echo "Please Select An Image";
        }

        if($breakfast=="1"){
            $meal_idrs = Database::search("SELECT * FROM `meal` WHERE `m_name` = 'breakfast'");
            $meal_id = $meal_idrs->fetch_assoc();
            $meal = $meal_id["id"];
            Database::iud("INSERT INTO `product_has_meal`(`product_id`,`meal_id`) VALUES ('".$last_id."','".$meal."')");
        }
        if($lunch=="1"){
            $meal_idrs = Database::search("SELECT * FROM `meal` WHERE `m_name` = 'lunch'");
            $meal_id = $meal_idrs->fetch_assoc();
            $meal = $meal_id["id"];
            Database::iud("INSERT INTO `product_has_meal`(`product_id`,`meal_id`) VALUES ('".$last_id."','".$meal."')");
        }

        if($dinner=="1"){
            $meal_idrs = Database::search("SELECT * FROM `meal` WHERE `m_name` = 'dinner'");
            $meal_id = $meal_idrs->fetch_assoc();
            $meal = $meal_id["id"];
            Database::iud("INSERT INTO `product_has_meal`(`product_id`,`meal_id`) VALUES ('".$last_id."','".$meal."')");
        }
        

      

    }
}

