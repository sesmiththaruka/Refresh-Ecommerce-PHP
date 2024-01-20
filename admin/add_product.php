<?php

require "../connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>eShop.lk Add Product</title>

    <meta charset="utf-8">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../bootstrap.css">

    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="../resources/logo.svg">
</head>

<body>

    <div class="container-fluid">
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
                                    $r =  Database::search("SELECT * FROM `category`;");
                                    $n = $r->num_rows;
                                    ?>

                                    <select class="form-select" id="ca">
                                        <option value="0">All Category</option>

                                        <?php
                                        $cate = $r->fetch_assoc;
                                        for ($x = 0; $x < $n; $x++) {
                                            $c = $r->fetch_assoc();
                                        ?>
                                            <option value="<?php echo $c["id"]; ?>"><?php echo $c["name"]; ?></option>
                                        <?php
                                        }
                                        ?>



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
                            <input class="form-control" type="text" id="ti">
                        </div>
                    </div>
                </div>
                <!-- title -->

                <hr class="hrbreak1">


                <!-- condition,color,quantity -->

                <div class="col-12">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Select Product Condition</label>
                                </div>

                                <?php
                                $r =  Database::search("SELECT * FROM `condition`;");
                                $n = $r->num_rows;

                                for ($x = 0; $x < $n; $x++) {
                                    $c = $r->fetch_assoc();
                                ?>
                                    <div class="offset-1 col-10 col-lg-3 form-check">
                                        <input class="form-check-input" type="radio" name="con" id="<?php echo $c["name"]; ?>">
                                        <label class="form-check-label" for="bn">
                                            <?php echo $c["name"]; ?>
                                        </label>
                                    </div>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="col-6">
                            <div class="row">
                                <div class="col-12">
                                <label class="form-label lbl1">Select meal</label>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="breakfast">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Breakfast
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="lunch">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Lunch
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="dinner">
                                            <label class="form-check-label" for="flexCheckDefault">
                                                Dinner
                                            </label>
                                        </div>
                                    </div>
                                </div>
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
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="lcost">
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
                                    <input type="text" class="form-control" aria-label="Amount (to the nearest rupee)" id="rcost">
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
                            <textarea class="form-control" cols="20" rows="10" style="background-color: honeydew;" id="desc"></textarea>
                        </div>
                    </div>
                </div>

                <!-- description -->

                <hr class="hrbreak1">

                <div class="col-10 offset-1">
                    <div class="row">


                        <!-- product img 1 -->
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Image 1</label>
                                </div>
                                <img class=" col-5 col-lg-9 img-thumbnail" src="../resources/addproductimg.svg" id="prev">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12  mt-2">
                                            <div class="row">
                                                <div class="col-12 d-grid">
                                                    <input class="d-none" type="file" accept="image/*" id="imguploader">
                                                    <label class="btn btn-primary col-5 col-lg-8" for="imguploader" onclick="changeImg();">Upload</label>
                                                </div>
                                                <!-- <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                                                <button class="btn btn-primary">Upload</button>
                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product img 1 -->
                        <!-- product img 2 -->
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Image 2</label>
                                </div>
                                <img class=" col-5 col-lg-9 img-thumbnail" src="../resources/addproductimg.svg" id="prev1">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12  mt-2">
                                            <div class="row">
                                                <div class="col-12 d-grid">
                                                    <input class="d-none" type="file" accept="image/*" id="imguploader1">
                                                    <label class="btn btn-primary col-5 col-lg-8" for="imguploader1" onclick="changeImg();">Upload</label>
                                                </div>
                                                <!-- <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                                                <button class="btn btn-primary">Upload</button>
                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product img 2 -->


                        <!-- product img 3 -->
                        <div class="col-4">
                            <div class="row">
                                <div class="col-12">
                                    <label class="form-label lbl1">Add Product Image 1</label>
                                </div>
                                <img class=" col-5 col-lg-9 img-thumbnail" src="../resources/addproductimg.svg" id="prev2">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12  mt-2">
                                            <div class="row">
                                                <div class="col-12 d-grid">
                                                    <input class="d-none" type="file" accept="image/*" id="imguploader2">
                                                    <label class="btn btn-primary col-5 col-lg-8" for="imguploader2" onclick="changeImg();">Upload</label>
                                                </div>
                                                <!-- <div class="col-6 col-lg-4 d-grid mt-2 mt-lg-0">
                                                <button class="btn btn-primary">Upload</button>
                                    </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product img 3 -->





                    </div>
                </div>
                <hr class="hrbreak1">

                <!-- notice -->

             
                <!-- notice -->

                <!-- save btn -->
                <div class="col-12 mb-5">
                    <div class="row">
                        <div class="offset-0 col-12  d-grid">
                            <button class="btn btn-success searchbtn" onclick="addProduct();">Add Product</button>
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