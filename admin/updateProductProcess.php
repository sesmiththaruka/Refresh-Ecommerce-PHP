<?php
session_start();
require "../connection.php";

echo "hi";

$pid = $_POST["pid"];
$title = $_POST["t"];
$condition = $_POST["co"];
$lprice = (int)$_POST["lp"];
$rprice = (int)$_POST["rp"];
$description = $_POST["desc"];

$imageFile = "";
$imageFile1 = "";
$imageFile2 = "";

if (isset($_FILES["i1"])) {
    $imageFile = $_FILES["i1"];
}
if (isset($_FILES["i2"])) {
    $imageFile1 = $_FILES["i2"];
}
if (isset($_FILES["i3"])) {
    $imageFile2 = $_FILES["i3"];
}




$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimezone($tz);
$date = $d->format("Y-m-d H:i:s");

$state = 1;




// echo $category;
// echo $title; 
// echo $condition; 
// echo $price; 
// echo $description;
// echo $image;




if (empty($title)) {
    echo "Please Add a Title";
} else if (strlen($title) >= 100) {
    echo "title more contain 100 or Less than 100 characters";
} else if (empty($lprice)) {
    echo "Please Add the Price of your product";
} else if (!intval($lprice)) {
    echo "Please insert a valid price";
} else if (empty($rprice)) {
    echo "Please Add the Price of your product";
} else if (!intval($rprice)) {
    echo "Please insert a valid price";
} else if (empty($description)) {
    echo "Please enter the description of your product";
} else {
    if (empty($imageFile) && empty($imageFile1) && empty($imageFile2)) {

        Database::iud("UPDATE `product` SET `name` = '" . $title . "',`condition_id`='".$condition."',`l-price`='" . $lprice . "',`r-price`='" . $rprice . "',`description`='" . $description . "',`status_id`='" . $state . "' WHERE `id`='" . $pid . "'");
        echo "productupdated";
    } else {
        ////////////////////////////////////////////////////////////////////////////////////////
        // echo $modelHasBrandId;

        Database::iud("UPDATE `product` SET `name` = '" . $title . "',`condition_id`='".$condition."',l-price`='" . $lprice . "',`r-price`='" . $rprice . "',`description`='" . $description . "',`status_id`='" . $state . "' WHERE `id`='" . $pid . "'");
        echo "productupdated";
        $last_id = Database::$connection->insert_id;
echo $last_id;
        if (isset($_FILES["i1"]) && isset($_FILES["i2"]) && isset($_FILES["i3"])) {
            echo "hi";

            Database::iud("DELETE FROM `pro_image` WHERE `product_id` = '" . $pid . "'");



            //images

            if (isset($_FILES["i1"])) {
                $imageFile = $_FILES["i1"];


                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $fileex = $imageFile["type"];

                if (!in_array($fileex, $allowed_image_extention)) {
                    echo "Please select a valid image";
                } else {
                    $newimgextention;

                    if ($fileex == "image/jpeg") {
                        $newimgextention = ".jpeg";
                    } else if ($fileex == "image/jpg") {
                        $newimgextention = ".jpg";
                    } else if ($fileex == "image/png") {
                        $newimgextention = ".png";
                    } else if ($fileex == "image/svg") {
                        $newimgextention = ".svg";
                    }

                    $fileName = "resources//products//" . uniqid() . $newimgextention;
                    move_uploaded_file($imageFile["tmp_name"],"../". $fileName);

                    Database::iud("INSERT INTO `pro_image`(`code`,`product_id`) VALUES ('" . $fileName . "','" . $pid . "')");
                    echo "Product Image Added Successfully";
                }
            } else {
                echo "Please Select An Image";
            }


            // image2

            if (isset($_FILES["i2"])) {
                $imageFile1 = $_FILES["i2"];

                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $fileex = $imageFile1["type"];

                if (!in_array($fileex, $allowed_image_extention)) {
                    echo "Please select 1st a valid image";
                } else {
                    $newimgextention;

                    if ($fileex == "image/jpeg") {
                        $newimgextention = ".jpeg";
                    } else if ($fileex == "image/jpg") {
                        $newimgextention = ".jpg";
                    } else if ($fileex == "image/png") {
                        $newimgextention = ".png";
                    } else if ($fileex == "image/svg") {
                        $newimgextention = ".svg";
                    }

                    $fileName1 = "resources//products//" . uniqid() . $newimgextention;
                    move_uploaded_file($imageFile1["tmp_name"],"../".$fileName1);

                    Database::iud("INSERT INTO `pro_image`(`code`,`product_id`) VALUES ('" . $fileName1 . "','" . $pid . "')");
                    echo "Product Image Added Successfully";
                }
            } else {
                echo "Please Select 2nd An Image";
            }


            // image3

            if (isset($_FILES["i3"])) {
                $imageFile2 = $_FILES["i3"];


                $allowed_image_extention = array("image/jpeg", "image/jpg", "image/png", "image/svg");
                $fileex = $imageFile2["type"];

                if (!in_array($fileex, $allowed_image_extention)) {
                    echo "Please select a valid image";
                } else {
                    $newimgextention;

                    if ($fileex == "image/jpeg") {
                        $newimgextention = ".jpeg";
                    } else if ($fileex == "image/jpg") {
                        $newimgextention = ".jpg";
                    } else if ($fileex == "image/png") {
                        $newimgextention = ".png";
                    } else if ($fileex == "image/svg") {
                        $newimgextention = ".svg";
                    }

                    $fileName2 = "resources//products//" . uniqid() . $newimgextention;
                    move_uploaded_file($imageFile2["tmp_name"],"../".$fileName2);

                    Database::iud("INSERT INTO `pro_image`(`code`,`product_id`) VALUES ('" . $fileName2 . "','" . $pid . "')");
                    echo "Product Image Added Successfully";
                }
            } else {
                echo "Please Select An 3 rd Image";
            }
        }
    }
}
