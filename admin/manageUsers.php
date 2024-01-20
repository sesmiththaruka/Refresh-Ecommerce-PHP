<?php
session_start();



require "../connection.php";

$pageno;

?>

<!DOCTYPE html>

<html>

<head>
    <title>Refresh | Admin | Manage Users</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="resources/logo.svg" />
    <link rel="stylesheet" href="../bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />
</head>

<body style="background-color: #74EBD5;background-image: linear-gradient(90deg,#74EBD5 0%,#9FACE6 100%);min-height: 100vh;">

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
                            <div class="col-12 mt-4 d-grid  nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="abtn btn mt-1 fs-3 text-white" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true" onclick="loadManageOrder();">Dashboard</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageOrder();">Order manage</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false" onclick="ManageDelevery();" >Manage Delevery Cost</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadManageProduct();">Manage cuisines</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false" onclick="loadAddProduct();">Add Cuisines</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadManageCategory();">Manage Category</a>
                                <a class="abtn btn mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="loadUsers();" style="background-color:#DAA520;">Users</a>
                                <a class="abtn link mt-1 fs-5 text-white  border-top-0 border-end-0 border-start-0 border-bottom border-secondary" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false" onclick="goToSite();">View Site</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="row">
                            <div class="col-12" id="addContent">
                                <!-- ///////////////////////////////////////////////////////////////////////////// -->
                                <div class="col-12 bg-light text-center rounded">
                                    <label class="form-label fs-2 fw-bold text-primary">Manage All Users</label>
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

                                        <div class="col-1 col-lg-1 bg-primary pt-2 pb-2 text-end">
                                            <span class="fs-4 fw-bold text-white">#</span>
                                        </div>


                                        <div class="col-3 bg-primary pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-4 fw-bold text-white">Email</span>
                                        </div>

                                        <div class="col-6 col-lg-3 bg-light pt-2 pb-2">
                                            <span class="fs-4 fw-bold">User Name</span>
                                        </div>

                                        <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-4 fw-bold text-white">Mobile</span>
                                        </div>

                                        <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block">
                                            <span class="fs-4 fw-bold">Register Date</span>
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


                                $usersrs = Database::search("SELECT * FROM `user` ");
                                $d = $usersrs->num_rows;
                                $row = $usersrs->fetch_assoc();
                                $result_per_page = 5;
                                $number_of_pages = ceil($d / $result_per_page);
                                $page_first_result = ((int)$pageno - 1) * $result_per_page;
                                $selectedrs = Database::search("SELECT * FROM `user` LIMIT " . $result_per_page . " OFFSET " . $page_first_result . " ");
                                $srn = $selectedrs->num_rows;

                                $c = 0;
                                ?>




                                <div class="col-12 mb-2">
                                    <div class="row" id="utable">

                                        <?php
                                        while ($srow = $selectedrs->fetch_assoc()) {
                                            $c = $c + 1;
                                        ?>

                                            <div class="col-1 col-lg-1 bg-primary pt-2 pb-2 text-end mt-1">
                                                <span class="fs-5 fw-bold text-white"><?php echo $c; ?></span>
                                            </div>





                                            <div class="col-3 bg-primary pt-2 pb-2 d-none d-lg-block mt-1"  onclick="gomuser('<?php echo $srow["email"] ?>');">
                                                <span class="fs-6 fw-bold text-white"><?php echo $srow["email"] ?></span>
                                            </div>

                                            <div class="col-6 col-lg-3 bg-light pt-2 pb-2 mt-1">
                                                <span class="fs-5 fw-bold"><?php echo $srow["fname"] . " " . $srow["lname"] ?></span>
                                            </div>

                                            <div class="col-2 bg-primary pt-2 pb-2 d-none d-lg-block mt-1">
                                                <span class="fs-5 fw-bold text-white"><?php echo $srow["mobile"] ?></span>
                                            </div>

                                            <div class="col-2 bg-light pt-2 pb-2 d-none d-lg-block mt-1">
                                                <span class="fs-5 fw-bold"><?php
                                                                            $rd = $srow["register_date"];
                                                                            $splitrd = explode(" ", $rd);
                                                                            echo $splitrd[0];
                                                                            ?></span>
                                            </div>

                                            <div class="col-4 col-lg-1 bg-white d-grid p-1 mt-1">
                                                
                                            </div>
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


                                        <!-- Modal -->
                                        <div class="modal fade" id="msgmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">My Messages</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- ..... -->

                                                        <div class="col-12 py-5 px-4">
                                                            <div class="row rounded-lg overflow-hidden shadow">
                                                                <div class="col-5 px-0">
                                                                    <div class="bg-white">

                                                                        <div class="bg-gray px-4 py-2 bg-light">
                                                                            <p class="h5 mb-0 py-1">Recent</p>
                                                                        </div>

                                                                        <div class="messages-box">
                                                                            <div class="list-group rounded-0" id="rcv">



                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- massage box -->
                                                                <div class="col-7 px-0">
                                                                    <div class="row px-4 py-5 chat-box bg-white" id="chatrow">
                                                                        <!-- massage load venne methana -->


                                                                    </div>
                                                                </div>

                                                                <div class="offset-5 col-7">
                                                                    <div class="row bg-white">

                                                                        <!-- text -->
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="input-group">
                                                                                    <input type="text" id="msgtxt" placeholder="Type a message" aria-describedby="button-addon2" class="form-control rounded-0 border-0 py-4 bg-light">
                                                                                    <div class="input-group-append">
                                                                                        <button id="button-addon2" class="btn btn-link fs-1" onclick="sendmessage('<?php echo $email; ?>');"> <i class="bi bi-cursor-fill"></i></button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!-- text -->

                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- .... -->
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-danger">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <!-- //////////////////////////////////////////////////////////////////////////////////  -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>






            <!-- ///////////////////////////////////////////////////// -->




        </div>
    </div>
    <script src="admin.js"></script>
    <script src="../bootstrap.js"></script>
</body>

</html>
