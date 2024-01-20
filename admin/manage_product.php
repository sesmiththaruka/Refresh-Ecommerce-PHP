
<!-- /////////////////////////////////////////////////////////////////////////////////// -->
<?php 
session_start();


require "../connection.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refresh | Admin</title>
    <link rel="stylesheet" href="admin.css">
    <title>Porduct view</title>
    <link rel="icon" href="resources/logo.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="bootstrap.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-2 bg-dark">
                        <div class="row">
                            <div class="col-12 text-center text-white">
                                <h2>Refresh</h2>
                            </div>
                            <div class="col-12  text-white-50">
                                <span class="fs-6">Admin:-</span>
                                <span class="fs-5">Sesmith</span>
                            </div>
                            <div class=" col-12 mt-4 d-grid  nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="abtn btn mt-1 fs-3 text-white" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Dashboard</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageOrder();">Order manage</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="ManageDelevery();" >Manage Delevery Cost</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadManageProduct();" style="background-color:#DAA520">Manage cuisines</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadAddProduct();">Add Cuisines</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageCategory();">Manage Category</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadUsers();">Users</a>
                                <a class="abtn link mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="goToSite();">View Site</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="row" >
                        
                            <div class="col-12" id="addContent">
<!-- //////////////////////////////////////////////////////////////////////////////////////////// -->
<div class="row">

<div class="col-12 bg-light text-center rounded">
    <label class="form-label fs-2 fw-bold text-primary">Manage All Products</label>
</div>
<div class="col-12 bg-light rounded">
    <div class="row">
        <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
            <div class="row">
                <div class="col-9">
                    <input type="text" class="form-control" id="searchtext" onkeyup="searchUser();" />
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" onclick="searchUser();">Search</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-12 mt-3 mb-2">
    <div class="row">

        <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end">
            <span class="fs-4 fw-bold text-white">#</span>
        </div>

        <div class="col-2 col-lg-2 bg-light pt-2 pb-2 d-none d-lg-block">
            <span class="fs-4 fw-bold">Product Image</span>
        </div>

        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
            <span class="fs-4 fw-bold text-white">Title</span>
        </div>

        <div class="col-6 col-lg-2 bg-light pt-2 pb-2">
            <span class="fs-4 fw-bold">Large - Price</span>
        </div>

        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
            <span class="fs-4 fw-bold text-white">Regular - Price</span>
        </div>

        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
            <span class="fs-4 fw-bold">Registered Date</span>
        </div>

        <div class="col-4 col-lg-1 bg-white"></div>

    </div>
</div>

<?php

if (isset($_GET["page"])) {
    $pageno = $_GET["page"];
} else {
    $pageno = 1;
}


$productrs = Database::search("SELECT * FROM `product` ");
$d = $productrs->num_rows;
$row = $productrs->fetch_assoc();
$result_per_page = 5;
$number_of_pages = ceil($d / $result_per_page);
$page_first_result = ((int)$pageno - 1) * $result_per_page;
$selectedrs = Database::search("SELECT * FROM `product` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
$srn = $selectedrs->num_rows;

$c = 0;
?>

<div class="col-12 mb-2">
    <div class="row">

        <?php
        while ($srow = $selectedrs->fetch_assoc()) {
            $c = $c + 1;
        ?>

            <div class="col-2 col-lg-1 bg-primary pt-2 pb-2 text-end mt-1">
                <span class="fs-5 fw-bold text-white"><?php echo $c; ?></span>
            </div>

            <?php
            // $productimg = Database::search("SELECT * FROM `pro_image` WHERE `product_id`='" . $srow["id"] . "' ");
            // $icode = $productimg->fetch_assoc();
            $imgrs = Database::search("SELECT * FROM `pro_image` WHERE `product_id`='" . $srow["id"] . "'");
            $imgn = $imgrs->num_rows;
            $img = $imgrs->fetch_assoc();
           
            ?>

            <div class="col-2 col-lg-2 bg-light p-1 d-none d-lg-block mt-1" onclick="singleProduct(<?php echo $srow['id']; ?>);">
                <img src="../<?php echo $img["code"]; ?>" style="height: 60px; margin-left: 80px;">
            </div>

            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block mt-1">
                <span class="fs-5 fw-bold text-white"><?php echo $srow["name"]; ?></span>
            </div>

            <div class="col-6 col-lg-2 bg-light pt-2 pb-2 mt-1">
                <span class="fs-5 fw-bold">Rs. <?php echo $srow["l-price"]; ?>.00</span>
            </div>

            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block mt-1">
                <span class="fs-5 fw-bold text-white">Rs.<?php echo $srow["r-price"]; ?>.00</span>
            </div>

            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block mt-1">
                <span class="fs-5 fw-bold"><?php
                                            $rd = $srow["date_time_added"];
                                            $splitrd = explode(" ", $rd);
                                            echo $splitrd[0];
                                            ?></span>
            </div>

            <div class="col-4 col-lg-1 bg-white d-grid p-1 mt-1">
                <?php
                $s = $srow["status_id"];
                if ($s == "1") {
                ?>
                    <button id="blockbtn<?php echo $srow["id"] ?>" class="btn btn-danger" onclick="blockproduct('<?php echo $srow['id']; ?>');">Block</button>
                <?php
                } else {
                ?>
                    <button id="blockbtn<?php echo $srow["id"] ?>" class="btn btn-success" onclick="blockproduct('<?php echo $srow['id']; ?>');">Unblock</button>
                <?php
                }
                ?>
            </div>


            <!-- Modal-single product -->
            <div class="modal fade" id="singleproductview<?php echo $srow['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?php echo $srow["title"]; ?></h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <img src="<?php echo $icode["code"]; ?>" style="height: 150px;" class="img-fluid">
                            </div>

                            <?php
                            $s = $srow["user_email"];
                            $sellers = Database::search("SELECT * FROM `user` WHERE `email`='".$s."' ");
                            $sd = $sellers->fetch_assoc();
                            ?>

                            <span class="fs-5 fw-bold">Price :</span>&nbsp;
                            <span class="fs-5 fw-bold">Rs. <?php echo $srow["price"]; ?>.00</span><br />
                            <span class="fs-5 fw-bold">Quantity :</span>&nbsp;
                            <span class="fs-5"><?php echo $srow["qty"]; ?> Item Left</span><br />
                            <span class="fs-5 fw-bold">Seller :</span>&nbsp;
                            <span class="fs-5"><?php echo $sd["fname"]." ".$sd["lname"]; ?></span><br />
                            <span class="fs-5 fw-bold">Description :</span>&nbsp;
                            <span class="fs-5"><?php echo $srow["description"]; ?></span>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal-single product -->

        <?php
        }
        ?>

        <!-- pagination -->
        <div class="col-12 d-flex justify-content-center text-center fs-5 fw-bold mt-2">
            <div class="pagination">
                <a href="<?php if ($pageno <= 1) {
                                echo "#";
                            } else {
                                echo "?page=" . ($pageno - 1);
                            }
                            ?>">
                    &laquo;</a>
                <?php
                for ($page = 1; $page <= $number_of_pages; $page++) {
                    if ($page == $pageno) {
                ?>
                        <a class="active ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                    <?php
                    } else {
                    ?>
                        <a class="ms-1" href="<?php echo "?page=" . ($page); ?>"><?php echo $page; ?></a>
                <?php
                    }
                }
                ?>

                <a href="<?php
                            if ($pageno >= $number_of_pages) {
                                echo "#";
                            } else {
                                echo "?page=" . ($pageno + 1);
                            }
                            ?>">&raquo;
                </a>
            </div>
        </div>
        <!-- pagination -->

        <hr />


          

        <!-- Modal-1 -->
        <div class="modal fade" id="addnewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Category</label>
                        <input type="text" class="form-control" id="categorytxt" />
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
<!-- ////////////////////////////////////////////////////////////////////////////////////////////////////////   -->
</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="../jquery-3.6.0.min.js"></script>

    <script src="../bootstrap.bundle.js"></script>
    <script src="admin.js"></script>
    <?php
            require "../footer.php"
            ?>
</body>

</html>
