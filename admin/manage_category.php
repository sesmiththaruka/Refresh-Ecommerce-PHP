<?php
session_start();

   
require "../connection.php";
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
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <h3 class="text-primary">Manage Categories</h3>
                    </div>

                    <hr>

                    <div class="col-12 mb-3">
                        <div class="row g-1">

                            <?php

                            $categoryrs = Database::search("SELECT * FROM `category` ");
                            $num = $categoryrs->num_rows;

                            for ($i = 0; $i < $num; $i++) {
                                $row = $categoryrs->fetch_assoc();
                            ?>
                                <div class="col-12 col-lg-3">
                                    <div class="row g-1 px-1">
                                        <div class="col-12 text-center bg-body border border-2 border-success shadow rounded">
                                            <label class="form-label fs-4 fw-bold py-3"><?php echo $row["name"] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>


                            <div class="col-12 col-lg-3">
                                <div class="row g-1 px-1">
                                    <div class="col-12 text-center bg-body border border-2 border-danger shadow rounded">
                                        <div class="row">
                                            <div class="col-3  addnewimg"></div>
                                            <div class="col-12" onclick="addnewmodal();">
                                                <label class="form-label fs-4 fw-bold py-3 text-black-50">Add New Category</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- Modal-1 -->
                    <div class="modal fade" id="addnewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="categorytxt" />
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">Description</label>
                                                <!-- <input type="textarea" class="form-control"  /> -->
                                                <textarea class="form-control" cols="20" rows="10" style="background-color: honeydew;" id="catdesc"></textarea>

                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4">
                                                        <div class="row">
                                                            <div class="mt-4 col-12">
                                                                <label class="form-label fs-6">Add Category Image </label>
                                                            </div>
                                                            <img class=" col-5 col-lg-9 img-thumbnail" src="../resources/addproductimg.svg" id="catprev">
                                                            <div class="col-12">
                                                                <div class="row">
                                                                    <div class="col-12  mt-2">
                                                                        <div class="row">
                                                                            <div class="col-12 d-grid">
                                                                                <input class="d-none" type="file" accept="image/*" id="imgCatuploader">
                                                                                <label class="btn btn-primary col-5 col-lg-8" for="imgCatuploader" onclick="changeCatImg();">Upload</label>
                                                                            </div>
                                                      
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" onclick="savecategory();">Save category</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal-1 -->

                </div>
            </div>
        </div>
    </div>




    <script src="../jquery-3.6.0.min.js"></script>

    <script src="../bootstrap.bundle.js"></script>
    <script src="admin.js"></script>

</body>

</html>
<?php
