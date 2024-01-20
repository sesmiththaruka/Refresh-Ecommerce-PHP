<?php

$id = $_GET["id"];
require "../connection.php";

// echo $id;
?>

<!DOCTYPE html>
<html>

<head>
    <title>eShop.lk Add Product</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../bootstrap.css">

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../resources/logo.svg">
</head>

<body>

    <div class="container-fluid">
        <?php
        $productrs = Database::search("SELECT * FROM `product` WHERE id='" . $id . "'");
        $product = $productrs->fetch_assoc();
        ?>
        <div class="row gy-3">

            <!-- heading -->

            <div id="addproductbox">


                <div class="col-12 mb-2">
                    <h3 class="h2 text-center text-primary">Product Listing</h3>
                </div>
                <!-- heading -->

                <!-- category,brand,model -->

                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12 ">
                            <div class="row ">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Category</label>
                                </div>
                                <div class="col-12 ">

                                    <?php
                                    $r =  Database::search("SELECT * FROM `category` WHERE `id` = '" . $product["category_id"] . "';");
                                    $cat = $r->fetch_assoc();
                                    ?>

                                    <select class="form-select" id="ca" disabled>
                                        <option value="0"><?php echo $cat["name"] ?></option>
                                    </select>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>


                <!-- category,brand,model -->

                <hr class="hrbreak1">

                <!-- title -->
                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Add a Title to your product</label>
                        </div>
                        <div class="offset-lg-2 col-12 col-lg-8">
                            <input class="form-control" type="text" id="ti" value="<?php echo $product["name"]; ?>">
                        </div>
                    </div>
                </div>
                <!-- title -->

                <hr class="hrbreak1">


                <!-- condition,color,quantity -->

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Condition</label>
                                </div>

                                <?php
                                $selectrs = Database::search("SELECT * FROM `condition` WHERE `id` = '".$product["condition_id"]."';");
                                $select = $selectrs->fetch_assoc();
                                ?>
                                <div class="offset-1 col-10 col-lg-3 form-check">
                                    <input class="form-check-input" type="radio" name="con" id="<?php echo $select["name"]; ?>" checked/>
                                    <label class="form-check-label" for="bn">
                                        <?php echo $select["name"]; ?>
                                    </label>

                                    <?php
                                    $r =  Database::search("SELECT * FROM `condition` WHERE `id`!='" . $product["condition_id"] . "';");
                                    $n = $r->num_rows;



                                    for ($x = 0; $x < $n; $x++) {
                                        $c = $r->fetch_assoc();
                                    ?>
                                        <input class="form-check-input" type="radio" name="con" id="<?php echo $c["name"]; ?>" disabled>
                                        <label class="form-check-label" for="bn">
                                            <?php echo $c["name"]; ?>
                                        </label>
                                    <?php
                                    }

                                    ?>
                                </div>


                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="row">
                            <div class="col-12">
                                    <label class="form-label lbl1">Meal</label>
                                </div>
                                <?php
                                $mealrs = Database::search("SELECT * FROM `product_has_meal` WHERE `product_id` = '".$id."'");
                                $meal_num = $mealrs->num_rows;

                                $mrs = Database::search("SELECT * FROM `meal`");
                                $mn = $mrs->num_rows;

                                for($o=0;$o<$meal_num;$o++){
                                    $m = $mrs->fetch_assoc();
                                    $meal = $mealrs->fetch_assoc();

                                    if($m["id"]==$meal["meal_id"]){
                                        ?>
                                        <div class="form-check">
                                               <input class="form-check-input" type="checkbox" value=""  checked disabled>
                                               <label class="form-check-label" for="flexCheckDefault">
                                                  <?php echo $m["m_name"] ?>
                                               </label>
                                           </div>
                                       <?php  
                                    }
                                }
                                ?>

                            </div>
                        </div>
                       




                    </div>
                </div>

                <!-- condition,color,quantity -->

                <hr class="hrbreak1">

                <!-- cost,payment Method -->

                <div class="col-12 ">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Cost Per Item[Large]</label>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="lcost" value="<?php echo $product["l-price"] ?>">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Cost Per Item[Regular]</label>
                                </div>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Rs.</span>
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="rcost" value="<?php echo $product["r-price"] ?>">
                                    <span class="input-group-text">.00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>




                <hr class="hrbreak1">


                <!-- description -->

                <div class="col-12">
                    <div class="row">
                        <div class="col-12">
                            <label class="form-label lbl1">Product Description</label>
                        </div>
                        <div class="col-12">
                            <textarea class="form-control" cols="20" rows="10" style="background-color: honeydew;" id="desc"><?php echo $product["description"] ?></textarea>
                        </div>
                    </div>
                </div>

                <!-- description -->

                <hr class="hrbreak1">

                <div class="col-10 offset-1">
                    <div class="row">


                        <?php
                        $image = Database::search("SELECT * FROM `pro_image` WHERE `product_id` = '" . $product["id"] . "'");
                        $image_num = $image->num_rows;
                        $img;
                        $k = "";
                        for ($k = 0; $k < $image_num; $k++) {

                            $imgrs = $image->fetch_assoc();
                            $img = $imgrs["code"];

                        ?>
                            <div class="col-6 col-lg-4 my-4">


                                <img class=" col-lg-12 img-thumbnail" src="../<?php echo $img; ?>" id="prev<?php echo $k ?>">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12 col-lg-12 mt-2">
                                            <div class="row">
                                                <div class="col-12 d-grid">
                                                    <input class="d-none col-12" type="file" accept="image/*" id="imguploader<?php echo $k ?>">
                                                    <label class="btn btn-primary col-12" for="imguploader<?php echo $k ?>" onclick="changeUpdateImg();">Upload</label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }

                        ?>





                    </div>
                </div>
                <hr class="hrbreak1">

                <!-- notice -->



                <!-- notice -->

                <!-- save btn -->
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="offset-0 col-12  d-grid">
                            <button class="btn btn-danger searchbtn" onclick="updateproduct(<?php echo $id ?>);">Update Product</button>
                        </div>

                    </div>
                </div>

                <!-- save btn -->



            </div>


            <!-- ///////////////////////////////////// -->






            <!-- footer -->

            <!-- footer -->
        </div>
    </div>
    <script src="admin.js"></script>
    <script src="bootstrap.bundle.js"></script>

</body>

</html>





<script src="admin.js"></script>
</body>

</html>
