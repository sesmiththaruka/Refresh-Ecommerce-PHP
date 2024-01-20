<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Porduct view</title>
    <link rel="icon" href="resources/logo.jpeg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="product_view.css">

</head>
<?php
require "connection.php";
$id = $_GET["id"];
?>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- header -->
            <?php require "header.php" ?>
            <?php require "header1.php" ?>
            <!-- header -->


          

            <!-- search area -->
            <!-- <div class="col-12">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 col-12">
                        <div class="row">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-search"></i></span>
                                <input type="text" class="col-4 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search for your favourite dish">
                            </div>
                        </div>
                    </div>

                </div>
            </div> -->
            <!-- search area -->


          


            

            <?php
            $catrs = Database::search("SELECT * FROM `category` WHERE `id`='" . $id . "'");
            $category = $catrs->fetch_assoc();

            ?>

            <!-- category name -->
            <div class="col-12">
                <div class="row">
                    <div class="text-center col-12 col-lg-4 offset-lg-4">
                        <h1><?php echo $category["name"] ?></h1>
                    </div>
                </div>
            </div>
            <!-- category name -->

            <!-- category description area -->
            <div class="col-12">
                <div class="row">
                    <div class="text-center col-12 col-lg-8 offset-lg-2">
                        <span><?php echo $category["description"] ?></span>
                    </div>
                </div>

            </div>
            <!-- category description area -->


            <!-- product view -->
            <div class="col-2" >
                <div class="row">

                    <!-- search -->
                    <div class="mt-5 col-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="inputGroup-sizing-default"><i class="bi bi-search"></i></span>
                                        <input id="search" type="text" class="col-4 form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Search for your favourite dish">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- search -->
                    <!-- price slider -->
                    <div class="mt-4 bg-light col-12 wrapper">
                        <div class="row">


                            <fieldset class="mb-3 filter-price">

                                <div class="col-12 price-field">
                                    <input type="range" min="400" max="5000" value="400" id="lower">
                                    <input type="range" min="400" max="5000" value="5000" id="upper">
                                </div>
                                <div class="col-12 price-wrap">
                                    <div class="row">
                                        <div class="col-12 ms-0 price-container">
                                            <div class=".col-5 price-wrap-1">

                                                <label for="one">Rs.</label>
                                                <input id="one">
                                            </div>
                                            <div class=".col-1 price-wrap_line">-</div>
                                            <div class="col-6">
                                                <label for="two">Rs.</label>
                                                <input class="col-12" id="two">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </div>
                    <!-- price slider -->
                    <div class="col-12">
                        <br class="hrbreak1">
                    </div>
                    <!-- meal select -->
                    <div class="col-12 mt-4 bg-light">
                        <div class="row">
                            <div class="form-check">
                                <?php
                                $mealrs = Database::search("SELECT * FROM `meal`;");
                                $mealn = $mealrs->num_rows;
                                for ($v = 0; $v < $mealn; $v++) {
                                    $meal = $mealrs->fetch_assoc();
                                ?>

                                    <input class="ms-1 form-check-input mt-2" type="radio" name="flexRadioDefault" value="<?php echo $meal["id"]; ?>" id="meal<?php echo $v; ?>">
                                    <label class="ms-3 form-check-label fs-4" for="flexRadioDefault1">
                                        <?php echo $meal["m_name"]; ?>
                                    </label> <br>

                                <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                    <!-- meal select -->
                    <!-- vegetarian -->
                    <div class="col-12 mt-4 bg-light">
                        <div class="row">
                            <?php
                            $conrs = Database::search("SELECT * FROM `condition` WHERE `name` = 'veg';");
                            $con = $conrs->fetch_assoc();
                            ?>
                            <div class="form-check">
                                <input class="form-check-input ms-2 mt-2" type="checkbox" value="<?php echo $con["id"] ?>" id="veg">
                                <label class="form-check-label ms-3 fs-4" for="defaultCheck1">
                                    vegetarian
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- vegetarian -->
                    <!-- sort button -->
                    <div class="mt-5 col-12">
                        <div class="row">
                            <div class="col-12 d-grid">
                                <button style="background-color: #DAA520;" class="btn" onclick="filterPrice(<?php echo $id ?>);">Filter</button>
                            </div>
                        </div>
                    </div>
                    <div class="mt-2 col-12">
                        <div class="row">
                            <div class="col-12">
                                <button class="btn btn-outline-secondary" onclick="clearFilters(<?php echo $id ?>);">Clear Filter</button>
                            </div>
                        </div>
                    </div>
                    <!-- sort button -->
                </div>
            </div>
            <div class="col-10" id="loadProduct">

                <div class="row">

                    <?php
                    if (isset($_GET["page"])) {
                        $pageno = $_GET["page"];
                    } else {
                        $pageno = 1;
                    }

                    $prs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "' AND `status_id` = '1'");
                    $d = $prs->num_rows;
                    $result_per_page = 3;
                    $number_of_pages = ceil($d / $result_per_page);
                    $page_first_result = ((int)$pageno - 1) * $result_per_page;
                    $productrs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "'  AND `status_id` = '1' LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");




                    // $productrs = Database::search("SELECT * FROM `product` WHERE `category_id`='" . $id . "'");
                    $pn = $productrs->num_rows;
                    if ($pn > 0) {
                        for ($b = 0; $b < $pn; $b++) {
                            $product = $productrs->fetch_assoc();
                    ?>
                            <!-- card -->
                            <div class="big">
                                <article class="recipe">
                                    <div class="pizza-box" onclick="goToSingleProductView(<?php echo $product['id']; ?>);" style="cursor:pointer">
                                        <?php
                                        $imgrs = Database::search("SELECT * FROM `pro_image` WHERE `product_id`='" . $product["id"] . "'");
                                        $img = $imgrs->fetch_assoc();
                                        // echo $cat["id"];
                                        ?>
                                        <!-- <img src="https://brotokoll.com/wp-content/uploads/2019/12/xPSX_20190928_134709.jpg.pagespeed.ic.qsjw5ilFw5.jpg" width="1500" height="1368" alt=""> -->
                                        <img src="<?php echo $img["code"]; ?>" width="1500" height="1368" alt="">


                                    </div>
                                    <div class="recipe-content" >
                                        <div class="col-12" style="cursor:pointer" onclick="goToSingleProductView(<?php echo $product['id']; ?>);">
                                            <p class="recipe-tags">
                                                <span class="recipe-tag"> <span class="fs-6">Regular :-</span> <span class="fs-3">Rs.<?php echo $product['r-price']; ?>.00</span> </span>
                                                <span class="recipe-tag"><span class="fs-6">Large :-</span><span class="fs-3"> Rs.<?php echo $product['l-price']; ?>.00</span></span>
                                            </p>

                                            <h1 class="recipe-title"><a href="#"><?php echo $product["name"]; ?></a></h1>

                                            <!-- <p class="recipe-metadata">
                                                <span class="recipe-rating">★★★★<span>☆</span></span>
                                                <span class="recipe-votes">(12 votes)</span>
                                            </p> -->

                                            <p class="recipe-desc"><?php echo $product["description"] ?></p>
                                        </div>
                                        <button class="recipe-save" type="button" onclick="goToSingleProductView(<?php echo $product['id']; ?>);">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000">
                                                <path d="M 6.0097656 2 C 4.9143111 2 4.0097656 2.9025988 4.0097656 3.9980469 L 4 22 L 12 19 L 20 22 L 20 20.556641 L 20 4 C 20 2.9069372 19.093063 2 18 2 L 6.0097656 2 z M 6.0097656 4 L 18 4 L 18 19.113281 L 12 16.863281 L 6.0019531 19.113281 L 6.0097656 4 z" fill="currentColor" />
                                            </svg>
                                            ADD TO CART
                                        </button>
                                        <button class="mt-4 btn btn-outline-warning recipe-save" type="button" onclick="addToWatchList('<?php echo $product['id']; ?>');">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="#000000">
                                                <path d="M 6.0097656 2 C 4.9143111 2 4.0097656 2.9025988 4.0097656 3.9980469 L 4 22 L 12 19 L 20 22 L 20 20.556641 L 20 4 C 20 2.9069372 19.093063 2 18 2 L 6.0097656 2 z M 6.0097656 4 L 18 4 L 18 19.113281 L 12 16.863281 L 6.0019531 19.113281 L 6.0097656 4 z" fill="currentColor" />
                                            </svg>
                                            Save To WatchList
                                        </button>

                                    </div>
                                </article>
                            </div>


                            <!-- card -->
                    <?php
                        }
                    } else {
                        echo "you have no product to show";
                    }

                    ?>


                    <!-- pagination -->
                    <div class="col-12 d-flex justify-content-center text-center fs-5 fw-bold mt-2">
                        <div class="pagination">
                            <a style="color: #DAA520;" href="<?php if ($pageno <= 1) {
                                                                    echo "#";
                                                                } else {
                                                                    echo "?page=" . ($pageno - 1) . "&id=" . $id;
                                                                }
                                                                ?>">
                                &laquo;</a>
                            <?php
                            for ($page = 1; $page <= $number_of_pages; $page++) {
                                if ($page == $pageno) {
                            ?>
                                    <a style="color: #DAA520;" class="active ms-1" href="<?php echo "?page=" . ($page) . "&id=" . $id; ?>"><?php echo $page; ?></a>
                                <?php
                                } else {
                                ?>
                                    <a style="color: #DAA520;" class="ms-1" href="<?php echo "?page=" . ($page) . "&id=" . $id; ?>"><?php echo $page; ?></a>
                            <?php
                                }
                            }
                            ?>

                            <a style="color: #DAA520;" href="<?php
                                                                if ($pageno >= $number_of_pages) {
                                                                    echo "#";
                                                                } else {
                                                                    echo "?page=" . ($pageno + 1) . "&id=" . $id;
                                                                }
                                                                ?>">&raquo;
                            </a>
                        </div>
                    </div>
                    <!-- pagination -->



                </div>
            </div>
            <!-- product view -->


        </div>
    </div>

    <?php
    require "footer.php";
    ?>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>